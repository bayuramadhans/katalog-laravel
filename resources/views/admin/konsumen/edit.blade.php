@extends('admin.layout')
@section('style')
@endsection
@section('content')
<div class="row">
  <div class="col-md-6">
    <div class="card">
      <div class="card-header card-header-primary">
        <div class="row container">
          <div class="col-md-1">
            <a href="{{route('admin.kategori.index')}}">
              <i class="material-icons white-text">arrow_back</i>
            </a>
          </div>
          <div class="col-md-11">
            <h4 class="card-title">Edit Kategori</h4>
            <p class="card-category"> Berikut form untuk membuat kategori baru</p>
          </div>
        </div>
      </div>
      <div class="card-body">
        <form action="{{ route('admin.kategori.update',['id'=>$kategori->id]) }}" method="post" enctype="multipart/form-data">
          {{ csrf_field() }}
          <div class="form-group">
            <label for="nama">Nama Kategori</label>
            <input type="text" name="nama" class="form-control" id="nama" value="{{$kategori->nama}}">
          </div>
          <div align="right">
              <button class="btn btn-primary btn-round" type="submit">
                Perbarui Kategori
              </button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
@section('script')
<script>
  $("#produk").addClass("active");
</script>
@endsection
