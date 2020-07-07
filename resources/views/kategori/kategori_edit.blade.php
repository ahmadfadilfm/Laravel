@extends('layouts.master')

@section('content')

<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <p>
            <a href="javascript:history.back()" class="btn btn-warning btn-sm btn-flat">Kembali</a>
        </p>
        <div class="box box-warning">
            <div class="box-header">
                <h4>{{ $title }}</h4>
            </div>
            <div class="box-body">

                <form role="form" action="{{ url('master/kategori/'.$dt->id) }}" method="post">
                    {{ csrf_field() }}
                    {{ method_field('put') }}
                    <div class="box-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Nama Kategori</label>
                            <input type="text" name="nama" class="form-control" id="exampleInputEmail1" placeholder="Nama Kategori" value="{{ $dt->nama }}">
                        </div>
                    </div>
                    <!-- /.box-body -->

                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>

@endsection
