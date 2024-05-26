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
                                <a href="{{ route('employe.receivingAid.show') }}">New Campaigns Received</a>
                            </li>
                            <li>
                                <a href="{{ route('admin.association.create') }}">Campaigns Received History</a>
                            </li>
                            <li>
                                <a href="{{ route('admin.association.archive') }}">Finished Reconnaissance Tours</a>
                            </li>

                        </ul>
                    </div>
                </li>
            </ul>
        </div>
        <!-- sidebar menu end -->

    </div>
    <!-- Sidebar content end -->

</nav>
