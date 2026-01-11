<!DOCTYPE html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    @yield('title')

    <!--== Favicon ==-->
    <link rel="shortcut icon" href="{{ asset('public/images/1.jpg') }}" type="image/x-icon" />

    @yield('css')

    <style>
        .header-area {
            position: sticky;
            /* modern browsers */
            top: 0;
            /* stick to the very top */
            z-index: 999;
            /* keep it above other elements */
            background: #fff;
            /* ensure background covers content behind */
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            /* optional subtle shadow */
        }
    </style>

</head>

<body>

    <!--== Start Header Area ==-->
    @include('layouts.partials.header')
    <!--== End Header Area ==-->

    <!--== Start Content Area Wrapper ==-->
    @yield('content')
    <!--== End Content Area Wrapper ==-->

    <!--== Start Footer Area Wrapper ==-->
    @include('layouts.partials.footer')
    <!--== End Footer Area Wrapper ==-->

    <!-- Scroll Top Button -->
    <button class="btn-scroll-top"><i class="ion-chevron-up"></i></button>


    <!--== Start Responsive Menu Wrapper ==-->
    <aside class="off-canvas-wrapper off-canvas-menu">
        <div class="off-canvas-overlay"></div>
        <div class="off-canvas-inner">
            <!-- Start Off Canvas Content -->
            <div class="off-canvas-content">
                <div class="off-canvas-header">
                    <div class="logo">
                        <a href="{{ route('home') }}"><img src="{{ asset('public/images/2.png') }}" alt="Logo"></a>
                    </div>
                    <div class="close-btn">
                        <button class="btn-close"><i class="ion-android-close"></i></button>
                    </div>
                </div>

                <!-- Content Auto Generate Form Main Menu Here -->
                <div class="res-mobile-menu mobile-menu">

                </div>
            </div>
        </div>
    </aside>
    <!--== End Responsive Menu Wrapper ==-->


    <!--=======================Javascript============================-->
    @yield('js')

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Intercept all add-to-cart forms
            document.querySelectorAll('.add-to-cart-form').forEach(form => {
                form.addEventListener('submit', function(e) {
                    e.preventDefault();

                    const url = form.action;
                    const formData = new FormData(form);

                    fetch(url, {
                            method: 'POST',
                            headers: {
                                'X-CSRF-TOKEN': form.querySelector('input[name="_token"]').value
                            },
                            body: formData
                        })
                        .then(res => res.text())
                        .then(() => {
                            // After adding, fetch updated cart count
                            fetch("{{ route('cart.count') }}")
                                .then(res => res.json())
                                .then(data => {
                                    document.querySelector('.cart-total').textContent = data
                                        .count;
                                });

                            // Optional: show a toast/snackbar
                            console.log('Product added to cart!');
                        })
                        .catch(err => console.error(err));
                });
            });
        });
    </script>

</body>

</html>
