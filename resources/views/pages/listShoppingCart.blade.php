@extends('welcome')

	
@section('content')
<section id="cart_items">
	<div class="container">
		<div class="">
						<ol class="breadcrumb">
						  <li><a href="{{ route('get.home')}}">Trang chủ</a></li>
						  <li class="active">Giỏ hàng của bạn</li>
						</ol>
		</div>
		<div class="table-responsive cart_info" id="my-cart">
						@include('pages.include.cart')
						<div style=""><h4 style=" text-align: right;padding: 10px;color: blue;">Tổng tiền: {{ Cart::subtotal(0) }}đ</h4></div>
		</div>
		<div class="row" id="do_action">
			<div class="col-sm-6 mb-3" style="border: 1px solid #e8d3d3">
				<h2>Nhập thông tin khách hàng:</h2>
				<form action="{{ route('post.shopping.pay') }}" method="post">
					@csrf
				    <div class="form-group">
				        <label for="tst_name">Họ tên</label>
				        <input required="" type="text" class="form-control" name="tst_name" id="name" placeholder="Họ tên" value="{{Session::get('user_name')}}">
				    </div>
				    <div class="form-group">
				        <label for="tst_email">Email</label>
				        <input required="" type="email" class="form-control" name="tst_email" id="tst_email" placeholder="Email" value="{{Session::get('user_email')}}">
				    </div>
				    <div class="form-group">
				        <label for="tst_phone">Số điện thoại</label>
				        <input required="" type="number" class="form-control" name="tst_phone" id="tst_phone" placeholder="Số điện thoại" value="{{Session::get('user_phone')}}">
				    </div>
				    <div class="form-group">
				        <label for="tst_address">Địa chỉ nhận</label>
				        <input required="" type="text" class="form-control" name="tst_address" id="tst_address" placeholder="Address">
				    </div>
				    <div class="form-group">
				        <label for="tst_note">Ghi chú</label>
				        <textarea type="text" class="form-control" rows="5" name="tst_note" id="tst_note" placeholder="Note"></textarea>
				    </div>
				    <div class="form-group">
		                     <label for="tst_type">Chọn hình thức thanh toán</label>
		                     <select required="" name="tst_type"  class="form-control">
		                        <option value="0">Chuyển khoản</option>
		                        <option value="1">Tiền mặt</option>   
		                    </select>
		            </div>
				    <button style="margin-bottom: 10px" type="submit" class="btn btn-primary">Đặt mua</button>
				</form>
			</div>
			<div class="col-sm-5 mb-3 col-sm-offset-1">
				<div class="total_area">
					<ul>
						<li>Tạm tính <span>{{ Cart::subtotal(0) }}đ</span></li>
						<li style="display: flex;">
							<span>
							<form action="{{ route('post.check.cuppon') }}" method="post">
								@csrf
									<input type="text" class="form-control" value="{{ Session::get('cp_code') ?? 0 }}" name="cuppon" placeholder="Nhập mã giảm giá nếu có" style="display: flex;">
									<button style="margin-top: 0px;"  type="submit" name="" class="btn btn-sm btn-primary">Cập nhật</button>
									@if(Session::get('cp_code'))
									<a href="{{ route('get.delete.cuppon') }}" class="bt btn-sm btn-success">Xóa mã</a>
									@endif

							</form>
							</span>
						</li>
						<li>Khuyến mãi: 
							@if(Session::get('cp_condition') == 1 )
							 <span>-{{  Session::get('cp_number') }}%</span>
							@elseif(Session::get('cp_condition') == 2)
							 <span>-{{  Session::get('cp_number') }}đ</span>
							@endif
						</li>
						<li>Thanh toán 
							@if(Session::get('total_money_cuppon'))
							<span>{{ number_format(Session::get('total_money_cuppon')) }}đ 
							</span>
							@else
							 <span>
							 	{{ Cart::subtotal(0) }}đ
							 </span>
							@endif
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</section>
@stop

@section('script')
   <script type="text/javascript">
	   $(function(){
	   	 	//update số lượng khi mua
	   	 	$(".js-update-qty").change(function(event){
	   	 		event.preventDefault();
	   	 		let $this = $(this);
	   	 		let URL    = $(this).attr('data-url'); //lấy link sp cần update số lượng
	   	 	    let qty = $(this).val();// lấy slg khi nhập vào thẻ input 
	    		let idProduct = $(this).attr('data-id-product') // lấy id của sp

	    			if (URL) {
	                    $.ajax({
	                        url: URL,
	                        data: { qty: qty, idProduct : idProduct }
	                    }).done(function(results){
	                    	alert(results.messages);
	                        window.location.reload(); //web tự load lại au khi nhấn cập nhật
	                    });
	                }
	   	 	})
	   	 })

   </script>
   <!-- Xóa sp khỏi giỏ hàng -->
   <script type="text/javascript">
		   	$(function(){
			   	 	//xóa sp khỏi giỏ hàng
			   	 	$(".js-delete-cart").click(function(event){
			   	 		event.preventDefault();
			   	 		let $this = $(this);
			   	 		let url    = $(this).attr('href'); //lấy link sp cần update số lượng
			    			if (url) {
			                    $.ajax({
			                        url: url,
			                    }).done(function(results){
			                    	alert(results.messages);
			                        window.location.reload(); //web tự load lại au khi nhấn cập nhật
			                    });
			                }
			   	 	})
   	})
   </script>
@stop