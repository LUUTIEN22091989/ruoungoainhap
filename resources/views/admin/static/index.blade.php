@extends('admin.layouts')
@section('content')
<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      Liệt kê sản phẩm
    </div>
    <form class="form-inline" action="" method="">
        <div class="form-group">
          <input type="text" class="form-control" value="{{ Request::get('name') }}" name="name" placeholder="Tên sản phẩm...">
          <select name="category" class="form-control">
                      <option value="0">Theo danh mục</option>
                      @foreach( $categories as $cat )
                      <option value="{{$cat->id}}" {{ Request::get('category') == $cat->id ? "selected='selected'" : ""}}>{{ $cat->c_name }}</option>
                      @endforeach
          </select>
        </div>
        <button type="submit" class="btn btn-success"><i class="fa fa-search">Search</i></button>
     </form>
    <div class="table-responsive">
      <table class="table table-striped b-t b-light">
                    <tbody>
                        <tr>
                            <th style="width: 10px">#</th>
                            <th>Title</th>
                            <th>Type</th>
                            <th>Active</th>
                            <th>Created_at</th>
                            <th>Action</th>
                        </tr>
                        @if( isset($statics) )
                         @foreach( $statics as $static)
                           <tr>
                            <td>{{ $static->id }}</td>
                            <td>{{ $static->s_title}}</td>
                            <td>{{ $static->getType($static->s_type)}}</td>
                            <td>
                                @if( $static->s_active == 1)
                                   <a href="{{ route('admin.static.active', $static->id) }}" class="label label-info">Hiển thị</a>
                                @else
                                   <a href="{{ route('admin.static.active', $static->id) }}" class="label label-default" >Ẩn</a>
                                @endif
                            </td>
                            <td>{{ $static->created_at }}</td>
                            <td>
                                <a href="{{ route('admin.static.update', $static->id)}}" class="btn btn-xs btn-primary"><i class="fa fa-pencil"></i> Sửa</a>
                                <a href="{{ route('admin.static.delete', $static->id)}}" class="btn btn-xs btn-danger js-delete-confirm"><i class="fa fa-trash"></i> Xóa</a>
                            </td>
                            </tr>
                         @endforeach
                        @endif
                        
                    </tbody>
                </table>
     </div>
   </div>
</div>
<!-- /.content -->
@endsection