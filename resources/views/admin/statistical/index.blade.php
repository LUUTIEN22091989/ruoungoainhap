@extends('admin.layouts')
@section('content')
<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
        Trang quản trị hệ thống
    </div>
    <section class="content">
        <!-- Info boxes -->
        <div class="row">
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                    <span class="info-box-icon bg-aqua"><i class="ion ion-ios-cart-outline"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text" style="white-space: normal;">Tổng số đơn hàng</span>
                        <span class="info-box-number"><small>{{ $totalTransaction }} <a href="{{ route('admin.transaction.index') }}">(Xem chi tiết)</a></small></span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                    <span class="info-box-icon bg-red"><i class="ion ion-ios-people-outline"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Thành viên</span>
                        <span class="info-box-number"><small>{{ $totalUser }} <a href="">(Xem chi tiết)</a></small></span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <!-- fix for small devices only -->
            <div class="clearfix visible-sm-block"></div>
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                    <span class="info-box-icon bg-green"><i class="ion ion-ios-gear-outline"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text" style="white-space: normal;">Tổng sản phẩm</span>
                        <span class="info-box-number"><small>{{ $totalProducts }} <a href="{{ route('admin.product.index') }}">(Xem chi tiết)</a></small></span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                    <span class="info-box-icon bg-yellow"><i class="fa fa-google-plus "></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Tổng đánh giá</span>
                        <span class="info-box-number"><small>{{ $totalRatings }} <a href="{{ route('admin.rating.index') }}">(Xem chi tiết)</a></small></span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- Main row -->
        <div class="row">
            <!-- Left col -->
            <div class="col-md-4">
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title">Doanh thu đơn giao thành công</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <table class="table no-margin">
                                <thead>
                                    <tr>
                                        <th style="width: 10px">STT</th>
                                        <th>Ngày</th>
                                        <th>Tổng tiền</th>
                                    </tr>
                                </thead>
                                <tbody>
                                   @foreach( $revenueTransactionMonth as $key => $revenue)
                                       <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $revenue->day }}</td>
                                        <td>{{ number_format($revenue->totalMoney) }}đ</td>
                                        </tr>
                                     @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.table-responsive -->
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title">Tổng tiền đơn đang tiếp nhận</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <table class="table no-margin">
                                <thead>
                                    <tr>
                                        <th style="width: 10px">STT</th>
                                        <th>Ngày</th>
                                        <th>Tổng tiền</th>
                                    </tr>
                                </thead>
                                <tbody>
                                   @foreach( $revenueTransactionMonthDefault as $key => $revenue)
                                       <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $revenue->day }}</td>
                                        <td>{{ number_format($revenue->totalMoney) }}đ</td>
                                        </tr>
                                     @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.table-responsive -->
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title">Tổng tiền đơn bị hủy</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <table class="table no-margin">
                                <thead>
                                    <tr>
                                        <th style="width: 10px">STT</th>
                                        <th>Ngày</th>
                                        <th>Tổng tiền</th>
                                    </tr>
                                </thead>
                                <tbody>
                                   @foreach( $revenueTransactionMonthCancle as $key => $revenue)
                                       <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $revenue->day }}</td>
                                        <td>{{ number_format($revenue->totalMoney) }}đ</td>
                                        </tr>
                                     @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.table-responsive -->
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8">
                <!-- TABLE: LATEST ORDERS -->
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title">Danh sách đơn hàng mới</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <table class="table no-margin">
                                <thead>
                                    <tr>
                                        <th style="width: 10px">ID</th>
                                        <th>Info</th>
                                        <th>Số tiền</th>
                                        <th>Account</th>
                                        <th>Status</th>
                                        <th>Thời gian tạo</th>
                                    </tr>
                                </thead>
                                <tbody>
                                   @foreach( $transactionsNew as $transaction)
                                       <tr>
                                        <td>{{ $transaction->id }}</td>
                                        <td>
                                            <ul>
                                                <li>Name: {{ $transaction->tst_name }}</li>
                                                <li>Email: {{ $transaction->tst_email }}</li>
                                                <li>Phone: {{ $transaction->tst_phone }}</li>
                                            </ul>
                                        </td>
                                        <td>{{ number_format($transaction->tst_total_money) }}</td>
                                        <td>
                                            @if($transaction->tst_user_id)
                                              <span class="label label-success">Thành viên</span>
                                            @else
                                              <span class="label label-default">Khách</span>
                                            @endif
                                        </td>
                                        <td>{{ $transaction->getStatus($transaction->tst_status)['name']}}</td> <!-- getStatus xem bên models\transaction.php -->
                                        <td>{{ $transaction->created_at }}</td>
                                        </tr>
                                     @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.table-responsive -->
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer clearfix">
                        <a href="{{ route('admin.transaction.index') }}" class="uppercase btn btn-sm btn-info btn-flat pull-right">Danh sách đơn hàng</a>
                    </div>
                    <!-- /.box-footer -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
            <div class="col-md-4">
                <!-- PRODUCT LIST -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Top sản phẩm bán chạy</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <ul class="products-list product-list-in-box">
                           @foreach ($topPayProducts as $key => $item)
                            <li class="item">
                                <div class="product-img">
                                    <img src="{{ asset($item->pro_image) }}" alt="Product Image">
                                </div>
                                <div class="product-info">
                                    <a href="" class="product-title" style="font-size: 12px;">{{ $item->pro_name }}</a><br>
                                    <span style="font-size: 12px;">Lượt mua : {{ $item->pro_pay}} - Số lượng bán: {{ $orderQty[$key] }} chai</span>
                                </div>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer text-center">
                        <a href="{{ route('admin.product.index') }}" class="uppercase btn btn-sm btn-info btn-flat pull-right">Danh sách sản phẩm</a>
                    </div>
                    <!-- /.box-footer -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>
    <!-- /.row -->
    </section>
</div>
</div>
@stop

@section('script') <!-- biểu đồ thống kê -->
  <link rel="stylesheet" href="https://code.highcharts.com/css/highcharts.css">
  <script src="https://code.highcharts.com/highcharts.js"></script>
  <script src="https://code.highcharts.com/modules/accessibility.js"></script>


@stop
