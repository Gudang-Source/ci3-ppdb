<!DOCTYPE html>
<html lang="en">

<head>
  <title>Sistem Informasi PPDB Online | @yield('title')</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link rel="icon" href="<?php echo base_url('assets/public/images/favicon.png'); ?>" type="image/png">
  <link href="https://fonts.googleapis.com/css?family=Muli:300,400,700,900" rel="stylesheet">
  <link rel="stylesheet" href="<?php echo base_url('assets/public/fonts/icomoon/style.css'); ?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/public/css/bootstrap.min.css'); ?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/public/css/jquery-ui.css'); ?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/public/css/owl.carousel.min.css'); ?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/public/css/owl.theme.default.min.css'); ?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/public/css/owl.theme.default.min.css'); ?>">

  <link rel="stylesheet" href="<?php echo base_url('assets/public/css/jquery.fancybox.min.css'); ?>">

  <link rel="stylesheet" href="<?php echo base_url('assets/public/css/bootstrap-datepicker.css'); ?>">

  <link rel="stylesheet" href="<?php echo base_url('assets/public/fonts/flaticon/font/flaticon.css'); ?>">

  <link rel="stylesheet" href="<?php echo base_url('assets/public/css/aos.css'); ?>">
  <link href="<?php echo base_url('assets/public/css/jquery.mb.YTPlayer.min.css'); ?>" media="all" rel="stylesheet"
    type="text/css">

  <link rel="stylesheet" href="<?php echo base_url('assets/public/css/style.css'); ?>">
  @stack('scripts_header')

</head>

<body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">

  <div class="site-wrap">

    <div class="site-mobile-menu site-navbar-target">
      <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close mt-3">
          <span class="icon-close2 js-menu-toggle"></span>
        </div>
      </div>
      <div class="site-mobile-menu-body"></div>
    </div>


    <div class="py-2 bg-light">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-lg-9 d-none d-lg-block">
            <a href="#" class="small mr-3"><span class="icon-question-circle-o mr-2"></span> Punya pertanyaan?</a>
            <a href="#" class="small mr-3"><span class="icon-phone2 mr-2"></span> {{ $kontak['telepon'] }}</a>
            <a href="#" class="small mr-3"><span class="icon-envelope-o mr-2"></span> {{ $kontak['email'] }}</a>
          </div>
          <div class="col-lg-3 text-right">
            <a href="<?php echo site_url('login'); ?>" class="small"><span class="icon-unlock-alt"></span> Log In</a>
          </div>
        </div>
      </div>
    </div>
    <header class="site-navbar py-4 js-sticky-header site-navbar-target" role="banner">

      <div class="container">
        <div class="d-flex align-items-center">
          <div class="site-logo">
            <a href="<?php echo site_url(); ?>" class="d-block">
              <img src="<?php echo base_url('assets/public/images/logo.png'); ?>" alt="Image" class="img-fluid">
            </a>
          </div>
          <div class="mr-auto">
            <nav class="site-navigation position-relative text-right" role="navigation">
              <ul class="site-menu main-menu js-clone-nav mr-auto d-none d-lg-block">
                <li>
                  <a href="<?php echo site_url(); ?>" class="nav-link text-left">Home</a>
                </li>
                <li>
                  <a href="<?php echo site_url('pendaftaran'); ?>" class="nav-link text-left">Pendaftaran</a>
                </li>
                <li>
                  <a href="<?php echo site_url('penerimaan'); ?>" class="nav-link text-left">Hasil Penerimaan</a>
                </li>
                <li>
                  <a href="<?php echo site_url('download'); ?>" class="nav-link text-left">Download</a>
                </li>
              </ul>
            </nav>

          </div>
          <div class="ml-auto">
            <div class="social-wrap">
              <a href="{{ $kontak['facebook'] }}" target="_blank"><span class="icon-facebook"></span></a>

              <a href="#" class="d-inline-block d-lg-none site-menu-toggle js-menu-toggle text-black"><span
                  class="icon-menu h3"></span></a>
            </div>
          </div>

        </div>
      </div>

    </header>

    @section('header')
    <div class="site-section ftco-subscribe-1 site-blocks-cover pb-4"
      style="background-image: url(<?php echo base_url('assets/public/images/bg_1.jpg'); ?>)">
      <div class="container">
        <div class="row align-items-end">
          <div class="col-lg-7">
            <h2 class="mb-0">@yield('header_title')</h2>
          </div>
        </div>
      </div>
    </div>


    <div class="custom-breadcrumns border-bottom">
      <div class="container">
        <a href="<?php echo site_url(); ?>">Home</a>
        <span class="mx-3 icon-keyboard_arrow_right"></span>
        <span class="current">@yield('breadcrumb')</span>
      </div>
    </div>
    @show



    <div></div>

    @section('content')
    <!--- Konten akan di letakkan di sini. -->
    @show

    <!-- // 05 - Block -->
    <div class="footer">
      <div class="container">
        <div class="row">
          <div class="col-lg-6">
            <h3 class="footer-heading"><span>Contact</span></h3>
            <ul class="list-unstyled">
              <li>
                <span class="icon-building-o"> Alamat Sekolah</span>
                <p>{{ $kontak['alamat'] }}</p>
              </li>
              <li>
                <span class="icon-phone"> Telepon/Whatsapp</span>
                <p>{{ $kontak['telepon'] }}</p>
              </li>
              <li>
                <span class="icon-mail_outline"> Email</span>
                <p>{{ $kontak['email'] }}</p>
              </li>
            </ul>
          </div>
        </div>

        <div class="row">
          <div class="col-12">
            <div class="copyright">
              <p>Situs resmi penerimaan peserta didik baru SD Muhammadiyah Girikerto</p>
              <p>
                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                Copyright &copy;<script>
                  document.write(new Date().getFullYear());
                </script> All rights reserved | This template is made with <i class="icon-heart" aria-hidden="true"></i>
                by <a href="https://colorlib.com" target="_blank">Colorlib</a>
                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>
  <!-- .site-wrap -->


  <!-- loader -->
  <div id="loader" class="show fullscreen"><svg class="circular" width="48px" height="48px">
      <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee" />
      <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10"
        stroke="#51be78" /></svg></div>

  <script src="<?php echo base_url('assets/public/js/jquery-3.3.1.min.js'); ?>"></script>
  <script src="<?php echo base_url('assets/public/js/jquery-migrate-3.0.1.min.js'); ?>"></script>
  <script src="<?php echo base_url('assets/public/js/jquery-ui.js'); ?>"></script>
  <script src="<?php echo base_url('assets/public/js/popper.min.js'); ?>"></script>
  <script src="<?php echo base_url('assets/public/js/bootstrap.min.js'); ?>"></script>
  <script src="<?php echo base_url('assets/public/js/owl.carousel.min.js'); ?>"></script>
  <script src="<?php echo base_url('assets/public/js/jquery.stellar.min.js'); ?>"></script>
  <script src="<?php echo base_url('assets/public/js/jquery.countdown.min.js'); ?>"></script>
  <script src="<?php echo base_url('assets/public/js/bootstrap-datepicker.min.js'); ?>"></script>
  <script src="<?php echo base_url('assets/public/js/jquery.easing.1.3.js'); ?>"></script>
  <script src="<?php echo base_url('assets/public/js/aos.js'); ?>"></script>
  <script src="<?php echo base_url('assets/public/js/jquery.fancybox.min.js'); ?>"></script>
  <script src="<?php echo base_url('assets/public/js/jquery.sticky.js'); ?>"></script>
  <script src="<?php echo base_url('assets/public/js/jquery.mb.YTPlayer.min.js'); ?>"></script>
  <script src="<?php echo base_url('assets/public/js/main.js'); ?>"></script>
  @stack('scripts_footer')
</body>

</html>