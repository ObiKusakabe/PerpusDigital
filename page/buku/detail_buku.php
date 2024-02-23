    <h1 class="mt-4">Detail Buku </h1>
    <?php 
    if ($_SESSION['user']['level'] != 'peminjam') {?>
        <div class="alert alert-info">
            Jabatan anda memiliki akses edit data buku.
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
                    Anda telah mencapai batas jumlah buku yang dipinjam, jika Anda berkenan meminjam buku kembali, maka Anda perlu membatalkan satu atau semua antrian buku <i class="fa-solid fa-trash"></i> di <a href="?page=page/peminjaman/peminjaman">detail peminjaman</a>. 
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
                <div class="col-md-2">
                    <?php 
                        $id = $_GET['id'];
                        
                        $query = mysqli_query($koneksi, "SELECT t_buku.*, t_kategoribuku.namaKategori FROM t_buku INNER JOIN t_kategoribuku ON t_buku.kategoriID = t_kategoribuku.kategoriID WHERE bukuID=$id");
                        $data = mysqli_fetch_array($query);

                        if ($data['gambarBuku'] != null) {
                    ?>
                        <img src="./assets/img/uploaded_book/<?=$data['gambarBuku']?>" class="card-img-top shadow-lg" alt="Cover Buku <?php echo $data['judul']?>">
                    <?php } else { ?>
                        <img src="./assets/img/bookcovernotavailable.jpeg" class="card-img-top" alt="Cover Buku <?php echo $data['judul']?>">
                    <?php } ?>
                    <?php if ($_SESSION['user']['level'] != 'peminjam') {?>
                        <div class="card-footer text-muted px-0">
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
                                        <td>Cover Buku (png/jpg/jpeg)</td>
                                    </tr>
                                    <tr>
                                        <td><input type="file" class="form-control" name="file" accept=".png, .jpeg, .jpg"></td>
                                    </tr>
                                    <tr>
                                        <td><button type="submit" class="btn btn-dark mx-auto mt-2" name="upload" value="upload"><i class="fa-solid fa-upload"></i> Upload</button></td>
                                    </tr>
                                </table>
                            </form>
                        </div>
                    <?php } ?>
                </div>
                <div class="col-md-10">
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
                                        <?php if ($_SESSION['user']['level'] != 'peminjam') {?>
                                        <td width="150rem">Judul</td>
                                        <td width="1">:</td>
                                            <td>
                                                <input type="text" value="<?php echo $data['judul']; ?>" class="form-control" name="judul" id="username" data-toggle="popover" data-trigger="manual" data-content="Username harus diisi" data-placement="right">
                                            </td>
                                            <?php } else {?>
                                                
                                                    <div>
                                                        <h3 class="fs-2 pb-3 mb-3 border-bottom"><?= $data['judul']?></h3>
                                                    </div>
                                                
                                            <?php } ?>
                                    </tr>
                                    <tr>
                                        <?php if ($_SESSION['user']['level'] != 'peminjam') {?>
                                        <td>Deskripsi</td>
                                        <td>:</td>
                                        <td>
                                                <textarea class="form-control" name="deskripsi" style="height: 100px" required><?php echo $data['deskripsi']; ?></textarea>
                                            <?php } else {?>
                                                <h6>Deskripsi Buku</h6>
                                                <div class="pb-4">

                                                    <textarea class="form-control ps-0" name="deskripsi" style="height: 100px; border: none;" readonly><?=$data['deskripsi']?></textarea>
                                                </div>
                                            <?php 
                                            } ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <?php if ($_SESSION['user']['level'] != 'peminjam') {?>
                                        <td>Kategori</td>
                                        <td>:</td>
                                        <td>
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
                                            <?php } else {?>
                                                <h6>Detail Buku</h6>
                                                <div class="card border-0">
                                                    <div class="card-body p-0 pt-1">
                                                        <div class="row">
                                                            <div class="col-md-4">
                                                                <div class="text-muted">Kategori</div>
                                                                <p><?= $data['namaKategori']?></p>
                                                                <div class="text-muted">Penulis</div>
                                                                <p><?= $data['penulis']?></p>
                                                                <div class="text-muted">Penerbit</div>
                                                                <p><?= $data['penerbit']?></p>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <div class="text-muted">Tahun Terbit</div>
                                                                <p><?= $data['tahunTerbit']?></p>
                                                                <div class="text-muted">Stok</div>
                                                                <p><?= $data['stok']?></p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                            <?php } ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <?php if ($_SESSION['user']['level'] != 'peminjam') {?>
                                        <td>Penulis</td>
                                        <td>:</td>
                                        <td>
                                                <input type="text" value="<?php echo $data['penulis']; ?>" class="form-control" name="penulis">
                                            <?php }?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <?php if ($_SESSION['user']['level'] != 'peminjam') {?>
                                        <td>Penerbit</td>
                                        <td>:</td>
                                        <td>
                                                <input type="text" value="<?php echo $data['penerbit']; ?>" class="form-control" name="penerbit">
                                            <?php } ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <?php if ($_SESSION['user']['level'] != 'peminjam') {?>
                                        <td>Tahun Terbit</td>
                                        <td>:</td>
                                        <td>
                                                <input type="number" value="<?php echo $data['tahunTerbit']; ?>" class="form-control" name="tahunTerbit">
                                            <?php } ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <?php if ($_SESSION['user']['level'] != 'peminjam') {?>
                                        <td>Stok</td>
                                        <td>:</td>
                                        <td>
                                                <input type="number" value="<?php echo $data['stok']; ?>" class="form-control" name="stok">
                                            <?php } ?>
                                        </td>
                                    </tr>
                                </table>
                                <?php if ($_SESSION['user']['level'] != 'peminjam') {?>
                                    <button type="submit" class="btn btn-dark mb-3" name="edit" value="edit"><i class="fa-solid fa-floppy-disk"></i> Simpan</button>
                                    <button type="reset" class="btn btn-secondary mb-3">Reset</button>
                                    <a href="?page=page/buku/buku_hapus&&id=<?=$data['bukuID'] ?>" class="btn btn-danger mb-3">
                                        <i class="fa-solid fa-trash"></i>
                                    </a>
                                <?php } else { 
                                    if ($currentQuantity == 2) {
                                        $jmlqty2 = true;
                                    } else {
                                        $jmlqty2 = false;
                                    }
                                    ?>
                                    <a href="?page=page/peminjaman/keranjang&action=add&id=<?php echo $data['bukuID'] ?>" class="btn btn-dark <?php if ($jmlqty2 || $antri || $dipinjam) {echo 'disabled';} ?> mb-3">
                                        <i class="bi bi-bag-plus"></i> Masukkan Keranjang
                                    </a>
                                <?php } ?>
                                <a href="?page=page/buku/Daftar buku" class="btn btn-danger mb-3"><i class="fa-solid fa-right-from-bracket"></i> Kembali</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>