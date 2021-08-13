@extends('layouts.app')
@section('content')
 <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="page-header">
            <h4 class="page-title">Pilih Peserta</h4>
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
                    <a href="#">Evaluasi Essay</a>
                </li><li class="separator">
                    <i class="flaticon-right-arrow"></i>
                </li>
                <li class="nav-item">
                    <a href="#">Pilih Peserta</a>
                </li>

            </ul>
        </div>
           @include('layouts.alert')
         <div class="card">
             <div class="card-header">
                 <h2>{{$data_jadwal->nama_ujian}} Tanggal {{$data_jadwal->tanggal_mulai}} s/d {{$data_jadwal->tanggal_selesai}}</h2>
             </div>
             <div class="card-body">
                <div class="row">
                    <div class="col-lg-9">

                        <div class="table-responsive">
                               <table id="add-row" class="display table table-striped table-hover" >
                                   <thead>
                                       <tr>
                                           <th>#</th>
                                           <th>Nama Peserta</th>
                                           <th>Point Sementara</th>
                                           <th>Poin Akhir</th>
                                       </tr>
                                   </thead>
                                 
                                   <tbody>
                                       @foreach ($nilai_ujian as $no => $item)
                                           <tr>
                                               <td>{{$no+1}}</td>
                                               <td>{{$item->users->name}}</td>
                                               <td>{{$item->nilai_sementara}} point</td>
                                               <td><a href="#" class="btn btn-primary btn-round btn-sm">Evaluasi Jawaban Essay</a> </td>
                                           </tr>
                   
                                       @endforeach
                                       @foreach ($nilai_ujian_selesai as $s)
                                       <tr>
                                           <td>{{$no+1}}</td>
                                           <td>{{$s->users->name}}</td>
                                           <td>{{$s->nilai_sementara}} point</td>
                                           <td>{{$s->nilai_akhir}}</td>
                                       </tr>
               
                                   @endforeach
                                   </tbody>
                               </table>
                       </div>
                    </div>
                    <div class="col-lg-3">
                        <p>Note :</p>
                        <p>Nilai sementara adalah hasil jawaban benar dari soal pilihan ganda dan jawaban singkat dengan bobot nilai yang sudah ditentukan oleh master soal yang telah dibuat sebelumnya.</p>
                    </div>
                </div>
             </div>
         </div>





        </div>







@endsection