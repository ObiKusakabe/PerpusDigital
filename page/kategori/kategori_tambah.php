<h1 class="mt-4">Tambah Kategori</h1>
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                <form method="post">
                    <?php
                    if (isset($_POST['submit'])) {
                        $kategori = htmlspecialchars($_POST['kategori']);
                        
                        $cekDuplikasi = mysqli_fetch_array(mysqli_query($koneksi, "SELECT namaKategori FROM t_kategoribuku WHERE namaKategori = '$kategori'"));
                        if ($cekDuplikasi > 0) {
                            echo "<script>alert('Terdapat nama kategori yang sama, silahkan coba nama kategori yang lain.');</script>";
                        } else {
                            $query = mysqli_query($koneksi, "INSERT INTO t_kategoribuku(namaKategori) VALUES ('$kategori')");
                            echo "<script>alert('Tambah Kategori Berhasil')</script>";
                        }
                    }
                    ?>
                    <div class="row mb-3">
                        <div class="col-md-2">Nama Kategori</div>
                        <div class="col-md-8"><input type="text" class="form-control" name="kategori" required oninvalid="this.setCustomValidity('Nama Kategori tidak boleh kosong')" oninput="setCustomValidity('')" autofocus></div>
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