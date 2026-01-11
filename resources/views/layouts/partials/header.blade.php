<header class="header-area">
    <div class="container container-wide">
        <div class="row align-items-center">
            <div class="col-sm-4 col-lg-2">
                <div class="site-logo text-center text-sm-start">
                    <a href="{{ route('home') }}"><img src="{{ asset('public/images/2.png') }}" alt="Logo" /></a>
                </div>
            </div>

            <div class="col-lg-7 d-none d-lg-block">
                <div class="site-navigation">
                    <ul class="main-menu nav">

                        <li><a href="{{ route('home') }}">Home</a></li>
                        <li><a href="{{ route('shop') }}">Shop</a></li>
                        <li><a href="">Offers</a></li>
                        <li><a href="">About Us</a></li>
                        <li><a href="">Contact Us</a></li>
                    </ul>
                </div>
            </div>

            <div class="col-sm-8 col-lg-3">
                <div class="site-action d-flex justify-content-center justify-content-sm-end align-items-center">

                    {{-- If NOT logged in --}}
                    @guest
                        <ul class="login-reg-nav nav">
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>
                        </ul>
                    @endguest

                    {{-- If logged in --}}
                    @auth
                        <ul class="login-reg-nav nav">
                            <li class="dropdown">
                                <a class="nav-link dropdown-toggle nav-user" href="#" role="button"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    <span class="ml-1 nav-user-name hidden-sm">{{ Auth::user()->name }}</span>
                                    <img src="{{ Auth::user()->image ? asset('public/storage/' . Auth::user()->image) : asset('public/images/admin_pic2.jpg') }}"
                                        alt="profile-user" class="rounded-circle"
                                        style="width:40px; height:40px; object-fit:cover;" />
                                </a>
                                <div class="dropdown-menu dropdown-menu-end">
                                    @if (Auth::user()->hasRole('Admin'))
                                        <a class="dropdown-item" href="{{ route('admin.dashboard') }}">Admin Dashboard</a>
                                    @elseif(Auth::user()->hasRole('Customer'))
                                        <a class="dropdown-item" href="{{ route('customer.dashboard') }}">Customer
                                            Dashboard</a>
                                    @endif

                                    <div class="dropdown-divider"></div>
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <button type="submit" class="dropdown-item">Logout</button>
                                    </form>
                                </div>
                            </li>
                        </ul>
                    @endauth

                    {{-- Mini cart --}}
                    <div class="mini-cart-wrap">
                        <a href="{{ route('cart') }}" class="btn-mini-cart">
                            <i class="ion-bag"></i>
                            <span class="cart-total">
                                {{ session('cart') ? collect(session('cart'))->sum('quantity') : 0 }}
                            </span>
                        </a>
                    </div>

                    {{-- Responsive menu --}}
                    <div class="responsive-menu d-lg-none">
                        <button class="btn-menu">
                            <i class="fa fa-bars"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
