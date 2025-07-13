<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>SiDrainase | Beranda</title>
    <meta name="description" content="">
    <meta name="keywords" content="">

    <!-- Favicons -->
    <link href="{{ asset('enno/assets/img/logo.png') }}" rel="icon">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&family=Ubuntu:wght@400;700&display=swap"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('enno/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('enno/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('enno/assets/vendor/aos/aos.css') }}" rel="stylesheet">
    <link href="{{ asset('enno/assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('enno/assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

    <!-- Main CSS File -->
    <link href="{{ asset('enno/assets/css/main.css') }}" rel="stylesheet">
    <link href="{{ asset('enno/assets/css/depan.css') }}" rel="stylesheet">
</head>

<body class="index-page">

    <!-- Header -->
    <header id="header" class="header d-flex align-items-center sticky-top">
        <div class="container-fluid container-xl position-relative d-flex align-items-center">
            <a href="#" class="logo d-flex align-items-center me-auto">
                <h1 class="sitename">SiDrainase</h1>
            </a>
            <nav id="navmenu" class="navmenu">
                <ul>
                    <li><a href="#hero" class="active">Beranda</a></li>
                    <li><a href="{{ route('peta') }}">Peta</a></li>
                    <li><a href="{{ route('tentangkami') }}">Tentang Kami</a></li>
                    <li><a href="{{ route('kontak') }}">Kontak</a></li>
                </ul>
                <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
            </nav>
            @auth
                <a class="btn-getstarted" href="{{ route('dashboard') }}">Dashboard</a>
            @else
                <a class="btn-getstarted" href="{{ route('login') }}">Login</a>
            @endauth
        </div>
    </header>
    <!-- End Header -->

    <!-- Hero Section -->
    <section id="hero" class="hero section py-5">
        <div class="container">
            <div class="row gy-4 align-items-center">
                <div class="col-lg-6 text-center text-lg-start" data-aos="fade-up">
                    <h1 class="fw-bold" style="color: #003566;">Selamat Datang di <span
                            class="text-primary">SiDrainase</span></h1>
                    <p class="text-muted mt-3">Sistem Informasi Geografis untuk pemetaan saluran
                        drainase di Kota Sukabumi.</p>
                    <div class="d-flex justify-content-center justify-content-lg-start mt-4">
                        @auth
                            <a class="btn-getstarted" href="{{ route('dashboard') }}">Dashboard</a>
                        @else
                            <a class="btn-getstarted" href="{{ route('login') }}">Login</a>
                        @endauth
                    </div>
                </div>
                <div class="col-lg-6 text-center" data-aos="zoom-in">
                    <img src="{{ asset('enno/assets/img/logo.png') }}" alt="Ilustrasi Drainase" class="img-fluid"
                        style="max-height: 300px;">
                </div>
            </div>
        </div>
    </section>
    <!-- End Hero Section -->

    {{-- <!-- Footer -->
    <footer id="footer" class="footer bg-dark text-white py-4 mt-5">
        <div class="container text-center">
            <p class="mb-0">© {{ date('Y') }} <strong>SiDrainase</strong> - Semua Hak Dilindungi</p>
        </div>
    </footer> --}}

    <!-- Scroll Top -->
    <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center">
        <i class="bi bi-arrow-up-short"></i>
    </a>

    <!-- Preloader -->
    <div id="preloader"></div>

    <!-- Vendor JS Files -->
    <script src="{{ asset('enno/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('enno/assets/vendor/php-email-form/validate.js') }}"></script>
    <script src="{{ asset('enno/assets/vendor/aos/aos.js') }}"></script>
    <script src="{{ asset('enno/assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
    <script src="{{ asset('enno/assets/vendor/purecounter/purecounter_vanilla.js') }}"></script>
    <script src="{{ asset('enno/assets/vendor/imagesloaded/imagesloaded.pkgd.min.js') }}"></script>
    <script src="{{ asset('enno/assets/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('enno/assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('enno/assets/js/main.js') }}"></script>

    <script>
        AOS.init();
    </script>

</body>

</html>
