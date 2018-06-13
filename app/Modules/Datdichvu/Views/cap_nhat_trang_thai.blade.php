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
                        <a href="#">Đặt dịch vụ</a>
                    </li>
                    <li>
                        <a href="{{url('admincp/datdichvu/quan_ly_dat_dich_vu')}}">Quản lý đặt dịch vụ</a>
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
                        <i class="fa fa-fw fa-file-text-o"></i> Nhân viên cập nhật đơn đặt dịch vụ
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
                <h4 style="padding-top: 20px;">Cập nhật dịch vụ:</h4>
                <form action="{{url('admincp/datdichvu/capnhattrangthai/'.$uptrangthai[0]->id)}}" class="ng-pristine ng-valid" method="post" enctype="multipart/form-data">
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                  
                        <!-- -->
                     
                      <div class="row">
                             <div class="col-xs-12 col-md-12">
                                <div class="form-group">                     
                                       <lable>Tên Khách hàng đặt:</lable>
                                       <p style="font-size: 20px; font-weight: bold; color:#f00">{{$uptrangthai[0]->khachhang->sTenKH}}</p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                             <div class="col-xs-12 col-md-12">
                                <div class="form-group">                     
                                       <lable>Định danh khách hàng:</lable>
                                       <label style="font-size: 20px; font-weight: bold;color: #f00">{{$uptrangthai[0]->khachhang->sDinhdanh}}</label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                             <div class="col-xs-12 col-md-12">
                                <div class="form-group">                     
                                       <lable>Tên Dịch vụ:</lable>
                                       <p style="font-size: 20px; font-weight: bold; color:blue">{{$uptrangthai[0]->dichvu->sTenDV}}</p>
                                </div>
                            </div>
                        </div>
                         <div class="row">
                             <div class="col-xs-12 col-md-12">
                                <div class="form-group">                     
                                       <lable>Số lượng:</lable>
                                       <select name="iSoluong">
                                           <label style="font-size: 20px; font-weight: bold;color:blue"s>
                                                <option value="{{$uptrangthai[0]->iSoluong}}">{{$uptrangthai[0]->iSoluong}}</option>
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
                        </div>
                    <div class="row">
                        <div class="col-xs-12 col-md-12">
                          <div class="form-group">
                                      <div class="form-group">                       
                                          <label>Hình ảnh</label>
                                          <p>
                                                <img width="200px" src="/upload/images/{{$uptrangthai[0]->dichvu->sHinhanh}}"> 
                                          </p>
                                     </div>
                          </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-md-12">
                       
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-md-6">
                          <div class="form-group">                       
                                  <label>Trạng thái:</label>
                                  <label class="radio-inline">
                                      <input 
                                       @if($uptrangthai[0]->iTrangthaidat==1)
                                       {{"checked"}}
                                       @endif
                                       type="radio" name="iTrangthaidat" value="1">Đang Đặt
                                  </label>
                                  <label class="radio-inline">
                                      <input 
                                       @if($uptrangthai[0]->iTrangthaidat==0)
                                       {{"checked"}}
                                       @endif
                                      type="radio" name="iTrangthaidat" value="0">Hủy
                                  </label>    
                                  <label class="radio-inline">
                                      <input 
                                       @if($uptrangthai[0]->iTrangthaidat==2)
                                       {{"checked"}}
                                       @endif
                                      type="radio" name="iTrangthaidat" value="2"> Đã Duyệt
                                  </label>
                                  <label class="radio-inline">
                                      <input 
                                       @if($uptrangthai[0]->iTrangthaidat==3)
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


