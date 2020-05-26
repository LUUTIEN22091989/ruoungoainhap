@extends('admin.layouts')
@section('content')
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                           Thêm danh mục tin tức
                        </header>
                        <div class="panel-body">

                            <div class="position-center">
                                <form role="form" action="" method="POST">
                                     @csrf
                                    <div class="col-sm-8">
                                        <div class="form-group {{ $errors->first('mn_name') ? 'has-error' : '' }}">
                                            <label for="name">Tên danh mục <span class="text-danger">(*)</span></label>
                                            <input type="text" class="form-control" name="mn_name"  placeholder="Name ...">
                                            @if ($errors->first('mn_name'))
                                                <span class="text-danger">{{ $errors->first('mn_name') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        
                                    </div>
                                    <div class="col-sm-8">
                                        <div class="box-footer text-center">
                                            <button type="submit" class="btn btn-success">Lưu dữ liệu <i class="fa fa-save"></i></button>
                                        </div>
                                    </div>
                                </form>  
                            </div>

                        </div>
                    </section>

            </div>
        </div>
@endsection