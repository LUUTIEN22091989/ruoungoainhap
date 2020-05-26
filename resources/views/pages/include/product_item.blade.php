
            <div class="col-sm-2 product_item" style="height: 300px;margin-top: 10px;">
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