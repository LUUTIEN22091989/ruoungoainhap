@extends('welcome')
@section('content')
			<div class="row">
				<div class="">
						<ol class="breadcrumb">
						  <li><a href="{{ route('get.home')}}">Trang chủ</a></li>
						  <li class="active">Đăng nhập</li>
						</ol>
		        </div>
				<div class="col-sm-4 col-sm-offset-4" style="margin-bottom: 30px">
					<div class="login-form"><!--login form-->
						<form action="" method="post">
							@csrf
						  <div class="form-group">
						    <label for="email">Email address</label>
						    <input required="" type="email" class="form-control" name="email" id="email" placeholder="Enter email">
						  </div>
						  <div class="form-group">
						    <label for="password">Password</label>
						    <input required="" type="password" class="form-control" name="password" id="password" placeholder="Password">
						  </div>
						  <div class="form-group">
							  <button style="margin-bottom: 5px;" type="submit" class="btn btn-primary">Đăng nhập</button>
						  </div>
							  <a href="{{ route('get.reset.password')}}">Quên mật khẩu?</a>
						</form>
					</div><!--/login form-->
				</div>
			</div>
@stop