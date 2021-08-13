@php
    use App\Models\Data_soal;
@endphp
@extends('layouts.app')
@section('content')
 <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
      
          <div class="page-header">
           <h4 class="page-title">Pilih Master Soal</h4>
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
                   <a href="#">Settings Ujian/Test</a>
               </li>
               <li class="separator">
                <i class="flaticon-right-arrow"></i>
            </li>
            <li class="nav-item">
                <a href="#">Jadwal Ujian/test</a>
            </li><li class="separator">
                <i class="flaticon-right-arrow"></i>
            </li>
            <li class="nav-item">
                <a href="#">Pilih Master Soal</a>
            </li>
           </ul>
       </div>
           @include('layouts.alert')
         
   
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header text-center">
                       <h2>
                           
                           Data Jadwal Ujian/Test
                        </h2>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <table class="table table-hover">
                                    <tbody>
                                        <tr>
                                            <th>Work Section</th>
                                            <td>:</td>
                                            <td>{{$data_ujian->data_work_section->nama_posisi}}</td>
                                        </tr>
                                        <tr>
                                            <th>Tanggal Ujian/Test</th>
                                            <td>:</td>
                                            <td>{{$data_ujian->tanggal_mulai}} s/d {{$data_ujian->tanggal_selesai}}</td>
                                        </tr>
                                        <tr>
                                            <th>Durasi Ujian</th>
                                            <td>:</td>
                                            <td>{{$data_ujian->waktu_ujian}}</td>
                                        </tr>
                                        <tr>
                                            <th>Nilai Minimum Kelulusan</th>
                                            <td>:</td>
                                            <td>{{$data_ujian->nilai_minimum}} pont</td>
                                        </tr>
                                        <tr>
                                            <th>Acak Soal</th>
                                            <td>:</td>
                                            <td>@if($data_ujian->acak_soal == NULL) Soal ber urutan sesuai master soal @else Soal diacak @endif </td>
                                        </tr>
                                        <tr>
                                            <th>Status Ujian</th>
                                            <td>:</td>
                                            <td>@if($data_ujian->is_active == NULL) Tidak Aktif @else Aktif @endif </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-lg-6">
                                <img src="{{asset('/img/undraw_social_user_lff0.svg')}}" width="90%">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <h1 class="text-center">Daftar Master Soal</h1>
        <div class="row">
            @foreach ($master as $item)
    
            @php
            $jms = Data_soal::where('master_soal_id', $item->id)->count();
        @endphp
        @if ($jms != 0)
          <div class="col-md-4">
                <div class="card card-post card-round">
                    <img class="card-img-top" src="{{asset('/img/master_soal/'.$item->cover)}}" alt="Card image cap">
                    <div class="card-body">
                        
                        <h3 class="card-title">
                            {{$item->nama}}
                        </h3>
                        <p class="card-text">{{$item->keterangan}}</p>
                        <p>
                            @if ($jms == 0)
                                Belum ada soal yang dibuat.
                            @else
                                
                            Jumlah : {{$jms}} Soal.
                            @endif
                        </p>
                        <div class="text-center">

                            <a href="{{url('/datajadwal/'.$item->id.'/'.$data_ujian->id)}}" class="btn btn-success btn-round ">Pilih Master Soal</a>
                        </div>
                    </div>
                </div>
            </div>@endif
            @endforeach
        </div>
        
        
    </div>
    
    
    
    @endsection