@extends('admin.layouts')
@section('content')
<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      Liệt kê sản phẩm
    </div>
    <div class="table-responsive">
      <table class="table table-striped b-t b-light">
                    <tbody>
                        <tr>
                            <th style="width: 10px">#</th>
                            <th>Tên bài viết</th>
                            <th>Avatar</th>
                            <th>Status</th>
                            <th>Hot</th>
                            <th>Action</th>
                        </tr>
                        @if(isset($articles))
                         @foreach( $articles as $article)
                           <tr>
                            <td>{{ $article->id }}</td>
                            <td>{{ $article->a_name}}</td>
                            <td>
                                @if ($article->a_avatar) <!-- Kiểm tra hình ảnh tồn tại -->
                                    <img src="{{asset($article->a_avatar)}}" width="100" height="70">
                                @endif
                            </td>
                            <td>
                                @if( $article->a_active == 1)
                                   <a href="{{ route('admin.article.active', $article->id) }}" class="label label-info">Hiển thị</a>
                                @else
                                   <a href="{{ route('admin.article.active', $article->id) }}" class="label label-default" >Không hiển thị</a>
                                @endif
                            </td>
                            <td>
                                @if( $article->a_hot == 1)
                                   <a href="{{ route('admin.article.hot', $article->id) }}" class="label label-info">Nổi bật</a>
                                @else
                                   <a href="{{ route('admin.article.hot', $article->id) }}" class="label label-default" >Không nổi bật</a>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('admin.article.update', $article->id)}}" class="btn btn-xs btn-primary"><i class="fa fa-pencil"></i> Sửa</a>
                                <a href="{{ route('admin.article.delete', $article->id)}}" class="btn btn-xs btn-danger js-delete-confirm"><i class="fa fa-trash"></i> Xóa</a>
                            </td>
                            </tr>
                         @endforeach
                        @endif
                    </tbody>
                </table>
    </div>
            <div class="box-footer">
            {{ $articles->links() }}
            </div>
        </div>
    </div>
    </section>
<!-- /.content -->
@endsection