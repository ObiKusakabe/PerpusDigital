<?php
date_default_timezone_set('Asia/Jakarta');

if (isset($_GET['id_pinjam']) && isset($_GET['kd_buku'])) {
    $id_pinjam = $_GET['id_pinjam']; $kd_buku = $_GET['kd_buku'];
    $status = 'dikembalikan';
    $tgl_kembali = date('Y-m-d H:i:s');

    $query = mysqli_query($koneksi, "UPDATE t_peminjaman SET tgl_pengembalian = '$tgl_kembali', statusPeminjaman = '$status' WHERE peminjamanID = $id_pinjam");

    $stokdikembalikan = mysqli_query($koneksi, "UPDATE t_buku SET stok = stok + 1 WHERE kd_buku = '$kd_buku'");
    if ($query) {
        echo "<script>alert('Verifikasi Sukses, Peminjaman Selesai'); location.href='?page=page/peminjaman/peminjaman'</script>";
    }
}
?>