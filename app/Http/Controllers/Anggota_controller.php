<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

class Anggota_controller extends Controller
{
    public function index(){
        $title = 'Manage Anggota';
        $data = User::where('status',null)->get();

        return view('anggota.index',compact('title','data'));
    }

    public function add(){
        $title = 'Tambah Anggota';

        return view('anggota.add',compact('title'));
    }

    public function store(Request $request){
        $form = [];

        $form['name'] = $request->name;
        $form['email'] = $request->email;
        $form['password'] = bcrypt('123');
        $form['created_at'] = date('Y-m-d H:i:s');
        $form['updated_at'] = date('Y-m-d H:i:s');

        User::insert($form);

        // \Session::flash('sukses','anggota berhasil ditambah');

        return redirect('manage-anggota');
    }

    public function edit($id){
        $title = 'Edit Anggota';
        $dt = User::find($id);

        return view('anggota.edit',compact('title','dt'));
    }

    public function update(Request $request,$id){
        $form = [];

        $form['name'] = $request->name;
        $form['email'] = $request->email;
        // $form['password'] = bcrypt('123');
        // $form['created_at'] = date('Y-m-d H:i:s');
        $form['updated_at'] = date('Y-m-d H:i:s');

        User::where('id',$id)->update($form);

        // \Session::flash('sukses','anggota berhasil ditambah');

        return redirect('manage-anggota');
    }

    public function delete($id){
        User::where('id',$id)->delete();

        return redirect('manage-anggota');
    }
}
