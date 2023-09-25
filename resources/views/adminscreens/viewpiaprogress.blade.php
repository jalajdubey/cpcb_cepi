@extends('layouts.components.master')
@section('contents')
<style>
.butn {
    margin-left: 75%;
    background-color: #AC3E31;
    color: #fff !important;
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
        <h3 class="card-title">Industrial Area(PIAs) Progress Status</h3>
        <a class="butn btn" href="{{ route('home') }}">Back</a> 
    </div>
    <div class="card-body p-0">
        <table id="example1" class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>S.No</th>
                    <th>State</th>
                    <th>Industrial Area(PIAs)</th>
                    <th>CPA</th>
                    <th>SPA</th>
                    <th>OPA</th>
                    <th>Total Action Plan</th>

                    <th style="width:20%">Progress Status</th>
                    
                </tr>
            </thead>
            <tbody>
                <?php $i=0;?>
                @foreach($piadatacount as $items)
                <?php $i++;?>
                <tr>
                    <td>{{$i}}</td>
                    <td><a href="{{route('viewpiaprogressdtil',['stid'=>Crypt::encryptString($items->state_id)])}}">{{$items->state_name}}</a></td>
                    <td><a href="{{route('viewpiaprogressdtil',['stid'=>$items->state_id])}}">{{$items->totalcount}}</a></td>
                    <td><a href="{{route('viewpiaprogressdtil',['stid'=>$items->state_id, 'ctg'=>0])}}">{{$items->cpa}}</a></td>
                    <td><a href="{{route('viewpiaprogressdtil',['stid'=>$items->state_id, 'ctg'=>1])}}">{{$items->spa}}</a></td>
                    <td><a href="{{route('viewpiaprogressdtil',['stid'=>$items->state_id, 'ctg'=>2])}}">{{$items->opa}}</a></td>
                    <td><a href="{{route('cpcbactionpoints_progress', ['pid'=>$items->state_id, 'stc'=>'stc'])}}" target="_blank">{{$items->actionplan}}</a></td>
                    <td>
                        <div class="progress-container">
                            <?php $prgs = ceil($items->progress/$items->totalcount);
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
            </tbody>
        </table>
    </div>
</div>
@endsection