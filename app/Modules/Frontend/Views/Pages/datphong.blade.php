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
        <div class="slide_datphong">
            <!--background-->
        </div>
        @if(session('thongbao'))
                    <script type="text/javascript">
                      alert("{{session('thongbao')}}");
                    </script>
        @endif   
        <div class="booking_datphong">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-md-8">
                        <div class="left-booking">
                            <form action="{{'datphongtructuyen'}}" method="post">
                                <input type="hidden" name="_token" value="{{csrf_token()}}">
                                <h1>I thông tin đặt phòng</h1>
                                <div class="row">
                                    <div class="col-xs-12 col-md-4">
                                        <div class="form-group">
                                            <label>Loại phòng:</label>
                                             <select id="loaiphong" name="FK_IDLoaiphong">
                                                <option value="{{Session::get('loaiphong')->id}}">{{Session::get('loaiphong')->sTenLP}}</option>
                                                    @foreach($tenloaiphong as $value)
                                                      <option value="{{$value->id}}">{{$value->sTenLP}}</option>
                                                    @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    
                                    <div class="col-xs-12 col-md-4">
                                        <div class="form-group">
                                            <label>Ngày đến:</label>
                                            <p><input id="startDate" type="date" value="{{Session::get('ngayden')}}" name="dNgayden"></p>
                                        </div>
                                    </div>
                                    
                                    <div class="col-xs-12 col-md-4">
                                        <div class="form-group">
                                            <label>Ngày đi:</label>
                                            <p><input id="endDate" type="date" value="{{Session::get('ngaydi')}}" name="dNgaydi"></p>
                                        </div>
                                    </div>
                                </div>  
                                <hr>
                                <div class="row">
                                     <div class="col-xs-12 col-md-4">
                                          <div class="form-group">
                                            <label>Số lượng phòng:</label>
                                            <select name="isoluongphong" id="iSoluongphong" required>
                                                <option value="">--Chưa chọn--</option>
                                            @if(isset($sophongconlai))
                                                @for($i=1;$i<=$sophongconlai;$i++)
                                                    <option value="<?php echo $i ?>"><?php echo $i ?></option>
                                                @endfor  
                                            @endif      
                                              </select>
                                        </div>
                                     </div>
                                    
                                     <div class="col-xs-12 col-md-4">           
                                        <div class="form-group">
                                            <label>Số người:</label>
                                            <select name="iSoluongnguoi">
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
                                    
                                     <div class="col-xs-12 col-md-4">
                                             <div class="form-group">                       
                                                    <label>Kiểu phòng: </label>
                                                    <p>
                                                        <label class="radio-inline">
                                                            <input type="radio" name="iKieuphong" value="1">Giường đơn
                                                        </label>
                                                        <label class="radio-inline">
                                                            <input type="radio" name="iKieuphong" value="0">Giường đôi
                                                        </label>   
                                                    </p>
                                            </div>
                                        </div>
                                </div>
                                <!--thông tin giá phòng--> 
                                <div class="row">
                                    <div class="col-xs-12 col-md-12">
                                        <p class="price-room">Giá phòng:<lable id="gia"></lable>  VND</p>
                                    </div>
                                </div>
                                <!--thông tin tổng tiền-->
                                <div class="row">
                                    <div class="col-xs-12 col-md-12">
                                        <p class="total">Tổng tiền: <lable id="tongtien"></lable>  VND</p>
                                    </div>
                                </div>
                                
                                <h1>II Thông tin khách hàng</h1>
                                @if(count($errors)>0)
                                       <div class="alert alert-danger">
                                           @foreach($errors->all() as $er)
                                                <p style="font-family: sans-serif;"><span class="glyphicon glyphicon-remove-sign" aria-hidden="true"></span>{{$er}}</p>
                                           @endforeach
                                       </div>
                                @endif
                                <div class="customer">
                                    <div class="row">                             
                                    <div class="col-xs-12 col-md-6">
                                            <div class="form-group">
                                                <label>Định danh(CMTND):</label>
                                                <p><input type="text" id="sDinhdanh" name="sDinhdanh" placeholder="" required></p>
                                            </div>      
                                        </div>
                                         <div class="col-xs-12 col-md-6">
                                            <div class="form-group">
                                                <label>Tên khách hàng:</label>
                                                <p><input type="text" id="sTenKH" name="sTenKH" placeholder="" required></p>
                                            </div>      
                                        </div>
                                    </div>
                                    <hr>
                                     <div class="row">      
                                        <div class="col-xs-12 col-md-6">
                                            <div class="form-group">
                                                <label>Ngày sinh:</label>
                                                <p><input type="date" id="dNgaysinh" name="dNgaysinh" required></p>
                                            </div>      
                                        </div>
                                        <div class="col-xs-12 col-md-6">
                                            <div class="form-group">                       
                                                    <label>Giới tính: </label>
                                                    <p>
                                                        <label class="radio-inline">
                                                            <input type="radio" id="iGioitinhnam" name="iGioitinh" value="1">Nam
                                                        </label>
                                                        <label class="radio-inline">
                                                            <input type="radio" id="iGioitinhnu" name="iGioitinh" value="0">Nữ
                                                        </label>   
                                                    </p>
                                            </div>     
                                        </div>
                                    </div>
                                    <hr>
                                     <div class="row">
                                   
                                         <div class="col-xs-12 col-md-6">
                                            <div class="form-group">
                                                <label>Quốc tịch:</label>
                                                <p><input type="text" id="sQuoctich" name="sQuoctich" required></p>
                                            </div>      
                                        </div>
                                        
                                        <div class="col-xs-12 col-md-6">
                                            <div class="form-group">
                                                <label>SĐT:</label>
                                                <p><input type="text" id="sSDT" name="sSDT" placeholder="" required></p>
                                            </div>      
                                        </div>
                                    </div>
                                    <hr>
                                     <div class="row">
                                        <div class="col-xs-12 col-md-6">
                                            <div class="form-group">
                                                <label>Địa chỉ:</label>
                                                <p><input type="text" id="sDiachi" name="sDiachi" required></p>
                                            </div>      
                                        </div>
                                        <div class="col-xs-12 col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Email:</label>
                                                <input type="email" name="email" class="form-control" id="Email" required>
                                              </div>
                                        </div>
                                    </div>
                                    <hr>
                                     <div class="row">
                                        <div class="col-xs-12 col-md-6">
                                            <div class="form-group">
                                                <p><input type="checkbox" required>Xác nhận thông tin trên</p>
                                            </div>      
                                        </div>
                                    </div>
                                </div>
                                <div class="button_book">
                                    <button type="submit" class="btn btn-success">Đặt phòng
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-xs-12 col-md-4">
                        <div class="right-booking">
                            <h1>Loại phòng</h1>
                            @foreach($tenloaiphong as $value)
                            <div class="styleroom">
                                <div class="row">
                                    <a href="#">
                                    <div class="col-xs-6 col-md-6">
                                        <img src="{{asset('upload/images/').'/'.$value->sHinhanh}}" width="100%">
                                    </div>
                                    <div class="col-xs-6 col-md-6">
                                        <p class="tit_room">{{$value->sTenLP}}</p>
                                        <p class="price">
                                            <?php
                                                  $gia="{$value->iGiaphong}";
                                                  $float=(int)$gia;
                                                  echo number_format("$float");
                                            ?>  
                                        VNĐ/ĐÊM</p>
                                    </div>
                                    </a>
                                </div>
                            </div>
                            @endforeach       
                        </div>
                    </div>
                </div>
            </div>
        </div><!--booking_datphong-->

        <!-- script dat phong -->
    <script type="text/javascript">
      $(document).ready(function(){

        
            var sl=<?php echo count($tenloaiphong) ?>;
            // var sp=<?php if(isset($sophongconlai)) echo $sophongconlai ?>;
            var Comments = [];
            for(var i=0;i<sl;i++)
            {
                Comments=<?php echo $tenloaiphong ?>;
            }      

                $("#endDate").change(function(){
                var loaiphong=$('#loaiphong').val();
                var date1 = new Date($("#startDate").val());
                var date2 = new Date($("#endDate").val());
                var timeDiff = Math.abs(date2.getTime() - date1.getTime());
                var diffDays = Math.ceil(timeDiff / (1000 * 3600 * 24));
                var soluongphong=$("#iSoluongphong").val();
                for(var i=0;i<sl;i++)
                    {
                        if(Comments[i].id==loaiphong)
                        { 
                            $('#gia').html(Comments[i].iGiaphong.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,"))
                            $('#tongtien').html((Comments[i].iGiaphong*diffDays*soluongphong).toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,"))
                        }
                        //alert(Comments[i].iGiaphong)
                    }
                    
                }); 

                $("#loaiphong").change(function(){
                var loaiphong=$(this).val();
                var date1 = new Date($("#startDate").val());
                var date2 = new Date($("#endDate").val());
                var timeDiff = Math.abs(date2.getTime() - date1.getTime());
                var diffDays = Math.ceil(timeDiff / (1000 * 3600 * 24));
                var soluongphong=$("#iSoluongphong").val();
                for(var i=0;i<sl;i++)
                    {
                        if(Comments[i].id==loaiphong)
                        { 
                            $('#gia').html(Comments[i].iGiaphong.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,"))
                            $('#tongtien').html((Comments[i].iGiaphong*diffDays*soluongphong).toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,"))
                        }
                    }

                    
                }); 
                 $("#iSoluongphong").change(function(){
                var loaiphong=$('#loaiphong').val();
                var date1 = new Date($("#startDate").val());
                var date2 = new Date($("#endDate").val());
                var timeDiff = Math.abs(date2.getTime() - date1.getTime());
                var diffDays = Math.ceil(timeDiff / (1000 * 3600 * 24));
                var soluongphong=$(this).val();
                for(var i=0;i<sl;i++)
                    {
                        if(Comments[i].id==loaiphong)
                        { 
                            $('#gia').html(Comments[i].iGiaphong.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,"))
                            $('#tongtien').html((Comments[i].iGiaphong*diffDays*soluongphong).toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,"))
                        }
                        //alert(Comments[i].iGiaphong)
                    }
                    
                });
                  //alert(diffDays)        
        });
        </script>
        


        <script type="text/javascript">
            $(document).ready(function(){
                $('#loaiphong').change(function(){
                var loaiphong=($("#loaiphong").val())
                $.ajax({
                    type:'get',
                    url:"Soluong/"+loaiphong,
                    success:function(data){
                       $("#iSoluongphong").empty();
                       for(var i=1;i<=data;i++){
                        $("#iSoluongphong").append("<option value='"+i+"'>"+i+"</option>")
                       }
                    }
                    })
                });
                // ajax ngaythang
                $('#loaiphong').change(function(){
                var loaiphong=($("#loaiphong").val())
                var ngayden=($("#startDate").val())
                var ngaydi=($("#endDate").val())
                $.ajax({
                    type:'get',
                    url:"Soluongloaiphong/"+loaiphong+"/"+ngayden+"/"+ngaydi,
                    success:function(data){
                       $("#iSoluongphong").empty();
                       for(var i=1;i<=data;i++){
                        $("#iSoluongphong").append("<option value='"+i+"'>"+i+"</option>")
                       }
                    }
                    })
                });
                $('#endDate').change(function(){
                var loaiphong=($("#loaiphong").val())
                var ngayden=($("#startDate").val())
                var ngaydi=($("#endDate").val())
                $.ajax({
                    type:'get',
                    url:"Soluongngayden/"+loaiphong+"/"+ngayden+"/"+ngaydi,
                    success:function(data){
                       $("#iSoluongphong").empty();
                       for(var i=1;i<=data;i++){
                        $("#iSoluongphong").append("<option value='"+i+"'>"+i+"</option>")
                       }
                    }
                    })
                });
                $("#sDinhdanh").change(function(){
                 var dinhdanh=$('#sDinhdanh').val();
                 console.log(dinhdanh);
                 $.ajax({
                   type:'get',
                   url:'/khachhangcudatphong/'+dinhdanh,
                   data:dinhdanh,
                   success:function(data){
                      $('#sTenKH').val(data[0].sTenKH)
                      $('#dNgaysinh').val(data[0].dNgaysinh)
                      if(data[0].iGioitinh==1)
                      {
                      $('#iGioitinhnam').prop('checked', true).val(data[0].iGioitinh)
                      } 
                      else
                      {
                      $('#iGioitinhnu').prop('checked', true).val(data[0].iGioitinh)
                      }
                      $('#sQuoctich').val(data[0].sQuoctich)
                      $('#sSDT').val(data[0].sSDT)
                      $('#sDiachi').val(data[0].sDiachi)
                      $('#Email').val(data[0].sEmail)
                      console.log(data);
                   },
                   headers:
                    {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                 }); 
                }); 
             }); 

        </script>
@stop