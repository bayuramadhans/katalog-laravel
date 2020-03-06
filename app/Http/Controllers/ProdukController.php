<?php

namespace App\Http\Controllers;

use Auth;
use File;
use App\User;
use App\Kategori;
use App\Ukuran;
use App\Warna;
use App\Stok;
use App\Produk;
use App\FotoProduk;
use Redirect;
use App\ProfileData;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image as Image;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      //check user
      $id_user = Auth::id();
      $produk = Produk::with('IdProdukFotoProduk')->get();
      return view('admin.produk.index',compact('produk'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      //check user
      $id_user = Auth::id();
      $kategori = Kategori::all();
      $ukuran = Ukuran::all();
      $warna = Warna::all();
      if((count($kategori)!=0)&&(count($ukuran)!=0)&&(count($warna)!=0)){
          return view('admin.produk.create',compact('kategori','ukuran','warna'));
      }else{
          return redirect()->route('admin.produk.index')->with(['fail' => 'kategori, ukuran, atau warna belum ada, mohon buat terlebih dahulu']);
      }

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      // dd($request);
      //check user
      $id_user = Auth::id();

      //upload Produk
      $save_produk = new Produk;
      $save_produk->nama = $request->nama;
      $save_produk->id_kategori = $request->kategori;
      $save_produk->deskripsi = $request->deskripsi;
      $save_produk->harga = $request->harga;
      $save_produk->harga_diskon = $request->harga_diskon;
      if ($request->status_diskon==null) {
          $save_produk->status_diskon = 0;
      }else{
          $save_produk->status_diskon = $request->status_diskon;
      }
      $save_produk->status_jual = $request->status_jual;
      $save_produk->save();

      //upload Stok
      for ($i=0; $i <count($request->stok) ; $i++) {
        $save_stok = new Stok;
        $save_stok->id_produk = $save_produk->id;
        $save_stok->id_ukuran = $request->ukuran[$i];
        $save_stok->id_warna = $request->warna[$i];
        $save_stok->stok = $request->stok[$i];
        $save_stok->save();
      }
      //upload Foto
      if($request->hasFile('image')){
        //membuat path storage foto
        $path = '/foto/produk/'.$save_produk->id;
        //proses cek direktori
        if(!Storage::disk('produk')->exists($path)){
          Storage::disk('produk')->makeDirectory($path);
        }
        foreach ($request->file('image') as $attachment) {
          $filename = $request->nama.rand().'.'.$attachment->getClientOriginalExtension();
          $attachment->storeAs($path,$filename,'produk');
          // Storage::disk('certificate')->put($filename,$attachment);
          $file_url = $path.'/'.$filename;
          $mime = $attachment->getClientOriginalExtension();
          FotoProduk::create([
            'id_produk' => $save_produk->id,
            'file_name' => $attachment->getClientOriginalName(),
            'file_url' => $file_url,
            'mime_type' => $mime,
          ]);
        }
      }
      return redirect()->route('admin.produk.index')->with(['success' => 'Produk Berhasil Ditambahkan']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      //check user
      $id_user = Auth::id();
      $kategori = Kategori::all();
      $ukuran = Ukuran::all();
      $warna = Warna::all();
      $stok = Stok::where('id_produk',$id)->get();
      $produk = Produk::where('id',$id)->first();
      $foto = FotoProduk::where('id_produk',$id)->get();
      return view('admin.produk.edit',compact('kategori','ukuran','warna','stok','produk','foto'));
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
      //check user
      $id_user = Auth::id();

      //upload Produk
      $save_produk = Produk::find($id);
      $save_produk->nama = $request->nama;
      $save_produk->id_kategori = $request->kategori;
      $save_produk->deskripsi = $request->deskripsi;
      $save_produk->harga = $request->harga;
      $save_produk->harga_diskon = $request->harga_diskon;
      if ($request->status_diskon==null) {
          $save_produk->status_diskon = 0;
      }else{
          $save_produk->status_diskon = $request->status_diskon;
      }
      $save_produk->status_jual = $request->status_jual;
      $save_produk->save();

      //upload Stok
      $stok = Stok::where('id_produk',$id)->delete();
      for ($i=0; $i <count($request->stok) ; $i++) {
        $save_stok = new Stok;
        $save_stok->id_produk = $save_produk->id;
        $save_stok->id_ukuran = $request->ukuran[$i];
        $save_stok->id_warna = $request->warna[$i];
        $save_stok->stok = $request->stok[$i];
        $save_stok->save();
      }
      //upload Foto
      if($request->hasFile('image')){
        //membuat path storage foto
        $path = '/foto/produk/'.$save_produk->id;
        //proses cek direktori
        if(!Storage::disk('produk')->exists($path)){
          Storage::disk('produk')->makeDirectory($path);
        }
        foreach ($request->file('image') as $attachment) {
          $filename = $request->nama.rand().'.'.$attachment->getClientOriginalExtension();
          $attachment->storeAs($path,$filename,'produk');
          // Storage::disk('certificate')->put($filename,$attachment);
          $file_url = $path.'/'.$filename;
          $mime = $attachment->getClientOriginalExtension();
          FotoProduk::create([
            'id_produk' => $save_produk->id,
            'file_name' => $attachment->getClientOriginalName(),
            'file_url' => $file_url,
            'mime_type' => $mime,
          ]);
        }
      }
      return redirect()->route('admin.produk.index')->with(['success' => 'Produk Berhasil Diperbarui']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      //check user
      $id_user = Auth::id();
      //delete Stok
      $stok = Stok::where('id_produk',$id)->delete();
      //delete Stok
      $produk = Produk::where('id',$id)->delete();
      return redirect()->route('admin.produk.index')->with(['success' => 'Produk Berhasil Dihapus']);
    }
    public function destroyFoto($id_foto)
    {
      //check user
      $id_user = Auth::id();
      //hapus
      $get_foto = FotoProduk::find($id_foto);
      $id_produk = $get_foto->id_produk;
      $path = $get_foto->file_url;  // Value is not URL but directory file path
      if(Storage::disk('produk')->exists($path)) {
          Storage::disk('produk')->delete($path);
      }
      //hapus direktori
      $get_foto->delete();
      return redirect()->route('admin.produk.edit',['id'=>$id_produk])->with(['success' => 'Foto berhasil dihapus']);
    }
}
