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
<div class="row">
  <div class="alert alert-success alert-dismissible fade show" role="alert" style="width:100%; position:relative;">
    <strong>Berhasil!</strong> {{ $message }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
</div>
@endif
<div class="site-blocks-cover" data-aos="fade">
  <div class="container">
    <div class="row">
      <div class="col-md-6 ml-auto order-md-2 align-self-start">
        <div class="site-block-cover-content">
        <h2 class="sub-title">Brand Online Catalog</h2>
        <h1>Arrivals Sales</h1>
        <h2 class="sub-title">#BelanjaSampaiPuas</h2>
        </div>
      </div>
      <div class="col-md-6 order-1 align-self-end">
        <img src="{{asset('shopmax/images/utama.png')}}" alt="Image" class="img-fluid" style="padding-bottom:15vh;">
      </div>
    </div>
  </div>
</div>

<!-- <div class="site-section">
  <div class="container">
    <div class="title-section mb-5">
      <h2 class="text-uppercase"><span class="d-block">Discover</span> The Collections</h2>
    </div>
    <div class="row align-items-stretch">
      <div class="col-lg-8">
        <div class="product-item sm-height full-height bg-gray">
          <a href="#" class="product-category">Women <span>25 items</span></a>
          <img src="images/model_4.png" alt="Image" class="img-fluid">
        </div>
      </div>
      <div class="col-lg-4">
        <div class="product-item sm-height bg-gray mb-4">
          <a href="#" class="product-category">Men <span>25 items</span></a>
          <img src="images/model_5.png" alt="Image" class="img-fluid">
        </div>

        <div class="product-item sm-height bg-gray">
          <a href="#" class="product-category">Shoes <span>25 items</span></a>
          <img src="images/model_6.png" alt="Image" class="img-fluid">
        </div>
      </div>
    </div>
  </div>
</div> -->



<div class="site-section">
  <div class="container">
    <div class="row">
      <div class="title-section mb-5">
        <h2 class="text-uppercase"><span class="d-block">Jelajah</span> Seluruh Produk</h2>
      </div>
    </div>
    <div class="row">
      <div class="col-12">
        <div class="input-group mb-3">
          <input type="text"id="searchInput" onkeyup="searchFunction()" class="form-control" placeholder="Cari produk..." aria-label="Recipient's username" aria-describedby="button-addon2">
          <div class="input-group-append">
            <button class="btn btn-outline-secondary" type="button" id="button-addon2">
              <span class="icon-search"></span>
            </button>
          </div>
        </div>
      </div>
    </div>
    <div id="produk" class="row">
      @for($i=0;$i<count($produk);$i++)
        @if($produk[$i]->status_jual!=0)
        <div class="list col-lg-4 col-md-6 item-entry mb-4">
          <a href="{{route('public.produk',['id'=>$produk[$i]->id])}}" class="product-item md-height bg-white d-block no-padding">
            <img src="{{asset($produk[$i]->idProdukFotoProduk[0]->file_url)}}" alt="Image" class="img-fluid">
          </a>
          <h2 class="item-title">{{$produk[$i]->nama}}</h2>
          @if($produk[$i]->status_diskon==0)
            <strong class="item-price">Rp {{$produk[$i]->harga}}</strong>
          @else
            <strong class="item-price"><del>Rp {{$produk[$i]->harga}}</del> Rp {{$produk[$i]->harga_diskon}}</strong>
          @endif
        </div>
        @endif
      @endfor
    </div>
  </div>
</div>

<!-- <div class="site-section">
  <div class="container">
    <div class="row">
      <div class="title-section text-center mb-5 col-12">
        <h2 class="text-uppercase">Most Rated</h2>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12 block-3">
        <div class="nonloop-block-3 owl-carousel">
          <div class="item">
            <div class="item-entry">
              <a href="#" class="product-item md-height bg-gray d-block">
                <img src="images/model_1.png" alt="Image" class="img-fluid">
              </a>
              <h2 class="item-title"><a href="#">Smooth Cloth</a></h2>
              <strong class="item-price"><del>$46.00</del> $28.00</strong>
              <div class="star-rating">
                <span class="icon-star2 text-warning"></span>
                <span class="icon-star2 text-warning"></span>
                <span class="icon-star2 text-warning"></span>
                <span class="icon-star2 text-warning"></span>
                <span class="icon-star2 text-warning"></span>
              </div>
            </div>
          </div>
          <div class="item">
            <div class="item-entry">
              <a href="#" class="product-item md-height bg-gray d-block">
                <img src="images/prod_3.png" alt="Image" class="img-fluid">
              </a>
              <h2 class="item-title"><a href="#">Blue Shoe High Heels</a></h2>
              <strong class="item-price"><del>$46.00</del> $28.00</strong>

              <div class="star-rating">
                <span class="icon-star2 text-warning"></span>
                <span class="icon-star2 text-warning"></span>
                <span class="icon-star2 text-warning"></span>
                <span class="icon-star2 text-warning"></span>
                <span class="icon-star2 text-warning"></span>
              </div>
            </div>
          </div>
          <div class="item">
            <div class="item-entry">
              <a href="#" class="product-item md-height bg-gray d-block">
                <img src="images/model_5.png" alt="Image" class="img-fluid">
              </a>
              <h2 class="item-title"><a href="#">Denim Jacket</a></h2>
              <strong class="item-price"><del>$46.00</del> $28.00</strong>

              <div class="star-rating">
                <span class="icon-star2 text-warning"></span>
                <span class="icon-star2 text-warning"></span>
                <span class="icon-star2 text-warning"></span>
                <span class="icon-star2 text-warning"></span>
                <span class="icon-star2 text-warning"></span>
              </div>

            </div>
          </div>
          <div class="item">
            <div class="item-entry">
              <a href="#" class="product-item md-height bg-gray d-block">
                <img src="images/prod_1.png" alt="Image" class="img-fluid">
              </a>
              <h2 class="item-title"><a href="#">Leather Green Bag</a></h2>
              <strong class="item-price"><del>$46.00</del> $28.00</strong>
              <div class="star-rating">
                <span class="icon-star2 text-warning"></span>
                <span class="icon-star2 text-warning"></span>
                <span class="icon-star2 text-warning"></span>
                <span class="icon-star2 text-warning"></span>
                <span class="icon-star2 text-warning"></span>
              </div>
            </div>
          </div>
          <div class="item">
            <div class="item-entry">
              <a href="#" class="product-item md-height bg-gray d-block">
                <img src="images/model_7.png" alt="Image" class="img-fluid">
              </a>
              <h2 class="item-title"><a href="#">Yellow Jacket</a></h2>
              <strong class="item-price">$58.00</strong>
              <div class="star-rating">
                <span class="icon-star2 text-warning"></span>
                <span class="icon-star2 text-warning"></span>
                <span class="icon-star2 text-warning"></span>
                <span class="icon-star2 text-warning"></span>
                <span class="icon-star2 text-warning"></span>
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>
  </div>
</div> -->


<div class="site-blocks-cover inner-page py-5" data-aos="fade">
  <div class="container">
    <div class="row">
      <div class="col-md-6 ml-auto order-md-2 align-self-start">
        <div class="site-block-cover-content">
          <h2 class="sub-title">#BelanjaSampaiTua</h2>
          <h1>Belanja Sampai Puas</h1>
        </div>
      </div>
      <div class="col-md-6 order-1 align-self-end">
        <img src="{{asset('shopmax/images/model_6.png')}}" alt="Image" class="img-fluid">
      </div>
    </div>
  </div>
</div>
@endsection
@section('script')
<script>
function searchFunction() {
  var input, filter, ul, li, a, b, i, txtValue1,txtValue2;
  input = document.getElementById("searchInput");
  filter = input.value.toUpperCase();
  ul = document.getElementById("produk");
  li = ul.getElementsByClassName("list");
  for (i = 0; i < li.length; i++) {
    a = li[i].getElementsByTagName("h2")[0];
      txtValue1 = a.textContent || a.innerText;
      b = li[i].getElementsByTagName("strong")[0];
      txtValue2 = b.textContent || b.innerText;
      if ((txtValue1.toUpperCase().indexOf(filter) > -1)&&(txtValue2.toUpperCase().indexOf(filter) > -1)) {
          li[i].style.display = "";
      } else {
          li[i].style.display = "none";
      }
  }
  }
</script>
@endsection
