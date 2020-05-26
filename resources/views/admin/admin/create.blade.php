@extends('admin.layouts')
@section('content')
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Thêm Admin
                        </header>
                        <div class="panel-body">
                            <div class="position-center">
                                <form role="form" action="" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label for="ad_name">Họ tên</label>
                                        <input type="text" name="ad_name" class="form-control" id="ad_name" placeholder="Tên danh mục">
                                        @if($errors->has('ad_name'))
                                            <span style="color: red;font-size: 15px;" class="error-text text-danger">
                                                {{$errors->first('ad_name')}}
                                            </span>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="ad_email">Email</label>
                                        <input type="text" name="ad_email" class="form-control" id="ad_email" placeholder="Tên danh mục">
                                        @if($errors->has('ad_email'))
                                            <span style="color: red;font-size: 15px;" class="error-text text-danger">
                                                {{$errors->first('ad_email')}}
                                            </span>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="ad_phone">Phone</label>
                                        <input type="text" name="ad_phone" class="form-control" id="ad_phone" placeholder="Tên danh mục">
                                    </div>
                                    <div class="form-group">
                                        <label for="ad_password">Mật khẩu</label>
                                        <input type="text" name="ad_password" class="form-control" id="ad_password" placeholder="Tên danh mục">
                                        @if($errors->has('ad_password'))
                                            <span style="color: red;font-size: 15px;" class="error-text text-danger">
                                                {{$errors->first('ad_password')}}
                                            </span>
                                        @endif
                                    </div>
                                    <button type="submit" class="btn btn-info">Thêm mới</button>
                            </form>
                            </div>

                        </div>
                    </section>

            </div>
        </div>
@stop