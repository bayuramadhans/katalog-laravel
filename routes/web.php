<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/clear-cache', function() {
    Artisan::call('cache:clear');
    return response()->json('cache-clear');
});
Route::get('/config-cache', function() {
    Artisan::call('config:cache');
    return response()->json('config-clear');
});
Route::get('/test-mail', 'MailController@test');

//routing Umum
Route::get('/', 'PublicController@index')->name('public.index');
Route::get('/kategori/{id}', 'PublicController@indexKategori')->name('public.kategori');
Route::get('/produk/{id}', 'PublicController@show')->name('public.produk');
Route::post('/tambah','PublicController@store')->name('public.store');
Route::get('/keranjang','PublicController@keranjang')->name('public.keranjang');
Route::get('/checkout','PublicController@checkout')->name('public.checkout');
Route::post('/checkout','PublicController@create')->name('public.create');
Route::get('/flush','PublicController@flushSession')->name('public.flush');

Route::get('/login', 'UserController@login')->name('login');
Route::post('/login', 'UserController@loginProcess')->name('login.submit');
//
// Route::get('/daftar', 'UserController@createPublic')->name('public.create');
// Route::get('/daftar', 'UserController@storePublic')->name('public.store');
//
// //routing admin
Route::group(['prefix' => 'admin','middleware' => 'auth:admin'], function () {
//     //halaman admin
    Route::get('/admin', 'UserController@indexAdmin')->name('admin.index');
    Route::get('/logout', 'UserController@logoutAdmin')->name('admin.logout');
//     //data produk
    Route::group(['prefix' => 'produk'], function () {
      Route::get('/', 'ProdukController@index')->name('admin.produk.index');
      Route::get('/buat', 'ProdukController@create')->name('admin.produk.create');
      Route::post('/buat', 'ProdukController@store')->name('admin.produk.store');
      Route::get('/{id}', 'ProdukController@show')->name('admin.produk.show');
      Route::get('/update/{id}', 'ProdukController@edit')->name('admin.produk.edit');
      Route::post('/update/{id}', 'ProdukController@update')->name('admin.produk.update');
      Route::post('/hapus/{id}', 'ProdukController@destroy')->name('admin.produk.destroy');
    });
    //data foto produk
    Route::group(['prefix' => 'foto'], function () {
      Route::post('/hapus/{id_foto}', 'ProdukController@destroyFoto')->name('admin.foto.destroy');
    });
    //data kategori produk
    Route::group(['prefix' => 'kategori'], function () {
      Route::get('/', 'KategoriController@index')->name('admin.kategori.index');
      Route::get('/buat', 'KategoriController@create')->name('admin.kategori.create');
      Route::post('/buat', 'KategoriController@store')->name('admin.kategori.store');
      Route::get('/{id}', 'KategoriController@show')->name('admin.kategori.show');
      Route::get('/update/{id}', 'KategoriController@edit')->name('admin.kategori.edit');
      Route::post('/update/{id}', 'KategoriController@update')->name('admin.kategori.update');
      Route::post('/hapus/{id}', 'KategoriController@destroy')->name('admin.kategori.destroy');
    });
    //data ukuran produk
    Route::group(['prefix' => 'ukuran'], function () {
      Route::get('/', 'UkuranController@index')->name('admin.ukuran.index');
      Route::get('/buat', 'UkuranController@create')->name('admin.ukuran.create');
      Route::post('/buat', 'UkuranController@store')->name('admin.ukuran.store');
      Route::get('/{id}', 'UkuranController@show')->name('admin.ukuran.show');
      Route::get('/update/{id}', 'UkuranController@edit')->name('admin.ukuran.edit');
      Route::post('/update/{id}', 'UkuranController@update')->name('admin.ukuran.update');
      Route::post('/hapus/{id}', 'UkuranController@destroy')->name('admin.ukuran.destroy');
    });
    //data warna produk
    Route::group(['prefix' => 'warna'], function () {
      Route::get('/', 'WarnaController@index')->name('admin.warna.index');
      Route::get('/buat', 'WarnaController@create')->name('admin.warna.create');
      Route::post('/buat', 'WarnaController@store')->name('admin.warna.store');
      Route::get('/{id}', 'WarnaController@show')->name('admin.warna.show');
      Route::get('/update/{id}', 'WarnaController@edit')->name('admin.warna.edit');
      Route::post('/update/{id}', 'WarnaController@update')->name('admin.warna.update');
      Route::post('/hapus/{id}', 'WarnaController@destroy')->name('admin.warna.destroy');
    });
    //data konsumen
    Route::group(['prefix' => 'konsumen'], function () {
      Route::get('/', 'KonsumenController@index')->name('admin.konsumen.index');
      Route::get('/buat', 'KonsumenController@create')->name('admin.konsumen.create');
      Route::post('/buat', 'KonsumenController@store')->name('admin.konsumen.store');
      Route::get('/{id}', 'KonsumenController@show')->name('admin.konsumen.show');
      Route::get('/update/{id}', 'KonsumenController@edit')->name('admin.konsumen.edit');
      Route::post('/update/{id}', 'KonsumenController@update')->name('admin.konsumen.update');
      Route::post('/hapus/{id}', 'KonsumenController@destroy')->name('admin.konsumen.destroy');
    });
});
//
// //routing konsumen
// Route::group(['prefix' => 'admin','middleware' => 'auth:admin'], function () {
//     //halaman admin
//     Route::get('/', 'DashboardController@indexAdmin')->name('admin.index');
//     Route::get('/logout', 'UserController@logoutAdmin')->name('admin.logout');
//     //data produk
//     Route::group(['prefix' => 'produk'], function () {
//       Route::get('/', 'ProdukController@index')->name('admin.produk.index');
//       // Route::get('/buat', 'ProdukController@create')->name('admin.produk.create');
//       // Route::post('/buat', 'ProdukController@store')->name('admin.produk.store');
//       Route::get('/{id}', 'ProdukController@show')->name('admin.produk.show');
//       // Route::get('/update/{id}', 'ProdukController@edit')->name('admin.produk.edit');
//       // Route::post('/update/{id}', 'ProdukController@update')->name('admin.produk.update');
//       // Route::post('/hapus', 'ProdukController@destroy')->name('admin.produk.destroy');
//       //data stok
//       // Route::group(['prefix' => '{{id_produk}}/stok'], function () {
//       //   Route::get('/', 'StokController@index')->name('admin.stok.index');
//       //   Route::get('/buat', 'StokController@create')->name('admin.stok.create');
//       //   Route::post('/buat', 'StokController@store')->name('admin.stok.store');
//       //   Route::get('/{id}', 'StokController@show')->name('admin.stok.show');
//       //   Route::get('/update/{id}', 'StokController@edit')->name('admin.stok.edit');
//       //   Route::post('/update/{id}', 'StokController@update')->name('admin.stok.update');
//       //   Route::post('/hapus', 'StokController@destroy')->name('admin.stok.destroy');
//       // });
//     });
//     //data kategori produk
//     Route::group(['prefix' => 'kategori'], function () {
//       // Route::get('/', 'KategoriController@index')->name('admin.kategori.index');
//       // Route::get('/buat', 'KategoriController@create')->name('admin.kategori.create');
//       // Route::post('/buat', 'KategoriController@store')->name('admin.kategori.store');
//       Route::get('/{id}', 'KategoriController@show')->name('admin.kategori.show');
//       // Route::get('/update/{id}', 'KategoriController@edit')->name('admin.kategori.edit');
//       // Route::post('/update/{id}', 'KategoriController@update')->name('admin.kategori.update');
//       // Route::post('/hapus', 'KategoriController@destroy')->name('admin.kategori.destroy');
//     });
//     //data konsumen
//     Route::group(['prefix' => 'konsumen'], function () {
//       Route::get('/', 'KonsumenController@index')->name('admin.konsumen.index');
//       // Route::get('/buat', 'KonsumenController@create')->name('admin.konsumen.create');
//       // Route::post('/buat', 'KonsumenController@store')->name('admin.konsumen.store');
//       Route::get('/{id}', 'KonsumenController@show')->name('admin.konsumen.show');
//       Route::get('/update/{id}', 'KonsumenController@edit')->name('admin.konsumen.edit');
//       Route::post('/update/{id}', 'KonsumenController@update')->name('admin.konsumen.update');
//       // Route::post('/hapus', 'KonsumenController@destroy')->name('admin.konsumen.destroy');
//       //data keranjang
//       Route::group(['prefix' => '{id_konsumen}/keranjang'], function () {
//         Route::get('/', 'KeranjangController@index')->name('konsumen.keranjang.index');
//         // Route::get('/{id}', 'KeranjangController@show')->name('admin.keranjang.show');
//         Route::post('/hapus', 'DetailKeranjangController@destroy')->name('konsumen.keranjang.destroy');
//       });
//       //data keranjang
//       Route::group(['prefix' => '{id_konsumen}/wishlist'], function () {
//         Route::get('/', 'WishlistController@index')->name('admin.wishlist.index');
//         Route::get('/buat', 'WishlistController@create')->name('admin.wishlist.create');
//         Route::post('/buat', 'WishlistController@store')->name('admin.wishlist.store');
//         Route::get('/{id}', 'WishlistController@show')->name('admin.wishlist.show');
//         Route::post('/hapus', 'WishlistController@destroy')->name('admin.wishlist.destroy');
//       });
//     });
// });
