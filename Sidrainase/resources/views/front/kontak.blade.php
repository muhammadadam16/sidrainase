<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>SiDrainase | Kontak</title>
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
    <link href="{{ asset('enno/assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('enno/assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">
    <link href="{{ asset('enno/assets/vendor/aos/aos.css') }}" rel="stylesheet">

    <!-- Main CSS Files -->
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
                    <li><a href="{{ route('tentangkami') }}">Tentang Kami</a></li>
                    <li><a href="{{ route('kontak') }}" class="active">Kontak</a></li>
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

    <!-- Kontak Section -->
    <section id="contact" class="py-5">
        <div class="container" data-aos="fade-up">
            <div class="row mb-5 text-center">
                <div class="col">
                    <h2 class="fw-bold" style="color: #003566;">KONTAK KAMI</h2>
                    <p style="color: #6c757d;">Hubungi kami melalui informasi berikut atau kunjungi kantor kami secara
                        langsung.</p>
                </div>
            </div>

            <div class="row justify-content-center g-4">

                <div class="col-md-4 text-center" data-aos="zoom-in" data-aos-delay="100">
                    <div class="icon-box p-4 shadow-sm h-100">
                        <i class="bi bi-geo-alt fs-2 text-primary"></i>
                        <h5 class="mt-3 fw-bold">Alamat</h5>
                        <p class="text-muted">Jl. Bhineka Karya No.116, Karamat, Kec. Gunungpuyuh, Kota Sukabumi, Jawa
                            Barat 43151</p>
                    </div>
                </div>

                <div class="col-md-4 text-center" data-aos="zoom-in" data-aos-delay="200">
                    <div class="icon-box p-4 shadow-sm h-100">
                        <i class="bi bi-telephone fs-2 text-primary"></i>
                        <h5 class="mt-3 fw-bold">Telepon</h5>
                        <p class="text-muted">0821-1088-9870</p>
                    </div>
                </div>

            </div>

        </div>
    </section>
    <!-- End Kontak Section -->

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
