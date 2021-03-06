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
                        <i class="fa fa-fw fa-file-text-o"></i>Báo cáo lịch đặt phòng
                    </h4>
                                <span class="pull-right">
                                    <i class="glyphicon glyphicon-chevron-up showhide clickable"></i>
                                    <i class="glyphicon glyphicon-remove removepanel"></i>
                                </span>
                        </div>

        <div class="lc" style="margin-top: 20px;">
            <form action="" method="post">
            <input type="hidden" name="_token" value="{{csrf_token()}}">
            <div class="row">
                <div class="col-md-4">
                      <div class="form-group">
                        <label >Ngày bắt đầu</label>
                        <input type="date" class="form-control" name="dNgaybatdau">
                      </div>
                </div>
                <div class="col-md-4">
                      <div class="form-group">
                        <label >Ngày kết thúc</label>
                        <input type="date" class="form-control" name="dNgayketthuc">
                      </div>
                </div>
                <div class="col-md-1">
                        <label></label>
                        <button style="margin-top: 25px;" type="submit" class="btn btn-primary">Bộ lọc</button>
                </div>
             </div>
            </form>
        </div>

        <div class="border" style="margin-top: 10px;">
              <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                 <label style="background: #000000; padding: 10px;">V</label>:Dịch vụ đang đặt
                 <label style="background: #ff0000; padding: 10px;"><i class="fa fa-close"></i></label>:Dịch vụ bị hủy
                 <label style="background: #ff9e14; padding: 10px;"><i class="fa fa-check"></i> </label>:đã hoàn thành
              </div>
        </div><!--border-->

        <div class="panel-body table-responsive">
        <div class="add_loaitin">
                 <!-- hien thi error -->

        <div class="panel-body table-responsive">
   <!--          <a class="edit btn btn-primary" href="{{url('admincp/user/tao-user')}}">
                    Tạo Loại tin</a> -->
            <table class="table table-bordered" id="fitness-table">
            <thead>
            <tr>  
                <th>Ngày</th>
                <th>Đã đặt</th>
                <th>Tổng số lượng</th>
                <th>Tổng tiền</th>
                <th>Tùy chọn</th>
            </tr>
            </thead>
          
            <tbody>
               @foreach($articles as $value)
                    <tr>
                      <td>{{($value['ngay'])}}</td>
                      <td>
                          @foreach($value['dichvudat'] as $dvd)
                          @if($dvd->iTrangthaidat==1)
                           <p>{{($dvd->dichvu->sTenDV)}} ({{$dvd->iSoluong}})</p>
                          @elseif($dvd->iTrangthaidat==3)
                           <p style="color: orange"><i class="fa fa-check"></i> {{($dvd->dichvu->sTenDV)}} ({{$dvd->iSoluong}})</p>
                          @else($dvd->iTrangthaidat==2)
                            <p style="color: red"><i class="fa fa-close"></i>{{($dvd->dichvu->sTenDV)}} ({{$dvd->iSoluong}})</p>
                          @endif
                          @endforeach
                     </td>
                     <td>
                          @foreach($value['tongsoluong'] as $tsl)
                           <p>{{($tsl->tongsoluong)}}</p>
                          @endforeach
                      </td>
                        <td>
                          @foreach($value['tongtienmotngay'] as $total1day)
                           <p style="font-size: 16px;">
                                   <?php
                                       $gia="{$total1day->tongtien}";
                                       $float=(int)$gia;
                                       echo number_format("$float");
                                    ?>
                                    VNĐ
                           </p>
                          @endforeach
                        </td>
                        <td></td>
                    </tr>
               @endforeach
               </tbody>
                    <tr>
                      <td></td>
                      <td></td>
                      <td></td>
                    
                      <td colspan="5" style="color: blue; font-weight: bold; font-size: 20px;">Tổng doanh thu:
                            <?php
                              $gia="{$tongdoanhthu}";
                              $float=(int)$gia;
                              echo number_format("$float");
                            ?>
                            VNĐ
                      </td>
                      <td></td>
                    </tr>
            
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

