@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Edit Dokumen Artikel</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
        </div>
    </div>
    <div class="col-lg-8">
        <form action="{{ route('dokumenartikel.update', $dokumenartikel->id) }}" method="POST" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="mb-3">
                <label for="category" class="form-label">Judul Artikel</label>
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
                <input type="text" class="form-control" name="nama" value="{{ old('nama', $dokumenartikel->nama) }}">
            </div>

            <div class="mb-3">
                <label for="file" class="form-label">Upload Logo</label>
                <input class="form-control" type="hidden" name="oldDokumenLogo" value="{{ $dokumenartikel->file }}">
                @if ($dokumenartikel->file)
                    <img src="{{ asset('storage/' . $dokumenartikel->file) }}"
                        class="img-preview img-fluid mb-3 col-sm-5 d-block" alt="">
                @else
                    <img class="img-preview img-fluid mb-3 col-sm-5" />
                @endif
                <input type="file" class="form-control @error('file') is-invalid @enderror" id="file" name="file"
                    onchange="previewImage()">
                @error('file')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="keterangan" class="form-label">keterangan</label>
                <textarea name="keterangan" class="form-control" id="" cols="4" rows="10"></textarea>
            </div>

            <button type="submit" class="btn btn-primary">save</button>

        </form>
    </div>

    <script>
        function previewImage() {
            var image = document.querySelector('#file');
            var imgPreview = document.querySelector('.img-preview');
            imgPreview.style.display = 'block';
            const oFReader = new FileReader();
            oFReader.readAsDataURL(logo.files[0]);
            oFReader.onload = function(oFREvent) {
                imgPreview.src = oFREvent.target.result;
            }
        }
    </script>
@endsection
