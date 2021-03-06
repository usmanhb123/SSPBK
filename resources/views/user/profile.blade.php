
@extends('layouts.app')
@section('content')
 <!-- Begin Page Content -->
   <div class="row">
              <div class="col-lg-6 d-none d-lg-block bg-password-image"></div>
              <div class="col-lg-12">
                <div class="p-5">
                  <div class="text-center">
					@include('layouts.alert')
					<div class="avatar avatar-xxl">
						<img src="{{asset('/img/profile_user/'. $user->image)}}" alt="..." class="avatar-img rounded-circle">
					</div>
				<h2>ID {{$user->id}}</h2>
				<h1 class="h4 text-gray-900 mb-2">{{$user->name}} <br> {{$role->user_role->role}} </h1>
				<p class="mb-4">Your E-mail {{$user->email}} <br> Your Phone {{$user->telepon}} <br> Your Address {{$user->alamat}}<br> Member since {{$user->created_at}} - Last modified {{$user->updated_at}}</p>
                  
				  </div>
				  <center class="mb-5">

					  {{-- <button class="btn btn-round btn-primary">
					<span class="btn-label">
						<i class="
						fas fa-key
						"></i>
					</span>
					ChangePassword
				</button> --}}
			<a href="{{url('password')}}" class="btn btn-round btn-success">
					<i class="fas fa-user-lock"></i><span class="btn-label">
				
					</span>
					ChangePassword
				</a>
			<a href="{{url('user')}}/{{$user->id}}/edit" class="btn btn-round btn-primary mt-1">
					<i class="fas fa-user-edit"></i><span class="btn-label">
					
					</span>
					ChangeProfile
				</a>
				

			</center>
			@if ($user->maps)
				
			
			<center>
				<h1 class="h4 text-gray-900 mb-2">The User's Home Location :</h1>
			<iframe src="{{$user->maps}}" width="100%" height="100%" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
			</center>

			@endif
                  {{-- <form class="user" action="/password" method="POST">
                    @csrf
                    <div class="form-group">
                      <input type="password" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" name="password" placeholder="Enter your password...">
                    </div>
                    <button type="submit" class="btn btn-primary btn-user btn-block">
                      Check Password
                    </button>
                  </form> --}}
                  <hr>
                
                </div>
              </div>
            </div>


@endsection