@extends('admin.layouts')
@section('content')
<!-- Content Header (Page header) -->
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                           Thêm sản phẩm
                        </header>
                        <div class="panel-body">

                            <div class="position-center">
                                <form role="form" action="" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="col-sm-12"> 
                                        <div class="form-group">
                                            <label for="sd_title">Title<span class="text-danger">(Bắt buộc)</span></label>
                                            <input required="" type="text" class="form-control" id="sd_title" name="sd_title" placeholder="Tên slide">
                                            @if($errors->has('sd_title'))
                                                 <span class="error-text text-danger">
                                                        {{$errors->first('sd_title')}}
                                                 </span>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label for="sd_link">Link<span class="text-danger">(Bắt buộc)</span></label>
                                            <input type="text" class="form-control" id="sd_link" name="sd_link" placeholder="Link">
                                            @if($errors->has('sd_link'))
                                                 <span class="error-text text-danger">
                                                        {{$errors->first('sd_link')}}
                                                 </span>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                              <label for="sd_image">Hình ảnh:</label><br>
                                              <img src="" style="width: 300px; height: 150px">
                                               <input type="file" name="sd_image" id="sd_image" class="form-control img-thumbnail" value=""><br>  
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="sd_target">Target</label>
                                                    <select required="" class="form-control" name="sd_target">
                                                        <option value="1">_blank</option>
                                                        <option value="2">_self</option>
                                                        <option value="3">_parent</option>
                                                        <option value="4">_top</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="sd_sort">Sort</label>
                                                    <input required="" type="text" class="form-control" id="sd_sort" name="sd_sort" placeholder="Sort">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="box-footer">
                                            <a href="{{ route('admin.slide.index')}}" class="btn btn-danger">Quay lại</a>
                                            <button type="submit" class="btn btn-primary">Lưu dữ liệu <i class="fa fa-save"></i></button>
                                        </div>
                                    </div>
                                    </div>
                                </form>
                            </div>
                       </div>
                   </section>
         </div>
    </div>
<!-- /.content -->
@endsection