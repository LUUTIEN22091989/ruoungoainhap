@extends('welcome')

@section('css')
  <style type="text/css">
      .productByCategory .active{
        background: #FE980F;
      }
  </style>
@stop

@section('content')
<section id="cart_items">
    <div class="container">
        <div class="row">
        <div class="col-sm-2">
                        <ol class="breadcrumb" style="font-size: 15px;background: #FE980F;margin-top:5px;margin-left: 15px;">
                          <li class="active" style="color: white">{{ $category->c_name }}</li>
                        </ol>
        </div>
            @if( isset($_category) )
            <div class="col-sm-12">
                 <div class="row">
                    <div class="col-sm-12 productByCategory">
                     @foreach( $_category as $item )
                        <div class="col-sm-2 text-center {{ Request::get('ruou_vang') == Str::slug($item->c_name).'-'.$item->id ? "active" : "" }}" style="border: 1px solid #f3e8e8; padding:10px;">
                                <a href="{{ request()->fullUrlWithQuery(['ruou_vang' => Str::slug($item->c_name).'-'.$item->id]) }}">
                                    <span>{{ $item->c_name }}</span>
                                </a>
                        </div>
                     @endforeach
                    </div>
                </div>
            </div>
            @endif
            <form class="col-sm-12" method="" action="" style="margin-top: 10px;">
                    <div class="col-sm-3 search-price">
                        <select name="gia" class="form-control">
                            <option value="0">--Chọn mức giá--</option>
                            <option value="9" {{ Request::get('gia') ==9 ? "selected='selected'" : ""}}>Dưới 500,000đ</option>
                             @for($i =1; $i <= 7; $i++)
                             <option value="{{ $i }}" {{ Request::get('gia') == $i ? "selected='selected'" : ""}}>Từ  {{ number_format($i * 500000)}}đ - {{ number_format($i * 500000 + 500000)}} đ</option>   
                              @endfor
                             <option value="8" {{ Request::get('gia') ==8 ? "selected='selected'" : ""}}>Trên 4 triệu</option>             
                        </select>
                    </div>
                    <div class="col-sm-3 search-price">
                        <select name="dung_tich" class="form-control">
                            <option value="0">--Chọn dung tích--</option>
                            <option value="6" {{ Request::get('dung_tich') == 6 ? "selected='selected'" : ""}}>Dưới 650ml</option>
                            @for($i =1; $i <= 4; $i++)
                            <option value="{{ $i }}" {{ Request::get('dung_tich') == $i ? "selected='selected'" : ""}}>{{ 550 + ($i * 50) }}ml</option>
                            @endfor
                             <option value="5" {{ Request::get('dung_tich') ==5 ? "selected='selected'" : ""}}>Trên 750ml</option>             
                        </select>
                    </div>
                    <div class="col-sm-2 search-price">
                        <select name="nong_do" class="form-control">
                            <option value="0">--Chọn nồng độ--</option>
                            <option value="5" {{ Request::get('nong_do') == 5 ? "selected='selected'" : ""}}>Dưới 10%</option>
                            @for($i =1; $i <= 4; $i++)
                            <option value="{{ $i }}" {{ Request::get('nong_do') == $i ? "selected='selected'" : ""}}>Từ {{ 10 * $i }} - {{ 10 + ($i * 10) }}%</option>
                            @endfor             
                        </select>
                    </div>
                    <div class="col-sm-2 search-price">
                        <select name="xuat_xu" class="form-control">
                            <option value="0">-Chọn xuất xứ--</option>
                            @foreach( $countrys as $cou )
                            <option value="{{ $cou->id}}" {{ Request::get('xuat_xu') == $cou->id ? "selected='selected'" : ""}}>{{ $cou->co_name }}</option>
                            @endforeach          
                        </select>
                    </div>
                    <div class="col-sm-2">
                        <button style="margin-top: 0px" type="submit" class="btn btn-primary">Tìm sản phẩm</button>
                    </div>
            </form>
            <div class="col-sm-12 padding-right" style="margin-top: 20px;">
                        <div class="features_items">
                            <!--features_items-->
                            <h2 class="title text-center" style="font-size: 20px">{{ $category->c_name }} - {{ $products->total() }} Sản phẩm</h2>

                            @foreach( $products as $item )
                                @include('pages.include.product_item', ['item' => $item])
                            @endforeach

                            <div class="col-sm-12">
                                {{ $products->appends($query)->links() }}
                            </div>
                        </div>
                    </div>
            <div class="col-sm-12" style="margin-top: 30px;" >
                <div class="features_items">
                <!--recommended_items-->
                    <h2 class="title text-center" style="font-size: 20px;">Đang khuyến mãi khủng</h2>
                    @foreach( $productsSale as $item )
                        @include('pages.include.product_item', ['item' => $item])
                    @endforeach
                </div>
            </div>
            <div class="col-sm-12" style="margin-top: 30px">
                <!-- bình luận -->
                <h3>Mời bình luận về {{ $category->c_name }}: </h3>
                 <div class="fb-comments" data-href="{{ $meta_canonical }}" data-numposts="20" data-width=""></div>
                 <div class="fb-page" data-href="https://www.facebook.com/thegioididongcom/" data-tabs="message" data-width="" data-height="" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/thegioididongcom/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/thegioididongcom/">Thế Giới Di Động (thegioididong.com)</a></blockquote></div>
                 <!-- end bình luận -->
            </div>
            <!--/recommended_items-->
        </div>
    </div>
</section>
@endsection