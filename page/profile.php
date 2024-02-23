<h1 class="mt-4">Profile</h1>
                        <?php 
                        $id=$_SESSION['user']['userID'];
                        $data = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM t_user WHERE userID='$id'")); 

                        //Membuat objek DateTime baru. 
                        //Menggunakan metode dari kelas DateTime agar dapat memformat ulang si urutan tanggal.
                        $tgl = new DateTime($data['tgl_akun_dibuat']);
                        $tgl_yg_diformat = $tgl->format('d-m-Y');
                        ?>
                        <div class="card">
                            <div class="card-body">
                                <table class="table">
                                    <tr>
                                        <td width="150">Nama</td>
                                        <td width="1">:</td>
                                        <td><?php echo $_SESSION['user']['namaLengkap']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Level User</td>
                                        <td width="1">:</td>
                                        <td><?php echo $_SESSION['user']['level']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Email</td>
                                        <td width="1">:</td>
                                        <td><?php echo $data['email']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>No. Telepon</td>
                                        <td width="1">:</td>
                                        <td><?php echo $data['telp']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Alamat</td>
                                        <td width="1">:</td>
                                        <td><?php echo $data['alamat']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Tanggal Daftar</td>
                                        <td width="1">:</td>
                                        <td><?php echo $tgl_yg_diformat;?></td>
                                    </tr>
                                </table>
                                
                            <a href="javascript:history.back()" class="btn btn-danger"><i class="fa-solid fa-right-from-bracket"></i> Kembali</a>
                            </div>
                        </div>