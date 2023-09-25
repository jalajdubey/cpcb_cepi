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
        <h3 class="card-title">List of PIA</h3>
        <a class="butn btn" href="{{ route('home') }}">Back</a>
    </div>
    <div class="card-body">
        <table id="example1" class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>S.No</th>
                    <th>PIA Name</th>
                    <th>Water Environment</th>
                    <th>Air Enviornment</th>
                    <th>Land Environment</th>
                    <th>Other Infrastructure/renewal measures</th>
                    <th>Pre-Monsoon/Post-Monsoon CEPI monitoring</th>
                </tr>
            </thead>
            <?php $i=0;?>
                @foreach($fetchData as $items)
                <?php $i++;?>
                <tr>
                    <td>{{$i}}</td>
                    <td><a href="">{{$items->PIAName}}</a></td>
                    <td>{{$items->water}}</td>
                    <td>{{$items->air}}</td>
                    <td>{{$items->land}}</td>
                    <td>{{$items->other}}</td>
                    <td>{{$items->pre_post}}</td>
                </tr>
                @endforeach
           
            
        </table>
    </div>
</div>
@endsection