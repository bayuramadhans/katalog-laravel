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
            <a href="{{route('admin.ukuran.index')}}">
              <i class="material-icons white-text">arrow_back</i>
            </a>
          </div>
          <div class="col-md-11">
            <h4 class="card-title">Edit Ukuran</h4>
            <p class="card-category"> Berikut form untuk mengedit ukuran</p>
          </div>
        </div>
      </div>
      <div class="card-body">
        <form action="{{ route('admin.ukuran.update',['id'=>$ukuran->id]) }}" method="post" enctype="multipart/form-data">
          {{ csrf_field() }}
          <div class="form-group">
            <label for="nama">Nama Ukuran</label>
            <input type="text" name="nama" class="form-control" id="nama" value="{{$ukuran->nama}}">
          </div>
          <div align="right">
              <button class="btn btn-primary btn-round" type="submit">
                Perbarui Ukuran
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
  $("#ukuran").addClass("active");
</script>
@endsection
