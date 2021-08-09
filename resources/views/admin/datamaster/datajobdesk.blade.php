@extends('layouts.app')
@section('content')
 <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
      
           @include('layouts.alert')
         
        

        <div class="page-header">
            <h4 class="page-title">Data Job Desk</h4>
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
                    <a href="#">Data Job Desk</a>
                </li>
            </ul>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <h4 class="card-title">Daftar Posisi Pekerjaan</h4>
                            <button class="btn btn-primary btn-sm btn-round ml-auto" data-toggle="modal" data-target="#addRowModal">
                                <i class="fa fa-plus"></i>
                                Job Desk
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <!-- Modal -->
                        <div class="modal fade" id="addRowModal" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header no-bd">
                                        <h5 class="modal-title">
                                            <span class="fw-mediumbold">
                                            New</span> 
                                            <span class="fw-light">
                                                Row
                                            </span>
                                        </h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                      
                                        <form>
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <div class="form-group form-floating-label">
                                                        <label for="inputFloatingLabel">Posisi Pekerjaan :</label>
                                                        <input id="inputFloatingLabel" type="text" name="nama_posisi" class="form-control input-border-bottom" required="">
                                                        
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 form-group form-floating-label">
                                                    <label for="keterangan" placeholder>Keterangan :</label>
                                                    <textarea name="keterangan" id="keterangan" cols="30" rows="10" required class="form-control"></textarea>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="modal-footer no-bd">
                                        <button type="button" id="addRowButton" class="btn btn-primary">Add</button>
                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                    </div>
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
                                            <td>{{$item->is_active}}</td>
                                            <td></td>
                                        </tr>
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