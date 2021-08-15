@extends('layouts.app')
@section('content')
 <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
      
          
          
          
          <div class="page-header">
              <h4 class="page-title">Data Work Section</h4>
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
                      <a href="#">Data Master</a>
                  </li>
                  <li class="separator">
                      <i class="flaticon-right-arrow"></i>
                  </li>
                  <li class="nav-item">
                      <a href="#">Data Work Section</a>
                  </li>
              </ul>
          </div>
          @include('layouts.alert')

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <h4 class="card-title">Daftar Posisi Pekerjaan</h4>
                            <button class="btn btn-primary btn-sm btn-round ml-auto" data-toggle="modal" data-target="#addRowModal">
                                <i class="fa fa-plus"></i>
                                Work Section
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <!-- Modal -->
                        <div class="modal fade" id="addRowModal" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header no-bd">
                                        <h5><b>

                                            Add Work Section
                                        </b>
                                        </h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                      
                                        <form action="{{url('/dataworksection')}}" method="POST">
                                            @csrf
                                            @method("POST")
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <div class="form-group form-floating-label">
                                                        <label for="inputFloatingLabel">Posisi Pekerjaan :</label>
                                                        <input id="inputFloatingLabel" type="text" name="nama_posisi" class="form-control input-border-bottom" required="">
                                                        
                                                    </div>
                                                </div>
                                                <div class="col-sm-12">
                                                    <div class=" form-group form-floating-label">

                                                        <label for="keterangan" placeholder>Keterangan :</label>
                                                        <textarea name="keterangan" id="keterangan" cols="30" rows="8" required class="form-control"></textarea>
                                                    </div>
                                                    <div class="form-check">
                                                        <label class="form-check-label">
                                                            <input class="form-check-input" type="checkbox" name="is_active" required value="1" checked>
                                                            <span class="form-check-sign">Active?</span>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                    </div>
                                    <div class="modal-footer no-bd">
                                        <button type="submit" class="btn btn-round btn-sm btn-primary">Save</button>
                                        <button type="button" class="btn btn-round btn-sm btn-danger" data-dismiss="modal">Close</button>
                                    </div>
                                    
                                </form>
                                </div>
                            </div>
                        </div>

                        <div class="table-responsive">
                            <table id="add-row" class="display table table-striped table-hover" >
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Posisi</th>
                                        <th>Keterangan</th>
                                        <th>Is Active</th>
                                        <th style="width: 10%">Action</th>
                                    </tr>
                                </thead>
                              
                                <tbody>
                                    @foreach ($table as $no => $item)
                                        <tr>
                                            <td>{{$no+1}}</td>
                                            <td>{{$item->nama_posisi}}</td>
                                            <td>{{$item->keterangan}}</td>
                                            <td><a href="{{url('/dataworksection/'.$item->id.'/edit')}}" @if($item->is_active == 1) class="btn btn-sm btn-round btn-success" @else class="btn btn-sm btn-round btn-secondary"@endif data-toggle="tooltip" data-placement="top" title="Klik untuk mengubah"> @if($item->is_active == 1)<i class="fas fa-check-circle" ></i> Active @else <i class="fas fa-times-circle" ></i> Non Active @endif</a></td>
                                            <td>
                                                <div class="form-button-action">
                                                    <button type="button" class="btn btn-link btn-primary btn-lg" data-toggle="modal" data-target="#addRowModal{{$no+1}}">
                                                        <i class="fa fa-edit" data-toggle="tooltip" title="" data-original-title="Edit Task" ></i>
                                                    </button>
                                                    <a href="{{url('/dataworksection/'.$item->id)}}" onclick="return confirm('Hapus Work Section? data yang di hapus tidak bisa dikembalikan!');" data-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Remove">
                                                        <i class="fa fa-times"></i>
                                                    </a>
                                                </div> 
                                           
                                            </td>
                                        </tr>

                                        <div class="modal fade" id="addRowModal{{$no+1}}" tabindex="-1" role="dialog" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header no-bd">
                                                        <h5><b>
                
                                                            Edit Work Section
                                                        </b>
                                                        </h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                      
                                                        <form action="{{url('/dataworksection/'.$item->id)}}" method="POST">
                                                            @csrf
                                                            @method("PUT")
                                                            <div class="row">
                                                                <div class="col-sm-12">
                                                                    <div class="form-group form-floating-label">
                                                                        <label for="inputFloatingLabel">Posisi Pekerjaan :</label>
                                                                        <input id="inputFloatingLabel" type="text" name="nama_posisi" class="form-control input-border-bottom" required="" value="{{$item->nama_posisi}}">
                                                                        
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-12">
                                                                    <div class=" form-group form-floating-label">
                
                                                                        <label for="keterangan" placeholder>Keterangan :</label>
                                                                        <textarea name="keterangan" id="keterangan" cols="30" rows="8" required class="form-control">{{$item->keterangan}}</textarea>
                                                                    </div>
                                                                    <div class="form-check">
                                                                        <label class="form-check-label">
                                                                            <input class="form-check-input" type="checkbox" name="is_active" required value="1" @if ($item->is_active == 1)
                                                                            checked
                                                                            @endif
                                                                            >
                                                                            <span class="form-check-sign">Active?</span>
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                    </div>
                                                    <div class="modal-footer no-bd">
                                                        <button type="submit" class="btn btn-round btn-sm btn-primary">Save</button>
                                                        <button type="button" class="btn btn-round btn-sm btn-danger" data-dismiss="modal">Close</button>
                                                    </div>
                                                    
                                                </form>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>




    </div>



@endsection