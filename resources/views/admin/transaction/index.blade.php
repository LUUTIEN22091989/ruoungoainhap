@extends('admin.layouts')
@section('content')
<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      Liệt kê đơn hàng
    </div>
    <form class="form-inline">
                    <input type="text" class="form-control" value="{{ Request::get('id') }}" name="id" placeholder="id">
                    <input type="text" class="form-control" value="{{ Request::get('email') }}" name="email" placeholder="Email...">
                    <select name="type" class="form-control">
                        <option value="0">Phân loại khách</option>
                        <option value="1" {{ Request::get('type') ==1 ? "selected='selected'" : ""}}>Thành viên</option>
                        <option value="2" {{ Request::get('type') ==2 ? "selected='selected'" : ""}}>Khách</option>
                    </select>
                    <select name="status" class="form-control">
                        <option value="">Trang thái</option>
                        <option value="1" {{ Request::get('status') ==1 ? "selected='selected'" : ""}}>Tiếp nhận</option>
                        <option value="2" {{ Request::get('status') ==2 ? "selected='selected'" : ""}}>Đã bàn giao</option>
                        <option value="3" {{ Request::get('status') ==3 ? "selected='selected'" : ""}}>Đơn hàng hủy</option>
                    </select>
                    <input type="date" class="form-control" name="date" value="{{ Request::get('date')}}">
                    <button type="submit" class="btn btn-success"><i class="fa fa-search">Search</i></button>
      </form>
    <div class="table-responsive">
      <table class="table table-striped b-t b-light">
        <thead>
          <tr>
            <th style="width: 10px">#</th>
            <th>Khách hàng</th>
            <th>Số tiền</th>
            <th>Account</th>
            <th>Status</th>
            <th>Thanh toán</th>
            <th>Cuppon</th>
            <th>Thời gian tạo</th>
             <th>Action</th>
          </tr>
        </thead>
        <tbody>
          @if( isset($transactions) )
                        @foreach( $transactions as $transaction )
                        <tr>
                            <td>{{ $transaction->id }}</td>
                            <td>
                                <ul>
                                    <li>Name: {{ $transaction->tst_name }}</li>
                                    <li>Phone: {{ $transaction->tst_phone }}</li>
                                    <li>Email: {{ $transaction->tst_email }}</li>
                                    <li>Nơi nhận: {{ $transaction->tst_address }}</li>
                                </ul>
                            </td>>
                            <td>{{ number_format($transaction->tst_total_money) }}đ</td>
                            <td>
                                @if($transaction->tst_user_id)
                                  <span class="label label-success">Thành viên</span>
                                @else
                                  <span class="label label-default">Khách</span>
                                @endif
                            </td>
                            <td>
                                <span style="color: blue">{{ $transaction->getStatus($transaction->tst_status)['name'] }}
                               </span>
                            </td>
                            <td>
                                @if($transaction->tst_type)
                                  <span>Tiền mặt</span>
                                @else
                                  <span>Chuyển khoản</span>
                                @endif
                            </td>
                            <td>{{ $transaction->tst_code_cuppon ?? 0 }}</td>
                            <td>{{ $transaction->created_at }}</td>
                            <td>
                               <a href="{{ route('admin.transaction.show', $transaction->id)}}" class="btn btn-xs btn-info"><i class="fa fa-eye"></i>Chi tiết</a>
                                <div class="btn-group"> 
                                   <button type="button" class="btn btn-success btn-xs">Action</button>
                                   <button type="button" class="btn btn-success btn-xs dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                       <span class="caret"></span>
                                       <span class="sr-only">Toogle Dropdown</span>
                                   </button>
                                   <ul class="dropdown-menu" role="menu" style="font-size: 10px;">
                                       <li>
                                           <a href="{{ route('admin.transaction.delete', $transaction->id)}}" class="js-delete-confirm"><i class="fa fa-trash"></i>Xóa đơn hàng</a>
                                       </li>
                                       <li class="divider"></li>
                                       <li>
                                           <a href="{{ route('admin.action.transaction', ['success', $transaction->id])}}"><i class="fa fa-ban"></i>Đã bàn giao</a>
                                       </li>
                                       <li>
                                           <a href="{{ route('admin.action.transaction', ['cancle', $transaction->id])}}"><i class="fa fa-ban"></i>Đơn hàng hủy</a>
                                       </li>

                                   </ul>
                                </div>
                                <a target="_blank" style="margin-top: 5px" href="{{ route('admin.print.transaction',$transaction->id)}}" class="btn btn-sm btn-primary">In đơn hàng</a>
                            </td>
                        </tr>
                        @endforeach
                        @endif
        </tbody>
      </table>
      <div class="col-sm-12" style="margin-top: 20px;">
          <div class="row">
            <div class="col-sm-6" style="margin-top: 40px">
              <form class="form-group" action="{{ route('admin.export.transaction') }}" method="POST">
                 @csrf
                 <input type="submit" name="" value="Xuất Excel" class="btn btn-primary">
              </form>
            </div>
          </div>
      </div>
    </div>
    <footer class="panel-footer">
      <div class="row">
        <div class="col-sm-7 text-right text-center-xs">                
          {{ $transactions->appends($query)->links() }}
        </div>
      </div>
    </footer>
  </div>
</div>
@stop