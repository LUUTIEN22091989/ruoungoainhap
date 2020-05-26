@extends('admin.layouts')
@section('content')
    <div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      Liệt kê mã giảm giá
    </div>
    <div class="row w3-res-tb">
      <div class="col-sm-5 m-b-xs">
        <select class="input-sm form-control w-sm inline v-middle">
          <option value="0">Bulk action</option>
          <option value="1">Delete selected</option>
          <option value="2">Bulk edit</option>
          <option value="3">Export</option>
        </select>
        <button class="btn btn-sm btn-default">Apply</button>                
      </div>
      <div class="col-sm-4">
      </div>
      <div class="col-sm-3">
        <div class="input-group">
          <input type="text" class="input-sm form-control" placeholder="Search">
          <span class="input-group-btn">
            <button class="btn btn-sm btn-default" type="button">Go!</button>
          </span>
        </div>
      </div>
    </div>
    <div class="table-responsive">      <table class="table table-striped b-t b-light">
        <thead>
          <tr>
            <th>Tên mã giảm giá</th>
            <th>Mã giảm giá</th>
            <th>Số lượng giảm giá</th>
            <th>Điều kiện giảm giá</th>
            <th>Số giảm</th>
          </tr>
        </thead>
        <tbody>
          @foreach($cuppons as $key => $cou)
          <tr>
          
            <td>{{ $cou->cp_name }}</td>
            <td>{{ $cou->cp_code }}</td>
            <td>{{ $cou->cp_stock }}</td>
            <td><span class="text-ellipsis">
              <?php
               if($cou->cp_condition==1){
                ?>
                Giảm theo %
                <?php
                 }else{
                ?>  
                Giảm theo tiền
                <?php
               }
              ?>
            </span>
          </td>
             <td><span class="text-ellipsis">
              <?php
               if($cou->cp_condition==1){
                ?>
                Giảm {{$cou->cp_number}} %
                <?php
                 }else{
                ?>  
                Giảm {{$cou->cp_number}} k
                <?php
               }
              ?>
            </span></td>
           
            <td>
              <a href="{{ route('admin.cuppon.delete', $cou->id)}}" class="active styling-edit js-delete-confirm" ui-toggle-class="">Xóa</a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    <footer class="panel-footer">
      <div class="row">
        <div class="col-sm-7 text-right text-center-xs">                
          {{ $cuppons->links() }}
        </div>
      </div>
    </footer>
  </div>
</div>
@endsection