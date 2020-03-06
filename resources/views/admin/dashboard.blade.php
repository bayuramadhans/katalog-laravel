@extends('admin.layout')
@section('style')
@endsection
@section('content')
<div class="row">
  <div class="col-lg-3 col-md-6 col-sm-6">
    <div class="card card-stats">
      <div class="card-header card-header-success card-header-icon">
        <div class="card-icon">
          <i class="material-icons">people_alt</i>
        </div>
        <p class="card-category">Jumlah Konsumen</p>
        <h3 class="card-title">{{$total_konsumen}}</h3>
      </div>
      <div class="card-body">
      </div>
    </div>
  </div>
  <div class="col-lg-3 col-md-6 col-sm-6">
    <div class="card card-stats">
      <div class="card-header card-header-success card-header-icon">
        <div class="card-icon">
          <i class="material-icons">content_paste</i>
        </div>
        <p class="card-category">Jumlah Produk</p>
        <h3 class="card-title">{{$total_produk}}</h3>
      </div>
      <div class="card-body">
      </div>
    </div>
  </div>
  <div class="col-lg-3 col-md-6 col-sm-6">
    <div class="card card-stats">
      <div class="card-header card-header-success card-header-icon">
        <div class="card-icon">
          <i class="material-icons">attach_money</i>
        </div>
        <p class="card-category">Jumlah Produk Terjual</p>
        <h3 class="card-title">{{$total_produk_terjual}}</h3>
      </div>
      <div class="card-body">
      </div>
    </div>
  </div>
</div>
@endsection
@section('script')
<script>
  $("#dashboard").addClass("active");
</script>
@endsection
