@extends('layouts.components.master')
@section('contents')
<section class="content">
   <div class="container-fluid">
      <div class="row" style="margin-top: 10px;">
         <div class="col-lg-3 col-8">
            <div class="small-box bg-info">
               <div class="inner">
                  <h3>{{$countPIAs}}</h3>
                  <p>Total Registered Industrial Areas(PIA)</p>
               </div>
               <div class="icon">
                  <i class="ion ion-bag"></i>
               </div>
               <a href="{{route('PIAList')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
         </div>
        
         <div class="col-lg-3 col-8">
            <div class="small-box bg-success">
               <div class="inner">
                  <h3>{{$actionPlanCount}}</h3>
                  <p>View Action Points</p>
               </div>
               <div class="icon">
                  <i class="ion ion-stats-bars"></i>
               </div>
               <a href="{{route('viewAdminPIAdata')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
         </div>
         <div class="col-lg-3 col-8">
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>{{$countMonitoringReport}}</h3>
                    <p>Total Monotoring Reports</p>
                </div>
                <div class="icon">
                    <i class="ion ion-bag"></i>
                </div>
                <a href="{{route('view_M_Report', ['unq'=>'pia'])}}" class="small-box-footer">More info <i
                        class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
      </div>
   </div>
</section>
@endsection