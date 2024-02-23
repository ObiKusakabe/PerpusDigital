<h1 class="mt-4">Daftar Buku</h1>
<style>
    .card-s{
        position: relative;
        overflow: hidden;
        transition: transform 0.3s ease;
    }

    .card-s:hover .hover-content {
        opacity: 0.4;
        transform: translateY(0);
    }

    .hover-content {
        position: absolute;
        top: 80%;
        transform: translateY(100%);
        text-align: center;
        opacity: 0;
        transition: opacity 0.3s ease, transform 0.3s ease;
    }

    .hover-content a {
        margin: 5px;
        text-decoration: none;
    }
</style>
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                <div class="container">
                    <div class="row">
                        <div class="d-flex gap-2 justify-content-center" style="margin-bottom:1rem;">
                        <?php
                        //SORTIR BERDASARKAN KATEGORI
                            // $selectedCategory = '';
                            if (isset($_POST['ensiklopedia'])) {
                                $query = mysqli_query($koneksi, "SELECT t_buku.*, t_kategoribuku.namaKategori FROM t_buku INNER JOIN t_kategoribuku ON t_buku.kategoriID = t_kategoribuku.kategoriID WHERE t_kategoribuku.namaKategori = 'ensiklopedia'");
                                $selectedCategory = 'ensiklopedia';//set btn btn-success untuk tombol yang dipilih
                            } elseif (isset($_POST['komik'])) {
                                $query = mysqli_query($koneksi, "SELECT t_buku.*, t_kategoribuku.namaKategori FROM t_buku INNER JOIN t_kategoribuku ON t_buku.kategoriID = t_kategoribuku.kategoriID WHERE t_kategoribuku.namaKategori = 'komik'");
                                $selectedCategory = 'komik';
                            } elseif (isset($_POST['framework'])) {
                                $query = mysqli_query($koneksi, "SELECT t_buku.*, t_kategoribuku.namaKategori FROM t_buku INNER JOIN t_kategoribuku ON t_buku.kategoriID = t_kategoribuku.kategoriID WHERE t_kategoribuku.namaKategori = 'framework'");
                                $selectedCategory = 'framework';
                            } elseif (isset($_POST['novel'])) {
                                $query = mysqli_query($koneksi, "SELECT t_buku.*, t_kategoribuku.namaKategori FROM t_buku INNER JOIN t_kategoribuku ON t_buku.kategoriID = t_kategoribuku.kategoriID WHERE t_kategoribuku.namaKategori = 'novel'");
                                $selectedCategory = 'novel';
                            } else {
                                $query = mysqli_query($koneksi, "SELECT t_buku.*, t_kategoribuku.namaKategori FROM t_buku INNER JOIN t_kategoribuku ON t_buku.kategoriID = t_kategoribuku.kategoriID");
                                $selectedCategory = 'all';
                            } 
                        ?>
                            <form action="" method="post">
                                <button type="submit" name="all" class="btn <?php echo $selectedCategory === 'all' ? 'btn-success' : 'btn-outline-success'; ?>">Semua</button>
                                <button type="submit" name="ensiklopedia" class="btn <?php echo $selectedCategory === 'ensiklopedia' ? 'btn-success' : 'btn-outline-success'; ?>">Ensiklopedia</button>
                                <button type="submit" name="komik" class="btn <?php echo $selectedCategory === 'komik' ? 'btn-success' : 'btn-outline-success'; ?>">Komik</button>
                                <button type="submit" name="framework" class="btn <?php echo $selectedCategory === 'framework' ? 'btn-success' : 'btn-outline-success'; ?>">Framework</button>
                                <button type="submit" name="novel" class="btn <?php echo $selectedCategory === 'novel' ? 'btn-success' : 'btn-outline-success'; ?>">Novel</button>
                            </form>
                            <?php if ($_SESSION['user']['level'] != 'peminjam') { ?>
                                <div class="d-flex align-items-end flex-column">
                                    <a href="?page=page/buku/buku_tambah" class="btn btn-primary " ><i class="fa-solid fa-plus"></i> Tambah Buku Baru</a>
                                </div>
                            <?php } ?>
                        </div>
                    </div><!-- row-->
                </div><!-- containder -->
            </div><!-- col -->
            <div class="col-md-4"></div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="container">
                    <div class="row row-cols-1 row-cols-md-5 g-4 ">
                        <?php 
                        // $query = mysqli_query($koneksi, "SELECT t_buku.*, t_kategoribuku.namaKategori FROM t_buku INNER JOIN t_kategoribuku ON t_buku.kategoriID = t_kategoribuku.kategoriID");
                        while ($data = mysqli_fetch_assoc($query)) {
                        ?>
                        <div data-aos="fade-up" data-aos-anchor-placement="top-center">
                            <div class="col" style="height: 100%;">
                                <a href="?page=page/buku/detail_buku&&id=<?= $data["bukuID"]; ?>" style="text-decoration: none; color: black;">
                                    <div class="card shadow"  style="height: 100%; border: none;">
                                        <?php if ($data['gambarBuku'] != null) {?>
                                            <img src="./assets/img/uploaded_book/<?=$data['gambarBuku']?>" class="card-img-top p-2" alt="..."  style="height: px;">
                                        <?php } else { ?>
                                            <img src="./assets/img/bookcovernotavailable.jpeg" class="card-img-top p-2" style="height: 246px;">
                                        <?php } ?>
                                        <div class="card-body pt-0 pb-0 ps-n4">
                                            <li class="list-group-item text-muted small">Kategori : <?=$data["namaKategori"]; ?></li>
                                            <li class="list-group-item pt-1"><?php echo $data['judul']?></li>
                                            <h6 class=""></h6> 
                                            
                                            <!-- <a class="btn btn-success" href="?page=page/buku/detail_buku&&id=<?= $data["bukuID"]; ?>"><i class="fa-solid fa-circle-info"></i> Detail</a> -->
                                            <?php if ($_SESSION['user']['level'] != 'peminjam') {?>
                                            <!-- <a href="?page=page/buku/buku_hapus&&id=<?=$data['bukuID'] ?>" class="btn btn-danger position-absolute top-100 start-50 translate-middle" onclick="return confirm('Apakah Anda yakin ingin menghapus buku (<?php echo $data['judul'] ?>)? ')">
                                                <i class="fa-solid fa-trash"></i>
                                            </a> -->
                                            <?php } else {
                                                $id_user = $_SESSION['user']['userID'];
                                                $cekantri = mysqli_query($koneksi, "SELECT * FROM t_peminjaman WHERE userID=$id_user AND statusPeminjaman = 'antri'");
                                                $jmlantri = mysqli_num_rows($cekantri);
                                                
                                                $cekdipinjam = mysqli_query($koneksi, "SELECT * FROM t_peminjaman WHERE userID=$id_user AND statusPeminjaman = 'dipinjam'");
                                                $jmldipinjam = mysqli_num_rows($cekdipinjam);
                                                
                                                $currentQuantity = getTotalQuantity();
                                                if ($currentQuantity == 2) {
                                                    $jmlqty2 = true;
                                                } else if ($antri = $jmlantri == 2) {
                                                    $antri = true;
                                                } else if ($dipinjam = $jmldipinjam == 2) {
                                                    $dipinjam = true;
                                                } else {
                                                    $jmlqty2 = false; $antri = false; $dipinjam = false;
                                                }
                                                ?>
                                                <!-- <a href="?page=page/peminjaman/keranjang&action=add&id=<?php echo $data['bukuID'] ?>" class="btn btn-success add-to-cart-btn <?php if ($jmlqty2 || $antri || $dipinjam) {echo 'disabled';} ?>" 
                                                    data-bs-toggle="popover" data-bs-trigger="hover" data-bs-content="Your Popover Content Here">
                                                    <i class="bi bi-bag-plus"></i>
                                                </a> -->
                                            <?php } ?>
                                        </div>
                                        <div class="hover-content" style="width: 100%">
                                            <div class="bg-success pb-4 pt-4">
                                                <i class="fa-regular fa-eye" style="color: white"></i>
                                            </div>
                                        </div>
                                        <!-- <div class="card-body">
                                            
                                        </div> -->
                                    </div> <!-- card-->
                                </a>
                            </div> <!-- col -->
                        </div> <!-- aos -->
                        <?php }//while?>
                    </div>
                </div>         
            </div>
        </div>
    </div>
</div>

<script>
  document.addEventListener('DOMContentLoaded', function () {
    var addToCartBtn = document.querySelector('.add-to-cart-btn');

    if (addToCartBtn) {
      addToCartBtn.addEventListener('mouseenter', function () {
        addToCartBtn.classList.add('show');
      });

      addToCartBtn.addEventListener('mouseleave', function () {
        addToCartBtn.classList.remove('show');
      });
    }
  });
</script>

