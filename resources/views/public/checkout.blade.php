@extends('public.layout')
@section('style')
<style>
  .no-padding{
    padding:0 !important;
  }
</style>
@endsection
@section('content')
@if ($message = Session::get('success'))
<div class="row container">
  <div class="alert alert-success alert-dismissible fade show" role="alert" style="width:100%; position:relative;">
    <strong>Berhasil!</strong> {{ $message }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
</div>
@endif
<div class="bg-light py-3">
  <div class="container">
    <div class="row">
      <div class="col-md-12 mb-0"><a href="{{route('public.index')}}">Beranda</a> <span class="mx-2 mb-0">/</span><a href="{{route('public.keranjang')}}">Keranjang</a> <span class="mx-2 mb-0">/</span> <strong class="text-black">Keranjang</strong></div>
    </div>
  </div>
</div>

<div class="site-section">
  <div class="container">
    <form action="{{ route('public.create') }}" method="post" enctype="multipart/form-data">
      {{ csrf_field() }}
    <div class="row">
      <div class="col-md-6 mb-5 mb-md-0">
        <h2 class="h3 mb-3 text-black">Detail Konsumen</h2>
        <div class="p-3 p-lg-5 border">

          <div class="form-group row">
            <div class="col-md-12">
              <label for="nama" class="text-black">Nama <span class="text-danger">*</span></label>
              <input type="text" class="form-control" id="nama" name="nama" required>
            </div>
          </div>

          <div class="form-group row">
            <div class="col-md-12">
              <label for="alamat" class="text-black">Alamat <span class="text-danger">*</span></label>
              <input type="text" class="form-control" id="alamat" name="alamat" required>
            </div>
          </div>

          <div class="form-group row">
            <div class="col-md-6">
              <label for="kota" class="text-black">Kota <span class="text-danger">*</span></label>
              <input type="text" class="form-control" id="kota" name="kota" required>
            </div>
            <div class="col-md-6">
              <label for="provinsi" class="text-black">Provinsi <span class="text-danger">*</span></label>
              <input type="text" class="form-control" id="provinsi" name="provinsi" required>
            </div>
          </div>
          <div class="form-group row">
            <div class="col-md-12">
              <label for="kode_pos" class="text-black">Kode Pos <span class="text-danger">*</span></label>
              <input type="text" class="form-control" id="kode_pos" name="kode_pos" required>
            </div>
          </div>
          <div class="form-group row">
            <div class="col-md-12">
              <label for="email" class="text-black">Email <span class="text-danger">*</span></label>
              <input type="email" class="form-control" id="email" name="email" required>
            </div>
          </div>
          <div class="form-group row">
            <div class="col-md-12">
              <label for="no_telp" class="text-black">Nomor Telp <span class="text-danger">*</span></label>
              <input type="text" class="form-control" id="no_telp" name="no_telp" required>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-6">

        <div class="row mb-5">
          <div class="col-md-12">
            <h2 class="h3 mb-3 text-black">Order Anda</h2>
            <div class="p-3 p-lg-5 border">
              <table class="table site-block-order-table mb-5">
                <thead>
                  <th>Produk</th>
                  <th>Subtotal</th>
                </thead>
                <tbody>
                  <?php
                    $total_harga = 0;
                   ?>
                  @if(session('cart'))
                  @foreach(session('cart') as $id => $details)
                  <?php
                    $total_harga = $total_harga + $details['total_harga'];
                  ?>
                  <tr>
                    <td>{{ $details['nama'] }} <strong class="mx-2">x</strong> {{ $details['jumlah'] }}</td>
                    <td>{{ $details['total_harga'] }}</td>
                  </tr>
                  @endforeach
                  @endif
                  <tr>
                    <td class="text-black font-weight-bold"><strong>Total Harga</strong></td>
                    <td class="text-black font-weight-bold"><strong>{{$total_harga}}</strong></td>
                  </tr>
                </tbody>
              </table>

              <div class="form-group">
                <button type="submit" class="btn btn-primary btn-lg btn-block" >Buat Order</button>
              </div>

            </div>
          </div>
        </div>

      </div>
    </div>
    </form>
  </div>
</div>
@endsection
