@extends('master')
@section('content')
<div class="inner-header">
    <div class="container">
        <div class="pull-left">
            <h6 class="inner-title">Sản phẩm / {{$sanpham->name}}</h6>
        </div>
        <div class="pull-right">
            <div class="beta-breadcrumb font-large">
                <a href="{{route('trang-chu')}}">Trang chủ</a> / <span>Thông tin chi tiết sản phẩm </span>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>

<div class="container">
    <div id="content">
        <div class="row">
            <div class="col-sm-9">

                <div class="row">
                    <div class="col-sm-4">
                        <img src="upload/product_image/{{$sanpham->image}}" alt="">
                    </div>
                    <div class="col-sm-8">
                        <div class="single-item-body">
                            @if($sanpham->price_sale!=0)
                            <div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>
                            @endif
                            <p class="single-item-title" style="font-size:24px; text-align:left;"><h2>{!!$sanpham->name!!}</h2></p>
                            <div class="space20">&nbsp;</div>
                            <p class="single-item-price" style="font-size:16px; text-align:left;">
                                @if($sanpham->price_sale==0)
                                <span class="flash-sale">{{number_format($sanpham->price)}} đ</span>
                            @else
                                <span class="flash-del">{{number_format($sanpham->price)}} đ</span>
                                <span class="flash-sale">{{number_format($sanpham->price_sale)}} đ</span>
                            @endif
                            </p>
                        </div>

                        <div class="clearfix"></div>
                        <div class="space20">&nbsp;</div>

                        <div class="single-item-desc">
                            <p>{!!$sanpham->description!!}</p>
                        </div>
                        <div class="space20">&nbsp;</div>
                        <div>
                            <p>Kích thước: <span>{{$sanpham->size}}</span></p>
                        </div>
                        <div class="space5">&nbsp;</div>
                            <p>Màu sắc: <span>{{$sanpham->color}}</span></p>
                        <div class="space20">&nbsp;</div>

                        
                        <div class="single-item-options">
                                <p>Thêm giỏ hàng:</p>
                                <div class="space20">&nbsp;</div>
                            {{-- <select class="wc-select" name="size">
                                <option>Kích thước</option>
                                @foreach($chitiet_sp as $chitiet)
                                <option value="{{$chitiet->size}}">{{$chitiet->size}}</option>
                                @endforeach
                            </select>
                            <select class="wc-select" name="color">
                                <option>Màu sắc</option>
                                <option value="Red">Red</option>
                                <option value="Green">Green</option>
                                <option value="Yellow">Yellow</option>
                                <option value="Black">Black</option>
                                <option value="White">White</option>
                            </select> --}}
                            {{-- <select class="wc-select" name="color">
                                <option>Số lượng</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                            </select> --}}
                            <a class="add-to-cart" href="{{route('themgiohang',$sanpham->id)}}"><i class="fa fa-shopping-cart"></i></a>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>

                <div class="space40">&nbsp;</div>
                <div class="woocommerce-tabs">
                    <ul class="tabs">
                        <li><a href="#tab-description">Mô tả</a></li>
                    </ul>

                    <div class="panel" id="tab-description">
                        <p>{!!$sanpham->description!!}</p>
                    </div>
                </div>
                <div class="space50">&nbsp;</div>
                <hr>
                <div class="beta-products-list">
                    <h4>Sản phẩm tương tự</h4>
                    <div class="space20">&nbsp;</div>
                    <div class="row">
                    {{-- @if($sp_tuongtu->id_category != $sanpham->id) --}}
                    @foreach($sp_tuongtu as $sptt)
                        <div class="col-sm-4">
                            <div class="single-item">
                                <div class="single-item-header">
                                    @if($sptt->price_sale!=0)
                                    <div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>
                                    @endif
                                <a href="{{route('chitietsanpham',$sptt->id)}}"><img src="upload/product_image/{{$sptt->image}}" alt="" height="250px"></a>
                                </div>
                                <div class="single-item-body">
                                    <p class="single-item-title">{{$sptt->name}}</p>
                                    <p class="single-item-price">
                                    @if($sptt->price_sale==0)
                                        <span class="flash-sale">{{number_format($sptt->price)}} đ</span>
                                    @else
                                        <span class="flash-del">{{number_format($sptt->price)}} đ</span>
                                        <span class="flash-sale">{{number_format($sptt->price_sale)}} đ</span>
                                    @endif
                                    </p>
                                </div>
                                <div class="space20">&nbsp;</div>
                                <div class="single-item-caption">
                                    <a class="add-to-cart pull-left" href="{{route('themgiohang',$sptt->id)}}"><i class="fa fa-shopping-cart"></i></a>
                                    <a class="beta-btn primary" href="{{route('chitietsanpham',$sptt->id)}}">Chi tiết sản phẩm <i class="fa fa-chevron-right"></i></a>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    {{-- @endif --}}
                    </div>
                    <div class="row">{{$sp_tuongtu->links()}}</div>
                </div> <!-- .beta-products-list -->
            </div>
            <div class="col-sm-3 aside">
                <div class="widget">
                    <h3 class="widget-title">Sản phẩm mới</h3>
                    <div class="widget-body">
                        <div class="beta-sales beta-lists">
                            {{-- <div class="media beta-sales-item">
                                <a class="pull-left" href="product.html"><img src="assets/dest/images/products/sales/1.png" alt=""></a>
                            </div> --}}
                            @foreach($new_product as $new)
                            <div class="media beta-sales-item">
                                <a class="pull-left" href="{{route('chitietsanpham',$new->id)}}"><img src="upload/product_image/{{$new->image}}" alt=""></a>
                                <div class="media-body">
                                    {{$new->name}}
                                    <span class="beta-sales-price"><p>{{number_format($new->price)}} đồng</p></span>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div> <!-- best sellers widget -->
                <div class="widget">
                    <h3 class="widget-title">Sản phẩm khuyến mãi</h3>
                    <div class="widget-body">
                        <div class="beta-sales beta-lists">
                            {{-- <div class="media beta-sales-item">
                                <a class="pull-left" href="product.html"><img src="assets/dest/images/products/sales/1.png" alt=""></a>
                                <div class="media-body">
                                    Sample Woman Top
                                    <span class="beta-sales-price">$34.55</span>
                                </div>
                            </div> --}}
                            @foreach($sale_product as $sale)
                            <div class="media beta-sales-item">
                                <a class="pull-left" href="{{route('chitietsanpham',$sale->id)}}"><img src="upload/product_image/{{$sale->image}}" alt=""></a>
                                <div class="media-body">
                                    {{$sale->name}}
                                    <span class="beta-sales-price"><p>{{number_format($sale->price)}} đồng</p></span>
                                </div>
                            </div>
                           @endforeach
                        </div>
                    </div>
                </div> <!-- best sellers widget -->
            </div>
        </div>
    </div> <!-- #content -->
</div> <!-- .container -->
@endsection