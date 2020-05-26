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
        <thead>
          <tr>
            <th>Stt</th>
            <th>Tên sản phẩm</th>
            <th>Hình ảnh</th>
            <th>Gía</th>
            <th>Danh mục</th>
            <th>Hiển thị/Ẩn</th>
            <th>Nổi bật</th>
            <th>Ngày thêm</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach( $products as $item )
          <tr>
            <td>{{ $item->id }}</td>
            <td>{{ $item->pro_name }}</td>
            <td>
              @if ($item->pro_image) <!-- Kiểm tra hình ảnh tồn tại -->
                  <img src="{{ asset($item->pro_image) }}" width="70" height="70">
              @endif
            </td>
            <td>
              @if ($item->pro_price)
               {{ number_format($item->pro_price) }}đ
              @else
                Liên hệ
              @endif
            </td>
            <td>{{ $item->category->c_name }}</td>
            <td>
              @if( $item->pro_status == 1 )
                 <a href="{{ route('admin.product.status', $item->id)}}" class="btn btn-xs btn-primary"><span class="text-ellipsis">Hiển thị</span></a>
              @else
                <a href="{{ route('admin.product.status', $item->id)}}" class="btn btn-xs btn-danger"><span class="text-ellipsis">Ẩn</span></a>
              @endif
            </td>
            <td>
              @if( $item->pro_hot == 1 )
                 <a href="{{ route('admin.product.hot', $item->id)}}" class="btn btn-xs btn-primary"><span class="text-ellipsis">Nổi bật</span></a>
              @else
                <a href="{{ route('admin.product.hot', $item->id)}}" class="btn btn-xs btn-danger"><span class="text-ellipsis">Không nổi bật</span></a>
              @endif
            </td>
            <td>{{ $item->created_at }}</td>
            <td>
              <a href="{{ route('admin.product.update', $item->id)}}" class="btn btn-xs btn-primary">Sửa</a>
              <a href="{{ route('admin.product.delete', $item->id)}}" class="btn btn-xs btn-danger js-delete-confirm">Xóa</a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
      <div class="col-sm-12" style="margin-top: 20px;">
          <div class="row">
            <div class="col-sm-6" style="margin-top: 40px">
              <form class="form-group" action="{{ route('admin.export.product') }}" method="POST">
                 @csrf
                 <input type="submit" name="" value="Xuất Excel" class="btn btn-primary">
              </form>
            </div>
          </div>
      </div>    
    </div>
    <footer class="panel-footer">
      <div class="col-sm-12">
            <div class="col-sm-7 text-left">                
                {{ $products->appends($query)->links() }}
            </div>
      </div>
    </footer>
  </div>
</div>
@stop