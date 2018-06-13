﻿<%@ WebHandler Language="C#" Class="CssHandler" %>

using System;
using System.IO;
using System.Text;
using System.Text.RegularExpressions;
using System.Web;
using System.IO.Compression;

public class CssHandler : IHttpHandler
{

    private const bool DO_GZIP = true;
    private readonly static string IMAGE_PREFIX = System.Configuration.ConfigurationManager.AppSettings["ImgPrefix"];
    private readonly static TimeSpan CACHE_DURATION = TimeSpan.FromMinutes(1);
    private readonly static Regex URL_REGEX = new Regex(@"url\((\""|\')?(?<path>(.*))?(\""|\')?\)", RegexOptions.Compiled);

    public void ProcessRequest(HttpContext context)
    {
       
        context.Response.ContentType = "text/css";

        string themeName = context.Request["t"];
        string themeFileNames = context.Request["f"].Replace("..", "").Replace(@"\", "");
        string version = context.Request["v"];

        bool isCompressed = DO_GZIP && this.CanGZip(context.Request);

        UTF8Encoding encoding = new UTF8Encoding(false);

        if (!this.WriteFromCache(context, themeName, version, isCompressed))
        {
            using (MemoryStream memoryStream = new MemoryStream(5000))
            {
                using (Stream writer = isCompressed ?
                    (Stream)(new GZipStream(memoryStream, CompressionMode.Compress)) :
                    memoryStream)
                {

                    // First deliver the common CSS
                    string[] commonCssFiles = (System.Configuration.ConfigurationManager.AppSettings["CommonCssSet"] ?? "").Split(',');
                    foreach (string fileName in commonCssFiles)
                    {
                        byte[] fileBytes = this.GetCss(context, fileName, IMAGE_PREFIX, version, encoding);
                        writer.Write(fileBytes, 0, fileBytes.Length);
                    }

                    // Now deliver the theme CSS which might override common CSS settings
                    if (!string.IsNullOrEmpty(themeName))
                    {
                        string[] themeCssNames = themeFileNames.Split(',');
                        foreach (string fileName in themeCssNames)
                        {
                            //if (themeName.EndsWith(".css"))
                            //{
                                byte[] fileBytes = this.GetCss(context, "~/App_Themes/" + themeName + "/" + fileName, IMAGE_PREFIX, version, encoding);
                                writer.Write(fileBytes, 0, fileBytes.Length);
                            //}
                        }
                    }

                    writer.Close();
                }

                // You can additionally create another file set to deliver after 
                // the theme CSS are delivered


                // Cache and generate response
                byte[] responseBytes = memoryStream.ToArray();
                context.Cache.Insert(GetCacheKey(themeName, version, isCompressed), responseBytes, null, System.Web.Caching.Cache.NoAbsoluteExpiration, CACHE_DURATION);

                this.WriteBytes(responseBytes, context, isCompressed);
            }
        }
    }

    private byte[] GetCss(HttpContext context, string virtualPath,
        string imagePrefix, string version, Encoding encoding)
    {
        string physicalPath = context.Server.MapPath(virtualPath);
        string fileContent = File.ReadAllText(physicalPath, encoding);

        string imagePrefixUrl = imagePrefix +
            VirtualPathUtility.GetDirectory(virtualPath).TrimStart('~').TrimStart('/');
        string cssContent = URL_REGEX.Replace(fileContent,
            new MatchEvaluator(delegate(Match m)
        {
            string imgPath = m.Groups["path"].Value.TrimStart('\'').TrimEnd('\'').TrimStart('"').TrimEnd('"');

            if (!imgPath.StartsWith("http://"))
            {
                return "url('" + imagePrefixUrl // First put the prefix for the images
                    + imgPath // the relative URL as it is in the CSS
                    + (imgPath.IndexOf('?') > 0 ? "&v=" + version : "?v=" + version)
                    + "')";
            }
            else
            {
                return "url('" + imgPath + "')";
            }
        }));

        return encoding.GetBytes(cssContent);
    }

    private bool WriteFromCache(HttpContext context, string themeName,
        string version, bool isCompressed)
    {
        byte[] responseBytes = context.Cache[GetCacheKey(themeName,
            version, isCompressed)] as byte[];

        if (null == responseBytes) return false;

        this.WriteBytes(responseBytes, context, isCompressed);
        return true;
    }

    private void WriteBytes(byte[] bytes, HttpContext context, bool isCompressed)
    {
        HttpResponse response = context.Response;

        response.AppendHeader("Content-Length", bytes.Length.ToString());
        response.ContentType = "text/css";
        if (isCompressed)
            response.AppendHeader("Content-Encoding", "gzip");

        context.Response.Cache.SetCacheability(HttpCacheability.Public);
        context.Response.Cache.SetExpires(DateTime.Now.Add(CACHE_DURATION));
        context.Response.Cache.SetMaxAge(CACHE_DURATION);
        context.Response.Cache.AppendCacheExtension("must-revalidate, proxy-revalidate");

        response.OutputStream.Write(bytes, 0, bytes.Length);
        response.Flush();
    }

    private bool CanGZip(HttpRequest request)
    {
        string acceptEncoding = request.Headers["Accept-Encoding"];
        if (!string.IsNullOrEmpty(acceptEncoding) &&
             (acceptEncoding.Contains("gzip") || acceptEncoding.Contains("deflate")))
            return true;
        return false;
    }

    private string GetCacheKey(string themeName, string version, bool isCompressed)
    {
        return "CssHandler." + themeName + "." + version + "." + isCompressed;
    }

    public bool IsReusable
    {
        get
        {
            return true;
        }
    }

}