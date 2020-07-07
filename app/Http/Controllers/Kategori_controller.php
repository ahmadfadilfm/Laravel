<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Kategori_controller extends Controller
{
    public function index(){
        $title = 'Master Kategori';
        $data = \DB::table('m_kategori')->get();

        return view('kategori.kategori_index',compact('title','data'));
    }

    public function add(){
        $title = 'Tambah Kategori';

        return view('kategori.kategori_add',compact('title'));
    }

    public function store(Request $request){
        $nama = $request->nama;

        \DB::table('m_kategori')->insert([
            'nama'=>$nama,
            'created_at'=>date('Y-m-d H:i:s'),
            'updated_at'=>date('Y-m-d H:i:s')
        ]);

        \Session::flash('sukses','Data kategori berhasil ditambah');

        return redirect('master/kategori');
    }

    public function edit($id){
        $dt = \DB::table('m_kategori')->where('id',$id)->first();
        $title = 'Edit Kategori';

        return view('kategori.kategori_edit',compact('title','dt'));
    }

    public function update(Request $request,$id){
        $nama = $request->nama;

        \DB::table('m_kategori')->where('id',$id)->update([
            'nama'=>$nama,
            'updated_at'=>date('Y-m-d H:i:s')
        ]);

        \Session::flash('sukses','Data berhasil di Update');

        return redirect('master/kategori');
    }
    public function delete($id){
        \DB::table('m_kategori')->where('id',$id)->delete();

        \Session::flash('sukses','Data berhasil dihapus');

        return redirect('master/kategori');
    }
}
