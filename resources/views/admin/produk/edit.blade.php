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
  <div class="col-md-12">
    <div class="card">
      <div class="card-header card-header-primary">
        <div class="row container">
          <div class="col-md-1">
            <a href="{{route('admin.produk.index')}}">
              <i class="material-icons white-text">arrow_back</i>
            </a>
          </div>
          <div class="col-md-11">
            <h4 class="card-title">Edit Produk</h4>
            <p class="card-category"> Berikut form untuk menambah produk baru</p>
          </div>
        </div>
      </div>
      <div class="card-body">
        <form action="{{ route('admin.produk.update',['id'=>$produk->id]) }}" method="post" enctype="multipart/form-data">
          {{ csrf_field() }}
          @if ($message = Session::get('success'))
          <div class="row container">
            <div class="alert alert-success alert-dismissible fade show" role="alert">
              <strong>Berhasil!</strong> {{ $message }}
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
          </div>
          @endif
          <div class="form-group">
            <label for="nama">Nama Produk</label>
            <input type="text" name="nama" class="form-control" id="nama" value="{{$produk->nama}}" required>
          </div>
          <div class="form-group">
            <label for="kategori">Kategori Produk</label>
            <select name="kategori" class="form-control" data-style="btn btn-link" id="kategori">
              @for($i=0;$i<count($kategori);$i++)
                @if($produk->id_kategori==$kategori[$i]->id)
                <option selected value="{{$kategori[$i]->id}}">{{$kategori[$i]->nama}}</option>
                @else
                <option value="{{$kategori[$i]->id}}">{{$kategori[$i]->nama}}</option>
                @endif
              @endfor
            </select>
          </div>
          <div class="form-group">
            <label for="deskripsi">Deskripsi</label>
            <textarea class="form-control" id="deskripsi" rows="3" name="deskripsi">{{$produk->deskripsi}}</textarea>
          </div>
          <div class="form-group">
            <label for="nama">Harga</label>
            <input type="text" name="harga" class="form-control" id="nama" value="{{$produk->harga}}">
          </div>
          <div class="form-group margin-top">
            <label for="nama">Harga Diskon (opsional)</label>
            <input type="text" name="harga_diskon" class="form-control" id="nama" value="{{$produk->harga_diskon}}">
          </div>
          <div class="form-check">
              <label class="form-check-label">
                  <input class="form-check-input" name="status_diskon" type="checkbox" value="1" @if($produk->status_diskon==1) checked @endif> Aktifkan Diskon
                  <span class="form-check-sign">
                      <span class="check"></span>
                  </span>
              </label>
          </div>
          <div class="form-group margin-top">
            <label for="status_jual">Status Jual Produk</label>
            <select name="status_jual" class="form-control" data-style="btn btn-link" id="status_jual">
              <option selected disabled>--pilih salah satu--</option>
              <option value="1" @if($produk->status_jual==1) selected @endif>Aktif</option>
              <option value="0" @if($produk->status_jual==0) selected @endif>Tidak Aktif</option>
            </select>
          </div>
          <div class="row container">
            <p>Foto</p>
          </div>
          <div class="row container">
            @for($i=0;$i<count($foto);$i++)
            <div class="col-3">
              <div class="card no-margin">
                <div class="card-body no-padding">
                  <img src="{{asset($foto[$i]->file_url)}}" alt="" style="width:100%; position:relative;">
                </div>
              </div>
              <div align="center">
                <button type="button" class="btn btn-sm btn-danger btn-round" data-toggle="modal" data-target="#delete-foto{{$i}}">
                  <i class="material-icons">close</i> hapus foto
                </button>
              </div>
            </div>
            @endfor
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
          <div class="row container" style="padding-top:20px;">
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
              <?php
                $status = false;
                for ($k=0; $k <count($stok) ; $k++) {
                  if(($stok[$k]->id_warna==$warna[$i]->id)&&($stok[$k]->id_ukuran==$ukuran[$j]->id)){
                    $status = true;
                    $stok_value = $stok[$k]->stok;
                  }
                }
               ?>
              @if($status==true)
                <input name="stok[]" type="text" class="form-control" value="{{$stok_value}}">
              @else
                <input name="stok[]" type="text" class="form-control" value="0">
              @endif
              <input name="warna[]" type="hidden" class="form-control" value="{{$warna[$i]->id}}">
              <input name="ukuran[]" type="hidden" class="form-control" value="{{$ukuran[$j]->id}}">
            </div>
            @endfor
          @endfor
          <div align="right">
              <button class="btn btn-primary btn-round" type="submit">
                Edit Produk
              </button>
          </div>
        </form>
        <!-- modal -->
        @for($i=0;$i<count($foto);$i++)
            <div class="modal fade" id="delete-foto{{$i}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-body">
                    <p>Anda yakin menghapus foto ini?</p>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <form id="delete{{$i}}" action="{{route('admin.foto.destroy',['id' => $foto[$i]->id])}}" method="post">
                          {{ csrf_field() }}
                        <button type="submit" value="Submit" form="delete{{$i}}" class="btn btn-danger">Hapus</button>
                    </form>
                  </div>
                </div>
              </div>
            </div>
        @endfor
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
