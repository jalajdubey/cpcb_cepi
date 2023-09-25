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
        <h3 class="card-title">List of Other Infrastructure/renewal measures Environment</h3>
    </div>
    <div class="card-body">
        <table id="example1" class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>S.No</th>
                    <th>Years</th>
                    <th>Catagries</th>
                    <th>Action Point</th>
                    <th>Responsible Ageancy</th>
                    <th>Timeline</th>
                    <th>Financial Requirement</th>
                    <th>Present Status</th>
                </tr>
            </thead>
            <?php $i=0;?>
                @foreach($data as $items)
                <?php $i++;?>
                <tr>
                    <td>{{$i}}</td>
                    <td>{{$items->financial_year}}</td>
                    <td>{{$items->catagries}}</td>
                    <td>{{$items->action_point}}</td>
                    <td>{{$items->responsible_ageancy}}</td>
                    <td>{{$items->timeline}}</td>
                    <td>{{$items->financial_requirement}}</td>
                    <td>{{$items->present_status}}</td>
                </tr>
                @endforeach
            
        </table>
    </div>
</div>
@endsection