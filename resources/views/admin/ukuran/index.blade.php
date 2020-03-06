@extends('admin.layout')
@section('style')
@endsection
@section('content')
<div class="row">
  <div class="col-md-6">
    <div class="card">
      <div class="card-header card-header-primary">
        <h4 class="card-title ">Ukuran</h4>
        <p class="card-category"> Berikut adalah list ukuran dalam katalog</p>
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
        <a href="{{route('admin.ukuran.create')}}">
          <button class="btn btn-primary btn-round">
            <i class="material-icons">add</i> Tambah Ukuran
          </button>
        </a>
        <div class="table-responsive">
          <table class="table">
            <thead class=" text-primary">
              <th>No</th>
              <th>Nama Ukuran</th>
              <th>Aksi</th>
            </thead>
            <tbody>
              @for($i=0;$i<count($ukuran);$i++)
              <tr>
                <td>
                  {{$i+1}}
                </td>
                <td>
                  {{$ukuran[$i]->nama}}
                </td>
                <td>
                  <div class="row" style="width:100px;">
                    <div class="col-6">
                      <form id="delete{{$i}}" action="{{route('admin.ukuran.destroy',['id' => $ukuran[$i]->id])}}" method="post">
                            {{ csrf_field() }}
                          <button type="submit" class="btn btn-primary btn-link no-margin no-padding" form="delete{{$i}}">
                              <i class="material-icons">delete_forever</i>
                          </button>
                      </form>
                    </div>
                    <div class="col-6">
                      <a href="{{route('admin.ukuran.edit',['id'=>$ukuran[$i]->id])}}">
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
          @if(count($ukuran)==0)
            <div align="center">
              <p>Ukuran belum ada</p>
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
  $("#ukuran").addClass("active");
</script>
@endsection
