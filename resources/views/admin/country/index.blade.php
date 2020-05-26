@extends('admin.layouts')
@section('content')
<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      Liệt kê xuất xứ
    </div>
    <div class="table-responsive">
      <table class="table table-striped b-t b-light">
        <thead>
          <tr>
            <th>Stt</th>
            <th>Tên xuất xứ</th>
            <th>Hiển thị/Ẩn</th>
            <th>Nổi bật</th>
            <th>Ngày thêm</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach( $countrys as $item )
          <tr>
            <td>{{ $item->id }}</td>
            <td>{{ $item->co_name }}</td>
            <td>
              @if( $item->co_status == 1 )
                 <a href="{{ route('admin.country.status', $item->id)}}" class="btn btn-xs btn-primary"><span class="text-ellipsis">Hiển thị</span></a>
              @else
                <a href="{{ route('admin.country.status', $item->id)}}" class="btn btn-xs btn-danger"><span class="text-ellipsis">Ẩn</span></a>
              @endif
            </td>
            <td>
              @if( $item->co_hot == 1 )
                 <a href="{{ route('admin.country.hot', $item->id)}}" class="btn btn-xs btn-primary"><span class="text-ellipsis">Nổi bật</span></a>
              @else
                <a href="{{ route('admin.country.hot', $item->id)}}" class="btn btn-xs btn-danger"><span class="text-ellipsis">Không nổi bật</span></a>
              @endif
            </td>
            <td>{{ $item->created_at }}</td>
            <td>
              <a href="{{ route('admin.country.update', $item->id)}}" class="btn btn-xs btn-primary">Sửa</a>
              <a href="{{ route('admin.country.delete', $item->id)}}" class="btn btn-xs btn-danger js-delete-confirm">Xóa</a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>    
    </div>
    <footer class="panel-footer">
      <div class="col-sm-12">
            <div class="col-sm-7 text-left">                
                {{ $countrys->links() }}
            </div>
      </div>
    </footer>
  </div>
</div>
@stop