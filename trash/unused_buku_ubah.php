<h1 class="mt-4">Buku</h1>
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                <form method="post">
                    <?php
                    $id = $_GET['id'];
                    if (isset($_POST['submit'])) {
                        $id_kategori = htmlspecialchars($_POST['id_kategori']);
                        $judul = htmlspecialchars($_POST['judul']);
                        $deskripsi = htmlspecialchars($_POST['deskripsi']);
                        $penulis = htmlspecialchars($_POST['penulis']);
                        $penerbit = htmlspecialchars($_POST['penerbit']);
                        $tahunTerbit = htmlspecialchars($_POST['tahunTerbit']);
                        $query = mysqli_query($koneksi, "UPDATE t_buku SET kategoriID='$id_kategori', judul='$judul', deskripsi='$deskripsi', penulis='$penulis', penerbit='$penerbit', tahunTerbit='$tahunTerbit' WHERE bukuID='$id'");
                        if ($query) {
                            echo "<script>alert('Ubah Data Buku Berhasil')</script>";
                        } else {
                            echo "<script>alert('Ubah Data Buku Gagal')</script>";
                        }
                    }
                    $query = mysqli_query($koneksi, "SELECT * FROM t_buku WHERE bukuID=$id");
                    $data = mysqli_fetch_array($query);
                    ?>
 
                    <div class="row mb-3">
                        <div class="col-md-2">Kategori</div>
                        <div class="col-md-8">
                            <select name="id_kategori" class="form-control">
                                <option selected disabled>Pilih kategori</option>
                                <?php
                                $kat = mysqli_query($koneksi, "SELECT * FROM t_kategoribuku");
                                while ($kategori = mysqli_fetch_array($kat)) {
                                ?>
                                    <option <?php if($kategori['kategoriID'] == $data['kategoriID']) echo 'selected'; ?> value="<?php echo $kategori['kategoriID']; ?>"><?php echo $kategori['namaKategori']; ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-2">Judul</div>
                        <div class="col-md-8"><input type="text" value="<?php echo $data['judul']; ?>" class="form-control" name="judul"></div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-2">Deskripsi</div>
                        <div class="col-md-8">
                        <textarea class="form-control" name="deskripsi" placeholder="" id="floatingTextarea2" style="height: 100px" required><?php echo $data['deskripsi']; ?></textarea>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-2">Penulis</div>
                        <div class="col-md-8"><input type="text" value="<?php echo $data['penulis']; ?>" class="form-control" name="penulis"></div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-2">Penerbit</div>
                        <div class="col-md-8"><input type="text" value="<?php echo $data['penerbit']; ?>" class="form-control" name="penerbit"></div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-2">Tahun terbit</div>
                        <div class="col-md-8"><input type="number" value="<?php echo $data['tahunTerbit']; ?>" class="form-control" name="tahunTerbit"></div>
                    </div>
                    <div class="row">
                        <div class="col-md-2"></div>
                        <div class="col-md-8">
                            <button type="submit" class="btn btn-primary" name="submit" value="submit"><i class="fa-solid fa-floppy-disk"></i> Simpan</button>
                            <button type="reset" class="btn btn-secondary">Reset</button>
                            <a href="?page=page/buku/buku" class="btn btn-danger">Kembali</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>