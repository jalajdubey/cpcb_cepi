@extends('layouts.components.master')
@section('contents')

<section class="content">
<div class="alert alert-danger print-error-msg" style="display:none">

<ul></ul>

</div>
<div class="card">
<div class="card-body row">
<div class="col-5 text-center d-flex align-items-center justify-content-center">
<div class="">
<h2>Registration Details</strong></h2>
<p class="lead mb-5"><br>
<img src="https://i.imgur.com/ucirQQf.png" alt="" height="200">
</p>
</div>
</div>
       


<div class="col-7">
<form action="{{route('UpdateUser')}}" method="post">
    <!-- route'addfieldofficer' -->
    @csrf

<div class="form-group">
<label for="inputName">Name</label>
<input type="hidden" name="hidden_id" value="{{$data->id}}">
<input type="text" name="officername" required  minlength = "4" id="inputName" value="{{$data->firstname}} {{$data->lastname}} " class="form-control" />
</div>
<div class="form-group">
<label for="inputEmail">E-Mail</label>
<input type="email" name="officeremail" required id="inputEmail" value="{{$data->email}}" class="form-control" />
</div>
 <div class="form-group">
 <label for="inputSubject">Mobile No</label>
<input type="text" name="officermobile" name="mobile" value="{{$data->mobile}}" required id="inputSubject" class="form-control" />  
 </div>
 <div class="form-group">
 <label for="inputSubject">State</label>
<input type="text" name="officeraddress" required value="{{$data->stateName}}" id="inputSubject" class="form-control" />  
 </div>
 <div class="form-group">
    <select name="RoUser" id="" class="form-control">

        @if($data->RoUser == 1)
        <option value="1">Regional officer</option>
        <option value="0">Nodal</option>
        @else
        <option value="0">Nodal</option>
        <option value="1">Regional officer</option>
        @endif
    </select>
 </div>

<div class="form-group">
<input type="submit" class="btn btn-primary  btn-submit" value="Update">
</div>
    
    </form>

</div>
</div>
</div>
</section>
@endsection