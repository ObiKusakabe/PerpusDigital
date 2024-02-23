<h1 class="mt-4">Ubah Kategori</h1>
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                <form method="post">
                    <?php
                    $id = $_GET['id'];
                    if (isset($_POST['submit'])) {
                        $kategori = htmlspecialchars($_POST['kategori']);
                        $query = mysqli_query($koneksi, "UPDATE t_kategoribuku SET namaKategori='$kategori' WHERE kategoriID=$id");

                        if ($query) {
                            echo "<script>alert('Ubah Data Kategori Berhasil')</script>";
                        } else {
                            echo "<script>alert('Ubah Data Kategori Gagal')</script>";
                        }
                    }
                    $query = mysqli_query($koneksi, "SELECT * FROM t_kategoribuku WHERE kategoriID=$id");
                    $data = mysqli_fetch_array($query);
                    ?>
 
                    <div class="row mb-3">
                        <div class="col-md-2">Nama Kategori</div>
                        <div class="col-md-8"><input type="text" class="form-control" name="kategori" value="<?php echo $data['namaKategori'] ?>"></div>
                    </div>
                    <div class="row">
                        <div class="col-md-2"></div>
                        <div class="col-md-8">
                            <button type="submit" class="btn btn-dark" name="submit" value="submit"><i class="fa-solid fa-floppy-disk"></i> Simpan</button>
                            <button type="reset" class="btn btn-secondary">Reset</button>
                            <a href="?page=page/kategori/kategori" class="btn btn-danger"><i class="fa-solid fa-right-from-bracket"></i> Kembali</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>