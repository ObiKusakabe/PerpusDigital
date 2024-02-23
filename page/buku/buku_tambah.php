<h1 class="mt-4">Tambah Buku</h1>
<div class="card">
    <div class="card-body">
        <div class="row px-3">
            <div class="col-md-4">
                <?php if (isset($data['gambarBuku'])) {?>
                    <img src="./assets/img/uploaded_book/<?=$data['gambarBuku']?>" class="card-img-top" alt="Cover Buku <?php echo $data['judul']?>">
                <?php } else { ?>
                    <img src="./assets/img/bookcovernotavailable.jpeg" class="card-img-top" alt="Cover Buku <?php echo $data['judul']?>">
                <?php } ?>
            </div>
            <div class="col-md-8">
            <form method="post" enctype="multipart/form-data">
                    <?php
                    if (isset($_POST['tambah'])) {
                        // Mendapatkan nomor terakhir dari tabel
                        $mk = mysqli_query($koneksi, "SELECT MAX(SUBSTRING(kd_buku, 3)) as max_kode FROM t_buku");
                        $row = mysqli_fetch_array($mk);
                        $max_kode = $row['max_kode'];

                        if ($max_kode == null) {
                            $new_kode = 'BK001';//kode pinjam
                        } else {
                            // Jika angka adalah 5, maka setelah diolah dengan str_pad($angka, 3, '0', STR_PAD_LEFT), hasilnya akan menjadi '005'.
                            // Jika angka adalah 25, maka hasilnya tetap '025'.
                            // Jika angka adalah 125, maka hasilnya tetap '125' (karena sudah memiliki tiga digit).
                            // Jika angka adalah 1005, maka hasilnya tetap '1005' (karena sudah memiliki lebih dari tiga digit).
                            $new_kode = 'BK' . str_pad($max_kode + 1, 3, '0', STR_PAD_LEFT);
                        }
                        $id_kategori = htmlspecialchars($_POST['id_kategori']);
                        $judul = htmlspecialchars($_POST['judul']);
                        $deskripsi = htmlspecialchars($_POST['deskripsi']);
                        $penulis = htmlspecialchars($_POST['penulis']);
                        $penerbit = htmlspecialchars($_POST['penerbit']);
                        $tahunTerbit = htmlspecialchars($_POST['tahunTerbit']);
                        $stok = htmlspecialchars($_POST['stok']);
                        $tgl_pinjam = date('Y-m-d H:i:s');
                        
                        $ekstensi_diperbolehkan	= array('png','jpg','jpeg');
	                    $namafile = $_FILES['file']['name'];
                        $x = explode('.', $namafile);
                        $ekstensi = strtolower(end($x));
                        $ukuran	= $_FILES['file']['size'];
                        $file_tmp = $_FILES['file']['tmp_name'];

                        if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
                            if($ukuran < 3044070){		
                                move_uploaded_file($file_tmp, './assets/img/uploaded_book/'.$namafile);    
                                $query = mysqli_query($koneksi, "INSERT INTO t_buku(kd_buku,gambarBuku,judul,kategoriID,deskripsi,penulis,penerbit,tahunTerbit,stok,tgl_buku_dibuat) 
                                VALUES ('$new_kode','$namafile','$judul','$id_kategori','$deskripsi','$penulis','$penerbit','$tahunTerbit','$stok','$tgl_pinjam')");

                                if($query){
                                    echo "<script>alert('TAMBAH BUKU BERHASIL.')</script>";
                                }else{
                                    echo "<script>alert('TAMBAH BUKU GAGAL')</script>";
                                }
                            }else{
                                echo "<script>alert('UKURAN FILE TERLALU BESAR, MAKSIMAL UKURAN 1 MB')</script>";
                            }
                        }else{
                            echo "<script>alert('HANYA EKSTENSI .png, .jpg DAN .jpeg YANG DI PERBOLEHKAN')</script>";
                        }
                    }
                    ?>
                    <div class="card" style="width: 30rem;">
                        <div class="card-body">
                            <table class="table">
                                <tr>
                                    <td width="150rem">Cover Buku (png/jpg/jpeg)</td>
                                    <td width="1">:</td>
                                    <td>
                                        <input type="file" class="form-control" name="file" accept=".png, .jpeg, .jpg">
                                    </td>
                                </tr>
                                <tr>
                                    <td width="150rem">Judul</td>
                                    <td width="1">:</td>
                                    <td>
                                        <input type="text" class="form-control" name="judul" required oninvalid="this.setCustomValidity('Judul tidak boleh kosong')" oninput="setCustomValidity('')">
                                    </td>
                                </tr>
                                <tr>
                                    <td>Deskripsi</td>
                                    <td>:</td>
                                    <td>
                                        <textarea class="form-control" name="deskripsi" style="height: 100px" required oninvalid="this.setCustomValidity('Deskripsi tidak boleh kosong')" oninput="setCustomValidity('')"></textarea>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Kategori</td>
                                    <td>:</td>
                                    <td>
                                        <select name="id_kategori" class="form-control">
                                            <option selected disabled>Pilih kategori</option>
                                            <?php
                                            $kat = mysqli_query($koneksi, "SELECT * FROM t_kategoribuku");
                                            while ($kategori = mysqli_fetch_array($kat)) { ?>
                                                <option value="<?php echo $kategori['kategoriID']; ?>"><?php echo $kategori['namaKategori'] ?></option>
                                            <?php } ?>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Penulis</td>
                                    <td>:</td>
                                    <td><input type="text" class="form-control" name="penulis" required oninvalid="this.setCustomValidity('Penulis tidak boleh kosong')" oninput="setCustomValidity('')"></td>
                                </tr>
                                <tr>
                                    <td>Penerbit</td>
                                    <td>:</td>
                                    <td><input type="text" class="form-control" name="penerbit" required oninvalid="this.setCustomValidity('Penerbit tidak boleh kosong')" oninput="setCustomValidity('')"></td>
                                </tr>
                                <tr>
                                    <td>Tahun Terbit</td>
                                    <td>:</td>
                                    <td><input type="number" class="form-control" name="tahunTerbit" required oninvalid="this.setCustomValidity('Tahun Terbit tidak boleh kosong')" oninput="setCustomValidity('')"></td>
                                </tr>
                                <tr>
                                    <td>Stok</td>
                                    <td>:</td>
                                    <td><input type="number" class="form-control" name="stok" required oninvalid="this.setCustomValidity('Stok tidak boleh kosong')" oninput="setCustomValidity('')"></td>
                                </tr>
                            </table>
                            <button type="submit" class="btn btn-dark" name="tambah" value="tambah"><i class="fa-solid fa-floppy-disk"></i> Simpan</button>
                            <button type="reset" class="btn btn-secondary">Reset</button>
                            <a href="?page=page/buku/Daftar buku" class="btn btn-danger"><i class="fa-solid fa-right-from-bracket"></i> Kembali</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>