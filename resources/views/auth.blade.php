<!doctype html>
<html>
  <head>
      <meta charset='utf-8'>
      <meta name='viewport' content='width=device-width, initial-scale=1'>
      <title>Sistem Seleksi Pegawai Berbasis Komputer</title>
      <link href="{{asset('css/bootstrap.min.css')}}" rel='stylesheet'>
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
                        <h3 class="mb-0 ml-5 mr-4 mt-4">Sistem Seleksi Pegawai Berbasis Komputer</h3>
                        
                    </div>   
                    <div class="row px-3 justify-content-center mt-4 mb-5 border-line"> <img src="{{asset('/img/login.svg')}}" class="image"> </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card2 card border-0 px-4 py-5">

                <form method="POST" action="{{url('/login')}}" class="user">
                        @csrf
                        @method('POST')
                        <div class="row mb-4 px-3">
                          <h4 class="mb-0 mr-4 mt-4">Silahkan Login!</h4>
                        </div>
                    <div class="row px-3"> <label class="mb-1">
                            <h6 class="mb-0 text-sm">Email Address</h6>
                        </label> <input class="mb-4" type="text" name="email" placeholder="Masukan Alamat Email" required> </div>
                        
                    <div class="row px-3"> <label class="mb-1">
                            <h6 class="mb-0 text-sm">Password</h6>
                        </label> <input type="password" name="password" placeholder="Masukan password" required> </div>
                    <div class="row px-3 mb-4">
                         <a class="small ml-auto mb-0 text-sm" href="#"  data-toggle="modal" data-target="#exampleModal">Forgot password!</a>
                    </div>
                    <div class="row mb-3 px-3"> <button type="submit" class="btn  text-center text-white" style="background : #007bff;">Login</button> </div>
                    <div class="row mb-4 px-3"> <small class="font-weight-bold">Don't have an account? <a class="text-danger " href="{{route('register')}}">Register</a></small> </div>
                </div>
            </div>
</form>
        </div>
        <div class=" py-4" style="background : #007bff;">
            <div class="row px-3"> <small class="ml-4 ml-sm-5 mb-2 text-white">Copyright &copy; 2021. All rights reserved.</small>
                <div class="social-contact ml-4 ml-sm-auto text-white"> <span class="fa fa-facebook mr-4 text-sm"></span> <span class="fa fa-google-plus mr-4 text-sm"></span> <span class="fa fa-linkedin mr-4 text-sm"></span> <span class="fa fa-twitter mr-4 mr-sm-5 text-sm"></span> </div>
            </div>
        </div>
    </div>
</div>
    <script type='text/javascript' src='https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js'></script>
        
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Forgot Password</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="{{url('login/1')}}" method="POST">
              @csrf
              @method('DELETE')
            <div class="form-group">
              {{-- <label>I :</label> --}}

                        <input type="Email" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Email@mymail.com" maxlength="50" name="email">

            </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Next</button>
        </div>
      </div>
      </div>
      </div>
</form>
   </body>
 </html>