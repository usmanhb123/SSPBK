@php
    use App\Models\Data_ujian;
    use App\Models\Data_soal;
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
            </ul>
        </div>
           @include('layouts.alert')
         
<div class="row">
    <div class="col-lg-3">
    <div class="card">
        <div class="card-header">
            <h3>Pilih Work Section</h3>
        </div>
        <div class="card-body">

            <div class="nav flex-column nav-pills nav-secondary" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                @foreach ($work_section as $item)
                <a class="nav-link" id="v-pills-{{$item->id}}-tab" data-toggle="pill" href="#v-pills-{{$item->id}}" role="tab" aria-controls="v-pills-{{$item->id}}" aria-selected="true">{{$item->nama_posisi}}</a>
                    
                @endforeach
              </div>
        </div>
    </div>
       
    </div>
    <div class="col-lg-9">
        <div class="card">
        
         <div class="card-body">
             <div class="row">
               
                 <div class="col-12 col-md-12">
                     <div class="tab-content" id="v-pills-tabContent">
                        <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                            <div class="text-center">

                                <img src="{{asset('/img/master_soal.svg')}}" width="50%">
                            </div>
                         

                        </div>
                @foreach ($work_section as $tb => $item)
                         <div class="tab-pane fade" id="v-pills-{{$item->id}}" role="tabpanel" aria-labelledby="v-pills-{{$item->id}}-tab">
                            <div class="row">
                                <div class="col-lg-12">
                                    <h2>
                                       Pilih Jadwal {{$item->nama_posisi}}
                                    </h2>
                                @php
                                    $cek = Data_ujian::where('data_work_section_id', $item->id)->where('is_active', 1)->first();
                                    $dataas = Data_ujian::where('data_work_section_id', $item->id)->where('is_active', 1)->get();
                                @endphp
                                
                                @if ($cek)
                                <div class="table-responsive">

                                    <table class="table table-hover" >
                                        <thead>
                                            <tr>
                                                <th>Nama Ujian</th>
                                                <th>Jadwal Ujian</th>
                                                <th style="width: 10%">Action</th>
                                            </tr>
                                        </thead>
                                        
                                        <tbody>  
                                            @foreach ($dataas as $no => $item)
                                            @php
                                                $cekessay = Data_soal::where('type_soal', 'Essay')->where('master_soal_id', $item->master_soal_id)->first();
                                          
                                            @endphp
                                            @if ($cekessay != NULL)
                                                
                                            <tr>
                                                <td>{{$item->nama_ujian}}</td>
                                                <td>{{$item->tanggal_mulai}} s/d {{$item->tanggal_mulai}}</td>
                                                <td style="width: 10%"><a href="{{url('/evaluasiessay/'.$item->id)}}" class="btn btn-success btn-round btn-sm">Evaluasi Jawaban Essay</a></td>
                                            </tr>
                                            @endif
                                            @endforeach
                                            
                                        </tbody>
                                    </table>
                                </div>
                                @else
                                <div class="text-center">

                                    <img src="{{asset('/img/undraw_No_data_re_kwbl.svg')}}" width="50%">
                                    <h1>Tidak Ada Data!</h1>
                                </div>
                                @endif
                                 
                                        
                                </div>
                            </div>
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







@endsection