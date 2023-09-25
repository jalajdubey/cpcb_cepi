@extends('layouts.components.master')
@section('contents')
<style>
.btn-info {
    color: #FFF !important;
    background-color: #488A99 !important;
    border-color: #488A99 !important;
}
</style>

<a href="{{route('registerPIA')}}" class="btn btn-info" style="margin: 6px;padding: 6px;height: 37px;">
    <p>Add New Industrial Area (PIA)</p>
</a>

<table class="table">
    <thead>
        <tr>
            <th scope="col">SN.</th>
            <th scope="col">Industrial Area</th>
            <th scope="col">User Name</th>
            <th scope="col">Email</th>
            <th scope="col">Concerned RO Address</th>
            <th scope="col">Mobile</th>
            <th scope="col">Category</th>
            <th scope="col">Latitude </th>
            <th scope="col">Longitude</th>
            <th scope="col">KML File</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        <?php $i=0; ?>
        @foreach($data as $items)
        <?php $i++;?>
        <tr>
            <th scope="row">{{$i}}</th>
            <td>{{$items->PIAName}}</td>
            <td>{{$items->firstname}} {{$items->lastname}}</td>
            <td>{{$items->email}}</td>
            <td>{{$items->address}}</td>
            <td>{{$items->mobile}}</td>
            <td>{{$items->catagries_of_PIA}}</td>
            <td>{{$items->lat}}</td>
            <td>{{$items->long}}</td>
            <td>
                <a href="{{ url('upload/kml_file/'.$items->kmlfile)}}" target="_blank"><b>View</b></a>
            </td>
            <td>
                <form action="{{route('EditPIAs')}}" method="Post">
                    @csrf
                    <input type="hidden" name="pia_id" value="{{$items->id}}">
                    <button class="btn btn-info">Edit</button>
                </form>
            </td>
        </tr>
        @endforeach

    </tbody>
</table>

@endsection