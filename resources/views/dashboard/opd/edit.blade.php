@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Edit To OPD</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
        </div>
      </div>
        <div class="col-lg-8">
        <form action="{{ route('opd.update' , $opede->id) }}" method="post">
            @csrf
            @method('PUT')
            <div class="mb-3">
            <label for="nama" class="form-label">Nama</label>
            <input type="nama" class="form-control" id="nama" name="nama" value="{{ $opede->nama }}">
            </div>
            <div class="mb-3">
            <label for="PIC" class="form-label">Pic</label>
            <input type="PIC" class="form-control" id="PIC" name="pic" value="{{ $opede->pic }}">
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
        </div>
      <canvas class="my-4 w-100" id="myChart" width="900" height="380"></canvas>
@endsection