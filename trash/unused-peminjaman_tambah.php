<!-- <h1 class="mt-4">Peminjaman Buku</h1>
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
                        $new_kode = 'PM001';
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
                        $tgl_peminjaman = htmlspecialchars($_POST['tgl_peminjaman']);
                        $tgl_pengembalian = htmlspecialchars($_POST['tgl_pengembalian']);
                        $status_peminjaman = htmlspecialchars($_POST['status_peminjaman']);
                        $query = mysqli_query($koneksi, "INSERT INTO t_peminjaman(userID, bukuID, kodePinjam, tgl_peminjaman, tgl_pengembalian, statusPeminjaman) VALUES ('$id_user', '$id_buku', '$new_kode', '$tgl_peminjaman', '$tgl_pengembalian', '$status_peminjaman')");
                        if ($query) {
                            echo "<script>alert('Booking buku Berhasil')</script>";
                        } else {
                            echo "<script>alert('Booking buku Gagal')</script>";
                        }
                    }
                    ?>
 
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
                        <div class="col-md-2">Tanggal Pinjam</div>
                        <div class="col-md-8">
                                <input type="date" class="form-control" name="tgl_peminjaman" >
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-2">Tanggal Pengembalian</div>
                        <div class="col-md-8">
                                <input type="date" class="form-control" name="tgl_pengembalian">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-2">Status Peminjaman</div>
                        <div class="col-md-8">
                            <select class="form-control" name="status_peminjaman">
                                <option selected disabled>Pilih status</option>
                                <option value="dipinjam">Dipinjam</option>
                                <option value="dikembalikan">Dikembalikan</option> 
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-2"></div>
                        <div class="col-md-8">
                            <button type="submit" class="btn btn-primary" name="submit" value="submit"><i class="fa-solid fa-floppy-disk"></i> Simpan</button>
                            <button type="reset" class="btn btn-secondary">Reset</button>
                            <a href="?page=peminjaman" class="btn btn-danger">Kembali</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div> -->