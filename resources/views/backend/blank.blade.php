@extends('backend/master')
<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from dev.lorvent.com/fitness/admin_userlist.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 10 Nov 2016 10:51:54 GMT -->
<head>
    <meta charset="UTF-8">
    <title>CMS</title>
    <link rel="shortcut icon" href="favicon.ico" />
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]-->
    @section('header_import')
    <script src="http://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="http://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <!--[endif]-->
    <!-- global css -->
    <link href="{{asset('backend/vendors/air-datepicker-master/dist/css/datepicker.min.css')}}" rel="stylesheet" type="text/css">
    <link type="text/css" href="{{asset('backend/vendors/jquery-circliful/css/jquery.circliful.css')}}" rel="stylesheet">
    <!-- <link rel="stylesheet" type="text/css" href="vendors/jquery-plugin-circliful-master/css/jquery.circliful.css"> -->
    <link type="text/css" href="{{asset('backend/vendors/progressbar/css/bootstrap-progressbar.min.css')}}" rel="stylesheet">
    <link type="text/css" href="{{asset('backend/vendors/fullcalendar/css/fullcalendar.css')}}" rel="stylesheet">
    <link type="text/css" href="{{asset('backend/vendors/select/dist/css/bootstrap-select.min.css')}}" rel="stylesheet">
    <link type="text/css" href="{{asset('backend/css/custom_css/calendar_custom.css')}}" rel="stylesheet">
    <link type="text/css" href="{{asset('backend/vendors/sweetalert/dist/sweetalert2.css')}}" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="{{asset('backend/vendors/nvd3chart/nv.d3.min.css')}}">
    <link type="text/css" href="{{asset('backend/css/custom_css/fitness.css')}}" rel="stylesheet" />
    <link type="text/css" href="{{asset('backend/css/custom_css/panel.css')}}" rel="stylesheet" />
    <link type="text/css" href="{{asset('backend/css/custom_css/admin_dashboard.css')}}" rel="stylesheet">

    
    @stop
	
		<!--end of page level css-->
</head>

<body>


    @section('content')
                <div class="row bg-color">
                    <div class="col-lg-4">
                        <div class="box-model">
                            <h4>Run Time</h4>
                            <div class="row">
                                <div class="col-lg-10 col-xs-12">
                                    <div class="amount">
                                        <span class="pull-right">%</span><span id="pending_amount" class="pull-right">30</span>
                                        </p>
                                        <div class="progress progress-striped active">
                                            <div class="progress-bar progress-bar-primary"></div>
                                        </div>
                                        <span class="pull-right">%</span><span id="fifty" class="pull-right">50</span>
                                        </p>
                                        <div class="progress progress-striped active">
                                            <div class="progress-bar progress-bar-success"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="box-model">
                            <h4>Users</h4>
                            <div class="row">
                                <div class=" col-lg-12 col-xs-12">
                                    <div class="registered bg-primary">
                                        <div class="row">
                                            <div class="col-lg-4 col-xs-4">
                                                <h3 id="userscount"></h3>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="registered bg-success">
                                        <div class="row">
                                             <div class="col-lg-4 col-xs-4">
                                                <h3 id="myTargetElement4.2"></h3>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="registered bg-warning">
                                        <div class="row">
                                                    <div class="col-lg-4 col-xs-4">
                                                <h3 id="myTargetElement4.1"></h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="box-model">
                            <div class="row">
                                <div class=" col-lg-12 col-xs-12">
                                    <div class="example">
                                        <div class="example--label"></div>
                                        <div class="example-content">
                                            <div class="list-inline">
                                                <div>
                                                    <div id="custom-cells"></div>
                                                </div>
                                     
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="box-model">
                                    <h4>Welcome Amin!</h4>
                                    <h2 style="padding-left: 10px;">
                                       <?php 
                                         if( Auth::user()->FK_IDLoaitaikhoan==1)
                                          echo 'Quản lý' ;
                                         if( Auth::user()->FK_IDLoaitaikhoan==4)
                                          echo 'Bộ phận quản trị hệ thống' ;
                                         if( Auth::user()->FK_IDLoaitaikhoan==5)
                                          echo 'Bộ phận quản quản lý nội dung' ;
                                         if( Auth::user()->FK_IDLoaitaikhoan==6)
                                          echo 'Bộ phận hành chính' ;
                                      ?>
                                    </h2>
                                    <p class="img" style="text-align: center;">
                                        <img src="{{asset('Frontend/images/logo.png')}}">
                                    </p>
                                    <p class="tite" style="text-align: center; font-weight: bold; font-size: 50px; color: #ffd202; padding-top: 20px;">POONSA HANOI HOTEL
                                    </p>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="box-model">
                                    <p>
                                         <img src="{{asset('Frontend/images/backgroundservice.png')}}" width="100%">
                                    </p>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="box-model" style="background-color: #1dfbde;">
                                    <p style="font-weight: bold; color: red; font-size: 30px;">poonsahotel.com</p>
                                 </div>
                            </div>
                            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h4 class="modal-title" id="myModalLabel">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="panel panel-primary">
                                    <div class="panel-body text-center">
                                        <h1 id="fb"></h1>
                                        <p>LIKES</p>
                                    </div>
                                </div>
                                <div class="panel panel-info">
                                     <div class="panel-body text-center">
                                        <h1 id="tw"></h1>
                                        <p>FOLLOWERS</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

    @stop
    @section('footer_import')
    <script src="{{asset('backend/js/custom_js/backstretch.js')}}"></script>
    <!-- end of global level js -->
    <script src="{{asset('backend/vendors/jquery-circliful/js/jquery.circliful.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('backend/vendors/progressbar/bootstrap-progressbar.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('backend/vendors/countUp/countUp.js')}}" type="text/javascript"></script>    
    <script src="{{asset('backend/vendors/moment/min/moment.min.js')}}" type="text/javascript"></script>
    <!-- date picker -->
    <script src="{{asset('backend/vendors/air-datepicker-master/dist/js/datepicker.min.js')}}"></script>
    <script src="{{asset('backend/vendors/air-datepicker-master/dist/js/i18n/datepicker.en.js')}}"></script>
    <!-- date picker end -->
    <script src="{{asset('backend/vendors/sweetalert/dist/sweetalert2.js')}}" type="text/javascript"></script>
    <script src="{{asset('backend/vendors/fullcalendar/fullcalendar.js')}}" type="text/javascript"></script>
    <script src="{{asset('backend/vendors/d3-chart/d3.v3.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('backend/vendors/nvd3chart/nv.d3.min.js')}}" type="text/javascript"></script>    
    <script type="text/javascript" src="{{asset('backend/vendors/jquery-easy-ticker-master/jquery.easy-ticker.min.js')}}"></script>
    <script src="{{asset('backend/vendors/inputmask/inputmask/inputmask.js')}}" type="text/javascript"></script>
    <script src="{{asset('backend/vendors/inputmask/inputmask/jquery.inputmask.js')}}" type="text/javascript"></script>
    <script src="{{asset('backend/vendors/inputmask/inputmask/inputmask.date.extensions.js')}}" type="text/javascript"></script>
    <script src="{{asset('backend/js/custom_js/admin_index.js')}}" type="text/javascript"></script>

    @stop
</body>
</html>

