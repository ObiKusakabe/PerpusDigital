<h1 class="mt-4">Kategori Buku</h1>
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                <a href="?page=page/kategori/kategori_tambah" class="btn btn-dark mb-3"><i class="fa-solid fa-plus"></i> Tambah Kategori</a>
                <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th width="1" >No</th>
                            <th>Nama Kategori</th>
                            <th width="130rem">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        $i = 1;
                        $query = mysqli_query($koneksi, "SELECT * FROM t_kategoribuku");
                        while ($data = mysqli_fetch_array($query)) {
                    ?>
                        <tr>
                            <td align="center"><?php echo $i++; ?></td>
                            <td><?php echo $data['namaKategori']; ?></td>
                            <td>
                                <a href="?page=page/kategori/kategori_ubah&&id=<?php echo $data['kategoriID']; ?>" class="btn btn-success">
                                    <i class="fas fa-fw fa-edit"></i> Ubah
                                </a>
                                <a onclick="return confirm('Apakah Anda yakin ingin menghapus kategori (<?php echo $data['namaKategori'] ?>)? ')" href="?page=page/kategori/kategori_hapus&&id=<?php echo $data['kategoriID']; ?>" class="btn btn-danger">
                                    <i class="fa-solid fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                    <?php
                        }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>