
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Sistem Seleksi Pegawai Berbasis Komputer</title>

  <script src="{{asset('/js/plugin/webfont/webfont.min.js')}}"></script>


  <script src="{{asset('/js/core/jquery.3.2.1.min.js')}}"></script>
  <link rel="stylesheet" href="{{asset('/css/fonts.min.css')}}">
  <link rel="stylesheet" href="{{asset('/css/bootstrap.min.css')}}">
  <link rel="stylesheet" href="{{asset('/css/atlantis.min.css')}}">
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link rel="stylesheet" href="{{asset('/css/demo.css')}}">
  <style>
    .frb-group {
      margin: 15px 0;
    }
  
    .frb~.frb {
      margin-top: 15px;
    }
  
    .frb input[type="radio"]:empty,
    .frb input[type="checkbox"]:empty {
      display: none;
    }
  
    .frb input[type="radio"]~label:before,
    .frb input[type="checkbox"]~label:before {
      font-family: FontAwesome;
      content: '\f096';
      position: absolute;
      top: 50%;
      margin-top: -11px;
      left: 15px;
      font-size: 22px;
    }
  
    .frb input[type="radio"]:checked~label:before,
    .frb input[type="checkbox"]:checked~label:before {
      content: '\f046';
    }
  
    .frb input[type="radio"]~label,
    .frb input[type="checkbox"]~label {
      position: relative;
      cursor: pointer;
      width: 100%;
      border: 1px solid #ccc;
      border-radius: 5px;
      background-color: #f2f2f2;
    }
  
    .frb input[type="radio"]~label:focus,
    .frb input[type="radio"]~label:hover,
    .frb input[type="checkbox"]~label:focus,
    .frb input[type="checkbox"]~label:hover {
      box-shadow: 0px 0px 3px #333;
    }
  
    .frb input[type="radio"]:checked~label,
    .frb input[type="checkbox"]:checked~label {
      color: #fafafa;
    }
  
    .frb input[type="radio"]:checked~label,
    .frb input[type="checkbox"]:checked~label {
      background-color: #f2f2f2;
    }
  
    .frb.frb-default input[type="radio"]:checked~label,
    .frb.frb-default input[type="checkbox"]:checked~label {
      color: rgb(7, 7, 7);
    }
  
    .frb.frb-primary input[type="radio"]:checked~label,
    .frb.frb-primary input[type="checkbox"]:checked~label {
      background-color: #337ab7;
    }
  
    .frb.frb-success input[type="radio"]:checked~label,
    .frb.frb-success input[type="checkbox"]:checked~label {
      background-color: #5cb85c;
    }
  
    .frb.frb-info input[type="radio"]:checked~label,
    .frb.frb-info input[type="checkbox"]:checked~label {
      background-color: #5bc0de;
    }
  
    .frb.frb-warning input[type="radio"]:checked~label,
    .frb.frb-warning input[type="checkbox"]:checked~label {
      background-color: #f0ad4e;
    }
  
    .frb.frb-danger input[type="radio"]:checked~label,
    .frb.frb-danger input[type="checkbox"]:checked~label {
      background-color: #d9534f;
    }
  
    .frb input[type="radio"]:empty~label span,
    .frb input[type="checkbox"]:empty~label span {
      display: inline-block;
    }
  
    .frb input[type="radio"]:empty~label span.frb-title,
    .frb input[type="checkbox"]:empty~label span.frb-title {
      font-size: 16px;
      font-weight: 700;
      margin: 5px 5px 5px 50px;
    }
  
    .frb input[type="radio"]:empty~label span.frb-description,
    .frb input[type="checkbox"]:empty~label span.frb-description {
      font-weight: normal;
      font-style: italic;
      color: #999;
      margin: 5px 5px 5px 50px;
    }
  
    .frb input[type="radio"]:empty:checked~label span.frb-description,
    .frb input[type="checkbox"]:empty:checked~label span.frb-description {
      color: #fafafa;
    }
  
    .frb.frb-default input[type="radio"]:empty:checked~label span.frb-description,
    .frb.frb-default input[type="checkbox"]:empty:checked~label span.frb-description {
      color: #999;
    }
  </style>
  <script src="https://use.fontawesome.com/b4564248e6.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/flipclock/0.7.8/flipclock.js"></script>
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
