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
        <h3 class="card-title">List of Registered States</h3>
         <a class="butn btn" href="{{ route('home') }}">Back</a> 
    </div>
    <div class="card-body p-0">
        <table id="example1" class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th colspan="7">
                        <a class="btn btn-warning" href="{{ route('addstate') }}">Add State</a>
                    </th>
                </tr>
                <tr>
                    <th style="width: 10px">S.No</th>
                    <th>State</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Address</th>
                    <th>Contact No</th>

                </tr>
            </thead>
            <tbody>
                <?php $i=0;?>
                @foreach($data as $items)
                <?php $i++;?>
                <tr>
                    <td>{{$i}}</td>
                    <td>{{$items->state_name}}</td>
                    <td>{{$items->firstname}} {{$items->lastname}} </td>
                    <td>{{$items->email}}</td>
                    <td>{{$items->address}}</td>
                    <td>{{$items->mobile}}</td>

                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection