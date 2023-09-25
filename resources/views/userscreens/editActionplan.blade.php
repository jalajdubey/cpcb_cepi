@extends('layouts.components.master')
@section('contents')
<style>
.butn {
    margin-left: 81%;
    background-color: #AC3E31;
    color: #fff !important;
}

.page-item.active .page-link {
    z-index: 3;
    color: #fff;
    background-color: #1C4E80;
    border-color: #1C4E80;


}

.btn-primary {
    color: #fff !important;
    background-color: #6AB187 !important;
    border-color: #6AB187 !important;
    margin-top: -7px;
    margin-bottom: 11px;
}
</style>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card" style="margin-top: 16px;">
                <div class="card-header">
                    <h4> {{ __('Add New Industrial Area (PIA)') }}</h4>
                    <a class="butn btn" href="{{ route('viewPIAdata') }}">Back</a>
                </div>
                <div class="card-body">
                    <form action="{{route('updateActionPlan')}}" method="Post" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="actionplan_id" value="{{$data->id}}">
                        <input type="hidden" name="user_id" value="{{$data->user_id}}">
                        <input type="hidden" name="state" value="{{$data->state}}">
                       
                        <?php $years = range(2020, strftime("%Y", time())); ?>
                        <div class=" mb-3 mt-3">
                            <label for="formGroupExampleInput" class="form-label">Select Financial
                                Year</label>
                                <select name="financial_year" class="form-control @error('financial_year') is-invalid @enderror" required>
                                <option value="">Select Year</option>
                                <?php foreach($years as $year) : ?>
                                <option {{ ($data->financial_year) == $year ? 'selected' : '' }} value="<?php echo $year; ?>"><?php echo $year; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="mb-3 mt-3">
                            <label for="formGroupExampleInput" class="form-label">Select Categories</label>
                            <select name="catagries" id="catagries" class="form-control" required="" onchange="visacatOnchange();">
                                <option value="0" selected disabled>Select Categorie</option>
                                @foreach ($categ as $categry)
                                <option {{ ($data->catagries) == $categry->id ? 'selected' : '' }} value="{{ $categry->id }}">{{ $categry->category_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3 mt-3" style="display:none;" id="oth_show">
                            <label for="formGroupExampleInput" class="form-label" style="color: rgb(243, 137, 7)">Describe Other:</label>
                            <input type="text" name="other_des" id="other_des" class="form-control" value="{{$data->other_des}}">
                        </div>
                        
                        <div class="mb-3 mt-3">
                            <label for="formGroupExampleInput" class="form-label">Action
                                Points</label><br />
                            <textarea name="action_point" class="form-control">{{$data->action_point}}</textarea>
                        </div>
                        <div class="mb-3 mt-3">
                            <label for="formGroupExampleInput" class="form-label">Responsible Agency /stakeholders</label>
                            <input type="text" name="responsible_ageancy" class="form-control" value="{{$data->responsible_ageancy}}">
                        </div>
                        <div class="mb-3 mt-3">
                            <label for="formGroupExampleInput" class="form-label"> Timelines</label>
                            <input type="date" name="timeline" class="form-control" value="{{$data->timeline}}">
                        </div>
                        <div class="mb-3 mt-3">
                            <label for="formGroupExampleInput" class="form-label">Financial requirement</label>
                            <input type="text" name="financial_requirement" class="form-control"
                                value="{{$data->financial_requirement}}">
                        </div>

                        <div class="mb-3 mt-3">
                            <label for="formGroupExampleInput" class="form-label">Present
                                Status</label>
                            <select name="present_status" id="quarter" class="form-control"
                                required="">
                                <option value="" selected disabled>Select Present Status</option>
                                <option {{ ($data->present_status) == '0' ? 'selected' : '' }} value="0">To Be Initiated</option>
                                <option {{ ($data->present_status) == '1' ? 'selected' : '' }} value="1">Completed 10%</option>
                                <option {{ ($data->present_status) == '2' ? 'selected' : '' }} value="2">Completed 20%</option>
                                <option {{ ($data->present_status) == '3' ? 'selected' : '' }} value="3">Completed 30%</option>
                                <option {{ ($data->present_status) == '4' ? 'selected' : '' }} value="4">Completed 40%</option>
                                <option {{ ($data->present_status) == '5' ? 'selected' : '' }} value="5">Completed 50%</option>
                                <option {{ ($data->present_status) == '6' ? 'selected' : '' }} value="6">Completed 60%</option>
                                <option {{ ($data->present_status) == '7' ? 'selected' : '' }} value="7">Completed 70%</option>
                                <option {{ ($data->present_status) == '8' ? 'selected' : '' }} value="8">Completed 80%</option>
                                <option {{ ($data->present_status) == '9' ? 'selected' : '' }} value="9">Completed 90%</option>
                                <option {{ ($data->present_status) == '10' ? 'selected' : '' }} value="10">Completed 100%</option>
                                <option {{ ($data->present_status) == '11' ? 'selected' : '' }} value="11">Date Exceeded</option>
                            </select>
                        </div>
                        <div class="mb-3 mt-3">
                            <label for="formGroupExampleInput" class="form-label">Add Remark
                                </label>
                                <textarea id="text" type="text" class="form-control @error('remark') is-invalid @enderror" name="remark"
                                        value="" required autocomplete="remark">{{$data->remark}}</textarea>
                                @error('report_file')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                        </div>
                        <div class="mb-3 mt-3">
                           
                            <button type="submit" class="btn btn-primary"><strong>Update Changes</strong></button>
                        </div>
                    </form>
                </div> <!---card body end -->
            </div><!---card end -->
        </div><!---card body end -->
    </div><!---card body end -->
</div><!---card body end -->

<script>
$(document).ready(function () {
    var catagries = document.getElementById('catagries').value 
   // alert(catagries);
    if(catagries==5)
              $("#oth_show").css("display", "block");
        });

    function visacatOnchange(){
        var catagries = document.getElementById('catagries').value 
        if(catagries==5)
            document.getElementById("oth_show").style.display="block";
        else
            document.getElementById("oth_show").style.display="none";
    }
        </script>
@endsection