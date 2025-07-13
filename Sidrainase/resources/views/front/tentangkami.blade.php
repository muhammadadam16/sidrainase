<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>SiDrainase | Tentang Kami</title>
    <meta name="description" content="">
    <meta name="keywords" content="">

    <!-- Favicons -->
    <link href="{{ asset('enno/assets/img/logo.png') }}" rel="icon">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700&display=swap"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('enno/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('enno/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('enno/assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('enno/assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">
    <link href="{{ asset('enno/assets/vendor/aos/aos.css') }}" rel="stylesheet">

    <!-- Main CSS File -->
    <link href="{{ asset('enno/assets/css/main.css') }}" rel="stylesheet">
    <link href="{{ asset('enno/assets/css/halaman.css') }}" rel="stylesheet">
</head>

<body class="index-page">

    <!-- Header -->
    <header id="header" class="header d-flex align-items-center sticky-top">
        <div class="container-fluid container-xl position-relative d-flex align-items-center">
            <a href="{{ route('front.welcome') }}" class="logo d-flex align-items-center me-auto">
                <h1 class="sitename">SiDrainase</h1>
            </a>

            <nav id="navmenu" class="navmenu">
                <ul>
                    <li><a href="{{ route('front.welcome') }}">Beranda</a></li>
                    <li><a href="{{ route('peta') }}">Peta</a></li>
                    <li><a href="{{ route('tentangkami') }}" class="active">Tentang Kami</a></li>
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

    <!-- About Section -->
    <section id="about" class="py-5">
        <div class="container" data-aos="fade-up">
            <div class="row mb-5">
                <div class="col text-center">
                    <h2 class="fw-bold" style="color: #003566;">TENTANG KAMI</h2>
                    <p style="color: #6c757d;">Makna simbolis logo dan filosofi dari SiDrainase.</p>
                </div>
            </div>

            <div class="row gy-4">
                <div class="col-md-6 col-lg-3" data-aos="zoom-in" data-aos-delay="100">
                    <div class="card h-100 text-center border-0 shadow">
                        <div class="card-body d-flex flex-column align-items-center">
                            <img src="{{ asset('enno/assets/img/logo.png') }}" alt="Logo" class="mb-3 img-fluid"
                                style="max-width: 100px; height: auto;">
                            <h5 class="fw-bold text-dark">Baling-Baling</h5>
                            <p class="text-muted">Dinamika yang stabil dan stabilitas yang dinamis</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3" data-aos="zoom-in" data-aos-delay="200">
                    <div class="card h-100 text-center border-0 shadow">
                        <div class="card-body d-flex flex-column align-items-center">
                            <img src="{{ asset('enno/assets/img/logo.png') }}" alt="Logo" class="mb-3 img-fluid"
                                style="max-width: 100px; height: auto;">
                            <h5 class="fw-bold text-dark">Daun Mengarah ke Atas</h5>
                            <p class="text-muted">Penciptaan perumahan dan permukiman</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3" data-aos="zoom-in" data-aos-delay="300">
                    <div class="card h-100 text-center border-0 shadow">
                        <div class="card-body d-flex flex-column align-items-center">
                            <img src="{{ asset('enno/assets/img/logo.png') }}" alt="Logo" class="mb-3 img-fluid"
                                style="max-width: 100px; height: auto;">
                            <h5 class="fw-bold text-dark">Lengkungan Daun</h5>
                            <p class="text-muted">Perlindungan bagi ruang kerja dan tempat tinggal manusia</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3" data-aos="zoom-in" data-aos-delay="400">
                    <div class="card h-100 text-center border-0 shadow">
                        <div class="card-body d-flex flex-column align-items-center">
                            <img src="{{ asset('enno/assets/img/logo.png') }}" alt="Logo" class="mb-3 img-fluid"
                                style="max-width: 100px; height: auto;">
                            <h5 class="fw-bold text-dark">Lengkungan Bawah</h5>
                            <p class="text-muted">Penguasaan bumi dan alam untuk kemakmuran rakyat</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End About Section -->

    {{-- <!-- Footer -->
    <footer id="footer" class="footer bg-dark text-white py-4">
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
    <script src="{{ asset('enno/assets/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('enno/assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('enno/assets/js/main.js') }}"></script>

    <script>
        AOS.init();
    </script>
</body>

</html>
