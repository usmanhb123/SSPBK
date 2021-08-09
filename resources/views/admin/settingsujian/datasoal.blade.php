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
                                <button class="btn btn-round btn-sm btn-primary">Add Soal Pilihan Ganda</button>
                                <button class="btn btn-round btn-sm btn-warning">Add Soal Essay</button>
                                <button class="btn btn-round btn-sm btn-secondary">Add Soal Jawaban Singkat</button>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-9">

                                <div id="accordion">
                                    <div class="card">
                                      <div class="card-header" id="headingOne">
                                        <h5 class="mb-0">
                                          <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                            Soal Nomor #1
                                          </button>
                                        </h5>
                                      </div>
                                  
                                      <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                                        <div class="card-body">
                                          Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                                        </div>
                                      </div>
                                    </div>
                                    <div class="card">
                                      <div class="card-header" id="headingTwo">
                                        <h5 class="mb-0">
                                          <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                            Soal Nomor #2
                                          </button>
                                        </h5>
                                      </div>
                                      <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                                        <div class="card-body">
                                          Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                                        </div>
                                      </div>
                                    </div>
                                    <div class="card">
                                      <div class="card-header" id="headingThree">
                                        <h5 class="mb-0">
                                          <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                            Soal Nomor #3
                                          </button>
                                        </h5>
                                      </div>
                                      <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                                        <div class="card-body">
                                          Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                                        </div>
                                      </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="row">
                                    <div class="row col-lg-4 mb-1 mr-1">
                                        <button class="btn btn-lg btn-success">1</button>
                                    </div>
                                    <div class="row col-lg-4 mb-1 mr-1">
                                        <button class="btn btn-lg btn-success">1</button>
                                    </div>
                                    <div class="row col-lg-4 mb-1 mr-1">
                                        <button class="btn btn-lg btn-success">1</button>
                                    </div>
                                    <div class="row col-lg-4 mb-1 mr-1">
                                        <button class="btn btn-lg btn-success">1</button>
                                    </div>
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