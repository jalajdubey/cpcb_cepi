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
    background-color: #304FFE;
    width: 100%;
    color: #fff;
    border-radius: 6px
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

.btn-info {
    color: #FFF !important;
    background-color: #6AB187 !important;
    border-color: #6AB187 !important;
}
</style>
<div class="container-fluid py-5">
    <div class="border-0">
        <div class="row d-flex">
            <div class="col-lg-12">
                <div class="card2 card border-0 px-4 py-5">
                    <h3 class="mb-1">Edit Industrial Area User :</h3>
                    @if($errors->any())
                    @foreach($errors->all() as $err)
                    <li class="text-danger">{{$err}}</li>
                    @endforeach
                    @endif
                    <form action="{{route('updateregisterPIAuser')}}" method="post" enctype='multipart/form-data'>
                        @csrf
                        <input type="hidden" name="hidden_id" value="{{$result->id}}">
                        <div class="row mt-3">
                            <div class="col-md-12">
                                <label class="mb-0">
                                    <h6 class="mb-0 text-sm">Industrial Area Name (PIA)</h6>
                                </label>
                                <input type="text" name="pia_name" value="{{$result->PIAName}}">
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-6">
                                <label class="mb-0">
                                    <h6 class="mb-0 text-sm">First Name</h6>
                                </label>
                                <input type="text" name="firstname" value="{{$result->firstname}}">
                            </div>
                            <div class="col-md-6">
                                <label class="mb-0">
                                    <h6 class="mb-0 text-sm">Last Name</h6>
                                </label>
                                <input type="text" name="lastname" value="{{$result->lastname}}">
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-6">
                                <label class="mb-0">
                                    <h6 class="mb-0 text-sm">Email</h6>
                                </label>
                                <input type="email" name="email" value="{{$result->email}}">
                            </div>
                            <div class="col-md-6">
                                <label class="mb-0">
                                    <h6 class="mb-0 text-sm">Mobile</h6>
                                </label>
                                <input type="text" name="mobile" value="{{$result->mobile}}">
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-12">
                                <label class="mb-0">
                                    <h6 class="mb-0 text-sm">Address of Concerned RO</h6>
                                </label>
                                <Textarea name="address">{{$result->address}}</Textarea>
                            </div>
                        </div>

                        <div class="row mt-3">
                            <div class="col-md-12">
                                <label for="formGroupExampleInput" class="form-label">Category</label>
                                <select name="catagries_of_PIA" class="form-control browser-default">
                                    <option value="" selected disabled>Select PIA</option>
                                    <option {{ ($result->catagries_of_PIA) == 'CPA' ? 'selected' : '' }} value="CPA">CPA
                                    </option>
                                    <option {{ ($result->catagries_of_PIA) == 'SPA' ? 'selected' : '' }} value="SPA">SPA
                                    </option>
                                    <option {{ ($result->catagries_of_PIA) == 'OPA' ? 'selected' : '' }} value="OPA">OPA
                                    </option>
                                </select>
                            </div>
                        </div>

                        <div class="row mt-3">
                            <div class="col-md-6">
                                <label class="mb-0">
                                    <h6 class="mb-0 text-sm">Latitude</h6>
                                </label>
                                <input type="text" name="lat" value="{{$result->lat}}">
                            </div>
                            <div class="col-md-6">
                                <label class="mb-0">
                                    <h6 class="mb-0 text-sm">Longitude</h6>
                                </label>
                                <input type="text" name="long" value="{{$result->long}}">
                            </div>
                        </div>

                        <div class="row mt-3">
                            <div class="col-md-12">
                                <label for="" class="form-label">Upload KML File</label>
                                <input type="file" name="kmlfile" accept="application/pdf"
                                    value="{{$result->kmlfile}}" class="form-control">
                            </div>
                        </div>


                        <div class="row mb-2">
                            <div class="col-md-2"> <button class="btn btn-info text-center mb-1">Update Account</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection