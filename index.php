<?php
include 'include/koneksi.php';
include 'include/function.php';

if(!isset($_SESSION['user'])) {
    header('location: login.php');
}
if ($_SESSION['user']['level'] == 'peminjam') {
    $teksutama = 'Home';
    $iconutama = '<i class="bi bi-house-door-fill"></i>';
} else {
    $teksutama = 'Dashboard';
    $iconutama = '<i class="bi bi-speedometer"></i>';
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
        <!-- AOS animation -->
        <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

        <!-- card slider -->
        <script src="https://cdn.jsdelivr.net/npm/swiffy-slider@1.6.0/dist/js/swiffy-slider.min.js" crossorigin="anonymous" defer></script>
        <link href="https://cdn.jsdelivr.net/npm/swiffy-slider@1.6.0/dist/css/swiffy-slider.min.css" rel="stylesheet" crossorigin="anonymous">
        
        <link href="css/styles.css" rel="stylesheet" />

        <link href="css/personal.css" rel="stylesheet" />
        <link href="assets/img/whitebookLOGO.png" rel="icon">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap">

        <style>
            body {
                font-family: 'Poppins', sans-serif !important;
            }
            
            .navbar-brand,
            .nav-link,
            .dropdown-item,
            .footer
            {
                font-family: 'Poppins', sans-serif !important;
            }
            .card-s{
                position: relative;
                overflow: hidden;
                transition: transform 0.4s ease;
            }
            .card-s:hover .hover-content {
                opacity: 1;
                transform: translateY(0);
            }
            .hover-content {
                position: absolute;
                bottom: 0%;
                transform: translateY(100%);
                text-align: center;
                opacity: 1;
                transition: opacity 0.4s ease, transform 0.4s ease;
            }
        </style>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="index.php" ><img src="assets/img/whitebookLOGO.png" width="20%" style="border-radius: 80%;" alt="perpus logo"> Perpus Digital</a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <div class="text-light text-start p-2 d-none d-sm-inline-block">Halo, <?php echo $_SESSION['user']['username'].'!'; ?></div>

            <form class="ms-auto ">
            </form>
            <!-- Navbar-->  
            <ul class="navbar-nav ms-auto px-2">
                <li class="nav-item dropdown">  
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="?page=page/profile"> <i class="bi bi-person-vcard-fill"></i> Profile</a></li>
                        <?php
                        if ($_SESSION['user']['level'] == 'admin') {
                        ?>
                            <li><a class="dropdown-item" href="register.php"><i class="bi bi-person-plus-fill"></i> Buat Akun Admin/Petugas</a></li>
                        <?php
                        }
                        ?>
                        <li><hr class="dropdown-divider" /></li>
                        <li><a class="dropdown-item" href="logout.php"><i class="fa-solid fa-power-off"></i> Logout</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <?php
        $current_page = isset($_GET['page']) ? $_GET['page'] : '';
        ?>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Navigasi</div>
                            <a class="nav-link <?php echo ($current_page == '') ? 'btn btn-success active' : ''; ?>" href="?">
                                <div class="sb-nav-link-icon"><?=$iconutama?> </div>
                                
                                <?=$teksutama?>

                            </a>
                            <?php
                            if ($_SESSION['user']['level'] != 'peminjam') {
                            ?>
                            <a class="nav-link <?php echo ($current_page == 'page/kategori/kategori' || $current_page == 'page/kategori/kategori_tambah' || $current_page == 'page/kategori/kategori_ubah') ? 'btn btn-success active' : ''; ?>" href="?page=page/kategori/kategori">
                                <div class="sb-nav-link-icon"><i class="bi bi-grid"></i></div>
                                Kategori
                            </a>
                            
                            <?php } ?>
                            <a class="nav-link <?php echo ($current_page == 'page/buku/Daftar buku' || $current_page == 'page/buku/detail_buku' || $current_page == 'page/buku/buku_tambah' ) ? 'btn btn-success active' : ''; ?>" href="?page=page/buku/Daftar buku">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-book"></i></div>
                                Daftar Buku
                            </a>
                            <?php if ($_SESSION['user']['level'] == 'peminjam') {?>
                            <a class="nav-link <?php echo ($current_page == 'page/peminjaman/keranjang') ? 'btn btn-success active' : ''; ?>" href="?page=page/peminjaman/keranjang">
                                <div class="sb-nav-link-icon"><i class="bi bi-bag-fill"></i></div>
                                Keranjang
                            </a>       
                            <?php } ?>
                            <a class="nav-link <?php echo ($current_page == 'page/peminjaman/peminjaman') ? 'btn btn-success active' : ''; ?>" href="?page=page/peminjaman/peminjaman">
                                <div class="sb-nav-link-icon"><i class="bi bi-ui-checks"></i></div>
                                Detail Peminjaman
                            </a>
                            <a class="nav-link <?php echo ($current_page == 'page/ulasan/ulasan' || $current_page == 'page/ulasan/ulasan_tambah' ) ? 'btn btn-success active' : ''; ?>" href="?page=page/ulasan/ulasan">
                                <div class="sb-nav-link-icon"><i class="bi bi-chat-left-dots-fill"></i></div>
                                Ulasan
                            </a>
                        </div>
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content" style="background-color: #ededed">
                <main>
                    <div class="container-fluid px-4">
                        <?php
                        $page = isset($_GET['page']) ? $_GET['page'] : 'page/home';
                        if (file_exists($page . '.php')) {
                            include $page . '.php';
                        } else {
                            include 'page/404.php';
                        } 
                        
                        $currentQuantity = getTotalQuantity(); 
                        ?>
                    </div>
                </main>
                <footer class="py-4 mt-auto" style="background-color: #ededed">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted"><strong><img src="assets/img/whitebookLOGO.png" width="30px" style="border-radius: 80%; filter: grayscale(100%);" alt="perpus logo"> Perpus Digital 2024 </strong> By Roby Rachmat Firdaus.</div> 
                            <div class="social-icons">
                                <a href="https://github.com/ObiKusakabe" target="_blank" class="text-decoration-none me-2 text-muted"><i class="bi bi-github"></i></a>
                                <a href="https://www.instagram.com/kusakabegamitsukaranai?igsh=ZjR5em55MTJ4NzNx" target="_blank" class="text-decoration-none me-2 text-muted"><i class="bi bi-instagram"></i></a>
                                <a href="https://www.facebook.com/profile.php?id=100092577632768&mibextid=2JQ9oc" target="_blank" class="text-decoration-none me-2 text-muted"><i class="bi bi-facebook"></i></a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
        <script src="js/scripts.js"></script>
        
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.css">
        <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.js"></script>
        <!-- Chart JS -->
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <!-- AOS Animation -->
        <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
        <!-- DataTables -->
        <script>
            $(document).ready(function () {
                $('#dataTable').DataTable({
                    "language": {
                        "url": "https://cdn.datatables.net/plug-ins/1.13.7/i18n/id.json"
                    }
                });
            });

            AOS.init();
        </script>
    </body>
    <title>
        <?php
            if (!$current_page == 'perpusdigitalroby.000webhostapp.com') {
                if ($_SESSION['user']['level'] != 'peminjam'){
                    echo 'Dashboard - Perpus Digital';
                } else {
                    echo 'Home - Perpus Digital';
                }
            } else {
                echo ucwords(str_replace("_", " ", basename($current_page))) . ' - Perpus Digital';
            }
        ?>
    </title> 
</html>
