<h1 class="mt-4">Tambah Ulasan</h1>
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                <form method="post">
                    <?php
                    if (isset($_POST['submit'])) {
                        $id_buku = htmlspecialchars($_POST['id_buku']);
                        $id_user = htmlspecialchars($_SESSION['user']['userID']);
                        $ulasan = htmlspecialchars($_POST['ulasan']);
                        $rating = htmlspecialchars($_POST['rating']);
                        $query = mysqli_query($koneksi, "INSERT INTO t_ulasanbuku(userID, bukuID, ulasan, rating) VALUES ('$id_user', '$id_buku', '$ulasan', '$rating')");
                        if ($query) {
                            echo "<script>alert('Memberi Ulasan Berhasil')</script>";
                        } else {
                            echo "<script>alert('Memberi Ulasan Gagal')</script>";
                        }
                    }
                    ?>
 
                    <div class="row mb-3">
                        <div class="col-md-2">Buku</div>
                        <div class="col-md-8">
                            <select name="id_buku" class="form-control">
                                <option selected disabled>Pilih buku</option>
                                <?php
                                $buk = mysqli_query($koneksi, "SELECT * FROM t_buku ORDER BY judul ASC");
                                while ($buku = mysqli_fetch_array($buk)) {
                                ?>
                                    <option value="<?php echo $buku['bukuID']; ?>"><?php echo $buku['judul']; ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-2">Ulasan</div>
                        <div class="col-md-8">
                        <textarea class="form-control" name="ulasan" placeholder="" id="floatingTextarea2" style="height: 100px" required oninvalid="this.setCustomValidity('Ulasan tidak boleh kosong')" oninput="setCustomValidity('')"></textarea>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-2">Rating</div>
                        <div class="col-md-8">
                            <select class="form-select" name="rating">
                                <option selected disabled>Pilih rating</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                                <option value="10">10</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-2"></div>
                        <div class="col-md-8">
                            <button type="submit" class="btn btn-dark mb-3" name="submit" value="submit"><i class="fa-solid fa-floppy-disk"></i> Simpan</button> 
                            <button type="reset" class="btn btn-secondary mb-3">Reset</button>
                            <a href="?page=page/ulasan/ulasan" class="btn btn-danger mb-3"><i class="fa-solid fa-right-from-bracket"></i> Kembali</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>