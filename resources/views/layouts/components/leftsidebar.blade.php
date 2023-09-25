<div class="sidebar">
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div style="margin-left: 54px;margin-top: 10px;">
            @if(Auth::user()->userType == 'ADMIN')
            <h4>CPCB User</h4>
            <p>(Administrator)</p>
            @elseif(Auth::user()->userType == 'State')
            <h4>State User</h4>
            @elseif(Auth::user()->userType == 'PIA')
            <h4>Industrial Area:</h4>
            <h3>{{Auth::user()->PIAName}}</h3>
            @endif
        </div>
    </div>
    <!-- Sidebar Menu -->
    <nav class="mt-5" style="margin-top:-25px !important;">
        <ul class="nav nav-sidebar flex-column mt-3" data-widget="treeview" role="menu" data-accordion="false"
            style="margin-top: 10px;">
            <li class="nav-item mt-4">
                <a href="{{route('home')}}" class="nav-link active" style="color:#ffc107; font-size: large;">
                    <i class="far fa-circle nav-icon"></i>
                    <p>DashBoard</p>
                </a>
            </li>
            <li class="nav-item menu-open">
                <ul class="nav nav-treeview">
                    @if(Auth::user()->userType == 'State')
                    <!-- <li class="nav-item">
                        <a href="#" class="nav-link active" style="color:#ffc107;font-size: large;">
                            <i class="nav-icon fas fa-thermometer-empty"></i>
                            <p>
                                PIA User
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{route('viewprofile')}}" class="nav-link" style="color:#ffc107;">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Edit Profile</p>
                                </a>
                            </li>
                        </ul>
                    </li> -->
                    @endif
                </ul>
            </li>
            @if(Auth::user()->userType == 'PIA')
            <li class="nav-item">
                <a href="#" class="nav-link active" style="color:#ffc107;font-size: large;">
                    <i class="nav-icon fas fa-thermometer-empty"></i>
                    <p>
                        Report
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{url('actionreport')}}" class="nav-link" style="color:#ffc107;">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Add Action Report</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{url('viewactionreport')}}" class="nav-link" style="color:#ffc107;">
                            <i class="far fa-circle nav-icon"></i>
                            <p>View Action Report</p>
                        </a>
                    </li>
                </ul>
            </li>
            @endif
            @if(Auth::user()->userType == 'ADMIN')
            <li class="nav-item">
                <a href="#" class="nav-link active" style="color:#ffc107;font-size: large;">
                    <i class="nav-icon fas fa-thermometer-empty"></i>
                    <p>
                        Monitoring Report
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{url('viewMonitoringReport')}}" class="nav-link" style="color:#ffc107;">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Upload Monitoring Report</p>
                        </a>
                    </li>
                </ul>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{url('cpcbremark')}}" class="nav-link" style="color:#ffc107;">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Comment/Remark By CPCB On Action Plan</p>
                        </a>
                    </li>
                </ul>
            </li>
            @endif
            <li class="nav-item">
                <a href="{{ route('logout') }}" onclick="event.preventDefault();
               document.getElementById('logout-form').submit();" class="nav-link active"
                    style="color:#ffc107;font-size: large;">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Logout</p>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </a>
            </li>
        </ul>
    </nav>
</div>