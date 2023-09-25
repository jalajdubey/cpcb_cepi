@extends('layouts.components.master')
@section('contents')
<style>
   .btn-primary {
    color: #fff !important;
    background-color: #DBAE58 !important;
    border-color: #DBAE58 !important;
}
</style>
<div class="card">
   <div class="card-body">
      <div class="row">

         <div class="col-md-12" >
            <div class="container">
               <div class="row d-flex justify-content-center align-items-center h-100">
                  <div class="col">
                     <div class="card mb-3" style="border-radius: .5rem;">
                        <div class="row g-0">
                          
                           <div class="col-md-12 text-center" style="margin-top: 20px;font-weight:bold">
                           @if(auth()->user()->Role_User == 2)
                              <p>State User Profile</p>
                              @elseif(auth()->user()->Role_User == 1)
                              <p>Admin User Profile</p>
                              @elseif(auth()->user()->Role_User == 3)
                              <p>PIA User Profile</p>
                            @endif 
                              <a class="btn btn-success" href="{{route('editstateprofile')}}">Edit Profile</a>
                           </div>
                           <div class="col-md-12">
                              <div class="card-body p-4">
                              <div class="row pt-1">
                                    <div class="col-6 mb-3">
                                       <h6>First Name: </h6>
                                       <p class="text-muted">{{$data->firstname}}</p>
                                    </div>
                                    <div class="col-6 mb-3">
                                       <h6>Last Name: </h6>
                                       <p class="text-muted">{{$data->lastname}}</p>
                                    </div>
                                 </div>
                                 <div class="row pt-1">
                                    <div class="col-6 mb-3">
                                       <h6>Email: </h6>
                                       <p class="text-muted">{{$data->email}}</p>
                                    </div>
                                    <div class="col-6 mb-3">
                                       <h6>Phone: </h6>
                                       <p class="text-muted">{{$data->mobile}}</p>
                                    </div>
                                 </div>
                                 <div class="row pt-1">
                                    <div class="col-6 mb-3">
                                       <h6>Address : </h6>
                                       <p class="text-muted">{{$data->address}}</p>
                                    </div>
                                    <div class="col-6 mb-3">
                                       <h6>State Name: </h6>
                                       <p class="text-muted">{{$data->stateName}}</p>
                                    </div>
                                 </div>

                                 <!-- <div class="card" style="width: 31.5rem;">
                                    <div class="card-header">
                                       Summary Reports as on <?php echo date('d-m-Y')?>
                                    </div>
                                    <ul class="list-group list-group-flush">
                                       <li class="list-group-item">Daily Reports Uploaded:-> {{$countdaily}}</li>
                                       <li class="list-group-item">ULBs Registered so far:-> {{$countPIA}}</li>
                                       <li class="list-group-item">Entities Entered so far:-> {{$countentity}}</li>
                                    </ul>
                                 </div> -->
                              </div>
                           </div>
                           
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>

         <!-- <div class="col-sm-6">
            <div class="card text-center mt-5">
               <div class="card-header">
                  Complaints Status of {{auth()->user()->stateName}}
               </div>
               <div class="card-body">
                  <h5 class="card-title">Total Registered Complaints</h5>
                  <h4 class="card-text">{{$countcomplaints}}</h4>
                  <a href="{{route('viewComplaints')}}" class="btn btn-primary">View Details</a>
               </div>
               <div class="card-footer text-muted">
               </div>
            </div>
         </div> -->

      </div>
   </div>
</div>
@endsection