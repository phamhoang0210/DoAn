@extends('backend/master')
<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from dev.lorvent.com/fitness/admin_userlist.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 10 Nov 2016 10:51:54 GMT -->
<head>
    <meta charset="UTF-8">
    <title>Login | CMS</title>
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

 

    
    <script src="{{asset('backend/js/jquery.min.js')}}" type="text/javascript"></script>
   
    <link type="text/css" href="{{asset('backend/vendors/x-editable/css/bootstrap-editable.css')}}" rel="stylesheet" />
    <link type="text/css" href="{{asset('backend/vendors/summernote/summernote.css')}}" rel="stylesheet" media="screen" />
    
    <link type="text/css" href="{{asset('backend/vendors/jasny-bootstrap/css/jasny-bootstrap.min.css')}}" rel="stylesheet">
    <link type="text/css" href="{{asset('backend/vendors/datatables/css/dataTables.bootstrap.css')}}" rel="stylesheet" />
    <link type="text/css" href="{{asset('backend/vendors/sweetalert/dist/sweetalert2.css')}}" rel="stylesheet" />
    <link type="text/css" href="{{asset('backend/css/custom_css/club_info.css')}}" rel="stylesheet" />
    <link type="text/css" href="{{asset('backend/css/custom_css/users_list.css')}}" rel="stylesheet" />
  
    @stop
	
		<!--end of page level css-->
</head>

<body>


    @section('content')
            <section class="content-header">
                <!--section starts-->
                <h2>Login</h2>
                <ol class="breadcrumb">
                    <li>
                        <a href="{{url('admincp/')}}">
                            <i class="fa fa-fw fa-home"></i> Trang Chủ
                        </a>
                    </li>
                    <li>
                        <a href="#">Người dùng</a>
                    </li>
                    <li>
                        <a href="{{url('admincp/login')}}">Login</a>
                    </li>
                </ol>
            </section>
            <!-- Content Header (Page header) -->
            <div class="container-fluid">
        <div class="row">
                    <div class="col-lg-12">
                        <!-- Basic charts strats here-->
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                        <i class="fa fa-fw fa-file-text-o"></i>  Login
                    </h4>
                                <span class="pull-right">
                                    <i class="glyphicon glyphicon-chevron-up showhide clickable"></i>
                                    <i class="glyphicon glyphicon-remove removepanel"></i>
                                </span>
                            </div>
                            <div class="panel-body table-responsive">


                              
                   <form   action="{{url('admincp/login') }}" method="POST" role="search">
                        {{ csrf_field() }}
                        <div class="input-group col-md-12 ">
                             Email:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type="text" name="email" value="">
                			 <br/>
                            <br/>
                             Password: <input type="password" name="password" value="">
                             <br/><br/>
                             <input type="submit" value="Submit">
                            
                                </div>
                    
                                                
                    </form>
 </div>
 </div>     
      </div>
      </div>
      
        
                          
    </div><!-- /.container -->
    @stop
    @section('footer_import')
     
    
    <script src="{{asset('backend/js/custom_js/bootstrap-datepicker.js')}}" type="text/javascript"></script>
    <script src="{{asset('backend/vendors/holder/holder.js')}}" type="text/javascript"></script>
    <!-- end of page level js -->
    <!-- begining of page level js -->
    
    <script src="{{asset('backend/vendors/jasny-bootstrap/js/jasny-bootstrap.js')}}" type="text/javascript"></script>
    <script src="{{asset('backend/vendors/x-editable/jquery.mockjax.js')}}" type="text/javascript"></script>
    <script src="{{asset('backend/vendors/x-editable/bootstrap-editable.js')}}" type="text/javascript"></script>
    <script src="{{asset('backend/vendors/x-editable/js/html5types.js')}}" type="text/javascript"></script>
    <script src="{{asset('backend/vendors/summernote/summernote.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('backend/vendors/jasny-bootstrap/js/inputmask.js')}}" type="text/javascript"></script>
    <script src="{{asset('backend/vendors/jasny-bootstrap/js/jquery.inputmask.js')}}" type="text/javascript"></script>
    <script src="{{asset('backend/vendors/x-editable/js/demo-mock.js')}}" type="text/javascript"></script>  
    
    <script src="{{asset('backend/vendors/datatables/js/jquery.dataTables.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('backend/vendors/datatables/js/dataTables.bootstrap.js')}}" type="text/javascript"></script>
    <script src="{{asset('backend/vendors/jasny-bootstrap/js/jasny-bootstrap.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('backend/vendors/sweetalert/dist/sweetalert2.js')}}" type="text/javascript"></script>
    <script src="{{asset('backend/js/custom_js/club_info.js')}}" type="text/javascript"></script>
    <script src="{{asset('backend/js/custom_js/users_list.js')}}" type="text/javascript"></script>
    
    

    
    @stop
</body>
</html>

