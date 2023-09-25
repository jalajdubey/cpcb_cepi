@extends('layouts.components.master')
@section('contents')
<style>
.butn {
    margin-left: 75%;
    background-color: #AC3E31;
    color: #fff !important;
}
</style>
<div class="card">
    <div class="card-header">
        <h3 class="card-title">List of Registered PIA</h3>
        <a class="butn btn" href="{{ route('home') }}">Back</a> 
    </div>
    <div class="card-body p-0">
        <table id="example1" class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>S.No</th>
                    <th>State</th>
                    <th>PIA Count</th>
                    <th>CPA</th>
                    <th>SPA</th>
                    <th>OPA</th>
                </tr>
            </thead>
            <tbody>
                <?php $i=0;?>
                @foreach($piadatacount as $items)
                <?php $i++;?>
                <tr>
                    <td>{{$i}}</td>
                    <td>{{$items->state_name}}</td>
                    <td><a href="{{url('viewpialist/'.$items->state_id)}}">{{$items->totalcount}}</a></td>
                    <td><a href="{{url('viewcpalist/'.$items->state_id)}}">{{$items->cpa}}</a></td>
                    <td><a href="{{url('viewspalist/'.$items->state_id)}}">{{$items->spa}}</a></td>
                    <td><a href="{{url('viewopalist/'.$items->state_id)}}">{{$items->opa}}</a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection