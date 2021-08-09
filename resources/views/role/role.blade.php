@extends('layouts.app')
@section('content')
 <!-- Begin Page Content -->
 
 <div class="container-fluid">
        <div class="page-header">
            <h4 class="page-title">{{ $title }}</h4>
            <ul class="breadcrumbs">
                <li class="nav-home">
                    <a href="#">
                        <i class="flaticon-home"></i>
                    </a>
                </li>
               
                <li class="separator">
                    <i class="flaticon-right-arrow"></i>
                </li>
                
                <li class="nav-item">
                    <a href="#">Dashboard Kepala Ruangan</a>
                </li>

                @if ($sub_menu)
                    <li class="separator">
                        <i class="flaticon-right-arrow"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#">{{ $sub_menu }}</a>
                    </li>
                @endif

                <li class="separator">
                    <i class="flaticon-right-arrow"></i>
                </li>
                <li class="nav-item">
                    <a href="#">{{ $title }}</a>
                </li>
            </ul>
        </div>
          <!-- Page Heading -->
      
           @include('layouts.alert')
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <div class="container">
              <div class="row">
                <div class="col-lg-6">
              <h3>Data Role & Access Users</h3>
              </div>
                <div class="col-lg-6 text-right">
                  <!-- <button type="button" class="badge badge-primary" data-toggle="modal" data-target="#exampleModal">
                  Tambah
                  </button> -->
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
                      <th>Role</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($data as $no => $roles)
                    <tr>
                    <td>{{$no+1}}</td>
                    <td>{{$roles->role}}</td>
                    <td>
                      <a href="#" class="btn btn-primary btn-link" data-toggle="modal" data-target="#access{{$roles->id}}"><i class="fas fa-user-tag"></i> Access</a>
                     
                     <a href="#" class="btn btn-success btn-link" data-toggle="modal" data-target="#exampleModal{{$roles->id}}"><i class="fas fa-edit"></i> edit</a>
                      
                        <!-- <a href="#" class="btn btn-primary btn-sm btn-round" data-toggle="modal" data-target="#hapus{{$roles->id}}">hapus</a> -->
                   </td>
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
        <h5 class="modal-title" id="exampleModalLabel">Tambah Role</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{url('role')}}" method="POST">
            @csrf
          <div class="form-group">
            <label>Role :</label>
            
                      <input type="text" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Nama role.." maxlength="50" name="role">
                     
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





        @foreach($data as $no => $m)

<!-- Modal -->
<div class="modal fade" id="exampleModal{{$m->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Role</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{url('role')}}/{{$m->id}}" method="POST">
            @csrf
            @method('PUT')
          <div class="form-group">
            <div class="row col-lg-12">
            <label>Role :</label>
                      <input type="text" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" value="{{$m->role}}" placeholder="Nama role.." maxlength="50" name="role">
                     
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
        <h5 class="modal-title" id="exampleModalLabel">Hapus Role</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{url('role')}}/{{$m->id}}" method="POST">
            @csrf
            @method('DELETE')
          <h1>Anda Yakin Ingin Menghapus Role {{$m->role}}?</h1>          
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Hapus</button>
      </div>
    </div>
  </div>
</div>
</form>

<!-- Modal -->
<div class="modal fade" id="access{{$m->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Role Access</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{route('access')}}" method="POST">
            @csrf
            <div class="container">
              @foreach($menu as $mn)
              <div class="row">
                <div class="col-lg-6">
                  <label>{{$mn->menu}}</label>
                </div>
                <div class="col-lg-6">
                  <?php $menuaccess = DB::table('user_access_menu')->where([
                      ['user_role_id', '=', $m->id],
                      ['user_menu_id', '=', $mn->id],
                  ])->first(); 
                  
                  ?>
                  @if($menuaccess)
                 <input type="checkbox" value="{{$mn->id}}" name="menu{{$mn->id}}" aria-label="Checkbox for following text input" checked="">
                 @else
                <input type="checkbox" value="{{$mn->id}}" name="menu{{$mn->id}}" aria-label="Checkbox for following text input">
                 
                @endif
                </div>
              </div>
              @endforeach
          
            <input type="hidden" name="id_role" value="{{$m->id}}">
            <br>
      <h6>Catatan :</h6>
      <p>Tekan tombol <i>Save</i> untuk menyimpan setingan.</p>
      </div>
        </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save</button>
      </div>
    </div>
  </div>
</div>
</form>



        @endforeach









@endsection