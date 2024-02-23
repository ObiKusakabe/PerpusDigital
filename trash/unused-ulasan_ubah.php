<h1 class="mt-4">Ubah ulasan</h1>
<div class="card">
    <div class="card-body">
        <div class="row">
             <div class="col-md-12">
                 <form method="post">
                    <?php
                       $id = $_GET['id'];
                       if (isset($_POST['submit'])){
                        $id_buku = htmlspecialchars($_POST['bukuID']);
                        $id_user = htmlspecialchars($_SESSION['user']['userID']);
                        $ulasan = htmlspecialchars($_POST['ulasan']);
                        $rating = htmlspecialchars($_POST['rating']);
                       
                        $query = mysqli_query($koneksi, "UPDATE t_ulasanbuku set bukuID='$id_buku', ulasan='$ulasan', rating='$rating' WHERE ulasanID=$id");
                        if($query) {
                             echo '<script>alert("Ubah data berhasil");location.href="index.php?page=page/ulasan/ulasan";</script>';
                       }else{
                            echo '<script>alert("Ubah data gagal");</script>';
                       }
                    } 
                     $query = mysqli_query($koneksi, "SELECT*FROM t_ulasanbuku WHERE ulasanID=$id");
                     $data = mysqli_fetch_array($query);
                    ?>
                     <div class="row mb-3">
                         <div class="col-md-2">Buku</div>
                         <div class="col-md-8">
                            <select name="bukuID" class="form-control">
                                <?php
                                   $buk = mysqli_query($koneksi, "SELECT*FROM t_buku");
                                   while($buku = mysqli_fetch_array($buk)) {
                                    ?>
                                    <option <?php if($data['bukuID'] == $buku['bukuID']) echo 'selected'; ?>  value="<?php echo $buku['bukuID']; ?>"><?php echo $buku['judul'];?></option>
                                    <?php
                                   } 
                                   ?>
                                </select>
                              </div>
                             </div>

                            
                            <div class="row mb-3">
                                <div class="col-md-2">Ulasan</div>
                                <div class="col-md-8">
                                <textarea name="ulasan" rows="5" class="form-control"><?php echo $data['ulasan']; ?></textarea>
                            </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-2">Rating</div>
                                <div class="col-md-8">
                                <select name="rating" class="form-control">
                                    <?php
                                       for ($i = 1; $i<=10; $i++){
                                        ?>
                                        <option <?php if($data['rating'] == $i) echo 'selected'; ?>><?php echo $i; ?></option>
                                        <?php
                                       }
                                       ?>
                                   
                                </select>
                            </div>
                            </div>




                    <div class="row">
                        <div class="col-md-2"></div>
                        <div class="col md 8">
                        <button type="submit" class="btn btn-primary" name="submit" value="submit"><i class="fa-solid fa-floppy-disk"></i> Simpan</button>
                        <button type="reset" class="btn btn-secondary">Reset</button>
                         <a href="?page=page/ulasan/ulasan" class="btn btn-danger"><i class="fa-solid fa-right-from-bracket"></i> Kembali</a>
                        </div>
                        </div>
                 </form>
</div>
</div>
</div>
</div>

   