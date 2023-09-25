<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="csrf-token" content="{{ csrf_token() }}">
      <title>{{ config('app.name', 'EPA PORTAL') }}</title>
      <link rel="icon" href="http://cpcbeprplastic.in/plastic/assets/favicon.ico" type="image/x-icon">
      <link rel="stylesheet" href="{{ asset('css/wms.css') }}">
      <!-- Bootstrap CSS -->
      <link rel="stylesheet" href="{{asset('css/bs.css')}}">
      <link rel="stylesheet" href="{{ asset('css/stl.css') }}">
      <!-- Scripts -->
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
      <!-- Fonts -->
      <link rel="dns-prefetch" href="//fonts.gstatic.com">
      <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
      <!-- Styles -->
   </head>
   <body >
      <!----header strart here-->
      <div class="container-fluid ">
         <div class="row">
            <nav class="navbar navbar-expand-lg navbar-light">
            <div class="col-md-5" style="margin-top:50px">
                  
               <div class="" >
                        <img src="https://prana.cpcb.gov.in/assets/images/finalCpcb.png" alt="CPCB" class="header-parana pr-2 py-2">
                        <img src="https://prana.cpcb.gov.in/assets/images/parana.png" alt=" Portal for Regulation of Air pollution in Non-Attainment city." class="header-parana">
                       
                     </div>
                     <div class="ministry-style" style="float: left;font-size: 16px;line-height: 22px;font-weight: 400;"> Ministry of Environment, Forest and Climate Change Government of India </div>
               </div>
               <div class="col-md-7 body-parana">
                  <div id="parana-message">
                        <h4 >CEPI</h4>
                     <div class="prana-desc h7"> Comprehensive Environmental Pollution Index (CEPI) </div>
                  </div>
               </div>
               <div class="col-md-4">
                  <ul class="navbar-nav mr-auto float-right align-items-center">
                     <li class="nav-item login-button">
                        <a href="/login" class="nav-link pl-3 pr-3" style="color: #fff;">LOG IN</a>
                     </li>
                  </ul>
               </div>
            </nav>
         </div>
      </div><!---container closed here-->
      <nav class="navbar navbar-expand-sm navbar-dark mt-5" style="background-color:#1C4E80!important;color:#fff !important;height:40px"><!-- <a class="navbar-brand" href="#">Navbar</a> -->
         <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId"
            aria-expanded="false" aria-label="Toggle navigation"> hii </button>
         <div class="collapse navbar-collapse" id="collapsibleNavId">
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0" >
               <li class="nav-item active">
                  <a class="nav-link" href="{{route('landing')}}">Home <span class="sr-only">(current)</span></a>
               </li>
               <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="javascript:void(0)" id="dropdownId" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">CEPI</a>
                  <ul class="dropdown-menu" style="background-color:#1C4E80!important; padding-left:20px;">
                     <li><a href="{{asset('doc/1.pdf')}}" target="_blank">Background Of CEPI</a></li>
                     <li><a href="{{asset('doc/2.pdf')}}" target="_blank">CEPI Methodology (2016)</a></li>
                     <li><a href="{{asset('doc/3.pdf')}}" target="_blank">CEPI Score Based On Monitoring (2018)</a></li>
                     <li><a href="{{asset('doc/4.pdf')}}" target="_blank">Draft Report</a></li>
                   </ul>
               </li>
               <li class="nav-item">
                  <a class="nav-link" href="javascript:void(0)">FAQ</a>
               </li>
               <li class="nav-item">
                  <a class="nav-link" href="{{route('cepilogin')}}">Login</a>
               </li>
            </ul>
         </div>
      </nav>
      <main class="">
         @yield('content')
      </main>
      </div>
      <script src="{{asset('js/app.js')}}"></script>
   </body>
</html>