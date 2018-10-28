<div id="header">
    <div class="header-top">
        <div class="container">
            <div class="pull-left auto-width-left">
                <ul class="top-menu menu-beta l-inline">
                    <li><a href="{{route('trang-chu')}}"><i class="fa fa-home"></i> Số 01, Đại Cồ Việt, Hai Bà Trưng, Hà Nội</a></li>
                    <li><a href="{{route('trang-chu')}}"><i class="fa fa-phone"></i> +84979318995</a></li>
                </ul>
            </div>
            <div class="pull-right auto-width-right">
                <ul class="top-details menu-beta l-inline">
                    @if(Auth::check())
                    <li><a href="{{route('trang-chu')}}"><i class="fa fa-user"></i>Chào bạn {{Auth::user()->name}}</a></li>
                    <li><a href="{{route('logout')}}"><i class="fa fa-sign-out"></i>Đăng xuất</a></li>
                    @else
                    <li><a href="{{route('signup')}}">Đăng kí</a></li>
                    <li><a href="{{route('login')}}">Đăng nhập</a></li>
                    @endif
                </ul>
            </div>
            <div class="clearfix"></div>
        </div> <!-- .container -->
    </div> <!-- .header-top -->
    <div class="header-body">
        <div class="container beta-relative">
            <div class="pull-left">
                <a href="{{route('trang-chu')}}" id="logo"><img src="front_asset/assets/dest/images/logo-BK.png" width="80px" alt=""></a>
            </div>
            <div class="pull-right beta-components space-left ov">
                <div class="space10">&nbsp;</div>
                <div class="beta-comp">
                    <form role="search" method="get" id="searchform" action="{{route('timkiem')}}">
                        <input type="text" value="" name="key" id="s" placeholder="Nhập từ khóa..." />
                        <button class="fa fa-search" type="submit" id="searchsubmit"></button>
                    </form>
                </div>
                <div class="beta-comp">
                
                    <div class="cart">
                        <div class="beta-select"><i class="fa fa-shopping-cart"></i> Giỏ hàng (<span id="tongsl">@if(Session::has('cart')){{Session('cart')->totalQty}}@else Trống @endif</span>) <i class="fa fa-chevron-down"></i></div>
                        <div class="beta-dropdown cart-body">
                        
                        @if(Session::has('cart'))
                        @foreach($product_cart as $product)
                            <div class="cart-item" id="cart-item{{$product['item']['id']}}">
                            <a  id="cart-item-delete" class="23 pull-right" value="{{$product['item']['id']}}" soluong="{{$product['qty']}}"><i class="fa fa-trash-o "></i></a>
                                <div class="media" >
                                    <a class="pull-left" href="#"><img src="upload/product_image/{{$product['item']['image']}}" alt=""></a>
                                    <div class="media-body">
                                        <span class="cart-item-title">{{$product['item']['name']}}</span>
                                        <span class="cart-item-amount">{{$product['qty']}}*<span id="dongia{{$product['item']['id']}}" value="@if($product['item']['price_sale']==0){{$product['item']['price']}} @else {{$product['item']['price_sale']}}@endif">@if($product['item']['price_sale']==0){{number_format($product['item']['price'])}} @else {{number_format($product['item']['price_sale'])}}@endif</span></span>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                            <div class="cart-caption">
                                <div class="cart-total text-right">Tổng tiền: <span class="cart-total-value" value="@if(Session::has('cart')){{Session('cart')->totalPrice}} @else 0 @endif">@if(Session::has('cart')){{number_format(Session('cart')->totalPrice)}} @else 0 @endif đồng</span></div>
                            <div class="clearfix"></div>

                                <div class="center">
                                    <div class="space10">&nbsp;</div>
                                    @if(Auth::check())
                                    <a href="{{route('dathang')}}" class="beta-btn primary text-center">Đặt hàng <i class="fa fa-credit-card pull-left"></i></a>
                                    @else
                                    <a href="{{route('login')}}" class="beta-btn primary text-center">Đăng nhập để đặt hàng</a>
                                    @endif
                                </div>
                            </div>

                        @endif
                        </div>
                    </div> <!-- .cart -->
                
                </div>
            </div>
            <div class="clearfix"></div>
        </div> <!-- .container -->
    </div> <!-- .header-body -->
    <div class="header-bottom" style="background: linear-gradient(to right,#ff3333, #fff999);">
        <div class="container">
            <a class="visible-xs beta-menu-toggle pull-right" href="#"><span class='beta-menu-toggle-text'>Menu</span> <i class="fa fa-bars"></i></a>
            <div class="visible-xs clearfix"></div>
            <nav class="main-menu">
                <ul class="l-inline ov">
                    <li><a href="{{route('trang-chu')}}">Trang chủ</a></li>
                    <li><a href="{{route('loaisanpham',1)}}">Danh mục sản phẩm</a>
                        <ul class="sub-menu">
                        @foreach($category as $cate)
                            <li><a href="{{route('loaisanpham',$cate->id)}}">{{$cate->name}}</a>
                            </li>
                        @endforeach
                        </ul>
                    </li>
                    <li><a href="{{route('gioithieu')}}">Giới thiệu</a></li>
                    <li><a href="{{route('lienhe')}}">Liên hệ</a></li>
                    @can('employee')
                    <li><a href="admin/category/danhsach">Trang quản trị</a></li>
                    @endcan
                </ul>
                <div class="clearfix"></div>
            </nav>
        </div> <!-- .container -->
    </div> <!-- .header-bottom -->
</div> <!-- #header -->
<script src="front_asset/assets/dest/js/jquery.js"></script>
<script>
    $(document).ready(function($){
        $('.23').click(function(){
            var id = $(this).attr('value');
            var route = "{{route('xoagiohang',':id_sp')}}";
            route = route.replace(':id_sp',id);

            var soluong = $(this).attr('soluong');
            var dongia = $('#dongia'+id).attr('value');
            var tongdongia = $('.cart-total-value').attr('value');
            $.ajax({
                url: route,
                type: 'get',
                data: {id:id},
                success:function(){
                    // console.log('da xoa')
                    var tongsl = $('#tongsl').html();
                    $('#tongsl').html(parseInt(tongsl)-parseInt(soluong));
                    $('.cart-total-value').html(parseInt(tongdongia)-(parseInt(soluong)*parseInt(dongia))+' đồng');
                    $('.cart-total-value').attr('value',parseInt(tongdongia)-(parseInt(soluong)*parseInt(dongia)));
                    $('#cart-item'+id).hide();
                },
                error:function(data){
                    $(this).hide(data);
                }
            })
        })
    })
</script>