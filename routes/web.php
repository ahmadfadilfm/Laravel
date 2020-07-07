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

Route::get('/', function () {
    return redirect('beranda');
});

Route::group(['middleware'=>'auth'],function(){

    Route::get('beranda','Beranda_controller@index');

    // master kategori
    Route::get('master/kategori','Kategori_controller@index');
    Route::get('master/kategori/add','Kategori_controller@add');
    Route::post('master/kategori/add','Kategori_controller@store');
    Route::get('master/kategori/{id}','Kategori_controller@edit');
    Route::put('master/kategori/{id}','Kategori_controller@update');
    Route::delete('master/kategori/{id}','Kategori_controller@delete');

    // master buku
    Route::get('master/buku','Buku_controller@index');
    Route::get('master/buku/kosong','Buku_controller@kosong');
    Route::get('master/buku/nonaktif','Buku_controller@nonaktif');
    Route::get('master/buku/add','Buku_controller@add');
    Route::post('master/buku/add','Buku_controller@store');
    Route::get('master/buku/{id}','Buku_controller@edit');
    Route::put('master/buku/{id}','Buku_controller@update');
    Route::delete('master/buku/{id}','Buku_controller@delete');
    Route::get('master/buku/status/{id}','Buku_controller@status');

    // peminjaman buku
    Route::get('pinjam-buku','Peminjaman_controller@index');
    Route::get('pinjam-buku/{id}','Peminjaman_controller@store');
    Route::get('pinjam-buku/setujui/{id}','Peminjaman_controller@setujui');
    Route::get('pinjam-buku/tolak/{id}','Peminjaman_controller@tolak');


    // route untuk pengembalian buku
    Route::get('pengembalian-buku','Pengembalian_controller@index');
    Route::get('pengembalian-buku/{id}','Pengembalian_controller@pengembalian');


    //Manage Anggota
    Route::get('manage-anggota','Anggota_controller@index');
    Route::get('manage-anggota/add','Anggota_controller@add');
    Route::post('manage-anggota/add','Anggota_controller@store');
    Route::get('manage-anggota/{id}','Anggota_controller@edit');
    Route::put('manage-anggota/{id}','Anggota_controller@update');
    Route::get('manage-anggota/delete/{id}','Anggota_controller@delete');

});

Route::get('keluar',function(){
    \Auth::logout();
    return redirect('login');
});

Auth::routes();

Route::get('/home', function(){
    return redirect('beranda');
});
