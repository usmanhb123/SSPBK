@php
    use App\Models\Data_soal_jawaban;
    use App\Models\Data_jawaban_ujian;
@endphp
@extends('layouts.login')
@section('content')
 <!-- Begin Page Content -->
        <div class="container-fluid mt-4">
                             
            <div class="row justify-content-center fixed-top" id="demo"></div>
                
              <input type="hidden" value="{{$durasi}}" id="waktuakhir">
           
            <div class="row">
                <div class="col-lg-9">
                    <div class="card">
                        <div class="card-header">
                            <h2>
                                No {{ $soal->currentPage() }}
                
                            </h2>
                        </div>
                        <div class="card-body">
                            @foreach ($soal as $ds)
                           
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
                                   <p class="ml-2">
                                    
                                       {{$ds->isi_soal}}
                                    </p>
                                    <form action="{{url('/savejawaban')}}" method="POST">
                                        @csrf
                                        @method('POST')
                                    <div class="mt-3">
                                        <input type="hidden" name="data_ujian_id" value="{{$id}}">
                                        <input type="hidden" name="data_soal_id" value="{{$ds->id}}">
                                        <input type="hidden" name="nomor" value="{{$soal->currentPage()+1}}">
                                        @php
                                            $jawaban = Data_jawaban_ujian::where('data_soal_id', $ds->id)->where('users_id', $user->id)->first();
                                        @endphp
                                        @if($ds->type_soal == "Essay")
                                        <div class="form-group">
                                            <label for="comment">Jawaban :</label>
                                            <textarea class="form-control" id="comment" rows="7" name="jawaban">@if ($jawaban !== NULL){{$jawaban->jawaban_essay}}@endif</textarea>
                                        </div>
                                        @endif
                                        @if($ds->type_soal == "Jawaban Singkat")
                                        <div class="form-group">
                                            <label for="jasind">Jawaban :</label>
                                            <input id="jasind" class="form-control" type="text" name="jawaban"@if ($jawaban !== NULL) value="{{$jawaban->jawaban_essay}}" @endif>
                                        </div>
                                        @endif
                                        @if($ds->type_soal == "Pilihan Ganda")
                                        
                                        @php
                                         $pg = Data_soal_jawaban::where('data_soal_id', $ds->id)->get();   
                                        @endphp  
                                        @foreach ($pg as $item)
                                       
                                        <div class="frb-group">

                                            <div class="frb frb-success">
                                                <input type="radio" id="radio-button-{{$item->id}}" name="jawaban" value="{{$item->id}}" @if ($jawaban !== NULL)
                                                    @if($jawaban->data_soal_jawaban_id == $item->id)
                                                    checked
                                                    @endif
                                                @endif />
                                                <label for="radio-button-{{$item->id}}">
                                                    <span class="frb-description">{{$item->isi_jawaban}}</span>
                                            </div>
                                        </div>
                                   
                                        @endforeach
                                 
                                      @endif
                                     

                                    </div>
                            @endforeach    
                            <div class="text-center">
                                @php
                                  $back =  $soal->currentPage()-1
                                @endphp
                                <a href="{{url('/ujianberlangsung/'.$id.'?page='.$back)}}" class="btn btn-round btn-primary"><i class="fas fa-angle-double-left"></i> Sebelumnya</a>    
                                <button type="submit" class="btn btn-round btn-success">Selanjutnya <i class="fas fa-angle-double-right"></i></button>    
                            </div>  
                            </form>                   
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="card">
                        <div class="card-header">
                            Pintasan Nomor
                        </div>
                        <div class="card-body">
                            <div class="row mx-2">
                                
                            @foreach ($soalall as $no => $item)
                            @php
                                $page = $no+1;
                           
                             $ll = Data_jawaban_ujian::where('data_soal_id', $item->id)->where('users_id', $user->id)->first();
                         @endphp
                                 <a href="{{url('/ujianberlangsung/'.$id.'?page='.$page)}}" @if ($ll !== NULL) class="btn btn-primary col-sm-3 mx-1 mt-1"
                                    @else 
                                    class="btn btn-primary btn-border col-sm-3 mx-1 mt-1"
                                    @endif>{{$no+1}}</a>
                            @endforeach
                            </div>
                            
                            <div class="text-left mt-3">
                                <h5>keterangan :</h5>
                                <button class="btn btn-primary col-sm-3 mx-1 mt-1"></button> : Sudah Dikerjakan <br>
                                <button class="btn btn-primary btn-border col-sm-3 mx-1 mt-1"></button> : Belum Dikerjakan <br>
                            </div>
                            <div class="text-right mt-3">
                                <a href="{{url('/selesaiujian/'.$id)}}" class="btn btn-round btn-warning" onclick="return confirm('Anda akan menyelesaikan ujian, periksa kembali jawaban anda sebelum menyelesaikan ujian ini!')">Hentikan Ujian</a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
         
        </div>





        <script>
            // Set the date we're counting down to
            var a = document.getElementById("waktuakhir").value;
            // alert(a);
            var b = new Date(a).getTime();
          
          
            // Update the count down every 1 second
            var x = setInterval(function() {
          
              // Get today's date and time
              var now = new Date().getTime();
          
              // Find the distance between now and the count down date
              var distance = b - now;
          
              // Time calculations for days, hours, minutes and seconds
              var days = Math.floor(distance / (1000 * 60 * 60 * 24));
              var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
              var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
              var seconds = Math.floor((distance % (1000 * 60)) / 1000);
          
              var card = "<div class='card text-white bg-danger text-center justify-content-center'><div class='card-body'><b>Tidak diperbolehkan untuk meninggalkan halaman ini !!</b><br><b>Ujian akan berakhir pada : </b>" + hours + " Jam " + minutes + " Menit " + seconds + " Detik</div></div>";
              var card1 = "<div class='card text-white bg-success text-center justify-content-center'><div class='card-body'><b>Waktu habis. </b>Terimakasih sudah mengikuti ujian semoga sukses.</div></div>";
              // Output the result in an element with id="demo"
              document.getElementById("demo").innerHTML = card;
          
              // If the count down is over, write some text 
              if (distance < 0) {
                clearInterval(x);
                document.getElementById("demo").innerHTML = card1, 4500;
                window.location.href = "{{url('/selesaiujian/'.$id)}}";
              }
            }, 1000);
          </script>
@endsection
