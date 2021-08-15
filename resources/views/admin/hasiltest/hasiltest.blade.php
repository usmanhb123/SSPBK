@php
    use App\Models\User;
@endphp
@extends('layouts.app')
@section('content')
 <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="page-header">
            <h4 class="page-title">Hasil Test Peserta</h4>
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
                    <a href="#">Hasil Test Peserta</a>
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
                                    <div class="row">
                                        <div class="col-lg-8">

                                            <h2>
                                                {{$item->nama_posisi}}
        
                                            </h2>
                                        </div>
                                        <div class="col-lg-4 text-right">
                                            <a href="{{url('/hasiltestpeserta/'.$item->id.'/edit')}}" class="btn btn-secondary btn-sm btn-round"><i class="fas fa-print"></i> Print</a>
                                        </div>
                                    </div>
                                @php
                                    $cek = User::where('data_work_section_id', $item->id)->first();
                                @endphp
                                
                                @if ($cek)                        
                                <div class="table-responsive">
                                    <table class="table table-hover" >
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Foto</th>
                                                <th>Nama</th>
                                                <th>Email</th>
                                                <th>Telepon</th>
                                                <th>Alamat</th>
                                                <th style="width: 10%">Action</th>
                                            </tr>
                                        </thead>
                                      
                                        <tbody>  
                                        @foreach ($item->user as $no => $as)
                                        <tr>
                                            <td>{{$no+1}}</td>
                                            <td>
                                                <a href="{{asset('/img/profile_user/'. $as->image)}}" download="{{$as->name }}">
                                                    <div class="avatar avatar-sm">
                                                        <img src="{{asset('/img/profile_user/'. $as->image)}}" alt="..." class="avatar-img rounded-circle">
                                                    </div>
                                                </a>
                                            </td>
                                            <td>{{$as->name}}</td>
                                            <td>{{$as->email}}</td>
                                            <td>{{$as->telepon}}</td>
                                            <td>{{$as->alamat}}</td>
                                            <td style="width: 10%"><a href="{{url('/hasiltestpeserta/'.$as->id)}}" class="btn btn-success btn-round btn-sm"> <i class="fas fa-copy"></i> Detail</a></td>
                                        </tr>
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