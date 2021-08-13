@php
    use App\Models\Data_jawaban_ujian;
@endphp
@extends('layouts.app')
@section('content')
 <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="page-header">
            <h4 class="page-title">Hasil Jawaban Essay Peserta</h4>
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
                    <a href="#">Koreksi Jawaban Peserta</a>
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
                <h2>Jawaban Essay Peserta</h2>
            </div>
            <div class="card-body">
                <div id="accordion">
                    @foreach ($data_soal as $no => $ds)

                    @php
                        $jawaban = Data_jawaban_ujian::where('users_id', $peserta->id)->where('data_soal_id', $ds->id)->where('data_ujian_id', $data_jadwal->id)->first();
                    @endphp

                    <div class="card">
                      <div class="card-header" id="headingOne">
                        <h5 class="mb-0">
                          <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne{{$no+1}}" aria-expanded="true" aria-controls="collapseOne{{$no+1}}">
                            Soal Nomor #{{$no+1}} ({{$ds->type_soal}})
                          </button>
                        </h5>
                      </div>
                  
                      <div id="collapseOne{{$no+1}}" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                        <div class="card-body">
                            @if($ds->file)
                            @php
                                 $pathinfo = pathinfo($ds->file);
                            @endphp
                                @if($pathinfo['extension'] == "mp4")
                                <div class="embed-responsive embed-responsive-16by9 mb-2">
                                    <video controls>
                                        <source src="{{asset('img/media_soal/'.$ds->file)}}" type="video/mp4">
                                    </video>
                                </div>
                                @endif
                                @if($pathinfo['extension'] == "mp3")
                                
                                    <audio controls>
                                        <source src="{{asset('img/media_soal/'.$ds->file)}}" type="audio/mpeg">
                                    </audio>
                                <br>
                                @endif
                                @if($pathinfo['extension'] == "jpg" || $pathinfo['extension'] == "jpeg" ||$pathinfo['extension'] == "png" || $pathinfo['extension'] == "svg")
                                    <img src="{{asset('img/media_soal/'.$ds->file)}}" alt="...." height="200px">
                                <br>
                                @endif
                            @endif
                    <p>
                        
                        {{$ds->isi_soal}}
                    </p>
                    <h3>Jawaban Peserta :</h3>
                    <div class="card">
                        <div class="card-body">
                            <p>
                                {{$jawaban->jawaban_essay}}
                                </p> 

                        </div>
                    </div>

                        </div>
                      </div>
                    </div>
                        
                    @endforeach

                   
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="card">
            <div class="card-header">
                <h2>Point Peserta</h2>
            </div>
            <form action="{{url('/evaluasiessay')}}" method="POST">
            @csrf
            @method('POST')
            <div class="card-body">
                <input type="hidden" name="users_id" value="{{$peserta->id}}">
                <input type="hidden" name="data_ujian_id" value="{{$data_jadwal->id}}">
                <div class="form-group">
                    <label for="number">Point Yang Di Peroleh Peserta</label>
                    <input id="number" class="form-control" type="text" name="point" value="{{$nilai_ujian->nilai_sementara}}" max="100" min="{{$nilai_ujian->nilai_sementara}}">
                    <small><i>Max Total point : 100 Point</i></small> <br>
                    <small><i>Point Minimum Kelulusan : {{$data_jadwal->nilai_minimum}} Point</i></small>
                </div>
                <div class="text-right">
                    <button type="submit" class="btn btn-primary btn-round btn-sm">Simpan Point</button>
                </div>
            </div>
        </form>
        </div>
    </div>
</div>


        </div>







@endsection