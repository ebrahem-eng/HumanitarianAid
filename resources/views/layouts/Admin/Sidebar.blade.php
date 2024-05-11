<nav id="sidebar" class="sidebar-wrapper">

    <!-- Sidebar brand start  -->
    <div class="sidebar-brand">
        <a href="index.html" class="logo">
            <img src="{{asset('DashboardAssets/img/logo.svg')}}" alt="Admin Dashboards" />
        </a>
    </div>
    <!-- Sidebar brand end  -->

    <!-- User profile start -->
    <div class="sidebar-user-details">
        <div class="user-profile">
            <img src="{{asset('DashboardAssets/img/user2.png')}}" class="profile-thumb" alt="Admin Dashboards">
            <h6 class="profile-name">{{Auth()->guard('admin')->user()->name}}</h6>
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
                    <a href="index.html" class="current-page">
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
                        <i > <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-wallet" viewBox="0 0 16 16">
                            <path d="M0 3a2 2 0 0 1 2-2h13.5a.5.5 0 0 1 0 1H15v2a1 1 0 0 1 1 1v8.5a1.5 1.5 0 0 1-1.5 1.5h-12A2.5 2.5 0 0 1 0 12.5zm1 1.732V12.5A1.5 1.5 0 0 0 2.5 14h12a.5.5 0 0 0 .5-.5V5H2a2 2 0 0 1-1-.268M1 3a1 1 0 0 0 1 1h12V2H2a1 1 0 0 0-1 1"/>
                          </svg></i>
                        <span class="menu-text">Association Manage</span>
                    </a>
                    <div class="sidebar-submenu">
                        <ul>
                            <li>
                                <a href="{{route('admin.association.index')}}">View Association</a>
                            </li>
                            <li>
                                <a href="{{route('admin.association.create')}}">Create Association</a>
                            </li>
                            <li>
                                <a href="{{route('admin.association.archive')}}">Association Archive</a>
                            </li>
                          
                        </ul>
                    </div>
                </li>
                <li class="sidebar-dropdown">
                    <a href="#">
                        <i ><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-people" viewBox="0 0 16 16">
                            <path d="M15 14s1 0 1-1-1-4-5-4-5 3-5 4 1 1 1 1zm-7.978-1L7 12.996c.001-.264.167-1.03.76-1.72C8.312 10.629 9.282 10 11 10c1.717 0 2.687.63 3.24 1.276.593.69.758 1.457.76 1.72l-.008.002-.014.002zM11 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4m3-2a3 3 0 1 1-6 0 3 3 0 0 1 6 0M6.936 9.28a6 6 0 0 0-1.23-.247A7 7 0 0 0 5 9c-4 0-5 3-5 4q0 1 1 1h4.216A2.24 2.24 0 0 1 5 13c0-1.01.377-2.042 1.09-2.904.243-.294.526-.569.846-.816M4.92 10A5.5 5.5 0 0 0 4 13H1c0-.26.164-1.03.76-1.724.545-.636 1.492-1.256 3.16-1.275ZM1.5 5.5a3 3 0 1 1 6 0 3 3 0 0 1-6 0m3-2a2 2 0 1 0 0 4 2 2 0 0 0 0-4"/>
                          </svg></i>
                        <span class="menu-text">Employee Manage</span>
                    </a>
                    <div class="sidebar-submenu">
                        <ul>
                            <li>
                                <a href="{{route('admin.employee.index')}}">View Employee</a>
                            </li>
                            <li>
                                <a href="{{route('admin.employee.create')}}">Create Employee</a>
                            </li>
                            <li>
                                <a href="{{route('admin.employee.archive')}}">Employee Archive</a>
                            </li>
                          
                        </ul>
                    </div>
                </li>
                <li class="sidebar-dropdown">
                    <a href="#">
                        <i>
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bandaid" viewBox="0 0 16 16">
                                <path d="M14.121 1.879a3 3 0 0 0-4.242 0L8.733 3.026l4.261 4.26 1.127-1.165a3 3 0 0 0 0-4.242M12.293 8 8.027 3.734 3.738 8.031 8 12.293zm-5.006 4.994L3.03 8.737 1.879 9.88a3 3 0 0 0 4.241 4.24l.006-.006 1.16-1.121ZM2.679 7.676l6.492-6.504a4 4 0 0 1 5.66 5.653l-1.477 1.529-5.006 5.006-1.523 1.472a4 4 0 0 1-5.653-5.66l.001-.002 1.505-1.492z"/>
                                <path d="M5.56 7.646a.5.5 0 1 1-.706.708.5.5 0 0 1 .707-.708Zm1.415-1.414a.5.5 0 1 1-.707.707.5.5 0 0 1 .707-.707M8.39 4.818a.5.5 0 1 1-.708.707.5.5 0 0 1 .707-.707Zm0 5.657a.5.5 0 1 1-.708.707.5.5 0 0 1 .707-.707ZM9.803 9.06a.5.5 0 1 1-.707.708.5.5 0 0 1 .707-.707Zm1.414-1.414a.5.5 0 1 1-.706.708.5.5 0 0 1 .707-.708ZM6.975 9.06a.5.5 0 1 1-.707.708.5.5 0 0 1 .707-.707ZM8.39 7.646a.5.5 0 1 1-.708.708.5.5 0 0 1 .707-.708Zm1.413-1.414a.5.5 0 1 1-.707.707.5.5 0 0 1 .707-.707"/>
                              </svg>
                        </i>
                        <span class="menu-text">Aid Reciept Campaigns Manage</span>
                    </a>
                    <div class="sidebar-submenu">
                        <ul>
                            <li>
                                <a href="default-layout.html">Aid Reciept Campaigns Table</a>
                            </li>
                            <li>
                                <a href="slim-sidebar.html">Slim Layout</a>
                            </li>
                            <li>
                                <a href="cards.html">Cards</a>
                            </li>
                            <li>
                                <a href="grid.html">Grid</a>
                            </li>
                            <li>
                                <a href="grid-doc.html">Grid Doc</a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="sidebar-dropdown">
                    <a href="#">
                        <i class="icon-book-open"></i>
                        <span class="menu-text">Pages</span>
                    </a>
                    <div class="sidebar-submenu">
                        <ul>
                            <li>
                                <a href="account-settings.html">Account Settings</a>
                            </li>
                            <li>
                                <a href="faq.html">Faq</a>
                            </li>
                            <li>
                                <a href="gallery.html">Gallery</a>
                            </li>
                            <li>
                                <a href="invoice.html">Invoice</a>
                            </li>
                            <li>
                                <a href="pricing.html">Pricing Plans</a>
                            </li>
                            <li>
                                <a href="search-results.html">Search Results</a>
                            </li>
                            <li>
                                <a href="timeline.html">Timeline</a>
                            </li>
                            <li>
                                <a href="user-profile.html">User Profile</a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="sidebar-dropdown">
                    <a href="#">
                        <i class="icon-edit1"></i>
                        <span class="menu-text">Forms</span>
                    </a>
                    <div class="sidebar-submenu">
                        <ul>
                            <li>
                                <a href="datepickers.html">Datepickers</a>
                            </li>
                            <li>
                                <a href="editor.html">Editor</a>
                            </li>
                            <li>
                                <a href="form-inputs.html">Inputs</a>
                            </li>
                            <li>
                                <a href="input-groups.html">Input Groups</a>
                            </li>
                            <li>
                                <a href="check-radio.html">Check Boxes</a>
                            </li>
                            <li>
                                <a href="input-masks.html">Input Masks</a>
                            </li>
                            <li>
                                <a href="input-tags.html">Input Tags</a>
                            </li>
                            <li>
                                <a href="range-sliders.html">Range Sliders</a>
                            </li>
                            <li>
                                <a href="wizard.html">Wizards</a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="sidebar-dropdown">
                    <a href="#">
                        <i class="icon-box"></i>
                        <span class="menu-text">jQuery Components</span>
                    </a>
                    <div class="sidebar-submenu">
                        <ul>
                            <li>
                                <a href="accordion.html">Accordion</a>
                            </li>
                            <li>
                                <a href="accordion-icons.html">Accordion Icons</a>
                            </li>
                            <li>
                                <a href="accordion-arrows.html">Accordion Arrows</a>
                            </li>
                            <li>
                                <a href="accordion-lg.html">Accordion Large</a>
                            </li>
                            <li>
                                <a href="carousel.html">Carousels</a>
                            </li>
                            <li>
                                <a href="modals.html">Modals</a>
                            </li>
                            <li>
                                <a href="alerts.html">Notifications</a>
                            </li>
                            <li>
                                <a href="tooltips.html">Tooltips</a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="sidebar-dropdown">
                    <a href="#">
                        <i class="icon-star2"></i>
                        <span class="menu-text">UI Elements</span>
                    </a>
                    <div class="sidebar-submenu">
                        <ul>
                            <li>
                                <a href="avatars.html">Avatars</a>
                            </li>
                            <li>
                                <a href="buttons.html">Buttons</a>
                            </li>
                            <li>
                                <a href="button-groups.html">Button Groups</a>
                            </li>
                            <li>
                                <a href="dropdowns.html">Dropdowns</a>
                            </li>
                            <li>
                                <a href="icons.html">Icons</a>
                            </li>
                            <li>
                                <a href="jumbotron.html">Jumbotron</a>
                            </li>
                            <li>
                                <a href="labels-badges.html">Labels &amp; Badges</a>
                            </li>
                            <li>
                                <a href="list-items.html">List Items</a>
                            </li>
                            <li>
                                <a href="pagination.html">Paginations</a>
                            </li>
                            <li>
                                <a href="progress.html">Progress Bars</a>
                            </li>
                            <li>
                                <a href="pills.html">Pills</a>
                            </li>
                            <li>
                                <a href="spinners.html">Spinners</a>
                            </li>
                            <li>
                                <a href="typography.html">Typography</a>
                            </li>
                            <li>
                                <a href="images.html">Thumbnails</a>
                            </li>
                            <li>
                                <a href="text-avatars.html">Text Avatars</a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="sidebar-dropdown">
                    <a href="#">
                        <i class="icon-border_all"></i>
                        <span class="menu-text">Tables</span>
                    </a>
                    <div class="sidebar-submenu">
                        <ul>
                            <li>
                                <a href="data-tables.html">Data Tables</a>
                            </li>
                            <li>
                                <a href="custom-tables.html">Custom Tables</a>
                            </li>
                            <li>
                                <a href="default-table.html">Default Table</a>
                            </li>
                            <li>
                                <a href="table-bordered.html">Table Bordered</a>
                            </li>
                            <li>
                                <a href="table-hover.html">Table Hover</a>
                            </li>
                            <li>
                                <a href="table-striped.html">Table Striped</a>
                            </li>
                            <li>
                                <a href="table-small.html">Table Small</a>
                            </li>
                            <li>
                                <a href="table-colors.html">Table Colors</a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="sidebar-dropdown">
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
                </li>
                <li class="sidebar-dropdown">
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
                </li>
            </ul>
        </div>
        <!-- sidebar menu end -->

    </div>
    <!-- Sidebar content end -->

</nav>