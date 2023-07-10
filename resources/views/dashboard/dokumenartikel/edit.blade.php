@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Edit Dokumen Artikel</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
        </div>
    </div>
    <div class="col-lg-8">
        <form action="{{ route('dokumenartikel.store') }}" method="post">
            @csrf
            <div class="mb-3">
                <label for="nama" class="form-label">Judul </label>
                <input type="text" class="form-control" name="judul">
            </div>
        </form>
    </div>
@endsection
