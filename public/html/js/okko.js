function VoteThisProduct(appid, rate) {
    if (parseInt(appid) > 0)
        var voteproduct = readCookie('okko_appvote_' + appid);
    if (voteproduct != null) {
        alert('Bạn đã bình chọn cho ứng dụng này rồi.');
    } else {
        createCookie('okko_appvote_' + appid, 1, 24 * 60)
        /*Update rate*/
        jQuery.ajax({
            type: "POST",
            url: "/AjaxMethod.aspx/Comment",
            data: '{appid:"' + appid + '",rate:"' + rate + '"}',
            contentType: "application/json; charset=utf-8",
            dataType: "json",
            success: function (response) {
                alert('bạn đã bình chọn thành công cho ứng dụng này!');
            },
            failure: function (response) {
                alert('Có lỗi xảy ra!');
            }
        });
    }
}
function GetOTP(msisdn) {
    var otp = readCookie('okko_otp');
    if (otp != null && otp != 'NaN') {
        //alert('vao day1' + otpcount);
    }
    else {
        //alert('vao day');
        createCookie('okko_otp', 1, 10)
        otp = 1;
    }
    if (parseInt(otp) > 4) {
        alert('thời gian lấy password quá nhanh. Xin hãy thử lại sau ít phút');
    } else {
        createCookie('okko_otp', parseInt(otp) + 1, 10)
        jQuery.ajax({
            type: "POST",
            url: "/AjaxMethod.aspx/GetOTP",
             data: '{msisdn:"' + msisdn + '"}',
            contentType: "application/json; charset=utf-8",
            dataType: "json",
            success: function (response) {
                alert('Mã xác nhận đã gửi về điện thoại, xin vui lòng kiểm tra tin nhắn đến!');
            },
            failure: function (response) {
                alert('Có lỗi xảy ra!');
            }
        });
    }
}
function wapConfirm(loc) {
    var gj = readCookie('okko_guild_jainbreak3');
    if (gj != null && gj != 'NaN') {
        
    }
    else {
        gj = 0;
        createCookie('okko_guild_jainbreak3', 1, 1000)
        
    }
    if (parseInt(gj) > 0) {
        //alert('da huong dan tai game');
        //window.location.href = loc; 
    } else {
        alert('Nếu gặp sự cố trong quá trình cài đặt. Bạn cần cài đặt ứng dụng Appcync trước và thử lại sau');
        //window.location.href = loc; 
    }
}
function WebConfirm(gameid, url) {
    jQuery.ajax({
        type: "POST",
        url: "/AjaxMethod.aspx/Download",
        data: '{gameid:"' + gameid + '",url:"' + url + '"}',
        contentType: "application/json; charset=utf-8",
        dataType: "text",
        success: function (response) {
            var obj = parseJSON(response);
            if (obj.d > 0) {
                alert('Link tải game đã được gửi vào máy của bạn. Mời bạn kiểm tra tin nhắn đến. xin cảm ơn');
            }
            else {
                alert('Có lỗi xảy ra! mời bạn quay lại sau ít phút(ko gui duoc mt).');
            }
        },
        failure: function (response) {
            alert('Có lỗi xảy ra! mời bạn quay lại sau ít phút.');
        }
    });
    $('#pupup-xacnhan').dialog('close');
}


function morecatedownload(gameid, os) {
    jQuery.ajax({
        type: "POST",
        url: "/AjaxMethod.aspx/morecatedownload",
        data: '{gameid:"' + gameid + '",os:"' + os + '"}',
        contentType: "application/json; charset=utf-8",
        dataType: "text",
        success: function (response) {
            var obj = parseJSON(response);
            var strreval = obj.d;
            if (strreval == "-1") {
                alert('Co loi xay ra');
            }
            else if (os == "android") {
                window.location.href = strreval;
            }
            else {
                $(document).ready(function () { $('#pupup-xacnhan').html(strreval); $("#pupup-xacnhan").dialog({modal: true }); $('#closepopup').click(function () { $('#pupup-xacnhan').dialog('close'); }); }); 
            }
        },
        failure: function (response) {
            alert('Có lỗi xảy ra! mời bạn quay lại sau ít phút.');
        }
    });
}
function parseJSON(data) {
    return window.JSON && window.JSON.parse ? window.JSON.parse(data) : (new Function("return " + data))();
}
function CheckOTP(msisdn, otp) {
    var otpcount = readCookie('okko_check_otp');
    if (otpcount != null && otpcount != 'NaN') {
        //alert('vao day1' + otpcount);
    }
    else {
        //alert('vao day');
        createCookie('okko_check_otp', 1, 10)
        otpcount = 1;
    }
    if (parseInt(otpcount) > 4) {
        alert('Đăng nhập sai quá nhiều lần. Xin hãy thử lại sau ít phút');
        window.location.href = "/";
    } else {

        jQuery.ajax({
            type: "POST",
            url: "/AjaxMethod.aspx/CheckOTP",
            data: '{msisdn:"' + msisdn + '",otp:"' + otp + '"}',
            contentType: "application/json; charset=utf-8",
            dataType: "text",
            success: function (response) {
                var obj = parseJSON(response);
                if (obj.d > 0) {
                    alert('Đăng nhập thành công!');
                    window.location.href = "/";
                }
                else {
                    createCookie('okko_check_otp', parseInt(otpcount) + 1, 10)
                    alert('Đăng nhập không thành công!');
                }
            },
            failure: function (response) {
                alert('Có lỗi xảy ra!');
            }
        });
    }
}


function Download(type, msisdn, gameid, gameurl) {
    var downloadcount = readCookie('okko_download_' + msisdn + '_' + gameid);
    if (downloadcount != null && downloadcount != 'NaN') {
        //alert('vao day1' + otpcount);
    }
    else {
        //alert('vao day');
        createCookie('okko_download_' + msisdn + '_' + gameid, 1, 10)
        downloadcount = 1;
    }
    if (parseInt(downloadcount) > 1) {
        alert('Tin nhắn đã được gửi đến máy của bạn. làm ơn kiểm tra tin nhắn');
        
    } else {

        jQuery.ajax({
            type: "POST",
            url: "/AjaxMethod.aspx/Download",
            data: '{msisdn:"' + msisdn + '",gameurl:"' + gameurl + '"}',
            contentType: "application/json; charset=utf-8",
            dataType: "text",
            success: function (response) {
//                var obj = parseJSON(response);
//                if (obj.d > 0) {
//                    alert('Đăng nhập thành công!');
//                    window.location.href = "/";
//                }
//                else {
//                    createCookie('okko_check_otp', parseInt(otpcount) + 1, 10)
//                    alert('Đăng nhập không thành công!');
//                }

                alert('Link tải game đã được gửi đến máy của bạn. làm ơn kiểm tra tin nhắn!');
            },
            failure: function (response) {
                alert('Có lỗi xảy ra!');
            }
        });
    }
}



function GetNewsZoneCenter(url) {
    GetHtml(url, '#boxnews');
};
function homeshowbiz(url) {
    GetHtml(url, '#hometop');
};
function GetListAjax(url) {
    GetHtml(url, '#lstajax');
};
function zonerepeat2(url) {
    GetHtml(url, '#rptzone2');
};
function zonerepeat3(url) {
    GetHtml(url, '#rptzone3');
};
function zonerepeat4(url) {
    GetHtml(url, '#rptzone4');
};
function zonerepeat1(url) {
    GetHtml(url, '#rptzone1');
};
function homeslide(url) {
    GetHtml(url, '#homeslideshow');
};
function AutoReFresh() {
    homeslide('/Ajax.aspx?ctrl=/Modules/CMS/Web/Home_SlideShow');
    homeshowbiz('/Ajax.aspx?ctrl=/Modules/CMS/Web/Home_Top');
    GetNewsZoneCenter('/Ajax.aspx?ctrl=/Modules/CMS/Web/Home_BoxNews');
    window.setTimeout(function () { AutoReFresh(); }, 300000);

};
function GetHtml(url, div) {
    url = url + '&rand=' + Math.random();
    $.get(encodeURI(url),
     function (data) {
         //get response text only
         var s = data.indexOf('<responseText>')
         var t = data.indexOf('</responseText>')
         var response = data.substring(s + 16, t)
         $(div).html(response);

     })
     $(".col").hover(function () {
         $(".summary", this).stop(false, true).slideDown();
     }, function () {
         $(".summary", this).stop(false, true).slideUp();
     });
 };

//$(document).ready(function () {

//     $(".col").hover(function () {
//         $(".summary", this).stop(false, true).slideDown();
//     }, function () {
//         $(".summary", this).stop(false, true).slideUp();
//     });
// });
 /* funtion luu cookie*/
 function createCookie(name, value, minute) {
     if (minute) {
         var date = new Date();
         date.setTime(date.getTime() + (minute * 60 * 1000));
         var expires = "; expires=" + date.toGMTString();
     }
     else var expires = "";
     document.cookie = name + "=" + value + expires + "; path=/";
 }
 /*Funtion doc cookie*/
 function readCookie(name) {
     var nameEQ = name + "=";
     var ca = document.cookie.split(';');
     for (var i = 0; i < ca.length; i++) {
         var c = ca[i];
         while (c.charAt(0) == ' ') c = c.substring(1, c.length);
         if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length, c.length);
     }
     return null;
 }
 /*Funtion xoa cookie*/
 function eraseCookie(name) {
     createCookie(name, "", -1);
 }