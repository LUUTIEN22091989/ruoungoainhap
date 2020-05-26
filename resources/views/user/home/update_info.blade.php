@extends('user.app_master_user')
@section('content')
    <section class="py-lg-3" style="background: white; padding: 20px">
        <h2>Cập nhật thông tin người dùng</h2>
        <div class="row mb-5">
          <div class="col-sm-12">
          	 <form action ="" method="POST">
          	 	@csrf
          	      <div class="form-group">
				    <label for="">Name</label>
				    <input type="text" class="form-control" name="name" value="{{Session::get('user_name')}}" placeholder="Name"> <!-- check nếu đăng nhập mới vào dc trang cập nhật -->
				  </div>
				  <div class="form-group">
				    <label for="">Email</label>
				    <input type="email" class="form-control" name="email" value="{{Session::get('user_email')}}" placeholder="Enter email"> <!-- check nếu đăng nhập mới vào dc trang cập nhật -->
				    <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
				  </div>
				  <div class="form-group">
				    <label for="">Phone</label>
				    <input type="number" class="form-control" name="phone" value="{{Session::get('user_phone')}}" placeholder="Phone"> <!-- check nếu đăng nhập mới vào dc trang cập nhật -->
				  </div>
				  <div class="form-group">
				    <label for="">Address</label>
				    <input type="text" class="form-control" name="address" value="{{Session::get('user_address') ?? '' }}" placeholder="Address"> <!-- check nếu đăng nhập mới vào dc trang cập nhật -->
				  </div>
				  <!-- <div class="form-group">
				    <label for="exampleInputPassword1">Password</label>
				    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
				  </div> -->
				  <button type="submit" class="btn btn-primary">Cập nhật</button>
				  @if (Session::has('alert'))
						<div role="alert" class="alert alert-success text-center" style="font-size: 15px; color: blue">{{Session::get('alert')}}</div>
					@endif
		   </form>
          </div>
        </div>
    </section>
@stop