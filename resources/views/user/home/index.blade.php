@extends('user.app_master_user')
<style type="text/css">
    .box-count{
        padding: 15px 10px;
    }
    .count-text{
        text-align: center;
        color: white;
        font-size: 35px;
    }

    .count-name{
        text-align: center;
        color: white;
    }

</style>
@section('content')
    <section class="py-lg-3">
        <h2>Trang tổng quan người dùng</h2>
        <div class="row mb-5">
              <div class="col-3">
                  <div class="box-count" style="background: #00c0ef">
                      <div class="count-text">4</div>
                      <h4 class="count-name">Tổng đơn</h4>
                  </div>
              </div>
              <div class="col-3">
                  <div class="box-count" style="background: #dd4b39">
                      <div class="count-text">4</div>
                      <h4 class="count-name">Đơn hủy</h4>
                  </div>
              </div>
              <div class="col-3">
                  <div class="box-count" style="background: #f39c12">
                      <div class="count-text">4</div>
                      <h4 class="count-name">Đang giao hàng</h4>
                  </div>
              </div>
              <div class="col-3">
                  <div class="box-count" style="background: #00a65a">
                      <div class="count-text">4</div>
                      <h4 class="count-name">Hoàn thành</h4>
                  </div>
              </div>
        </div>
    </section>
@stop