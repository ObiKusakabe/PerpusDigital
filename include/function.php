<?php 
function getTotalQuantity() {
    $totalQuantity = 0;

    if (isset($_SESSION['cart'])) {
        foreach ($_SESSION['cart'] as $item) {
            $totalQuantity += $item['quantity'];
        }
    }

    return $totalQuantity;
}
function hapusKeranjang($id) {
    $id = $_GET['id'];
    if (isset($_SESSION['cart'][$id])) {
        unset($_SESSION['cart'][$id]);
        echo "<script>alert('Menghapus Buku dari keranjang Berhasil.'); location.href='?page=page/peminjaman/keranjang'</script>";
    }
}
function checkout() {
        unset($_SESSION['cart']);
        if (!isset($_SESSION['cart'])) {
            echo "<script>alert('Pengajuan Pemesanan Berhasil.'); location.href='?page=page/peminjaman/peminjaman'</script>";
        }
}
?>
