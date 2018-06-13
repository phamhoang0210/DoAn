@extends('Frontend.master')

@section('dichvu')
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
                              <li><a href="{{url('/')}}">Trang chủ</a></li>
                              <li><a href="{{url('tintuc')}}">Tin tức</a></li>
                              <li class="active"><a href="{{url('dichvu')}}">Dịch vụ</a></li>
                              <li><a href="{{url('loaiphong')}}">Loại phòng</a></li>
                              <li><a href="{{url('gioithieu')}}">Giới thiệu</a></li>
                            </ul>
                          </li>
                        </ul>
                      </div><!-- /.navbar-collapse -->
                  </nav>
            </div>
        </div><!--menu-->
        <div class="slide_hoadon">
         
        </div>
        <div class="content_dichvu">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-md-9">
                        <div class="list_service">
                            <h1><span>Dịch vụ</span></h1>
                            @foreach($dichvu as $value)
                            <div class="box_dichvu">
                                <a href="#">
                                    <div class="row">
                                        <div class="col-xs-12 col-md-4">
                                            <img src="{{asset('upload/images/').'/'.$value->sHinhanh}}" alt="dichvu" width="100%">
                                        </div>
                                        <div class="col-xs-12 col-md-8">
                                            <p class="text3">{{$value->sTenDV}}</p>
                                            <p class="text4">Giá: <label>
                                               <?php
                                                  $gia="{$value->iDongia}";
                                                  $float=(int)$gia;
                                                  echo number_format("$float");
                                                ?>
                                            VNĐ</label></p>
                                            <p class="text5">{{$value->sMota}}</p>
                                        </div>
                                    </div>
                                </a>
                                <hr>
                            </div>
                            @endforeach   
                        </div>
                    </div>
                    <div class="col-xs-12 col-md-3">
                        <div class="left_dichvu">
                            <h1>Mục lục dịch vụ</h1>
                            <ul>
                            	  @foreach($dichvu as $value)
                                <li><a href="{{url('dichvu')}}"><span class="glyphicon glyphicon-hand-right" aria-hidden="true"></span>{{$value->sTenDV}}</a></li>
                                @endforeach
                            </ul>
                            <h1>Danh mục</h1>
                            <div class="danhmuc">
                                <ul>
                                    <li><a href="{{url('/')}}"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Trang chủ</a></li>
                                    <li><a href="{{url('dichvu')}}"><span class="glyphicon glyphicon-cutlery" aria-hidden="true"></span>Dịch vụ</a></li>
                                    <li><a href="{{url('loaiphong')}}"><span class="glyphicon glyphicon-tasks" aria-hidden="true"></span>Loại phòng</a></li>
                                    <li><a href="{{url('gioithieu')}}"><span class="glyphicon glyphicon-bullhorn" aria-hidden="true"></span>Giới thiệu</a></li>
                                </ul>
                            </div>
                            <h1>Hỗ trợ</h1>
                            <p>Mrs.Hương</p>
                            <p><span class="glyphicon glyphicon-phone-alt" aria-hidden="true"></span>(84)98647375</p>
                        </div>
                    </div>
                </div>
            </div>
        </div><!--content_dichvu-->
@stop