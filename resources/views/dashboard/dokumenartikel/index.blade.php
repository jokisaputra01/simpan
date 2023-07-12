@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Welcome To Dokumen Artikel</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
        </div>
    </div>
    <a href="/dashboard/dokumenartikel/create" class="btn btn-primary">Create Dokumen Artikel</a>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Nama</th>
                <th scope="col">Judul Artikel</th>
                <th scope="col">Keterangan </th>
                <th scope="col">Foto</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($dokumentArtikel as $dokumen)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $dokumen->nama }}</td>
                    <td>{{ $dokumen->artikel->judul ?? '' }}</td>
                    <td>{{ $dokumen->keterangan }}</td>
                    <td>
                        <img src="{{ asset('storage/' . $dokumen->file) }}" alt="" class="w-25 h-25">
                    </td>
                    <td>
                        <a href="{{ route('dokumenartikel.edit', $dokumen->id) }}" class="badge bg-warning"><span
                                data-feather="edit">Edit</span></a>
                        <form action="{{ route('dokumenartikel.destroy', $dokumen->id) }}" method="POST" class="d-inline">
                            @method('delete')
                            @csrf
                            <button class="badge bg-danger border-0" onclick="return confirm('Are You Sure?')"> <span
                                    data-feather="x-circle">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
