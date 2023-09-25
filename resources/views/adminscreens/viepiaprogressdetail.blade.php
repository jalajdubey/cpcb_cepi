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
        <h3 class="card-title">List of Registered PIA List</h3>
         <a class="butn btn" href="{{ route('ViewpiaProgressAction') }}">Back</a> 
        </div>
    <div class="card-body p-0">
        <table id="example1" class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>S.No</th>
                    <th>State</th>
                    <th>Industrial Area(PIA)</th>
                    <th>PIA Category</th>
                    <th>Total Action Point</th>
                    <th>Water Environment</th>
                    <th>Air Enviornment</th>
                    <th>Land Environment</th>
                    <th>Infrastructure/renewal measures</th>
                    <th>Other</th>
                    <th style="width:15%">Progress</th>
                </tr>
            </thead>
            <tbody>
            <?php $i=0;?>
                @foreach($data as $items)
                <?php $i++;?>
                <tr>
                    <td>{{$i}}</td>
                    <td>{{$items->state_name}}</td>
                    <td>{{$items->PIAName}}</td>
                    <td>{{$items->catagries_of_PIA}}</td>
                    <td><a href="{{route('cpcbactionpoints_progress', ['pid'=>$items->id, 'tc'=>'tc'])}}" target="_blank">{{$items->actioncount}}</a></td>
                    <td><a href="{{route('cpcbactionpoints_progress', ['pid'=>$items->id, 'wt'=>'wt'])}}" target="_blank">{{$items->water}}</a></td>
                    <td><a href="{{route('cpcbactionpoints_progress', ['pid'=>$items->id, 'ar'=>'ar'])}}" target="_blank">{{$items->air}}</a></td>
                    <td><a href="{{route('cpcbactionpoints_progress', ['pid'=>$items->id, 'ld'=>'ld'])}}" target="_blank">{{$items->land}}</a></td>
                    <td><a href="{{route('cpcbactionpoints_progress', ['pid'=>$items->id, 'inf'=>'inf'])}}" target="_blank">{{$items->pre_post}}</a></td>
                    <td><a href="{{route('cpcbactionpoints_progress', ['pid'=>$items->id, 'ot'=>'ot'])}}" target="_blank">{{$items->other}}</a></td>
                    <td>
                        <div class="progress-container">
                            <?php $divi; if($items->actioncount==0){$divi = 1;}else{$divi = $items->actioncount;}
                                $prgs = ceil($items->progress/$divi); if($prgs<11){ $prgsw = 10;}else{$prgsw = $prgs;} ?>
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