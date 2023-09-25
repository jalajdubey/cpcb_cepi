@extends('layouts.components.master')
@section('contents')
<style>
.text-sm {
    font-size: 14px !important
}

input,
textarea,
select {
    padding: 10px 12px 10px 12px;
    border: 1px solid lightgrey;
    border-radius: 4px;
    margin-bottom: 25px;
    margin-top: 2px;
    width: 100%;
    box-sizing: border-box;
    color: #2C3E50;
    font-size: 14px;
    letter-spacing: 1px;
    background-color: #ECEFF1
}

input:focus,
textarea:focus {
    -moz-box-shadow: none !important;
    -webkit-box-shadow: none !important;
    box-shadow: none !important;
    border: 1px solid #304FFE;
    outline-width: 0
}

button:focus {
    -moz-box-shadow: none !important;
    -webkit-box-shadow: none !important;
    box-shadow: none !important;
    outline-width: 0
}

.btn-blue {
    background-color: #6AB187 !important;
    color: #fff;
    border-radius: 4px;
}

.btn-blue:hover {
    background-color: #0D47A1;
    cursor: pointer
}

@media screen and (max-width: 991px) {
    .card1 {
        border-bottom-left-radius: 0px;
        border-top-right-radius: 10px
    }

    .card2 {
        border-bottom-left-radius: 10px;
        border-top-right-radius: 0px
    }
}
</style>
<div class="container-fluid py-4">
    <div class="border-0">
        <div class="row d-flex">
            <div class="col-lg-12">
                <div class="card2 card border-0 px-4 py-5">
                    <h3 class="mb-1">Industrial Area User Registration:</h3>
                    @if($errors->any())
                    @foreach($errors->all() as $err)
                    <li class="text-danger">{{$err}}</li>
                    @endforeach
                    @endif
                    <form action="{{route('updateActionPlan')}}" method="post" enctype='multipart/form-data' onsubmit="myFunction()">
                        @csrf
                        <input type="hidden" name="Role_User" value="3">
                        <div class="row mt-3">
                            <div class="col-md-12">
                                <label class="mb-0">
                                    <h6 class="mb-0 text-sm">Name of Industrial Area (PIA)</h6>
                                </label>
                                <input type="text" name="pia_name" required value="{{old('pia_name')}}" />
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-6">
                                <label class="mb-0">
                                    <h6 class="mb-0 text-sm">First Name</h6>
                                </label>
                                <input type="text" name="firstname" required value="{{old('firstname')}}" />
                            </div>
                            <div class="col-md-6">
                                <label class="mb-0">
                                    <h6 class="mb-0 text-sm">Last Name</h6>
                                </label>
                                <input type="text" name="lastname" required value="{{old('lastname')}}" />
                            </div>
                        </div>
                        
                        <div class="row mt-3">
                            <div class="col-md-6">
                                <label class="mb-0">
                                    <h6 class="mb-0 text-sm">Email</h6>
                                </label>
                                <input type="email" name="email" value="{{old('email')}}"/>
                            </div>
                            <div class="col-md-6">
                                <label class="mb-0">
                                    <h6 class="mb-0 text-sm">Mobile</h6>
                                </label>
                                <input type="text" name="mobile" required value="{{old('mobile')}}"/>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-12">
                                <label class="mb-0">
                                    <h6 class="mb-0 text-sm">Address of Concerned RO</h6>
                                </label>
                                <Textarea name="address" required>{{old('address')}}</Textarea>
                            </div>
                        </div>

                        <div class="row mt-3">
                            <div class="col-md-12">
                                <label for="formGroupExampleInput" class="form-label">Categorie of PIA</label>
                                <select name="catagries_of_PIA" class="form-control" required="">
                                    <option value="" selected disabled>Select PIA</option>
                                    <option value="CPA">CPA</option>
                                    <option value="SPA">SPA</option>
                                    <option value="OPA">OPA</option>
                                    </option>
                                </select>
                            </div>
                        </div>

                        <div class="row mt-3">
                            <div class="col-md-6">
                                <label class="mb-0">
                                    <h6 class="mb-0 text-sm">Latitude</h6>
                                </label>
                                <input type="text" name="lat" required value="{{old('lat')}}" />
                            </div>
                            <div class="col-md-6">
                                <label class="mb-0">
                                    <h6 class="mb-0 text-sm">Longitude</h6>
                                </label>
                                <input type="text" name="long" required value="{{old('long')}}" />
                            </div>
                        </div>

                        <div class="row mt-3">
                            <div class="col-md-12">
                                <label for="" class="form-label">Upload KML File</label>
                                <input type="file" name="kmlfile" accept="application/pdf" class="form-control"
                                    required>
                            </div>
                        </div>

                        <div class="row mt-3">
                            <div class="col-md-6">
                                <label class="mb-0">
                                    <h6 class="mb-0 text-sm">Password</h6>
                                </label>
                                <input type="password" name="password" id="password" required />
                            </div>
                            <div class="col-md-6">
                                <label class="mb-0">
                                    <h6 class="mb-0 text-sm">Confirm Password</h6>
                                </label>
                                <input type="password" name="password_confirmation" required />
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-md-2"> <button class="btn btn-blue text-center mb-1">Create Account</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
$(document).ready(function() {
 /*$('#password').change(function(){ 
        //var query = $(this).val();
        var encodedStringBtoA = btoa($(this).val());
        console.log(encodedStringBtoA);

        $("#password").keyup(function(){
        $("#password").css("background-color", "pink");
        });
    });

    function myFunction(q){
        // Define the string
        //var decodedStringBtoA = 'Hello World!';
        // Encode the String
        // var encodedStringBtoA = btoa(decodedStringBtoA);
        var encodedStringBtoA = btoa(q);
        console.log(encodedStringBtoA);
    }*/
});
</script>
@endsection