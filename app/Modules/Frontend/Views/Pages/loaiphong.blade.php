@extends('Frontend.master')

@section('loaiphong')
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
                              <li class="active"><a href="{{'loaiphong'}}">Loại phòng</a></li>
                              <li><a href="{{'gioithieu'}}">Giới thiệu</a></li>
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
        
        <div class="room_style">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-md-8">
                        <div class="room_left">
                        	@foreach($loaiphong as $value)
                            <div class="room_group">
                                <div class="row">
                                    <div class="col-xs-12 col-md-6">
                                        <img src="{{asset('upload/images/').'/'.$value->sHinhanh}}" alt="loaiphong" class="img-rounded" width="100%">
                                    </div>
                                    <div class="col-xs-12 col-md-6">
                                        <div class="introduce_room">
                                            <form action="{{url('loaiphong')}}" method="post">
                                            	<input type="hidden" name="_token" value="{{csrf_token()}}">
                                            	<input type="hidden" value="{{$value->id}}" name="id">
                                                <h1>{{$value->sTenLP}}</h1>
                                                <div class="progress">
                                                  <div class="progress-bar progress-bar-success progress-bar-striped" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
                                                    <span class="sr-only">40% Complete (success)</span>
                                                  </div>
                                                </div>
                                                <p><span class="glyphicon glyphicon-hand-right" aria-hidden="true"></span>  Kích thước phòng: <label>60m2</label></p>
                                                <p><span class="glyphicon glyphicon-hand-right" aria-hidden="true"></span>  Tầm nhìn: <label>Nhìn ra thành phố</label></p>
                                                <p><span class="glyphicon glyphicon-hand-right" aria-hidden="true"></span>  Wifi: <label>free</label></p>
                                                <p><span class="glyphicon glyphicon-hand-right" aria-hidden="true"></span>  Giá phòng: <label>
                                                <?php
                                                  $gia="{$value->iGiaphong}";
                                                  $float=(int)$gia;
                                                  echo number_format("$float");
                                                ?>
                                                VND/NGAY</label></p> 
                                                <button class="btn btn-success" type="submit">Đặt phòng</button>
                                                <a href="{{'/'}}"<button class="btn btn-warning" type="submit">Quay lại</button></a>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="col-xs-12 col-md-4">
                        <div class="room_right">
                             <div class="right_introduce">
                             <h1>Danh mục</h1>
                             <div class="danhmuc">
                                <ul>
                                    <li><a href="{{url('/')}}"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Trang chủ</a></li>
                                    <li><a href="{{url('dichvu')}}"><span class="glyphicon glyphicon-cutlery" aria-hidden="true"></span>Dịch vụ</a></li>
                                    <li><a href="{{url('loaiphong')}}"><span class="glyphicon glyphicon-tasks" aria-hidden="true"></span>Loại phòng</a></li>
                                    <li><a href="{{'gioithieu'}}"><span class="glyphicon glyphicon-bullhorn" aria-hidden="true"></span>Giới thiệu</a></li>
                                </ul>
                             </div>
                             <h1>Hỗ trợ</h1>
                             <p>Mrs.Thanh</p>
                             <p><span class="glyphicon glyphicon-phone-alt" aria-hidden="true"></span>(84)985587882</p>
                        </div>
                        <div class="left_introduce1">
                            <a href="{{'/'}}">
                                <img src="{{asset('Frontend/images/logo.png')}}">
                            </a> 
                            <h1>Poonsa hanoi hotel</h1>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div><!--room_style-->
@stop