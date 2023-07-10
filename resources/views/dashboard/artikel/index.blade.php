@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Welcome To Artikel</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
        </div>
    </div>
    <a href="/dashboard/artikel/create" class="btn btn-primary">Create Artikel</a>

    <table class="table">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Judul</th>
                <th scope="col">Sub Judul </th>
                <th scope="col">status</th>
                <th scope="col">Isi Artikel</th>
                <th scope="col">Tanggal Dibuat</th>
                <th scope="col">Dibaca</th>
                <th scope="col">Tag</th>
                <th scope="col">Nama Sub Kategori</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($artikels as $artikel)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $artikel->judul }}</td>
                    <td>{{ $artikel->sub_judul }}</td>
                    <td>{{ $artikel->status == '1' ? 'aktif' : 'non-aktif' }}</td>
                    <td>{{ $artikel->isi_artikel }}</td>
                    <td>{{ $artikel->tanggal_dibuat }}</td>
                    <td>{{ $artikel->dibaca }}</td>
                    <td>{{ $artikel->tag }}</td>
                    <td>{{ $artikel->subKategori->nama ?? '' }}</td>
                    <td>
                        <a href="{{ route('artikel.edit', $artikel->id) }}" class="badge bg-warning"><span
                                data-feather="edit">Edit</span></a>
                        <form action="{{ route('artikel.destroy', $artikel->id) }}" method="POST" class="d-inline">
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
    <canvas class="my-4 w-100" id="myChart" width="900" height="380"></canvas>
@endsection
