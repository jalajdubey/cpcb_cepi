@extends('layouts.components.master')
@section('contents')
<style>
 

.form-control:focus {
    box-shadow: none;
    border-color: #BA68C8
}

.profile-button {
    background: #DBAE58 !important;
    box-shadow: none;
    border: none
}

.profile-button:hover {
    background: #682773
}

.profile-button:focus {
    background: #682773;
    box-shadow: none
}

.profile-button:active {
    background: #682773;
    box-shadow: none
}

.back:hover {
    color: #682773;
    cursor: pointer
}

.labels {
    font-size: 11px
}
.butn{
      margin-left: 75%;
      background-color: #AC3E31;
      color: #fff !important;
   }

</style>
<div class="container">
    <form action="{{route('updateregisterstateuser')}}" method="post">
        @csrf
        <input type="hidden" name="hidden_id" value={{$data->id}}>
     <div class="row">
        <div class="col-md-12 border-right">
            <div class="p-3 ">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="text-right">Profile Settings</h4>
                    <a class="butn btn" href="{{ route('viewprofile') }}">Back</a>
                </div>
                <div class="row mt-2">
                    <div class="col-md-6"><label class="labels">First Name</label><input type="text" class="form-control" placeholder="first name" name="firstname" value="{{$data->firstname}}"></div>
                    <div class="col-md-6"><label class="labels">Last Name</label><input type="text" class="form-control" value="{{$data->lastname}} "name ="lastname" placeholder="surname"></div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-12"><label class="labels">Mobile Number</label><input type="text" class="form-control" name ="mobile" placeholder="enter phone number" value="{{$data->mobile}}"></div>
                    <div class="col-md-12"><label class="labels">Address</label><input type="text" class="form-control" placeholder="enter address" name="address" value="{{$data->address}}"></div>
                    
                    <div class="col-md-12"><label class="labels">Email ID</label><input type="text" class="form-control" placeholder="enter email id" value="{{$data->email}}" name="email"></div>
                    
                </div>
                <div class="row mt-3">
                    <div class="col-md-6"><label class="labels">Country</label><input type="text" class="form-control" placeholder="country" value="INDIA" disabled></div>
                    <div class="col-md-6"><label class="labels">State/Region</label><input type="text" class="form-control" value="{{$data->stateName}}" placeholder="state" disabled></div>
                </div>
                <div class="mt-5 text-center"><button type="submit" class="btn btn-primary profile-button" type="button">Update</button></div>
            </div>
        </div>
        
    </div>
</div>
</form>
    

@endsection