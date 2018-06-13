@extends('Frontend.master')

@section('datphong')
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
                              <li class="active"><a href="{{'/'}}">Trang chủ</a></li>
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
        <div class="slide">
            <div class="owl-carousel custom1">
                <div class="item"><h4><img src="{{asset('Frontend/images/slide1.png')}}" width="100%"></h4></div>
                <div class="item"><h4><img src="{{asset('Frontend/images/slide3.png')}}" width="100%"></h4></div>
                <div class="item"><h4><img src="{{asset('Frontend/images/slide2.png')}}" width="100%"></h4></div>
            </div>
        </div><!--slide-->
        @if(session('thongbao'))
                    <script type="text/javascript">
                      alert("{{session('thongbao')}}");
                    </script>
        @endif
        <div class="booking">
            <div class="container">
                <form action="{{'datphong'}}" method="post">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <div class="row">
                        <div class="col-xs-12 col-md-4">
                            <div class="group_booking">
                                <p>Ngày đến</p>
                                <input type="date" name="dNgayden">
                            </div>
                        </div>
                         <div class="col-xs-12 col-md-4">
                            <div class="group_booking">
                                <p>Ngày đi</p>
                                <input type="date" name="dNgaydi">
                            </div>  
                        </div>
                         <div class="col-xs-12 col-md-4">
                            <div class="group_booking">
                                <p>Loại phòng</p>
                                <select name="FK_IDLoaiphong">
                                    @foreach($loaiphong as $value)
                                    <option value="{{$value->id}}">{{$value->sTenLP}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-md-12">
                            <div class="btnbooking">
                                <p><button type="submit" class="btn btn-danger">Đặt phòng</button><p>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div><!--booking-->
        
        <div class="room">
            <div class="container">
                <div class="center_room">
                        <h2>Loại phòng</h2>
                         <?php $i=0;?>
                        <ul class="nav nav-tabs nav-justified">
                          @foreach($loaiphong->slice(0, 1) as $value)
                          <li class="active"><a data-toggle="tab" href="#home">{{$value->sTenLP}}</a></li>
                          <?php $i++;?>
                          @endforeach

                          @foreach($loaiphong->slice(1, 1) as $value)
                          <li><a data-toggle="tab" href="#menu1">{{$value->sTenLP}}</a></li>
                          @endforeach
                          @foreach($loaiphong->slice(2, 1) as $value)
                          <li><a data-toggle="tab" href="#menu2">{{$value->sTenLP}}</a></li>
                          @endforeach
                        </ul>


                        <div class="tab-content">
                          @foreach($loaiphong->slice(0, 1) as $value)
                          <div id="home" class="tab-pane fade in active">
                            <h3>* {{$value->sTenLP}}</h3>
                            <div class="row">
                                <div class="col-xs-12 col-md-4">
                                    <div class="img_room"
                                        <a href="#">
                                            <img src="{{asset('upload/images/').'/'.$value->sHinhanh}}" width="300px">
                                        </a>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-md-8">
                                    <div class="right_room">
                                        <h1>* Phòng cao cấp (Superior Room)</h1>
                                        <p class="mota">{{$value->sMota}}</p>
                                         <p class="price">*Giá phòng:<label>
                                           <?php
                                                  $gia="{$value->iGiaphong}";
                                                  $float=(int)$gia;
                                                  echo number_format("$float");
                                            ?>  
                                          VNĐ/ĐÊM<label>
                                        </p>
                                    </div>
                                </div>
                            </div>
                          </div>
                          @endforeach

                          @foreach($loaiphong->slice(1, 1) as $value)
                          <div id="menu1" class="tab-pane fade">
                            <h3>{{$value->sTenLP}}</h3>
                            <div class="row">
                                <div class="col-xs-12 col-md-4">
                                    <div class="img_room"
                                        <a href="#">
                                            <img src="{{asset('upload/images/').'/'.$value->sHinhanh}}" width="300px">
                                        </a>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-md-8">
                                    <div class="right_room">
                                        <h1>* {{$value->sTenLP}}</h1>
                                        <p class="mota">{{$value->sMota}}</p>
                                        <p class="price">*Giá phòng:<label>
                                           <?php
                                                  $gia="{$value->iGiaphong}";
                                                  $float=(int)$gia;
                                                  echo number_format("$float");
                                            ?>  
                                          VNĐ/ĐÊM<label>
                                        </p>
                                    </div>
                                </div>
                            </div>
                          </div>
                          @endforeach
                          @foreach($loaiphong->slice(2, 1) as $value)
                          <div id="menu2" class="tab-pane fade">
                            <h3>{{$value->sTenLP}}</h3>
                            <div class="row">
                                <div class="col-xs-12 col-md-4">
                                    <div class="img_room"
                                        <a href="#">
                                            <img src="{{asset('upload/images/').'/'.$value->sHinhanh}}" width="300px">
                                        </a>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-md-8">
                                    <div class="right_room">
                                        <h1>* {{$value->sTenLP}}</h1>
                                        <p class="mota">{{$value->sMota}}</p>
                                         <p class="price">*Giá phòng:<label>
                                           <?php
                                                  $gia="{$value->iGiaphong}";
                                                  $float=(int)$gia;
                                                  echo number_format("$float");
                                            ?>  
                                          VNĐ/ĐÊM<label>
                                        </p>
                                    </div>
                                </div>
                            </div>
                          </div>
                          @endforeach         
                </div>
            </div>
        </div><!--room-->
        
        <div class="service">
            <div class="container">
                <h1>Dịch vụ</h1>
                <div class="slide_service">
                    <div class="owl-carousel owl-theme">
                       @foreach($dichvu as $value)
                        <div class="item">
                           <!--  <a href="#"> -->
                                <div class="group_dichvu">
                                    <h2>{{$value->sTenDV}}</h2>
                                    <p class="dongia"><span class="glyphicon glyphicon-hand-right" aria-hidden="true"></span> Giá: <label>
                                       <?php
                                          $gia="{$value->iDongia}";
                                          $float=(int)$gia;
                                          echo number_format("$float");
                                        ?>  
                                        VNĐ<label>
                                    </label>
                                    </p>
                                    <p class="mota"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span>{{$value->sMota}}</p>
                                </div>  
                           <!--  </a> -->
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div><!--service-->
        
        <div class="tintuc">
            <div class="container">
                <h1>Tin tức</h1>
                <div class="row">
                    <div class="col-xs-12 col-md-6">
                        @foreach($tintuc->slice(0,1) as $value)
                        <div class="top">
                            <a href="{{url('chitiettintuc/'.$value->id)}}">
                                <img src="{{asset('upload/images/').'/'.$value->sHinhanh}}" width="100%">
                                <p class="title_tintuc">{{$value->sTieude}}</p>
                                <p class="date">  <?php 
                                                  $date="{$value->created_at}";
                                                  $intdate= strtotime($date);
                                                  echo date('d/m/Y H:i:s',$intdate); 
                                                ?> 
                                </p>
                                <p class="tomtat">{{$value->sTomtat}}</p>
                            </a>
                        </div>
                        @endforeach
                    </div>
                    <div class="col-xs-12 col-md-6">
                        @foreach($tintuc->slice(1,3) as $value)
                        <div class="tintuc_top3">
                            <a href="{{url('chitiettintuc/'.$value->id)}}">
                                <div class="row">
                                    <div class="col-xs-12 col-md-4">
                                        <img src="{{asset('upload/images/').'/'.$value->sHinhanh}}" width="100%">
                                    </div>
                                     <div class="col-xs-12 col-md-8">
                                         <p class="title_tintuc1">{{$value->sTieude}}</p>
                                         <p class="date">
                                                <?php 
                                                  $date="{$value->created_at}";
                                                  $intdate= strtotime($date);
                                                  echo date('d/m/Y H:i:s',$intdate); 
                                                ?> 
                                         </p>
                                         <p class="tomtat2">{{$value->sTomtat}}</p>
                                    </div>
                                </div>
                            </a>
                            <hr/>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div><!--tintuc-->
@stop