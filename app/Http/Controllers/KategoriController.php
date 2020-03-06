<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use App\Kategori;
use Redirect;
use App\ProfileData;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Password;
use Intervention\Image\Facades\Image as Image;

class KategoriController extends Controller
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
        $kategori = Kategori::all();
        return view('admin.kategori.index', compact('kategori'));
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
        return view('admin.kategori.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //check user
        $id_user = Auth::id();
        $save_kategori = new Kategori;
        $save_kategori->nama = $request->nama;
        $save_kategori->save();
        return redirect()->route('admin.kategori.index')->with(['success' => 'Kategori Berhasil Dibuat']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        $kategori = Kategori::where('id', $id)->first();
        return view('admin.kategori.edit', compact('kategori'));
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
        $save_kategori = Kategori::find($id);
        $save_kategori->nama = $request->nama;
        $save_kategori->save();
        return redirect()->route('admin.kategori.index')->with(['success' => 'Kategori berhasil diperbarui']);
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
        $save_kategori = Kategori::find($id);
        $save_kategori->delete();
        return redirect()->route('admin.kategori.index')->with(['success' => 'Kategori berhasil dihapus']);
    }
}
