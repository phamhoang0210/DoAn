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
                        <i class="fa fa-fw fa-file-text-o"></i> Cập nhật chi tiết đặt phòng
                    </h4>
                                <span class="pull-right">
                                    <i class="glyphicon glyphicon-chevron-up showhide clickable"></i>
                                    <i class="glyphicon glyphicon-remove removepanel"></i>
                                </span>
                        </div>

        <div class="panel-body table-responsive">
        <div class="chitiet">
                <h4 style="padding-top: 20px;">Chi Tiết Đặt Phòng :</h4>
                <div class="datphong" style="border: 4px dotted blue; padding: 5px;">
	                <div class="row">
		                <div class="col-xs-12 col-md-12">
			                <div class="loaiphong" style="border: 1px solid #000;box-shadow: 1px 3px 3px 5px #888888">
			                    <div class="row">
			                    	<div class="col-md-3">
			                    		<p style="font-size: 20px; padding-top: 10px;">Định danh:<span style="color: red;font-weight: bold;"> {{$khachhang[0]->sDinhdanh}}</span> 
			                    	</div>
			                    </div>
			                    <div class="row">
			                    	<div class="col-md-2">
			                    		<h3 style="font-size: 20px; padding-top: 10px;">Họ & Tên:</h3> 
			                    		<p style="font-size: 20px;color: #21b3ff;font-weight: bold;"> {{$khachhang[0]->sTenKH}}</p>
			                    	</div>
			                    	<div class="col-md-2">
			                    		<h3 style="font-size: 20px; padding-top: 10px;">Ngày sinh:</h3> 
			                    		 <span style="font-size: 20px; color: #21b3ff;font-weight: bold;">
                                          <?php 
                                                  $date="{$khachhang[0]->dNgaysinh}";
                                                  $intdate= strtotime($date);
                                                  echo date('d/m/Y',$intdate); 
                                            ?> 
			                    		</span>  
			                    	</div>
			                    	<div class="col-md-2">
			                    		<h3 style="font-size: 20px; padding-top: 10px;">Giới tính: </h3>
			                    		<p style="font-size: 20px; color: #21b3ff;font-weight: bold;">
                                           @if($khachhang[0]->iGioitinh==1)
                                            {{'Nam'}} 
                                           @else
                                             {{'Nữ'}}
                                           @endif
			                    		</p>  
			                    	</div>
			                    	<div class="col-md-2">
			                    		<h3 style="font-size: 20px; padding-top: 10px;">SĐT: </h3>
			                    		<p style="font-size: 20px; color: #21b3ff;font-weight: bold;">
                                           {{$khachhang[0]->sSDT}}
			                    		</p>  
			                    	</div>
			                    	<div class="col-md-2">
			                    		<h3 style="font-size: 20px; padding-top: 10px;">Quốc tịch: </h3>
			                    		<p style="font-size: 20px; color: #21b3ff;font-weight: bold;">
                                           {{$khachhang[0]->sQuoctich}}
			                    		</p>  
			                    	</div>
			                    		<div class="col-md-2">
			                    		<h3 style="font-size: 20px; padding-top: 10px;">Địa chỉ: </h3>
			                    		<p style="font-size: 16px; color: #21b3ff;font-weight: bold;">
                                           {{$khachhang[0]->sDiachi}}
			                    		</p>  
			                    	</div>
			                    </div>
			                    <div class="row">
			                       <div class="col-md-3" style="margin-bottom: 10px;">
			                    	  <a href="{{url('admincp/datphong/datloaiphongmoi/'.$khachhang[0]->sDinhdanh)}}" style="margin-bottom: 10px; background: #ffea02; border-radius: 4px; color: black;"><i class="fa fa-arrows"></i> Đặt loại phòng mới</a>
			                        </div>
			                    </div>
			                </div>
		                </div>
		            </div><!--row-->
		            @foreach($datphong as $value)
		            @if($value->iTrangthaidat==1 || $value->iTrangthaidat==2)
		            <div class="box_room" style="border:1px solid #3b00c2; margin-top: 20px;">
			            <div class="row">
			               <div class="col-xs-12 col-md-6">
	                        <h2 style="padding-top: 10px; padding-left: 10px; font-size: 18px;"> Loại phòng đã đặt:</h2>
				               <div class="loaiphong" style="border-radius: 10px; background: #a7d1e7;">
		                            <div class="row">
		                            	<div class="col-md-3">
		                            		<img src="{{asset('/upload/images/'.$value->loaiphong->sHinhanh)}}" width="100%" style="padding-left: 10px; padding-top: 10px;">
		                            	</div>
		                            	<div class="col-md-3">
		                            		<label>Tên loại phòng:</label>
		                            		<p style="color:#040a26;font-weight: bold;font-size: 15px; color: #fb5300; ">{{$value->loaiphong->sTenLP}}</p>
		                            	</div>
		                                <div class="col-md-3">
		                            		<label>Số phòng đặt:</label>
		                            		<p style="color:#040a26;font-weight: bold;font-size: 18px;">{{$value->iSoluongphong}}</p>
		                            	</div>
		                            		<div class="col-md-3">
		                            		<label style="">Số lượng người:</label>
		                            		<p style="color:#040a26;font-weight: bold;font-size: 18px;">{{$value->iSoluongnguoi}}</p>
		                            	</div>
		                            </div>
		                            <div class="row">
		                            	<div class="col-md-4">
		                            		<label style="padding-left: 10px; font-size: 15px;">Ngày đến:
		                            		  <span style="font-weight: bold;">
                                                <?php 
                                                  $date="{$value->dNgayden}";
                                                  $intdate= strtotime($date);
                                                  echo date('d/m/Y',$intdate); 
                                                ?> 
		                            		  </span>
		                            		</label>
		                            	</div>
		                            	<div class="col-md-4">
		                            		<label style="padding-left: 10px; font-size: 15px;">Ngày đi:
		                            		  <span style="font-weight: bold;">
		                            		  	 <?php 
                                                  $date="{$value->dNgaydi}";
                                                  $intdate= strtotime($date);
                                                  echo date('d/m/Y',$intdate);
                                                ?> 
		                            		  </span>
		                            		</label>
		                            	</div>
		                            </div>
			                   </div><!--loaiphong-->
			                   <div class="phongdachon">
				                   <div class="row">
				                   		<div class="col-md-12">
				                   		<h3>
				                   		<label>Phòng đã đặt:</label>
				                   		 {{$soluong[0]->c}}
				                   	    </h3>
				                   		</div>
				                   	@foreach($phongdadat as $pdd)
				                    @if($pdd->FK_IDDatphong==$value->id)
				                   	<div class="col-md-3">
				               	 	   <div class="phong" style="border: 1px solid black; margin-bottom: 20px;">
				               	 		<form action="{{url('admincp/datphong/huychonphong/'.$khachhang[0]->sDinhdanh)}}" method="post">
				               	 			  <input type="hidden" name="_token" value="{{csrf_token()}}">
				               	 			  <input type="hidden" name="FK_IDDatphong" value="{{$value->id}}">
				               	 			  <input type="hidden" name="FK_IDPhong" value="{{$pdd->id}}">
				               	 			   <input type="hidden" name="id" value="{{$pdd->ID_CTdatphong}}">
				                     	 		<lable>Tên phòng: {{$pdd->sTenP}}</lable>
			                                    @if($pdd->iTrangthai==0)
				               	 				 <p style="font-size: 18px;">
						                            <span class="label label-primary">Đã đặt</span>
						                         </p>
						                        @endif
						                         <button
	  					                          type="submit" class="btn" onclick="return confirm('Bạn có muốn hủy phòng không?')">Hủy</button>
				               	 			</form>
				               	 	    </div>
			               	 	     </div>
	                                 @endif
			               	 	     @endforeach
				                   </div>
			                   </div>
		                   </div>
		                   <!-- hien danh sach phong -->
		                   <div class="col-xs-12 col-md-6">
			               	<h2 style="padding-top: 10px; padding-left: 10px; font-size: 18px;"> Danh sách phòng:</h2> 

			               	 <div class="row">
			               	 	@foreach($phong as $p)
			               	 	@if($p->FK_IDLoaiphong==$value->FK_IDLoaiphong)
			               	 	<div class="col-md-3">
			               	 	   <div class="phong" style="border: 1px solid black; margin-bottom: 20px;">
			               	 			<form action="{{url('admincp/datphong/chitietdatphong/'.$khachhang[0]->sDinhdanh)}}" method="post">
			               	 			  <input type="hidden" name="_token" value="{{csrf_token()}}">
			               	 			  <input type="hidden" name="FK_IDDatphong" value="{{$value->id}}">
			               	 			  <input type="hidden" name="FK_IDPhong" value="{{$p->id}}">
			                     	 		<lable>Tên phòng: {{$p->sTenP}}</lable>
			               	 				 @if($p->iTrangthai==1)
			               	 				 <p style="font-size: 18px;">
					                            <span class="label label-success">Phòng trống</span>
					                         </p>
					                         @endif
					                         @if($p->iTrangthai==0)
			               	 				 <p style="font-size: 18px;">
					                            <span class="label label-danger">Hết phòng</span>
					                         </p>
					                         @endif				                        
					                         <button
                                               @if($p->iTrangthai==0)
                                                   {{"disabled"}}
                                               @endif
					                          type="submit" class="btn">Đặt</button>
			               	 			</form>
			               	 	    </div>
			               	 	</div>
			               	 	@endif
			               	    @endforeach
			               </div>
			            </div><!--row-->
			          </div><!--box_room-->
	                </div><!--datphong-->
			        @endif
	                @endforeach
	            

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


