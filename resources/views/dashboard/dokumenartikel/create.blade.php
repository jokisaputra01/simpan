@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Create To dokumen artikel</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
        </div>
    </div>

    <div class="col-lg-8">
        <form action="{{ route('dokumenartikel.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label for="category" class="form-label">Nama Artikel</label>
                <select class="form-select" name="artikel_id">
                    @foreach ($artikels as $artikel)
                        @if (old('artikel_id') == $artikel->id)
                            <option value="{{ $artikel->id }}" selected>{{ $artikel->judul }}</option>
                        @else
                            <option value="{{ $artikel->id }}">{{ $artikel->judul }}</option>
                        @endif
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="nama" class="form-label">Nama Dokumen </label>
                <input type="text" class="form-control" name="nama">
            </div>

            <div class="mb-3">
                <label for="file" class="form-label">File Dokumen </label>
                <input type="file" class="form-control" name="file">
            </div>

            <div class="mb-3">
                <label for="keterangan" class="form-label">keterangan</label>
                <textarea name="keterangan" class="form-control" id="" cols="4" rows="10"></textarea>
            </div>

            <button type="submit" class="btn btn-primary">save</button>

        </form>
    </div>
@endsection
