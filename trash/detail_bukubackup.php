    <h1 class="mt-4">Detail Buku </h1>
    <?php 
    if ($_SESSION['user']['level'] != 'peminjam') {?>
        <div class="alert alert-info">
            Jabatan Anda memiliki akses edit data buku.
        </div>
    <?php 
        } else {
            $id_user = $_SESSION['user']['userID'];
            // $kodePinjam = mysqli_fetch_array(mysqli_query($koneksi, "SELECT kodePinjam FROM t_peminjaman WHERE userID = ".." AND statusPeminjaman='dipinjam'"));
            $cekantri = mysqli_query($koneksi, "SELECT * FROM t_peminjaman WHERE userID=$id_user AND statusPeminjaman = 'antri'");
            $jmlantri = mysqli_num_rows($cekantri);
            
            $cekdipinjam = mysqli_query($koneksi, "SELECT * FROM t_peminjaman WHERE userID=$id_user AND statusPeminjaman = 'dipinjam'");
            $jmldipinjam = mysqli_num_rows($cekdipinjam);
            
            $currentQuantity = getTotalQuantity(); 
            if ($currentQuantity == 2) { ?>
                <div class="alert alert-warning">
                    Anda telah mencapai batas jumlah buku yang dipinjam, jika Anda berkenan meminjam buku kembali, maka Anda perlu mengurangi atau menghapus buku <i class="bi bi-bag-dash"></i> di <a href="?page=page/peminjaman/keranjang">keranjang</a>.
                </div>
            <?php } else if ($antri = $jmlantri == 2) { ?>
                <div class="alert alert-warning">
                    Anda telah mencapai batas jumlah buku yang dipinjam, jika Anda berkenan meminjam buku kembali, maka  perlu membatalkan satu atau semua antrian buku <i class="fa-solid fa-trash"></i> di <a href="?page=page/peminjaman/peminjaman">detail peminjaman</a>. 
                </div>
            <?php } else if ($dipinjam = $jmldipinjam == 2) { ?>
                <div class="alert alert-warning">
                    Anda telah mencapai batas jumlah buku yang dipinjam, jika Anda berkenan meminjam buku kembali, maka Anda perlu mengembalikan buku yang dipinjam.
                </div>
            <?php } ?>
        <?php }?>
    <div class="card">
        <div class="card-body">
            <div class="row px-3">
                <div class="col-md-4 pt-2" style="border: 1px solid #ddd; border-radius: 5px;">
                    <?php 
                        $id = $_GET['id'];
                        
                        $query = mysqli_query($koneksi, "SELECT t_buku.*, t_kategoribuku.namaKategori FROM t_buku INNER JOIN t_kategoribuku ON t_buku.kategoriID = t_kategoribuku.kategoriID WHERE bukuID=$id");
                        $data = mysqli_fetch_array($query);

                        if ($data['gambarBuku'] != null) {
                    ?>
                        <img src="./assets/img/uploaded_book/<?=$data['gambarBuku']?>" class="card-img-top" alt="Cover Buku <?php echo $data['judul']?>">
                    <?php } else { ?>
                        <img src="./assets/img/bookcovernotavailable.jpeg" class="card-img-top" alt="Cover Buku <?php echo $data['judul']?>">
                    <?php } ?>
                    <?php if ($_SESSION['user']['level'] != 'peminjam') {?>
                        <div class="card-footer text-muted">
                            <form method="post" enctype="multipart/form-data">
                                <?php
                                if(isset($_FILES['file']['name']) && $_FILES['file']['name'] != '' ){
                                    $ekstensi_diperbolehkan	= array('png','jpg','jpeg');
                                    $namafile = $_FILES['file']['name'];
                                    $x = explode('.', $namafile);
                                    $ekstensi = strtolower(end($x));
                                    $ukuran	= $_FILES['file']['size'];
                                    $file_tmp = $_FILES['file']['tmp_name'];
                                    if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
                                        if($ukuran < 3044070){		
                                            move_uploaded_file($file_tmp, './assets/img/uploaded_book/'.$namafile);    
                                            $query = mysqli_query($koneksi, "UPDATE t_buku SET gambarBuku='$namafile' WHERE bukuID='$id'");
                                            if($query){
                                                echo "<script>alert('UBAH COVER BUKU BERHASIL.')</script>";
                                            }else{
                                                echo "<script>alert('UBAH COVER BUKU GAGAL')</script>";
                                            }
                                        }else{
                                            echo "<script>alert('UKURAN FILE TERLALU BESAR, MAKSIMAL UKURAN 1 MB')</script>";
                                        }   
                                    }else{
                                        echo "<script>alert('HANYA EKSTENSI .png, .jpg DAN .jpeg YANG DI PERBOLEHKAN')</script>";
                                    }
                                }
                                ?>
                                <table>
                                    <tr>
                                        <td>Cover Buku (png/jpg/jpeg) MAX 3MB</td>
                                    </tr>
                                    <tr>
                                        <td><input type="file" class="form-control" name="file" accept=".png, .jpeg, .jpg"></td>
                                    </tr>
                                    <tr>
                                        <td><button type="submit" class="btn btn-dark mx-auto" name="upload" value="upload"><i class="fa-solid fa-upload"></i> Upload</button></td>
                                    </tr>
                                </table>
                            </form>
                        </div>
                    <?php } ?>
                </div>
                <div class="col-md-8">
                    <form method="post">
                        <?php   
                        if (isset($_POST['edit'])) {
                            $id_kategori = htmlspecialchars($_POST['id_kategori']);
                            $judul = htmlspecialchars($_POST['judul']);
                            $deskripsi = htmlspecialchars($_POST['deskripsi']);
                            $penulis = htmlspecialchars($_POST['penulis']);
                            $penerbit = htmlspecialchars($_POST['penerbit']);
                            $tahunTerbit = htmlspecialchars($_POST['tahunTerbit']);
                            $stok = htmlspecialchars($_POST['stok']);

                            $query = mysqli_query($koneksi, "UPDATE t_buku SET kategoriID='$id_kategori', judul='$judul', deskripsi='$deskripsi', penulis='$penulis', penerbit='$penerbit', tahunTerbit='$tahunTerbit', stok='$stok' WHERE bukuID='$id'");
                            if($query){
                                echo "<script>alert('Edit Buku Berhasil.')</script>";
                            }else{
                                echo "<script>alert('Edit Buku Gagal')</script>";
                            }
                        }
                        ?>
                        <div class="card">
                            <div class="card-body">
                                <table class="table">
                                    <tr>
                                        <td width="150rem">Judul</td>
                                        <td width="1">:</td>
                                        <td>
                                            <?php if ($_SESSION['user']['level'] != 'peminjam') {?>
                                                <input type="text" value="<?php echo $data['judul']; ?>" class="form-control" name="judul" id="username" data-toggle="popover" data-trigger="manual" data-content="Username harus diisi" data-placement="right">
                                            <?php } else {
                                                echo $data['judul'];
                                            } ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Deskripsi</td>
                                        <td>:</td>
                                        <td>
                                            <?php if ($_SESSION['user']['level'] != 'peminjam') {?>
                                                <textarea class="form-control" name="deskripsi" style="height: 100px" required><?php echo $data['deskripsi']; ?></textarea>
                                            <?php } else {?>
                                                <textarea class="form-control ps-0" name="deskripsi" style="height: 118px; border: none;" readonly><?php echo $data['deskripsi']; ?></textarea>
                                            <?php } ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Kategori</td>
                                        <td>:</td>
                                        <td>
                                            <?php if ($_SESSION['user']['level'] != 'peminjam') {?>
                                                <select name="id_kategori" class="form-control">
                                                    <option selected disabled>Pilih kategori</option>
                                                    <?php
                                                    $kat = mysqli_query($koneksi, "SELECT * FROM t_kategoribuku");
                                                    while ($kategori = mysqli_fetch_array($kat)) {
                                                    ?>
                                                        <option <?php if($kategori['kategoriID'] == $data['kategoriID']) echo 'selected'; ?> value="<?php echo $kategori['kategoriID']; ?>">
                                                            <?php 
                                                                if ($kategori['kategoriID'] != $data['kategoriID']) {
                                                                    echo "Ubah menjadi ";
                                                                }
                                                                echo $kategori['namaKategori']; 
                                                            ?>
                                                        </option>
                                                    <?php } ?>
                                                </select>
                                            <?php } else {
                                                echo $data['namaKategori'];
                                            } ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Penulis</td>
                                        <td>:</td>
                                        <td>
                                            <?php if ($_SESSION['user']['level'] != 'peminjam') {?>
                                                <input type="text" value="<?php echo $data['penulis']; ?>" class="form-control" name="penulis">
                                            <?php } else {
                                                echo $data['penulis'];
                                            } ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Penerbit</td>
                                        <td>:</td>
                                        <td>
                                            <?php if ($_SESSION['user']['level'] != 'peminjam') {?>
                                                <input type="text" value="<?php echo $data['penerbit']; ?>" class="form-control" name="penerbit">
                                            <?php } else {
                                                echo $data['penerbit'];
                                            } ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Tahun Terbit</td>
                                        <td>:</td>
                                        <td>
                                            <?php if ($_SESSION['user']['level'] != 'peminjam') {?>
                                                <input type="number" value="<?php echo $data['tahunTerbit']; ?>" class="form-control" name="tahunTerbit">
                                            <?php } else {
                                                echo $data['tahunTerbit'];
                                            } ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Stok</td>
                                        <td>:</td>
                                        <td>
                                            <?php if ($_SESSION['user']['level'] != 'peminjam') {?>
                                                <input type="number" value="<?php echo $data['stok']; ?>" class="form-control" name="stok">
                                            <?php } else {
                                                echo $data['stok'].' Buku';
                                            } ?>
                                        </td>
                                    </tr>
                                </table>
                                <?php if ($_SESSION['user']['level'] != 'peminjam') {?>
                                    <button type="submit" class="btn btn-dark" name="edit" value="edit"><i class="fa-solid fa-floppy-disk"></i> Simpan</button>
                                    <button type="reset" class="btn btn-secondary">Reset</button>
                                    <a href="?page=page/buku/buku_hapus&&id=<?=$data['bukuID'] ?>" class="btn btn-danger">
                                        <i class="fa-solid fa-trash"></i>
                                    </a>
                                <?php } else { 
                                    if ($currentQuantity == 2) {
                                        $jmlqty2 = true;
                                    } else {
                                        $jmlqty2 = false;
                                    }
                                    ?>
                                    <a href="?page=page/peminjaman/keranjang&action=add&id=<?php echo $data['bukuID'] ?>" class="btn btn-dark <?php if ($jmlqty2 || $antri || $dipinjam) {echo 'disabled';} ?>" 
                                        data-bs-toggle="popover" data-bs-trigger="hover" data-bs-content="Your Popover Content Here">
                                        <i class="bi bi-bag-plus"></i> Masukkan Keranjang
                                    </a>
                                <?php } ?>
                                <a href="?page=page/buku/Daftar buku" class="btn btn-danger"><i class="fa-solid fa-right-from-bracket"></i> Kembali</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

<script>
$(document).ready(function(){
    $('[data-toggle="popover"]').popover();   
});
</script>