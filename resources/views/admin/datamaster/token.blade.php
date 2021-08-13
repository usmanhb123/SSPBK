@extends('layouts.app')
@section('content')
 <!-- Begin Page Content -->
        <div class="container-fluid">
            <div class="page-header">
                <h4 class="page-title">Data Token</h4>
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
                        <a href="#">Data Token</a>
                    </li>
                </ul>
            </div>
          <!-- Page Heading -->
      
           @include('layouts.alert')
         
           <div class="row">
               <div class="col-lg-6">
                   <div class="card">
                       <div class="card-header text-center">
                           <h2>
                               Data Token Ujian/Test
                               </h2>
                       </div>
                       <form action="{{url('datatoken')}}" method="POST">
                        @csrf
                        @method('POST')
                        <div class="card-body">
                            <div class="form-group">
                                <input id="token" class="form-control" type="text" name="token" value="{{$token->token}}">
                            </div>
                            <div class="text-right">
                                <button type="submit" class="btn btn-primary btn-success btn-round"> <i class="fas fa-save"></i> Save Token</button>
                            </div>
                        </div>
                    </form>
                   </div>
               </div>
               <div class="col-lg-6">
                 
                <img src="{{asset('/img/login.svg')}}" width="90%">

               </div>
           </div>
        </div>







@endsection