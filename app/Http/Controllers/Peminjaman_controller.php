<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Peminjaman;

class Peminjaman_controller extends Controller
{
    public function index(){
        $title = 'halaman peminjaman buku all';

        if(\Auth::user()->status==1){
            $data = Peminjaman::get();
        }else{
            $data = Peminjaman::where('user',\Auth::user()->id)->get();
        }



        return view('peminjaman.index',compact('title','data'));
    }

    public function setujui($id){
        Peminjaman::where('id',$id)->update(['status'=>1]);

        return redirect('pinjam-buku');
    }

    public function tolak($id){
        Peminjaman::where('id',$id)->update(['status'=>2]);

        return redirect('pinjam-buku');
    }

    public function store($id){
        $cek = \DB::table('m_buku')->where('id',$id)->where('stok','>',0)->where('status',1)->count();

        if($cek > 0){
            \DB::table('peminjaman')->insert([
                'buku'=>$id,
                'user'=>\Auth::user()->id,
                'created_at'=>date('Y-m-d H:i:s')
                ]);

            $buku = \DB::table('m_buku')->where('id',$id)->first();
            $qty_now = $buku->stok;
            $qty_new = $qty_now - 1;

            \DB::table('m_buku')->where('id',$id)->update([
                'stok'=>$qty_new
            ]);

            \Session::flash('sukses','buku berhasil di pinjam');

            return redirect('master/buku');
        }else{
            \Session::flash('gagal','buku sudah habis atau tidak aktif');

            return redirect('master/buku');
        }
    }
}
