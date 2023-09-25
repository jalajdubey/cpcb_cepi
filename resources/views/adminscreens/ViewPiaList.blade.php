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
        <h3 class="card-title">List of Registered PIA List</h3>
         <a class="butn btn" href="{{ route('ViewRegisteredPIA') }}">Back</a> 
        </div>
    <div class="card-body p-0">
        <table id="example1" class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>S.No</th>
                    <th>PIA Name</th>
                    <th>Category of PIA</th>
                    <th>User Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Address</th>
                    
                </tr>
            </thead>
            <tbody>
            <?php $i=0;?>
                @foreach($data as $items)
                <?php $i++;?>
                <tr>
                    <td>{{$i}}</td>
                    <td>{{$items->PIAName}}</td>
                    <td>{{$items->catagries_of_PIA}}</td>
                    <td>{{$items->firstname}} {{$items->lastname}}</td>
                    <td>{{$items->email}}</td>
                    <td>{{$items->mobile}}</td>
                    <td>{{$items->address}}</td>
                </tr>
                @endforeach
           
              
            </tbody>
        </table>
    </div>
</div>
@endsection