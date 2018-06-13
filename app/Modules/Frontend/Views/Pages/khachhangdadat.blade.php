@extends('Frontend.master')

@section('khachhangdadat')
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
        <div class="slide_hoadon">
         
        </div>
        @if(session('thongbao'))
                    <script type="text/javascript">
                      alert("{{session('thongbao')}}");
                    </script>
        @endif
        <div class="hoadon">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-md-8">
                        <div class="left_hoadon">
                            <h1>Thông tin của tôi</h1>
                                        
                            <div class="form_hoadon">
                                <img src="{{asset('Frontend/images/logo.png')}}" width="100px">
                                <h2>Đặt phòng khách hàng</h2>
                                <p class="border_dashed"></p>
                                <h4>Thông tin cá nhân:</h4>
                                <div class="row">
                                    <div class="col-xs-12 col-md-6">
                                       <p>Mã khách hàng:<label>{{$khachhang[0]->id}}</label></p>
                                       <p>Tên khách hàng:<label>{{$khachhang[0]->sTenKH}}</label></p>
                                        <p>Giới tính:<label>
                                            @if($khachhang[0]->iGioitinh==1)
                                             {{'Nam'}}
                                            @else
                                             {{'Nữ'}}
                                            @endif 
                                        </label></p>
                                        <p>Định danh:<label>{{$khachhang[0]->sDinhdanh}}</label></p>
                                    </div>
                                    <div class="col-xs-12 col-md-6">
                                        <p>Địa chỉ:<label>{{$khachhang[0]->sDiachi}}</label></p>
                                        <p>Email:<label>{{$khachhang[0]->sEmail}}</label></p>
                                        <p>SĐT:<label>{{$khachhang[0]->sSDT}}</label></p>
                                    </div>
                                </div>
                                <p class="border_dashed"></p>
                                <h4>Loại phòng đã đặt:</h4> 
                                @foreach($datphong as $value)
                                @if($value->iTrangthaidat==1 || $value->iTrangthaidat==2)
                                <div class="box_datphong">
                                    <form action="{{url('capnhatdatphong/'.$value->id)}}" method="post">
                                    <input type="hidden" name="_token" value="{{csrf_token()}}">     
                                    <div class="row">
                                        <input type="hidden" name="sDinhdanh" value="{{$value->khachhang->sDinhdanh}}">
                                        <div class="col-xs-12 col-md-3">
                                            <img src="{{asset('upload/images/').'/'.$value->loaiphong->sHinhanh}}" alt="loaiphong" width="100%">
                                        </div>
                                        <div class="col-xs-12 col-md-4">
                                            <p>Tên loại phòng:</p>
                                            <h2>{{$value->loaiphong->sTenLP}}</h3>
                                            <div class="form-group">
                                                <span>Số lượng phòng:</span>
                                                <select name="iSoluongphong">
                                                    <option value="{{$value->iSoluongphong}}">{{$value->iSoluongphong}}</option>
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                    <option value="5">5</option>
                                                    <option value="5">6</option>
                                                    <option value="5">7</option>
                                                  </select>
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-md-3">
                                            <p>Giá:</p>
                                            <h2>
                                              <?php
                                              $gia="{$value->loaiphong->iGiaphong}";
                                              $float=(int)$gia;
                                              echo number_format("$float");
                                              ?>
                                              VNĐ/ĐÊM
                                            </h2>
                                            <p style="padding-bottom: 2px;">Ngày đến: 
                                              <?php 
                                              $date="{$value->dNgayden}";
                                              $intdate= strtotime($date);
                                              echo date('d/m/Y',$intdate); 
                                              ?>    
                                            </p>
                                            <p>Ngày đi:
                                                <?php 
                                                  $date="{$value->dNgaydi}";
                                                  $intdate= strtotime($date);
                                                  echo date('d/m/Y',$intdate); 
                                                ?> 
                                            </p>
                                        </div>
                                        <div class="col-xs-12 col-md-2">
                                            <p>Trạng thái:</p>
                                            <div class="form-group">                       
                                                    <p>
                                                        <label class="radio-inline">
                                                            <input @if($value->iTrangthaidat==1)
                                                                   {{'checked'}}
                                                                   @endif
                                                             type="radio" name="iTrangthaidat" value="1">Đặt
                                                        </label>
                                                        <label class="radio-inline">
                                                            <input type="radio" name="iTrangthaidat" value="0">Hủy
                                                        </label>   
                                                    </p>
                                            </div>
                                   
                                             <button 
                                              @if($value->iTrangthaidat==2)
                                                   {{"disabled"}}
                                              @endif
                                             type="submit" class="btn btn-info"><span class="glyphicon glyphicon-refresh" aria-hidden="true"></span> Cập nhật</button>
                                        </div>
                                     </div>
                                    </form>
                                </div>
                                @endif
                                @endforeach
                                <p class="border_dashed"></p>
                                <h4>Dịch vụ đã đặt:</h4> 
                                @foreach($datdichvu as $value) 
                                @if($value->iTrangthaidat==1 || $value->iTrangthaidat==2)
                                <div class="box_datdichvu">
                                    <form action="{{url('capnhatdatdichvu/'.$value->id)}}" method="post">
                                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                                    <div class="row">
                                    <input type="hidden" name="sDinhdanh" value="{{$value->khachhang->sDinhdanh}}">
                                        <div class="col-xs-12 col-md-3">
                                            <img src="{{asset('upload/images/').'/'.$value->dichvu->sHinhanh}}" alt="loaiphong" width="100%">
                                        </div>
                                        <div class="col-xs-12 col-md-4">
                                            <p>Tên dịch vụ:</p>
                                            <h2>{{$value->dichvu->sTenDV}}</h3>
                                            <div class="form-group">
                                                <span>Số lượng dịch vụ:</span>
                                                <select name="iSoluong">
                                                    <option value="{{$value -> iSoluong}}">{{$value -> iSoluong}}</option>
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                    <option value="5">5</option>
                                                    <option value="6">6</option>
                                                    <option value="7">7</option>
                                                    <option value="8">8</option>
                                                    <option value="9">9</option>
                                                    <option value="10">10</option>
                                                    <option value="11">11</option>
                                                    <option value="12">12</option>
                                                    <option value="13">13</option>
                                                    <option value="14">14</option>
                                                    <option value="15">15</option>
                                                  </select>
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-md-2">
                                            <p>Giá:</p>
                                            <h2>
                                              <?php
                                              $gia="{$value->dichvu->iDongia}";
                                              $float=(int)$gia;
                                              echo number_format("$float");
                                              ?>
                                              VNĐ/ĐÊM
                                            </h2>
                                        </div>
                                        <div class="col-xs-12 col-md-3">
                                            <p>Trạng thái:</p>
                                            <div class="form-group">                       
                                                    <p>
                                                        <label class="radio-inline">
                                                            <input 
                                                            @if($value->iTrangthaidat==1)
                                                              {{'checked'}}
                                                            @endif
                                                            type="radio" name="iTrangthaidat" value="1">Đặt
                                                        </label>
                                                        <label class="radio-inline">
                                                            <input type="radio" name="iTrangthaidat" value="0">Hủy
                                                        </label>   
                                                    </p>
                                            </div>
                                             <button 
                                             @if($value->iTrangthaidat==2)
                                                   {{"disabled"}}
                                             @endif
                                              type="submit" class="btn btn-info"><span class="glyphicon glyphicon-refresh" aria-hidden="true"></span> Cập nhật</button>
                                        </div>
                                     </div>
                                    </form>
                                </div>
                                @endif
                                @endforeach
                                <p class="border_dashed"></p>
                                <h4>Thành tiền:</h4> 
                                <div class="alert alert-info" role="alert">Tổng tiền + VAT :<span>
                                <?php
                                    $gia="{$total}";
                                    $float=(int)$gia;
                                     echo number_format("$float");
                                 ?> VNĐ</span></div>
                            </div>

                            
                 
                        </div>
                        <div class="note">
                            <h1>Các bước thực hiện của khách hàng:</h1>
                            <p>* Xem thông tin phòng</p>
                            <p>* Đặt phòng</p>
                            <p>* Xem thông tin hóa đơn</p>
                            <p>* Nếu có nhu cầu dịch vụ, mời quý khách bấm "đến trang dịch vụ"</p>
                            <p>* Khách hàng chờ xác nhận của nhân viên</p>
                            <p>* Khách hàng đến nhận phòng và làm thủ tục thanh toán</p>
                        </div>
                        <div class="phanhoi">
                          <a href="{{url('phan_hoi/'.$khachhang[0]->sDinhdanh)}}">
                            <button type="button" class="btn btn-success">Phản hồi  >>
                            </button>
                          </a>
                        </div>
                    </div>
                    
                    <div class="col-xs-12 col-md-4">
                        <div class="right_hoadon">
                            <h1>Dịch vụ</h1>
                            @foreach($dichvu->slice(0,5) as $value)
                            <div class="service_right">
                                <div class="service_img">
                                    <img src="{{asset('/upload/images/'.$value->sHinhanh)}}" width="100%">  
                                </div>
                                <div class="service_des">
                                    <p class="service_title">{{$value->sTenDV}}</p>
                                   
                                    <p class="service_price">
                                      <?php
                                      $gia="{$value->iDongia}";
                                      $float=(int)$gia;
                                      echo number_format("$float");
                                      ?>
                                      VNĐ
                                    </p>
                                   
                                </div>
                            </div>
                            @endforeach
                           
                            <p style="color:#f00; font-family: sans-serif;font-weight: bold; font-size: 25px;padding-bottom: 10px;">Khách hàng đặt dịch vụ</p>
                            <form action="{{url('datdichvu/'.$khachhang[0]->sDinhdanh)}}" method="post">
                                <input type="hidden" name="_token" value="{{csrf_token()}}">
                                <input type="hidden" name="sDinhdanh" value="{{$khachhang[0]->sDinhdanh}}">
                                <p class="btndatdv">
                                    <button type="submit" class="btn btn-info btn-lg" width="100%">
                                    <span class="glyphicon glyphicon-send" aria-hidden="true"></span>
                                    Đặt dịch vụ</button>
                                </p>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div><!--hoadon-->

        <script>
        function format_curency(a) {
            a.value = a.value.replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1.");
        }
        </script>
@stop