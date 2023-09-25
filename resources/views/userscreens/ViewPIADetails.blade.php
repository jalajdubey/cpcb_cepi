@extends('layouts.components.master')
@section('contents')
<form>
   <div class="card-body">
      <div class="form-group">
         <label for="exampleInputEmail1">Selected Financial Year :</label>
         <input type="hidden" name="hidden_id" value="{{$data->id}}">
         <input type="text" class="form-control" id="exampleInputEmail1" value="{{$data->financial_year}}" readonly>
      </div>
      <div class="form-group">
         <label for="exampleInputEmail1">Selected Quarter :</label>
         <input type="text" class="form-control" id="exampleInputEmail1" value="{{$data->quarter}}" readonly>
      </div>
      <div class="form-group">
         <label for="exampleInputEmail1">Selected Catagries :</label>
         <input type="text" class="form-control" id="exampleInputEmail1" value="{{$data->catagries}}" readonly>
      </div>
      <div class="form-group">
         <label for="exampleInputEmail1">Action Points :</label>
         <input type="text" class="form-control" id="exampleInputEmail1" value="{{$data->action_point}}" readonly>
      </div>
      <div class="form-group">
         <label for="exampleInputEmail1">Responsible Agency /stakeholders :</label>
         <input type="text" class="form-control" id="exampleInputEmail1" value="{{$data->responsible_ageancy}}" readonly>
      </div>
      <div class="form-group">
         <label for="exampleInputPassword1">Timelines :</label>
         <input type="text" class="form-control" id="exampleInputEmail1" value="{{$data->timeline}}" readonly>
      </div>
      <div class="form-group">
         <label for="exampleInputPassword1">Financial requirement :</label>
         <input type="text" class="form-control" id="exampleInputEmail1" value="{{$data->financial_requirement}}" readonly>
      </div>
      <div class="form-group">
         <label for="exampleInputPassword1">Present Status :</label>
         <input type="text" class="form-control" id="exampleInputEmail1" value="{{$data->present_status}}" readonly>
      </div>
   </div>
   <div class="card-footer">
      <a href="{{route('viewPIAdata')}}" class="btn btn-primary">Back</a>
   </div>
</form>
@endsection