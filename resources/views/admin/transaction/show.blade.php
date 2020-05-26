@extends('admin.layouts')
@section('content')
<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      Chi tiêt đơn hàng
    </div>
    <div class="table-responsive">
      <table class="table table-striped b-t b-light">
        <thead>
          <tr>
            <th style="width: 10px">#</th>
              <th>Tên sản phẩm</th>
              <th>Avatar</th>
              <th>Gía thành</th>
              <th>Số lượng</th>
              <th>Tổng tiền</th>
              <th>Action</th>
          </tr>
        </thead>
        <tbody>
          @if( isset($orders) )
            @foreach( $orders as $item )
             <tr>
                <td>{{ $item->id}}</td>
                <td><a href="">{{ $item->product->pro_name ?? "[N\A]"}}</a></td>
                <td>
                    <img style="width: 80px; height: 80px" src="{{ asset($item->product->pro_image ?? "" ) }}" alt="">
                </td>
                <td>{{ number_format($item->od_price) }}</td>
                <td>{{ $item->od_qty }}</td>
                <td>{{ number_format($item->od_price * $item->od_qty) }}đ</td>
                <td>
                    <a href="{{ route('admin.transaction.delete.order_item', $item->id)}}" class="btn btn-xs btn-danger js-delete-confirm">Delete</a>
                </td>
            </tr>
            @endforeach
          @endif
        </tbody>
      </table>
    </div>
    <footer class="panel-footer">
      <div class="row">
        <a href="{{ route('admin.transaction.index') }}" class="btn btn-sm btn-primary">Quay lại</a>
      </div>
    </footer>
  </div>
</div>
@stop