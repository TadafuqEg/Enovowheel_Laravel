<!-- Preloader -->
<div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__wobble" src="{{ asset('dist/img/AdminLTELogo.png') }}" alt="AdminLTELogo" height="60"
        width="60">
</div>

<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-dark">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a class="nav-link">@yield('title', 'Home')</a>
        </li>
        {{-- <li class="nav-item d-none d-sm-inline-block">
            <a href="#" class="nav-link">Contact</a>
        </li> --}}
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <!-- Navbar Search -->
        {{-- <li class="nav-item">
            <a class="nav-link" data-widget="navbar-search" href="#" role="button">
                <i class="fas fa-search"></i>
            </a>
            <div class="navbar-search-block">
                <form class="form-inline">
                    <div class="input-group input-group-sm">
                        <input class="form-control form-control-navbar" type="search" placeholder="Search"
                            aria-label="Search">
                        <div class="input-group-append">
                            <button class="btn btn-navbar" type="submit">
                                <i class="fas fa-search"></i>
                            </button>
                            <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </li> --}}

        <!-- Messages Dropdown Menu -->
        {{-- <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
                <i class="far fa-comments"></i>
                <span class="badge badge-danger navbar-badge">3</span>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <a href="#" class="dropdown-item">
                    <!-- Message Start -->
                    <div class="media">
                        <img src="{{ asset('dist/img/user1-128x128.jpg') }}" alt="User Avatar" class="img-size-50 mr-3 img-circle">
                        <div class="media-body">
                            <h3 class="dropdown-item-title">
                                Brad Diesel
                                <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                            </h3>
                            <p class="text-sm">Call me whenever you can...</p>
                            <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                        </div>
                    </div>
                    <!-- Message End -->
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item">
                    <!-- Message Start -->
                    <div class="media">
                        <img src="{{ asset('dist/img/user8-128x128.jpg') }}" alt="User Avatar" class="img-size-50 img-circle mr-3">
                        <div class="media-body">
                            <h3 class="dropdown-item-title">
                                John Pierce
                                <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                            </h3>
                            <p class="text-sm">I got your message bro</p>
                            <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                        </div>
                    </div>
                    <!-- Message End -->
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item">
                    <!-- Message Start -->
                    <div class="media">
                        <img src="{{ asset('dist/img/user3-128x128.jpg') }}" alt="User Avatar" class="img-size-50 img-circle mr-3">
                        <div class="media-body">
                            <h3 class="dropdown-item-title">
                                Nora Silvester
                                <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
                            </h3>
                            <p class="text-sm">The subject goes here</p>
                            <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                        </div>
                    </div>
                    <!-- Message End -->
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
            </div>
        </li> --}}
        <!-- Notifications Dropdown Menu -->
        {{-- <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
                <i class="far fa-bell"></i>
                <span class="badge badge-warning navbar-badge">15</span>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <span class="dropdown-item dropdown-header">15 Notifications</span>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item">
                    <i class="fas fa-envelope mr-2"></i> 4 new messages
                    <span class="float-right text-muted text-sm">3 mins</span>
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item">
                    <i class="fas fa-users mr-2"></i> 8 friend requests
                    <span class="float-right text-muted text-sm">12 hours</span>
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item">
                    <i class="fas fa-file mr-2"></i> 3 new reports
                    <span class="float-right text-muted text-sm">2 days</span>
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
            </div>
        </li> --}}
        <li class="nav-item">
            <a class="nav-link" onclick="goBack()"  role="button" title="Back">
                <i class="fas fa-arrow-left"></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" onclick="goNext()"  role="button" title="Next">
                <i class="fas fa-arrow-right"></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                <i class="fas fa-expand-arrows-alt"></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
                <i class="fas fa-th-large"></i>
            </a>
        </li>
    </ul>
</nav>
<!-- /.navbar -->

<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/admin-dashboard" class="brand-link">

        <span class="brand-text font-weight-light">Monzer El-zenaidy</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('logos/users.png') }}" class="img-circle elevation-2" alt="User Image"
                    style="height: 2rem;
                width: 2rem;">
            </div>
            <div class="info">
                <a href="{{url('/admin-dashboard/users')}}" class="d-block">Users</a>
            </div>
        </div>
       
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('logos/state.png') }}" class="img-circle elevation-2" alt="User Image"
                    style="height: 2rem;
                width: 2rem;">
            </div>
            <div class="info">
                <a href="{{url('/admin-dashboard/states')}}" class="d-block">States</a>
            </div>
        </div>
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('logos/dependencies.png') }}" class="img-circle elevation-2" alt="User Image"
                    style="height: 2rem;
                width: 2rem;">
            </div>
            <div class="info">
                <a href="{{url('/admin-dashboard/dependencies')}}" class="d-block">Dependencies</a>
            </div>
        </div>
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('logos/street.png') }}" class="img-circle elevation-2" alt="User Image"
                    style="height: 2rem;
                width: 2rem;">
            </div>
            <div class="info">
                <a href="{{url('/admin-dashboard/streets')}}" class="d-block">Streets</a>
            </div>
        </div>
        
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('logos/help.png') }}" class="img-circle elevation-2" alt="User Image"
                    style="height: 2rem;
                width: 2rem;">
            </div>
            <div class="info">
                <a href="{{url('/admin-dashboard/help_requests')}}" class="d-block">Help Requests</a>
            </div>
        </div>

        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('logos/volunteer.png') }}" class="img-circle elevation-2" alt="User Image"
                    style="height: 2rem;
                width: 2rem;">
            </div>
            <div class="info">
                <a href="{{url('/admin-dashboard/volunteers')}}" class="d-block">Volunteers</a>
            </div>
        </div>
        
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('logos/FAQs.png') }}" class="img-circle elevation-2" alt="User Image"
                    style="height: 2rem;
                width: 2rem;">
            </div>
            <div class="info">
                <a href="{{url('/admin-dashboard/FAQs')}}" class="d-block">FAQs</a>
            </div>
        </div>
         
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('logos/setting.png') }}" class="img-circle elevation-2" alt="User Image"
                    style="height: 2rem;
                width: 2rem;">
            </div>
            <div class="info">
                <a href="{{url('/admin-dashboard/settings')}}" class="d-block">Settings</a>
            </div>
        </div>
        
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('logos/setting.png') }}" class="img-circle elevation-2" alt="User Image"
                    style="height: 2rem;
                width: 2rem;">
            </div>
            <div class="info">
                <a href="{{url('/admin-dashboard/community')}}" class="d-block">Community</a>
            </div>
        </div>
        
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('logos/contact_us.png') }}" class="img-circle elevation-2" alt="Contact Us"
                    style="height: 2rem;
                width: 2rem;">
            </div>
            <div class="info">
                <a href="{{url('/admin-dashboard/contact_us')}}" class="d-block">Contact Us</a>
            </div>
        </div>
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('logos/contact_us.png') }}" class="img-circle elevation-2" alt="Contact Us"
                    style="height: 2rem;
                width: 2rem;">
            </div>
            <div class="info">
                <a href="{{url('/admin-dashboard/recommendations')}}" class="d-block">Recommendations</a>
            </div>
        </div>
        
        <!-- Sidebar Menu -->
       
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
