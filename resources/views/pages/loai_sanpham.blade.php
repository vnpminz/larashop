@extends('master')
@section('content')
<div class="inner-header">
    <div class="container">
        <div class="pull-left">
            <h6 class="inner-title">Danh sách sản phẩm</h6>
        </div>
        <div class="pull-right">
            <div class="beta-breadcrumb font-large">
                <a href="{{route('trang-chu')}}">Trang chủ</a> / <span>Danh sách sản phẩm</span>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>
<div class="container">
    <div id="content" class="space-top-none">
        <div class="main-content">
            <div class="space60">&nbsp;</div>
            <div class="row">
                <div class="col-sm-3">
                    <ul class="aside-menu">
                    @foreach($theloai as $tl)
                        <li><a href="{{route('loaisanpham',$tl->id)}}">{{$tl->name}}</a></li>
                    @endforeach
                    </ul>
                    {{-- <ul class="list-group" id="menu">
                        @foreach($theloai as $tl)
                            @if(count($tl->brand) > 0)
                            <li class="list-group-item menu1 cate-list" style="color:black;">
                                {{ $tl->name }}
                            </li>
                            <ul>
                                @foreach($tl->brand as $brand)
                                    <li class="list-group-item " style="text-align:center;">
                                        <a href="#">{{ $brand->name }}</a>
                                    </li>
                                @endforeach
                            </ul>
                            @endif
                        @endforeach
                    </ul> --}}
                </div>
                <div class="col-sm-9">
                    <hr>
                    <div class="beta-products-list">
                        <h4 style="text-align: center; text-shadow: 2px 2px 5px red;">Sản phẩm </h4>
                    <hr>
                        <div class="beta-products-details">
                            <p class="pull-left">Tìm thấy {{count($product)}} sản phẩm</p>
                            <div class="clearfix"></div>
                        </div>

                        <div class="row">
                        @foreach($product as $br)
                            <div class="col-sm-4">
                                <div class="single-item">
                                    @if($br->price_sale!=0)
                                        <div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>
                                    @endif
                                    <div class="single-item-header">
                                    <a href="{{route('chitietsanpham',$br->id)}}"><img src="upload/product_image/{{$br->image}}" height="250px" alt=""></a>
                                    </div>
                                    <div class="single-item-body">
                                        <p class="single-item-title" style="font-size:24px; text-align:center;">{{$br->name}}</p>
                                        <p class="single-item-price"style="font-size:16px; text-align:center;">
                                        @if($br->price_sale!=0)
                                            <span class="flash-del">{{number_format($br->price)}}</span>
                                            <span class="flash-sale">{{number_format($br->price_sale)}}</span>
                                        @else
                                            <span>{{number_format($br->price)}}</span>
                                        @endif
                                        </p>
                                    </div>
                                    <div class="space15">&nbsp;</div>
                                    <div class="single-item-caption">
                                        <a class="add-to-cart pull-left" href="{{route('themgiohang',$br->id)}}"><i class="fa fa-shopping-cart"></i></a>
                                        <a class="beta-btn primary" href="{{route('chitietsanpham',$br->id)}}">Chi tiết sản phẩm <i class="fa fa-plus"></i></a>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        </div>
                    </div> <!-- .beta-products-list -->

                    <div class="space50">&nbsp;</div>
<hr>
                    <div class="beta-products-list">
                        <h4 style="text-align: center; text-shadow: 2px 2px 5px red;">Sản phẩm khác</h4>
<hr>
                        <div class="beta-products-details">
                            <p class="pull-left">Tìm thấy {{count($sp_khac)}} sản phẩm</p>
                            <div class="clearfix"></div>
                        </div>
                        <div class="row">
                        @foreach($sp_khac as $sp_k)
                            <div class="col-sm-4">
                                <div class="single-item">
                                    @if($sp_k->price_sale!=0)
                                    <div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>
                                    @endif
                                    <div class="single-item-header">
									<a href="{{route('chitietsanpham',$sp_k->id)}}"><img src="upload/product_image/{{$sp_k->image}}" height="250px" alt=""></a>
                                    </div>
                                    <div class="single-item-body">
                                        <p class="single-item-title" style="font-size:24px; text-align:center;">{{$sp_k->name}}</p>
                                        <p class="single-item-price"style="font-size:16px; text-align:center;">
                                        @if($sp_k->price_sale!=0)
                                            <span class="flash-del">{{number_format($sp_k->price)}}</span>
                                            <span class="flash-sale">{{number_format($sp_k->price_sale)}}</span>
                                        @else
                                            <span>{{number_format($sp_k->price)}}</span>
                                        @endif
                                        </p>
                                    </div>
                                    <div class="space15">&nbsp;</div>
                                    <div class="single-item-caption">
                                        <a class="add-to-cart pull-left" href="{{route('themgiohang',$sp_k->id)}}"><i class="fa fa-shopping-cart"></i></a>
                                        <a class="beta-btn primary" href="{{route('chitietsanpham',$sp_k->id)}}">Chi tiết sản phẩm <i class="fa fa-plus"></i></a>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        </div>
                        <div class="space40">&nbsp;</div>
                        
                    </div> <!-- .beta-products-list -->
                </div>
            </div> <!-- end section with sidebar and main content -->


        </div> <!-- .main-content -->
    </div> <!-- #content -->
</div> <!-- .container -->
@endsection