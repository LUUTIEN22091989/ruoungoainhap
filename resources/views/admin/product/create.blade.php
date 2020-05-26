@extends('admin.layouts')
@section('content')
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                           Thêm sản phẩm
                        </header>
                        <div class="panel-body">

                            <div class="position-center">
                                <form role="form" action="" method="post" enctype="multipart/form-data">
                                    @csrf
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên sản phẩm</label>
                                    <input type="text" data-validation="length" data-validation-length="min10" data-validation-error-msg="Điền ít nhất 10 ký tự" name="pro_name" class="form-control" id="exampleInputEmail1" placeholder="Tên danh mục">
                                    @if($errors->has('pro_name'))
                                     <span class="error-text text-danger">
                                            {{$errors->first('pro_name')}}
                                     </span>
                                    @endif
                                </div>
                                  <div class="form-group">
                                    <label for="exampleInputEmail1">Mã code</label>
                                    <input type="text" name="pro_code" class="form-control" id="exampleInputEmail1">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Giá sản phẩm</label>
                                    <input type="text" name="pro_price" class="form-control" id="" placeholder="Gía sp">
                                </div>
                                  <div class="form-group">
                                    <label for="exampleInputEmail1">Hình ảnh sản phẩm</label>
                                    <input type="file" name="pro_image" class="form-control" id="exampleInputEmail1">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Mô tả sản phẩm</label>
                                    <textarea id="ckeditor1" style="resize: none"  rows="8" class="form-control" name="pro_desc" id="ckeditor1" placeholder="Mô tả sản phẩm"></textarea>
                                    @if($errors->has('pro_desc'))
                                     <span class="error-text text-danger">
                                            {{$errors->first('pro_desc')}}
                                     </span>
                                    @endif
                                </div>
                                 <div class="form-group">
                                    <label for="exampleInputPassword1">Nội dung sản phẩm</label>
                                    <textarea id="ckeditor2" style="resize: none" rows="8" class="form-control" name="pro_content" placeholder="Nội dung sản phẩm"></textarea>
                                    @if($errors->has('pro_content'))
                                     <span class="error-text text-danger">
                                            {{$errors->first('pro_content')}}
                                     </span>
                                    @endif
                                </div>
                                 <div class="form-group">
                                    <label for="exampleInputPassword1">Danh mục sản phẩm</label>
                                      <select name="pro_category_id" class="form-control input-sm m-bot15">
                                            <option value="">-Chọn--</option>
                                            @foreach( $categories as $item )
                                            <option value="{{ $item->id }}">{{ $item->c_name }}</option>
                                            @endforeach
                                            
                                    </select>
                                </div>
                                 <div class="form-group">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label for="exampleInputEmail1">Xuất xứ</label>
                                            <select name="pro_country_id" class="form-control">
                                                <option value="">-Chọn--</option>
                                                @foreach( $countrys as $item )
                                                <option value="{{ $item->id }}">{{ $item->co_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-sm-4">
                                            <label for="exampleInputEmail1">Dung tích</label>
                                            <input type="text" name="pro_capacity" class="form-control" id="exampleInputEmail1">
                                        </div>
                                        <div class="col-sm-4">
                                            <label for="exampleInputEmail1">Nồng độ</label>
                                            <input type="text" name="pro_concentration" class="form-control" id="exampleInputEmail1">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <h4 class="box-title mb-1">Album ảnh</h4>
                                    <div class="form-group" style="margin-bottom: 5px">
                                        <div class="file-loading">
                                                <input id="images" type="file" name="file[]" multiple class="file" data-overwrite-initial="false" data-min-file-count="0">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputPassword1">Hiển thị</label>
                                      <select name="pro_status" class="form-control input-sm m-bot15">
                                            <option>--Chọn--</option>
                                            <option value="0">Ẩn</option>
                                            <option value="1">Hiển thị</option>  
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Nổi bật</label>
                                      <select name="pro_hot" class="form-control input-sm m-bot15">
                                            <option>--Chọn--</option>
                                            <option value="0">Không</option>
                                            <option value="1">Có</option>  
                                    </select>
                                </div>
                                <div class="form-group row">
                                        <div class="col-sm-6">
                                            <label for="pro_sale">% Sale</label>
                                            <input min="0" type="number" name="pro_sale" class="form-control" id="pro_sale">
                                        </div>
                                        <div class="col-sm-6">
                                            <label for="pro_number">Số lượng</label>
                                            <input type="number" name="pro_number" class="form-control" id="pro_number">
                                        </div>
                                </div>
                               
                                <button type="submit" class="btn btn-info">Thêm sản phẩm</button>
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