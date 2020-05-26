<table class="table table-condensed" style=" border: 1px solid #f3ecec;">
							<thead class="text-center">
								<tr class="cart_menu" style="background: #FE980F; padding: 20px">
									<td class="image">Hình ảnh</td>
									<td class="">Sản phẩm</td>
									<td class="price ">Gía</td>
									<td class="quantity text-center">Số lượng</td>
									<td class="total ">Tổng tiền</td>
									<td></td>
								</tr>
							</thead>
							<tbody>
								@foreach( $shopping as $key => $item )

								<tr>
									<td class="cart_product">
										<a href="{{ route('get.ProductDetail', $item->name.'-'.$item->id)}}"><img style="width: 80px;" src="{{ asset($item->options->image) }}" alt="{{ $item->name}}"></a>
									</td>
									<td class="cart_description">
										<h4 style="margin-top: -10px" class="text-center"><a style="font-size: 15px;" href="{{ route('get.ProductDetail', $item->name.'-'.$item->id)}}">{{ $item->name }}</a></h4>
									</td>
									<td class="cart_price text-center">
										<p>{{ number_format($item->price) }}đ</p>
									</td>
									<td class="cart_quantity text-center">
										<div class="">
											<input style="width: 40%;text-align: center;" class="cart-plus-minus js-update-qty" type="number" value="{{ $item->qty }}" min="0" data-id="{{ $item->rowId }}" data-id-product="{{ $item->id }}" data-url="{{ route('ajax.update.qty', $key)}}">
										</div>
									</td>
									<td class="cart_total">
										<h4 class="cart_total_price">{{ number_format($item->price * $item->qty ) }}đ</h4>
									</td>
									<td class="">
										<span>
											<a href="{{ route('ajax.shopping.delete', $key) }}" class="cart_quantity_delete js-delete-cart" title="Delete">Xóa</a>
										</span>
									</td>
								</tr>
								@endforeach
							</tbody>
						</table>