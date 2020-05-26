@extends('admin.layouts')
@section('content')
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                           Update thông tin
                        </header>
                        <div class="panel-body">

                            <div class="position-center">
                                <form role="form" action="" method="post" enctype="multipart/form-data">
                                    @csrf
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên xuất xứ</label>
                                    <input type="text" data-validation="length" data-validation-length="min10" data-validation-error-msg="Điền ít nhất 10 ký tự" name="co_name" class="form-control" id="exampleInputEmail1" placeholder="Tên danh mục" value="{{ $country->co_name }}">
                                    @if($errors->has('co_name'))
                                     <span class="error-text text-danger">
                                            {{$errors->first('co_name')}}
                                     </span>
                                    @endif
                                </div>

                               
                                <button type="submit" class="btn btn-sm btn-info">Cập nhật</button>
                                <a href="{{ Route('admin.country.index') }}" class="btn btn-sm btn-primary">Quay lại</a>
                                </form>
                            </div>

                        </div>
                    </section>

            </div>
@endsection