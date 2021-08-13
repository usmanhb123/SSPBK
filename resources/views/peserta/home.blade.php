@extends('layouts.app')
@section('content')
 <!-- Begin Page Content -->
 
 <!-- Page Heading -->
      	<div class="panel-header bg-primary-gradient">
              <div class="page-inner py-5">
                <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
                    <div>
                        <h2 class="text-white pb-2 fw-bold">Selamat Datang {{$user->name}}</h2>
                        <h5 class="text-white op-7 mb-2">Work Section yang dipilih {{$user->data_work_section->nama_posisi}}</h5>
                    </div>
                    
                </div>
            </div>
          </div>
          <div class="page-inner mt--5">
            <div class="row mt--2">
                <div class="col-md-12">
                    <div class="card full-height">
                        <div class="card-header text-center">
                            <h2>Daftar Seleksi Ujian/Test Masuk {{$user->data_work_section->nama_posisi}}</h2>
                        </div>
                        <div class="card-body">
                           <div class="row">
                               <div class="col-lg-8">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Ujian/Test</th>
                                            <th scope="col">Tanggal Dilaksanakan</th>
                                            <th scope="col">Keterangan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data_ujian as $no => $item)
                                            
                                        <tr>
                                            <td>{{$no+1}}</td>
                                            <td>{{$item->nama_ujian}}</td>
                                            <td>{{$item->tanggal_mulai}} s/d {{$item->tanggal_selesai}}</td>
                                            <td>
                                                
                                                @if ($item->tanggal_selesai >= date('Y-m-d') && $item->tanggal_mulai <= date('Y-m-d'))
                                                <button class="btn btn-primary" disabled>     
                                                    Ujian Sedang Berlangsung
                                                </button>
                                              @else 
                                                @if ($item->tanggal_mulai > date('Y-m-d'))
                                                <button class="btn btn-warning" disabled>     
                                                    Ujian Belum Dimulai
                                                </button>
                                                @else 
                                                @if ($item->tanggal_selesai < date('Y-m-d'))
                                                <button class="btn btn-success" disabled>     
                                                    Ujian Telah Selesai
                                                </button>
                                                @endif
                                                @endif
                                              @endif
                                            </td>
                                        </tr>
                                        
                                        @endforeach
                                    </tbody>
                                </table>
                               </div>
                               <div class="col-lg-4">
                                <img src="{{asset('/img/master_soal.svg')}}" width="90%">
                            </div>
                           </div>
                        </div>
                    </div>
                </div>
               
            </div>
          </div>
            <div class="container-fluid">

            @include('layouts.alert')
         
        </div>







@endsection