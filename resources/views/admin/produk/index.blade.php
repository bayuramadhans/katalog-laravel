@extends('admin.layout')
@section('style')
@endsection
@section('content')
@if ($message = Session::get('success'))
<div class="row container">
  <div class="alert alert-success alert-dismissible fade show" role="alert" style="width:80%; position:relative;">
    <strong>Berhasil!</strong> {{ $message }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
</div>
@endif
@if ($message = Session::get('fail'))
<div class="row container">
  <div class="alert alert-danger alert-dismissible fade show" role="alert" style="width:80%; position:relative;">
    <strong>Gagal!</strong> {{ $message }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
</div>
@endif
<div class="row container">
  <div align="right">
    <a href="{{route('admin.produk.create')}}">
      <button class="btn btn-primary btn-round">
        <i class="material-icons">add</i> Tambah Produk
      </button>
    </a>
  </div>
</div>
<div class="row">
  @for($i=0;$i<count($produk);$i++)
    <div class="col-md-3">
      <div class="card">
        <div class="card-header" style="position: relative; display: inline-block; overflow: hidden; padding: 0;">
          @if(count($produk[$i]->IdProdukFotoProduk)!=0)
          <img src="{{asset($produk[$i]->IdProdukFotoProduk[0]->file_url)}}" style="width:100%;">
          @else
          <img src="{{asset('/foto/produk/default/img.jpg')}}" style="width:100%;">
          @endif
        </div>
        <div class="card-body">
          <h4 class="card-title">{{$produk[$i]->nama}}</h4>
        </div>
        <div class="card-footer">
          <div class="row">
            <div class="col-2 no-padding">
              <a href="{{route('admin.produk.edit',['id'=>$produk[$i]->id])}}">
              <button class="btn btn-sm btn-link">
                <i class="material-icons">edit</i>
              </button>
              </a>
            </div>
            <div class="col-2">
              <form id="delete{{$i}}" action="{{route('admin.produk.destroy',['id' => $produk[$i]->id])}}" method="post">
                  {{ csrf_field() }}
                  <button type="submit" form="delete{{$i}}"  class="btn btn-sm btn-link">
                    <i class="material-icons">delete</i>
                  </button>
               </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    @endfor
    @if(count($produk)==0)
    <div class="col-12">
      <div align="center" style="padding-top:20px;">
        <p>Tidak ada produk tersedia</p>
      </div>
    </div>
    @endif
</div>
@endsection
@section('script')
<script>
  $("#produk").addClass("active");
</script>
@endsection
