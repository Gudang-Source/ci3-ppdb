<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" href="<?php echo base_url('assets/admin/images/favicon.png'); ?>" type="image/png" sizes="16x16">
    <title>Sistem PPDB Online | Admin @yield('title')</title>
    @stack('scripts_header')
    <!-- Custom CSS -->
    <link href="<?php echo base_url('assets/admin/dist/css/style.min.css'); ?>" rel="stylesheet">
    <style>
        .custom-select {
            background: url('<?php echo base_url('assets/admin/images/custom-select.png'); ?>') right 1.1rem center no-repeat;
            -moz-appearance: none;
            -webkit-appearance: none;
            -o-appearance: none;
            background-size: auto
        }

        .custom-select.is-valid,
        .was-validated .custom-select:valid {
            border-color: #22ca80;
            padding-right: calc((1em + .75rem) * 3 / 4 + 1.75rem);
            background: url('<?php echo base_url('assets/admin/images/custom-select.png'); ?>') right .75rem center/8px 10px no-repeat, url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 8 8'%3e%3cpath fill='%2322ca80' d='M2.3 6.73L.6 4.53c-.4-1.04.46-1.4 1.1-.8l1.1 1.4 3.4-3.8c.6-.63 1.6-.27 1.2.7l-4 4.6c-.43.5-.8.4-1.1.1z'/%3e%3c/svg%3e") center right 1.75rem/calc(.75em + .375rem) calc(.75em + .375rem) no-repeat #fff
        }

        .custom-select.is-invalid,
        .was-validated .custom-select:invalid {
            border-color: #ff4f70;
            padding-right: calc((1em + .75rem) * 3 / 4 + 1.75rem);
            background: url('<?php echo base_url('assets/admin/images/custom-select.png'); ?>') right .75rem center/8px 10px no-repeat, url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' fill='%23ff4f70' viewBox='-2 -2 7 7'%3e%3cpath stroke='%23ff4f70' d='M0 0l3 3m0-3L0 3'/%3e%3ccircle r='.5'/%3e%3ccircle cx='3' r='.5'/%3e%3ccircle cy='3' r='.5'/%3e%3ccircle cx='3' cy='3' r='.5'/%3e%3c/svg%3E") center right 1.75rem/calc(.75em + .375rem) calc(.75em + .375rem) no-repeat #fff
        }
    </style>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body>
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper" data-theme="light" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed" data-boxed-layout="full">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <header class="topbar" data-navbarbg="skin6">
            <nav class="navbar top-navbar navbar-expand-md">
                <div class="navbar-header" data-logobg="skin6">
                    <!-- This is for the sidebar toggle which is visible on mobile only -->
                    <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)"><i
                            class="ti-menu ti-close"></i></a>
                    <!-- ============================================================== -->
                    <!-- Logo -->
                    <!-- ============================================================== -->
                    <div class="navbar-brand">
                        <!-- Logo icon -->
                        <a href="<?php echo site_url('admin/dashboard'); ?>">
                            <b class="logo-icon">
                                <!-- Dark Logo icon -->
                                <img src="<?php echo base_url('assets/admin/images/logo-icon.png'); ?>" alt="homepage"
                                    class="dark-logo" />
                            </b>
                            <!--End Logo icon -->
                            <!-- Logo text -->
                            <span class="logo-text">
                                <!-- dark Logo text -->
                                <img src="<?php echo base_url('assets/admin/images/logo-text.png'); ?>" alt="homepage"
                                    class="dark-logo" />
                                <!-- Light Logo text -->
                                <img src="<?php echo base_url('assets/admin/images/logo-light-text.png'); ?>"
                                    class="light-logo" alt="homepage" />
                            </span>
                        </a>
                    </div>
                    <!-- ============================================================== -->
                    <!-- End Logo -->
                    <!-- ============================================================== -->
                    <!-- ============================================================== -->
                    <!-- Toggle which is visible on mobile only -->
                    <!-- ============================================================== -->
                    <a class="topbartoggler d-block d-md-none waves-effect waves-light" href="javascript:void(0)"
                        data-toggle="collapse" data-target="#navbarSupportedContent"
                        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><i
                            class="ti-more"></i></a>
                </div>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                <div class="navbar-collapse collapse" id="navbarSupportedContent">
                    <!-- ============================================================== -->
                    <!-- toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav float-left mr-auto ml-3 pl-1"></ul>
                    <!-- ============================================================== -->
                    <!-- Right side toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav float-right">
                        <!-- ============================================================== -->
                        <!-- User profile -->
                        <!-- ============================================================== -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="javascript:void(0)" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                <img src="<?php echo base_url('assets/admin/images/users/profile-pic.jpg'); ?>"
                                    alt="user" class="rounded-circle" width="40">
                                <span class="ml-2 d-none d-lg-inline-block"><span>Hello,</span> <span
                                        class="text-dark"><?php echo $_SESSION['nama']; ?></span> <i
                                        data-feather="chevron-down" class="svg-icon"></i></span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right user-dd animated flipInY">
                                <a class="dropdown-item" href="javascript:void(0)"><i data-feather="user"
                                        class="svg-icon mr-2 ml-1"></i>
                                    My Profile</a>
                                <a class="dropdown-item" href="<?php echo site_url('admin/personal/resetpass'); ?>"><i
                                        data-feather="settings" class="svg-icon mr-2 ml-1"></i>
                                    Ganti Password</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="<?php echo base_url('auth/logout'); ?>"><i
                                        data-feather="power" class="svg-icon mr-2 ml-1"></i>
                                    Logout</a>
                            </div>
                        </li>
                        <!-- ============================================================== -->
                        <!-- User profile and search -->
                        <!-- ============================================================== -->
                    </ul>
                </div>
            </nav>
        </header>
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <aside class="left-sidebar" data-sidebarbg="skin6">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar" data-sidebarbg="skin6">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li class="sidebar-item"> <a class="sidebar-link sidebar-link"
                                href="<?php echo site_url('admin/dashboard'); ?>" aria-expanded="false"><i
                                    data-feather="home" class="feather-icon"></i><span
                                    class="hide-menu">Dashboard</span></a></li>
                        <li class="list-divider"></li>

                        <li class="nav-small-cap"><span class="hide-menu">Menu</span></li>
                        <li class="sidebar-item"> <a class="sidebar-link has-arrow" href="javascript:void(0)"
                                aria-expanded="false"><i data-feather="file-text" class="feather-icon"></i><span
                                    class="hide-menu">Berita </span></a>
                            <ul aria-expanded="false" class="collapse  first-level base-level-line">
                                <li class="sidebar-item"><a href="<?php echo site_url('admin/berita/list'); ?>"
                                        class="sidebar-link"><span class="hide-menu"> Daftar Berita
                                        </span></a>
                                </li>
                                <li class="sidebar-item"><a href="<?php echo site_url('admin/berita/editor'); ?>"
                                        class="sidebar-link"><span class="hide-menu"> Buat Berita
                                        </span></a>
                                </li>
                            </ul>
                        </li>
                        <li class="sidebar-item"> <a class="sidebar-link has-arrow" href="javascript:void(0)"
                                aria-expanded="false"><i data-feather="book" class="feather-icon"></i><span
                                    class="hide-menu">Pendaftaran </span></a>
                            <ul aria-expanded="false" class="collapse  first-level base-level-line">
                                <li class="sidebar-item"><a href="<?php echo site_url('admin/formulir/masuk'); ?>"
                                        class="sidebar-link"><span class="hide-menu"> Formulir Masuk
                                        </span></a>
                                </li>
                                <li class="sidebar-item"><a href="<?php echo site_url('admin/formulir/buat'); ?>"
                                        class="sidebar-link"><span class="hide-menu"> Buat Formulir Baru
                                        </span></a>
                                </li>
                            </ul>
                        </li>
                        <li class="sidebar-item"> <a class="sidebar-link has-arrow" href="javascript:void(0)"
                                aria-expanded="false"><i data-feather="archive" class="feather-icon"></i><span
                                    class="hide-menu">Penerimaan </span></a>
                            <ul aria-expanded="false" class="collapse  first-level base-level-line">
                                <li class="sidebar-item"><a
                                        href="<?php echo site_url('admin/penerimaan/dikonfirmasi'); ?>"
                                        class="sidebar-link"><span class="hide-menu"> Daftar Dikonfirmasi
                                        </span></a>
                                </li>
                                <li class="sidebar-item"><a href="<?php echo site_url('admin/arsip/penerimaan'); ?>"
                                        class="sidebar-link"><span class="hide-menu"> Arsip Penerimaan
                                        </span></a>
                                </li>
                            </ul>
                        </li>
                        @if ($_SESSION['role'] == 1 OR $_SESSION['role'] == 3)
                            @include('layouts.partials.menu_user')
                        @endif
                        <li class="sidebar-item"> <a class="sidebar-link sidebar-link"
                                href="<?php echo site_url('admin/settings/panel'); ?>" aria-expanded="false"><i
                                    data-feather="settings" class="feather-icon"></i><span
                                    class="hide-menu">Pengaturan</span></a>
                        </li>
                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-7 align-self-center">
                        <h3 class="page-title text-truncate text-dark font-weight-medium mb-1">Selamat Datang {{ $_SESSION['nama'] }} !!</h3>
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb m-0 p-0">
                                    @yield('breadcrumb')
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- *************************************************************** -->
                <!-- Start Content -->
                <!-- *************************************************************** -->
                @section('content')

                @show()
                <!-- *************************************************************** -->
                <!-- End Content -->
                <!-- *************************************************************** -->
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <footer class="footer text-center text-muted">
                All Rights Reserved by Adminmart. Designed and Developed by <a
                    href="https://wrappixel.com">WrapPixel</a>.
            </footer>
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="<?php echo base_url('assets/admin/libs/jquery/dist/jquery.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/admin/libs/popper.js/dist/umd/popper.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/admin/libs/bootstrap/dist/js/bootstrap.min.js'); ?>"></script>
    <!-- apps -->
    <!-- apps -->
    <script src="<?php echo base_url('assets/admin/dist/js/app-style-switcher.js'); ?>"></script>
    <script src="<?php echo base_url('assets/admin/dist/js/feather.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/admin/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js'); ?>">
    </script>
    <script src="<?php echo base_url('assets/admin/dist/js/sidebarmenu.js'); ?>"></script>
    <!--Custom JavaScript -->
    <script src="<?php echo base_url('assets/admin/dist/js/custom.min.js'); ?>"></script>
    @stack('scripts_footer')
</body>

</html>