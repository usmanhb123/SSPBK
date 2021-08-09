@extends('layouts.app')
@section('content')
 <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
      
           @include('layouts.alert')
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <div class="container">
              <div class="row">
                <div class="col-lg-6">
              <h6 class="m-0 font-weight-bold text-primary">Data Menu</h6>
              </div>
                <div class="col-lg-6 text-right">
                  <button type="button" class="badge badge-primary" data-toggle="modal" data-target="#exampleModal">
                  Tambah
                  </button>
                  </div>
            </div>
            </div>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Menu</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($menu as $no => $m)
                    <tr>
                      <td>{{$no+1}}</td>
                      <td>{{$m->menu}}</td>
                      <th><a href="#" data-toggle="modal" data-target="#exampleModal{{$m->id}}">edit</a> /
                      
                        <a href="#" data-toggle="modal" data-target="#hapus{{$m->id}}">hapus</a>
                   
                      </th>

                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>

        </div>




<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Menu</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{url('menu')}}" method="POST">
            @csrf
          <div class="form-group">
            <label>Menu :</label>
            
                      <input type="text" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Nama Menu.." maxlength="50" name="menu">
                     
          </div>
          
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
</form>
          

        @foreach($menu as $no => $m)

<!-- Modal -->
<div class="modal fade" id="exampleModal{{$m->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Menu</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{url('menu')}}/{{$m->id}}" method="POST">
            @csrf
            @method('PUT')
          <div class="form-group">
            <div class="row col-lg-12">
            <label>Menu :</label>
                      <input type="text" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" value="{{$m->menu}}" placeholder="Nama Menu.." maxlength="50" name="menu">
                     
          </div>
          </div>
          
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Edit</button>
      </div>
    </div>
  </div>
</div>
</form>



<!-- Modal -->
<div class="modal fade" id="hapus{{$m->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Hapus Menu</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{url('menu')}}/{{$m->id}}" method="POST">
            @csrf
            @method('DELETE')
          <h1>Anda Yakin Ingin Menghapus Menu {{$m->menu}}?</h1>          
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Hapus</button>
      </div>
    </div>
  </div>
</div>
</form>



        @endforeach





@endsection