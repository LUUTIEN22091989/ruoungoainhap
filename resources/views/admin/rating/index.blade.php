@extends('admin.layouts')
@section('content')
<div class="table-agile-info">
     <div class="panel panel-default">
            <div class="panel-heading">
              Liệt kê rating
            </div>
            <div class="table-responsive">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <th style="width: 10px">#</th>
                                    <th>Tên sản phẩm</th>
                                    <th>User</th>
                                    <th>Email</th>
                                    <th>Phân loại</th>
                                    <th>Type</th>
                                    <th>Status</th>
                                    <th>Thời gian đánh giá</th>
                                    <th>Action</th>
                                </tr>
                                @if(isset($ratings))
                                 @foreach( $ratings as $rating)
                                   <tr>
                                    <td>{{ $rating->id }}</td>
                                    <td>{{ $rating->product->pro_name ?? "[N\A]" }}</td>
                                    <td>{{ $rating->r_name}}</td>
                                    <td>{{ $rating->r_email}}</td>
                                    <td>
                                        @if($rating->r_user_id)
                                          <span class="label label-success">Thành viên</span>
                                        @else
                                          <span class="label label-default">Khách</span>
                                        @endif
                                    </td>
                                    <td>
                                        {{ $rating->getType($rating->r_type)['name']}}
                                    </td>
                                    <td>
                                        @if( $rating->r_status == 1)
                                           <a href="{{ route('admin.rating.active', $rating->id) }}" class="label label-info">Duyệt</a>
                                        @else
                                           <a href="{{ route('admin.rating.active', $rating->id) }}" class="label label-default" >Chưa duyệt</a>
                                        @endif
                                    </td>
                                    <td>{{ $rating->created_at }}</td>
                                    <td>
                                        <a href="{{ route('admin.rating.delete', $rating->id)}}" class="btn btn-xs btn-danger js-delete-confirm"><i class="fa fa-trash"></i> Xóa</a>
                                    </td>
                                    </tr>
                                 @endforeach
                                @endif
                                
                            </tbody>
                        </table>
            </div>
            <div class="box-footer">
                    {{ $ratings->links() }}
            </div>
    </div>
</div>
@endsection