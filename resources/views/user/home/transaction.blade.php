@extends('user.app_master_user')
@section('content')
    <section class="py-lg-3" style="background: white; padding: 20px">
        <h2>Danh sách đơn hàng</h2>
        <div class="row mb-5">
          <div class="col-sm-12">
            <form class="form-inline" style="margin-bottom: 20px">
                <div class="form-group">
                  <input type="text" class="form-control" name="id" value="{{ Request::get('id') }}" placeholder="id">
                  <select name="status" class="form-control">
                        <option value="">Trang thái</option>
                        <option value="1" {{ Request::get('status') ==1 ? "selected='selected'" : ""}}>Tiếp nhận</option>
                        <option value="2" {{ Request::get('status') ==2 ? "selected='selected'" : ""}}>Đã bàn giao</option>
                        <option value="3" {{ Request::get('status') ==3 ? "selected='selected'" : ""}}>Đơn hàng hủy</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary ml-1">Tìm kiếm</button>
            </form>

                <table class="table">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Name</th>
                      <th scope="col">Tổng tiền</th>
                      <th scope="col">Thời gian tạo</th>
                      <th scope="col">Trạng thái</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach( $transactions as $transaction)
                    <tr>
                      <td> {{ $transaction->id }}</td>
                      <td>{{ $transaction->tst_name }}</td>
                      <td>{{ number_format($transaction->tst_total_money) }}đ</td>
                      <td>{{ $transaction->created_at }}</td>
                      <td>
                        @if($transaction->tst_status)
                           Tiếp nhận
                        @else
                                Đã giao
                        @endif
                      </td>
                    </tr>
                   @endforeach
                  </tbody>
                </table>
          </div>
        </div>
    </section>
@stop