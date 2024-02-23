<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    if (isset($_SESSION['cart'][$id])) {
        unset($_SESSION['cart'][$id]);
        echo "<script>location.href='?page=page/peminjaman/keranjang'</script>";
    }
}
?>