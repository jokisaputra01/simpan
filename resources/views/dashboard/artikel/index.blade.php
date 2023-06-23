@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Welcome To kategori</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
        </div>
      </div>
      <a href="/dashboard/artikel/create" class="btn btn-primary">Create Kategori</a>

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
    <h2>disini data artikel</h2>
  </tbody>
</table>
<canvas class="my-4 w-100" id="myChart" width="900" height="380"></canvas> 
@endsection