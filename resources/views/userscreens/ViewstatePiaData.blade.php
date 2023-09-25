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
        <h4 class="card-title">Category Wise Action Point Count</h4>
         <a class="butn btn" href="{{ route('home') }}">Back</a>
    </div>
    <div class="card-body">
        <table id="example1" class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>S.No</th>
                    <th>Industrial Area</th>
                    <th>Total</th>
                    <th>Water Environment</th>
                    <th>Air Enviornment</th>
                    <th>Land Environment</th>
                    <th>Infrastructure/renewal measures</th>
                    <th>Other</th>
                
                </tr>
            </thead>
            <?php $i=0;?>
                @foreach($fetchData as $items)
                <?php $i++;?>
                <tr>
                    <td>{{$i}}</td>
                    <td><a href="{{route('categactionpoints',['_id'=> $items->user_id, '_tcount'=>'_tcount'])}}">{{$items->PIAName}}</a></td>
                    <td><a href="{{route('categactionpoints',['_id'=> $items->user_id, '_tcount'=>'_tcount'])}}">{{$items->totalpiacount}}</a></td>
                    <td><a href="{{route('categactionpoints',['_id'=> $items->user_id, '_water'=>'_water'])}}">{{$items->water}}</a></td>
                    <td><a href="{{route('categactionpoints',['_id'=> $items->user_id, '_air'=>'_air'])}}">{{$items->air}}</td>
                    <td><a href="{{route('categactionpoints',['_id'=> $items->user_id, '_land'=>'_land'])}}">{{$items->land}}</td>
                    <td><a href="{{route('categactionpoints',['_id'=> $items->user_id, '_pre_post'=>'_pre_post'])}}">{{$items->pre_post}}</td>
                    <td><a href="{{route('categactionpoints',['_id'=> $items->user_id, '_other'=>'_other'])}}">{{$items->other}}</td>
                </tr>
                @endforeach
            
        </table>
    </div>
</div>
@endsection