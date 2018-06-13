@extends('backend/master')
<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from dev.lorvent.com/fitness/admin_userlist.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 10 Nov 2016 10:51:54 GMT -->
<head>
    <meta charset="UTF-8">
    <title>Danh mục người dùng | CMS</title>
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
    
    <link type="text/css" rel="stylesheet" href="{{asset('backend/css/custom_css/panel.css')}}" />
    <link type="text/css" href="{{asset('backend/vendors/jasny-bootstrap/css/jasny-bootstrap.min.css')}}" rel="stylesheet">
    <link type="text/css" href="{{asset('backend/vendors/datatables/css/dataTables.bootstrap.css')}}" rel="stylesheet" />
    <link type="text/css" href="{{asset('backend/vendors/sweetalert/dist/sweetalert2.css')}}" rel="stylesheet" /> 
   
    <link type="text/css" href="{{asset('backend/css/custom_css/users_list.css')}}" rel="stylesheet" />

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
                        <a href="#">Đặt Phòng</a>
                    </li>
                    <li>
                        <a href="{{url('admincp/datphong/quan_ly_dat_phong')}}">Quản lý đặt phòng</a>
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
                        <i class="fa fa-fw fa-file-text-o"></i> Hóa đơn đặt phòng
                    </h4>
                                <span class="pull-right">
                                    <i class="glyphicon glyphicon-chevron-up showhide clickable"></i>
                                    <i class="glyphicon glyphicon-remove removepanel"></i>
                                </span>
                        </div>

        <div class="panel-body table-responsive">
        <div class="chitiet">
                <div class="datphong">
                	<!-- style="border: 4px dotted blue; padding: 5px; -->
	                <div class="row">
		                <div class="col-md-8 col-md-offset-2">
			                <div class="hoadon" style="border: 1px solid #000;box-shadow: 1px 3px 3px 5px #888888; padding-left: 10px; padding-right: 10px;">
			                	<div class="row">
			                    	  <div class="col-md-3" style="padding-left: 20px;padding-top: 30px;">
			                    	  	  <p style="text-align: center;">
			                    	  	  	<img src="{{asset('frontend/images/logo.png')}}" width="50px;">
			                    	  	  </P>
			                    	  	 <p style="font-weight: bold;color: #ffd800;text-align: center;font-size: 15px;">POONSA HANOI HOTEL</p>
			                    	  </div>
                                      <div class="col-md-5 col-md-offset-4" style="padding-left: 20px;padding-top: 30px;text-align: center; color: blue; ">
                                      	<p>DC: Số 36C Dịch Vọng Hậu, Cầu Giấy, Hà Nội</p>
                                      	<p style="font-size: 12px;">SĐT: 0985587882 - email: doms.poonsa@gmail.com</P>

                                      </div>
			                    </div>
			                    <div class="row">
			                    	<div class="col-md-12">
			                    		<h1 style="text-align: center; text-transform: uppercase;">Hóa đơn đặt phòng</h1>
			                    	</div>
			                    </div>
			                    <div class="row" style="border-bottom: 4px dotted blue;">
			                    	<div class="col-md-12">
			                    		<p style="">Ngày lập: 26/04/2018</p>
			                    	</div>
			                    </div>
			                    <div class="row" style="padding-top: 20px;">
			                    	<div class="col-md-3">
			                    		<p>Khách hàng:</p>
			                    	</div>
			                    </div>
			                    <div class="row">
			                    	<div class="col-md-3">
			                    		<p>Định danh:<span style="color: red;font-weight: bold;"> {{$datphong[0]->khachhang->sDinhdanh}}</span> 
			                    	</div>
			                    </div>
			                    <div class="row" style="border-bottom: 4px dotted blue;">
			                    	<div class="col-md-3" style="padding-left: 30px;">
			                    		<p>Họ & Tên:</p> 
			                    		<p style="font-size: 15px;color: #21b3ff;font-weight: bold;"> {{$datphong[0]->khachhang->sTenKH}}</p>
			                    	</div>
			                    	<div class="col-md-2">
			                    		<p>Ngày sinh:</p> 
			                    		 <span style="font-size: 15px; color: #21b3ff;font-weight: bold;">
                                          <?php 
                                                  $date="{$datphong[0]->khachhang->dNgaysinh}";
                                                  $intdate= strtotime($date);
                                                  echo date('d/m/Y',$intdate); 
                                            ?> 
			                    		</span>  
			                    	</div>
			                    	<div class="col-md-2">
			                    		<p>Giới tính: </p>
			                    		<p style="font-size: 15px; color: #21b3ff;font-weight: bold;">
                                           @if($datphong[0]->khachhang->iGioitinh==1)
                                            {{'Nam'}} 
                                           @else
                                             {{'Nữ'}}
                                           @endif
			                    		</p>  
			                    	</div>
			                    	<div class="col-md-2">
			                    		<p>Quốc tịch: </p>
			                    		<p style="font-size: 15px; color: #21b3ff;font-weight: bold;">
                                           {{$datphong[0]->khachhang->sQuoctich}}
			                    		</p>  
			                    	</div>
			                    	<div class="col-md-3">
			                    		<p>Địa chỉ: </p>
			                    		<p style="font-size: 15px; color: #21b3ff;font-weight: bold;">
                                           {{$datphong[0]->khachhang->sDiachi}}
			                    		</p>  
			                    	</div>
			                    </div>
			                    <div class="row" style="padding-top: 20px;">
			                    	<div class="col-md-3">
			                    		<p>Đơn thuê phòng:</p>
			                    	</div>
			                    </div>
			                    @foreach($datphong as $value)
			                    <div class="row">
			                    	<div class="col-md-4">
			                    		<p>Tên loại phòng: </p>
			                    		<p style="font-size: 15px; color: #21b3ff;font-weight: bold;">
			                    			{{$value->loaiphong->sTenLP}}
			                    		</p>  
			                    	</div>
			                    	<div class="col-md-2">
			                    		<p>Số phòng: </p>
			                    		<p style="font-size: 15px; color: #21b3ff;font-weight: bold;">
                                           {{$value->iSoluongphong}}
			                    		</p>  
			                    	</div>
			                    	<div class="col-md-2">
			                    		<p>Số khách: </p>
			                    		<p style="font-size: 15px; color: #21b3ff;font-weight: bold;">
                                           {{$value->iSoluongnguoi}}
			                    		</p>  
			                    	</div>
			                    	<div class="col-md-2">
			                    		<p>Ngày đến: </p>
			                    		<p style="font-size: 15px; color: #21b3ff;font-weight: bold;">
                                             <?php 
                                                  $date="{$value->dNgayden}";
                                                  $intdate= strtotime($date);
                                                  echo date('d/m/Y',$intdate); 
                                               ?> 
			                    		</p>  
			                    	</div>
			                    		<div class="col-md-2">
			                    		<p>Ngày đi: </p>
			                    		<p style="font-size: 15px; color: #21b3ff;font-weight: bold;">
                                              <?php 
                                                  $date="{$value->dNgaydi}";
                                                  $intdate= strtotime($date);
                                                  echo date('d/m/Y',$intdate); 
                                               ?> 
			                    		</p>  
			                    	</div>
			                    </div>
			                    @endforeach
			                    <div class="row" style="padding-top: 10px; ">
			                    	<div class="col-md-12">
			                    		<label>Phòng đã thuê:</label>
			                    		@foreach($ctphong as $value)
			                    		<label style="border: 1px solid black; padding: 2px 10px;">
			                    			{{$value->phong->sTenP}}
			                    		</label>
			                    		@endforeach
			                    	</div>
			                    </div>
			                    <div class="row" style="border-top: 4px dotted blue;">
			                    	<div class="col-md-12" style="padding-top: 20px;">
			                    		<p>Thành tiền:<span style="color: red;"> 
			                    		     <?php
                                                  $gia="{$tongtiendat}";
                                                  $float=(int)$gia;
                                                  echo number_format("$float");
                                                ?></span> VNĐ</p>
			                    	</div>
			                    </div>
			                    <div class="row" style="padding-top: 20px">
			                    	<div class="col-md-12" style="text-align: center;">
			                    		<p style="color: blue;">hóa đơn đặt phòng đã hoàn thành<p>
			                    			<p>-----o0o------</p>
			                    	</div>
			                    </div>
			                </div>
		                </div>
		            </div><!--row-->
		        </div><!--datphong-->
        </div><!--chitiet-->
 
        </div>  
        </div>

      </div>
      </div>
                    
    </div><!-- /.container -->

    @stop
    @section('footer_import')
    <script src="{{asset('backend/vendors/datatables/js/jquery.dataTables.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('backend/vendors/datatables/js/dataTables.bootstrap.js')}}" type="text/javascript"></script>
    <script src="{{asset('backend/vendors/jasny-bootstrap/js/jasny-bootstrap.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('backend/vendors/sweetalert/dist/sweetalert2.js')}}" type="text/javascript"></script>
    <script src="{{asset('backend/js/custom_js/users_list.js')}}" type="text/javascript"></script> 

    <!-- end of page level js -->
    <!-- begining of page level js -->
    @stop
</body>
</html>


