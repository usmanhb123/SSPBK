@php
    use App\Models\Data_soal_jawaban;
@endphp
@extends('layouts.app')
@section('content')
 <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
      
          <div class="page-header">
           <h4 class="page-title">Data Master Soal</h4>
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
           </ul>
       </div>
           @include('layouts.alert')






            <div class="row">
                <div class="col-lg-12">

                    <div class="card">
                        <img src="{{asset('/img/master_soal/'.$master->cover)}}" alt="Card image cap" height="150px">
                    <div class="card-body">
                        
                        <h3 class="card-title">
                            {{$master->nama}}
                        </h3>
                        <p class="card-text">{{$master->keterangan}}</p>
                        <div class="text-right">

                            <a href="#" data-toggle="modal" data-target="#exampleModal" class="btn btn-primary btn-rounded btn-sm">Edit</a>
                            <a href="{{url('/mastersoal/'.$master->id)}}" class="btn btn-primary btn-danger btn-round btn-sm" onclick="return confirm('Data yang sudah dihapus tidak dapat dikembalikan!')">Remove</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-6">
                                
                                <h3>Daftar Soal</h3>
                            </div>
                            <div class="col-md-6 text-right">
                                <button class="btn btn-round btn-sm btn-primary" data-toggle="modal" data-target="#pilihanganda">Add Soal Pilihan Ganda</button>
                                <button class="btn btn-round btn-sm btn-warning" data-toggle="modal" data-target="#essay">Add Soal Essay</button>
                                <button class="btn btn-round btn-sm btn-secondary"  data-toggle="modal" data-target="#jangsing">Add Soal Jawaban Singkat</button>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        @if($datasoalcek == NULL)
                        <div class="text-center">

                            <img src="{{asset('img/notfound.svg')}}" alt="..." height="200px">
                            <h3>Belum ada soal yang dibuat!</h3>
                        </div>
                        @endif
                        <div class="row">
                            <div class="col-lg-9">

                                <div id="accordion">
                                    @foreach ($datasoal as $no => $ds)
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
                                          {{$ds->isi_soal}}
                                          <div class="mt-3">
                                            @php
                                             $pg = Data_soal_jawaban::where('data_soal_id', $ds->id)->get();   
                                            @endphp  
                                            @foreach ($pg as $item)
                                            
                                            @if($item->status == $ds->kunci_jawaban)
                                            <div class="card card-stats card-success card-round">
                                                @else
                                                <div class="card card-stats">
                                                @endif
                                                <div class="card-body">
                                                    @if($item->status == $ds->kunci_jawaban)
                                                    <div class="row">
                                                        <div class="col-lg-8">
                                                            {{$item->isi_jawaban}} 

                                                        </div>
                                                        <div class="col-lg-4 text-right">
                                                            Point benar : {{$ds->bobot_nilai}} point.
                                                        </div>
                                                    </div>
                                                    
                                                    @else
                                                    
                                                    {{$item->isi_jawaban}} 
                                                     @endif
                                                </div>
                                            </div>
                                       
                                            @endforeach
                                            @if($ds->type_soal == "Jawaban Singkat")
                                            <div class="card card-stats card-success card-round">
                                               
                                                <div class="card-body">
                                                   <div class="row">
                                                        <div class="col-lg-8">
                                                            {{$ds->kunci_jawaban}} 

                                                        </div>
                                                        <div class="col-lg-4 text-right">
                                                            Point benar : {{$ds->bobot_nilai}} point.
                                                        </div>
                                                    </div>
                                               
                                                
                                                </div>
                                            </div>
                                       
                                            @endif
                                            <div class="row">
                                                <div class="col-lg-12 text-right">
                                                    <a href="{{url('/mastersoal/'.$ds->id.'/editsoal')}}" class="btn btn-round btn-primary">Edit Soal</a>
                                                    <a href="{{asset('/mastersoal/'.$ds->id.'/hapussoal')}}" class="btn btn-round btn-danger" onclick="return confirm('Data yang sudah dihapus tidak dapat dikembalikan!')">Hapus Soal</a>
                                                </div>
                                            </div>

                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                        
                                    @endforeach

                                   
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="row">
                                   @foreach ($datasoal as $no => $dss)
                                   <div class="row col-lg-4 mb-1 mr-1">
                                       <a href="#" class="btn btn-lg btn-success">{{$no+1}}</a>
                                   </div>
                                   @endforeach

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        </div>

<form action="{{url('/mastersoal/'.$master->id)}}" method="POST" enctype="multipart/form-data">
   @csrf
   @method('PUT')
<!-- Modal master -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Edit Master Soal</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col-md-4">
                    <div class="card text-center">
                        <label for="inputFile" class="mt-1">Cover Soal</label>
                        <div class="imgWrap">
                            <img src="{{asset('/img/master_soal/'.$master->cover)}}" id="imgView" class="card-img-top img-fluid">
                        </div>
                        <div class="card-body">
                            <div class="custom-file">
                                <input type="file" id="inputFile" name="file" class="imgFile custom-file-input" aria-describedby="inputGroupFileAddon01">
                                <label class="custom-file-label" for="inputFile">Choose Image</label>
                            </div>
                        </div>
                        @error('file')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <input type="hidden" name="coverlama" value="{{$master->cover}}">
                <div class="col-md-8">
    
                    <div class="form-group">
                        <label for="nama">Nama Master Soal</label>
                    <input type="text" class="form-control" name="nama" id="nama" @if (old('nama'))
                    value="{{old('nama')}}"
                        @else
                        value="{{$master->nama}}"
                    @endif  required>
                        
                    </div>
                 
                    <div class="form-group">
                        <label for="keterangan">Keterangan</label>
                        <textarea class="form-control" name="keterangan" id="keterangan" rows="5" required>{{$master->keterangan}}</textarea>
                    </div>
                    </div>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save</button>
        </div>
      </div>
    </div>
  </div>
</form>

<form action="{{url('/mastersoal/addpilihanganda')}}" method="POST" enctype="multipart/form-data">
@csrf
@method('POST')
<!-- Modal -->
<div class="modal fade" id="pilihanganda" tabindex="-1" role="dialog" aria-labelledby="pilihangandaLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="pilihangandaLabel">Soal Pilihan Ganda</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <input type="hidden" name="master_soal_id" value="{{$master->id}}">
                <div class="form-group">
                    <label for="pertanyaan">Pertanyaan :</label>
                    <textarea class="form-control" name="isi_soal" id="pertanyaan" rows="5" required></textarea>
                </div>
                <div class="form-group">
                    <label for="file">Media Soal :</label>
                    <input type="file" name="file" id="filepg" class="form-control">
                    <small><i>Note : format media dapat berupa gambar (jpg,jpeg,png,svg), video(mp4), dan audio (mp3).</i></small>
                    
                </div>
                <div class="form-group">
                    <label for="text">Jawaban :</label>
                    <textarea class="form-control mt-1" name="a" id="a" rows="2">Jawaban A</textarea>
                    <textarea class="form-control mt-1" name="b" id="b" rows="2">Jawaban B</textarea>
                    <textarea class="form-control mt-1" name="c" id="c" rows="2">Jawaban C</textarea>
                    <textarea class="form-control mt-1" name="d" id="d" rows="2">Jawaban D</textarea>
                    <textarea class="form-control mt-1" name="e" id="e" rows="2">Jawaban E</textarea>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        
                        <div class="form-group">
                            <label for="jb">Jawaban Benar :</label>
                            <select name="jawaban_benar" id="jb" class="form-control" required>
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
                        <input type="number" name="bobot" id="bobot" class="form-control" required>
                        <small><i>Note : Total <strong> Nilai</strong> keseluruhan mencapai 100 point untuk satu master soal.</i></small>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
    </div>
</div>
</div>
</form>


<form action="{{url('/mastersoal/addessay')}}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('POST')
<!-- Modal -->
<div class="modal fade" id="essay" tabindex="-1" role="dialog" aria-labelledby="essayLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="essayLabel">Soal Essay</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <input type="hidden" name="master_soal_id" value="{{$master->id}}">

            <div class="form-group">
                <label for="pertanyaan">Pertanyaan :</label>
                <textarea class="form-control" name="isi_soal" id="pertanyaan" rows="5" required></textarea>
            </div>
            <div class="form-group">
                <label for="file">Media Soal :</label>
                <input type="file" name="file" id="filees" class="form-control">
                <small><i>Note : format media dapat berupa gambar (jpg,jpeg,png,svg), video(mp4), dan audio (mp3).</i></small>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div>
</form>


<form action="{{url('/mastersoal/addjawabansingkat')}}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('POST')
<!-- Modal -->
<div class="modal fade" id="jangsing" tabindex="-1" role="dialog" aria-labelledby="jangsingLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="jangsingLabel">Soal Jawaban Singkat</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <input type="hidden" name="master_soal_id" value="{{$master->id}}">

            <div class="form-group">
                <label for="pertanyaan">Pertanyaan :</label>
                <textarea class="form-control" name="isi_soal" id="pertanyaan" rows="5" required></textarea>
            </div>
            <div class="form-group">
                <label for="file">Media Soal :</label>
                <input type="file" name="file" id="filejs" class="form-control">
                <small><i>Note : format media dapat berupa gambar (jpg,jpeg,png,svg), video(mp4), dan audio (mp3).</i></small>
            </div>
            <div class="form-group">
                <label for="jangsing">Jawaban Singkat :</label>
                <input type="text" name="jawaban_benar" id="jangsing" class="form-control">
            </div>
                <div class="form-group">
                    <label for="bobot">Bobot/Nilai Soal :</label>
                    <input type="number" name="bobot" id="bobot" class="form-control">
                    <small><i>Note : Total <strong> Nilai</strong> keseluruhan mencapai 100 point untuk satu master soal.</i></small>
                </div>
            
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div>
</form>
@endsection
    @push('css')
{{-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> --}}
<style>#imgView{  
    padding:5px;
}
.loadAnimate{
    animation:setAnimate ease 2.5s infinite;
}
@keyframes setAnimate{
    0%  {color: #000;}     
    50% {color: transparent;}
    99% {color: transparent;}
    100%{color: #000;}
}
.custom-file-label{
    cursor:pointer;
}</style>
@endpush


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
    <script type="text/javascript">
        var uploadField = document.getElementById("filees");
        uploadField.onchange = function() {
            if(this.files[0].size > 10000000){ // ini untuk ukuran 800KB, 1000000 untuk 1 MB.
               alert("Maaf. File Terlalu Besar ! Maksimal Upload 10 MB");
               this.value = "";
            };
        };
        </script>
        <script type="text/javascript">
            var uploadField = document.getElementById("filejs");
            uploadField.onchange = function() {
                if(this.files[0].size > 10000000){ // ini untuk ukuran 800KB, 1000000 untuk 1 MB.
                   alert("Maaf. File Terlalu Besar ! Maksimal Upload 10 MB");
                   this.value = "";
                };
            };
            </script>  
{{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script> --}}
<script>
    $("#inputFile").change(function(event) {  
      fadeInAdd();
      getURL(this);    
    });

    $("#inputFile").on('click',function(event){
      fadeInAdd();
    });

    function getURL(input) {    
      if (input.files && input.files[0]) {   
        var reader = new FileReader();
        var filename = $("#inputFile").val();
        filename = filename.substring(filename.lastIndexOf('\\')+1);
        reader.onload = function(e) {
          debugger;      
          $('#imgView').attr('src', e.target.result);
          $('#imgView').hide();
          $('#imgView').fadeIn(500);      
          $('.custom-file-label').text(filename);             
        }
        reader.readAsDataURL(input.files[0]);    
      }
      $(".alert").removeClass("loadAnimate").hide();
    }

    function fadeInAdd(){
      fadeInAlert();  
    }
    function fadeInAlert(text){
      $(".alert").text(text).addClass("loadAnimate");  
    }
</script>
@endpush