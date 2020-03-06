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
            <a href="{{route('admin.warna.index')}}">
              <i class="material-icons white-text">arrow_back</i>
            </a>
          </div>
          <div class="col-md-11">
            <h4 class="card-title">Edit Warna</h4>
            <p class="card-category"> Berikut form untuk mengedit warna</p>
          </div>
        </div>
      </div>
      <div class="card-body">
        <form action="{{ route('admin.warna.update',['id'=>$warna->id]) }}" method="post" enctype="multipart/form-data">
          {{ csrf_field() }}
          <div class="form-group">
            <label for="nama">Nama Warna</label>
            <input type="text" name="nama" class="form-control" id="nama" value="{{$warna->nama}}">
          </div>
          <div class="form-group">
            <div class="row container">
              <canvas id="picker"></canvas>
            </div>
          </div>
          <div class="form-group">
            <input id="color" type="text" name="hex" class="form-control" value="{{$warna->hex}}">
          </div>
          <div align="right">
              <button class="btn btn-primary btn-round" type="submit">
                Perbarui warna
              </button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
@section('script')
<script src="{{asset('color-picker/html5kellycolorpicker.min.js')}}" type="text/javascript"></script>
<script>
  $("#warna").addClass("active");
  new KellyColorPicker({place : 'picker', input : 'color', size : 150});
</script>
@endsection
