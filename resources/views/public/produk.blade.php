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
      <div class="col-md-12 mb-0"><a href="index.html">Home</a> <span class="mx-2 mb-0">/</span> <strong class="text-black">{{$produk->nama}}</strong></div>
    </div>
  </div>
</div>

<div class="site-section">
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
          <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            @for($i=1;$i<count($produk->idProdukFotoProduk);$i++)
            <li data-target="#carouselExampleIndicators" data-slide-to="{{$i}}"></li>
            @endfor
          </ol>
          <div class="carousel-inner">
            <div class="carousel-item active">
              <img src="{{asset($produk->idProdukFotoProduk[0]->file_url)}}" class="d-block w-100" alt="...">
            </div>
            @for($i=1;$i<count($produk->idProdukFotoProduk);$i++)
            <div class="carousel-item">
              <img src="{{asset($produk->idProdukFotoProduk[$i]->file_url)}}" class="d-block w-100" alt="...">
            </div>
            @endfor
          </div>
          <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>

      </div>
      <div class="col-md-6">
        <h2 class="text-black">{{$produk->nama}}</h2>
        <p>{{$produk->deskripsi}}</p>
        @if($produk->status_diskon==1)
          <p><del>Rp {{$produk->harga}}</del><strong class="text-primary h4">Rp {{$produk->harga_diskon}}</strong></p>
        @else
          <p><strong class="text-primary h4">Rp {{$produk->harga}}</strong></p>
        @endif
        <form action="{{ route('public.store') }}" method="post" enctype="multipart/form-data">
          {{ csrf_field() }}
        <p style="margin-top:15px;">Pilih Variasi</p>
        <table class="table">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Ukuran</th>
              <th scope="col">Warna</th>
              <th scope="col">Stok</th>
              <th scope="col">Pilih</th>
            </tr>
          </thead>
          <tbody>
            @for($i=0;$i<count($produk->idProdukStok);$i++)
            @if($produk->idProdukStok[$i]->stok!=0)
            <tr>
              <th scope="row">{{$i+1}}</th>
              <td>{{$produk->idProdukStok[$i]->idUkuranStok->nama}}</td>
              <td>
                <div class="row no-margin" style="width:120px;">
                  <div class="col-3 no-padding">
                    <div style="width:15px;height:15px;border-radius:50%;background-color:{{$produk->idProdukStok[$i]->idWarnaStok->hex}};margin-top:3px;margin-right:0;"></div>
                  </div>
                  <div class="col-9 no-padding" align="left">
                    {{$produk->idProdukStok[$i]->idWarnaStok->nama}}
                  </div>
                </div></td>
              <td>{{$produk->idProdukStok[$i]->stok}}</td>
              <td><input type="radio" name="id_stok" value="{{$produk->idProdukStok[$i]->id}}"></td>
            </tr>
            @endif
            @endfor
          </tbody>
        </table>
        <div class="mb-5">
          <div class="input-group mb-3" style="max-width: 120px;">
          <div class="input-group-prepend">
            <button class="btn btn-outline-primary js-btn-minus" type="button">&minus;</button>
          </div>
          <input type="text" name="jumlah"class="form-control text-center" value="1" placeholder="" aria-label="Example text with button addon" aria-describedby="button-addon1">
          <div class="input-group-append">
            <button class="btn btn-outline-primary js-btn-plus" type="button">&plus;</button>
          </div>
        </div>

        </div>
        <p>
          <input type="hidden" name="harga" @if($produk->status_diskon==1) value="{{$produk->harga_diskon}}"@else value="{{$produk->harga}}" @endif>
          <button type="submit" class="buy-now btn btn-sm height-auto px-4 py-3 btn-primary">
            Tambah ke keranjang
          </button>
        </p>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
@section('script')
@endsection
