<div class="left-sidenav">
    <!-- LOGO -->
    <div class="brand">
        <a href="{{ route('home') }}" class="logo">
            {{-- <span>
                <img src="{{ asset('public/images/1.jpg') }}" alt="logo-small" class="logo-sm">
            </span> --}}
            <span>
                <img src="{{ asset('public/images/3.png') }}" alt="logo-large" class="logo-lg logo-light"
                    style="width:200px; height:auto;">
            </span>
        </a>
    </div>
    <!--end logo-->
    <div class="menu-content h-100" data-simplebar>
        <ul class="metismenu left-sidenav-menu">
            <li class="menu-label mt-0">Main</li>

            {{-- Admin Menu --}}
            @role('Admin')
                <li>
                    <a href="{{ route('admin.dashboard') }}">
                        <i data-feather="home" class="align-self-center menu-icon"></i>
                        <span>Dashboard</span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('products.index') }}">
                        <i data-feather="box" class="align-self-center menu-icon"></i>
                        <span>Products</span>
                    </a>
                </li>

                {{-- Add more admin-only links here --}}
            @endrole

            {{-- Customer Menu --}}
            @role('Customer')
                <li>
                    <a href="{{ route('customer.dashboard') }}">
                        <i data-feather="home" class="align-self-center menu-icon"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                {{-- Add more customer-only links later if needed --}}
            @endrole
        </ul>
    </div>
</div>
