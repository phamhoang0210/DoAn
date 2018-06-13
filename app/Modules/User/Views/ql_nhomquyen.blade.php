@extends('backend/master')
<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from dev.lorvent.com/fitness/admin_userlist.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 10 Nov 2016 10:51:54 GMT -->
<head>
    <meta charset="UTF-8">
    <title>Quản lý nhóm quyền | CMS</title>
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

    
    <link type="text/css" href="{{asset('backend/vendors/jasny-bootstrap/css/jasny-bootstrap.css')}}" rel="stylesheet" />
    <link type="text/css" href="{{asset('backend/vendors/iCheck/skins/minimal/blue.css')}}" rel="stylesheet" />
    <link type="text/css" href="{{asset('backend/vendors/select2/css/select2.css')}}" rel="stylesheet" />
    <link type="text/css" href="{{asset('backend/vendors/select2/css/select2-bootstrap.min.css')}}" rel="stylesheet" />
    <link type="text/css" href="{{asset('backend/vendors/bootstrapvalidator/dist/css/bootstrapValidator.css')}}" rel="stylesheet" />
    <link type="text/css" href="{{asset('backend/vendors/sweetalert/dist/sweetalert2.css')}}" rel="stylesheet" />

    <!-- end of global css -->
    <!--page level css -->
    <!--end of page level css-->
    @stop
</head>

<body>
<style>
.th {
    display: inline-block;
    max-width: 100%;
    margin-bottom: 5px;
    font-weight: 700;
    font-family: 'Source Sans Pro','Helvetica Neue',Helvetica,Arial,sans-serif;
    color: #333;
}
</style>

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
                <a href="{{url('admincp/user/danh-muc-user')}}">Quản lý người dùng</a>
            </li>
            <li>
                <a href="#" class="activated">Quản lý nhóm quyền</a>
            </li>
        </ol>
    </section>
    <!--section ends-->
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <!-- Basic charts strats here-->
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <i class="fa fa-fw fa-user"></i> Quyền :  <strong ><?php 
                            echo $user_type->name;
                            ?></strong>
                        </h4>
                        <span class="pull-right">
                            <i class="glyphicon glyphicon-chevron-up showhide clickable"></i>
                            <i class="glyphicon glyphicon-remove removepanel"></i>
                        </span>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-12">
                              @if ($errors->any())
                              {{ implode(' ', $errors->all(':message')) }}
                              <br/>
                              @endif
                              <br/>							
                              <form id="add_users_form" action="{{ url('admincp/user/ql-nhomquyen'.'/'.$user_type->id) }}" method="POST" class="form-horizontal">
                                <div class="form-body">
                                    <table>
                                        <thead>
                                            <tr height="40">
                                                <th width="300">Tính năng</th>
                                                <th width="300">Truy cập (tất cả: <input type="checkbox" id="check-all">)</th>
                                                <!-- <th width="300">Cài đặt</th> -->
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr height="40">
                                                <th width="300" style="color: red; font-weight: bold;">
                                                    Boss
                                                </th>
                                                <th width="300">
                                                    <div class="col-md-7">
                                                        <div class="input-group">
                                                           <input type="checkbox" class="data-check" name="user_type_permissions[]" value="boss"  
                                                           <?php if (in_array("boss",$quyen)) echo "checked ";
                                                           ?>
                                                           /> 
                                                       </div>
                                                   </div>
                                               </th>
                                           </tr>
                                           <!-- 000 -->
                                           <tr height="40">
                                                <th width="300" style="color: blue; font-weight: bold;">
                                                    Quản lý tài khoản
                                                </th>
                                                <th width="300">
                                                    <div class="col-md-7">
                                                        <div class="input-group">
                                                           <input type="checkbox" class="data-check" name="user_type_permissions[]" value="tai_khoan"  
                                                           <?php if (in_array("tai_khoan",$quyen)) echo "checked ";
                                                           ?>
                                                           /> 
                                                       </div>
                                                   </div>
                                               </th>
                                           </tr>
                                           <!-- 000 -->
                                            <tr height="40">
                                                <th width="300">
                                                    Quản lý tin tức
                                                </th>
                                                <th width="300">
                                                    <div class="col-md-7">
                                                        <div class="input-group">
                                                           <input type="checkbox" class="data-check" name="user_type_permissions[]" value="tin_tuc"  
                                                           <?php if (in_array("tin_tuc",$quyen)) echo "checked ";
                                                           ?>
                                                           /> 
                                                       </div>
                                                   </div>
                                               </th>
                                           </tr>
                                             <!-- 000 -->
                                            <tr height="40">
                                                <th width="300">
                                                    Quản lý loại phòng
                                                </th>
                                                <th width="300">
                                                    <div class="col-md-7">
                                                        <div class="input-group">
                                                           <input type="checkbox" class="data-check" name="user_type_permissions[]" value="loai_phong"  
                                                           <?php if (in_array("loai_phong",$quyen)) echo "checked ";
                                                           ?>
                                                           /> 
                                                       </div>
                                                   </div>
                                               </th>
                                           </tr>
                                                <!-- 000 -->
                                            <tr height="40">
                                                <th width="300">
                                                    Quản lý phòng
                                                </th>
                                                <th width="300">
                                                    <div class="col-md-7">
                                                        <div class="input-group">
                                                           <input type="checkbox" class="data-check" name="user_type_permissions[]" value="phong"  
                                                           <?php if (in_array("phong",$quyen)) echo "checked ";
                                                           ?>
                                                           /> 
                                                       </div>
                                                   </div>
                                               </th>
                                           </tr>
                                          <!-- 000 -->
                                            <tr height="40">
                                                <th width="300">
                                                    Quản lý dịch vụ
                                                </th>
                                                <th width="300">
                                                    <div class="col-md-7">
                                                        <div class="input-group">
                                                           <input type="checkbox" class="data-check" name="user_type_permissions[]" value="dich_vu"  
                                                           <?php if (in_array("dich_vu",$quyen)) echo "checked ";
                                                           ?>
                                                           /> 
                                                       </div>
                                                   </div>
                                               </th>
                                           </tr>
                                             <!-- 000 -->
                                            <tr height="40">
                                                <th width="300">
                                                    Quản lý Khách hàng
                                                </th>
                                                <th width="300">
                                                    <div class="col-md-7">
                                                        <div class="input-group">
                                                           <input type="checkbox" class="data-check" name="user_type_permissions[]" value="khach_hang"  
                                                           <?php if (in_array("khach_hang",$quyen)) echo "checked ";
                                                           ?>
                                                           /> 
                                                       </div>
                                                   </div>
                                               </th>
                                           </tr>
                                              <!-- 000 -->
                                            <tr height="40">
                                                <th width="300">
                                                    Quản lý phản hồi
                                                </th>
                                                <th width="300">
                                                    <div class="col-md-7">
                                                        <div class="input-group">
                                                           <input type="checkbox" class="data-check" name="user_type_permissions[]" value="phan_hoi"  
                                                           <?php if (in_array("phan_hoi",$quyen)) echo "checked ";
                                                           ?>
                                                           /> 
                                                       </div>
                                                   </div>
                                               </th>
                                           </tr>
                                             <!-- 000 -->
                                               <tr height="40">
                                                <th width="300">
                                                    Quản lý đặt phòng
                                                </th>
                                                <th width="300">
                                                    <div class="col-md-7">
                                                        <div class="input-group">
                                                           <input type="checkbox" class="data-check" name="user_type_permissions[]" value="dat_phong"  
                                                           <?php if (in_array("dat_phong",$quyen)) echo "checked ";
                                                           ?>
                                                           /> 
                                                       </div>
                                                   </div>
                                               </th>
                                           </tr>
                                            <!-- 000 -->
                                               <tr height="40">
                                                <th width="300">
                                                    Quản lý đặt dịch vụ
                                                </th>
                                                <th width="300">
                                                    <div class="col-md-7">
                                                        <div class="input-group">
                                                           <input type="checkbox" class="data-check" name="user_type_permissions[]" value="dat_dich_vu"  
                                                           <?php if (in_array("dat_dich_vu",$quyen)) echo "checked ";
                                                           ?>
                                                           /> 
                                                       </div>
                                                   </div>
                                               </th>
                                           </tr>
                                             <!-- 000 -->
                                               <tr height="40">
                                                <th width="300">
                                                    Quản lý báo cáo
                                                </th>
                                                <th width="300">
                                                    <div class="col-md-7">
                                                        <div class="input-group">
                                                           <input type="checkbox" class="data-check" name="user_type_permissions[]" value="bao_cao"  
                                                           <?php if (in_array("bao_cao",$quyen)) echo "checked ";
                                                           ?>
                                                           /> 
                                                       </div>
                                                   </div>
                                               </th>
                                           </tr>


                                         				
</tbody>
</table>

</div>
</br>
</br>
<input type="hidden" name="_token" value="{{ csrf_token() }}">
<div class="row">
 <div class="col-md-offset-3 col-md-9">

    <input type="submit" class="btn btn-primary" value="Cập Nhật"> &nbsp;

</div>
</div>      
</form>
</div>
</div>
</div>
</div>
</div>
</div>


</div><!-- /.container -->
@stop
@section('footer_import')
<script src="{{asset('backend/vendors/holder/holder.js')}}" type="text/javascript"></script>
<script src="{{asset('backend/vendors/jasny-bootstrap/js/jasny-bootstrap.js')}}" type="text/javascript"></script>
<script src="{{asset('backend/vendors/iCheck/icheck.js')}}" type="text/javascript"></script>
<script src="{{asset('backend/vendors/select2/js/select2.min.js')}}" type="text/javascript"></script>
<script src="{{asset('backend/vendors/bootstrapvalidator/dist/js/bootstrapValidator.js')}}" type="text/javascript"></script>
<script src="{{asset('backend/vendors/sweetalert/dist/sweetalert2.js')}}" type="text/javascript"></script>

<script>
    $("#check-all").click(function () {
        $(".data-check").prop('checked', $(this).prop('checked'));
    });
</script>
<!-- end of page level js -->
<!-- begining of page level js -->
@stop
</body>
</html>

