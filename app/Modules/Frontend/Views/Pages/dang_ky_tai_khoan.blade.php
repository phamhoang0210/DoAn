@extends('Frontend.master')

@section('trangchu')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<meta name="csrf-token" content="{{ csrf_token() }}" />
        <div class="menu">
            <div class="container">
                 <nav class="navbar navbar-default">
                      <!-- Brand and toggle get grouped for better mobile display -->
                      <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                          <span class="sr-only">Toggle navigation</span>
                          <span class="icon-bar"></span>
                          <span class="icon-bar"></span>
                          <span class="icon-bar"></span>
                        </button>     
                      </div>

                      <!-- Collect the nav links, forms, and other content for toggling -->
                      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav navbar-right">
                            <ul class="list-menu">
                              <li><a href="{{'/'}}">Trang chủ</a></li>
                              <li><a href="{{url('tintuc')}}">Tin tức</a></li>
                              <li><a href="{{url('dichvu')}}">Dịch vụ</a></li>
                              <li><a href="{{url('loaiphong')}}">Loại phòng</a></li>
                              <li><a href="{{url('gioithieu')}}">Giới thiệu</a></li>
                            </ul>
                          </li>
                        </ul>
                      </div><!-- /.navbar-collapse -->
                  </nav>
            </div>
        </div><!--menu-->
        <div class="slide_datphong">
            <!--background-->
        </div>
        @if(session('thongbao'))
                    <script type="text/javascript">
                      alert("{{session('thongbao')}}");
                    </script>
        @endif

         <div class="signin">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-md-8">
                        <h1>Đăng ký tài khoản:</h1>
                         <form action="" method="post">
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                                <div class="form-group">
                                  <label>Tên khách hàng:</label>
                                  <input type="text" class="form-control" name="name" required>
                                </div>
                                <div class="form-group">
                                  <label>Tài khoản:</label>
                                  <input type="text" class="form-control" name="email" required>
                                </div>
                                <div class="form-group">
                                  <label for="form-group">Mật khẩu:</label>
                                  <input type="password" class="form-control" name="password" required>
                                </div>
                                <div class="form-group">
                                      <label class="control-label">
                                           Mật khẩu nhập lại
                                       </label>           
                                      <input value="" type="password" class="form-control"  name="password_confirmation" required>
                                </div>
                                <div class="form-check">
                                  <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                  <label class="form-check-label" for="exampleCheck1">Bạn đồng ý với thông tin trên</label>
                                </div>
                                <button type="submit" class="btn btn-primary">Đăng ký</button>
                                <input type="reset" class="btn btn-default " value="Nhập Lại">
                          </form>
                    </div>
                    <div class="col-xs-12 col-md-4">
                            <div class="right_introduce">
                                 <h1>Danh mục</h1>
                                 <div class="danhmuc">
                                    <ul>
                                        <li><a href="index.html"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Trang chủ</a></li>
                                        <li><a href="dichvu.html"><span class="glyphicon glyphicon-cutlery" aria-hidden="true"></span>Dịch vụ</a></li>
                                        <li><a href="loaiphong.html"><span class="glyphicon glyphicon-tasks" aria-hidden="true"></span>Loại phòng</a></li>
                                        <li><a href="gioithieu.html"><span class="glyphicon glyphicon-bullhorn" aria-hidden="true"></span>Giới thiệu</a></li>
                                    </ul>
                                 </div>
                                 <h1>Hỗ trợ</h1>
                                 <p>Mrs.Thanh</p>
                                 <p><span class="glyphicon glyphicon-phone-alt" aria-hidden="true"></span>(84)985587882</p>
                            </div>
                            <div class="left_introduce1">
                                <a href="{{url('/')}}">
                                    <img src="{{asset('Frontend/images/logo.png')}}">
                                </a> 
                                <h1>Poonsa hanoi hotel</h1>
                            </div>
                    </div>
                </div>
            </div>
        </div>  
         
      
@stop