@extends('master')
@section('content')
<div class="container">
<div id="content" class="space-top-none">
<div class="main-content">
<div class="space60">&nbsp;</div>
<hr>
<div class="row">
    <div class="col-sm-12">
        <div class="beta-products-list">
            <h3 style="text-align: center; text-shadow: 2px 2px 5px red;">Tìm kiếm</h3>
<hr>
            <div class="beta-products-details">
                <p class="pull-left">Tìm thấy {{count($product)}} sản phẩm</p>
                <div class="clearfix"></div>
            </div>

            <div class="row">
            @foreach($product as $new)
                <div class="col-sm-3">
                    <div class="single-item">
                    @if($new->price_sale!=0)
                        <div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>
                    @endif
                        <div class="single-item-header">
                        <a href="{{route('chitietsanpham',$new->id)}}"><img src="upload/product_image/{{$new->image}}" alt="" height="250px"></a>
                        </div>
                        <div class="single-item-body">
                            <p class="single-item-title" style="font-size:24px; text-align:center;">{{$new->name}}</p>
                            <p class="single-item-price" style="font-size:16px; text-align:center;">
                            @if($new->price_sale==0)
                                <span class="flash-sale">{{number_format($new->price)}} đ</span>
                            @else
                                <span class="flash-del">{{number_format($new->price)}} đ</span>
                                <span class="flash-sale">{{number_format($new->price_sale)}} đ</span>
                            @endif
                            </p>
                        </div>
                        <div class="space15">&nbsp;</div>
                        <div class="single-item-caption">
                            <a class="add-to-cart pull-left" href="{{route('themgiohang',$new->id)}}"><i class="fa fa-shopping-cart"></i></a>
                            <a class="beta-btn primary" href="{{route('chitietsanpham',$new->id)}}">Chi tiết sản phẩm  <i class="fa fa-plus"></i></a>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
            @endforeach
            </div>
        </div> <!-- .beta-products-list -->
    </div>
</div>

</div> <!-- .main-content -->
</div> <!-- #content -->
@endsection