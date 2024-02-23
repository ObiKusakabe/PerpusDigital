<?php
include 'include/koneksi.php';
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Login</title>
        <link href="assets/img/whitebookLOGO.png" rel="icon">
        <link href="css/styles.css" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap">

        <style>
            body {
                font-family: 'Poppins', sans-serif !important;
            }
            
            /* Apply Poppins font to specific elements if needed */
            .navbar-brand,
            .nav-link,
            .dropdown-item,
            .footer,
            /* Add more selectors as needed */
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
            .backgroundImage {
            background-image: url("assets/img/perpus_background.png");

            height: 100%;

            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            }
        </style>
    </head>
    <body class="backgroundImage">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header">
                                        <h3 class="text-center font-weight-light my-4"><img src="assets/img/whitebookLOGO.png" width="80px" style="border-radius: 80%;" alt="perpus logo"> Perpus Digital</h3>
                                    </div>
                                    <div class="card-body">
                                        <?php
                                        if (isset($_POST['login'])) {
                                            $username = htmlspecialchars($_POST['username']);
                                            $password = htmlspecialchars(md5($_POST['password']));
                                            
                                            $data = mysqli_query($koneksi, "SELECT * FROM t_user WHERE username='$username' AND password='$password'");
                                            $cek = mysqli_num_rows($data);
                                            if ($cek > 0) {
                                                $_SESSION['user'] = mysqli_fetch_array($data);
                                                echo "<script>alert('Selamat datang, Login Berhasil'); location.href='index.php';</script>";
                                            } else {
                                                echo "<script>alert('Maaf, Username atau password yang anda masukkan salah');</script>";
                                            }
                                        }
                                        ?>
                                        <form method="post">
                                            <div class="form-floating mb-3">
                                                <input class="form-control" type="text" name="username" placeholder="Masukkan username" required oninvalid="this.setCustomValidity('Username tidak boleh kosong')" oninput="setCustomValidity('')" autofocus/>
                                                <label>Username</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" type="password" name="password" placeholder="Masukkan kata sandi" required oninvalid="this.setCustomValidity('Password tidak boleh kosong')" oninput="setCustomValidity('')"/>
                                                <label>Password</label>
                                            </div>
                                            <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                                <button class="btn btn-dark" type="submit" name="login" value="login">Login</button>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="card-footer text-center py-3">
                                        <div class="small"><a href="register.php">Belum punya akun? silahkan Register terlebih dahulu</a> </div>
                                    </div>
                                </div>
                            </div> 
                        </div>
                    </div>
                </main>
            </div>
            <div id="layoutAuthentication_footer">
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted"><strong><img src="assets/img/whitebookLOGO.png" width="30px" style="border-radius: 80%; filter: grayscale(100%);" alt="perpus logo"> Perpus Digital 2024 </strong> By Roby Rachmat Firdaus.</div> 
                            <div class="social-icons">
                                <!-- Add your social media icons here -->
                                <a href="https://github.com/ObiKusakabe" target="_blank" class="text-decoration-none me-2 text-muted"><i class="bi bi-github"></i></a>
                                <a href="https://www.instagram.com/kusakabegamitsukaranai?igsh=ZjR5em55MTJ4NzNx" target="_blank" class="text-decoration-none me-2 text-muted"><i class="bi bi-instagram"></i></a>
                                <a href="https://www.facebook.com/profile.php?id=100092577632768&mibextid=2JQ9oc" target="_blank" class="text-decoration-none me-2 text-muted"><i class="bi bi-facebook"></i></a>
                                <!-- Add more social media icons as needed -->
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
    </body>
</html>
