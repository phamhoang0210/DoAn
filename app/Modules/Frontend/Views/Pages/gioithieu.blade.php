@extends('Frontend.master')

@section('gioithieu')
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
                              <li><a href="{{url('dichvu')}}">Dịch vụ</a></li>
                              <li><a href="{{url('loaiphong')}}">Loại phòng</a></li>
                              <li class="active"><a href="{{url('gioithieu')}}">Giới thiệu</a></li>
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
        <div class="content_introduce">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-md-8">
                       
                        <div class="left_introduce2">
                            <h1><span class="glyphicon glyphicon-star-empty" aria-hidden="true"></span> Giới thiệu chung:</h1>
                            <h3>Khách sạn Poonsa Có vị trí ở trung tâm Duy Tân, Quận Cầu Giấy - Địa chỉ số 36C Dịch Vọng Hậu, Cầu Giấy, Hà Nội</h3>
                            <h3>(Bắt đầu mở cửa và đi vào hoạt động từ ngày 10 tháng 7 năm 2017)</h3>
                            <h3>Vị trí này rất thuận tiện cho khách đến công tác và làm việc tại văn phòng các tòa nhà văn phòng như HITC, Keangnam, FPT, CMC, Thành Công Building, Indochina Plaza</h3>
                            <h3>Thuận tiện các khu công nghiệp, Đồng Văn I, Đồng Văn II, Đông Anh, Vĩnh Phúc, Bắc Ninh...thông qua tuyến đường vành đai 3.
                            <h1><span class="glyphicon glyphicon-star-empty" aria-hidden="true"></span> Nội thất:</h1>
                            <h3>Poonsa Hanoi Hotel có 48 phòng nghỉ cao cấp, tất cả các phòng đều có cửa sổ, được trang bị
                            bàn làm việc, minibar, bàn uống nước, trà, cà phê miễn phí, Internet tốc độ cao</h3>
                            <h1><span class="glyphicon glyphicon-star-empty" aria-hidden="true"></span> Các ưu đãi khi nghỉ tại Poonsa:</h1>
                            <h3><span class="glyphicon glyphicon-asterisk" aria-hidden="true"></span> Ăn sáng Buffe</h3>
                            <h3><span class="glyphicon glyphicon-asterisk" aria-hidden="true"></span> Nước uống chào mừng khi check in</h3>
                            <h3><span class="glyphicon glyphicon-asterisk" aria-hidden="true"></span> Trà, cafe, 2 chai nước mỗi ngày</h3>
                            <h3><span class="glyphicon glyphicon-asterisk" aria-hidden="true"></span> Internet wifi</h3>
                            <h3><span class="glyphicon glyphicon-asterisk" aria-hidden="true"></span> An ninh 24/7</h3>
                            <h3><span class="glyphicon glyphicon-asterisk" aria-hidden="true"></span> Có nhân viên lẽ tân nói tiếng Anh, Nhật</h3>
                            <h1><span class="glyphicon glyphicon-star-empty" aria-hidden="true"></span> Hỗ trợ:</h1>
                            <h3>Mọi chi tiết liên hệ:</h3>
                            <h3>Mr. Thanh 0985587882</h3>
                            <h3>Email: dosm@poonsa.com</h3>
                            <h3>Rất vui được hợp tác cùng Anh/Chị</h3>
                        </div>
                    </div>
                    <div class="col-xs-12 col-md-4">
                        <div class="right_introduce">
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
                             <p>Mrs.Thanh</p>
                             <p><span class="glyphicon glyphicon-phone-alt" aria-hidden="true"></span>(84)985587882</p>
                        </div>
                        <div class="left_introduce1">
                            <a href="index.html">
                                <img src="{{asset('Frontend/images/logo.png')}}">
                            </a> 
                            <h1>Poonsa hanoi hotel</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@stop