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
        <title>Register</title>
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
    <body>
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main class="backgroundImage pb-5">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4"><img src="assets/img/whitebookLOGO.png" width="80px" style="border-radius: 80%;" alt="perpus logo"> Register</h3></div>
                                    <div class="card-body">
                                        <?php
                                        if (isset($_POST['register'])) {
                                            //menghindari cross site scripting / XSS
                                            $username =  htmlspecialchars($_POST['username']);
                                            $password =  htmlspecialchars(md5($_POST['password']));
                                            $email =  htmlspecialchars($_POST['email']);
                                            $telp =  htmlspecialchars($_POST['telp']);
                                            $nama =  htmlspecialchars($_POST['nama']);
                                            $alamat =  htmlspecialchars($_POST['alamat']);
                                            $level =  $_POST['level'];
                                            $tgl_dibuat = date('Y-m-d');
                                            
                                            $cekDuplikasi = mysqli_fetch_array(mysqli_query($koneksi, "SELECT username FROM t_user WHERE username = '$username'"));
                                            if ($cekDuplikasi > 0) {
                                                echo "<script>alert('Username tidak tersedia, silahkan coba username lain.'); location.href='register.php'</script>";
                                            } else {
                                                if ($level == 'admin' || $level == 'petugas') {
                                                    $insert = mysqli_query($koneksi, "INSERT INTO t_user(username, password, email, telp, namaLengkap, alamat, level, tgl_akun_dibuat) VALUES ('$username', '$password', '$email', '$telp', '$nama', '$alamat', '$level', '$tgl_dibuat')");
                                                    echo "<script>alert('Selamat registrasi akun ".$level." berhasil.'); location.href='index.php';</script>";
                                                } else {
                                                    $insert = mysqli_query($koneksi, "INSERT INTO t_user(username, password, email, telp, namaLengkap, alamat, level, tgl_akun_dibuat) VALUES ('$username', '$password', '$email', '$telp', '$nama', '$alamat', '$level', '$tgl_dibuat')");
                                                    echo "<script>alert('Selamat registrasi berhasil, silahkan login.'); location.href='login.php';</script>";
                                                }
                                            }
                                        }
                                        ?>
                                        <form method="post">
                                            <div class="form-floating mb-3">
                                                <input class="form-control" type="text" name="username" placeholder="Masukkan username" required oninvalid="this.setCustomValidity('Username tidak boleh kosong')" oninput="setCustomValidity('')" autofocus/>
                                                <label>Username</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" type="password" name="password" id="password" placeholder="Masukkan kata sandi" required oninvalid="this.setCustomValidity('Password tidak boleh kosong')" oninput="setCustomValidity('')"/>
                                                <i class="bi bi-eye-slash" id="togglePassword" onclick="togglePasswordVisibility()"></i>
                                                <label>Password</label>
                                            </div>
                                            <div class="input-group mb-3">
                                                <span class="input-group-text">@</span>
                                                <div class="form-floating">
                                                    <input class="form-control" type="email" name="email" id="floatingInputGroup1" placeholder="Email" required oninvalid="this.setCustomValidity('Email tidak boleh kosong')" oninput="setCustomValidity('')">
                                                    <label for="floatingInputGroup1">Email</label>
                                                </div>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" type="number" name="telp" placeholder="Masukkan no telepon" required oninvalid="this.setCustomValidity('No. telepon tidak boleh kosong')" oninput="setCustomValidity('')"/>
                                                <label>No. telepon</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" type="text" name="nama" placeholder="Masukkan nama lengkap" required oninvalid="this.setCustomValidity('Nama tidak boleh kosong')" oninput="setCustomValidity('')"/>
                                                <label>Nama Lengkap</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <textarea class="form-control" name="alamat" placeholder="" id="floatingTextarea2" style="height: 100px" required oninvalid="this.setCustomValidity('Alamat tidak boleh kosong')" oninput="setCustomValidity('')"></textarea>
                                                <label for="floatingTextarea2">Alamat</label>
                                            </div>

                                            <div class="form-floating mb-3">
                                                <select name="level" class="form-control" <?php echo (empty($_SESSION['user'])) ? 'hidden' : ''; ?>>
                                                    
                                                <?php if ($_SESSION['user']['level'] == 'admin') { ?>
                                                    <option value="admin">Admin</option>
                                                    <option value="petugas">Petugas</option>
                                                <?php } else { ?>
                                                    <option value="peminjam" <?php echo (empty($_SESSION['user'])) ? 'selected' : ''; ?>>Peminjam</option>
                                                <?php } ?>

                                                </select>
                                                <label <?php echo (empty($_SESSION['user'])) ? 'hidden' : ''; ?>>
                                                    Jabatan 
                                                    (Hak akses spesial admin)
                                                </label>
                                            </div>
                                            <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                                <button class="btn btn-dark" type="submit" name="register" value="register">Register</button>
                                                <?php if (!empty($_SESSION['user']) && $_SESSION['user']['level'] == 'admin') { ?>
                                                <a href="index.php" class="btn btn-danger"><i class="fa-solid fa-right-from-bracket"></i> Kembali</a>
                                                <?php } ?>
                                            </div>
                                        </form>
                                    </div>

                                    <div class="card-footer text-center py-3">
                                        <div class="small"><a href="login.php"><?php echo (empty($_SESSION['user'])) ? 'Sudah punya akun? silahkan Login' : ''; ?></a> </div>
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
                            <!--<div>-->
                            <!--    <a href="#">Privacy Policy</a>-->
                            <!--    &middot;-->
                            <!--    <a href="#">Terms &amp; Conditions</a>-->
                            <!--</div>-->
                        </div>
                    </div>
                </footer>
            </div>
        </div>
    </body>
</html>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<script src="js/scripts.js"></script>
<script>
    function togglePasswordVisibility() {
        var passwordField = document.getElementById("password");
        var eyeIcon = document.getElementById("togglePassword");

        // Toggle the password field type between "password" and "text"
        if (passwordField.type === "password") {
            passwordField.type = "text";
            eyeIcon.classList.remove("bi-eye-slash");
            eyeIcon.classList.add("bi-eye");
        } else {
            passwordField.type = "password";
            eyeIcon.classList.remove("bi-eye");
            eyeIcon.classList.add("bi-eye-slash");
        }
    }
</script>
