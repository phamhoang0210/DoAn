@extends('backend/master')
<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from dev.lorvent.com/fitness/admin_userlist.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 10 Nov 2016 10:51:54 GMT -->
<head>
    <meta charset="UTF-8">
    <title>Chi Tiết User| CMS</title>
    <link rel="shortcut icon" href="favicon.ico" />
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
    <!-- global css -->
  

 @section('header_import')

    
    <link type="text/css" href="{{asset('backend/vendors/jasny-bootstrap/css/jasny-bootstrap.css')}}" rel="stylesheet" />
    <link type="text/css" href="{{asset('backend/vendors/iCheck/skins/minimal/blue.css')}}" rel="stylesheet" />
    <link type="text/css" href="{{asset('backend/vendors/select2/css/select2.css')}}" rel="stylesheet" />
    <link type="text/css" href="{{asset('backend/vendors/select2/css/select2-bootstrap.min.css')}}" rel="stylesheet" />
    <link type="text/css" href="{{asset('backend/vendors/bootstrapvalidator/dist/css/bootstrapValidator.css')}}" rel="stylesheet" />
    <link type="text/css" href="{{asset('backend/vendors/sweetalert/dist/sweetalert2.css')}}" rel="stylesheet" />
    <link type="text/css" href="{{asset('backend/css/custom_css/add_users.css')}}" rel="stylesheet" />
    <!-- end of global css -->
    <!--page level css -->
    <!--end of page level css-->
    @stop
</head>

<body>


    @section('content')
            <section class="content-header">
                <!--section starts-->
                <ol class="breadcrumb">
                    <li>
                        <a href="{{url('admincp/')}}">
                            <i class="fa fa-fw fa-home"></i> Trang Chủ
                        </a>
                    </li>
                    <li>
                        <a href="{{url('admincp/user/danh-muc-user/')}}">Quản lý người dùng</a>
                    </li>
                    <li>
                        <a href="{{url('admincp/user/chi-tiet-user/'.$user->id)}}" class="activated">Chi Tiết User</a>
                    </li>
                </ol>
            </section>
            <!--section ends-->
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <!-- Basic charts strats here-->
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                <i class="fa fa-fw fa-user"></i> Chi Tiết User:&nbsp; {{$user->email }} - {{ $user->sTen }}
                            </h4>
                                <span class="pull-right">
                                    <i class="glyphicon glyphicon-chevron-up showhide clickable"></i>
                                    <i class="glyphicon glyphicon-remove removepanel"></i>
                                </span>
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-md-12">
										
                                    <a class="edit btn btn-primary" href="{{url('admincp/user/user_sua/'.$user->id)}}">
                    Cập Nhật</a>
							
                                    <table class="table table-bordered" >

                <tr class="active">
                    <th width="600">Email</th><th>{{$user->email}}</th>
                    </tr><tr>
                    <th>Tên</th><th>{{$user->sTen}}</th>
                    </tr><tr class="active">
                    <th>Vai trò</th><th>
    				<?php for ($i=0; $i<count($user_types); $i++) 
    							if ($user_types[$i]->id==$user->FK_IDLoaitaikhoan) {
    								echo $user_types[$i]->sTen;
    							}
    					?>
    				</th>
                </tr>
           
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        
                          
    </div><!-- /.container -->
    @stop
    @section('footer_import')
    <script src="{{asset('backend/vendors/holder/holder.js')}}" type="text/javascript"></script>
    <script src="{{asset('backend/vendors/jasny-bootstrap/js/jasny-bootstrap.js')}}" type="text/javascript"></script>
    <script src="{{asset('backend/vendors/iCheck/icheck.js')}}" type="text/javascript"></script>
    <script src="{{asset('backend/vendors/select2/js/select2.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('backend/vendors/bootstrapvalidator/dist/js/bootstrapValidator.js')}}" type="text/javascript"></script>
    <script src="{{asset('backend/vendors/sweetalert/dist/sweetalert2.js')}}" type="text/javascript"></script>
    <script src="{{asset('backend/js/custom_js/add_users.js')}}" type="text/javascript"></script>

    <!-- end of page level js -->
    <!-- begining of page level js -->
    @stop
</body>
</html>

