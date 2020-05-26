<form role="form" action="" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="col-sm-12"> 
                            <div class="form-group">
                                <label for="a_name">Tên bài viết <span class="text-danger">(Bắt buộc)</span></label>
                                <input type="text" class="form-control" id="a_name" name="a_name" placeholder="Tên bài viết" value="{{ isset($article->a_name) ? $article->a_name : old('a_name')}}">
                                @if($errors->has('a_name'))
                                     <span class="error-text text-danger">
                                            {{$errors->first('a_name')}}
                                     </span>
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="a_description">Mô tả<span class="text-danger">(Bắt buộc)</span></label>
                                <textarea id="ckeditor1" cols="12" rows="5" class="form-control" name="a_description" placeholder="Mô tả">{{ isset($article->a_description) ? $article->a_description : old('a_description')}}</textarea>
                                @if($errors->has('a_description'))
                                 <span class="error-text text-danger">
                                        {{$errors->first('a_description')}}
                                 </span>
                                @endif
                            </div>                            
                            <div class="form-group">
                                  <label for="a_content">Nội dung bài viết:<span class="text-danger">(Bắt buộc)</span></label>
                                  <textarea id="ckeditor2" cols="12" rows="5" class="form-control" name="a_content" placeholder="Nội dung sản phẩm">{{ isset($article->a_content) ? $article->a_content : old('a_content')}}</textarea>
                                  @if($errors->has('a_content'))
                                         <span class="error-text text-danger">
                                                {{$errors->first('a_content')}}
                                         </span>
                                  @endif
                            </div>
                            <div class="form-group">
                                <label for="a_avatar">Hình ảnh:</label><br>
                                <img src="{{ asset(isset($article->a_avatar) ? $article->a_avatar : old('a_avatar'))}}" style="width: 200px; height: 200px">
                                <input type="file" name="a_avatar" id="a_avatar" class="form-control img-thumbnail" value=""><br>
                                     
                            </div>
                        </div>
                        <div class="box-footer col-sm-12">
                                <button type="submit" class="btn btn-primary">{{ isset($article) ? "Lưu dữ liệu" : "Thêm mới" }}<i class="fa fa-save"></i></button>
                        </div>
</form>
@section('script')
<!-- link album anh -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.7/css/fileinput.css" media="all" rel="stylesheet" type="text/css"/>
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.7/js/fileinput.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.7/themes/fa/theme.js" type="text/javascript"></script>
<!-- link album anh -->
@stop