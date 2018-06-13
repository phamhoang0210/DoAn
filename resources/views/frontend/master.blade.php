<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>Poonsa Hanoi Hotel</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!--css bootstrap 3.3.7--> 
        <link href="{{asset('Frontend/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css"/>
        <!--css-->
        <link href="{{asset('Frontend/css/style.css')}}" rel="stylesheet" type="text/css"/>
        <!--css animate-->
        <link href="{{asset('Frontend/css/animate.css')}}" rel="stylesheet" type="text/css"/>
        
        <!--carowsel-->
        <link href="{{asset('Frontend/css/owl.carousel.min.css')}}" rel="stylesheet" type="text/css"/>
        <link href="{{asset('css/owl.theme.default.min.css')}}" rel="stylesheet" type="text/css"/>
        <!--js-->
        <script src="{{asset('Frontend/js/jquery.min.js')}}" type="text/javascript"></script>
        <script src="{{asset('Frontend/js/javascript.js')}}" type="text/javascript"></script>
        <script src="{{asset('Frontend/bootstrap/js/bootstrap.min.js')}}" type="text/javascript"></script>
        <!--js carowsel-->
        <script src="{{asset('Frontend/js/customowl.js')}}" type="text/javascript"></script>
        <script src="{{asset('Frontend/js/owl.carousel.js')}}" type="text/javascript"></script>
        <!--google font-->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
        <!--font-family: 'Open Sans', sans-serif;-->
        
    
    </head>
    <body>
        <div  class="header">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-md-3">
                        <div class="left_header">
                            <!-- Small modal -->
                            
                            <div class="login">
                                <p class="sLogin" data-toggle="modal" data-target=".bs-example-modal-sm">Đăng nhập</p>
                                <div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
                                  <div class="modal-dialog modal-sm" role="document">
                                    <div class="modal-content">
                                        <form action="{{url('login_post')}}" method="post">
                                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                                            <h2>Đăng nhập</h2>
                                            <label>Tài khoản:</label>
                                            <p><input type="text" name="email" placeholder="name"></p>
                                            <label>Mật khẩu:</label>
                                            <p><input type="password" name="pass"></p>
                                            <p class="btnlogin"><input type="submit" value="Đăng nhập"></p>
                                        </form>
                                    </div>
                                  </div>
                                </div>
                            </div><!--login-->
                            
                            <div class="login">
                                <p class="sLogin">|<a href="{{url('dang_ky_tai_khoan')}}">Đăng ký</a>
                            </div><!--sign-in-->
                        </div><!--left-header-->
                    </div>
                    <div class="col-xs-12 col-md-5">
                        <?php if(Auth::check()) { ?>
                        <p style="font-size: 20px;color: #ffffff; float: left; padding-top: 4px;">
                            <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                            <?php if (Auth::check()) echo Auth::user()->sTen; ?>            
                        </p>
                        <p style="padding-top: 7px; float: left;">
                            <a href="{{url('logout')}}" style="padding-top: 30px; padding-left: 20px;">
                                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>Đăng xuất
                            </a>
                        </p>
                        <p style="float: right;">
                            <a href="{{url('nguoi_dung_dang_nhap')}}" data-toggle="tooltip" data-placement="left" data-original-title="Cập nhật">
                            <img src="{{asset('Frontend/images/icon_hotel.png')}}" width="30px" >
                            </a>
                        </p>

                       <?php } ?>
                    </div>
                    
                    <div class="col-xs-12 col-md-2">
                        <div class="right-header">   
                                <a href="{{url('facebook.com')}}"><img src="{{asset('Frontend/images/icon_facebook.png')}}" width="30px"></a>
                                <a href="#"><img src="{{asset('Frontend/images/icon_g.png')}}" width="30px"></a>
                        </div>
                    </div>
                       <div class="col-xs-12 col-md-2">
                        <div class="right-giohang">   
                               <!--  <a href="{{url('khachhangdadat')}}"><img src="{{asset('Frontend/images/giohang.png')}}" width="120px"></a> -->
                              
                              <!-- Button trigger modal -->
                                <img data-toggle="modal" data-target="#myModal" src="{{asset('Frontend/images/giohang.png')}}" width="120px"></a>           
                                <!-- Modal -->
                                <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                  <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <h2 class="modal-title" id="myModalLabel">Nhập thông tin Định Danh của khách hàng</h2>
                                      </div>
                                     <form action="{{url('khachhangdadat')}}" method="post">
                                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                                              <div class="modal-body">
                                                        <div class="form-group">
                                                        <label for="exampleInputEmail1">Số chứng minh thư nhân dân:</label>
                                                        <p class="search">
                                                            <input type="text" name="tukhoa"class="form-control" placeholder="CMTNT" required>
                                                        </p>
                                                      </div>
                                              </div>
                                              <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
                                                <button type="submit" class="btn btn-info">Lấy thông tin</button>
                                              </div>
                                   </form>
                                    </div>
                                  </div>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div><!--header-->
        
        <div class="banner">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-md-4">
                        <div class="logo">
                            <a href="{{'/'}}">
                                <img src="{{asset('Frontend/images/logo.png')}}" width="180px">
                            </a>
                            <p class="poonsahotel">Poonsa Hanoi Hotel</p>
                        </div>
                    </div>

                    <div class="col-xs-12 col-md-8">
                        <div class="description">
                            <p class="des1">Khách sạn</p>
                            <h1 class="des2">Poonsa Hanoi Hotel</h1>
                            <p class="des3">DC: số 36c dịch vọng hậu, Cầu giấy, Hà Nội</p>
                            <p class="des4">sdt: 0985587882 - email: doms.poonsa@gmail.com</p>
                        </div>
                    </div>
                </div>
            </div>
        </div><!--banner-->
        
        
        @yield('trangchu')
        @yield('datphong')
        @yield('gioithieu')
        @yield('loaiphong')
        @yield('dichvu')
        @yield('tintuc')
        @yield('datdichvu')
        @yield('khachhangdadat')
        @yield('chitiettintuc')
        @yield('nguoidungdangnhap')

        <div class="top_footer">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-md-3">
                        <div class="taps-inf">
                            <p><span class="glyphicon glyphicon-envelope" aria-hidden="true"></span></p>
                            <p class="text1">Email</p>
                            <p class="text2">doms.poonsa@gmail.com</p>
                        </div>
                    </div>
                    <div class="col-xs-12 col-md-3">
                        <div class="taps-inf">
                            <p><span class="glyphicon glyphicon-road" aria-hidden="true"></span></p>
                            <p class="text1">Địa chỉ</p>
                            <p class="text2">Số 36c Dịch Vọng Hậu, Cầu Giấy, Hà Nội</p>
                        </div>   
                    </div>
                    <div class="col-xs-12 col-md-3">
                        <div class="taps-inf">
                            <p><span class="glyphicon glyphicon-phone-alt" aria-hidden="true"></span></p>
                            <p class="text1">Số điện thoại</p>
                            <p class="text2">0984834843</p>
                        </div>   
                    </div>
                    <div class="col-xs-12 col-md-3">
                        <div class="taps-inf">
                               <p><span class="glyphicon glyphicon-globe" aria-hidden="true"></span></p>
                               <p class="text1">Website</p>
                               <p class="text2">poonsahotel.com</p>
                        </div>   
                    </div>
                </div>
            </div>
        </div><!--top_footer-->

        <div class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-md-8">
                                <nav class="navbar navbar-default">
                              <!-- Brand and toggle get grouped for better mobile display -->
                              <div class="navbar-header">
                                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-2" aria-expanded="false">
                                  <span class="sr-only">Toggle navigation</span>
                                  <span class="icon-bar"></span>
                                  <span class="icon-bar"></span>
                                  <span class="icon-bar"></span>
                                </button>     
                              </div>

                              <!-- Collect the nav links, forms, and other content for toggling -->
                              <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-2">
                                <ul class="nav navbar-nav navbar-left">
                                    <ul class="list-menu">
                                      <li><a href="{{url('/')}}">Trang chủ</a></li>
                                      <li><a href="{{url('tintuc')}}">Tin tức</a></li>
                                      <li><a href="{{url('dichvu')}}">Dịch vụ</a></li>
                                      <li><a href="{{url('loaiphong')}}">Loại phòng</a></li>
                                      <li><a href="{{url('gioithieu')}}">Giới thiệu</a></li>
                                    </ul>
                                  </li>
                                </ul>
                              </div><!-- /.navbar-collapse -->
                          </nav>
                    </div>
                    
                    <div class="col-xs-12 col-md-4">
                        <div class="copyright">
                            <p>© Copyright Poonsa hanoi hotel<p>
                        </div>
                    </div>
                </div>
            </div>
        </div><!--footer-->
    </body>
</html>
