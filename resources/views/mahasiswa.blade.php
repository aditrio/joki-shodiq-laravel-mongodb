@extends('layout.app')

@section('header-content')
    Data Mahasiswa
@endsection

@section('desc-content')
   
@endsection

@section('main-content')

 <!-- Collapsable Card Example -->
 <div class="card shadow mb-4">
    <!-- Card Header - Accordion -->
    <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse"
        role="button" aria-expanded="true" aria-controls="collapseCardExample">
        <h6 class="m-0 font-weight-bold text-primary">Tambah Mahasiswa</h6>
    </a>
    <!-- Card Content - Collapse -->
    <div class="collapse hidden" id="collapseCardExample">
        <div class="card-body">
            <form class="form-inline" action="{{route('store.mhs')}}" method="POST">
                @csrf
                <div class="form-group mb-2">
                  <label for="staticEmail2" class="sr-only">Nama</label>
                  <input type="text" name="nama" class="form-control" id="staticEmail2"placeholder="Nama">
                </div>
                <div class="form-group mx-sm-3 mb-2">
                  <label for="inputPassword2" class="sr-only">NIM</label>
                  <input type="text" name="nim" class="form-control" id="inputPassword2" placeholder="NIM">
                </div>
                <button type="submit" class="btn btn-primary mb-2">Tambah</button>
              </form>
        </div>
    </div>
</div>


<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Daftar Mahasiswa</h6>
    </div>
    <div class="card-body">
        <table class="table table-striped">
            <thead>
              <tr>
                <th scope="col">No.</th>
                <th scope="col">Mahasiswa</th>
                <th scope="col">NIM</th>
                <th scope="col">Actions</th>
                
              </tr>
            </thead>
            <tbody>
                @foreach ($data as $key => $item)
                <tr>
                    <td scope="row">{{$key + 1}}</td>
                     <td hidden>{{$item->id}}</td>
                    <td>{{$item->nama}}</td>
                    <td>{{$item->nim}}</td>
                    <td>
                        <button type="button" class="btn btn-sm btn-info btn-edit" data-toggle="modal" data-target="#editmodal">Edit</button>
                        <button type="button" class="btn btn-sm btn-danger btn-danger btn-delete" data-toggle="modal" data-target="#deletemodal">Delete</button>
    
                    </td>
                  
                  </tr>
               
                @endforeach
             
              
            </tbody>
          </table>
    </div>
</div>
@endsection