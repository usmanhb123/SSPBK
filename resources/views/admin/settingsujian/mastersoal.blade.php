@extends('layouts.app')
@section('content')
 <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
      
          <div class="page-header">
           <h4 class="page-title">Master Soal</h4>
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
           </ul>
       </div>
           @include('layouts.alert')
         
   

        <div class="row">
            <div class="col-lg-8">
                <form action="{{url('mastersoal')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('POST')
                <div class="card">
                    <div class="card-header">
                        <h3 class="text-center">Buat Master Soal</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="card text-center">
                                    <label for="inputFile" class="mt-1">Cover Soal</label>
                                    <div class="imgWrap">
                                        <img src="{{asset('/img/image.png')}}" id="imgView" class="card-img-top img-fluid">
                                    </div>
                                    <div class="card-body">
                                        <div class="custom-file">
                                            <input type="file" id="inputFile" name="file" class="imgFile custom-file-input" aria-describedby="inputGroupFileAddon01" required>
                                            <label class="custom-file-label" for="inputFile">Choose Image</label>
                                        </div>
                                    </div>
                                    @error('file')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-8">
                
                                <div class="form-group">
                                    <label for="nama">Nama Master Soal</label>
                                <input type="text" class="form-control" name="nama" id="nama" @if (old('nama'))
                                value="{{old('nama')}}"
                                    @else
                                    value="{{$user->nama}}"
                                @endif  required>
                                    
                                </div>
                             
                                <div class="form-group">
                                    <label for="keterangan">Keterangan</label>
                                    <textarea class="form-control" name="keterangan" id="keterangan" rows="5" required></textarea>
                                </div>
                                </div>
                                </div>
                                <div class="text-right">
                                <button class="btn btn-round btn-success" type="submit">
                                    <span class="btn-label">
                                        <i class="fa fa-save"></i>
                                    </span>
                                    Save
                                </button>
                           
                        </div>
                    </div>
                </div>
                </form>
            </div>
            <div class="col-lg-4">
                <img src="{{asset('/img/master_soal.svg')}}" width="90%">
            </div>
        </div>
        <h1 class="text-center">Daftar Master Soal</h1>
        <div class="row">
            @foreach ($master as $item)
    
          <div class="col-md-4">
                <div class="card card-post card-round">
                    <img class="card-img-top" src="{{asset('/img/master_soal/'.$item->cover)}}" alt="Card image cap">
                    <div class="card-body">
                        
                        <h3 class="card-title">
                            {{$item->nama}}
                        </h3>
                        <p class="card-text">{{$item->keterangan}}</p>
                        <a href="{{url('/mastersoal/'.$item->id.'/edit')}}" class="btn btn-primary btn-rounded btn-sm">Read More & Edit</a>
                        <a href="{{url('/mastersoal/'.$item->id)}}" class="btn btn-primary btn-danger btn-round btn-sm" onclick="return confirm('Data yang sudah dihapus tidak dapat dikembalikan!')">Remove</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        
        
    </div>
    
    
    
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