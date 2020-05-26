@extends('admin.layouts')
@section('content')
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                           Thêm mã giảm giá
                        </header>
                        <div class="panel-body">

                            <div class="position-center">
                                <form role="form" action="" method="post">
                                    @csrf
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên mã giảm giá</label>
                                    <input required="" type="text" name="cp_name" class="form-control" id="exampleInputEmail1" >
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Mã giảm giá</label>
                                    <input required="" type="text" name="cp_code" class="form-control" id="exampleInputEmail1" >
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Số lượng mã</label>
                                      <input required="" type="text" name="cp_stock" class="form-control" id="exampleInputEmail1" >
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Tính năng mã</label>
                                     <select required="" name="cp_condition" class="form-control input-sm m-bot15">
                                             <option value="0">----Chọn-----</option>
                                            <option value="1">Giảm theo phần trăm</option>
                                            <option value="2">Giảm theo tiền</option>
                                            
                                    </select>
                                </div>
                                 <div class="form-group">
                                    <label for="exampleInputPassword1">Nhập số % hoặc tiền giảm</label>
                                     <input required="" type="number" name="cp_number" class="form-control" id="exampleInputEmail1" >
                                </div>
                               
                               
                                <button type="submit" name="" class="btn btn-info">Thêm mã</button>
                                </form>
                            </div>

                        </div>
                    </section>

            </div>
@endsection