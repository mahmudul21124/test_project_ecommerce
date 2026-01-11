<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    @yield('title')
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('public/images/1.jpg') }}">

    {{-- css --}}

    @yield('css')

</head>

<body class="dark-sidenav">
    <!-- Left Sidenav -->
    @include('admin.layouts.leftbar')
    <!-- end left-sidenav-->


    <div class="page-wrapper">
        <!-- Top Bar Start -->
        @include('admin.layouts.topbar')
        <!-- Top Bar End -->

        <!-- Page Content-->
        <div class="page-content">
            <div class="container-fluid">

                <!-- Page-Title -->
                @yield('breadcrumb')
                <!-- end page title end breadcrumb -->

                {{-- Content --}}
                @yield('content')

            </div><!-- container -->

            {{-- Footer --}}
            @include('admin.layouts.footer')
            <!--end footer-->
        </div>
        <!-- end page content -->
    </div>
    <!-- end page-wrapper -->



    {{-- js --}}
    @yield('js')

</body>

</html>
