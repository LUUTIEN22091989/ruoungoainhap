@extends('welcome')
@section('content')
<div class="row">
	            <div class="">
						<ol class="breadcrumb">
						  <li><a href="{{ route('get.home')}}">Trang chủ</a></li>
						  <li class="active">Thông tin chung</li>
						</ol>
		        </div>
				<div class="col-sm-3">
					<div class="left-sidebar">
						<h2>Thông tin chung</h2>
						<div class="panel-group category-products" id="accordian"><!--category-productsr-->
							<ul>
								<li style="margin-bottom: 20px;"><a style="font-size: 15px;" href="{{ route('get.static.VeChungToi')}}"><i class="fa fa-plus"></i>&nbsp&nbsp Về chúng tôi</a></li>
								<li style="margin-bottom: 20px;"><a style="font-size: 15px;" href="{{ route('get.static.MuaHang')}}"><i class="fa fa-plus"></i>&nbsp&nbsp Chính sách mua hàng & thanh toán</a></li>
								<li style="margin-bottom: 20px;"><a style="font-size: 15px;" href="{{ route('get.static.GiaoNhan')}}"><i class="fa fa-plus"></i>&nbsp&nbsp Chính sách giao nhận</a></li>
							</ul>
						</div>
					</div>
				</div>
				<div class="col-sm-9">
					<div class="blog-post-area">
						<h2 class="title text-center">{{ $page->s_title}}</h2>
						<div class="single-blog-post">
							<div class="post-meta">
								<ul>
									<li><i class="fa fa-calendar"></i> {{ $page->created_at}}</li>
								</ul>
							</div>
							<p>{!! $page->s_content !!}.</p>
						</div>
					</div>
				</div>
			</div>
@stop