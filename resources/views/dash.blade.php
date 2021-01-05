@extends('layout.app')

@section('header-content')
    Management Nilai App
@endsection

@section('desc-content')
<p>Aplikasi ini dapat memudahkan user (Guru / Pengajar) dalam mengelola nilai siswa/mahasiswa melalui app berbasis website.</p>
    
@endsection

@section('main-content')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Data Nilai Mahasiswa</h6>
    </div>
    <div class="card-body">
        <table class="table table-striped">
            <thead>
              <tr>
                <th scope="col">No.</th>
                <th scope="col">Mahasiswa</th>
                <th scope="col">NIM</th>
                <th scope="col">Nilai</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($data as $key => $item)
              <tr>
                  <td scope="row">{{$key + 1}}</td>
                   <td hidden>{{$item->id}}</td>
                  <td>{{$item->nama}}</td>
                  <td>{{$item->nim}}</td>
                  <td>{{$item->nilai}}</td>
                
                </tr>
             
              @endforeach
              
            </tbody>
          </table>
    </div>
</div>
@endsection