<?php
date_default_timezone_set('Asia/Jakarta');

if (isset($_GET['id_pinjam']) && isset($_GET['kd_buku'])) {
    $id_pinjam = $_GET['id_pinjam']; $kd_buku = $_GET['kd_buku'];
    $status = 'dipinjam';
    $tgl_pinjam = date('Y-m-d H:i:s');
    $maxtgl_pengembalian = date('Y-m-d H:i:s', strtotime($tgl_pinjam . ' +7 days')); // Menambahkan 7 hari

    //query update peminjaman
    $query = mysqli_query($koneksi, "UPDATE t_peminjaman SET tgl_peminjaman = '$tgl_pinjam', maxtgl_pengembalian = '$maxtgl_pengembalian', statusPeminjaman = '$status' WHERE peminjamanID = $id_pinjam");
    
    //query pengurangan stok
    $stokdipinjam = mysqli_query($koneksi, "UPDATE t_buku SET stok = stok - 1 WHERE kd_buku = '$kd_buku'");
    if ($query) {
        echo "<script>alert('Verifikasi Sukses, Peminjaman dimulai'); location.href='?page=page/peminjaman/peminjaman'</script>";
    }  
}
?>