<!doctype html>
<html>
  <head>
      <meta charset='utf-8'>
      <meta name='viewport' content='width=device-width, initial-scale=1'>
      <title>Sistem Seleksi Pegawai Berbasis Komputer</title>
      <link href={{asset('css/bootstrap.min.css')}} rel='stylesheet'>
      <link href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css' rel='stylesheet'>
      <link href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css' rel='stylesheet'>
      <link href={{asset('/css/style.css')}} rel='stylesheet'> 
      <script type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
      </head>
  <body oncontextmenu='return false' class='snippet-body'>
      <div class="container-fluid px-1 px-md-5 px-lg-1 px-xl-5 py-5 mx-auto">
    <div class="card card0 border-0">
        <div class="row d-flex">
            <div class="col-lg-6">
                <div class="card1 pb-5">
                <div class="row mb-4 px-3">
                        <h3 class="mb-0 ml-5 mr-4 mt-4 mb-5">Sistem Seleksi Pegawai Berbasis Komputer</h3>
                        
                    </div>   
                    <div class="row px-3 justify-content-center mt-5 mb-5 border-line"> <img src="{{asset('/img/undraw_Questions_re_1fy7.svg')}}" class="image"> </div>
                </div>
            </div>
            <div class="col-lg-6">
              <div class="card2 card border-0 px-4 py-5">
                <h3 class="mb-3">Register Account</h3>
              <form method="POST" action="{{route('register')}}" role="form">
                @csrf
        <div class="form-group row">
          <div class="col-sm-12 mb-3 mb-sm-0">
            <input type="text" name="name" id="name" maxlength="19" value="{{old('name')}}" class="form-control form-control-user" required="" minlength="5" maxlength="15" id="exampleFirstName" placeholder="Full Name">

                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
          </div>
          <div class="col-sm-12 mb-3 mb-sm-0">
            <input type="number" name="nik" id="nik" maxlength="19" value="{{old('nik')}}" class="form-control form-control-user" required="" minlength="5" maxlength="15" id="exampleFirstnik" placeholder="NIK">

                        @error('nik')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
          </div>
          <div class="col-sm-12 mb-3 mb-sm-0">
           <textarea name="alamat" id="alamat" cols="20" rows="3" class="form-control" required>Your Address</textarea>
          </div>
          
        </div>
        <div class="form-group">
          <input type="number" name="telepon" id="telepon" maxlength="19" value="{{old('telepon')}}" class="form-control form-control-user" required="" minlength="5" maxlength="15" id="exampleFirsttelepon" placeholder="Your Phone Number">

                      @error('nik')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
        </div>
        <div class="form-group">
     
												<select class="form-control form-control-user" id="defaultSelect" name="job_desk">
													<option>Pilih Work Section / Bagian Pekerjaan</option>
												@foreach ($job_desk as $item)
                        <option value="{{$item->id}}">{{$item->nama_posisi}}</option>
                        @endforeach
													
												</select>
        </div>
        <div class="form-group">
          <input type="email" name="email" id="email" value="{{ old('email') }}" class="form-control form-control-user" id="exampleInputEmail" placeholder="Email Address" required="">
                          @error('email')
                            <span>
                                <strong class="text-danger"> &nbsp;{{ $message }}</strong>
                            </span>
                        @enderror
        </div>
        <div class="form-group row">
          <div class="col-sm-6 mb-3 mb-sm-0">
            <input type="password" id="pw1" name="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Password" minlength="8" required>
            
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
          </div>
          <div class="col-sm-6">
            <input type="password" id="pw2" name="password_confirmation" class="form-control form-control-user" id="exampleRepeatPassword" placeholder="Repeat Password" minlength="8" required>
          </div>
        </div>
        <button type="submit" class="btn btn-primary btn-user btn-block">
          Register Account
        </button>
      
      </form>


      <div class="text-center">
        <a class="small" href="/login">Already have an account? Login!</a>
      
        </div>
    </div>

            </div>

        </div>
        <div class=" py-4" style="background : #007bff;">
            <div class="row px-3"> <small class="ml-4 ml-sm-5 mb-2 text-white">Copyright &copy; 2021. All rights reserved.</small>
                <div class="social-contact ml-4 ml-sm-auto text-white"> <span class="fa fa-facebook mr-4 text-sm"></span> <span class="fa fa-google-plus mr-4 text-sm"></span> <span class="fa fa-linkedin mr-4 text-sm"></span> <span class="fa fa-twitter mr-4 mr-sm-5 text-sm"></span> </div>
            </div>
        </div>
    </div>
</div>
    <script type='text/javascript' src='https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js'></script>
        
    <script type="text/javascript">
      window.onload = function () {
          document.getElementById("pw1").onchange = validatePassword;
          document.getElementById("pw2").onchange = validatePassword;
      }
      function validatePassword(){
          var pass2=document.getElementById("pw2").value;
          var pass1=document.getElementById("pw1").value;
          if(pass1!=pass2)
              document.getElementById("pw2").setCustomValidity("Passwords Tidak Sama, Coba Lagi");
          else
              document.getElementById("pw2").setCustomValidity('');
      }
  </script>
   </body>
 </html>