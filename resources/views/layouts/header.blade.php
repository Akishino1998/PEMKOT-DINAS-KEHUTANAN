<div class="app-header header">
    <div class="container-fluid">
        <div class="d-flex">
            <a class="header-brand" href="/">
                <img src="{{ asset('logo-black.png') }}" class="header-brand-img desktop-lgo" alt="Admitro logo">
                <img src="{{ asset('logo-owafs-penjualan1.png') }}" class="header-brand-img dark-logo" alt="Admitro logo">
                <img src="{{ asset('logo-black.png') }}" class="header-brand-img mobile-logo" alt="Admitro logo">
                <img src="{{ asset('logo-owafs-penjualan1.png') }}" class="header-brand-img darkmobile-logo" alt="Admitro logo">
            </a>
            <div class="app-sidebar__toggle" data-toggle="sidebar">
                <a class="open-toggle" href="#">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-align-left header-icon mt-1"><line x1="17" y1="10" x2="3" y2="10"></line><line x1="21" y1="6" x2="3" y2="6"></line><line x1="21" y1="14" x2="3" y2="14"></line><line x1="17" y1="18" x2="3" y2="18"></line></svg>
                </a>
            </div>
     
            <div class="d-flex order-lg-2 ml-auto">
                <a href="#" data-toggle="search" class="nav-link nav-link-lg d-md-none navsearch">
                    <svg class="header-icon search-icon" x="1008" y="1248" viewBox="0 0 24 24"  height="100%" width="100%" preserveAspectRatio="xMidYMid meet" focusable="false">
                        <path d="M0 0h24v24H0V0z" fill="none"/><path d="M15.5 14h-.79l-.28-.27C15.41 12.59 16 11.11 16 9.5 16 5.91 13.09 3 9.5 3S3 5.91 3 9.5 5.91 16 9.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19l-4.99-5zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5 14 7.01 14 9.5 11.99 14 9.5 14z"/>
                    </svg>
                </a>
                <div class="dropdown   header-fullscreen" >
                    <a  class="nav-link icon full-screen-link p-0"  id="fullscreen-button">
                        <svg xmlns="http://www.w3.org/2000/svg" class="header-icon" width="24" height="24" viewBox="0 0 24 24"><path d="M10 4L8 4 8 8 4 8 4 10 10 10zM8 20L10 20 10 14 4 14 4 16 8 16zM20 14L14 14 14 20 16 20 16 16 20 16zM20 8L16 8 16 4 14 4 14 10 20 10z"/></svg>
                    </a>
                </div>
            
                <div class="dropdown header-notify">
                    <a class="nav-link icon" data-toggle="dropdown">
                        <svg xmlns="http://www.w3.org/2000/svg" class="header-icon" width="24" height="24" viewBox="0 0 24 24"><path d="M19 13.586V10c0-3.217-2.185-5.927-5.145-6.742C13.562 2.52 12.846 2 12 2s-1.562.52-1.855 1.258C7.185 4.074 5 6.783 5 10v3.586l-1.707 1.707C3.105 15.48 3 15.734 3 16v2c0 .553.447 1 1 1h16c.553 0 1-.447 1-1v-2c0-.266-.105-.52-.293-.707L19 13.586zM19 17H5v-.586l1.707-1.707C6.895 14.52 7 14.266 7 14v-4c0-2.757 2.243-5 5-5s5 2.243 5 5v4c0 .266.105.52.293.707L19 16.414V17zM12 22c1.311 0 2.407-.834 2.818-2H9.182C9.593 21.166 10.689 22 12 22z"/></svg>
                        <span class="pulse "></span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow  animated">
                        <div class="dropdown-header">
                            <h6 class="mb-0">Notifications</h6>
                        </div>
                        <div class="notify-menu">
                            <a href="#" class="dropdown-item border-bottom d-flex pl-4">
                                <div class="notifyimg bg-info-transparent text-info"> <i class="ti-comment-alt"></i> </div>
                                <div>
                                    <div class="font-weight-normal1">Message Sent.</div>
                                    <div class="small text-muted">3 hours ago</div>
                                </div>
                            </a>
                            <a href="#" class="dropdown-item border-bottom d-flex pl-4">
                                <div class="notifyimg bg-primary-transparent text-primary"> <i class="ti-shopping-cart-full"></i> </div>
                                <div>
                                    <div class="font-weight-normal1"> Order Placed</div>
                                    <div class="small text-muted">5  hour ago</div>
                                </div>
                            </a>
                            <a href="#" class="dropdown-item border-bottom d-flex pl-4">
                                <div class="notifyimg bg-warning-transparent text-warning"> <i class="ti-calendar"></i> </div>
                                <div>
                                    <div class="font-weight-normal1"> Event Started</div>
                                    <div class="small text-muted">45 mintues ago</div>
                                </div>
                            </a>
                            <a href="#" class="dropdown-item border-bottom d-flex pl-4">
                                <div class="notifyimg bg-success-transparent text-success"> <i class="ti-desktop"></i> </div>
                                <div>
                                    <div class="font-weight-normal1">Your Admin lanuched</div>
                                    <div class="small text-muted">1 daya ago</div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="dropdown profile-dropdown">
                    <a href="#" class="nav-link pr-0 leading-none" data-toggle="dropdown">
                        <span>
                            <img src="{{ asset('assets/images/users/2.jpg') }}" alt="img" class="avatar avatar-md brround">
                        </span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow animated">
                        <div class="text-center">
                            <a href="#" class="dropdown-item text-center user pb-0 font-weight-bold">{{ Auth::user()->name }}</a>
                            <span class="text-center user-semi-title">{{ (Auth::user()->Role->role) }}</span>
                            <div class="dropdown-divider"></div>
                        </div>
                        
                        <a class="dropdown-item d-flex" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <i class="fas fa-sign-out header-icon mr-3 mt-1"></i>
                            <div href="{{ route('logout') }}" class="nav-link text-body font-weight-bold px-0">Keluar</div>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>