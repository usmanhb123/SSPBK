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
                        </li>  <li class="separator">
                            <i class="flaticon-right-arrow"></i>
                        </li>
                        <li class="nav-item">
                            <a href="#">Info Ujian </a>
                        </li>
                    </ul>
                </div>
            @include('layouts.alert')
            <div class="row">
                <div class="col-md-12">
                    <div class="card full-height">
                        <div class="card-body text-center">
                            <h2>{{$data_ujian->nama_ujian}}</h2>
                        </div>
                   <div class="row mr-2 mb-2">
                       <div class="col-lg-6">

                           <table class="table mt-3">
                               
                               <tbody>
                                <tr>
                                    <th>Tanggal Ujian</th>
                                    <td>:</td>
                                    <td>{{$data_ujian->tanggal_mulai}} s/d {{$data_ujian->tanggal_selesai}}</td>
                                </tr>
                                <tr>
                                    <th>Durasi Ujian</th>
                                    <td>:</td>
                                    <td>{{$data_ujian->waktu_ujian}} menit</td>
                                </tr>
                                <tr>
                                    <th>Nilai Minimum Kelulusan</th>
                                    <td>:</td>
                                    <td>{{$data_ujian->nilai_minimum}} point</td>
                                </tr>
                                
                                <tr>
                                    <th>Status Ujian</th>
                                    <td>:</td>
                                    <td>    
                                        @if ($data_ujian->tanggal_selesai >= date('Y-m-d') && $data_ujian->tanggal_mulai <= date('Y-m-d'))
                                        
                                        <p class="text-success"><small> <i class="fas fa-circle"></i>
                                            Ujian Sedang Berlangsung
                                        @else 
                                        @if ($data_ujian->tanggal_mulai > date('Y-m-d'))
                                                <p class="text-secondary"><small> <i class="fas fa-circle"></i>
                                                    Ujian Belum Dimulai
                                                    @else 
                                                @if ($data_ujian->tanggal_selesai < date('Y-m-d'))
                                                    <p class="text-danger"><small> <i class="fas fa-circle"></i>
                                                        Ujian Telah Selesai
                                                @endif
                                                @endif
                                         @endif
                                            </small>
                                        </p></td>
                                </tr>
                               <tr>
                                   <th>Note</th>
                                   <td>:</td>
                                   <td>
                                   <p>Ujian hanya bisa dilakukan 1 kali.</p>
                                   </td>
                                </tr>
                                
                              
                               </tbody>
                            </table>
                            <div class="text-right">
                                @if ($data_ujian->tanggal_mulai > date('Y-m-d'))
                                    <button class="btn btn-round btn-danger" disabled>Ikuti Test</button>
                                @else 
                                    @if ($data_ujian->tanggal_selesai < date('Y-m-d'))
                                        <button class="btn btn-round btn-danger" disabled>Ikuti Test</button>
                                    @else 
                                        <button class="btn btn-round btn-success" @if($cek_selesai != NULL) onclick="return alert('Anda sudah mengikuti ujian ini!')" @else data-toggle="modal" data-target="#addRowModal" @endif >Ikuti Test</button>
                                    @endif
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <img class="card-img-top" src="{{asset('/img/master_soal/'.$data_ujian->master_soal->cover)}}" alt="Card image cap">
                            <h3  class="mt-1">Deskripsi Ujian :</h3>
                            <p>
                              
                              {{$data_ujian->deskripsi}}
                          </p>
                        
                        </div>
                    </div>
                    

                      </div>
                    </div>
                </div>
               
            </div>
        </div>


 <!-- Modal -->
 <div class="modal fade" id="addRowModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header no-bd">
                <h2 class="modal-title">
                    <span class="fw-mediumbold">
                    Token</span> 
                    <span class="fw-light">
                        Masuk Ujian/Test
                    </span>
                </h2>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{url('/seleksitestmasuk')}}" method="POST">
                    @csrf
                    @method('POST')
                    <div class="form-group">
                        <input type="hidden" name="id" value="{{$data_ujian->id}}">
                        <input type="text" name="token" class="form-control">
                        <p>Masukkan Token ujian yang telah diberikan petugas untuk mulai mengerjakan ujian.</p>
                    </div>
                </div>
                <div class="modal-footer no-bd">
                    <button type="submit" class="btn btn-primary">Masuk</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>





@endsection