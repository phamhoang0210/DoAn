@extends('backend/master')
<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from dev.lorvent.com/fitness/admin_userlist.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 10 Nov 2016 10:51:54 GMT -->
<head>
    <meta charset="UTF-8">
    <title>Quản lý quyền| CMS</title>
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
                        <a href="{{url('admincp/user/ql-quyen')}}" class="activated">Quản lý quyền</a>
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
                                <i class="fa fa-fw fa-user"></i> Quản lý quyền 
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
                                        <form id="add_users_form" action="{{ url('admincp/user/ql-quyen') }}" method="POST" class="form-horizontal">
                                       <div class="form-body">
                                                 <div class="form-group">
                                                    <label class="col-md-3 control-label" for="usr_name">
                                                       
                                                    </label>
                                                    <div class="col-md-7">
                                                        <div class="input-group">
                                                            
                                                            <a onclick="themquyen()" href="javascript:void(0)" class="btn btn-success">Thêm Quyền</a>                                 
                                                        </div>
                                                    </div>
                                                </div>

                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="usr_name">
                                                       Loại người dùng
                                    </label>
                                <div class="col-md-7">
                                <div class="input-group">
                                <span class="input-group-addon"><i class=" text-primary"></i></span>
                                                                                             
                                   <select class="form-control" name="FK_IDLoaitaikhoan">
                                        <?php for ($i=0; $i<count($user_types);$i++)
                                        if ($user_types[$i]->id!=2)
                                        { ?>
                                             <option value="{{ $user_types[$i]->id }}" >{{ $user_types[$i]->sTen }}</option>
                                        <?php } ?>
                                    </select>               
                                </div>
                               </div>
                               </div>
 


                                                
                                            </div>
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            <div class="row">
                                                     <div class="col-md-offset-3 col-md-9">

                                                        <input type="submit" class="btn btn-primary" value="Quản lý"> &nbsp;
                                                     
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

    <div class="modal fade-out" id="themquyen" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title">Thêm Quyền</a></h3>
            </div>
            <div class="modal-body form">
                <form id="upload1" action="{{url('admincp/user/tao-quyen')}}" method="POST" role="form" enctype="multipart/form-data">
                    <div class="form-group">
                    <label for="username" class="control-label">Tên quyền</label>
                        <input type="text" class="form-control" name="ten_quyen"
                    required="required"> 
                    <label for="username" class="control-label">Mô tả quyền</label>
                        <input type="text" class="form-control" name="description"
                    required="required"> 
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                    </div>
                    <center><button type="submit" class="btn btn-primary">Thêm</button></center>
                </form>
            <div class="form-group">
                <div id="uploadBox1"></div>

            </div>
            </div><!-- /.modal-content -->  
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
</div>
<script>
function themquyen(){
    $('#themquyen').modal('show');
}
</script>
    @stop
    @section('footer_import')

    <script src="{{asset('backend/vendors/holder/holder.js')}}" type="text/javascript"></script>
    <script src="{{asset('backend/vendors/jasny-bootstrap/js/jasny-bootstrap.js')}}" type="text/javascript"></script>
    <script src="{{asset('backend/vendors/iCheck/icheck.js')}}" type="text/javascript"></script>
    <script src="{{asset('backend/vendors/select2/js/select2.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('backend/vendors/bootstrapvalidator/dist/js/bootstrapValidator.js')}}" type="text/javascript"></script>
    <script src="{{asset('backend/vendors/sweetalert/dist/sweetalert2.js')}}" type="text/javascript"></script>
  

    <!-- end of page level js -->
    <!-- begining of page level js -->
    @stop
</body>
</html>

