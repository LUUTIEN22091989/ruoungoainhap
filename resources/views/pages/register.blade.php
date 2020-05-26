@extends('welcome')
@section('content')
			<div class="row">
				<div class="">
						<ol class="breadcrumb">
						  <li><a href="{{ route('get.home')}}">Trang chủ</a></li>
						  <li class="active">Đăng ký</li>
						</ol>
		        </div>
				<div class="col-sm-4 col-sm-offset-4" style="margin-bottom: 30px">
					<div class="login-form"><!--login form-->
						<form action="{{ route('post.register') }}" method="post">
							@csrf
						  <div class="form-group">
						    <label for="name">Họ tên</label>
						    <input type="text" class="form-control" name="name" id="name" placeholder="Họ tên" value="{{ old('name') }}">
						    @if($errors->has('name'))
                                <span class="error-text text-danger">
                                    {{$errors->first('name')}}
                                 </span>
                            @endif
						  </div>
						  <div class="form-group">
						    <label for="email">Email</label>
						    <input type="email" class="form-control" name="email" id="email" placeholder="Enter email" value="{{ old('email') }}">
						    @if($errors->has('email'))
                                <span class="error-text text-danger">
                                    {{$errors->first('email')}}
                                 </span>
                            @endif
						  </div>
						  <div class="form-group">
						    <label for="phone">Số điện thoại</label>
						    <input type="number" class="form-control" name="phone" id="phone" placeholder="Số điện thoại" value="{{ old('phone') }}">
						    @if($errors->has('phone'))
                                <span class="error-text text-danger">
                                    {{$errors->first('phone')}}
                                 </span>
                            @endif
						  </div>
						  <div class="form-group">
						    <label for="password">Password</label>
						    <input type="password" class="form-control" name="password" id="password" placeholder="Password">
						    @if($errors->has('password'))
                                <span class="error-text text-danger">
                                    {{$errors->first('password')}}
                                 </span>
                            @endif
						  </div>
						  <div class="form-group" style="display: flex;">
							  <button type="submit" class="btn btn-primary">Đăng ký</button>
						  </div>
						</form>
					</div>
				</div>
			</div>
@stop