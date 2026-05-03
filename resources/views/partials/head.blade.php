<nav class="nav navbar navbar-expand-lg navbar-light iq-navbar">
    <div class="container-fluid navbar-inner">
        <button data-trigger="navbar_main" class="d-lg-none btn btn-primary rounded-pill p-1 pt-0" type="button">
            <svg class="icon-20" width="20px" viewBox="0 0 24 24">
                <path fill="currentColor" d="M4,11V13H16L10.5,18.5L11.92,19.92L19.84,12L11.92,4.08L10.5,5.5L16,11H4Z">
                </path>
            </svg>
        </button>
        <a href="{{ route('dashboard') }}" class="navbar-brand">
            <!--Logo start-->
            <img src="{{ asset('../assets/images/inps.png') }}" width="40" height="35" />
            <!--logo End-->
            <h4 class="logo-title">SAMO</h4>
        </a>
        <!-- Horizontal Menu Start -->
        <nav id="navbar_main" class="mobile-offcanvas nav navbar navbar-expand-xl hover-nav horizontal-nav mx-md-auto">
            <div class="container-fluid">
                <div class="offcanvas-header px-0">
                    <div class="navbar-brand ms-3">

                        <!--Logo start-->
                        <div class="logo-main">
                            <div class="logo-normal">
                                <img src="{{ asset('../assets/images/inps.png') }}" width="40" height="35" />
                            </div>
                            <div class="logo-mini">
                                <img src="{{ asset('../assets/images/inps.png') }}" width="30" height="30" />
                            </div>
                        </div>
                        <!--logo End-->

                        <h4 class="logo-title">SAMO</h4>
                    </div>
                    <button class="btn-close float-end"></button>
                </div>
                <ul class="navbar-nav">
                    <li class="nav-item"><a class="nav-link " href="{{ route('dossiers') }}"> Dossiers </a></li>
                    <li class="nav-item"><a class="nav-link " href="{{ route('team') }}"> Equipes </a></li>
                    <li class="nav-item"><a class="nav-link " href="{{ route('sheets') }}"><span
                                class="item-name">Productivité</span></a></li>
                    {{-- <li class="nav-item"><a class="nav-link " href="../dashboard/index-boxed.html"> Boxed Horizontal </a></li>
                  <li class="nav-item"><a class="nav-link " href="../dashboard/index-boxed-fancy.html"> Boxed Fancy</a></li> --}}
                </ul>
            </div> <!-- container-fluid.// -->
        </nav>
        <!-- Sidebar Menu End --> <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon">
                <span class="navbar-toggler-bar bar1 mt-2"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
            </span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">



                <li class="nav-item dropdown">
                    <a class="nav-link py-0 d-flex align-items-center" href="#" id="navbarDropdown" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="{{ asset('../assets/images/avatars/01.png') }}" alt="User-Profile"
                            class="theme-color-default-img img-fluid avatar avatar-50 avatar-rounded">
                        <img src="{{ asset('../assets/images/avatars/avtar_1.png') }}" alt="User-Profile"
                            class="theme-color-purple-img img-fluid avatar avatar-50 avatar-rounded">
                        <img src="{{ asset('../assets/images/avatars/avtar_2.png') }}" alt="User-Profile"
                            class="theme-color-blue-img img-fluid avatar avatar-50 avatar-rounded">
                        <img src="{{ asset('../assets/images/avatars/avtar_4.png') }}" alt="User-Profile"
                            class="theme-color-green-img img-fluid avatar avatar-50 avatar-rounded">
                        <img src="{{ asset('../assets/images/avatars/avtar_5.png') }}" alt="User-Profile"
                            class="theme-color-yellow-img img-fluid avatar avatar-50 avatar-rounded">
                        <img src="{{ asset('../assets/images/avatars/avtar_3.png') }}" alt="User-Profile"
                            class="theme-color-pink-img img-fluid avatar avatar-50 avatar-rounded">
                        <div class="caption ms-3 d-none d-md-block">
                            <h6 class="mb-0 caption-title">{{ auth()->user()->email }}</h6>
                            <p class="mb-0 caption-sub-title">{{ auth()->user()->role }}</p>
                        </div>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        {{-- <li><a class="dropdown-item" href="../dashboard/app/user-profile.html">Profile</a></li>
                    <li><a class="dropdown-item" href="../dashboard/app/user-privacy-setting.html">Privacy Setting</a></li> --}}
                        {{-- <li><hr class="dropdown-divider"></li> --}}
                        <li>
                            <form method="POST" action="{{ route('logout') }}" class="w-full">
                                @csrf
                                <button type= "submit" class="dropdown-item">Logout</button>
                            </form>


                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav> <!--Nav End-->
