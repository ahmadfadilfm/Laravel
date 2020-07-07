<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\M_buku;

class Buku_controller extends Controller {
    public function index() {
        $title='List Buku';
        // $data=\DB::table('m_buku as b')->join('m_kategori as k', 'b.kategori', '=', 'k.id')->select('b.tahun_terbit', 'b.judul', 'k.nama', 'b.penulis', 'b.stok', 'b.created_at', 'b.id', 'b.status')->get();

        //ELOQUENT
        $data = M_buku::get();

        return view('buku.buku_index', compact('title', 'data'));

        //API
        // return response()->json($data);
    }

    public function add() {
        $title='Tambah Buku';
        $kategori=\DB::table('m_kategori')->get();

        return view('buku.buku_add', compact('title', 'kategori'));
    }

    public function store(Request $request) {
        $kategori=$request->kategori;
        $judul=$request->judul;
        $penulis=$request->penulis;
        $tahun_terbit=$request->tahun_terbit;
        $penulis=$request->penulis;
        $stok=$request->stok;

        \DB::table('m_buku')->insert([ 'kategori'=>$kategori,
                'judul'=>$judul,
                'penulis'=>$penulis,
                'tahun_terbit'=>$tahun_terbit,
                'stok'=>$stok,
                'created_at'=>date('Y-m-d H:i:s'),
                'updated_at'=>date('Y-m-d H:i:s'),

                ]);
        \Session::flash('sukses', 'Data buku berhasil di tambah');

        return redirect('master/buku');
    }

    public function edit($id) {
        $title='Edit Buku';
        $dt=\DB::table('m_buku')->where('id', $id)->first();
        $kategori=\DB::table('m_kategori')->get();

        return view('buku.buku_edit', compact('title', 'dt', 'kategori'));
    }

    public function update(Request $request, $id) {

        $kategori=$request->kategori;
        $judul=$request->judul;
        $penulis=$request->penulis;
        $tahun_terbit=$request->tahun_terbit;
        $stok=$request->stok;

        $file=$request->file('image');

        if($file) {
            \DB::table('m_buku')->where('id', $id)->update([ 'kategori'=>$kategori,
                    'judul'=>$judul,
                    'penulis'=>$penulis,
                    'tahun_terbit'=>$tahun_terbit,
                    'stok'=>$stok,
                    'updated_at'=>date('Y-m-d H:i:s')]);
        }

        else {
            \DB::table('m_buku')->where('id', $id)->update([ 'kategori'=>$kategori,
                    'judul'=>$judul,
                    'penulis'=>$penulis,
                    'tahun_terbit'=>$tahun_terbit,
                    'stok'=>$stok,
                    'updated_at'=>date('Y-m-d H:i:s')]);
        }

        \Session::flash('sukses', 'Data berhasil di Update');

        return redirect('master/buku');
    }

    public function delete($id) {
        \DB::table('m_buku')->where('id', $id)->delete();

        \Session::flash('sukses', 'Data buku berhasil dihapus');
        return redirect('master/buku');
    }

    public function status($id) {
        $data=\DB::table('m_buku')->where('id', $id)->first();

        $status_sekarang=$data->status;

        if($status_sekarang==1) {
            \DB::table('m_buku')->where('id', $id)->update([ 'status'=>0]);
        }

        else {
            \DB::table('m_buku')->where('id', $id)->update([ 'status'=>1]);
        }

        \Session::flash('sukses', 'Status berhasil di ubah');

        return redirect('master/buku');
    }

    public function kosong() {
        $title='List Buku Stock Habis';
        // $data=\DB::table('m_buku as b')->join('m_kategori as k', 'b.kategori', '=', 'k.id')->select('b.judul', 'k.nama', 'b.penulis', 'b.stok', 'b.created_at', 'b.id', 'b.status', 'tahun_terbit')->where('b.stok', '<', 1)->get();
        // dd($data);

        //ELOQUENT
        $data = M_buku::where('stok','<',1)->get();

        return view('buku.buku_index', compact('title', 'data'));
    }

    public function nonaktif(){
        $title = 'List Buku Nonaktif';
        $data = \DB::table('m_buku as b')->join('m_kategori as k','b.kategori','=','k.id')->select('b.judul', 'k.nama', 'b.penulis', 'b.stok', 'b.created_at', 'b.id', 'b.status', 'tahun_terbit')->where('b.status','!=',1)->get();
        // dd($data);

        return view('buku.buku_index',compact('title','data'));
    }

}
