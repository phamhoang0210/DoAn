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
                        <a href="#">Loại tin</a>
                    </li>
                    <li>
                        <a href="{{url('admincp/loaiphong/quan_ly_loai_phong')}}">Sửa loại phòng</a>
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
                        <i class="fa fa-fw fa-file-text-o"></i> Sửa loại phòng
                        </h4>
                                <span class="pull-right">
                                    <i class="glyphicon glyphicon-chevron-up showhide clickable"></i>
                                    <i class="glyphicon glyphicon-remove removepanel"></i>
                                </span>
                        </div>
        <div class="panel-body table-responsive">

        <div class="add_theloai">
                 <!-- hien thi error -->

                <h4 style="padding-top: 20px;">Sửa loại phòng:</h4>
                 @if(count($errors)>0)
                   <div class="alert alert-danger">
                       @foreach($errors->all() as $er)
                            <p>{{$er}}</p>
                       @endforeach
                   </div>
                 @endif
                <form action="{{url('admincp/loaiphong/sua_loai_phong/'.$loaiphong[0]->id)}}" class="ng-pristine ng-valid" method="post" enctype="multipart/form-data">
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <div class="row">
                             <div class="col-xs-12 col-md-6">
                                <div class="form-group">                     
                                       <lable>Tên loại phòng:</lable>
                                       <input type="text" name="sTenLP" value="{{$loaiphong[0]->sTenLP}}"class="form-control input-sm" placeholder="khám phá,...">
                                </div>
                            </div>
                            <div class="col-xs-12 col-md-6">
                                <div class="form-group">                     
                                       <lable for="sel1">Giá phòng:</lable>
                                       <input type="text" name="iGiaphong" value="{{$loaiphong[0]->iGiaphong}}" class="form-control input-sm" placeholder="250.000">
                                </div>
                            </div>     
                    </div>
                    <div class="row">
                         <div class="col-xs-12 col-md-12">
                               <div class="form-group">
                                  <label>Mô tả:</label>
                                  <label>Content</label>
                                  <textarea name="sMota" row="2" class="form-control" placeholder="Mô tả loại phòng khách sạn">
                                  {{$loaiphong[0]->sMota}}
                                  </textarea>
                               </div>
                           </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-md-12">
                          <div class="form-group">                       
                                  <label>Hình ảnh loại phòng:</label>
                                  <p><img width="200px" src="/upload/images/{{$loaiphong[0]->sHinhanh}}"></p>
                                  <input type="file" name="sHinhanh">
                         </div>
                       </div>
                    </div>
                     <div class="row" style="padding-top: 20px; padding-bottom: 20px;">
                        <div class="col-md-12">
                                    <input  type="reset" value="Reset" class="btn btn-success" 
                                    <i class="fa fa-check" aria-hidden="true"></i>
                                    </input>
                        </div>
                    </div>
                    <div class="row" style="padding-top: 20px; padding-bottom: 20px;">
                        <div class="col-md-12">
                                    <button class="btn btn-success" onclick="return confirm('Bạn có muốn sửa không?')">
                                    <i class="fa fa-check" aria-hidden="true"></i> Sửa
                                    </button>
                                    <a href="{{url('admincp/loaiphong/quan_ly_loai_phong')}}"><button class="btn btn-warning">
                                    <i class="fa fa-check" aria-hidden="true"></i> Quay lại
                                    </button></a>
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

