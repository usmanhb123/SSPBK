@extends('layouts.app')
@section('content')
 <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="page-header">
            <h4 class="page-title">Edit Soal</h4>
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
                    <a href="#">Master Soal</a>
                </li>
                <li class="separator">
                    <i class="flaticon-right-arrow"></i>
                </li>
                   <li class="nav-item">
                       <a href="#">Data Soal</a>
                   </li>
                   <li class="separator">
                    <i class="flaticon-right-arrow"></i>
                </li>
                   <li class="nav-item">
                       <a href="#">Edit Soal</a>
                   </li>
            </ul>
        </div>
           @include('layouts.alert')
         
        <div class="card">
            <div class="card-header">
               <h2>
                   Edit Soal
                </h2>
            </div>
            <div class="card-body">
                <form action="{{url('mastersoal/saveeditsoal/'.$soal->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('POST')
 
                <div class="form-group">
                    <label for="pertanyaan">Pertanyaan :</label>
                    <textarea class="form-control" name="isi_soal" id="pertanyaan" rows="5" required>{{$soal->isi_soal}}</textarea>
                </div>
                <div class="form-group">
                    <label for="file">Media Soal :</label>
                    <input type="hidden" name="file_lama" value="{{$soal->file}}">
                    <input type="hidden" name="master_soal" value="{{$soal->master_soal_id}}">
                    <input type="hidden" name="type_soal" value="{{$soal->type_soal}}">
                    @if($soal->file)
                    @php
                            $pathinfo = pathinfo($soal->file);
                    @endphp
                        @if($pathinfo['extension'] == "mp4")
                        <div class="embed-responsive embed-responsive-16by9 mb-2">
                            <video controls>
                                <source src="{{asset('img/media_soal/'.$soal->file)}}" type="video/mp4">
                            </video>
                        </div>
                        @endif
                        @if($pathinfo['extension'] == "mp3")
                        
                            <audio controls>
                                <source src="{{asset('img/media_soal/'.$soal->file)}}" type="audio/mpeg">
                            </audio>
                        <br>
                        @endif
                        @if($pathinfo['extension'] == "jpg" || $pathinfo['extension'] == "jpeg" ||$pathinfo['extension'] == "png" || $pathinfo['extension'] == "svg")
                            <img src="{{asset('img/media_soal/'.$soal->file)}}" alt="...." height="200px">
                        <br>
                        @endif
                    @endif
                    <input type="file" name="file" id="filepg" class="form-control">
                    <small><i>Note : format media dapat berupa gambar (jpg,jpeg,png,svg), video(mp4), dan audio (mp3).</i></small>
                    
                </div>
                @if($soal->type_soal == "Pilihan Ganda")
                <div class="form-group">
                    <label for="text">Jawaban :</label>
                    @foreach ($soal->data_soal_jawaban as $item)
                        
                    <textarea class="form-control mt-1" name="{{$item->status}}" id="a" rows="2">{{$item->isi_jawaban}}</textarea>
                    @endforeach
                </div>
                
                <div class="row">
                    <div class="col-lg-6">
                        
                        <div class="form-group">
                            <label for="jb">Jawaban Benar :</label>
                            <select name="jawaban_benar" id="jb" class="form-control" required>
                                <option value="{{$soal->kunci_jawaban}}">Kunci jawaban {{$soal->kunci_jawaban}}</option>
                                <option value="A">A</option>
                                <option value="B">B</option>
                                <option value="C">C</option>
                                <option value="D">D</option>
                                <option value="E">E</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="bobot">Bobot/Nilai Soal :</label>
                        <input type="number" name="bobot" id="bobot" class="form-control" required value="{{$soal->bobot_nilai}}">
                        <small><i>Note : Total <strong> Nilai</strong> keseluruhan mencapai 100 point untuk satu master soal.</i></small>
                    </div>
                </div>
                @endif
                @if($soal->type_soal == "Jawaban Singkat")
              
                <div class="row">
                    <div class="col-lg-6">
                        
                        <div class="form-group">
                            <label for="jangsing">Jawaban Singkat :</label>
                            <input type="text" name="jawaban_benar" id="jangsing" class="form-control" value="{{$soal->kunci_jawaban}}">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="bobot">Bobot/Nilai Soal :</label>
                        <input type="number" name="bobot" id="bobot" class="form-control" required value="{{$soal->bobot_nilai}}">
                        <small><i>Note : Total <strong> Nilai</strong> keseluruhan mencapai 100 point untuk satu master soal.</i></small>
                    </div>
                </div>
                @endif

                </div>
                <div class="card-footer text-right">
                    <button type="submit" href="#" class="btn btn-round btn-primary">Edit Soal</button>
                    <a href="{{asset('/mastersoal/'.$soal->id.'/hapussoal')}}" class="btn btn-round btn-danger" onclick="return confirm('Data yang sudah dihapus tidak dapat dikembalikan!')">Hapus Soal</a>
                </div>
            
                </form>
        </div>




    </div>


@endsection

@push('scripts')
<script type="text/javascript">
    var uploadField = document.getElementById("filepg");
    uploadField.onchange = function() {
        if(this.files[0].size > 10000000){ // ini untuk ukuran 800KB, 1000000 untuk 1 MB.
           alert("Maaf. File Terlalu Besar ! Maksimal Upload 10 MB");
           this.value = "";
        };
    };
    </script> 
    @endpush