<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?= htmlentities($title) ?></title>
    <link rel="shortcut icon" href="<?= base_url() ?>/favicon.ico" type="image/x-icon">
    <link rel="icon" href="<?= base_url() ?>/favicon.ico" type="image/x-icon">
    <!-- Custom fonts for this template-->
    <link href="<?= base_url('assets/'); ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?= base_url('assets/'); ?>css/sb-admin-2.min.css" rel="stylesheet">
    <link href="<?= base_url('assets/'); ?>vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.css">
    <!-- css tanda tangan -->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.css">
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>css/custom.css">
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <link type="text/css" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/south-street/jquery-ui.css" rel="stylesheet">
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>

    <script type="text/javascript" src="<?= base_url('assets/'); ?>js/jquery.signature.min.js"></script>
    <script type="text/javascript" src="<?= base_url('assets/'); ?>js/jquery.ui.touch-punch.min.js"></script>
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/'); ?>css/jquery.signature.css">
    <script type="text/javascript" src="<?= base_url('assets/'); ?>js/loader.js"></script>
    <style>
        .kbw-signature {
            width: 30%;
            height: 300px;
        }

        #sig canvas {
            width: 100% !important;
            height: auto;
        }
    </style>
    <!-- end css ttd -->
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-success sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
                <div class="sidebar-brand-text mx-3">SI Disposisi Surat</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">
            <!-- Heading -->
            <?php if ($this->session->userdata('role_id') == 7) { ?>
                <div class="sidebar-heading mt-1 text-light">
                    Admin
                </div>
                <li class="nav-item">
                    <a class="nav-link" href=<?= base_url("home/index") ?>>
                        <i class="fas fa-envelope-open-text"></i>
                        <span>Surat Masuk</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href=<?= base_url("surat_diteruskan/index") ?>>
                        <i class="fas fa-paper-plane"></i>
                        <span>Surat Diteruskan</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href=<?= base_url("user/index") ?>>
                        <i class="fas fa-users"></i>
                        <span>Pengguna</span></a>
                </li>
            <?php } ?>

            <?php if ($this->session->userdata('role_id') == 6) { ?>
                <hr class="sidebar-divider my-0">
                <div class="sidebar-heading mt-1 text-light">
                    Pimpinan
                </div>
                <li class="nav-item">
                    <a class="nav-link" href=<?= base_url("pimpinan/index") ?>>
                        <i class="fas fa-bell"></i>
                        <span>Surat Masuk</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href=<?= base_url("pimpinan/dibaca") ?>>
                        <i class="fas fa-envelope-open-text"></i>
                        <span>Riwayat Surat Masuk</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href=<?= base_url("pimpinan/riwayat") ?>>
                        <i class="fas fa-mail-bulk"></i>
                        <span>Riwayat Disposisi</span></a>
                </li>
            <?php } ?>
            <?php if ($this->session->userdata('role_id') == 1) { ?>
                <hr class="sidebar-divider my-0">
                <div class="sidebar-heading mt-1 text-light">
                    Sekretaris
                </div>
                <li class="nav-item">
                    <a class="nav-link" href=<?= base_url("sekertaris/index") ?>>
                        <i class="fas fa-bell"></i>
                        <span>Surat Masuk</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href=<?= base_url("sekertaris/dibaca") ?>>
                        <i class="fas fa-envelope-open-text"></i>
                        <span>Riwayat Surat Masuk</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href=<?= base_url("sekertaris/riwayat") ?>>
                        <i class="fas fa-mail-bulk"></i>
                        <span>Riwayat Disposisi</span></a>
                </li>
            <?php } ?>
            <?php if ($this->session->userdata('role_id') == 2) { ?>
                <hr class="sidebar-divider my-0">
                <div class="sidebar-heading mt-1 text-light">
                    Bid. Infrastruktur dan Kewilayahan
                </div>
                <li class="nav-item">
                    <a class="nav-link" href=<?= base_url("bidang2/index") ?>>
                        <i class="fas fa-bell"></i>
                        <span>Surat Masuk</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href=<?= base_url("bidang2/dibaca") ?>>
                        <i class="fas fa-envelope-open-text"></i>
                        <span>Riwayat Surat Masuk</span></a>
                </li>
            <?php } ?>
            <?php if ($this->session->userdata('role_id') == 3) { ?>
                <hr class="sidebar-divider my-0">
                <div class="sidebar-heading mt-1 text-light">
                    Bid. Pemerintahan dan Pembangunan Manusia
                </div>
                <li class="nav-item">
                    <a class="nav-link" href=<?= base_url("bidang3/index") ?>>
                        <i class="fas fa-bell"></i>
                        <span>Surat Masuk</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href=<?= base_url("bidang3/dibaca") ?>>
                        <i class="fas fa-envelope-open-text"></i>
                        <span>Riwayat Surat Masuk</span></a>
                </li>
            <?php } ?>
            <?php if ($this->session->userdata('role_id') == 4) { ?>
                <hr class="sidebar-divider my-0">
                <div class="sidebar-heading mt-1 text-light">
                    Bid. Perencanaan Ekonomi dan Sumber Daya Alam
                </div>
                <li class="nav-item">
                    <a class="nav-link" href=<?= base_url("bidang4/index") ?>>
                        <i class="fas fa-bell"></i>
                        <span>Surat Masuk</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href=<?= base_url("bidang4/dibaca") ?>>
                        <i class="fas fa-envelope-open-text"></i>
                        <span>Riwayat Surat Masuk</span></a>
                </li>
            <?php } ?>
            <?php if ($this->session->userdata('role_id') == 5) { ?>
                <hr class="sidebar-divider my-0">
                <div class="sidebar-heading mt-1 text-light">
                    Bid. Perencanaan, Pengendalian dan Evaluasi Pembangunan
                </div>
                <li class="nav-item">
                    <a class="nav-link" href=<?= base_url("bidang5/index") ?>>
                        <i class="fas fa-bell"></i>
                        <span>Surat Masuk</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href=<?= base_url("bidang5/dibaca") ?>>
                        <i class="fas fa-envelope-open-text"></i>
                        <span>Riwayat Surat Masuk</span></a>
                </li>
            <?php } ?>
            <?php if ($this->session->userdata('role_id') == 8) { ?>
                <hr class="sidebar-divider my-0">
                <div class="sidebar-heading mt-1 text-light">
                    Staf Bid. Infrastruktur dan Kewilayahan
                </div>
                <li class="nav-item">
                    <a class="nav-link" href=<?= base_url("bidang5/index") ?>>
                        <i class="fas fa-bell"></i>
                        <span>Surat Masuk</span></a>
                </li>
            <?php } ?>
            <?php if ($this->session->userdata('role_id') == 9) { ?>
                <hr class="sidebar-divider my-0">
                <div class="sidebar-heading mt-1 text-light">
                    Staf Bid. Pemerintahan dan Pembangunan Manusia
                </div>
                <li class="nav-item">
                    <a class="nav-link" href=<?= base_url("bidang5/index") ?>>
                        <i class="fas fa-bell"></i>
                        <span>Surat Masuk</span></a>
                </li>
            <?php } ?>
            <?php if ($this->session->userdata('role_id') == 10) { ?>
                <hr class="sidebar-divider my-0">
                <div class="sidebar-heading mt-1 text-light">
                    Staf Bid. Perencanaan Ekonomi dan Sumber Daya Alam
                </div>
                <li class="nav-item">
                    <a class="nav-link" href=<?= base_url("bidang5/index") ?>>
                        <i class="fas fa-bell"></i>
                        <span>Surat Masuk</span></a>
                </li>
            <?php } ?>
            <?php if ($this->session->userdata('role_id') == 11) { ?>
                <hr class="sidebar-divider my-0">
                <div class="sidebar-heading mt-1 text-light">
                    Staf Bid. Perencanaan, Pengendalian dan Evaluasi Pembangunan
                </div>
                <li class="nav-item">
                    <a class="nav-link" href=<?= base_url("bidang5/index") ?>>
                        <i class="fas fa-bell"></i>
                        <span>Surat Masuk</span></a>
                </li>
            <?php } ?>
            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>
        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <div class="topbar-divider d-none d-sm-block"></div>
                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?= $name['name'] ?></span>
                                <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>
                    </ul>
                </nav>
                <!-- End of Topbar -->
                <!-- <div id="loading">
                    <div class="logoLoader"></div>
                    <span class="loader"></span>
                    <div class="textLoader">
                        <center>
                            <b>Please Wait ... </b>
                        </center>
                    </div>
                </div> -->