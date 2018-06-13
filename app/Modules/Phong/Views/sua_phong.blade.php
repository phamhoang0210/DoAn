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
                        <a href="#">Phòng</a>
                    </li>
                    <li>
                        <a href="{{url('admincp/phong/quan_ly_phong')}}">Quản lý phòng</a>
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
                        <i class="fa fa-fw fa-file-text-o"></i> Quản Lý phòng
                    </h4>
                                <span class="pull-right">
                                    <i class="glyphicon glyphicon-chevron-up showhide clickable"></i>
                                    <i class="glyphicon glyphicon-remove removepanel"></i>
                                </span>
                        </div>

        <div class="panel-body table-responsive">
        <div class="add_loaitin">
                 <!-- hien thi error -->
                 @if(count($errors)>0)
                   <div class="alert alert-danger">
                       @foreach($errors->all() as $er)
                            <p>{{$er}}</p>
                       @endforeach
                   </div>
                 @endif

                @if(session('error2'))
                     <div class="alert alert-danger">
                        {{session('error2')}}
                    </div>
                 @endif
                 @if(session('thongbao'))
                    <div class="alert alert-success">
                        {{session('thongbao')}}
                    </div>
                 @endif
                <form action="{{url('admincp/phong/sua_phong/'.$phong[0]->id)}}" class="ng-pristine ng-valid" method="post" enctype="multipart/form-data">
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <div class="row">
                             <div class="col-xs-12 col-md-6">
                                <div class="form-group">                     
                                       <lable for="sel1">Tên phòng:</lable>
                                       <input type="text" name="sTenP" value="{{$phong[0]->sTenP}}"class="form-control input-sm" placeholder="Nhập tên phòng">
                                </div>
                            </div>

                            <div class="col-xs-12 col-md-6">
                                <div class="form-group">                     
                                       <lable for="sel1">Loại phòng:</lable>
                                        <select class="form-control" name="FK_IDLoaiphong">
                                          <option value="">--Không chọn--</option>
                                          @foreach($loaiphong as $value)
                                              <option 
                                              @if($phong[0]->FK_IDLoaiphong==$value->id)
                                              {{"selected"}}
                                              @endif
                                              value="{{$value->id}}">{{$value->sTenLP}}</option>
                                          @endforeach
                                      </select>
                                </div>
                            </div>   

                             <div class="col-xs-12 col-md-6">
                                  <div class="form-group">                       
                                  <label>Tình trạng phòng: </label>
                                  <p>
                                  <label class="radio-inline">
                                      <input 
                                      @if($phong[0]->iTrangthai==1)
                                         {{"checked"}}
                                      @endif
                                      type="radio" name="iTrangthai" value="1">Còn phòng
                                  </label>
                                  <label class="radio-inline">
                                      <input 
                                        @if($phong[0]->iTrangthai==0)
                                         {{"checked"}}
                                        @endif 
                                      type="radio" name="iTrangthai" value="0">hết phòng
                                  </label>
                                  </p>       
                          </div>
                            </div>  
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-md-6">
                          <div class="form-group">                       
                                  <label>Kiểu phòng: </label>
                                  <p>
                                  <label class="radio-inline">
                                      <input 
                                        @if($phong[0]->iKieuphong==1)
                                         {{"checked"}}
                                        @endif
                                      type="radio" name="iKieuphong" value="1">Giường đơn
                                  </label>
                                  <label class="radio-inline">
                                      <input 
                                        @if($phong[0]->iKieuphong==0)
                                         {{"checked"}}
                                        @endif
                                      type="radio" name="iKieuphong" value="0">Giường đôi
                                  </label>
                                  </p>       
                          </div>
                        </div>
                    </div>
                    <div class="row" style="padding-top: 20px; padding-bottom: 20px;">
                        <div class="col-md-12">
                                    <button class="btn btn-info" onclick="return confirm('Bạn có muốn Sửa không?')">
                                      Sửa
                                    </button>
                                    <a href="{{url('admincp/phong/quan_ly_phong')}}">
                                      <input type="button" class="btn btn-warning"
                                      value="Quay lại">
                                    </a>
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

