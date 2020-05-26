@extends('welcome')
@section('content')
<div class="row">  	
	            <div class="">
						<ol class="breadcrumb">
						  <li><a href="{{ route('get.home')}}">Trang chủ</a></li>
						  <li class="active">Liên hệ</li>
						</ol>
		        </div>
	    		<div class="col-sm-8">
	    			<div class="contact-form">
	    				<h2 class="title text-center">Thông tin liên hệ</h2>
	    				<div class="status alert alert-success" style="display: none"></div>
				    	<form id="main-contact-form" class="contact-form row" name="contact-form" action="" method="POST">
				    		@csrf
				            <div class="form-group col-md-6">
				                <input value="{{ Session::get('user_name')}}" type="text" name="c_name" class="form-control" required="required" placeholder="Họ tên...">
				            </div>
				            <div class="form-group col-md-6">
				                <input value="{{ Session::get('user_email')}}" type="email" name="c_email" class="form-control" required="required" placeholder="Email">
				            </div>
				            <div class="form-group col-md-6">
				                <input value="{{ Session::get('user_phone')}}" type="number" name="c_phone" class="form-control" required="required" placeholder="Điện thoại...">
				            </div>
				            <div class="form-group col-md-12">
				                <input type="text" name="c_title" class="form-control" placeholder="Tiêu đề">
				            </div>
				            <div class="form-group col-md-12">
				                <textarea name="c_content" id="" required="required" class="form-control" rows="8" placeholder="Nội dung..."></textarea>
				            </div>                        
				            <div class="form-group col-md-12">
				                <input type="submit" name="" class="btn btn-primary pull-left" value="Gửi">
				            </div>
				        </form>
	    			</div>
	    		</div>
	    		<div class="col-sm-4">
	    			<div class="contact-info">
	    				<h2 class="title text-center">Shop rượu ngoại</h2>
	    				<address>
	    					<h4></h4>
							<p>Số 14 Pháo Đài Láng, Đống Đa, Hà Nội</p>
							<p>Hotline: 0942 005 988</p>
							<p>Fax: 1-714-252-0026</p>
							<p>Email: luutiennc1989@gmail.com</p>
							<div class="fb-page" data-href="https://www.facebook.com/RuouVangQuocTe" data-width="" data-height="" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/RuouVangQuocTe" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/RuouVangQuocTe">Shop rượu ngoại</a></blockquote></div>
	    				</address>
	    				<div class="social-networks" style="margin-bottom: 20px;">
	    					<div class="fb-share-button" data-href="http://dientu1989.local" data-layout="button_count" data-size="large"><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u={{ $meta_canonical }}&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore">Chia sẻ</a></div>
							<div class="fb-like" data-href="{{ $meta_canonical }}" data-width="" data-layout="button_count" data-action="like" data-size="large" data-share="false"></div>
	    				</div>
	    			</div>
    			</div>    			
	    	</div>  
@stop