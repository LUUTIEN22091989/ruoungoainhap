@extends('welcome')
@section('content')
<div class="row">
	            <div class="">
						<ol class="breadcrumb">
						  <li><a href="{{ route('get.home')}}">Trang chủ</a></li>
						  <li class="active">404 Not Found</li>
						</ol>
		        </div>
		        <div class="col-xs-12">
		        	<h3>Không tìm thấy dữ liệu</h3>
		        </div>
			</div>
@stop