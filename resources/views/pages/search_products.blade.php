@extends('welcome')

@section('content')
<section id="cart_items">
    <div class="container">
        <div class="">
                        <ol class="breadcrumb">
                          <li><a href="{{ route('get.home')}}">Trang chủ</a></li>
                          <li class="active">Tìm kiếm</li>
                        </ol>
        </div>
        <div class="features_items">
            <!--features_items-->
            <h2 class="title text-center" style="font-size: 20px">Sản phẩm theo yêu cầu</h2>
            @if( empty($products))
                 <h5 style="color: #FE980F">Không có sản phẩm theo yêu cầu</h5>
            @else
                @foreach( $products as $item)
                    <div class="col-sm-2 product_item">
                        <div class="product-image-wrapper" style="border: 0px;">
                            <div class="single-products">
                                <div class="productinfo text-center" style="position: relative;">
                                    <img src="{{ asset( $item->pro_image )}}" alt="{{ $item->pro_name}}" style="height: 150px;" />
                                    @if($item->pro_sale)
                                        <h5 style="color: blue;">{{ number_format(($item->pro_price*(100-$item->pro_sale))/100) }}đ</h5>
                                        <h5 style="color: red;"><del>{{ number_format($item->pro_price) }}đ</del></h5>
                                    @else
                                        <h5 style="color: blue;">{{ number_format($item->pro_price) }}đ</h5>
                                    @endif
                                    <p>{{ $item->pro_name }}</p>
                                    @if($item->pro_sale)
                                        <span style="position: absolute;background: #FE980F;top: 0px;right: 0px;border-radius: 50%;padding: 5px;color: blue">
                                            -{{$item->pro_sale}}%
                                        </span>
                                     @endif
                                </div>
                                <div class="product-overlay">
                                    <div class="overlay-content">
                                        <a href="{{ route('get.ProductDetail', $item->pro_slug.'-'.$item->id)}}" class="btn btn-default add-to-cart">Xem chi tiết</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                 @endforeach
            @endif
            
        </div>
    </div>
</section>
@stop