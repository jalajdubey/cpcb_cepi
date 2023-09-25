@extends('layouts.components.master')
@section('contents')
<style>
.butn {
    margin-left: 81%;
    background-color: #AC3E31;
    color: #fff !important;
}

.page-item.active .page-link {
    z-index: 3;
    color: #fff;
    background-color: #1C4E80;
    border-color: #1C4E80;


}

.btn-primary {
    color: #fff !important;
    background-color: #6AB187 !important;
    border-color: #6AB187 !important;
    margin-top: -7px;
    margin-bottom: 11px;
}
</style>
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Total Monitoring Report</h3>
         <a class="butn btn" href="{{ route('home') }}">Back</a>
    </div>
    <div class="card-body">
        <table id="example1" class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>S.No</th>
                    <th>State</th>
                    <th>User</th>
                    <th>Industrial Area</th>
                    <th>Epi Air</th>
                    <th>Epi Water</th>
                    <th>Epi Land</th>
                    <th>Report</th>
                    <th>Report Type</th>
                    <th>Remark</th>
                    <th>Date</th>
                
                </tr>
            </thead>
            <?php $i=0;?>
                @foreach($fetchData as $items)
                <?php $i++;?>
                <tr>
                    <td>{{$i}}</td>
                    <td>{{$items->state_name}}</td>
                    <td>@php if($items->Role_User===1){echo 'CPCB';} else{echo 'Industrial Area';} @endphp</td>
                    <td>{{$items->PIAName}}</td>
                    <td>{{$items->epi_air}}</td>
                    <td>{{$items->epi_water}}</td>
                    <td>{{$items->epi_land}}</td>
                    <td><a href="{{ url('upload/monitoringReport/'.$items->report)}}" target="_blank"><b>View</b></a></td>
                    <td>{{$items->report_type}}</td>
                    <td>{{$items->remark}}</td>
                    <td>{{$items->created_at}}</td>
                </tr>
                @endforeach
            
        </table>
    </div>
</div>
@endsection