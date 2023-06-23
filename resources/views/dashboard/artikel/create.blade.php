@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Welcome To Kategori</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
        </div>
      </div>
        <div class="col-lg-8">
        <form action="{{ route('artikel.store')}} " method="POST">
            @csrf
            <div class="mb-3">
            <label for="nama" class="form-label">Judul </label>
            <input type="text" class="form-control" name="judul">
            </div>
            
            <div class="mb-3">
                <label for="sub_judul" class="form-label">Sub Judul</label>
                <input type="text" class="form-control" name="sub_judul">
                </div>
                <div class="mb-3">
                    <input class="form-check-input" type="checkbox" value="status_aktif" id="flexCheckDefault">
                    <label class="form-check-label" for="flexCheckDefault" class="form-label">
                      Default checkbox
                    </label>
                  </div>
                  <div class="mb-3">
                    <label for="isi_artikel" class="form-label">Isi Artikel</label>
                    <textarea class="form-control" rows="3" name="isi_artikel"></textarea>
                  </div>

                  <div class="mb-3">
                    <label for="tanggal_dibuat" class="form-label">Tanggal Dibuat</label>
                  <input type="date" name="tanggal_dibuat" class="form-control">
                  </div>
            <div class="mb-3">
              <label for="category" class="form-label">Nama Sub Kategori</label>
              <select class="form-select" name="sub_kategori_id">
                @foreach($subKategories as $subKategori)
                  @if(old('sub_kategori_id') == $subKategori->id)
                    <option value="{{ $subKategori->id }}" selected>{{ $subKategori->nama}}</option>
                  @else
                    <option value="{{ $subKategori->id }}">{{ $subKategori->nama}}</option>
                  @endif
                @endforeach
              </select>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
        </div>
      <canvas class="my-4 w-100" id="myChart" width="900" height="380"></canvas>
@endsection