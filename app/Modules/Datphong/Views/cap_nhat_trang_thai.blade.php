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
        <div class="col-lg-6">
                        <!-- Basic charts strats here-->
                <div class="panel panel-primary">
                        <div class="panel-heading">
                                <h4 class="panel-title">
                        <i class="fa fa-fw fa-file-text-o"></i> Nhân viên cập nhật đơn đặt phòng
                    </h4>
                                <span class="pull-right">
                                    <i class="glyphicon glyphicon-chevron-up showhide clickable"></i>
                                    <i class="glyphicon glyphicon-remove removepanel"></i>
                                </span>
                        </div>

        <div class="panel-body table-responsive">
        <div class="add_tintuc">
                 <!-- hien thi error -->
                 @if(count($errors)>0)
                     <div class="alert alert-danger">
                       @foreach($errors->all() as $err)
                              {{$err}}<br/>
                       @endforeach
                     </div>
                 @endif
                 @if(session('error1'))
                    <div class="alert alert-success">
                        {{session('error1')}};
                    </div>
                 @endif
                @if(session('thongbao'))
                    <div class="alert alert-danger">
                        {{session('thongbao')}};
                    </div>
                 @endif

                <h4 style="padding-top: 20px;">Cập nhật đặt phòng:</h4>
                <form action="{{url('admincp/datphong/capnhattrangthai/'.$updatphong[0]->id)}}" class="ng-pristine ng-valid" method="post" enctype="multipart/form-data">
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                  
                        <!-- -->
                      <div class="row">
                             <div class="col-xs-12 col-md-6">
                                <div class="form-group">                     
                                       <lable>Tên Khách hàng đặt:</lable>
                                       <p style="font-size: 20px; font-weight: bold; color:#f00">{{$updatphong[0]->khachhang->sTenKH}}</p>
                                </div>
                            </div>
                            <div class="col-xs-12 col-md-4">
                                <div class="form-group">                     
                                       <lable>Định danh khách hàng:</lable>
                                       <label style="font-size: 20px; font-weight: bold;color: #f00">{{$updatphong[0]->khachhang->sDinhdanh}}</label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                             <div class="col-xs-12 col-md-12">
                                <div class="form-group">                     
                                       <lable>Tên Loại phòng đã đặt:</lable>
                                       <p style="font-size: 20px; font-weight: bold; color:blue">{{$updatphong[0]->loaiphong->sTenLP}}</p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                             <div class="col-xs-12 col-md-12">
                                <div class="form-group">                     
                                       <lable>Tên Loại phòng:</lable>
                                       <p>
                                          <select name="FK_IDLoaiphong">
                                              <option value="{{$updatphong[0]->FK_IDLoaiphong}}">{{$updatphong[0]->loaiphong->sTenLP}}</option>
                                          @foreach($loaiphong as $valuelp)
                                           <option value="{{$valuelp->id}}">{{$valuelp->sTenLP}}</option>
                                          @endforeach
                                          </select>
                                       </p>
                                </div>
                            </div>
                        </div>
                         <div class="row">
                             <div class="col-xs-12 col-md-6">
                                <div class="form-group">                     
                                       <lable>Ngày đến:</lable>
                                       <input type="date" name="dNgayden" value="{{$updatphong[0]->dNgayden}}">
                                </div>
                            </div>
                               <div class="col-xs-12 col-md-6">
                                <div class="form-group">                     
                                       <lable>Ngày đi:</lable>
                                       <input type="date" name="dNgaydi" value="{{$updatphong[0]->dNgaydi}}">
                                </div>
                            </div>
                        </div>
                    <div class="row">
                        <div class="col-xs-12 col-md-12">
                            <lable>Số lượng phòng:</lable>
                             <select name="iSoluongphong">
                                   <label style="font-size: 20px; font-weight: bold;color:blue"s>
                                    <option value="{{$updatphong[0]->iSoluongphong}}">{{$updatphong[0]->iSoluongphong}}</option>
                                    </label>
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
                             </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-md-12">
                          <div class="form-group">
                                      <div class="form-group">                       
                                          <label>Hình ảnh</label>
                                          <p>
                                              <img width="200px" src="/upload/images/{{$updatphong[0]->loaiphong->sHinhanh}}"> 
                                          </p>
                                     </div>
                          </div>
                        </div>
                    </div>
                    <div class="row">
                      <div class="col-xs-12 col-md-12">
                        <p>Thành tiền: <span style="color: red;"> <?php
                                                  $gia="{$tongtiendat}";
                                                  $float=(int)$gia;
                                                  echo number_format("$float");
                                             ?>
                                             </span>VNĐ</p>
                      </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-md-12">
                          <div class="form-group">                       
                                  <label>Trạng thái:</label>
                                  <label class="radio-inline">
                                      <input 
                                       @if($updatphong[0]->iTrangthaidat==1)
                                       {{"checked"}}
                                       @endif
                                       type="radio" name="iTrangthaidat" value="1">Đang Đặt
                                  </label>
                                  <label class="radio-inline">
                                      <input 
                                       @if($updatphong[0]->iTrangthaidat==0)
                                       {{"checked"}}
                                       @endif
                                      type="radio" name="iTrangthaidat" value="0">Hủy
                                  </label>    
                                  <label class="radio-inline">
                                      <input 
                                       @if($updatphong[0]->iTrangthaidat==2)
                                       {{"checked"}}
                                       @endif
                                      type="radio" name="iTrangthaidat" value="2"> Đã Duyệt
                                  </label>
                                  <label class="radio-inline">
                                      <input 
                                       @if($updatphong[0]->iTrangthaidat==3)
                                       {{"checked"}}
                                       @endif
                                       type="radio" name="iTrangthaidat" value="3"> Hoàn thành
                                  </label>   
                          </div>
                        </div>
                    </div>
                    <div class="row" style="padding-top: 20px; padding-bottom: 20px;">
                        <div class="col-md-12">
                                    <button class="btn btn-success" onclick="return confirm('Bạn có muốn cập nhật trạng thái này không?')">
                                    <i class="fa fa-check" aria-hidden="true"></i> Cập nhật
                                    </button>
                                    <button class="btn btn-warring" type="reset">
                                    <i class="fa fa-check" aria-hidden="true"></i> Làm mới
                                    </button>
                        </div>
                    </div>
                    <!-- <div style='clear:both'></div> -->
                </form>
        </div><!--addtheloai-->
 
        </div>  
        </div>

      </div>
      <!-- dich vu theo kem -->
      <div class="col-lg-6">
              <div class="panel panel-primary">
                 <div class="panel-heading">
                    <h4 class="panel-title">
                        <i class="fa fa-fw fa-file-text-o"></i> Nhân viên cập nhật đơn đặt dịch vụ
                    </h4>
                      <span class="pull-right">
                         <i class="glyphicon glyphicon-chevron-up showhide clickable"></i>
                         <i class="glyphicon glyphicon-remove removepanel"></i>
                       </span>
                </div>

        <div class="panel-body table-responsive">

          @foreach($dichvudadat as $value)
          <form action="{{url('admincp/datphong/capnhatdichvu/'.$value->id)}}" method="post">
          <input type="hidden" name="_token" value="{{csrf_token()}}">
            <div class="dichvudadat" style="background: #56d6e2; padding: 5px; border-radius: 5px; margin-bottom: 40px;">
                <div class="row">
                  <div class="col-md-12">
                     <p>Tên dịch vụ đã đặt: <span style="font-weight: bold; font-size: 18px;">
                       {{$value->dichvu->sTenDV}}
                     </span></p>
                  </div>
                </div>
                <div class="row">
                    <div class="col-md-5">
                           <div class="form-group">                     
                                       <lable>Tên dịch vụ:</lable>
                                       <p>
                                          <select name="FK_IDDichvu">
                                              <option value="{{$value->FK_IDDichvu}}">
                                                {{$value->dichvu->sTenDV}}
                                              </option>
                                              @foreach($list_dichvu as $listdv)
                                               <option value="{{$listdv->id}}">{{$listdv->sTenDV}}
                                               </option>
                                              @endforeach
                                          </select>
                                       </p>
                            </div>
                    </div>
                    <div class="col-md-3">
                         <lable>Số lượng đặt:</lable>
                             <select name="iSoluong">
                                   <label style="font-size: 20px; font-weight: bold;color:blue"s>
                                    <option value="{{$value->iSoluong}}">{{$value->iSoluong}}</option>
                                    </label>
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
                             </select>
                    </div>
                    <div class="col-md-4">
                        <label>Ngày đặt</label>
                        <p>
                           <?php 
                              $date="{$value->created_at}";
                              $intdate= strtotime($date);
                              echo date('d/m/Y h:i:s',$intdate); 
                           ?> 
                        </p>
                    </div>
                </div>
                <div class="row">
                     <div class="col-xs-12 col-md-6">
                          <p>Thành tiền:<span style="color: red;">
                                               <?php
                                                  $tiendv=0;
                                                  $tiendv=$value->dichvu->iDongia*$value->iSoluong;
                                                  $gia=$tiendv;
                                                  $float=(int)$gia;
                                                  echo number_format("$float");
                                                  ?>
                                                </span>VNĐ
                     </div>
                </div>
                <div class="row">
                       <div class="col-xs-12 col-md-12">
                          <div class="form-group">                       
                                  <label>Trạng thái:</label>
                                  <label class="radio-inline">
                                      <input 
                                       @if($value->iTrangthaidat==1)
                                       {{"checked"}}
                                       @endif
                                       type="radio" name="iTrangthaidat" value="1">Đang Đặt
                                  </label>
                                  <label class="radio-inline">
                                      <input 
                                       @if($value->iTrangthaidat==0)
                                       {{"checked"}}
                                       @endif
                                      type="radio" name="iTrangthaidat" value="0">Hủy
                                  </label>    
                                  <label class="radio-inline">
                                      <input 
                                       @if($value->iTrangthaidat==2)
                                       {{"checked"}}
                                       @endif
                                      type="radio" name="iTrangthaidat" value="2"> Đã Duyệt
                                  </label>
                                  <label class="radio-inline">
                                      <input 
                                       @if($value->iTrangthaidat==3)
                                       {{"checked"}}
                                       @endif
                                       type="radio" name="iTrangthaidat" value="3"> Hoàn thành
                                  </label>   
                          </div>
                        </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                             <button
                              class="btn btn-success" onclick="return confirm('Bạn có muốn cập nhật trạng thái này không?')">
                                <i class="fa fa-check" aria-hidden="true"></i> Cập nhật
                              </button>
                              <button class="btn btn-warring" type="reset">
                                <i class="fa fa-check" aria-hidden="true"></i> Làm mới
                              </button>
                    </div>
                </div>
            </div>
          </form>
            @endforeach
        </div>
      </div>
    </div><!--col-lg-6-->
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


