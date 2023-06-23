@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Welcome To OPD</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
        </div>
      </div>
      <a href="/dashboard/opd/create" class="btn btn-primary">Create opd</a>

  <table class="table">
  <thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col">Nama</th>
      <th scope="col">Pic</th>
      <th scope="col">Aksi</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($opedes as $opede)
    <tr>
      <th scope="row">{{$loop->iteration}}</th>
      <td>{{ $opede->nama }}</td>
      <td>{{ $opede->pic }}</td>
      <td>
        <a href="{{ route('opd.edit' ,$opede->id) }}" class="badge bg-warning"><span data-feather="edit">Edit</span></a>
            <form action="{{ route('opd.destroy', $opede->id ) }}" method="POST" class="d-inline">
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