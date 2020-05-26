@extends('welcome')
@section('css')
<style type="text/css">
    .features_items .product_item:nth-child(4n+1) {
    clear: both;
    }
</style>
@stop
@section('content')
<div class="row" style="margin-top: 50px;">
    <div class="col-sm-8 padding-right">
        <div class="product-details">
            <!--product-details-->
            <div class="col-sm-6">
                <div class="view-product single-product-image" style="position: relative;">
                    <img src="{{ asset($product->pro_image)}}" alt="" />
                    @if($product->pro_sale)
                    <span style="position: absolute;background: #FE980F;top: 0px;right: 0px;border-radius: 50%;padding: 5px;color: blue">
                    -{{$product->pro_sale}}%
                    </span>
                    @endif
                </div>
                <div id="similar-product" class="carousel slide" data-ride="carousel">
                    <!-- Wrapper for slides -->
                    <div class="carousel-inner">
                        <ul class="nav nav-tabs select-product-tab bxslider" style="display: flex;">
                                <li class="image-room item active">
                                    <img style="width: 80px;height: 80px;cursor: pointer;" src="{{ asset( $product->pro_image )}}" alt="{{ $product->pro_name}}" />
                                </li>
                                @foreach( $proImages as $item)
                                <li class="image-room item">
                                    <img style="width: 80px;height: 80px;cursor: pointer;" src="/uploads/product/album/{{ $item->pi_slug }}" alt="pro-thumbnail" />
                                </li>
                                @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="product-information" style="padding-left: 30px;">
                    <!--/product-information-->
                    <h2>{{ $product->pro_name }}</h2>
                    <p>Mã ID: {{ $product->pro_code }}</p>
                    <p><b>Tình trạng:</b> @if($product->pro_number == 0 )
                        Hết hàng
                        @else
                        Còn hàng
                        @endif
                    </p>
                    @if( $product->pro_country_id)
                    <p><b>Xuất xứ:</b> {{ $product->country->co_name }}</p>
                    @endif
                    <p><b>Dung tích:</b> {{ $product->pro_capacity }}ml</p>
                    <p><b>Nồng độ:</b> {{ $product->pro_concentration }}%</p>
                    <form action="{{ route('post.ShoppingCart', $product->id) }}" method="post" style="padding: 5px;background: #ebebeb">
                        @csrf
                        <span>
                        @if($product->pro_price)
                            @if($product->pro_sale)
                            <span style="color: blue;">{{ number_format(($product->pro_price*(100-$product->pro_sale))/100) }}đ</span>
                            <span style="color: red;"><del>{{ number_format($product->pro_price) }}đ</del></span><br>
                            @else
                            <span style="color: blue;">{{ number_format($product->pro_price) }}đ</span><br>
                            @endif
                        @else
                            <span>Liên hệ báo giá</span>
                        @endif
                        <button style="margin-left: 0px;" type="submit" href="" class="btn btn-fefault cart add-shopping-cart"><i class="fa fa-shopping-cart"></i> Thêm vào giỏ</button>
                        </span>
                        <p><i>Shop ưu tiên xữ lý các đơn đặt hàng Online, free ship trong ngày nội thành HCM & HN!</i></p>
                        <p><i>Lưu ý: Các khách hàng tỉnh xa ship 3-5 ngày (Vui lòng đặt sớm để Shop kịp xữ lý)</i></p>
                    </form>
                    <div class="fb-share-button" data-href="http://dientu1989.local" data-layout="button_count" data-size="large"><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u={{ $meta_canonical }}&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore">Chia sẻ</a></div>
                    <div class="fb-like" data-href="{{ $meta_canonical }}" data-width="" data-layout="button_count" data-action="like" data-size="large" data-share="false"></div>
                </div>
                <!--/product-information-->
            </div>
        </div>
        <!--/product-details-->
        <div class="category-tab shop-details-tab">
            <!--category-tab-->
            <div class="col-sm-12">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#details" data-toggle="tab">Mô tả chi tiết</a></li>
                    <li><a href="#reviews" data-toggle="tab">Xem đánh giá</a></li>
                </ul>
            </div>
            <div class="tab-content">
                <div class="tab-pane fade active in" id="details" style="padding: 10px;">
                    <p>{!! $product->pro_content !!}</p>
                </div>
                <div class="tab-pane fade" id="reviews" >
                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 padding-5">
                        <div class="tab-rating-box">
                            <h3 class="comment-reply-title"  style="margin-bottom: 20px">CÁC ĐÁNH GIÁ:</h3>
                            <div class="comments-list">
                                <div class="comments-details">
                                    @foreach( $ratings as $rating)
                                    <div class="comments-content-wrap" style="margin-left: 0">
                                        <span>
                                        <b style="color: blue;margin-right: 10px;">{{ $rating->r_name}}</b>
                                        <span class="post-time"><i class="fa fa-calendar"></i>&nbsp&nbsp{{ $rating->created_at}}</span>
                                        </span>
                                        <p style="margin-top: 5px; color: green" class="item_review">{{ $rating->getType($rating->r_type)['name']}} - {{$rating->r_content}}
                                        </p>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 padding-5">
                        <div class="write-your-review">
                            <h3 class="comment-reply-title" style="margin-bottom: 20px">ĐÁNH GIÁ:</h3>
                            <form id="form-review" action="{{ route('post.rating.product', $product->id )}}" method="POST">
                                @csrf
                                <div class="row">
                                    <div style="margin-top: 5px" class="col-md-12 comment-form-comment">
                                        <p>Lời bình: </p>
                                        <textarea required="required" class="form-control" style="padding: 5px" name="r_content" id="message" cols="50" rows="5" placeholder="Nhập đánh giá sản phẩm"></textarea>
                                        <p>Chọn đáng giá</p>
                                        <select name="r_type" required="required" class="form-control">
                                            <option value="0">--Chọn một đánh giá--</option>
                                            <option value="1">Chất lượng kém</option>
                                            <option value="2">Chất lượng khá</option>
                                            <option value="3">Chất lượng tốt</option>
                                            <option value="4">Chất lượng rất tốt</option>
                                        </select>
                                        <p style="margin-top: 10px;">Họ tên: </p>
                                        <input class="form-control" type="text" required="" name="r_name" placeholder="Nhập tên" value="{{Session::get('user_name')}}"><br>
                                        <p>Email: </p>
                                        <input class="form-control" type="email" name="r_email" placeholder="email" value="{{Session::get('user_email')}}"><br>
                                        <button type="submit" style="font-size: 14px;margin-top: 10px" class="btn btn-success send-reviews">Gửi đánh giá</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--/category-tab-->
        <!-- bình luận -->
        <h4>Mời bình luận về sản phẩm <i>{{ $product->pro_name }}</i>: </h4>
        <div class="fb-comments" data-href="{{ $meta_canonical }}" data-numposts="20" data-width=""></div>
        <div class="fb-page" data-href="https://www.facebook.com/thegioididongcom/" data-tabs="message" data-width="" data-height="" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true">
            <blockquote cite="https://www.facebook.com/thegioididongcom/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/thegioididongcom/">Thế Giới Di Động (thegioididong.com)</a></blockquote>
        </div>
        <!-- end bình luận -->
        <div class="recommended_items" style="margin-top: 20px">
            <!--recommended_items-->
            <h2 class="title text-center">Sản phẩm cùng danh mục</h2>
            <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner features_items">
                    <div class="item active">
                        @foreach( $productSuggests as $item )
                        <div class="col-sm-3 product_item">
                            <div class="product-image-wrapper" style="border: 0px;position: relative;">
                                <div class="single-products">
                                    <div class="productinfo text-center" style="position: relative;">
                                        <img class="img-lazyload" data-original="{{ asset( $item->pro_image )}}" alt="{{ $item->pro_name}}" style="height: 170px;" />
                                        @if($item->pro_price)
                                            @if($item->pro_sale)
                                                <h5 style="color: blue;">{{ number_format(($item->pro_price*(100-$item->pro_sale))/100) }}đ</h5>
                                                <h5 style="color: red;"><del>{{ number_format($item->pro_price) }}đ</del></h5>
                                            @else
                                                <h5 style="color: blue;">{{ number_format($item->pro_price) }}đ</h5>
                                                <h5></h5>
                                            @endif
                                        @else
                                            <h5 style="color:#FE980F ">Liên hệ nhận báo giá</h5>
                                        @endif
                                        <p>{{ $item->pro_name }}</p>
                                        @if($item->pro_sale)
                                        <span style="position: absolute;background: #FE980F;top: 0px;right: 0px;border-radius: 50%;padding: 5px;color: blue">
                                        -{{$item->pro_sale}}%
                                        </span>
                                        @endif
                                    </div>
                                    <div class="product-overlay" style="background: #0000001c">
                                        <form action="{{ route('post.ShoppingCart', $item->id) }}" method="post">
                                            @csrf
                                            <div class="overlay-content">
                                                <a style="background: #FE980F;color: blue;" href="{{ route('get.ProductDetail', $item->pro_slug.'-'.$item->id)}}" class="btn btn-default add-to-cart">Xem chi tiết</a>
                                                <button style="background: #FE980F;color: blue;font-size: 15px;" type="submit" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Thêm vào giỏ</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                <div style="width: 100%">
                    {{ $productSuggests->links() }}
                </div>
            </div>
        </div>
        <!--/recommended_items-->
    </div>
    <div class="col-sm-4">
        <div class="left-sidebar">
            <h2>Sản phẩm nổi bật</h2>
            <div class="panel-group category-products" id="accordian"><!--category-productsr-->
                            <div class="row">
                                @foreach( $productsHot as $item )
                                <div class="col-sm-12">
                                    <div class="row">
                                        <div class="col-xs-4" style="text-align: center;">
                                            <a href="{{ route('get.ProductDetail', $item->pro_slug.'-'.$item->id)}}"><img style="width: 70%;height: 60px;" src="{{ asset($item->pro_image) }}"></a>
                                        </div>
                                        <div class="col-xs-8">
                                            <a href="{{ route('get.ProductDetail', $item->pro_slug.'-'.$item->id)}}"><p style="margin-bottom: -5px;color: black">{{ $item->pro_name }}
                                            </p></a>
                                            @if($item->pro_price)
                                                @if($item->pro_sale)
                                                <div style="display: flex;">
                                                    <h5 style="color: blue;margin-right: 20px;">{{ number_format(($item->pro_price*(100-$item->pro_sale))/100) }}đ</h5>
                                                    <h5 style="color: red;"><del>{{ number_format($item->pro_price) }}đ</del></h5>
                                                </div>
                                                @else
                                                    <h5 style="color: blue;">{{ number_format($item->pro_price) }}đ</h5>
                                                @endif
                                            @else
                                                <h5 style="color:#FE980F ">Liên hệ nhận báo giá</h5>
                                            @endif
                                        </div>
                                    </div>
                                </div><hr style=" border: 1px solid #f1e6e6b3;background-size;width: 90%">
                                @endforeach
                            </div>
             </div><!--/category-products-->
            <!--/category-products-->
             <div class="blog-post-area">
                        <h2 class="title text-center">Tin tức nổi bật</h2>
                        @foreach( $articlesHot as $item )
                        <div class="single-blog-post">
                            <div class="row">
                                <div class="col-sm-4 text-center">
                                    <a href="{{ route('get.article.detail', $item->a_slug.'-'.$item->id)}}">
                                        <img style="height: 60px;width: 70%" src="{{ asset( $item->a_avatar)}}" alt="{{ $item->a_name}}">
                                    </a>
                                </div>
                                <div class="col-sm-8">
                                    <h3 style="font-size: 13px;margin-top: 0px;margin-bottom: 10px;"><a href="{{ route('get.article.detail', $item->a_slug.'-'.$item->id)}}">{{ $item->a_name}}</a></h3>
                                    <div class="post-meta">
                                        <ul>
                                            <li><i class="fa fa-calendar"></i>{{ $item->created_at}}</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
        </div>
    </div>
</div>
@stop
@section('script')
 <script type="text/javascript">
     $(function(){

        // dùng cho hiển thị ảnh khi click vào từng ảnh nhỏ
            $('.image-room').on('click', function() {
                var imgUrl = $(this).children('img')[0].src;
                $('.single-product-image').children('img')[0].src = imgUrl;
            })
    })
 </script>
@stop