<nav id="sidebar" class="sidebar-wrapper">

    <!-- Sidebar brand start  -->
    <div class="sidebar-brand">
        <a href="index.html" class="logo">
            <img src="{{ asset('DashboardAssets/img/logo.svg') }}" alt="Admin Dashboards" />
        </a>
    </div>
    <!-- Sidebar brand end  -->


    <!-- User profile start -->
    <div class="sidebar-user-details">
        <div class="user-profile">
            <img src="{{ asset('DashboardAssets/img/user2.png') }}" class="profile-thumb" alt="Admin Dashboards">
            <h6 class="profile-name">{{ Auth()->guard('employe')->user()->name }}</h6>
            <ul class="profile-actions">
                <li>
                    <a href="javascript:void(0)">
                        <i class="icon-gitlab"></i>
                        <span class="count-label green"></span>
                    </a>
                </li>
                <li>
                    <a href="javascript:void(0)">
                        <i class="icon-twitter1"></i>
                    </a>
                </li>
                <li>
                    <a href="login.html">
                        <i class="icon-exit_to_app"></i>
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <!-- User profile end -->

    <!-- Sidebar content start -->
    <div class="sidebar-content">

        <!-- sidebar menu start -->
        <div class="sidebar-menu">
            <ul>
                <li class="active">
                    <a href="{{ route('employe.receivingAid.index') }}" class="current-page">
                        <i class="icon-home2"></i>
                        <span class="menu-text">Dashboard</span>
                    </a>
                </li>
    
                <li class="sidebar-dropdown">
                    <a href="#">
                        <i> 
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-list-task" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M2 2.5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5V3a.5.5 0 0 0-.5-.5zM3 3H2v1h1z"/>
                                <path d="M5 3.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5M5.5 7a.5.5 0 0 0 0 1h9a.5.5 0 0 0 0-1zm0 4a.5.5 0 0 0 0 1h9a.5.5 0 0 0 0-1z"/>
                                <path fill-rule="evenodd" d="M1.5 7a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5H2a.5.5 0 0 1-.5-.5zM2 7h1v1H2zm0 3.5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5zm1 .5H2v1h1z"/>
                              </svg>
                        </i>
                        <span class="menu-text">List of Campaigns Received</span>
                    </a>
                    <div class="sidebar-submenu">
                        <ul>
                            <li>
                                <a href="{{ route ('employe.receivingAid.new')}}">New Campaigns Received</a>
                            </li>
                            <li>
                                <a href="{{ route('employe.receivingAid.history') }}">History Receiving Aid</a>
                            </li>
                            {{-- <li>
                                <a href="{{ route('employe.receivingAid.create.account') }}">Create Account For Donor</a>
                            </li> --}}

                        </ul>
                    </div>
                </li>

                <li class="sidebar-dropdown">
                    <a href="#">
                        <i> 
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-plus" viewBox="0 0 16 16">
                                <path d="M6 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6m2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0m4 8c0 1-1 1-1 1H1s-1 0-1-1 1-4 6-4 6 3 6 4m-1-.004c-.001-.246-.154-.986-.832-1.664C9.516 10.68 8.289 10 6 10s-3.516.68-4.168 1.332c-.678.678-.83 1.418-.832 1.664z"/>
                                <path fill-rule="evenodd" d="M13.5 5a.5.5 0 0 1 .5.5V7h1.5a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0V8h-1.5a.5.5 0 0 1 0-1H13V5.5a.5.5 0 0 1 .5-.5"/>
                              </svg>
                        </i>
                        <span class="menu-text">Donor Manage</span>
                    </a>
                    <div class="sidebar-submenu">
                        <ul>
                            <li>
                                <a href="{{ route ('employe.receivingAid.donor.create')}}">Create Donor</a>
                            </li>
                         
                            {{-- <li>
                                <a href="{{ route('employe.receivingAid.create.account') }}">Create Account For Donor</a>
                            </li> --}}

                        </ul>
                    </div>
                </li>
            </ul>
        </div>
        <!-- sidebar menu end -->

    </div>
    <!-- Sidebar content end -->

</nav>
