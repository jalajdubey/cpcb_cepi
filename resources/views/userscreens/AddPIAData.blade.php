@extends('layouts.components.master')
@section('contents')
<style>
   body{font-family: "Source Sans Pro",-apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,
   sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol";}

   .btn-primary {
    color: #fff !important;
    background-color: #6AB187 !important;
    border-color: #6AB187 !important;
    margin-top: 10px;
}
</style>
<div class="container">
   <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-lg">ADD ACTION PLAN</button>
   <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
      <div class="modal-dialog modal-lg">
         <div class="modal-content">
            <div class="container">
               <form action="{{route('InsertPIA')}}" method="Post" enctype="multipart/form-data">
                  @csrf
                  <div class="row">
                     <div class="col-sm-6 mb-3 mt-3">
                        <label for="formGroupExampleInput" class="form-label">Select Financial Year</label>
                        <select name="financial_year" id="finc_year" class="form-control" required="">
                           <option value="" selected disabled>Select Financial Year</option>
                           <option value="2019-2020">2019-2020</option>
                           <option value="2020-2021">2020-2021</option>
                           <option value="2021-2022">2021-2022</option>
                           <option value="2022-2023">2022-2023</option>
                           <option value="2023-2024">2023-2024</option>
                        </select>
                     </div>
                     <div class="col-sm-6  mb-3 mt-3">
                        <label for="formGroupExampleInput" class="form-label">Select Quarter </label>
                        <select name="quarter" id="quarter" class="form-control" required="">
                           <option value="" selected disabled>Select Quarter</option>
                           <option value="First Quarter">First Quarter (April-June)</option>
                           <option value="Second Quarter">Second Quarter (July-September)</option>
                           <option value="Third Quarter">Third Quarter (October-December)</option>
                           <option value="Fourth Quarter">Fourth Quarter (January-March)</option>
                        </select>
                     </div>
                    
                     <div class="mb-3 mt-3">
                        <label for="formGroupExampleInput" class="form-label">Select Categories</label>
                        <select name="catagries" id="quarter" class="form-control" required="">
                           <option value="" selected disabled>Select Categorie</option>
                           <option value="Air Enviornment">Air Enviornment</option>
                           <option value="Water Environment">Water Environment</option>
                           <option value="Land Environment">Land Environment</option>
                           <option value="Other Infrastructure/renewal measures">Other Infrastructure/renewal measures</option>
                           <option value="Pre monsoon/post monsoon CEPI monitoring">Pre monsoon/post monsoon CEPI monitoring</option>
                        </select>
                     </div>
                     <div class="mb-3 mt-3">
                        <label for="formGroupExampleInput" class="form-label">Action Points</label><br/>
                        <textarea name="action_point" class="form-control"></textarea>
                     </div>
                     <div class="mb-3 mt-3">
                        <label for="formGroupExampleInput" class="form-label">Responsible Agency /stakeholders</label>
                        <input type="text" name="responsible_ageancy" class="form-control" value="">
                     </div>
                     <div class="mb-3 mt-3">
                        <label for="formGroupExampleInput" class="form-label">	Timelines</label>
                        <input type="date" name="timeline" class="form-control" value="">
                     </div>
                     <div class="mb-3 mt-3">
                        <label for="formGroupExampleInput" class="form-label">Financial requirement</label>
                        <input type="text" name="financial_requirement" class="form-control" value="">
                     </div>
                    
                     <div class="mb-3 mt-3">
                        <label for="formGroupExampleInput" class="form-label">Present Status</label>
                        <select name="present_status" id="quarter" class="form-control" required="">
                           <option value="" selected disabled>Select Present Status</option>
                           <option value="In-Progress">In-Progress</option>
                           <option value="Completed">Completed</option>
                           <option value="Date Exceeded">Date Exceeded</option>
                        </select>
                     </div>
                  </div>
                  <!----row end here --->
                  <div class="modal-footer">
                     <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                     <button type="submit" class="btn btn-primary">Save changes</button>
                  </div>
               </form>
            </div>
            <!---container end -->
         </div>
         <!---model content here-->
      </div>
      <!----modal dilog end here -->
   </div>
</div>
<!---main container end here --->
@endsection