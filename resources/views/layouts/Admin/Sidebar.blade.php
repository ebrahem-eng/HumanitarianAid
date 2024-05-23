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
            <h6 class="profile-name">{{ Auth()->guard('admin')->user()->name }}</h6>
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
                    <a href="{{ route('admin.index') }}" class="current-page">
                        <i class="icon-home2"></i>
                        <span class="menu-text">Admin Dashboard</span>
                    </a>
                </li>
                {{-- <li>
                    <a href="graph-widgets.html">
                        <i class="icon-line-graph"></i>
                        <span class="menu-text">Graph Widgets</span>
                    </a>
                </li> --}}
                {{-- <li>
                    <a href="table-widgets.html">
                        <i class="icon-triangle"></i>
                        <span class="menu-text">Table Widgets</span>
                    </a>
                </li> --}}
                <li class="sidebar-dropdown">
                    <a href="#">
                        <i> <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-wallet" viewBox="0 0 16 16">
                                <path
                                    d="M0 3a2 2 0 0 1 2-2h13.5a.5.5 0 0 1 0 1H15v2a1 1 0 0 1 1 1v8.5a1.5 1.5 0 0 1-1.5 1.5h-12A2.5 2.5 0 0 1 0 12.5zm1 1.732V12.5A1.5 1.5 0 0 0 2.5 14h12a.5.5 0 0 0 .5-.5V5H2a2 2 0 0 1-1-.268M1 3a1 1 0 0 0 1 1h12V2H2a1 1 0 0 0-1 1" />
                            </svg></i>
                        <span class="menu-text">Association Manage</span>
                    </a>
                    <div class="sidebar-submenu">
                        <ul>
                            <li>
                                <a href="{{ route('admin.association.index') }}">View Association</a>
                            </li>
                            <li>
                                <a href="{{ route('admin.association.create') }}">Create Association</a>
                            </li>
                            <li>
                                <a href="{{ route('admin.association.archive') }}">Association Archive</a>
                            </li>

                        </ul>
                    </div>
                </li>
                <li class="sidebar-dropdown">
                    <a href="#">
                        <i><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-people" viewBox="0 0 16 16">
                                <path
                                    d="M15 14s1 0 1-1-1-4-5-4-5 3-5 4 1 1 1 1zm-7.978-1L7 12.996c.001-.264.167-1.03.76-1.72C8.312 10.629 9.282 10 11 10c1.717 0 2.687.63 3.24 1.276.593.69.758 1.457.76 1.72l-.008.002-.014.002zM11 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4m3-2a3 3 0 1 1-6 0 3 3 0 0 1 6 0M6.936 9.28a6 6 0 0 0-1.23-.247A7 7 0 0 0 5 9c-4 0-5 3-5 4q0 1 1 1h4.216A2.24 2.24 0 0 1 5 13c0-1.01.377-2.042 1.09-2.904.243-.294.526-.569.846-.816M4.92 10A5.5 5.5 0 0 0 4 13H1c0-.26.164-1.03.76-1.724.545-.636 1.492-1.256 3.16-1.275ZM1.5 5.5a3 3 0 1 1 6 0 3 3 0 0 1-6 0m3-2a2 2 0 1 0 0 4 2 2 0 0 0 0-4" />
                            </svg></i>
                        <span class="menu-text">Employee Manage</span>
                    </a>
                    <div class="sidebar-submenu">
                        <ul>
                            <li>
                                <a href="{{ route('admin.employee.index') }}">View Employee</a>
                            </li>
                            <li>
                                <a href="{{ route('admin.employee.create') }}">Create Employee</a>
                            </li>
                            <li>
                                <a href="{{ route('admin.employee.archive') }}">Employee Archive</a>
                            </li>

                        </ul>
                    </div>
                </li>
                <li class="sidebar-dropdown">
                    <a href="#">
                        <i>
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-bandaid" viewBox="0 0 16 16">
                                <path
                                    d="M14.121 1.879a3 3 0 0 0-4.242 0L8.733 3.026l4.261 4.26 1.127-1.165a3 3 0 0 0 0-4.242M12.293 8 8.027 3.734 3.738 8.031 8 12.293zm-5.006 4.994L3.03 8.737 1.879 9.88a3 3 0 0 0 4.241 4.24l.006-.006 1.16-1.121ZM2.679 7.676l6.492-6.504a4 4 0 0 1 5.66 5.653l-1.477 1.529-5.006 5.006-1.523 1.472a4 4 0 0 1-5.653-5.66l.001-.002 1.505-1.492z" />
                                <path
                                    d="M5.56 7.646a.5.5 0 1 1-.706.708.5.5 0 0 1 .707-.708Zm1.415-1.414a.5.5 0 1 1-.707.707.5.5 0 0 1 .707-.707M8.39 4.818a.5.5 0 1 1-.708.707.5.5 0 0 1 .707-.707Zm0 5.657a.5.5 0 1 1-.708.707.5.5 0 0 1 .707-.707ZM9.803 9.06a.5.5 0 1 1-.707.708.5.5 0 0 1 .707-.707Zm1.414-1.414a.5.5 0 1 1-.706.708.5.5 0 0 1 .707-.708ZM6.975 9.06a.5.5 0 1 1-.707.708.5.5 0 0 1 .707-.707ZM8.39 7.646a.5.5 0 1 1-.708.708.5.5 0 0 1 .707-.708Zm1.413-1.414a.5.5 0 1 1-.707.707.5.5 0 0 1 .707-.707" />
                            </svg>
                        </i>
                        <span class="menu-text">Aid Reciept Campaigns Manage</span>
                    </a>
                    <div class="sidebar-submenu">
                        <ul>
                            <li>
                                <a href="{{ route('admin.AidRecieptCampaigns.index') }}">Aid Reciept Campaigns
                                    Table</a>
                            </li>
                            <li>
                                <a href="{{ route('admin.AidRecieptCampaigns.create') }}">Create Aid Reciept
                                    Campaigns</a>
                            </li>
                            <li>
                                <a href="{{ route('admin.AidRecieptCampaigns.archive') }}">Aid Reciept Campaign
                                    Archive</a>
                            </li>

                        </ul>
                    </div>
                </li>
                <li class="sidebar-dropdown">
                    <a href="{{ route('admin.vehicles.index') }}">
                        <i>
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-truck" viewBox="0 0 16 16">
                                <path
                                    d="M0 3.5A1.5 1.5 0 0 1 1.5 2h9A1.5 1.5 0 0 1 12 3.5V5h1.02a1.5 1.5 0 0 1 1.17.563l1.481 1.85a1.5 1.5 0 0 1 .329.938V10.5a1.5 1.5 0 0 1-1.5 1.5H14a2 2 0 1 1-4 0H5a2 2 0 1 1-3.998-.085A1.5 1.5 0 0 1 0 10.5zm1.294 7.456A2 2 0 0 1 4.732 11h5.536a2 2 0 0 1 .732-.732V3.5a.5.5 0 0 0-.5-.5h-9a.5.5 0 0 0-.5.5v7a.5.5 0 0 0 .294.456M12 10a2 2 0 0 1 1.732 1h.768a.5.5 0 0 0 .5-.5V8.35a.5.5 0 0 0-.11-.312l-1.48-1.85A.5.5 0 0 0 13.02 6H12zm-9 1a1 1 0 1 0 0 2 1 1 0 0 0 0-2m9 0a1 1 0 1 0 0 2 1 1 0 0 0 0-2" />
                            </svg>
                        </i>
                        <span class="menu-text">Vehicles</span>
                    </a>

                </li>
                <li class="sidebar-dropdown">
                    <a href="#">
                        <i>
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-cash" viewBox="0 0 16 16">
                                <path d="M8 10a2 2 0 1 0 0-4 2 2 0 0 0 0 4" />
                                <path
                                    d="M0 4a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H1a1 1 0 0 1-1-1zm3 0a2 2 0 0 1-2 2v4a2 2 0 0 1 2 2h10a2 2 0 0 1 2-2V6a2 2 0 0 1-2-2z" />
                            </svg>
                        </i>
                        <span class="menu-text">Donor Management</span>
                    </a>
                    <div class="sidebar-submenu">
                        <ul>
                            <li>
                                <a href="{{ route('admin.donor.index') }}">Donor Table</a>
                            </li>
                            <li>
                                <a href="{{ route('admin.donor.create') }}">Create Donor</a>
                            </li>
                            <li>
                                <a href="{{ route('admin.donor.archive') }}">Donor Archive</a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="sidebar-dropdown">
                    <a href="#">
                        <i>
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-wallet-fill" viewBox="0 0 16 16">
                                <path
                                    d="M1.5 2A1.5 1.5 0 0 0 0 3.5v2h6a.5.5 0 0 1 .5.5c0 .253.08.644.306.958.207.288.557.542 1.194.542s.987-.254 1.194-.542C9.42 6.644 9.5 6.253 9.5 6a.5.5 0 0 1 .5-.5h6v-2A1.5 1.5 0 0 0 14.5 2z" />
                                <path
                                    d="M16 6.5h-5.551a2.7 2.7 0 0 1-.443 1.042C9.613 8.088 8.963 8.5 8 8.5s-1.613-.412-2.006-.958A2.7 2.7 0 0 1 5.551 6.5H0v6A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5z" />
                            </svg>
                        </i>
                        <span class="menu-text">Donor Donation Requests</span>
                    </a>
                    <div class="sidebar-submenu">
                        <ul>
                            <li>
                                <a
                                    href="{{ route('admin.donorDonationRequests.MedicalSuppliesDonationRequests.index') }}">Medical
                                    Supplies Donation Requests</a>
                            </li>
                            <li>
                                <a href="{{ route('admin.donorDonationRequests.ClothingDonationRequests.index') }}">Clothing
                                    Donation Requests</a>
                            </li>
                            <li>
                                <a href="{{ route('admin.donorDonationRequests.FoodDonationRequests.index') }}">Food
                                    Donation Requests</a>
                            </li>
                            <li>
                                <a href="{{ route('admin.donorDonationRequests.RequestsForMoneyDonation.index') }}">Requests
                                    For Money Donations</a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="sidebar-dropdown">
                    <a href="#">
                        <i>
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                fill="currentColor" class="bi bi-person-wheelchair" viewBox="0 0 16 16">
                                <path
                                    d="M12 3a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3m-.663 2.146a1.5 1.5 0 0 0-.47-2.115l-2.5-1.508a1.5 1.5 0 0 0-1.676.086l-2.329 1.75a.866.866 0 0 0 1.051 1.375L7.361 3.37l.922.71-2.038 2.445A4.73 4.73 0 0 0 2.628 7.67l1.064 1.065a3.25 3.25 0 0 1 4.574 4.574l1.064 1.063a4.73 4.73 0 0 0 1.09-3.998l1.043-.292-.187 2.991a.872.872 0 1 0 1.741.098l.206-4.121A1 1 0 0 0 12.224 8h-2.79zM3.023 9.48a3.25 3.25 0 0 0 4.496 4.496l1.077 1.077a4.75 4.75 0 0 1-6.65-6.65z" />
                            </svg>
                        </i>
                        <span class="menu-text">Requests To Identify Those In Need Manage</span>
                    </a>
                    <div class="sidebar-submenu">
                        <ul>
                            <li>
                                <a href="{{ route('admin.IdentifyThoseInNeed.index') }}">Table Requests To Identify
                                    Those In Need</a>
                            </li>
                            <li>
                                <a href="{{ route('admin.IdentifyThoseInNeed.archive') }}">Archive Requests To
                                    Identify Those In Need</a>
                            </li>

                        </ul>
                    </div>
                </li>
                <li class="sidebar-dropdown">
                    <a href="#">
                        <i>
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                                <path
                                    d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8M1.173 8a13 13 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5s3.879 1.168 5.168 2.457A13 13 0 0 1 14.828 8q-.086.13-.195.288c-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5s-3.879-1.168-5.168-2.457A13 13 0 0 1 1.172 8z" />
                                <path
                                    d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5M4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0" />
                            </svg>
                        </i>
                        <span class="menu-text">Reconnaissance Tours Manage</span>
                    </a>
                    <div class="sidebar-submenu">
                        <ul>
                            <li>
                                <a href="{{ route('admin.ReconnaissanceTours.index') }}">Reconnaissance Tours
                                    Table</a>
                            </li>
                            <li>
                                <a href="{{ route('admin.ReconnaissanceTours.create') }}">Create Reconnaissance
                                    Tours</a>
                            </li>
                            <li>
                                <a href="{{ route('admin.ReconnaissanceTours.archive') }}">Reconnaissance Tours
                                    Archive</a>
                            </li>
                        </ul>
                    </div>
                </li>
                {{-- <li class="sidebar-dropdown">
                    <a href="#">
                        <i class="icon-pie-chart1"></i>
                        <span class="menu-text">Graphs</span>
                    </a>
                    <div class="sidebar-submenu">
                        <ul>
                            <li>
                                <a href="apex-graphs.html">Apex Graphs</a>
                            </li>
                            <li>
                                <a href="morris-graphs.html">Morris Graphs</a>
                            </li>
                            <li>
                                <a href="vector-maps.html">Vector Maps</a>
                            </li>
                        </ul>
                    </div>
                </li> --}}
                {{-- <li class="sidebar-dropdown">
                    <a href="#">
                        <i class="icon-unlock"></i>
                        <span class="menu-text">Authentication</span>
                    </a>
                    <div class="sidebar-submenu">
                        <ul>
                            <li>
                                <a href="login.html">Login</a>
                            </li>
                            <li>
                                <a href="signup.html">Signup</a>
                            </li>
                            <li>
                                <a href="forgot-pwd.html">Forgot Password</a>
                            </li>
                            <li>
                                <a href="error.html">404</a>
                            </li>
                            <li>
                                <a href="error2.html">505</a>
                            </li>
                            <li>
                                <a href="coming-soon.html">Coming Soon</a>
                            </li>
                        </ul>
                    </div>
                </li> --}}
            </ul>
        </div>
        <!-- sidebar menu end -->

    </div>
    <!-- Sidebar content end -->

</nav>
