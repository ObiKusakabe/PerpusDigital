<?php
$id = $_GET['id'];
if (isset($id)) {
    $query = mysqli_query($koneksi, "DELETE FROM t_peminjaman WHERE peminjamanID = $id");
    if ($query) {
        echo "<script>alert('Membatalkan Pesanan Berhasil'); location.href='?page=page/peminjaman/peminjaman'</script>";
    }
}
?>