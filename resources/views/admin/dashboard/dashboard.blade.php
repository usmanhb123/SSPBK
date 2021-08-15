@php
    use App\Models\User;
@endphp

@extends('layouts.app')
@section('content')
 <!-- Begin Page Content -->
 
 <!-- Page Heading -->
      	<div class="panel-header bg-primary-gradient">
              <div class="page-inner py-5">
                <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
                    <div>
                        <h2 class="text-white pb-2 fw-bold">Selamat Datang {{$user->name}}</h2>
                        <h5 class="text-white op-7 mb-2">
                         Sistem Seleksi Pegawai Berbasis Komputer
                          </h5>
                    </div>
                    
                </div>
            </div>
          </div>
          <div class="page-inner mt--5">
            <div class="row mt--2">
@foreach ($data_ws as $item)
@php
    $count = User::where('data_work_section_id', $item->id)->count();
@endphp
<div class="col-md-4">
  <div class="card full-height">
      <div class="card-header text-center"><b><h4>{{$item->nama_posisi}}</h4></b></div>
      <div class="card-body">
         <div class="text-center"> <b>

           <h1>{{$count}}</h1>
           <p>Peserta</p>
          </b>
          </div>
      </div>
  </div>
</div>
@endforeach
              
           





               
            </div>
          </div>
            <div class="container-fluid">

            @include('layouts.alert')
         
            <div class="text-center">
              <img src="{{asset('/img/dashboard.svg')}}" width="90%">
            </div>
        </div>







@endsection