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
                    <a href="{{ route('employe.storeKeeper.index') }}" class="current-page">
                        <i class="icon-home2"></i>
                        <span class="menu-text">Dashboard</span>
                    </a>
                </li>
    
                <li class="sidebar-dropdown">
                    <a href="#">
                        <i> 
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bandaid" viewBox="0 0 16 16">
                                <path d="M14.121 1.879a3 3 0 0 0-4.242 0L8.733 3.026l4.261 4.26 1.127-1.165a3 3 0 0 0 0-4.242M12.293 8 8.027 3.734 3.738 8.031 8 12.293zm-5.006 4.994L3.03 8.737 1.879 9.88a3 3 0 0 0 4.241 4.24l.006-.006 1.16-1.121ZM2.679 7.676l6.492-6.504a4 4 0 0 1 5.66 5.653l-1.477 1.529-5.006 5.006-1.523 1.472a4 4 0 0 1-5.653-5.66l.001-.002 1.505-1.492z"/>
                                <path d="M5.56 7.646a.5.5 0 1 1-.706.708.5.5 0 0 1 .707-.708Zm1.415-1.414a.5.5 0 1 1-.707.707.5.5 0 0 1 .707-.707M8.39 4.818a.5.5 0 1 1-.708.707.5.5 0 0 1 .707-.707Zm0 5.657a.5.5 0 1 1-.708.707.5.5 0 0 1 .707-.707ZM9.803 9.06a.5.5 0 1 1-.707.708.5.5 0 0 1 .707-.707Zm1.414-1.414a.5.5 0 1 1-.706.708.5.5 0 0 1 .707-.708ZM6.975 9.06a.5.5 0 1 1-.707.708.5.5 0 0 1 .707-.707ZM8.39 7.646a.5.5 0 1 1-.708.708.5.5 0 0 1 .707-.708Zm1.413-1.414a.5.5 0 1 1-.707.707.5.5 0 0 1 .707-.707"/>
                              </svg>
                        </i>
                        <span class="menu-text">Aid Managing</span>
                    </a>
                    <div class="sidebar-submenu">
                        <ul>
                            <li>
                                <a href="{{ route('employe.storeKeeper.aid.index') }}">Aid Table</a>
                            </li>
                            
                        </ul>
                    </div>
                </li>

                <li class="sidebar-dropdown">
                    <a href="#">
                        <i> 
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-luggage-fill" viewBox="0 0 16 16">
                                <path d="M2 1.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 .5.5V5h.5A1.5 1.5 0 0 1 8 6.5V7H7v-.5a.5.5 0 0 0-.5-.5h-5a.5.5 0 0 0-.5.5v7a.5.5 0 0 0 .5.5H4v1H2.5v.25a.75.75 0 0 1-1.5 0v-.335A1.5 1.5 0 0 1 0 13.5v-7A1.5 1.5 0 0 1 1.5 5H2zM3 5h2V2H3z"/>
                                <path d="M2.5 7a.5.5 0 0 1 .5.5v5a.5.5 0 0 1-1 0v-5a.5.5 0 0 1 .5-.5m10 1v-.5A1.5 1.5 0 0 0 11 6h-1a1.5 1.5 0 0 0-1.5 1.5V8H8v8h5V8zM10 7h1a.5.5 0 0 1 .5.5V8h-2v-.5A.5.5 0 0 1 10 7M5 9.5A1.5 1.5 0 0 1 6.5 8H7v8h-.5A1.5 1.5 0 0 1 5 14.5zm9 6.5V8h.5A1.5 1.5 0 0 1 16 9.5v5a1.5 1.5 0 0 1-1.5 1.5z"/>
                              </svg>
                        </i>
                        <span class="menu-text">Giving Aid To Aid Distribution Staff</span>
                    </a>
                    <div class="sidebar-submenu">
                        <ul>
                            <li>
                                <a href="{{ route('employe.storeKeeper.aid.index') }}">Aid Table</a>
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
