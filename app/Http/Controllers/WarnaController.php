<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use App\Warna;
use Redirect;
use App\ProfileData;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Password;
use Intervention\Image\Facades\Image as Image;

class WarnaController extends Controller
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
        $warna = Warna::all();
        return view('admin.warna.index', compact('warna'));
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
        return view('admin.warna.create');
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
        $save_warna = new Warna;
        $save_warna->nama = $request->nama;
        $save_warna->hex = $request->hex;
        $save_warna->save();
        return redirect()->route('admin.warna.index')->with(['success' => 'Warna Berhasil Dibuat']);
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
        $warna = Warna::where('id', $id)->first();
        return view('admin.warna.edit', compact('warna'));
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
        $save_warna = Warna::find($id);
        $save_warna->nama = $request->nama;
        $save_warna->hex = $request->hex;
        $save_warna->save();
        return redirect()->route('admin.warna.index')->with(['success' => 'Warna berhasil diperbarui']);
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
        $save_warna = Warna::find($id);
        $save_warna->delete();
        return redirect()->route('admin.warna.index')->with(['success' => 'Warna berhasil dihapus']);
    }
}
