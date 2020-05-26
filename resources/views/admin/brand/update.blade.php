@extends('admin.layouts')
@section('content')
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Update thương hiệu
                        </header>
                        <div class="panel-body">
                            <div class="position-center">
                                <form role="form" action="" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label for="b_name">Tên thương hiệu</label>
                                        <input type="text" name="b_name" class="form-control" id="b_name" placeholder="Tên danh mục" value="{{ $brand->b_name }}">
                                        @if($errors->has('b_name'))
                                            <span style="color: red;font-size: 15px;" class="error-text text-danger">
                                                {{$errors->first('b_name')}}
                                            </span>
                                        @endif
                                    </div>

                                    <div class="form-group">
                                        <label>Thương hiệu thuộc danh mục</label>
                                        <select class="form-control" name="b_category_id">
                                            <option value="0">-- chọn --</option>
                                            @foreach($categories as $item)
                                                <option {{ ($brand->b_category_id == $item->id ? 'selected':'') }} value="{{ $item -> id }}">{{ $item -> c_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="meta_desc">Meta Desc</label>
                                        <textarea id="ckeditor1" type="text" name="meta_desc" class="form-control" value="">{{ $brand->meta_desc }}</textarea>
                                        <!-- @if($errors->has('b_name'))
                                            <span style="color: red;font-size: 15px;" class="error-text text-danger">
                                                {{$errors->first('b_name')}}
                                            </span>
                                        @endif -->
                                    </div>
                                    <div class="form-group">
                                        <label for="mete_keywords">Meta Keywords</label>
                                        <textarea id="ckeditor2" type="text" name="meta_keywords" class="form-control" value="">{{ $brand->meta_desc }}</textarea>
                                        <!-- @if($errors->has('b_name'))
                                            <span style="color: red;font-size: 15px;" class="error-text text-danger">
                                                {{$errors->first('b_name')}}
                                            </span>
                                        @endif -->
                                    </div>
                                     <div class="form-group">
                                        <label for="exampleInputEmail1">Hình ảnh</label>
                                        <br>
                                        <img style="margin: 10px;" src="{{ asset($brand->b_avatar) }}" width="100" height="100">
                                        <input type="file" name="b_avatar" class="form-control" id="exampleInputEmail1">
                                    </div>
                                    <div class="form-group">
                                    	<label for="b_status">Hiển thị</label>
    	                                <select name="b_status" class="form-control input-sm m-bot15">
    	                                	<option>--Chọn--</option>
    		                                <option value="0" {{ $brand->b_status == 0 ? 'selected' : ''}}>Ẩn</option>
    		                                <option value="1" {{ $brand->b_status == 1 ? 'selected' : ''}}>Hiển thị</option>
    		                            </select>
    	                            </div>
                                    <button type="submit" class="btn btn-sm btn-info">Cập nhật</button>
                                    <a href="{{ Route('admin.brand.index') }}" class="btn btn-sm btn-primary">Quay lại</a>
                            </form>
                            </div>

                        </div>
                    </section>

            </div>
        </div>
@stop