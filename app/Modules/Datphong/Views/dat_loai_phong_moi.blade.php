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
                        <i class="fa fa-fw fa-file-text-o"></i> Đặt loại phòng mới
                    </h4>
                                <span class="pull-right">
                                    <i class="glyphicon glyphicon-chevron-up showhide clickable"></i>
                                    <i class="glyphicon glyphicon-remove removepanel"></i>
                                </span>
                        </div>

        <div class="panel-body table-responsive">

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
                                           @if($khachhang[0]->iGioithinh==1)
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

              </div>
              <div class="left-booking">
                            <form action="{{url('admincp/datphong/datloaiphong')}}" method="post">
                                <input type="hidden" name="_token" value="{{csrf_token()}}">
                                <!-- FK_Khachhang -->
                                <input type="hidden" name="FK_IDKhachhang" value="{{$khachhang[0]->id}}">
                                <input type="hidden" name="sDinhdanh" value="{{$khachhang[0]->sDinhdanh}}">
                                <h1 style="padding-top: 20px; padding-bottom: 10px;">I thông tin đặt phòng</h1>
                                <div class="row">
                                    <div class="col-xs-12 col-md-4">
                                        <div class="form-group">
                                            <label>Loại phòng:</label>
                                             <p>
                                                <select id="loaiphong" name="FK_IDLoaiphong">
                                                   @foreach($loaiphong as $value)
                                                      <option value="{{$value->id}}">{{$value->sTenLP}}</option>
                                                    @endforeach
                                               </select>
                                            </p>
                                        </div>
                                    </div>
                                    
                                    <div class="col-xs-12 col-md-4">        
                                        <div class="form-group">
                                            <label>Ngày đến:</label>
                                            <p><input id="startDate" type="date" name="dNgayden"></p>
                                        </div>
                                    </div>
                                    
                                    <div class="col-xs-12 col-md-4"> 
                                        <div class="form-group">
                                            <label>Ngày đi:</label>
                                            <p><input id="endDate" type="date" name="dNgaydi"></p>
                                        </div>
                                    </div>
                                </div>  
                                <hr>
                                <div class="row">
                                     <div class="col-xs-12 col-md-4">
                                           <div class="form-group">
                                            <label>Số lượng phòng:</label>
                                            <select name="isoluongphong" id="iSoluongphong" required>
                                                  <option value="">--Chưa chọn--</option>
                                               
                                            </select>
                                        </div>
                                     </div>
                                    
                                     <div class="col-xs-12 col-md-4">
                                        <div class="form-group">
                                            <label>Số người:</label>
                                            <select name="iSoluongnguoi">
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                                <option value="6">6</option>
                                                <option value="7">7</option>
                                                <option value="8">8</option>
                                                <option value="9">9</option>
                                                <option value="10">10</option>
                                                <option value="11">11</option>
                                                <option value="12">12</option>
                                                <option value="13">13</option>
                                                <option value="14">14</option>
                                                <option value="15">15</option>
                                              </select>
                                        </div>
                                     </div>
                                    
                                     <div class="col-xs-12 col-md-4">
                                             <div class="form-group">                       
                                                    <label>Kiểu phòng: </label>
                                                    <p>
                                                        <label class="radio-inline">
                                                            <input type="radio" name="iKieuphong" value="1">Giường đơn
                                                        </label>
                                                        <label class="radio-inline">
                                                            <input type="radio" name="iKieuphong" value="0">Giường đôi
                                                        </label>   
                                                    </p>
                                            </div>
                                        </div>
                                </div>
                                <!--thông tin giá phòng--> 
                                <div class="row">
                                    <div class="col-xs-12 col-md-12">
                                        <p class="price-room">Giá phòng:<lable id="gia"></lable>  VND</p>
                                    </div>
                                </div>
                                <!--thông tin tổng tiền-->
                                <div class="row">
                                    <div class="col-xs-12 col-md-12">
                                        <p class="total">Tổng tiền: <lable id="tongtien"></lable>  VND</p>
                                    </div>
                                </div>
                                <div class="row">
                                	<div class="col-md-12">
                                	    <button type="submit" class="btn btn-success">Đặt phòng</button>
                                    </div>
                                </div>
 
        </div>  
        </div>

      </div>
      </div>
                    
    </div><!-- /.container -->
    <script type="text/javascript">
            $(document).ready(function(){
                //
                    $('#loaiphong').change(function(){
                    var loaiphong=($("#loaiphong").val())
                    $.ajax({
                        type:'get',
                        url:"../sophong/"+loaiphong,
                        success:function(data){
                           $("#iSoluongphong").empty();
                           for(var i=1;i<=data;i++){
                            $("#iSoluongphong").append("<option value='"+i+"'>"+i+"</option>")
                           }
                        }
                    })
                    });
                    // ajax ngaythang
                    $('#loaiphong').change(function(){
                    var loaiphong=($("#loaiphong").val())
                    var ngayden=($("#startDate").val())
                    var ngaydi=($("#endDate").val())
                    $.ajax({
                        type:'get',
                        url:"../Soluongloaiphong/"+loaiphong+"/"+ngayden+"/"+ngaydi,
                        success:function(data){
                           $("#iSoluongphong").empty();
                           for(var i=1;i<=data;i++){
                            $("#iSoluongphong").append("<option value='"+i+"'>"+i+"</option>")
                           }
                        }
                        })
                    });
                    $('#endDate').change(function(){
                    var loaiphong=($("#loaiphong").val())
                    var ngayden=($("#startDate").val())
                    var ngaydi=($("#endDate").val())
                    $.ajax({
                        type:'get',
                        url:"../Soluongngayden/"+loaiphong+"/"+ngayden+"/"+ngaydi,
                        success:function(data){
                           $("#iSoluongphong").empty();
                           for(var i=1;i<=data;i++){
                            $("#iSoluongphong").append("<option value='"+i+"'>"+i+"</option>")
                           }
                        }
                        })
                    });
               });
    </script>

    <script type="text/javascript">
      $(document).ready(function(){

        
            var sl=<?php echo count($loaiphong) ?>;
            var sp=<?php if(isset($sophongconlai)) echo $sophongconlai ?>;
            var Comments = [];
            for(var i=0;i<sl;i++)
            {
                Comments=<?php echo $loaiphong ?>;
            }      

                $("#endDate").change(function(){
                var loaiphong=$('#loaiphong').val();
                var date1 = new Date($("#startDate").val());
                var date2 = new Date($("#endDate").val());
                var timeDiff = Math.abs(date2.getTime() - date1.getTime());
                var diffDays = Math.ceil(timeDiff / (1000 * 3600 * 24));
                var soluongphong=$("#iSoluongphong").val();
                for(var i=0;i<sl;i++)
                    {
                        if(Comments[i].id==loaiphong)
                        { 
                             $('#gia').html(Comments[i].iGiaphong.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,"))
                             $('#tongtien').html((Comments[i].iGiaphong*diffDays*soluongphong).toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,"))
                        }
                        //alert(Comments[i].iGiaphong)
                    }
                    
                }); 

                $("#loaiphong").change(function(){
                var loaiphong=$(this).val();
                var date1 = new Date($("#startDate").val());
                var date2 = new Date($("#endDate").val());
                var timeDiff = Math.abs(date2.getTime() - date1.getTime());
                var diffDays = Math.ceil(timeDiff / (1000 * 3600 * 24));
                var soluongphong=$("#iSoluongphong").val();
                for(var i=0;i<sl;i++)
                    {
                        if(Comments[i].id==loaiphong)
                        { 
                            $('#gia').html(Comments[i].iGiaphong.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,"))
                            $('#tongtien').html((Comments[i].iGiaphong*diffDays*soluongphong).toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,"))
                        }
                    }
                    
                }); 
                 $("#iSoluongphong").change(function(){
                var loaiphong=$('#loaiphong').val();
                var date1 = new Date($("#startDate").val());
                var date2 = new Date($("#endDate").val());
                var timeDiff = Math.abs(date2.getTime() - date1.getTime());
                var diffDays = Math.ceil(timeDiff / (1000 * 3600 * 24));
                var soluongphong=$(this).val();
                for(var i=0;i<sl;i++)
                    {
                        if(Comments[i].id==loaiphong)
                        { 
                            $('#gia').html(Comments[i].iGiaphong.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,"))
                            $('#tongtien').html((Comments[i].iGiaphong*diffDays*soluongphong).toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,"))
                        }
                        //alert(Comments[i].iGiaphong)
                    }
                    
                });
                  //alert(diffDays)        
        });
        </script>

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


