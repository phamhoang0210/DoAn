<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Hệ thống quản lí</title>
    <link rel="shortcut icon" href="{{asset('favicon.ico')}}" />
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <link rel="shortcut icon" href="/cms-icon.png" />
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
    <!-- global css -->
    <script src="//code.jquery.com/jquery-1.12.3.min.js" type="text/javascript"></script>
    <link type="text/css" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" />
    <link type="text/css" href="{{asset('backend/css/font-awesome.min.css')}}" rel="stylesheet" />
    <link type="text/css" href="{{asset('backend/css/custom_css/fitness.css')}}" rel="stylesheet" />
    <link type="text/css" href="{{asset('backend/css/custom_css/metisMenu.css')}}" rel="stylesheet" />

    <link href="{{asset('backend/vendors/iCheck/skins/all.css')}}" rel="stylesheet" type="text/css">
    <link type="text/css" rel="stylesheet" href="{{asset('backend/css/custom_css/panel.css')}}" />
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css">
    <link type="text/css" href="{{asset('backend/vendors/jasny-bootstrap/css/jasny-bootstrap.min.css')}}" rel="stylesheet">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @yield('header_import')
    <!-- <link rel="stylesheet" href="//cdn.datatables.net/1.10.7/css/jquery.dataTables.min.css"> -->
    <!-- end of global css -->
    <!--page level css -->
    <!--end of page level css-->
</head>

<body>
    <div class="se-pre-con"></div>
    <!-- header logo: style can be found in header-->
    <header class="header">
        <nav class="navbar navbar-static-top">
            <a href="{{url('admincp/')}}" class="logo">
                <!-- Add the class icon to your logo image or logo icon to add the margining -->
                <img src="{{asset('backend/img/logoPoonsa.png')}}" alt="image not found" width=80px>
            </a>
            <!-- Header Navbar: style can be found in header-->
            <!-- Sidebar toggle button-->
            <!-- Sidebar toggle button-->
            <div>
                <a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button"> <i class="fa fa-fw fa-navicon"></i>
                </a>
            </div>
            <div class="navbar-right">
                <ul class="nav navbar-nav">
                    <!-- Notifications: style can be found in dropdown-->
                    <li class="dropdown notifications-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-fw fa-bell-o black1"></i>
                            <!-- <span class="label label-warning">9</span> -->
                        </a>
                    </li>
                    <!-- User Account: style can be found in dropdown-->
                    <li class="dropdown user user-menu">
                        <a href="#" class="dropdown-toggle padding-user" data-toggle="dropdown">
                            <img src="{{asset('backend/img/admin/user1.png')}}" width="35" class="img-circle img-responsive pull-left" height="35" alt="User Image">
                            <div class="riot">
                                <div>
                                    <?php if (Auth::check()) echo Auth::user()->sTen; ?>
                                        <span>
                                            <i class="caret"></i>
                                        </span>
                                    </div>
                                </div>
                            </a>
                            <ul class="dropdown-menu">
                                <!-- User image -->
                                <li class="user-header">
                                    <img src="{{asset('backend/img/admin/user1.png')}}" class="img-circle" alt="User Image">
                                    <p>Chào, <?php if (Auth::check()) echo Auth::user()->sTen; ?></p>
                                </li>
                                <li role="presentation"></li>
                                <br />
                                <li>
                                    <a href="{!!url('admincp/user/user_sua')!!}/<?php if (Auth::check()) echo Auth::user()->id; ?>">
                                        <i class="fa fa-fw fa-gear"></i> Cài đặt tài khoản
                                    </a>
                                </li>
                                <li role="presentation" class="divider"></li>
                                <!-- Menu Footer-->
                                <li class="user-footer">
                                    <!-- <div class="pull-left">
                                        <a href="#">
                                            <i class="fa fa-fw fa-lock"></i> Khóa
                                        </a>
                                    </div> -->
                                    <div class="pull-right">
                                        <a href="{{url('admincp/logout')}}">
                                            <i class="fa fa-fw fa-sign-out"></i> Đăng xuất
                                        </a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <div class="wrapper row-offcanvas row-offcanvas-left">
            <!-- Left side column. contains the logo and sidebar -->
            <aside class="left-side sidebar-offcanvas">
                <!-- sidebar: style can be found in sidebar-->
                <section class="sidebar">
                    <div id="menu" role="navigation">
                        <div class="nav_profile">
                            <div class="media profile-left">
                             <?php if (Auth::check()) { ?>
                                <a class="pull-left profile-thumb" href="#">
                                    <img src="{{asset('backend/img/admin/user1.png')}}" class="img-circle" alt="User Image">
                                </a>
                                <div class="content-profile">
                                    <h4 class="media-heading">Chào, <?php if (Auth::check()) echo Auth::user()->sTen; ?></h4>
                                    <span class="text-default">Quản lý cao cấp</span>
                                </div>
                                <?php 
                     }
                    ?>
                            </div>
                        </div>
                        <?php 
                        if (Auth::check()) { 
                            $u = \App\LoaitaikhoanModel::find(Auth::user()->FK_IDLoaitaikhoan);
                            $up = explode('boss,',$u->permissions);
                            
                    ?>
              <ul class="navigation">
                  <li>
                        <a href="{!!url('admincp')!!}">
                            <i class="text-primary menu-icon fa fa-fw fa-dashboard"></i>
                             <span class="mm-text ">Trang chủ</span>
                        </a>
                   </li>
             <?php if (in_array('',$up) || Auth::user()->FK_IDLoaitaikhoan == 1 || Auth::user()->FK_IDLoaitaikhoan == 5) { ?> 
                      <li class="menu-dropdown active" >
                         <a href="#">
                            <i class="text-primary menu-icon fa fa-fw fa-dashboard"></i>
                                <span class="mm-text"> Quản lý danh mục</span>
                                <span class="fa fa-angle-down pull-right"></span>
                          </a>



                        <ul class="sub-menu"> 
                        <?php if (in_array('tin_tuc',$up) || Auth::user()->FK_IDLoaitaikhoan == 1 || Auth::user()->FK_IDLoaitaikhoan == 5) { ?>     
                        <li>
                            <a href="#">
                                 <span class="glyphicon glyphicon-duplicate" aria-hidden="true"></span> Tin tức
                                 <span class="fa arrow"></span>
                            </a>
                            <!--menu child-->
                            <ul class="sub-menu sub-submenu">

                                <li style="padding-left: 20px;">
                                    <a href="{{url('admincp/tintuc/quan_ly_tin_tuc')}}">
                                        <span class="glyphicon glyphicon-calendar" aria-hidden="true"></span>
                                        Quản lý tin tức
                                    </a>
                                </li>

                            </ul>
                            <!--menu child-->
                            <ul class="sub-menu sub-submenu">   
                                <li style="padding-left: 20px;">
                                    <a href="{{url('admincp/tintuc/them_moi_tin_tuc')}}">
                                       <span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span>
                                        Thêm mới tin tức
                                    </a>
                                </li>
                            </ul>
                            <!--menu child-->
                        </li>
                        <?php } ?>
                        </ul> 

                        <ul class="sub-menu"> 
                        <?php if (in_array('tin_tuc',$up) || Auth::user()->FK_IDLoaitaikhoan == 1 || Auth::user()->FK_IDLoaitaikhoan == 5) { ?>         
                        <li>
                            <a href="#">
                                 <span class="glyphicon glyphicon-tasks" aria-hidden="true"></span>
                                 Loại phòng
                                 <span class="fa arrow"></span>
                            </a>
                            <ul class="sub-menu sub-submenu">
     
                                <li style="padding-left: 20px;">
                                    <a href="{{url('admincp/loaiphong/quan_ly_loai_phong')}}">
                                        <span class="glyphicon glyphicon-calendar" aria-hidden="true"></span> Quản lý loại phòng
                                    </a>
                                </li>

                            </ul>
                        </li>
                        <?php } ?>
                        </ul> 

                         <ul class="sub-menu"> 
                       <?php if (in_array('tin_tuc',$up) || Auth::user()->FK_IDLoaitaikhoan == 1 || Auth::user()->FK_IDLoaitaikhoan == 5) { ?>       
                        <li>
                            <a href="#">
                                 <span class="glyphicon glyphicon-modal-window" aria-hidden="true"></span> Phòng
                                 <span class="fa arrow"></span>
                            </a>
                            <ul class="sub-menu sub-submenu">
                            <?php if (in_array('tin_tuc',$up) || Auth::user()->FK_IDLoaitaikhoan == 1 || Auth::user()->FK_IDLoaitaikhoan == 5) { ?>  
                                <li style="padding-left: 20px;">
                                    <a href="{{url('admincp/phong/quan_ly_phong')}}">
                                        <span class="glyphicon glyphicon-calendar" aria-hidden="true"></span> Quản lý phòng
                                    </a>
                                </li>
                            <?php } ?>
                            </ul>
                        </li>
                        <?php } ?>
                        </ul> 

                        <ul class="sub-menu"> 
                        <?php if (in_array('tin_tuc',$up) || Auth::user()->FK_IDLoaitaikhoan == 1 || Auth::user()->FK_IDLoaitaikhoan == 5) { ?>       
                        <li>
                            <a href="#">
                                 <span class="glyphicon glyphicon-cutlery" aria-hidden="true"></span>
                                  Dịch vụ
                                 <span class="fa arrow"></span>
                            </a>
                            <ul class="sub-menu sub-submenu">
                            <?php if (in_array('tin_tuc',$up) || Auth::user()->FK_IDLoaitaikhoan == 1 || Auth::user()->FK_IDLoaitaikhoan == 5) { ?>  
                                <li style="padding-left: 20px;">
                                    <a href="{{url('admincp/dichvu/quan_ly_dich_vu')}}">
                                        <span class="glyphicon glyphicon-calendar" aria-hidden="true"></span> Quản lý dịch vụ
                                    </a>
                                </li>
                            <?php } ?>
                            </ul>
                        </li>
                        <?php } ?>
                        </ul> 

                        <ul class="sub-menu"> 
                        <?php if (in_array('tin_tuc',$up) || Auth::user()->FK_IDLoaitaikhoan == 1 || Auth::user()->FK_IDLoaitaikhoan == 5) { ?>       
                        <li>
                            <a href="#">
                                 <span class="glyphicon glyphicon-user" aria-hidden="true"></span>  Khách hàng
                                 <span class="fa arrow"></span>
                            </a>
                            <ul class="sub-menu sub-submenu">
                            <?php if (in_array('tin_tuc',$up) || Auth::user()->FK_IDLoaitaikhoan == 1 || Auth::user()->FK_IDLoaitaikhoan == 5) { ?>  
                                <li style="padding-left: 20px;">
                                    <a href="{{url('admincp/khachhang/quan_ly_khach_hang')}}">
                                         <span class="glyphicon glyphicon-calendar" aria-hidden="true"></span> Quản lý khách hàng
                                    </a>
                                </li>
                            <?php } ?>
                            </ul>
                        </li>
                        <?php } ?>
                        </ul> 

                        

                        <ul class="sub-menu"> 
                        <?php if (in_array('tin_tuc',$up) || Auth::user()->FK_IDLoaitaikhoan == 1 || Auth::user()->FK_IDLoaitaikhoan == 5) { ?>       
                        <li>
                            <a href="#">
                                 <i class="text-default menu-icon fa fa-fw fa-users"></i> Phản hồi
                                 <span class="fa arrow"></span>
                            </a>
                            <ul class="sub-menu sub-submenu">
                            <?php if (in_array('tin_tuc',$up) || Auth::user()->FK_IDLoaitaikhoan == 1 || Auth::user()->FK_IDLoaitaikhoan == 5) { ?>  
                                <li style="padding-left: 20px;">
                                    <a href="{{url('admincp/phanhoi/quan_ly_phan_hoi')}}">
                                        <i class="text-primary fa fa-fw fa-users"></i> Quản lý phản hồi
                                    </a>
                                </li>
                            <?php } ?>
                            </ul>
                        </li>
                        <?php } ?>
                        </ul> 
                    </li><!--menu-dropdown active -->
                    <?php } ?>

                     <?php if (in_array('boss',$up) || Auth::user()->FK_IDLoaitaikhoan == 1 || Auth::user()->FK_IDLoaitaikhoan == 6) { ?> 
                      <li class="menu-dropdown active" >
                         <a href="#">
                            <i class="text-primary menu-icon fa fa-fw fa-dashboard"></i>
                                <span class="mm-text">Đặt phòng trực tuyến</span>
                                <span class="fa fa-angle-down pull-right"></span>
                          </a>
                          <!-- muc con -->
                          <ul class="sub-menu"> 
                        
                        <?php if (in_array('boss',$up) || Auth::user()->FK_IDLoaitaikhoan == 1 || Auth::user()->FK_IDLoaitaikhoan == 6) { ?>      
                        <li>
                            <a href="#">
                                 <span class="glyphicon glyphicon-compressed" aria-hidden="true"></span>
                                 Đặt phòng
                                 <span class="fa arrow"></span>
                            </a>
                            <ul class="sub-menu sub-submenu">
                                <li style="padding-left: 20px;">
                                     <a href="{{url('admincp/datphong/quan_ly_dat_phong')}}">
                                         <span class="glyphicon glyphicon-calendar" aria-hidden="true">
                                         </span> Quản lý đặt phòng
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <?php } ?>
                        </ul> 

                        <ul class="sub-menu"> 
                        
                        <?php if (in_array('boss',$up) || Auth::user()->FK_IDLoaitaikhoan == 1 || Auth::user()->FK_IDLoaitaikhoan == 6) { ?>      
                        <li>
                            <a href="#">
                                 <span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span>  Đặt dịch vụ
                                 <span class="fa arrow"></span>
                            </a>
                            <ul class="sub-menu sub-submenu">
                                <li style="padding-left: 20px;">
                                    <a href="{{url('admincp/datdichvu/quan_ly_dat_dich_vu')}}">
                                        <span class="glyphicon glyphicon-calendar" aria-hidden="true"></span>Quản lý đặt dịch vụ
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <?php } ?>
                        </ul> 
                        
                        <!--  -->
                      </li>
                    <?php } ?>


                    <!-- Bao cao thong ke  -->
                    <?php if (in_array('boss',$up) || Auth::user()->FK_IDLoaitaikhoan == 1 || Auth::user()->FK_IDLoaitaikhoan == 6) { ?> 
                      <li class="menu-dropdown active" >
                         <a href="#">
                            <i class="text-primary menu-icon fa fa-fw fa-dashboard"></i>
                                <span class="mm-text">Báo cáo, Thống kê</span>
                                <span class="fa fa-angle-down pull-right"></span>
                          </a>
                          <!-- muc con -->
                          
                        <ul class="sub-menu"> 
                             <?php if (in_array('boss',$up) || Auth::user()->FK_IDLoaitaikhoan == 1 || Auth::user()->FK_IDLoaitaikhoan == 6) { ?>   
                            <li>
                                <a href="#">
                                     <i class="fa fa-edit" style="font-size:20px"></i> Mục Báo Cáo
                                     <span class="fa arrow"></span>
                                </a>
                                <ul class="sub-menu sub-submenu">
             
                                    <li style="padding-left: 20px">
                                        <a href="{{url('admincp/datphong/lichdatphong')}}">
                                            <i class="fa fa-cubes"></i> Báo cáo lịch đặt phòng
                                        </a>
                                    </li>

                                </ul>

                                <ul class="sub-menu sub-submenu">

                                    <li style="padding-left: 20px">
                                        <a href="{{url('admincp/baocao/bao_cao_dat_dich_vu')}}">
                                            <i class="fa fa-leanpub"></i> Báo cáo đặt dịch vụ
                                        </a>
                                    </li>

                                </ul>

                                <ul class="sub-menu sub-submenu">
 
                                    <li style="padding-left: 20px">
                                        <a href="{{url('admincp/baocao/thong_ke_luong_khach_hang')}}">
                                            <i class="fa fa-leanpub"></i> Thống kê lượng khách hàng
                                        </a>
                                    </li>

                                </ul>

                            </li>
                            <?php } ?>
                            </ul> 
                        <!--  -->
                      </li>
                    <?php } ?>





                            <?php
                            if (Auth::check())
                            if (Auth::user()->FK_IDLoaitaikhoan==1 || Auth::user()->FK_IDLoaitaikhoan==4) {
                            ?>

                            <li class="menu-dropdown" >
                                <a href="#">
                                    <i class="text-primary menu-icon fa fa-sitemap"></i>
                                    <span class="mm-text">QL Người dùng</span>
                                    <span class="fa fa-angle-down pull-right"></span>
                                </a>
                                <ul class="sub-menu">
                                    <li>
                                        <a href="{{url('admincp/user/danh-muc-user')}}">
                                            <i class="text-primary fa fa-fw fa-list"></i> Quản lý người dùng
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{url('admincp/user/ql-quyen')}}">
                                            <i class="text-success fa fa-fw fa-list"></i> Quản lý quyền
                                        </a>
                                    </li>
                                </ul>
                            </li>

                            <?php
                            }
                            ?>

                            <!-- END CHỈNH SỬA MENU -->                        
                        </ul><?php } ?>   
                        <!-- / .navigation -->
                    </div>
                    <!-- menu -->
                </section>
                <!-- /.sidebar -->
            </aside>
            <aside class="right-side right-padding">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    @yield('main_title')
                </section>
                <!--section ends-->
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            @yield('content')
                        </div>
                    </div>
                </div>
                <!-- /.content -->
            </aside>
            <!-- /.right-side -->
        </div>
        <!-- /.right-side -->
        <!-- ./wrapper -->
        <!-- global js -->
        
        <!--  <script src="https://code.jquery.com/jquery-2.2.4.min.js"></script> -->
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="{{asset('backend/js/custom_js/app.js')}}" type="text/javascript"></script>
        <script src="{{asset('backend/js/custom_js/metisMenu.js')}}" type="text/javascript"></script>
        <script src="{{asset('backend/vendors/jasny-bootstrap/js/jasny-bootstrap.min.js')}}" type="text/javascript"></script>
        <script src="{{asset('backend/vendors/iCheck/icheck.min.js')}}" type="text/javascript"></script>
        <script src="{{ asset('backend/ckeditor/ckeditor.js') }}"></script>
        <script> CKEDITOR.replace( 'editor1', 
        {
        filebrowserBrowseUrl: '{{ asset('backend/ckfinder/ckfinder.html') }}',
        filebrowserImageBrowseUrl: '{{ asset('backend/ckfinder/ckfinder.html?type=Images') }}',
        filebrowserFlashBrowseUrl: '{{ asset('backend/ckfinder/ckfinder.html?type=Flash') }}',
        filebrowserUploadUrl: '{{ asset('backend/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files') }}',
        filebrowserImageUploadUrl: '{{ asset('backend/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images') }}',
        filebrowserFlashUploadUrl: '{{ asset('backend/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash') }}'
        });
       </script>
        @yield('footer_import')
        <!-- end of page level js -->
        <!-- begining of page level js -->
        <!-- end of page level js -->
    </body>
    </html>
