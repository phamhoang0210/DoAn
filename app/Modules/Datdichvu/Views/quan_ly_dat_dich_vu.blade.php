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
                        <a href="{{url('admincp/dichvu/quan_ly_dich_vu')}}">Quản lý đặtdịch vụ</a>
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
        
        <div class="panel-body table-responsive">
   <!--          <a class="edit btn btn-primary" href="{{url('admincp/user/tao-user')}}">
                    Tạo Loại tin</a> -->
            <table class="table table-bordered" id="fitness-table">
            <thead>
            <tr>
                
                <th>STT</th>
                <th>Tên khách hàng</th>
                <th>Định danh</th>
        		    <th>Dịch vụ</th>
                <th>Số lượng</th>
                <th>Trạng thái</th>
                <th>Ngày Đặt</th>
                <th>Tùy chọn</th>
            </tr>
            </thead>
          
            <tbody>
                <!-- foreach -->
                <?php $i=1; ?>
                @foreach($datdichvu as $value)
                  <tr>
                    <td><?php echo $i; ?></td>
                    <td>{{$value->khachhang->sTenKH}}</td>
                    <td>{{$value->khachhang->sDinhdanh}}</td>
                    <td>{{$value->dichvu->sTenDV}}</td>
                    <td>{{$value->iSoluong}}</td>
                    <td>
                      @if($value->iTrangthaidat==1)
                        <p style="font-size: 18px;">
                            <span class="label label-info">{{'Đang đặt'}}</span>
                        </p>
                      @endif
                      @if($value->iTrangthaidat==0)
                        <p style="font-size: 18px;">
                            <span class="label label-danger">{{'Đã hủy'}}</span>
                        </p>
                       @endif
                      @if($value->iTrangthaidat==2)
                           <p style="font-size: 18px;">
                            <span class="label label-warning">{{'Đã Duyệt'}}</span>
                        </p>
                      @endif
                      @if($value->iTrangthaidat==3)
                           <p style="font-size: 18px;">
                           <span class="label label-primary"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span>{{'Hoàn thành'}}</span>
                        </p>
                      @endif
                    </td> 
                    <td>{{$value->created_at}}</td>
                    <td>
                    @if($value->iTrangthaidat==3)
                        <a href="{{url('admincp/datdichvu/hoadondichvu/'.$value->id)}}" data-toggle="tooltip" data-placement="left" class="btn btn-warning" data-original-title="Hóa đơn dịch vụ">
                        <i class="fa fa-calendar-check-o"></i>
                        </a>
                    @endif
                    @if($value->iTrangthaidat==1 || $value->iTrangthaidat==2)
                    <a href="{{url('admincp/datdichvu/capnhattrangthai/'.$value->id)}}" data-toggle="tooltip" data-placement="left" class="btn btn-success" data-original-title="Cập nhật"><i class="fa fa-pencil-square-o fa-lg"></i>
                    </a>
                    @endif
                   <!--  <a href="{{url('admincp/datdichvu/xoa_dich_vu/'.$value->id)}}" data-toggle="tooltip" data-placement="left" class="btn  btn-danger" data-original-title="Xóa" onclick="return confirm('Bạn có muốn xóa không?')"><i class="fa fa-times fa-lg" aria-hidden="true"></i> -->
                    </td>
                  </tr>
                <?php $i++; ?>
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

