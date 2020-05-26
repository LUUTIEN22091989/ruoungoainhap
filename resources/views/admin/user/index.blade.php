@extends('admin.layouts')
@section('content')
<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
        Quản lý thành viên
    </div>
    <div class="table-responsive">
                <table class="table">
                    <tbody>
                        <tr>
                            <th style="width: 10px">#</th>
                            <th>Tên thành viên</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Thời gian tạo</th>
                            <th>Action</th>
                        </tr>
                        @if( isset($users) )
                        @foreach( $users as $user )
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->phone }}</td>
                            <td>{{ $user->created_at }}</td>
                            <td>
                                <a href="{{ route('admin.user.delete', $user->id )}}" class="btn btn-xs btn-danger js-delete-confirm"><i class="fa fa-trash"></i> Xóa</a>
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