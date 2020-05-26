@extends('welcome')

@section('content')
<section id="slider"><!--slider-->
        <div class="container">
            <div class="row">
                <div class="col-sm-9">
                    <div id="slider-carousel" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">
                            @php
                              $i = 0;
                            @endphp
                            @foreach( $slides as $slide )
                                @php
                                  $i++;
                                @endphp
                                <div style="margin-top: 20px;padding-left: 0px" class="item {{ $i==1 ? 'active' : '' }}">
                                        <a href="{{ $slide->sd_link}}"><img style="width:100%;height: 400px;" src="{{ asset($slide->sd_image) }}" class="girl" alt="{{ $slide->sd_name }}" /></a>
                                </div>
                            @endforeach
                        </div>
                        
                        <a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
                            <i class="fa fa-angle-left"></i>
                        </a>
                        <a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
                            <i class="fa fa-angle-right"></i>
                        </a>
                    </div>
                </div>
                <div class="col-sm-3" style="margin-top: 20px">
                    <div class="blog-post-area">
                        <h2 class="title text-center">Tin về rượu</h2>
                        @foreach( $articles as $item )
                        <div class="single-blog-post">
                            <div class="row">
                                <div class="col-sm-4">
                                    <a href="{{ route('get.article.detail', $item->a_slug.'-'.$item->id)}}">
                                        <img style="height: 65px" src="{{ asset( $item->a_avatar)}}" alt="{{ $item->a_name}}">
                                    </a>
                                </div>
                                <div class="col-sm-8">
                                    <h3 style="font-size: 13px;margin-top: 0px"><a href="{{ route('get.article.detail', $item->a_slug.'-'.$item->id)}}">{{ $item->a_name}}</a></h3>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>  
            </div>
        </div>
    </section><!--/slider-->
<div class="features_items">
    <!--features_items-->
    <h2 class="title text-center" style="font-size: 20px">Sản phẩm mới nhất</h2>
    @foreach( $products as $item )
        @include('pages.include.product_item', ['item' => $item])
    @endforeach
</div>
<!--features_items-->
<div class="features_items">
    <!--features_items-->
    <h2 class="title text-center" style="font-size: 20px">Sản phẩm mua nhiều nhất</h2>
    @foreach( $productsPay as $item )
        @include('pages.include.product_item', ['item' => $item])
    @endforeach
</div>
<!--features_items-->

@foreach ($productsByCategory as $item)
<div class="features_items">
    <!--features_items-->
    <h2 class="title text-center" style="font-size: 20px">{{ $item['category']->c_name }}</h2>
    @foreach($item['products'] as $item)
        @include('pages.include.product_item', ['item' => $item])
    @endforeach
</div>
@endforeach

<div class="recommended_items">
    <!--recommended_items-->
    <h2 class="title text-center" style="font-size: 20px;">Khách hàng đánh giá về chúng tôi</h2>
                    @foreach( $ratings as $rating )
                    <div class="col-sm-3">
                        <div class="product-image-wrapper">
                            <div class="single-products">
                                <div class="productinfo text-center" style="padding:10px;">
                                    <p style="height: 60px;">" {!! $rating->r_content !!} "</p>
                                    <h4 style="color: #FE980F">{{ $rating->r_name }}</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
</div>
<!--/recommended_items-->
@endsection