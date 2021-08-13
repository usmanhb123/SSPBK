@php
    use App\Models\Data_ujian;
    use App\Models\Data_nilai_ujian;
@endphp
@extends('layouts.app')
@section('content')
 <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="page-header">
            <h4 class="page-title">Data Hasil Test Peserta</h4>
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
                    <a href="#">Data Hasil Test</a>
                </li>
                <li class="separator">
                    <i class="flaticon-right-arrow"></i>
                </li>
                <li class="nav-item">
                    <a href="#">Data Peserta</a>
                </li>
                <li class="separator">
                    <i class="flaticon-right-arrow"></i>
                </li>
                <li class="nav-item">
                    <a href="#">Pilih Peserta</a>
                </li>
                <li class="separator">
                    <i class="flaticon-right-arrow"></i>
                </li>
                <li class="nav-item">
                    <a href="#">Data Hasil Test Peserta</a>
                </li>
            </ul>
        </div>
           @include('layouts.alert')
         
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
               <h1>
                   Profil Peserta
                </h1>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="text-center">

                            <img src="{{asset('/img/profile_user/'. $peserta->image)}}" width="60%">
                         
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <table class="table mt-3">
                           
                            <tbody>
                                <tr>
                                    <th>Nama</th>
                                    <td>:</td>
                                    <td>{{$peserta->name}}</td>
                                </tr>
                                <tr>
                                    <th>NIK</th>
                                    <td>:</td>
                                    <td>{{$peserta->nik}}</td>
                                </tr>
                                <tr>
                                    <th>Telepon</th>
                                    <td>:</td>
                                    <td>{{$peserta->telepon}}</td>
                                </tr>
                                <tr>
                                    <th>Email</th>
                                    <td>:</td>
                                    <td>{{$peserta->email}}</td>
                                </tr>
                                <tr>
                                    <th>Alamat</th>
                                    <td>:</td>
                                    <td>{{$peserta->alamat}}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-header">
                <h2>Hasil Ujian Peserta</h2>
            </div>
            <div class="card-body">

                <table class="table mt-1">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Ujian</th>
                            <th scope="col">Tanggal Ujian</th>
                            <th scope="col">Nilai Minimum</th>
                            <th scope="col">Nilai Peserta</th>
                            <th scope="col">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $ujian = Data_ujian::where('data_work_section_id', $peserta->data_work_section_id)->get();
                        @endphp
                        @foreach ($ujian as $no => $item)
                        @php
                            $nilaips = Data_nilai_ujian::where('users_id', $peserta->id)->where('data_ujian_id', $item->id)->first();
                        @endphp
                        <tr>
                            <td scope="col">{{$no+1}}</td>
                            <td scope="col">{{$item->nama_ujian}}</td>
                            <td scope="col">{{$item->tanggal_mulai}} s/d {{$item->tanggal_selesai}}</td>
                            <td scope="col">{{$item->nilai_minimum}} Point</td>
                            <td scope="col">@if($nilaips)
                                    {{$nilaips->nilai_akhir}} Point
                                @endif
                            </td>
                            <td scope="col">@if($nilaips)
                                    @if($nilaips->nilai_akhir >= $item->nilai_minimum)
                                    <button class="btn btn-sm btn-round btn-success" disabled>Lulus</button>
                                    @else
                                    <button class="btn btn-sm btn-round btn-danger" disabled>Tidak Lulus</button>
                                    @endif
                                    @else 
                                    @if($item->tanggal_selesai < date('Y-m-d'))
                                    <button class="btn btn-sm btn-round btn-danger" disabled>Tidak Mengerjakan</button>
                                    @else 
                                    <button class="btn btn-sm btn-round btn-danger" disabled>Belum Mengerjakan</button>
                                    @endif
                                    @endif
                            
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        
        <img src="{{asset('/img/login.svg')}}" width="90%">

    </div>
  
</div>


        </div>







@endsection