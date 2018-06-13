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
                        <a href="#">Dịch vụ</a>
                    </li>
                    <li>
                        <a href="{{url('admincp/dichvu/quan_ly_dich_vu')}}">Quản lý dịch vụ</a>
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
                        <i class="fa fa-fw fa-file-text-o"></i> Quản Lý dịch vụ
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
        <h4 style="padding-top: 20px;">Thêm loại tin:</h4>
                <form action="{{url('admincp/dichvu/quan_ly_dich_vu')}}" class="ng-pristine ng-valid" method="post" enctype="multipart/form-data">
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <div class="row">
                             <div class="col-xs-12 col-md-6">
                                <div class="form-group">                     
                                       <lable for="sel1">Tên dịch vụ:</lable>
                                       <input type="text" name="sTenDV" class="form-control input-sm" placeholder="Loại phòng...">
                                </div>
                            </div>

                            <div class="col-xs-12 col-md-6">
                                <div class="form-group">                     
                                       <lable for="sel1">Đơn giá:</lable>
                                       <input type="text" name="iDongia" class="form-control input-sm" placeholder="250.000 VND">
                                </div>
                            </div>    
                    </div>
                    <div class="row">
                         <div class="col-xs-12 col-md-12">
                               <div class="form-group">
                                  <label>Mô tả:</label>
                                  <label>service</label>
                                  <textarea name="sMota" row="2" class="form-control" placeholder="Mô tả loại phòng khách sạn"></textarea>
                               </div>
                           </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-md-12">
                          <div class="form-group">                       
                                  <label>Hình ảnh dịch vụ:</label>
                                  <input type="file" name="sHinhanh">
                         </div>
                       </div>
                    </div>
                    <div class="row" style="padding-top: 20px; padding-bottom: 20px;">
                        <div class="col-md-12">
                                    <button class="btn btn-success" onclick="return confirm('Bạn có muốn Lưu không?')">
                                    <i class="fa fa-check" aria-hidden="true"></i> Thêm
                                    </button>
                        </div>
                    </div>
                    <!-- <div style='clear:both'></div> -->
                </form>
        </div><!--addtheloai-->
        </div>

        <div class="panel-body table-responsive">
   <!--          <a class="edit btn btn-primary" href="{{url('admincp/user/tao-user')}}">
                    Tạo Loại tin</a> -->
            <table class="table table-bordered" id="fitness-table">
            <thead>
            <tr>
                
                <th>ID</th>
                <th>Tên dịch vụ</th>
        				<th>Hình ảnh</th>
                <th>Đơn giá</th> 
        				<th>Mô tả</th>
                <th>Tùy chọn</th>
            </tr>
            </thead>
          
            <tbody>
                <!-- foreach -->
                @foreach($dichvu as $value)
                  <tr>
                    <td>{{$value->id}}</td>
                    <td>{{$value->sTenDV}}</td>
                    <td><img src="{{asset('upload/images/'.$value->sHinhanh)}}" width="100px"></td>
                    <td>{{$value->iDongia}}</td>
                    <td>{{$value->sMota}}</td>            
                    <td>
                    <a href="{{url('admincp/dichvu/sua_dich_vu/'.$value->id)}}" data-toggle="tooltip" data-placement="left" class="btn btn-success" data-original-title="SỬA"><i class="fa fa-pencil-square-o fa-lg"></i>
                    </a>
                    <a href="{{url('admincp/dichvu/xoa_dich_vu/'.$value->id)}}" data-toggle="tooltip" data-placement="left" class="btn  btn-danger" data-original-title="Xóa" onclick="return confirm('Bạn có muốn xóa không?')"><i class="fa fa-times fa-lg" aria-hidden="true"></i>
                    </a>
                    </td>
                  </tr>
                @endforeach
            </tbody>
        </table>
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

