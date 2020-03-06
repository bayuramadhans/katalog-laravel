<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use App\Ukuran;
use Redirect;
use App\ProfileData;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Password;
use Intervention\Image\Facades\Image as Image;

class UkuranController extends Controller
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
        $ukuran = Ukuran::all();
        return view('admin.ukuran.index', compact('ukuran'));
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
        return view('admin.ukuran.create');
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
        $save_ukuran = new Ukuran;
        $save_ukuran->nama = $request->nama;
        $save_ukuran->save();
        return redirect()->route('admin.ukuran.index')->with(['success' => 'Ukuran Berhasil Dibuat']);
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
        $ukuran = Ukuran::where('id', $id)->first();
        return view('admin.ukuran.edit', compact('ukuran'));
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
        $save_ukuran = Ukuran::find($id);
        $save_ukuran->nama = $request->nama;
        $save_ukuran->save();
        return redirect()->route('admin.ukuran.index')->with(['success' => 'Ukuran berhasil diperbarui']);
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
        $save_ukuran = Ukuran::find($id);
        $save_ukuran->delete();
        return redirect()->route('admin.ukuran.index')->with(['success' => 'Ukuran berhasil dihapus']);
    }
}
