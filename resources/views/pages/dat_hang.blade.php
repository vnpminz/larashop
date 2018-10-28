@extends('master')
@section('content')
<div class="inner-header">
    <div class="container">
        <div class="pull-left">
            <h6 class="inner-title">Đặt hàng</h6>
        </div>
        <div class="pull-right">
            <div class="beta-breadcrumb">
                <a href="{{route('trang-chu')}}">Trang chủ</a> / <span>Đặt hàng</span>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>

<div class="container">
    <div id="content">
    @if(Session::has('thongbao'))
        <div class="alert alert-success">{{Session::get('thongbao')}}</div>
    @endif
        <form action="{{route('dathang')}}" method="post" class="beta-form-checkout">
            @csrf
            <div class="row">
                <div class="col-sm-6">
                    <h4>Đặt hàng</h4>
                    <div class="space20">&nbsp;</div>

                    <div class="form-block">
                        <label for="name">Họ tên*</label>
                        <input type="text" id="name" placeholder="Họ tên" name="name" required>
                    </div>
                    <div class="form-block">
                        <label>Giới tính </label>
                        <input id="gender" type="radio" class="input-radio" name="gender" value="Nam" checked="checked" style="width: 10%"><span style="margin-right: 10%">Nam</span>
                        <input id="gender" type="radio" class="input-radio" name="gender" value="Nữ" style="width: 10%"><span>Nữ</span>
                                    
                    </div>

                    <div class="form-block">
                        <label for="email">Email*</label>
                        <input type="email" id="email" name="email" required placeholder="abcd8@gmail.com">
                    </div>

                    <div class="form-block">
                        <label for="adress">Địa chỉ*</label>
                        <input type="text" id="adress" name="address" placeholder="Nhập địa chỉ của bạn" required>
                    </div>
                    

                    <div class="form-block">
                        <label for="phone">Điện thoại*</label>
                        <input type="text" id="phone" name="phone_number" required>
                    </div>
                    
                    <div class="form-block">
                        <label for="notes">Ghi chú</label>
                        <textarea id="notes" name="notes"></textarea>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="your-order">
                        <div class="your-order-head"><h5>Đơn hàng của bạn</h5></div>
                        <div class="your-order-body" style="padding: 0px 10px">
                            <div class="your-order-item">
                            @if(Session::has('cart'))
                            @foreach($product_cart as $cart)
                                <div>
                                <!--  one item	 -->
                                    <div class="media">
                                        <img width="25%" src="upload/product_image/{{$cart['item']['image']}}" alt="" class="pull-left">
                                        <div class="media-body">
                                            <p class="font-large" style="color:black; font-size:20px; font-weight: bold;">{{$cart['item']['name']}}</p>
                                            <div class="space10">&nbsp;</div>
                                            <span class="color-gray your-order-info">Màu sắc: {{$cart['item']['color']}}</span>
                                            <div class="space10">&nbsp;</div>
                                            <span class="color-gray your-order-info">Kích thước: {{$cart['item']['size']}}</span>
                                            <div class="space10">&nbsp;</div>
                                            <span class="color-gray your-order-info">Số lượng: {{$cart['qty']}}</span>
                                            <div class="space10">&nbsp;</div>
                                            <span class="color-gray your-order-info">Đơn giá: {{number_format($cart['price']/$cart['qty'])}} đồng</span>
                                            <div class="space10">&nbsp;</div>
                                        </div>
                                    </div>
                                <!-- end one item -->
                                </div>
                            @endforeach
                            @endif
                                <div class="clearfix"></div>
                            </div>
                            <div class="your-order-item">
                                <div class="pull-left"><p class="your-order-f18">Tổng tiền:</p></div>
                                <div class="pull-right"><h5 class="color-black">@if(Session::has('cart')){{number_format($totalPrice)}} @else 0 @endif VNĐ</h5></div>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                        <div class="your-order-head"><h5>Hình thức thanh toán</h5></div>
                        
                        <div class="your-order-body">
                            <ul class="payment_methods methods">
                                <li class="payment_method_bacs">
                                    <input id="payment_method_bacs" type="radio" class="input-radio" name="payment_method" value="COD" checked="checked" data-order_button_text="">
                                    <label for="payment_method_bacs">Thanh toán khi nhận hàng </label>
                                    <div class="payment_box payment_method_bacs" style="display: block;">
                                        Cửa hàng sẽ gửi hàng đến địa chỉ của bạn, bạn xem hàng rồi thanh toán tiền cho nhân viên giao hàng
                                    </div>						
                                </li>

                                <li class="payment_method_cheque">
                                    <input id="payment_method_cheque" type="radio" class="input-radio" name="payment_method" value="ATM" data-order_button_text="">
                                    <label for="payment_method_cheque">Chuyển khoản </label>
                                    <div class="payment_box payment_method_cheque" style="display: none;">
                                        Chuyển tiền đến tài khoản sau:
                                        <br>- Số tài khoản: 123 456 789
                                        <br>- Chủ TK: Bùi Văn Tuấn.
                                        <br>- Ngân hàng Viettinbank, Chi nhánh Trần Khát Chân, Hai Bà Trưng, Hà Nội.
                                    </div>						
                                </li>
                                
                            </ul>
                        </div>

                        <div class="text-center"><button type="submit" class="beta-btn primary" >Đặt hàng <i class="fa fa-chevron-right"></i></button></div>
                    </div> <!-- .your-order -->
                </div>
            </div>
        </form>
    </div> <!-- #content -->
</div> <!-- .container -->
@endsection