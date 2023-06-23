@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Welcome To kategori</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
        </div>
      </div>
      <a href="/dashboard/subkategori/create" class="btn btn-primary">Create Kategori</a>

  <table class="table">
  <thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col">Nama</th>
      <th scope="col">Nama kategori</th>
      <th scope="col">Aksi</th>
    </tr>
  </thead>
  <tbody> 
    @foreach ($subKategories as $subKategori)
    <tr>
      <th scope="row">{{$loop->iteration}}</th>
      <td>{{ $subKategori->nama }}</td>
      <td>{{ $subKategori->kategori->nama ?? '' }}</td>
      <td>
        <a href="{{ route('subkategori.edit' ,$subKategori->id) }}" class="badge bg-warning"><span data-feather="edit">Edit</span></a>
            <form action="{{ route('subkategori.destroy', $subKategori->id ) }}" method="POST" class="d-inline">
              @method('delete')
              @csrf
              <button class="badge bg-danger border-0" onclick="return confirm('Are You Sure?')"> <span data-feather="x-circle">Hapus</button>
            </form>
      </td>
    </tr>
    @endforeach 
  </tbody>
</table>
<canvas class="my-4 w-100" id="myChart" width="900" height="380"></canvas> 
@endsection