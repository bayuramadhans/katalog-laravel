<?php

namespace App\Http\Controllers;

use Auth;
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
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Password;
use Intervention\Image\Facades\Image as Image;

class UserController extends Controller
{
  public function login(){
    return view ('login');
  }
  public function logoutAdmin(){
    Auth::guard('admin')->logout();
    return redirect()->route('public.index');
  }
  public function loginProcess(Request $req){
        $message = [
            'email.required'    => 'email harus diisi',
            'email.email'   => 'format email tidak benar (example@example.com)',
            'password.required' => 'password harus diisi',
        ];
        $rules = [
            'email' => 'required|email',
            'password' => [
                'required',
            ],
        ];
        $validator = $this->validator($req->all(), $rules, $message);
        if ($validator->fails()){
            return Redirect::back()->withInput()->withErrors($validator);
        }

        $user = User::where('email', $req->email)->first();
        if (!empty($user)){
            if (Hash::check($req->password, $user->password)){
                Auth::guard('admin')->attempt(['email' => $req->email, 'password' => $req->password], $req->has('remember'));
                return redirect()->route('admin.index');
            } else {
                $errors = [
                    'password' => 'Email atau password yang anda masukan salah'
                ];
                return Redirect::back()->withInput()->withErrors($errors);
            }
        } else {
            $errors = [
                'password' => 'Email atau password yang anda masukan salah'
            ];
            return Redirect::back()->withInput()->withErrors($errors);
        }
    }
    public function validator($data, $rules, $message){
        return Validator::make($data, $rules, $message);
    }
    public function indexAdmin(){
        $total_produk = count(Produk::all());
        $total_konsumen = count(Konsumen::all());
        $total_produk_terjual = count(IsiKeranjang::all());
        return view('admin.dashboard',compact('total_produk','total_konsumen','total_produk_terjual'));
    }
}
