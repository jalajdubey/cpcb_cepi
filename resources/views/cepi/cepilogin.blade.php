@extends('layouts.app')
@section('content')
<style>
   .header-parana {
   height: 80px;
   }
   .navbar{
   height: 80px;
   z-index: 1;
   background-color: #fff;
   }
   #parana-message {
   color: #02007a!important;
   line-height: 20px;
   }
   li a{
   color:#fff !important;
   }
   .shadow-sm {
   box-shadow: 0 .125rem .25rem rgba(0,0,0,.075)!important;
   }
   @import url('https://fonts.googleapis.com/css2?family=El+Messiri:wght@700&display=swap');
   .sideimg{
   background:green;
   object-fit: cover;
   }
   h5{
    margin: 16px;
   }
   .bbttt{
      background-color: #6AB187 !important;
      color: #fff !important;
   }

   .divider:after,
   .divider:before {
   content: "";
   flex: 1;
   height: 1px;
   background: #eee;
   }
   .h-custom {
   height: calc(100% - 73px);
   }
   @media (max-width: 450px) {
      .h-custom {
      height: 100%;
      }
   }

</style>
<div class="container-fluid">
  <!----login area--->
  <div style="width:60%;margin:0 auto;box-shadow: 0 1rem 3rem rgba(0,0,0,.175)!important;">
   <div class="row mt-4 mb5"  >
      <div id="login-column"  style="width:50%;margin:0 auto;">
         <h5 class="text-center">CENTARL POLLUTION CONTROL BOARD</h5>
         <form method="POST" action="{{ route('login') }}" >
            @csrf
            <div id="login-box" style="margin-bottom:120px" >
                <div class="row mt-5">
                    <div class="col-md-12">
                    <h6 class="">Login As: </h6>
                  <div class="form-check">
                  <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                  <label class="form-check-label" for="flexRadioDefault1">
                  Industrial Area (PIAs)
                  </label>
                  <input class="form-check-input ml-4" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked>
                  <label class="form-check-label ml-5" for="flexRadioDefault2">
                  SPCBs / PCCs
                  </label>
                  <input class="form-check-input ml-4" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked>
                  <label class="form-check-label ml-5" for="flexRadioDefault2">
                  CPCB
                  </label>
                    </div>
                </div>
            </div>
               <div class="form-group">
                  <label for="">Please enter Username and Password</label>
                  <input type="text" name="email" id="" class="form-control @error('email') is-invalid @enderror" placeholder="Email Address" aria-describedby="helpId">
                  @error('email')
                  <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                  </span>
                  @enderror
               </div>
               <div class="form-group">
                  <input type="password" name="password" id="" class="form-control @error('password') is-invalid @enderror" placeholder="Password" aria-describedby="helpId">
                 
                  @error('password')
                  <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                  </span>
                  @enderror
               </div>
               @if (Route::has('password.request'))
               <a class="btn btn-link" href="{{ route('password.request') }}">
               {{ __('Forgot Your Password?') }}
               </a>
               @endif
               <button class="btn bbttt float-right ml-3 mr-3" 
               style="background-color: #1C4E80!important;" type="submit">Login</button>
            </div>
         </form>
         </div>
      </div>
   </div>
</div>

</div>
@include('layouts.components.footerouter')
@endsection