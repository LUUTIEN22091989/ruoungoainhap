@extends('admin.layouts')
@section('content')
<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      Liệt kê danh mục
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
                    <tbody>
                        <tr>
                            <th style="width: 10px">#</th>
                            <th>Tiêu đề</th>
                            <th>Phone</th>
                            <th>Email</th>
                            <th>Nội dung</th>
                            <th>Reply</th>
                            <th>Thời gian nhận</th>
                            <th>Action</th>
                        </tr>
                        @if( $contacts )
                        @foreach( $contacts as $contact )
                        <tr>
                            <td>{{ $contact->id }}</td>
                            <td>{{ $contact->c_title }}</td>
                            <td>{{ $contact->c_phone }}</td>
                            <td>{{ $contact->c_email }}</td>
                            <td>{{ $contact->c_content }}</td>
                            <td>
                                @if( $contact->c_reply == 1)
                                   <a href="{{ route('admin.contact.active', $contact->id) }}" class="label label-info">Đã trả lời</a>
                                @else
                                   <a href="{{ route('admin.contact.active', $contact->id) }}" class="label label-default" >Chưa trả lời</a>
                                @endif
                            </td>
                            <td>{{ $contact->created_at }}</td>
                            <td>
                                <a href="{{ route('admin.contact.delete', $contact->id )}}" class="btn btn-xs btn-danger js-delete-confirm"><i class="fa fa-trash"></i> Xóa</a>
                            </td>
                        </tr>
                        @endforeach
                        @endif
                        
                    </tbody>
                </table>
            </div>
        </div>
        <div class="box-footer">
            {{ $contacts->links() }}
        </div>
    </div>
    </section>
<!-- /.content -->
@endsection