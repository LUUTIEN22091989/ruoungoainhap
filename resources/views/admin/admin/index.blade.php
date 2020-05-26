@extends('admin.layouts')
@section('content')
<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      Liệt kê danh mục
    </div>
    <div class="table-responsive">
      <table class="table table-striped b-t b-light">
        <thead>
          <tr>
            <th>Stt</th>
            <th>Tên Admin</th>
            <th>Email</th>
            <th>Số điện thoại</th>
            <th>Phê duyệt</th>
            <th>Ngày thêm</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach( $admins as $item )
          <tr>
            <td>{{ $item->id }}</td>
            <td>{{ $item->ad_name }}</td>
            <td>{{ $item->ad_email }}</td>
            <td>{{ $item->ad_phone }}</td>
            <td>
              @if( $item->ad_active == 1 )
                 <a href="{{ route('admin.active', $item->id)}}" class="btn btn-xs btn-primary"><span class="text-ellipsis">Duyệt</span></a>
              @else
                <a href="{{ route('admin.active', $item->id)}}" class="btn btn-xs btn-danger"><span class="text-ellipsis">Chưa duyệt</span></a>
              @endif
            </td>
            <td>{{ $item->created_at }}</td>
            <td>
              <a href="{{ route('admin.update', $item->id)}}" class="btn btn-xs btn-primary">Sửa</a>
              <a href="{{ route('admin.delete', $item->id)}}" class="btn btn-xs btn-danger js-delete-confirm">Xóa</a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    <footer class="panel-footer">
      <div class="row">
        <div class="col-sm-7 text-right text-center-xs">                
          {{ $admins->links() }}
        </div>
      </div>
    </footer>
  </div>
</div>
@stop