@extends('Frontend.master')

@section('tintuc')
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
                              <li class="active"><a href="{{url('tintuc')}}">Tin tức</a></li>
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
        <div class="slide_hoadon">
         
        </div>
        
        <div class="content">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-md-3">
                        <div class="left_content">
                            <h1>Bài Đăng</h1>
                            <div class="top10_tieude">
                                <ul>
                                   @foreach($tintuc->slice(0,9) as $value)
                                   <li><a href="chitiet_tintuc.html"><span class="glyphicon glyphicon-share-alt" aria-hidden="true"></span>{{$value->sTieude}}</a></li>
                                   @endforeach
                                </ul>
                            </div>
                            <h1>Danh mục</h1>
                            <div class="danhmuc">
                                <ul>
                                    <li><a href="{{url('/')}}"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Trang chủ</a></li>
                                    <li><a href="{{url('dichvu')}}"><span class="glyphicon glyphicon-cutlery" aria-hidden="true"></span>Dịch vụ</a></li>
                                    <li><a href="{{url('loaiphong')}}"><span class="glyphicon glyphicon-tasks" aria-hidden="true"></span>Loại phòng</a></li>
                                    <li><a href="gioithieu.html"><span class="glyphicon glyphicon-bullhorn" aria-hidden="true"></span>Giới thiệu</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-md-7">
                        <div class="center_content">
                            <h1>Tin Tức</h1>
                            @foreach($tintuc as $value)
                            <div class="group_tintuc">
                                <a href="{{url('chitiettintuc/'.$value->id)}}">
                                    <div class="row">
                                        <div class="col-xs-12 col-md-4">
                                            <img src="{{asset('upload/images/').'/'.$value->sHinhanh}}" alt="tintuc" width="100%">
                                        </div>
                                        <div class="col-xs-12 col-md-8">
                                            <p class="tieude_tintuc">{{$value->sTieude}}</p> 
                                            <p class="des_tintuc">{{$value->sTomtat}}</p>
                                            <p class="date">{{$value->created_at}}</p>
                                        </div>  
                                    </div>
                                    <hr/> 
                                </a>
                            </div>
                            @endforeach
                        </div>
                        <div style="margin: 0 auto; text-align: center;">{!!$tintuc->links()!!}</div>
                    </div>
                    <div class="col-xs-12 col-md-2">
                        <h1>Nổi bật</h1>
                        @foreach($toptintuc ->slice(0,4) as $value)
                        <div class="group_noibat">
                            <a href="#">
                                <img src="{{asset('upload/images/').'/'.$value->sHinhanh}}" alt="tintuc" width="100%">
                                <p class="tieude_tintuc">{{$value->sTieude}}</p>
                                <p class="views">{{$value->iSoluotxem}} views</p>
                            </a>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div><!--content-->
@stop