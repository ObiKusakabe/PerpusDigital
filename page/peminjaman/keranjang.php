<h1 class="mt-4">Keranjang Buku</h1>

<?php
$id_user = $_SESSION['user']['userID'];
$cekantri = mysqli_query($koneksi, "SELECT * FROM t_peminjaman WHERE userID=$id_user AND statusPeminjaman = 'antri'");
$jmlantri = mysqli_num_rows($cekantri);

$cekdipinjam = mysqli_query($koneksi, "SELECT * FROM t_peminjaman WHERE userID=$id_user AND statusPeminjaman = 'dipinjam'");
$jmldipinjam = mysqli_num_rows($cekdipinjam);

$currentQuantity = getTotalQuantity(); 
if ($currentQuantity == 0) {
    $nullqty = true;
}
if ($currentQuantity == 2) { 
    $maxqty = true;
    ?>

    <div class="alert alert-warning">
        Anda telah mencapai batas jumlah buku yang dipinjam, jika Anda berkenan menambah buku kembali, maka Anda perlu mengurangi atau menghapus buku <i class="bi bi-bag-dash"></i> di keranjang ini.
    </div>
<?php } else if ($antri = $jmlantri == 2) { ?>
    <div class="alert alert-warning">
        Anda telah mencapai batas jumlah buku yang dipinjam, jika Anda berkenan meminjam buku kembali, maka Anda perlu membatalkan satu atau semua antrian buku <i class="fa-solid fa-trash"></i> di <a href="?page=page/peminjaman/peminjaman">detail peminjaman</a>. 
    </div>
<?php } else if ($dipinjam = $jmldipinjam == 2) { ?>
    <div class="alert alert-warning">
        Anda telah mencapai batas jumlah buku yang dipinjam, jika Anda berkenan meminjam buku kembali, maka Anda perlu mengembalikan buku yang dipinjam.
    </div>
<?php } ?>

<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                <form method="post" onsubmit="return confirm('Apakah Anda yakin dengan buku yang Anda pilih?')">
                    <button type="submit" name="ajukanpemesanan" value="ajukanpemesanan" class="btn btn-dark mb-3 <?php if ($nullqty || $antri || $dipinjam) {echo 'disabled';} ?>">
                        <i class="fa fa-paper-plane"></i> Ajukan Pemesanan
                    </button>
                    <a href="?page=page/buku/Daftar buku" class="btn btn-dark mb-3 <?php if ($maxqty || $antri || $dipinjam) {echo 'disabled';} ?>"><i class="bi bi-bag-plus"></i> Tambah Buku</a>
                </form>
                <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th width="1">Kode Pinjam</th>
                            <th width="1">Kode Buku</th>
                            <th>Buku</th>
                            <th width="1">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            if (isset($_GET['action']) && $_GET['action'] == 'add') {
                                $id_buku =  intval($_GET['id']);

                                if (!isset($_SESSION['cart'])) {
                                    $_SESSION['cart'] = array();
                                }

                                if (!isset($_SESSION['cart'][$id_buku])) {
                                    $_SESSION['cart'][$id_buku]['quantity'] = 1;
                                } else {
                                    $_SESSION['cart'][$id_buku] = array(
                                        "quantity" => 1
                                    );
                                }
                            }
                            
                            if (!empty($_SESSION['cart'])) {
                                $mk = mysqli_query($koneksi, "SELECT MAX(SUBSTRING(kodePinjam, 3)) as max_kode FROM t_peminjaman");
                                $row = mysqli_fetch_array($mk);
                                $max_kode = $row['max_kode'];
                                if ($max_kode == null) {
                                    $new_kode = 'PM001';
                                } else {
                                    $new_kode = 'PM' . str_pad($max_kode + 1, 3, '0', STR_PAD_LEFT);
                                }
                                $_SESSION['cart_statusPeminjaman'] = 'antri';

                                foreach ($_SESSION['cart'] as $id_buku => $item) {
                                    $query = mysqli_query($koneksi, "SELECT * FROM t_buku WHERE bukuID = $id_buku");
                                    $_SESSION['buku_yg_dipilih'] = mysqli_fetch_array($query);
                                    $bukuidygdipilih = $_SESSION['buku_yg_dipilih']['bukuID'];
                                    
                                    ?>
                                <tr>
                                    <td><?php echo $new_kode; ?></td>
                                    <td><?php echo $_SESSION['buku_yg_dipilih']['kd_buku']; ?></td>
                                    <td><?php echo $_SESSION['buku_yg_dipilih']['judul']; ?></td>
                                    <?php if ($_SESSION['user']['level'] == 'peminjam') { ?>
                                        <td>
                                            <a href="?page=page/peminjaman/keranjang_hapus&&id=<?= $bukuidygdipilih ?>" 
                                            class="btn btn-danger">
                                                <i class="bi bi-bag-dash"></i>
                                            </a>
                                        </td>
                                    <?php } elseif ($_SESSION['user']['level'] == 'admin' && $data['statusPeminjaman'] == 'diajukan') { ?>
                                        <td>
                                            <a onclick="return confirm('Apakah Anda yakin ingin memverifikasi peminjama buku?')" href="?page=page/peminjaman/verifikasi_pinjam&&id=<?php echo $data['peminjamanID']; ?>" class="btn btn-primary">
                                                <i class="fas fa-check"></i>Verifikasi Pinjam
                                            </a>
                                        </td>
                                <?php } ?>
                                </tr>
                                <?php
                                }

                                if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['ajukanpemesanan'])) {
                                    foreach ($_SESSION['cart'] as $id_buku => $item) {
                                        $query = mysqli_query($koneksi, "SELECT * FROM t_buku WHERE bukuID = $id_buku");
                                        $_SESSION['buku_yg_dipilih'] = mysqli_fetch_array($query);

                                        $bukuidygdipilih = $_SESSION['buku_yg_dipilih']['bukuID'];
                                        $id_user = $_SESSION['user']['userID'];
                                        $status_peminjaman = $_SESSION['cart_statusPeminjaman'];

                                        $query = mysqli_query($koneksi, "INSERT INTO t_peminjaman(kodePinjam, userID, bukuID, statusPeminjaman) VALUES ('$new_kode', $id_user, $bukuidygdipilih, '$status_peminjaman')");

                                    }
                                    unset($_SESSION['cart']);
                                    checkout();
                                }
                            } ?>  
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
