<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Sistem Pengingat Pesanan Kantin PCR</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <link href="<?= base_url('assets/') ?>css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
</head>

<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <!-- Navbar Brand-->
        <a class="navbar-brand ps-3" href="">Sistem Pengingat Pesanan Kantin PCR</a>
        <!-- Sidebar Toggle-->
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
        <!-- Navbar Search-->
        <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
            <div class="input-group">
                <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
                <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
            </div>
        </form>
        <!-- Navbar-->
        <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?= $user['nama']; ?></span>
                    <img class="img-profile rounded-circle" style="width: 20px;" src="<?= base_url('assets/assets/img/profile/') . $user['gambar']; ?>">
                </a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="#!">Settings</a></li>
                    <li><a class="dropdown-item" href="#!">Activity Log</a></li>
                    <li>
                        <hr class="dropdown-divider" />
                    </li>
                    <li><a class="dropdown-item" href="<?= base_url('index.php/auth/logout') ?>">Logout</a></li>
                </ul>
            </li>
        </ul>
    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <div class="sb-sidenav-menu-heading">Core</div>
                        <a class="nav-link" href="">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Dashboard
                        </a>
                        <div class="sb-sidenav-menu-heading">Menu</div>
                        <?php
                        if ($user['role'] == 'Admin') { ?>
                            <li class="nav-item">
                                <a class="nav-link collapsed" href="<?= site_url('Mahasiswa/') ?>">
                                    <i class="fas fa-fw fa-users"></i>
                                    <span>Mahasiswa</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link collapsed" href="<?= site_url('Prodi/') ?>">
                                    <i class="fas fa-fw fa-users"></i>
                                    <span>Prodi</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link collapsed" href="<?= site_url('Calon_presiden/') ?>">
                                    <i class="fas fa-fw fa-users"></i>
                                    <span>Calon Presiden</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link collapsed" href="<?= site_url('Caketum_pssi/') ?>">
                                    <i class="fas fa-fw fa-users"></i>
                                    <span>Calon Ketua Umum PSSI</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link collapsed" href="<?= site_url('Kantin/') ?>">
                                    <i class="fas fa-fw fa-users"></i>
                                    <span>Kantin</span>
                                </a>
                            </li>
                        <?php } elseif ($user['role'] == 'Kantin') {
                        ?>
                            <li class="nav-item">
                                <a class="nav-link collapsed" href="<?= site_url('Profil/') ?>">
                                    <i class="fas fa-fw fa-users"></i>
                                    <span>Profil</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link collapsed" href="<?= site_url('Menu/') ?>">
                                    <i class="fas fa-fw fa-users"></i>
                                    <span>Menu</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link collapsed" href="<?= site_url('Auth/logout/') ?>">
                                    <i class="fas fa-fw fa-users"></i>
                                    <span>Logout</span>
                                </a>
                            </li>
                        <?php } else {
                            ?>
                            <li class="nav-item">
                                <a class="nav-link collapsed" href="<?= site_url('Customer/') ?>">
                                    <i class="fas fa-fw fa-users"></i>
                                    <span>Kantin</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link collapsed" href="<?= site_url('Customer/pesanan/' . $user['id']) ?>">
                                    <i class="fas fa-fw fa-users"></i>
                                    <span>Pesanan</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link collapsed" href="<?= site_url('Auth/logout/') ?>">
                                    <i class="fas fa-fw fa-users"></i>
                                    <span>Logout</span>
                                </a>
                            </li>
                        <?php }
                        ?>
                    </div>
                </div>
                <div class="sb-sidenav-footer">
                    <div class="small">Logged in as:</div>
                    Start Bootstrap
                </div>
            </nav>
        </div>
        <div id="layoutSidenav_content">