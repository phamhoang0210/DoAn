@extends('Frontend.master')

@section('nguoidungdangnhap')
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

         <div class="info_phong">
          <div class="container">
               <h1>Thông tin phòng khách sạn</h1>
               <div class="row">
                 <div class="col-xs-12 col-md-3">
                    <div class="choosedays">
                       <div class="noise">
                         <h4>
                          <span class="glyphicon glyphicon-hand-right" aria-hidden="true"></span>
                          Gợi ý: <span>Quý khách muốn tra cứu thông tin phòng của khách sạn để nắm được lịch phòng xin hãy làm theo các bước sau:</span>
                         </h4>
                         <p><span class="glyphicon glyphicon-record" aria-hidden="true"></span>
                           B1: Chọn ngày bắt đầu
                         </p>
                         <p><span class="glyphicon glyphicon-record" aria-hidden="true"></span>
                           B2: Chọn ngày kết thúc
                         </p>
                         <p><span class="glyphicon glyphicon-record" aria-hidden="true"></span>
                           B3: Chọn nút "Tìm kiếm"
                         </p>
                       </div>
                       <h3>Chọn khoảng thời gian</h3>
                       <form action="" method="post">
                          <input type="hidden" name="_token" value="{{csrf_token()}}">
                          <div class="form-group">
                            <label>Ngày bắt đầu:</label>
                            <input type="date" name="dNgaybd" class="form-control">
                          </div>
                          <div class="form-group">
                            <label>Ngày kết thúc:</label>
                            <input type="date" name="dNgaykt" class="form-control">
                          </div>
                      <button type="submit" class="btn btn-primary form-control">Tìm kiếm</button>
                     </form>
                    </div>
                 </div>
                 <div class="col-xs-12 col-md-9">
                  <div class="showroom">
                    @foreach($articles as $value)
                    <div class="homehotel">
                        <div class="homedays">
                           <p>{{($value['ngay'])}}</p>
                        </div>
                        <div class="boxroom">
                              <ul class="nav nav-tabs">
                                <li class="active"><a data-toggle="tab" href="#{{$value['intngay']}}1">Phòng cao cấp</a></li>
                                <li><a data-toggle="tab" href="#{{$value['intngay']}}2">Phòng hạng sang</a></li>
                                <li><a data-toggle="tab" href="#{{$value['intngay']}}3">Phòng hạng trung</a></li>
                              </ul>

                              <div class="tab-content">
                                <div id="{{$value['intngay']}}1" class="tab-pane fade in active">
                                       <div class="row">
                                        <div class="col-md-12" style="padding-top: 10px;">
                                          <div class="row">
                                             <p style="font-family: sans-serif;">Phòng đã đặt:</p>
                                              @foreach($value['phongdadat1'] as $pcc)
                                                <div class="col-md-3" style="padding-bottom: 10px;">
                                                    <div class="iroom">
                                                       <p>Phòng: {{$pcc->sTenP}}</p>
                                                       @if($pcc->iTrangthai==1)
                                                       <p>
                                                        <span class="label label-info">Còn phòng</span>
                                                       </p>
                                                       @else
                                                        <p>
                                                        <span class="label label-warning">Đã đặt</span>
                                                       </p>
                                                       @endif
                                                    </div>
                                                </div>
                                               @endforeach
                                          </div>
                                           <div class="row">
                                            <p style="font-family: sans-serif;">Phòng trống:</p>
                                            @foreach($value['phongtrong1'] as $pt1)
                                              <div class="col-md-3" style="padding-bottom: 10px;">
                                                  <div class="iroom">
                                                     <p>Phòng: {{$pt1->sTenP}}</p>
                                                     @if($pt1->iTrangthai==1)
                                                     <p>
                                                      <span class="label label-info">Còn phòng</span>
                                                     </p>
                                                     @else
                                                      <p>
                                                      <span class="label label-warning">Đã đặt</span>
                                                     </p>
                                                     @endif
                                                  </div>
                                              </div>
                                              @endforeach
                                            </div>
                                        </div>
                                      </div>
                                </div>
                                <div id="{{$value['intngay']}}2" class="tab-pane fade">
                                     <div class="row">
                                        <div class="col-md-12" style="padding-top: 10px;">
                                          <div class="row">
                                             <p style="font-family: sans-serif;padding-bottom: 20px;">Phòng đã đặt:</p>
                                              @foreach($value['phongdadat2'] as $phs)
                                                <div class="col-md-3" style="padding-bottom: 10px;">
                                                    <div class="iroom">
                                                       <p>Phòng: {{$phs->sTenP}}</p>
                                                       @if($phs->iTrangthai==1)
                                                       <p>
                                                        <span class="label label-info">Còn phòng</span>
                                                       </p>
                                                       @else
                                                        <p>
                                                        <span class="label label-warning">Đã đặt</span>
                                                       </p>
                                                       @endif
                                                    </div>
                                                </div>
                                               @endforeach
                                           </div>
                                           <div class="row">
                                            <p style="font-family: sans-serif;padding-bottom: 20px;">Phòng trống:</p>
                                            @foreach($value['phongtrong2'] as $pt2)
                                              <div class="col-md-3" style="padding-bottom: 10px;">
                                                  <div class="iroom">
                                                     <p>Phòng: {{$pt2->sTenP}}</p>
                                                     @if($pt2->iTrangthai==1)
                                                     <p>
                                                      <span class="label label-info">Còn phòng</span>
                                                     </p>
                                                     @else
                                                      <p>
                                                      <span class="label label-warning">Đã đặt</span>
                                                     </p>
                                                     @endif
                                                  </div>
                                              </div>
                                              @endforeach
                                            </div>
                                        </div>
                                      </div>
                                </div>
                                <div id="{{$value['intngay']}}3" class="tab-pane fade">
                                     <div class="row">
                                        <div class="col-md-12" style="padding-top: 10px;">
                                          <div class="row">
                                             <p style="font-family: sans-serif;padding-bottom: 20px;">Phòng đã đặt:</p>
                                              @foreach($value['phongdadat3'] as $pht)
                                                <div class="col-md-3" style="padding-bottom: 10px;">
                                                    <div class="iroom">
                                                       <p>Phòng: {{$pht->sTenP}}</p>
                                                       @if($pht->iTrangthai==1)
                                                       <p>
                                                        <span class="label label-info">Còn phòng</span>
                                                       </p>
                                                       @else
                                                        <p>
                                                        <span class="label label-warning">Đã đặt</span>
                                                       </p>
                                                       @endif
                                                    </div>
                                                </div>
                                               @endforeach
                                           </div>
                                           <div class="row">
                                           <p style="font-family: sans-serif;padding-bottom: 20px;">Phòng đã đặt:</p>
                                            @foreach($value['phongtrong3'] as $pt3)
                                              <div class="col-md-3" style="padding-bottom: 10px;">
                                                  <div class="iroom">
                                                     <p>Phòng: {{$pt3->sTenP}}</p>
                                                     @if($pt3->iTrangthai==1)
                                                     <p>
                                                      <span class="label label-info">Còn phòng</span>
                                                     </p>
                                                     @else
                                                      <p>
                                                      <span class="label label-warning">Đã đặt</span>
                                                     </p>
                                                     @endif
                                                  </div>
                                              </div>
                                              @endforeach
                                            </div>
                                        </div>
                                      </div>
                                </div>
                              </div>   
                        </div><!--boxroom-->
                    </div><!--homehotel-->
                  @endforeach
                 </div><!--showroom-->
               </div>
               </div>
               </div>
          </div>
         </div>  
         
      
@stop