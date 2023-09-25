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

.progress-container {
    height: 20px;
    background-color: #ddd;
    border-radius: 10px;
}

.progress {
    height: 20px;
    border-radius: 10px;
    background-color: #4CAF50;
    color: #fff;
    font-size: 16px;
    text-align: center;
    line-height: 20px;
}

</style>
<div class="card">
    <div class="card-header">
        <h3 class="card-title">State Wise Action Point Count</h3>
         <a class="butn btn" href="{{ route('home') }}">Back</a>
    </div>
    <div class="card-body">
        <table id="example1" class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>S.No</th>
                    <th>State</th>
                   
                    <th>Total Action Plan</th>
                    <th>Water Environment</th>
                    <th>Air Enviornment</th>
                    <th>Land Environment</th>
                    <th>Infrastructure/renewal measures</th>
                    <th>Other</th>
                    <th style="width:20%">Progress</th>
                </tr>
            </thead>
            <?php $i=0;?>
                @foreach($fetchData as $items)
                <?php $i++;?>
                <tr>
                    <td>{{$i}}</td>
                    <td><a href="{{route('cpcbactionpoints',['stid'=>$items->id])}}">{{$items->state_name}}</a></td>
                   
                    <td><a href="{{route('cpcbactionpoints', ['stid'=>$items->id, '_tcount'=>'_tcount'])}}">{{$items->totalpiacount}}</a></td>
                    <td><a href="{{route('cpcbactionpoints', ['stid'=>$items->id, '_water'=>'_water'])}}">{{$items->water}}</a></td>
                    <td><a href="{{route('cpcbactionpoints', ['stid'=>$items->id, '_air'=>'_air'])}}">{{$items->air}}</a></td>
                    <td><a href="{{route('cpcbactionpoints', ['stid'=>$items->id, '_land'=>'_land'])}}">{{$items->land}}</a></td>
                    <td><a href="{{route('cpcbactionpoints', ['stid'=>$items->id, '_pre_post'=>'_pre_post'])}}">{{$items->pre_post}}</a></td>
                    <td><a href="{{route('cpcbactionpoints', ['stid'=>$items->id, '_other'=>'_other'])}}">{{$items->other}}</a></td>
                    <td>
                        <div class="progress-container">
                            <?php $prgs = ceil($items->progress/$items->totalpiacount);
                            if($prgs<11){
                                $prgsw = 10;
                            }else{$prgsw = $prgs;}
                            ?>
                            <div class="progress" style="width:@php echo $prgsw @endphp%; @php if($prgs<=30) echo 'background:#ff8c00;';@endphp ">
                                @php echo $prgs @endphp%
                            </div>
                        </div>
                    </td>
                </tr>
                @endforeach
        </table>
    </div>
</div>
@endsection