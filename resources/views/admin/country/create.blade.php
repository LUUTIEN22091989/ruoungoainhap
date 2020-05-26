@extends('admin.layouts')
@section('content')
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                           Thêm xuất xứ
                        </header>
                        <div class="panel-body">

                            <div class="position-center">
                                <form role="form" action="" method="post" enctype="multipart/form-data">
                                    @csrf
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Xuất xứ</label>
                                    <input type="text" data-validation="length" data-validation-length="min10" data-validation-error-msg="Điền ít nhất 10 ký tự" name="co_name" class="form-control" id="exampleInputEmail1" placeholder="Tên danh mục">
                                    @if($errors->has('co_name'))
                                     <span class="error-text text-danger">
                                            {{$errors->first('co_name')}}
                                     </span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Hiển thị</label>
                                      <select name="co_status" class="form-control input-sm m-bot15">
                                            <option>--Chọn--</option>
                                            <option value="0">Ẩn</option>
                                            <option value="1">Hiển thị</option>  
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Nổi bật</label>
                                      <select name="co_hot" class="form-control input-sm m-bot15">
                                            <option>--Chọn--</option>
                                            <option value="0">Không</option>
                                            <option value="1">Có</option>  
                                    </select>
                                </div>
                               
                                <button type="submit" class="btn btn-info">Thêm</button>
                                </form>
                            </div>

                        </div>
                    </section>

            </div>
@endsection

@section('script')
<!-- link album anh -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.7/css/fileinput.css" media="all" rel="stylesheet" type="text/css"/>
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.7/js/fileinput.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.7/themes/fa/theme.js" type="text/javascript"></script>
<!-- link album anh -->
@stop