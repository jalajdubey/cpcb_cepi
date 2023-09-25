@extends('layouts.components.master')
@section('contents')
<style>
    .bg-warningg{
        background-color: #94b16a !important;
        color: #fff;
    }
</style>
<section class="content">
    <div class="container-fluid">
        <div class="row" style="margin-top: 10px;">
            <div class="col-lg-3 col-8">
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3>{{$countstates}}</h3>
                        <p>Total List of Registered State Users</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-bag"></i>
                    </div>
                    <a href="{{route('viewState')}}" class="small-box-footer">More info <i
                            class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-8">
                <div class="small-box bg-success">
                    <div class="inner">
                        <h3>{{$countPIAs}}</h3>
                        <p>Total List of Registered Industrial Area(PIAs)</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-stats-bars"></i>
                    </div>
                    <a href="{{route('ViewRegisteredPIA')}}" class="small-box-footer">More info <i
                            class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-8">
                <div class="small-box bg-warning">
                    <div class="inner">
                        <h3>{{$actionPlanCount}}</h3>
                        <p>State Wise Action Plan Progress</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-person-add"></i>
                    </div>
                    <a href="{{route('viewAdminPIAdata')}}" class="small-box-footer">More info <i
                            class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-8">
                <div class="small-box bg-warning"> 
                    <div class="inner">
                        <h3>{{$MonitoringReport2018}}</h3>
                        <p>Monitoring Report By CPCB During The Year-2018</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-person-add"></i>
                    </div>
                    <a href="{{route('view_M_Report', ['unq'=>'cpcb'])}}" class="small-box-footer">More info <i
                            class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
        </div>
        <!-- SECOND ROW START-->
        <div class="row" style="margin-top: 10px;">
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
            <div class="col-lg-3 col-8">
                <div class="small-box bg-danger">
                    <div class="inner">
                        <h3>{{$countPIAs}}</h3>
                        <p>Industrial Area(PIA) Wise Action Plan Progress</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-person-add"></i>
                    </div>
                    <a href="{{route('ViewpiaProgressAction')}}" class="small-box-footer">More info <i
                            class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            
        </div>
    </div>
</section>
@endsection