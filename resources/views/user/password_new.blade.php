
@extends('layouts.app')
@section('content')
 <!-- Begin Page Content -->
   <div class="row">
              <div class="col-lg-6 d-none d-lg-block bg-password-image"></div>
              <div class="col-lg-12">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-2">Change Your Password?</h1>
                    <!-- <p class="mb-4">Enter your current password to change your password to a new one.!</p> -->
                    @include('layouts.alert')
                  </div>
                  <form class="user" action="/password/{{$user->id}}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                      <input type="password" class="form-control form-control-user" aria-describedby="emailHelp" id="pw1" name="password" placeholder="Enter a new password...">
                    </div> <div class="form-group">
                      <input type="password" class="form-control form-control-user" aria-describedby="emailHelp" id="pw2" placeholder="Enter the new password confirmation...">
                    </div>
                    <button type="submit" class="btn btn-primary btn-user btn-block">
                      Change Password
                    </button>
        <script type="text/javascript">
            window.onload = function () {
                document.getElementById("pw1").onchange = validatePassword;
                document.getElementById("pw2").onchange = validatePassword;
            }
            function validatePassword(){
                var pass2=document.getElementById("pw2").value;
                var pass1=document.getElementById("pw1").value;
                if(pass1!=pass2)
                    document.getElementById("pw2").setCustomValidity("Passwords Are Not the Same, Try Again");
                else
                    document.getElementById("pw2").setCustomValidity('');
            }
        </script>

                  </form>
                  <hr>
                
                </div>
              </div>
            </div>
     
      


@endsection