@extends('admin.layout')
@section('style')
@endsection
@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header card-header-primary">
        <h4 class="card-title">Konsumen</h4>
        <p class="card-category"> Berikut adalah list konsumen dalam katalog</p>
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
        <div class="table-responsive">
          <table class="table">
            <thead class=" text-primary">
              <th>No</th>
              <th>Nama Konsumen</th>
              <th>Alamat</th>
              <th>Kota</th>
              <th>Provinsi</th>
              <th>Kode Pos</th>
              <th>Kontak</th>
              <th>Aksi</th>
            </thead>
            <tbody>
              @for($i=0;$i<count($konsumen);$i++)
              <tr>
                <td>{{$i+1}}</td>
                <td>{{$konsumen[$i]->nama}}</td>
                <td>{{$konsumen[$i]->alamat}}</td>
                <td>{{$konsumen[$i]->kota}}</td>
                <td>{{$konsumen[$i]->provinsi}}</td>
                <td>{{$konsumen[$i]->kode_pos}}</td>
                <td>{{$konsumen[$i]->no_telp}}</td>
                <td>
                  <div class="row" style="width:100px;">
                    <div class="col-6">
                      <form id="delete{{$i}}" action="{{route('admin.konsumen.destroy',['id' => $konsumen[$i]->id])}}" method="post">
                            {{ csrf_field() }}
                          <button type="submit" class="btn btn-primary btn-link no-margin no-padding" form="delete{{$i}}">
                              <i class="material-icons">delete_forever</i>
                          </button>
                      </form>
                    </div>
                    <div class="col-6">
                      <button type="button" class="btn btn-primary btn-link no-margin no-padding" data-toggle="modal" data-target="#modal{{$i}}">
                          <i class="material-icons">content_paste</i>
                      </button>
                      <!-- Modal -->
                      <div class="modal fade" id="modal{{$i}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Detail Keranjang Konsumen</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                              <!-- start isi -->
                              <table class="table">
                                <thead class=" text-primary">
                                  <th>No</th>
                                  <th>Nama Produk</th>
                                  <th>Warna</th>
                                  <th>Ukuran</th>
                                  <th>Qty</th>
                                  <th>Subtotal</th>
                                </thead>
                                <tbody>
                                  @for($j=0;$j<count($konsumen[$i]->idKonsumenIsiKeranjang);$j++)
                                  <?php
                                    $get_warna;
                                    $get_ukuran;
                                    $get_foto_produk;
                                    for ($k=0; $k <count($warna) ; $k++) {
                                      if($konsumen[$i]->idKonsumenIsiKeranjang[$j]->IdStokIsiKeranjang->id_warna==$warna[$k]->id){
                                        $get_warna = $warna[$k]->nama;
                                        break;
                                      }
                                    }
                                    for ($k=0; $k <count($ukuran) ; $k++) {
                                      if($konsumen[$i]->idKonsumenIsiKeranjang[$j]->IdStokIsiKeranjang->id_ukuran==$ukuran[$k]->id){
                                        $get_ukuran = $ukuran[$k]->nama;
                                        break;
                                      }
                                    }
                                    ?>
                                  <tr>
                                    <td>{{$j+1}}</td>
                                    <td>{{$konsumen[$i]->idKonsumenIsiKeranjang[$j]->IdStokIsiKeranjang->idProdukStok->nama}}</td>
                                    <td>{{$get_warna}}</td>
                                    <td>{{$get_ukuran}}</td>
                                    <td>{{$konsumen[$i]->idKonsumenIsiKeranjang[$j]->jumlah}}</td>
                                    <td>{{$konsumen[$i]->idKonsumenIsiKeranjang[$j]->total_harga}}</td>
                                  </tr>
                                  @endfor
                                </tbody>
                              </table>
                              <!-- end isi -->
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-primary" data-dismiss="modal">Tutup</button>
                            </div>
                          </div>
                        </div>
                      </div>
                      <!-- end modal -->
                    </div>
                  </div>
                </td>
              </tr>
              @endfor
            </tbody>
          </table>
          @if(count($konsumen)==0)
            <div align="center">
              <p>Konsumen belum ada</p>
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
  $("#konsumen").addClass("active");
</script>
@endsection
