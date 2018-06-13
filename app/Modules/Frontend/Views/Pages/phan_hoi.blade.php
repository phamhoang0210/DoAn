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
        <div class="box_phanhoi">
          <div class="container">
                <div class="row">
                   <div class="col-xs-12 col-md-8">
                       <div class="ikhachhang">
                            <h1>I Thông tin khách hàng</h1>
                            <div class="row">
                                <div class="col-xs-12 col-md-3">
                                    <label>Họ & Tên:</label>
                                    <p>{{$khachhang[0]->sTenKH}}</p>
                                </div>
                                <div class="col-xs-12 col-md-3">
                                    <label>Giới tính:</label>
                                    <p>@if($khachhang[0]->iGioitinh==1)
                                        {{'Nam'}}
                                       @else
                                       {{'Nữ'}}
                                       @endif
                                    </p>
                                </div>
                                <div class="col-xs-12 col-md-2">
                                    <label>SDT:</label>
                                    <p>{{$khachhang[0]->sSDT}}</p>
                                </div>
                                <div class="col-xs-12 col-md-4">
                                    <label>Email:</label>
                                    <p>{{$khachhang[0]->sEmail}}</p>
                                </div>
                            </div>
                       </div>
                       <div class="form_phanhoi">
                          <h1>II Ý kiến phản hồi</h1>
                          <form action="{{url('phan_hoi/'.$khachhang[0]->sDinhdanh)}} " method="post">
                              <input type="hidden" name="_token" value="{{csrf_token()}}">
                              <input type="hidden" name="FK_IDKhachhang" value="{{$khachhang[0]->id}}">
                              <div class="row">
                                 <div class="col-xs-12 col-md-12">
                                      <div class="form-group">
                                        <label>Tiêu đề phản hồi</label>
                                        <input type="text" class="form-control" name="sTieude" required>
                                      </div>
                                 </div>
                              </div>
                              <div class="row">
                                 <p style="padding-left: 14px;font-family: sans-serif; padding-bottom: 10px;">Vấn đề phản hồi:</p>
                                 <div class="col-xs-12 col-md-6">
                                     <LABEL>Phòng:</LABEL>
                                      <select class="form-control form-control-lg" name="FK_IDPhong">
                                        <option value="0">--không chọn--</option>
                                        @foreach($phong as $value)
                                         <option value="{{$value->id}}">Phòng: {{$value->sTenP}}</option>
                                        @endforeach
                                      </select>
                                 </div>
                                 <div class="col-xs-12 col-md-6">
                                     <LABEL>Dịch vụ:</LABEL>
                                      <select class="form-control form-control-lg" name="FK_IDDichvu">
                                         <option value="0">--không chọn--</option>
                                        @foreach($dichvu as $value)
                                         <option value="{{$value->id}}">{{$value->sTenDV}}</option>
                                        @endforeach
                                      </select>
                                 </div>
                              </div>
                              <div class="row" style="padding-top: 20px;">
                                 <div class="col-xs-12 col-md-12">
                                       <div class="form-group">
                                        <label>Nội dung phản hồi:</label>
                                        <textarea class="form-control" rows="4" name="sNoidung"  required>
                                            
                                        </textarea>
                                      </div>
                                 </div>
                              </div>
                              <div class="row" style="margin-bottom: 20px;">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-success" style="float: right;"><span class="glyphicon glyphicon-send" aria-hidden="true"></span> Gửi</button>
                                </div>
                              </div>
                          </form>
                       </div>
                   </div>
                   <div class="col-xs-12 col-md-4">
                       <h1 class="ykienkhachhang">III Khách hàng phản hồi</h1>
                       <div class="phanhoikhachhang">
                        @foreach($phanhoi as $value)
                         <label style="color: #a80748">{{$value->khachhang->sTenKH}}</label>
                         <p style="padding-top: 10px; font-family: sans-serif;font-size: 12px; text-decoration: inherit;">{{$value->sNoidung}}</p>
                         <p style="font-size: 12px;padding-top: 6px; color: red;">      <?php 
                                                  $date="{$value->created_at}";
                                                  $intdate= strtotime($date);
                                                  echo date('d/m/Y h:i:s',$intdate); 
                                   ?> </p>
                         <hr/>
                        @endforeach
                       </div>
                   </div>
               </div><!--row-->
          </div><!--container-->
        </div><!--phan hoi-->
@stop