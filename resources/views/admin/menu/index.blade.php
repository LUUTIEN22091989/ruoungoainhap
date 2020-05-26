@extends('admin.layouts')
@section('content')
    <div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      Liệt kê mã giảm giá
    </div>
    <div class="row w3-res-tb">
      <div class="col-sm-5 m-b-xs">
        <select class="input-sm form-control w-sm inline v-middle">
          <option value="0">Bulk action</option>
          <option value="1">Delete selected</option>
          <option value="2">Bulk edit</option>
          <option value="3">Export</option>
        </select>
        <button class="btn btn-sm btn-default">Apply</button>                
      </div>
      <div class="col-sm-4">
      </div>
      <div class="col-sm-3">
        <div class="input-group">
          <input type="text" class="input-sm form-control" placeholder="Search">
          <span class="input-group-btn">
            <button class="btn btn-sm btn-default" type="button">Go!</button>
          </span>
        </div>
      </div>
    </div>
    <div class="table-responsive">      
        <table class="table table-striped b-t b-light">
        <thead>
          <tr>
                <th style="width: 10px">#</th>
                <th>Tên menu</th>
                <th>Avatar</th>
                <th>Status</th>
                <th>Hot</th>
                <th>Thời gian tạo</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
          @if($menus)
                         @foreach( $menus as $menu)
                           <tr>
                            <td>{{ $menu->id }}</td>
                            <td>{{ $menu->mn_name }}</td>
                            <td>
                                <img src="{{asset($menu->mn_avatar)}}" style="width: 80px">
                            </td>
                            <td>
                                @if( $menu->mn_status == 1)
                                   <a href="{{ route('admin.menu.active', $menu->id) }}" class="label label-info">Hiển thị</a>
                                @else
                                   <a href="{{ route('admin.menu.active', $menu->id) }}" class="label label-default" >Ẩn</a>
                                @endif
                            </td>
                            <td>
                                @if( $menu->mn_hot == 1)
                                   <a href="{{ route('admin.menu.hot', $menu->id) }}" class="label label-info">Nổi bật</a>
                                @else
                                   <a href="{{ route('admin.menu.hot', $menu->id) }}" class="label label-default" >Không nổi bật</a>
                                @endif
                            </td>
                            <td>{{ $menu->created_at }}</td>
                            <td>
                                <a href="{{ route('admin.menu.update', $menu->id)}}" class="btn btn-xs btn-primary"><i class="fa fa-pencil"></i> Sửa</a>
                                <a href="{{ route('admin.menu.delete', $menu->id)}}" class="btn btn-xs btn-danger js-delete-confirm"><i class="fa fa-trash"></i> Xóa</a>
                            </td>
                            </tr>
                         @endforeach
                        @endif
        </tbody>
      </table>
    </div>
    <footer class="panel-footer">
      <div class="row">
        <div class="col-sm-7 text-right text-center-xs">                
          {{ $menus->links() }}
        </div>
      </div>
    </footer>
  </div>
</div>
@endsection