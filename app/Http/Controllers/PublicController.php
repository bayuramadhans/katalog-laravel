<?php

namespace App\Http\Controllers;

use App\User;
use App\Konsumen;
use App\IsiKeranjang;
use App\Produk;
use App\Ukuran;
use App\Warna;
use App\Stok;
use App\FotoProduk;
use App\Kategori;
use Redirect;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $produk = Produk::with('idProdukFotoProduk')->get();
        return view ('public.index',compact('produk'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $cart = session()->get('cart');
        $save_cust = new Konsumen;
        $save_cust->nama = $request->nama;
        $save_cust->email = $request->email;
        $save_cust->no_telp = $request->no_telp;
        $save_cust->alamat = $request->alamat;
        $save_cust->kota = $request->kota;
        $save_cust->provinsi = $request->provinsi;
        $save_cust->kode_pos = $request->kode_pos;
        $save_cust->save();
        foreach(session('cart') as $id => $details){
          $save_keranjang = new IsiKeranjang;
          $save_keranjang->id_konsumen = $save_cust->id;
          $save_keranjang->id_stok = $details['id_stok'];
          $save_keranjang->jumlah = $details['jumlah'];
          $save_keranjang->total_harga = $details['total_harga'];
        }
        $request->session()->flush();
        return redirect()->route('public.index')->with('success', 'Proses checkout berhasil, terima kasih atass kepercayaan anda');
    }
    public function checkout()
    {
        return view('public.checkout');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $stok = Stok::with('idProdukStok.idProdukFotoProduk','idWarnaStok','idUkuranStok')->where('id',$request->id_stok)->first();
      if(!$stok) {
          abort(404);
      }
      $total_harga = $request->harga*$request->jumlah;
      $cart = session()->get('cart');
      // if cart is empty then this the first product
      if(!$cart) {
          $cart = [
            $stok->id => [
                      "nama" => $stok->idProdukStok->nama,
                      "ukuran" => $stok->idUkuranStok->nama,
                      "warna" => $stok->idWarnaStok->nama,
                      "harga"=> $request->harga,
                      "total_harga"=> $total_harga,
                      "hex" => $stok->idWarnaStok->hex,
                      "jumlah" => $request->jumlah,
                      "foto" => $stok->idProdukStok->idProdukFotoProduk[0]->file_url,
                      "id_stok" => $request->id_stok
                  ]
          ];

          session()->put('cart', $cart);

          return redirect()->back()->with('success', 'Produk berhasil ditambahkan ke keranjang!');
      }

      // if cart not empty then check if this product exist then increment quantity
      if(isset($cart[$stok->id])) {
          $cart[$stok->id]['jumlah']=$request->jumlah;
          session()->put('cart', $cart);
          return redirect()->back()->with('success', 'Produk berhasil ditambahkan ke keranjang!');

      }

      // if item not exist in cart then add to cart with quantity = 1
      $cart[$stok->id] = [
        "nama" => $stok->idProdukStok->nama,
        "ukuran" => $stok->idUkuranStok->nama,
        "warna" => $stok->idWarnaStok->nama,
        "hex" => $stok->idWarnaStok->hex,
        "harga"=> $request->harga,
        "total_harga"=> $total_harga,
        "jumlah" => $request->jumlah,
        "foto" => $stok->idProdukStok->idProdukFotoProduk[0]->file_url,
        "id_stok" => $request->id_stok
      ];
      session()->put('cart', $cart);
      return redirect()->back()->with('success', 'Produk berhasil ditambahkan ke keranjang!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $produk = Produk::with('idProdukStok.idWarnaStok','idProdukStok.idUkuranStok','idProdukFotoProduk')->where('id',$id)->first();
        // dd($produk);
        return view('public.produk',compact('produk'));
    }
    public function keranjang()
    {
        return view('public.bag');
    }
    public function flushSession(Request $request)
    {
        $request->session()->flush();
        return redirect('/');
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
