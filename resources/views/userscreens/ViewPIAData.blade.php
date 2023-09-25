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

<div class="card">
    <div class="card-header">
        <h3 class="card-title">List of Action Points of {{$data->PIAName}} industrial area.</h3>
        <!-- <a class="butn btn" href="{{ route('home') }}">Back</a> -->
    </div>
    <div class="card-body">
        <table id="example1" class="table table-bordered table-hover">
            <thead>
                <div class="container">
                   @if(auth()->user()->userType == 'PIA')
                        <a href="{{route('addActionPlan')}}" class="btn btn-info" style="margin: 6px;padding: 6px;height: 37px;">
                            <p>Add New Industrial Area (PIA)</p>
                        </a>
                    @endif
                    
                </div>
                <tr>
                    <th>S.No</th>
                    <th>State</th>
                    <th>Financial Year</th>
                    <th>Catagries</th>
                    <th>Action Point</th>
                    <th>Responsible Ageancy</th>
                    <th>Timeline</th>
                    <th>Financial Requirement</th>
                    <th>Present Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <?php $i=0; $cls="";?>
                @foreach($fetch as $items)
                <?php $i++; ?>
                <tr @php if($items->present_status == 11) echo 'style="background-color:yellow"';@endphp>
                    <td>{{$i}}</td>
                    <td>{{$items->state_name}}</td>
                    <td>{{$items->financial_year}}</td>
                    <td>{{$items->category_name}}</td>
                    <td>{{$items->action_point}}</td>
                    <td>{{$items->responsible_ageancy}}</td>
                    <td>{{$items->timeline}}</td>
                    <td>{{$items->financial_requirement}}</td>
                    <td>@php if($items->present_status == 11)echo 'Date Extended'; else echo ($items->present_status*10).'%'; @endphp</td>
                    <td>
                    <form action="{{route('EditActionPlan')}}" method="Post">
                        @csrf
                        <input type="hidden" name="aplan_id" value="{{$items->id}}">
                       <?php if($items->present_status == 0) {?> 
                       <button onclick="request('{{$items->id}}')" class="btn btn-info" >Modify</button>
                    </form>
                    <?php } else {?> 
                    <!-- Trigger the modal with a button -->
                    <a data-toggle="modal" data-id="<?php echo $items->id.','.$items->present_status;?>" title="Add this item" class="openBtn btn btn-info" href="">Update Progress</a>
                    <?php }?>
                </td>
                </tr>
                @endforeach
        </table>
    </div>
</div>
<!-- mode upgrade html -->
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
    </form>
        <div class="modal-content">
            <form id="updateprogress" action="route('viewPIAdata')" method="Post" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="aplan_updt_id" id="aplan_updt_id" value="">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update Progress</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                
                <label>Present Status:</label>
                <select name="select_status" id="select_status" class="form-control" required="">
                <option value="" disabled="disabled">Select Present Status</option>
                <option value="0">To Be Initiated</option>
                <option value="1">Completed 10%</option>
                <option value="2">Completed 20%</option>
                <option value="3">Completed 30%</option>
                <option value="4">Completed 40%</option>
                <option value="5">Completed 50%</option>
                <option value="6">Completed 60%</option>
                <option value="7">Completed 70%</option>
                <option value="8">Completed 80%</option>
                <option value="9">Completed 90%</option>
                <option value="10">Completed 100%</option>
                <option value="11">Date Exceeded</option>
            </select>
            </div>
        
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="submitBtn" style="margin-top: 0px; margin-bottom:0px;">Update</button>
            
            </div>
        </div>
    </form>
    </div>
  </div>
<script>
$(document).ready(function(){
    $('.openBtn').on('click',function(){
        /*$("select option").each(function() {
            var $thisOption = $(this);
            var valueToCompare = "saab";

            if($thisOption.val() == valueToCompare) {
                $thisOption.attr("disabled", "disabled");
            }
        });*/

        var p_status = $(this).data('id');
        var idarr = p_status.split(",");
        //$(".modal-body #select_status").val( myBookId );
        $("#aplan_updt_id").val(idarr[0]);

        
        $.each($('#select_status option'),function(a,b){
            var thisOption = $(this); 
            if(thisOption.val()&&Number(thisOption.val())<=Number(idarr[1])){//alert(thisOption.val()+"<="+idarr[1]);
                thisOption.attr("disabled", "disabled");
            }
        });
        
        $.each($('#select_status option'),function(a,b){if($(this).val() == idarr[1]){ $(this).attr('selected',true);}});
        $('#exampleModal').modal({show:true});
       
    });

    $("#submitBtn").click(function(e){        
       // $("#myForm").submit(); // Submit the form
        e.preventDefault();
      $.post("{{route('updateProgress')}}", 
         $('#updateprogress').serialize(), 
         function(data, status, xhr){
            //console.log(data);
            window.location.href = "{{ route('viewPIAdata')}}";
           // do something here with response;
         });

    });



});

</script>
@endsection