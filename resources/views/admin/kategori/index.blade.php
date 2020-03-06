@extends('admin.layout')
@section('style')
@endsection
@section('content')
<div class="row">
  <div class="col-md-6">
    <div class="card">
      <div class="card-header card-header-primary">
        <h4 class="card-title ">Kategori</h4>
        <p class="card-category"> Berikut adalah list kategori dalam katalog</p>
      </div>
      <div class="card-body">
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
        <a href="{{route('admin.kategori.create')}}">
          <button class="btn btn-primary btn-round">
            <i class="material-icons">add</i> Tambah Kategori
          </button>
        </a>
        <div class="table-responsive">
          <table class="table">
            <thead class=" text-primary">
              <th>No</th>
              <th>Nama Kategori</th>
              <th>Aksi</th>
            </thead>
            <tbody>
              @for($i=0;$i<count($kategori);$i++)
              <tr>
                <td>
                  {{$i+1}}
                </td>
                <td>
                  {{$kategori[$i]->nama}}
                </td>
                <td>
                  <div class="row" style="width:100px;">
                    <div class="col-6">
                      <form id="delete{{$i}}" action="{{route('admin.kategori.destroy',['id' => $kategori[$i]->id])}}" method="post">
                            {{ csrf_field() }}
                          <button type="submit" class="btn btn-primary btn-link no-margin no-padding" form="delete{{$i}}">
                              <i class="material-icons">delete_forever</i>
                          </button>
                      </form>
                    </div>
                    <div class="col-6">
                      <a href="{{route('admin.kategori.edit',['id'=>$kategori[$i]->id])}}">
                        <button class="btn btn-primary btn-link no-margin no-padding">
                        <i class="material-icons">edit</i>
                        </button>
                      </a>
                    </div>
                  </div>
                </td>
              </tr>
              @endfor
            </tbody>
          </table>
          @if(count($kategori)==0)
            <div align="center">
              <p>Kategori belum ada</p>
            </div>
          @endif
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
@section('script')
<script>
  $("#kategori").addClass("active");
</script>
@endsection
