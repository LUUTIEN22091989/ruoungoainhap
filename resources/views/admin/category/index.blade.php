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
            <th>Tên danh mục</th>
            <th>Danh mục cha</th>
            <th>Hiển thị/Ẩn</th>
            <th>Ngày thêm</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach( $categories as $item )
          <tr>
            <td>{{ $item->id }}</td>
            <td>{{ $item->c_name }}</td>
            <td>
                 @foreach($_categories as $cate)
                    {{ $item->c_parent_id == $cate->id ? "$cate->c_name" : ""}}
                @endforeach
             </td>
            <td>
              @if( $item->c_status == 1 )
                 <span class="text-ellipsis">Hiển thị</span>
              @else
                <span class="text-ellipsis">Ẩn</span>
              @endif
            </td>
            <td>{{ $item->created_at }}</td>
            <td>
              <a href="{{ route('admin.category.update', $item->id)}}" class="btn btn-xs btn-primary">Sửa</a>
              <a href="{{ route('admin.category.delete', $item->id)}}" class="btn btn-xs btn-danger js-delete-confirm">Xóa</a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    <footer class="panel-footer">
      <div class="row">
        <div class="col-sm-7 text-right text-center-xs">                
          {{ $categories->links() }}
        </div>
      </div>
    </footer>
  </div>
</div>
@stop