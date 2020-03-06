@extends('admin.layout')
@section('style')
<link type="text/css" rel="stylesheet" href="{{asset('image-uploader/dist/image-uploader.min.css')}}">
<style>
  #image-preview{
    display:none;
    width : 250px;
    height : 300px;
  }
</style>
@endsection
@section('content')
<div class="row">
  <div class="col-md-6">
    <div class="card">
      <div class="card-header card-header-primary">
        <div class="row container">
          <div class="col-md-1">
            <a href="{{route('admin.produk.index')}}">
              <i class="material-icons white-text">arrow_back</i>
            </a>
          </div>
          <div class="col-md-11">
            <h4 class="card-title">Tambah Produk</h4>
            <p class="card-category"> Berikut form untuk menambah produk baru</p>
          </div>
        </div>
      </div>
      <div class="card-body">
        <form action="{{ route('admin.produk.store') }}" method="post" enctype="multipart/form-data">
          {{ csrf_field() }}
          <div class="form-group margin-top">
            <label for="nama">Nama Produk</label>
            <input type="text" name="nama" class="form-control" id="nama" required>
          </div>
          <div class="form-group margin-top">
            <label for="kategori">Kategori Produk</label>
            <select name="kategori" class="form-control" data-style="btn btn-link" id="kategori">
              <option selected disabled>--pilih salah satu--</option>
              @for($i=0;$i<count($kategori);$i++)
              <option value="{{$kategori[$i]->id}}">{{$kategori[$i]->nama}}</option>
              @endfor
            </select>
          </div>
          <div class="form-group margin-top">
            <label for="deskripsi">Deskripsi</label>
            <textarea class="form-control" id="deskripsi" rows="3" name="deskripsi"></textarea>
          </div>
          <div class="form-group margin-top">
            <label for="nama">Harga</label>
            <input type="text" name="harga" class="form-control" id="nama">
          </div>
          <div class="form-group margin-top">
            <label for="nama">Harga Diskon (opsional)</label>
            <input type="text" name="harga_diskon" class="form-control" id="nama">
          </div>
          <div class="form-check">
              <label class="form-check-label">
                  <input class="form-check-input" name="status_diskon" type="checkbox" value="1"> Aktifkan Diskon
                  <span class="form-check-sign">
                      <span class="check"></span>
                  </span>
              </label>
          </div>
          <div class="form-group margin-top">
            <label for="status_jual">Status Jual Produk</label>
            <select name="status_jual" class="form-control" data-style="btn btn-link" id="status_jual">
              <option selected disabled>--pilih salah satu--</option>
              <option value="1">Aktif</option>
              <option value="0">Tidak Aktif</option>
            </select>
          </div>
          <div class="row container margin-top">
            <p>Foto</p>
          </div>
          <!-- <div class="form-group form-file-upload form-file-multiple">
            <img id="image-preview" alt="image preview" />
            <input type="file" multiple name="attachment[]" class="inputFileHidden" id="my_file" onchange="previewImage();">
              <div class="input-group">
                <button type="button" class="btn btn-sm btn-primary btn-round" id="get_file">
                  <i class="material-icons">add</i> Tambah foto
                </button>
              </span>
            </div>
          </div> -->
          <div class="input-field">
              <div class="input-images-1" style="padding-top: .5rem;"></div>
          </div>
          <div class="row container margin-top" style="padding-top:20px;">
            <p>Stok</p>
          </div>
          @for($i=0;$i<count($warna);$i++)
            @for($j=0;$j<count($ukuran);$j++)
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text">
                    <i class="material-icons" style="color:{{$warna[$i]->hex}}">palette</i> &nbsp {{$warna[$i]->nama}} {{$ukuran[$j]->nama}}
                </span>
              </div>
              <input name="stok[]" type="text" class="form-control" value="0">
              <input name="warna[]" type="hidden" class="form-control" value="{{$warna[$i]->id}}">
              <input name="ukuran[]" type="hidden" class="form-control" value="{{$ukuran[$j]->id}}">
            </div>
            @endfor
          @endfor
          <div align="right">
              <button class="btn btn-primary btn-round" type="submit">
                Tambah Produk
              </button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
@section('script')
<script src="{{asset('image-uploader/dist/image-uploader.min.js')}}"></script>
<script>
  $("#produk").addClass("active");

  $('.input-images-1').imageUploader({
    imagesInputName: 'image',
  });

  document.getElementById('get_file').onclick = function() {
    document.getElementById('my_file').click();
  };

  function previewImage() {
    document.getElementById("image-preview").style.display = "block";
    var oFReader = new FileReader();
     oFReader.readAsDataURL(document.getElementById("my_file").files[0]);

    oFReader.onload = function(oFREvent) {
      document.getElementById("image-preview").src = oFREvent.target.result;
    };
  };
</script>
@endsection
