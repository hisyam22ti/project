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

<body class="sb-nav-fixed" style="background-color: lightyellow;">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-success">
        <!-- Navbar Brand-->
        <a class="navbar-brand ps-3" href="" style="color: yellow;">Kantin PCR</a>
        <!-- Sidebar Toggle-->
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" style="color: yellow;" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
        <!-- Navbar Search-->
        <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0" style="color: yellow;">
            <!-- <div class="input-group">
                <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
                <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
            </div> -->
        </form>
        <!-- Navbar-->
        <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="color:yellow;">
                    <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?= $user['nama']; ?></span>
                    <img class="img-profile" style="width: 20px;" src="<?= base_url('assets/assets/img/profile/') . $user['gambar']; ?>">
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
            <nav class="sb-sidenav accordion sb-sidenav-light" id="sidenavAccordion">
                <div class="sb-sidenav-menu" style="background-color: yellow;">
                    <div class="nav">
                        <div class="sb-sidenav-menu-heading" style="color: green;">Menu</div>
                        <?php
                        if ($user['role'] == 'Admin') { ?>
                            <li class="nav-item">
                                <a class="nav-link collapsed" style="color: green;" href="<?= site_url('Kantin/') ?>">
                                    <i class="fa-solid fa-store"></i>
                                    <span class="ms-2">Kantin</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link collapsed" style="color: green;" href="<?= site_url('Auth/logout/') ?>">
                                    <i class="fa-solid fa-right-from-bracket"></i>
                                    <span class="ms-2">Logout</span>
                                </a>
                            </li>
                        <?php } elseif ($user['role'] == 'Kantin') {
                        ?>
                            <li class="nav-item">
                                <a class="nav-link collapsed" style="color: green;" href="<?= site_url('Kantin/pesanan') ?>">
                                    <i class="fa-solid fa-clipboard"></i>
                                    <span class="ms-2"">Pesanan</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link collapsed" style="color: green;" href="<?= site_url('Menu/') ?>">
                                    <i class="fa-solid fa-utensils"></i>
                                    <span class="ms-2"">Menu</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link collapsed" style="color: green;" href="<?= site_url('Kantin/detail') ?>">
                                    <i class="fa-solid fa-user"></i>
                                    <span class="ms-2"">Profil</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link collapsed" style="color: green;" href="<?= site_url('Auth/logout/') ?>">
                                    <i class="fa-solid fa-right-from-bracket"></i>
                                    <span class="ms-2"">Logout</span>
                                </a>
                            </li>
                        <?php } else {
                            ?>
                            <li class="nav-item">
                                <a class="nav-link collapsed" style="color: green;" href="<?= site_url('Customer/') ?>">
                                    <i class="fa-solid fa-store"></i>
                                    <span class="ms-2">Kantin</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link collapsed" style="color: green;" href="<?= site_url('Customer/pesanan/')?>">
                                    <i class="fa-solid fa-clipboard"></i>
                                    <span class="ms-2">Pesanan</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link collapsed" style="color: green;" href="<?= site_url('Customer/profil') ?>">
                                    <i class="fa-solid fa-user"></i>
                                    <span class="ms-2">Profil</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link collapsed" style="color: green;" href="<?= site_url('Auth/logout/') ?>">
                                    <i class="fa-solid fa-right-from-bracket"></i>
                                    <span class="ms-2">Logout</span>
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