@extends('Frontend.master')

@section('datdichvu')
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
        <div class="content_booking">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-md-8">
                         <h1>I Khách hàng đặt dịch vụ</h1>
                         <div class="row">
                         	@foreach($dichvu as $value)
                            <div class="col-xs-12 col-md-6">             
                                <div class="form_service">
                                  <form action="{{url('postdatdichvu')}}" method="post">
                                  <input type="hidden" name="_token" value="{{csrf_token()}}"> 
                                  <input type="hidden" name="FK_IDKhachhang" value="{{$khachhang[0]->id}}">
                                  <input type="hidden" name="sDinhdanh" value="{{$khachhang[0]->sDinhdanh}}">
                                      <div class="row">
                                          <div class="col-xs-12 col-md-6">
                                            <img src="{{asset('upload/images/').'/'.$value->sHinhanh}}" alt="Ăn tối" class="img-thumbnail" width="100%">
                                          </div>
                                          <div class="col-xs-12 col-md-6">
                                              <input type="hidden" name="FK_IDDichvu" 
                                              value="{{$value->id}}">
                                              <h2>{{$value-> sTenDV}}</h2>
                                              <p class="price-service">Giá:
                                                <label><?php
                                                      $gia="{$value->iDongia}";
                                                      $float=(int)$gia;
                                                      echo number_format("$float");
                                                      ?>
                                                      VNĐ
                                            </label></p>
                                              <p><label>Số lượng:</label><p>
                                              <select class="form-control" name="iSoluong">
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
                                              </select>
                                              <button type="submit" class="btn btn-info" onclick="return confirm('Bạn có muốn đặt địch vụ không?')">Đặt</button>
                                          </div>
                                      </div>
                                   </form>
                                  </div>    
                             </div>
                             @endforeach
                         </div><!--row-->
                         <div class="row">
                           <div class="thongtindadat">
                                <h1><span class="glyphicon glyphicon-star-empty" aria-hidden="true"></span>Dịch vụ đã đặt</h1>
                                <table border="2" width="90%">  
                                  <tr>
                                     <th>STT</th>
                                     <th>Tên Dịch vụ</th>
                                     <th>Số lượng</th>
                                     <th>Đơn giá</th>
                                  </th> 
                                  @if(empty($datdichvu[0]->id))
                                     <tr>
                                         <td colspan="4">Chưa có dịch vụ được đặt</td>
                                      <tr>
                                  @else
                                       <?php $i=0; ?>
                                        @foreach($datdichvu as $value)
                                        @if($value->iTrangthaidat==1)
                                        <tr>
                                          <td><?php echo $i ?></td>
                                          <td>{{$value->dichvu->sTenDV}}</td>
                                          <td>{{$value->iSoluong}}</td>
                                          <td>
                                               <?php
                                                  $gia="{$value->dichvu->iDongia}";
                                                  $float=(int)$gia;
                                                  echo number_format("$float");
                                               ?>
                                               VNĐ
                                          </td>
                                        </tr>
                                        @endif
                                        <?php $i++; ?>
                                        @endforeach
                                  @endif
                                </table>
                           </div>
                         </div>
                    </div>
                    <div class="col-xs-12 col-md-4">
                        <div class="left_datdichvu">             
                            <h1>Dịch vụ</h1>
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

                            <p style="color:#f00; font-family: sans-serif;font-weight: bold; font-size: 25px;padding-bottom: 10px;">Hóa đơn khách hàng đã đặt</p>
                            <form action="{{url('getkhachhangdadat')}}" method="post">
                                <input type="hidden" name="_token" value="{{csrf_token()}}">
                                <input type="hidden" name="sDinhdanh" value="{{$khachhang[0]->sDinhdanh}}">
                                <p class="btndatdv">
                                    <button type="submit" class="btn btn-info btn-lg" width="100%">
                                    <span class="glyphicon glyphicon-save-file" aria-hidden="true"></span>
                                    Khách hàng đã đặt</button>
                                </p>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div><!--content_booking-->
@stop