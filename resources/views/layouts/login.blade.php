
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>@yield('title')</title>

  <!-- Custom fonts for this template-->
   <link rel="stylesheet" href="{{asset('/css/bootstrap.min.css')}}">
  <link rel="stylesheet" href="{{asset('/css/atlantis.min.css')}}">
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link rel="stylesheet" href="{{asset('/css/demo.css')}}">

</head>

<body class="bg-gradient-primary">

            @yield('content')

 <!--   Core JS Files   -->
  <script src="{{asset('/js/core/jquery.3.2.1.min.js')}}"></script>
  <script src="{{asset('/js/core/bootstrap.min.js')}}"></script>
  <!-- jQuery UI -->
  <!-- Atlantis JS -->
  <script src="{{asset('/js/atlantis.min.js')}}"></script>
  <!-- Atlantis DEMO methods, don't include it in your project! -->
 
</body>

</html>
