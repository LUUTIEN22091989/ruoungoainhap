@extends('admin.layouts')
@section('content')
<div class="row">
            <div class="col-lg-12">
             <section class="panel">
                 <header class="panel-heading">
                           Thêm Static
                 </header>
                <div class="panel-body">
                    <div class="position-center">
                            <form role="form" action="" method="POST" enctype="multipart/form-data">
                                @csrf
                              <div class="form-group">
                                        <label for="s_title">Title<span class="text-danger">(Bắt buộc)</span></label>
                                        <input type="text" class="form-control" id="s_title" name="s_title" placeholder="Tên ...">
                                    </div>
                                    <div class="form-group">
                                        <label for="s_type">Loại page<span class="text-danger">(Bắt buộc)</span></label>
                                        <select class="form-control" name="s_type">
                                            <option value="">--Chọn--</option>
                                            @foreach( $type as $key => $item )
                                            <option value="{{ $key }}">{{ $item }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                          <label for="s_content">Nội dung bài viết:</label>
                                          <textarea cols="12" rows="5" class="form-control" id="ckeditor1" name="s_content" placeholder="Nội dung sản phẩm"></textarea>
                                    </div>
                                    <div class="box-footer">
                                        <a href="{{ route('admin.static.index')}}" class="btn btn-danger">Quay lại</a>
                                        <button type="submit" class="btn btn-primary">Lưu dữ liệu <i class="fa fa-save"></i></button>
                                    </div>
                            </form>
                    </div>
                 </div>
             </section>
            </div>
</div>
<!-- /.content -->
@endsection

@section('script')
<!-- link album anh -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.7/css/fileinput.css" media="all" rel="stylesheet" type="text/css"/>
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.7/js/fileinput.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.7/themes/fa/theme.js" type="text/javascript"></script>
<!-- link album anh -->
@stop