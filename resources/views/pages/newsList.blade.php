@extends('welcome')
@section('content')
			<div class="row">
				<div class="">
						<ol class="breadcrumb">
						  <li><a href="{{ route('get.home')}}">Trang chủ</a></li>
						  <li class="active">Tin tức về rượu</li>
						</ol>
		        </div>
				<div class="col-sm-8">
					<div class="blog-post-area">
						<h2 class="title text-center">Tất cả tin tức</h2>
						@foreach( $articles as $item )
						<div class="single-blog-post" style="margin-bottom: 30px;">
							<div class="row">
								<div class="col-sm-4">
									<img style="width: 100%;height: 165px;" class="img-fluid" src="{{ asset($item->a_avatar) }}">
								</div>
								<div class="col-sm-8">
									<h3 style="margin-top: 0px;">{{ $item->a_name}}</h3>
									<div class="post-meta">
										<ul>
											<li><i class="fa fa-calendar"></i>{{ $item->created_at}}</li>
										</ul>
									</div>
									<p>{!! $item->a_description !!}</p>
									<a href="{{ route('get.article.detail', $item->a_slug.'-'.$item->id)}}">Xem chi tiết -></a>
								</div>
							</div>
						</div>
						@endforeach
					</div>
					<!-- bình luận -->
					<h3>Mời bình luận: </h3>
					<div class="fb-comments" data-href="{{ $meta_canonical }}" data-numposts="20" data-width=""></div>
					<div class="fb-page" data-href="https://www.facebook.com/thegioididongcom/" data-tabs="message" data-width="" data-height="" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/thegioididongcom/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/thegioididongcom/">Thế Giới Di Động (thegioididong.com)</a></blockquote></div>
					<!-- end bình luận -->
				</div>
				<div class="col-sm-4">
					<div class="left-sidebar">
						<h2>Sản phẩm nổi bật</h2>
						<div class="panel-group category-products" id="accordian"><!--category-productsr-->
							<div class="row">
								@foreach( $productHot as $item )
								<div class="col-sm-12">
									<div class="row">
										<div class="col-xs-4" style="text-align: center;">
											<a href="{{ route('get.ProductDetail', $item->pro_slug.'-'.$item->id)}}"><img style="width: 70%;height: 60px;" src="{{ asset($item->pro_image) }}"></a>
										</div>
										<div class="col-xs-8">
											<a href="{{ route('get.ProductDetail', $item->pro_slug.'-'.$item->id)}}"><p style="margin-bottom: -5px;color: black">{{ $item->pro_name }}
											</p></a>
											@if($item->pro_sale)
											<div style="display: flex;">
				                                <h5 style="color: blue;margin-right: 20px;">{{ number_format(($item->pro_price*(100-$item->pro_sale))/100) }}đ</h5>
				                                <h5 style="color: red;"><del>{{ number_format($item->pro_price) }}đ</del></h5>
				                            </div>
				                            @else
				                                <h5 style="color: blue;">{{ number_format($item->pro_price) }}đ</h5>
				                            @endif
										</div>
									</div>
								</div><hr style=" border: 1px solid #f1e6e6b3;background-size;width: 90%">
								@endforeach
							</div>
						</div><!--/category-products-->
					
						<div class="brands_products"><!--brands_products-->
							<h2>Brands</h2>
							<div class="brands-name">
								<ul class="nav nav-pills nav-stacked">
									<li><a href=""> <span class="pull-right">(50)</span>Acne</a></li>
									<li><a href=""> <span class="pull-right">(56)</span>Grüne Erde</a></li>
									<li><a href=""> <span class="pull-right">(27)</span>Albiro</a></li>
									<li><a href=""> <span class="pull-right">(32)</span>Ronhill</a></li>
									<li><a href=""> <span class="pull-right">(5)</span>Oddmolly</a></li>
									<li><a href=""> <span class="pull-right">(9)</span>Boudestijn</a></li>
									<li><a href=""> <span class="pull-right">(4)</span>Rösch creative culture</a></li>
								</ul>
							</div>
						</div><!--/brands_products-->
						
						<div class="price-range"><!--price-range-->
							<h2>Price Range</h2>
							<div class="well">
								 <input type="text" class="span2" value="" data-slider-min="0" data-slider-max="600" data-slider-step="5" data-slider-value="[250,450]" id="sl2" ><br />
								 <b>$ 0</b> <b class="pull-right">$ 600</b>
							</div>
						</div><!--/price-range-->
						
						<div class="shipping text-center"><!--shipping-->
							<img src="/frontend/images/home/shipping.jpg" alt="" />
						</div><!--/shipping-->
					</div>
				</div>
			</div>


@stop