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
      <div class="col-md-12 mb-0"><a href="{{route('public.index')}}">Beranda</a> <span class="mx-2 mb-0">/</span> <strong class="text-black">Keranjang</strong></div>
    </div>
  </div>
</div>

<div class="site-section">
  <div class="container">
    <div class="row mb-5">
      <form class="col-md-12" method="post">
        <div class="site-blocks-table">
          <table class="table table-bordered">
            <thead>
              <tr>
                <th class="product-thumbnail">Gambar</th>
                <th class="product-name">Produk</th>
                <th class="product-name">Variansi</th>
                <th class="product-price">Harga</th>
                <th class="product-quantity">Jumlah</th>
                <th class="product-total">Total</th>
                <th class="product-remove">Hapus</th>
              </tr>
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
                <td class="product-thumbnail">
                  <img src="{{ $details['foto'] }}" alt="Image" class="img-fluid">
                </td>
                <td>{{ $details['nama'] }}</td>
                <td>
                  <div class="row no-margin" style="width:120px;">
                    <div class="col-3 no-padding">
                      <div style="width:15px;height:15px;border-radius:50%;background-color:{{ $details['hex'] }};margin-top:3px;margin-right:0;"></div>
                    </div>
                    <div class="col-9 no-padding" align="left">
                      {{ $details['warna'] }} {{ $details['ukuran'] }}
                    </div>
                  </div>
                </td>
                <td>Rp {{ $details['harga'] }}</td>
                <td>
                  <div class="input-group mb-3" style="max-width: 120px;">
                    <div class="input-group-prepend">
                      <button class="btn btn-outline-primary js-btn-minus" type="button">&minus;</button>
                    </div>
                    <input type="text" class="form-control text-center" value="{{ $details['jumlah'] }}" placeholder="" aria-label="Example text with button addon" aria-describedby="button-addon1">
                    <div class="input-group-append">
                      <button class="btn btn-outline-primary js-btn-plus" type="button">&plus;</button>
                    </div>
                  </div>

                </td>
                <td>Rp {{ $details['total_harga'] }}</td>
                <td><a href="#" class="btn btn-primary height-auto btn-sm">X</a></td>
              </tr>
              @endforeach
              @endif
            </tbody>
          </table>
        </div>
      </form>
    </div>

    <div class="row">
      <div class="col-md-6">

      </div>
      <div class="col-md-6 pl-5">
        <div class="row justify-content-end">
          <div class="col-md-7">
            <div class="row">
              <div class="col-md-12 text-right border-bottom mb-5">
                <h3 class="text-black h4 text-uppercase">Total Biaya</h3>
              </div>
            </div>
            <div class="row mb-5">
              <div class="col-md-6">
                <span class="text-black">Total</span>
              </div>
              <div class="col-md-6 text-right">
                <strong class="text-black">Rp {{$total_harga}}</strong>
              </div>
            </div>

            <div class="row">
              <div class="col-md-12">
                <button class="btn btn-primary btn-lg btn-block" onclick="window.location='{{route('public.checkout')}}'">Proses ke pembelian</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
