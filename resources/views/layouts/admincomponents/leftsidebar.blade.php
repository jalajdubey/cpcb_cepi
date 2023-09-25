<div class="sidebar">
   <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
         <img src="{{asset('assets/images/user.png')}}" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
         <a href="#" class="d-block">EPA RECOGNITION</a>
      </div>
   </div>
   <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
         <li class="nav-item menu-open">
            <a href="#" class="nav-link active">
               <i class="nav-icon fas fa-tachometer-alt"></i>
               <p>
                  Applications
                  <i class="right fas fa-angle-left"></i>
               </p>
            </a>
            <ul class="nav nav-treeview">
               <li class="nav-item">
                  <a href="{{ route('home') }}" class="nav-link active">
                     <i class="far fa-circle nav-icon"></i>
                     <p>View Applications</p>
                  </a>
               </li>
               <li class="nav-item">
                  <a href="#" class="nav-link">
                     <i class="far fa-circle nav-icon"></i>
                     <p>View Payments</p>
                  </a>
               </li>
            </ul>
         </li>
         <li class="nav-item">
            <a href="#" class="nav-link active">
               <i class="nav-icon fas fa-thermometer-empty"></i>
               <p>
                  Registrations
                  <i class="right fas fa-angle-left"></i>
               </p>
            </a>
            <ul class="nav nav-treeview">
               <li class="nav-item">
                  <a href="{{ route('pendingusers')}}" class="nav-link active">
                     <i class="far fa-circle nav-icon"></i>
                     <p>Pending</p>
                  </a>
               </li>
               <li class="nav-item">
                  <a href="{{ route('approvedusers')}}" class="nav-link">
                     <i class="far fa-circle nav-icon"></i>
                     <p>Approved</p>
                  </a>
               </li>
               <li class="nav-item">
                  <a href="{{ route('rejectedusers')}}" class="nav-link">
                     <i class="far fa-circle nav-icon"></i>
                     <p>Rejected</p>
                  </a>
               </li>
            </ul>
         </li>
         <li class="nav-item">
            <a href="#" class="nav-link danger">
               <i class="nav-icon fas fa-user"></i>
               <p>
                  User Profile
                  <i class="right fas fa-angle-left"></i>
               </p>
            </a>
            <ul class="nav nav-treeview">
               <li class="nav-item">
                  <a href="{{ route('viewProfile') }}" class="nav-link active">
                     <i class="far fa-circle nav-icon"></i>
                     <p>View Profile</p>
                  </a>
               </li>
               <li class="nav-item">
                  <a class="nav-link" href="{{ route('logout') }}"
                     onclick="event.preventDefault();
                     document.getElementById('logout-form').submit();">
                  <i class="fas fa-sign-out-alt nav-icon"></i> {{ __('Logout') }}
                  </a>
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                     @csrf
                  </form>
               </li>
            </ul>
         </li>
      </ul>
   </nav>
</div>