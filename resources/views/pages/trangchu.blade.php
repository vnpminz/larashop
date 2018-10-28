@extends('master')
@section('content')
<div class="fullwidthbanner-container">
    <div class="fullwidthbanner">
        <div class="bannercontainer" >
        <div class="row carousel-holder">
            <div class="col-md-12">
                <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                    <?php 
                        $i =0;
                        $slide = DB::table('slides')
                            ->where('publication_status',1)
                            ->get();
                            foreach($slide as $sl){?>	
                        <li data-target="#carousel-example-generic" data-slide-to="0" class="{{$i}}"
                        @if($i == 0)
                                class = 'active'
                        @endif
                        ></li>
                    <?php $i++; } ?>
                    </ol>
                    <div class="carousel-inner">
                    <?php 
                        $i = 0;
                        $slide = DB::table('slides')
                            ->where('publication_status',1)
                            ->get();
                            foreach($slide as $sl){?>
                        <div 
                        @if($i == 0)
                            class="item active"
                        @else
                            class="item"
                        @endif>
                            <img src="upload/slide_image/{{$sl->image}}" style="width:100%; height:500px" />
                        
                        </div>
                        <?php $i++;} ?>
                    </div>
                    <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                        <span class="glyphicon glyphicon-chevron-left"></span>
                    </a>
                    <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                        <span class="glyphicon glyphicon-chevron-right"></span>
                    </a>
                </div>
            </div>
        </div>

        <div class="tp-bannertimer"></div>
    </div>
</div>
<!--slider-->
</div>
<div class="container">
<div id="content" class="space-top-none">
<div class="main-content">
<div class="space60">&nbsp;</div>
<hr>
<div class="row">
    <div class="col-sm-12">
        <div class="beta-products-list">
            <h3 style="text-align: center; text-shadow: 2px 2px 5px red;">Sản phẩm mới</h3>
<hr>
            <div class="beta-products-details">
                <p class="pull-left">Tìm thấy {{count($new_product)}} sản phẩm</p>
                <div class="clearfix"></div>
            </div>

            <div class="row">
            @foreach($new_product as $new)
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
            <div class="row">{{$new_product->links()}}</div>
        </div> <!-- .beta-products-list -->

<div class="top-brands">
        <div class="container">
            <h3>Danh mục sản phẩm</h3>
            <div class="sliderfig">
                <ul id="flexiselDemo1">			
                    <li>
                        <img src="{{url('pages/images/tb1.jpg')}}" alt=" " class="img-responsive" />
                    </li>
                    <li>
                        <img src="{{url('pages/images/tb2.jpg')}}" alt=" " class="img-responsive" />
                    </li>
                    <li>
                        <img src="{{url('pages/images/tb3.jpg')}}" alt=" " class="img-responsive" />
                    </li>
                    <li>
                        <img src="{{url('pages/images/tb4.jpg')}}" alt=" " class="img-responsive" />
                    </li>
                    <li>
                        <img src="{{url('pages/images/tb5.jpg')}}" alt=" " class="img-responsive" />
                    </li>
                    <li>
                        <img height="200px" width="100px" src="{{url('pages/images/tb6.png')}}" alt=" " class="img-responsive" />
                    </li>
                    <li>
                        <img height="150px" src="{{url('pages/images/tb7.png')}}" alt=" " class="img-responsive" />
                    </li>
                    <li>
                        <img height="200px"  src="{{url('pages/images/tb8.png')}}" alt=" " class="img-responsive" />
                    </li>
                </ul>
            </div>
        </div>
    </div>

        <div class="space50">&nbsp;</div>
<hr>
        <div class="beta-products-list">
                <h4 style="text-align: center; text-shadow: 2px 2px 5px red;">Sản phẩm khuyến mãi</h4>
<hr>
            <div class="beta-products-details">
                <p class="pull-left">Tìm thấy {{count($sale_product)}} sản phẩm</p>
                <div class="clearfix"></div>
            </div>
            <div class="row">
                @foreach($sale_product as $sl)
                <div class="col-sm-3">
                    <div class="single-item">
                        @if($sl->price_sale!=0)
                        <div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>
                    @endif
                        <div class="single-item-header">
                            <a href="{{route('chitietsanpham',$sl->id)}}"><img src="upload/product_image/{{$sl->image}}" alt="" height="250px"></a>
                        </div>
                        <div class="single-item-body">
                            <p class="single-item-title" style="font-size:24px; text-align:center;">{{$sl->name}}</p>
                            <p class="single-item-price" style="font-size:16px; text-align:center;">
                            @if($sl->price_sale==0)
                                <span class="flash-sale">{{number_format($sl->price)}} đ</span>
                            @else
                                <span class="flash-del">{{number_format($sl->price)}} đ</span>
                                <span class="flash-sale">{{number_format($sl->price_sale)}} đ</span>
                            @endif
                            </p>
                        </div>
                        <div class="space15">&nbsp;</div>
                        <div class="single-item-caption">
                            <a class="add-to-cart pull-left" href="{{route('themgiohang',$sl->id)}}"><i class="fa fa-shopping-cart"></i></a>
                            <a class="beta-btn primary" href="{{route('chitietsanpham',$sl->id)}}">Chi tiết sản phẩm  <i class="fa fa-plus"></i></a>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="row">{{$sale_product->links()}}</div>
        </div> <!-- .beta-products-list -->
    </div>
</div> <!-- end section with sidebar and main content -->


</div> <!-- .main-content -->
</div> <!-- #content -->

<script type="text/javascript">
    $(window).load(function() {
        $("#flexiselDemo1").flexisel({
            visibleItems: 4,
            animationSpeed: 1000,
            autoPlay: true,
            autoPlaySpeed: 3000,    		
            pauseOnHover: true,
            enableResponsiveBreakpoints: true,
            responsiveBreakpoints: { 
                portrait: { 
                    changePoint:480,
                    visibleItems: 1
                }, 
                landscape: { 
                    changePoint:640,
                    visibleItems:2
                },
                tablet: { 
                    changePoint:768,
                    visibleItems: 3
                }
            }
        });
        
    });
</script>
<script type="text/javascript" src="{{url('pages/js/jquery.flexisel.js')}}"></script>

@endsection