@extends('layouts.app')
@section('content')
 <!-- Begin Page Content -->
 
 <!-- Page Heading -->
      
            <div class="container-fluid">
                <div class="page-header">
                    <h4 class="page-title">Seleksi Ujian/Test Masuk</h4>
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
                            <a href="#">Peserta</a>
                        </li>
                        <li class="separator">
                            <i class="flaticon-right-arrow"></i>
                        </li>
                        <li class="nav-item">
                            <a href="#">Seleksi Masuk</a>
                        </li>
                        <li class="separator">
                            <i class="flaticon-right-arrow"></i>
                        </li>
                        <li class="nav-item">
                            <a href="#">Pilih Ujian </a>
                        </li>
                    </ul>
                </div>
            @include('layouts.alert')
            
            <div class="row">
                <div class="col-md-12">
                    <div class="card full-height">
                        <div class="card-body text-center">
                            <h2>Daftar Seleksi Ujian/Test Masuk {{$user->data_work_section->nama_posisi}}</h2>
                        </div>
                      <div class="row ml-1">
                        @foreach ($data_ujian as $no => $item)
                                        
                        <div class="col-md-4">
                            <div class="card card-post card-round">
                                <img class="card-img-top" src="{{asset('/img/master_soal/'.$item->master_soal->cover)}}" alt="Card image cap">
                                <div class="card-body">
                                    
                                    <h3 class="card-title">
                                        <div class="row">
                                                {{$item->nama_ujian}}
                                        </div>
                                    </h3>
                                    {{-- <p class="card-text">{{$item->deskripsi}}</p> --}}
                                    <div class="text-right">
                                        
                                        @if ($item->tanggal_selesai >= date('Y-m-d') && $item->tanggal_mulai <= date('Y-m-d'))
                                        
                                        <p class="text-success"><small> <i class="fas fa-circle"></i>
                                            Ujian Sedang Berlangsung
                                        @else 
                                            @if ($item->tanggal_mulai > date('Y-m-d'))
                                                <p class="text-secondary"><small> <i class="fas fa-circle"></i>
                                                Ujian Belum Dimulai
                                            @else 
                                                @if ($item->tanggal_selesai < date('Y-m-d'))
                                                    <p class="text-danger"><small> <i class="fas fa-circle"></i>
                                                    Ujian Telah Selesai
                                                @endif
                                            @endif
                                         @endif
                                            </small>
                                            </p>
                                    </div>
                                    <div class="text-center">

                                        <a href="{{url('/seleksitestmasuk/'.$item->id)}}" class="btn btn-round btn-primary">Lihat Selengkapnya</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                      </div>
                    </div>
                </div>
               
            </div>
        </div>







@endsection