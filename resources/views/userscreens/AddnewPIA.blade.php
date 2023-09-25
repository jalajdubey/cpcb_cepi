@extends('layouts.components.master')
@section('contents')
<style>
.btn-primary {
    color: #fff !important;
    background-color: #6AB187 !important;
    border-color: #6AB187 !important;
}
</style>
<form action="{{route('insertPIAName')}}" method="post"
    onsubmit="return confirm('Do you really want to Add New PIA Name in Database?');">
    @csrf
    <input type="hidden" name="Role_User" value="3">
    <input type="hidden" name="user_id" value="{{$userId}}">
    <div class="form-group">
        <label for="exampleFormControlInput1" class="ml-2">ADD PIA Name</label>
        <input type="text" class="form-control ml-2" name="PIA_name" required id="exampleFormControlInput1"
            placeholder=" Plaese Mention PIA Name">
    </div>
    <div class="form-group">
        <input type="submit" value="Submit" class="btn btn-primary ml-2">
    </div>
</form>

@endsection