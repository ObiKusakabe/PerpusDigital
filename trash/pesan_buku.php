<h1 class="mt-4">Ajukan Peminjaman Buku</h1>
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                <form method="post">
                    <?php
                    // Mendapatkan nomor terakhir dari tabel
                    $mk = mysqli_query($koneksi, "SELECT MAX(SUBSTRING(kodePinjam, 3)) as max_kode FROM t_peminjaman");
                    $row = mysqli_fetch_array($mk);
                    $max_kode = $row['max_kode'];


                    if ($max_kode == null) {
                        $new_kode = 'PM001';//kode pinjam
                    } else {
                        // Jika angka adalah 5, maka setelah diolah dengan str_pad($angka, 3, '0', STR_PAD_LEFT), hasilnya akan menjadi '005'.
                        // Jika angka adalah 25, maka hasilnya tetap '025'.
                        // Jika angka adalah 125, maka hasilnya tetap '125' (karena sudah memiliki tiga digit).
                        // Jika angka adalah 1005, maka hasilnya tetap '1005' (karena sudah memiliki lebih dari tiga digit).
                        $new_kode = 'PM' . str_pad($max_kode + 1, 3, '0', STR_PAD_LEFT);
                    }

                    //kirim form
                    if (isset($_POST['submit'])) {
                        $id_buku = htmlspecialchars($_POST['id_buku']);
                        $id_user = htmlspecialchars($_SESSION['user']['userID']);
                        $tgl_pemesanan = date('Y-m-d H:i:s'); //mendapatkan waktu saat ini
                        $status_peminjaman = "antri";
                        $query = mysqli_query($koneksi, "INSERT INTO t_peminjaman(kodePinjam, userID, bukuID, tgl_pemesanan, statusPeminjaman) VALUES ('$new_kode', '$id_user', '$id_buku', '$tgl_pemesanan', '$status_peminjaman')");
                        if ($query) {
                            echo "<script>alert('Pesan buku Berhasil')</script>";
                        } else {
                            echo "<script>alert('Pesan buku Gagal')</script>";
                        }
                    }
                    ?>
                    <div class="row mb-3">
                        <div class="col-md-2">Jumlah Buku</div>
                        <div class="col-md-8">
                            <select name="jmlBuku" id="idjmlBuku" class="form-control" onchange="showFields()">
                                <option selected disabled>Tentukan jumlah buku</option>
                                <option value="1">1 Buku</option>
                                <option value="2">2 Buku</option>
                            </select>

                            <div id="bookFieldsContainer"></div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-2">Buku</div>
                        <div class="col-md-8">
                            <select name="id_buku" class="form-control">
                                <option selected disabled>Pilih buku</option>
                                <?php
                                $buk = mysqli_query($koneksi, "SELECT * FROM t_buku ORDER BY judul ASC");
                                while ($buku = mysqli_fetch_array($buk)) {
                                ?>
                                    <option value="<?php echo $buku['bukuID']; ?>"><?php echo $buku['judul']; ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-2">Buku 2</div>
                        <div class="col-md-8">
                            <select name="id_buku2" class="form-control">
                                <option selected disabled>Pilih buku</option>
                                <?php
                                $buk = mysqli_query($koneksi, "SELECT * FROM t_buku ORDER BY judul ASC");
                                while ($buku = mysqli_fetch_array($buk)) {
                                ?>
                                    <option value="<?php echo $buku['bukuID']; ?>"><?php echo $buku['judul']; ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-2">Buku 3</div>
                        <div class="col-md-8">
                            <select name="id_buku3" class="form-control">
                                <option selected disabled>Pilih buku</option>
                                <?php
                                $buk = mysqli_query($koneksi, "SELECT * FROM t_buku ORDER BY judul ASC");
                                while ($buku = mysqli_fetch_array($buk)) {
                                ?>
                                    <option value="<?php echo $buku['bukuID']; ?>"><?php echo $buku['judul']; ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-2"></div>
                        <div class="col-md-8">
                            <button type="submit" class="btn btn-primary" name="submit" value="submit"><i class="fa-solid fa-floppy-disk"></i> Ajukan</button>
                            <button type="reset" class="btn btn-secondary">Reset</button>
                            <a href="?page=page/peminjaman/peminjaman" class="btn btn-danger"><i class="fa-solid fa-right-from-bracket"></i> Kembali</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>