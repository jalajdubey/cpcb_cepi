<!DOCTYPE html>
<!--
   This is a starter template page. Use this page to start your new project from
   scratch. This page gets rid of all links and provides the needed markup only.
   -->
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>Plastic</title>
      <link rel="stylesheet" href="{{asset('css/app.css')}}">
      <link rel="stylesheet" href="{{asset('css/skins/_all-skins.min.css')}}" />
      <link rel="stylesheet" href="{{asset('plugins/fontawesome-free/css/all.css')}}" />
      <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
      <script src="{{ asset('plugins/chart.js/Chart.min.js') }}"></script>
      <!-- Bootstrap 4 -->
      <script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
      <script src="{{ asset('plugins/chart.js/Chart.min.js') }}"></script>
      <script src="{{ asset('dist/js/adminlte.min.js') }}"></script>
   </head>
   <body class="hold-transition sidebar-mini">
      <div class="wrapper">
         <!-- Navbar -->
         @include('layouts.components.header')
         <!-- /.navbar -->
         <!-- Main Sidebar Container -->
         <aside class="main-sidebar  elevation-4" style="background:#1762b3;
            color: #fff;">
            <!-- Brand Logo -->
            <!-- Sidebar -->
            @include('layouts.components.leftsidebar')
            <!-- /.sidebar -->
         </aside>
         <!-- Content Wrapper. Contains page content -->
         <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
               <div class="container-fluid">
               </div>
               <!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->
            <!-- Main content -->
            @yield("contents")
            <!-- /.content -->
         </div>
         <!-- /.content-wrapper -->
         <!-- Control Sidebar -->
         <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
            <div class="p-3">
               <h5>Title</h5>
               <p>Sidebar content</p>
            </div>
         </aside>
         <!-- /.control-sidebar -->
         <!-- Main Footer -->
         @include('layouts.components.footer')
      </div>
      <!-- ./wrapper -->
      <!-- REQUIRED SCRIPTS -->
      <!-- ChartJS -->
   </body>
</html>