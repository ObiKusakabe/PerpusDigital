<h1 class="mt-4">Detail Peminjaman</h1>
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                <?php if ($_SESSION['user']['level'] != 'peminjam'){?>
                
                    <a href="../page/cetak.php" target="_blank" class="btn btn-dark mb-3"><i class="fa fa-print"></i> Cetak Data</a>
                <?php } ?>
                <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th width="1">Kode Pinjam</th>
                            <th width="1">Kode Buku</th>
                            <?php if ($_SESSION['user']['level'] != 'peminjam') {?>
                            <th width="<?php if ($_SESSION['user']['level'] != 'peminjam') { echo '1';} ?>">Nama</th>
                            <?php } ?>
                            <th>Buku</th>
                            <th width="1">Tanggal Pinjam</th>
                            <th width="1">Tanggal Kembali</th>
                            <th width="1">Maks Tanggal Kembali</th>
                            <th width="1">Status</th>
                            <?php if ($_SESSION['user']['level'] == 'peminjam') {?> 
                            <th width="1">Aksi</th>
                            <?php } else if ($_SESSION['user']['level'] != 'peminjam') {?>
                            <th width="1">Aksi</th>
                            <?php } ?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            $kd_peminjam = $_SESSION['user']['userID'];
                            $query1 = mysqli_query($koneksi, "SELECT * FROM t_user WHERE userID=$kd_peminjam");
                            $data1 = mysqli_fetch_array($query1);

                            $query2 = mysqli_query($koneksi, "SELECT * FROM t_peminjaman LEFT JOIN t_user ON t_user.userID = t_peminjaman.userID LEFT JOIN t_buku ON t_buku.bukuID = t_peminjaman.bukuID WHERE t_peminjaman.userID=$kd_peminjam");

                            $i = 1;
                            if ($_SESSION['user']['level'] == 'peminjam'){
                                $query = mysqli_query($koneksi, "SELECT * FROM t_peminjaman p
                                                                LEFT JOIN t_user u ON u.userID = p.userID 
                                                                LEFT JOIN t_buku b ON b.bukuID = p.bukuID 
                                                                WHERE p.userID='$kd_peminjam'");  
                            } else {
                                $query = mysqli_query($koneksi, "SELECT * FROM t_peminjaman p
                                                                LEFT JOIN t_user u ON u.userID = p.userID 
                                                                LEFT JOIN t_buku b ON b.bukuID = p.bukuID");
                            }
                        ?>
                        <?php while ($data = mysqli_fetch_array($query)) {
                            if ($data['statusPeminjaman'] == 'dikembalikan') {
                                $kelasWarna = 'text-success';
                            } else if ($data['statusPeminjaman'] == 'dipinjam') {
                                $kelasWarna = 'text-warning'; 
                            }  
                        ?>
                            <tr>
                                <td><?php echo $data['kodePinjam']; ?></td>
                                <td><?php echo $data['kd_buku']; ?></td>
                                <?php if ($_SESSION['user']['level'] != 'peminjam') {?>
                                <td><?php echo $data['namaLengkap']; ?></td>
                                <?php } ?>
                                <td><?php echo $data['judul']; ?></td>
                                <?php if ($_SESSION['user']['level'] != 'peminjam') {?>
                                <!-- <td><?php echo $data['tgl_pengajuan']; ?></td> -->
                                <?php } ?>
                                <td><?php echo $data['tgl_peminjaman']; ?></td>
                                <td><?php echo $data['tgl_pengembalian']; ?></td>
                                <td><?php echo $data['maxtgl_pengembalian']; ?></td>
                                <td class="<?php echo $kelasWarna ?>"><?php echo $data['statusPeminjaman']; ?></td>
                                <!-- <td><?php echo $data['qty']; ?></td> -->
                                <?php 
                                if ($_SESSION['user']['level'] == 'peminjam') 
                                { ?>
                                    <td>
                                        <?php if ($data['statusPeminjaman'] == 'antri') { ?>
                                            <a href="?page=page/peminjaman/peminjaman_hapus&&id=<?php echo $data['peminjamanID']; ?>" 
                                                onclick="return confirm('Apakah Anda yakin ingin membatalkan pesanan buku?')"
                                                class="btn btn-danger">
                                                <i class="fa-solid fa-trash"></i>
                                            </a>
                                        <?php } ?>
                                    </td>
                                <?php } 
                                if ($_SESSION['user']['level'] != 'peminjam' && $data['statusPeminjaman'] == 'antri') { ?>
                                    <td>
                                        <a onclick="return confirm('Apakah Anda yakin ingin memverifikasi peminjaman buku?')" 
                                           href="?page=page/peminjaman/verifikasi_mulai&id_pinjam=<?= $data['peminjamanID']; ?>&kd_buku=<?= $data['kd_buku']; ?>" 
                                           class="btn btn-primary">
                                        <i class="fa-solid fa-square-check"></i> Pinjam
                                        </a>
                                    </td>
                                <?php } else if ($_SESSION['user']['level'] != 'peminjam' && $data['statusPeminjaman'] == 'dipinjam') { ?>
                                    <td>
                                        <a onclick="return confirm('Apakah Anda yakin ingin memverifikasi pengembalian buku?')"
                                           href="?page=page/peminjaman/verifikasi_selesai&id_pinjam=<?= $data['peminjamanID']; ?>&kd_buku=<?= $data['kd_buku']; ?>" 
                                           class="btn btn-success">
                                        <i class="fa-solid fa-square-check"></i> Kembali
                                        </a>
                                    </td>
                                <?php } else if ($_SESSION['user']['level'] != 'peminjam'){?>
                                    <td></td>
                                <?php } ?>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>