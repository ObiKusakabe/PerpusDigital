<style>
    * {
        font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif;
    }
    .even-row {
        background-color: rgb(218, 220, 224); /* Set the background color for even rows */
    }
</style>
<link rel="stylesheet" href="css/personal.css">
<link href="../assets/img/whitebookLOGO.png" rel="icon">
<img src="../assets/img/whitebookLOGO.png" width="30px" style="border-radius: 80%">  Perpus Digital
<h2 align="center">Laporan Peminjaman Buku</h2>

<table class="table table-bordered" border="1" cellspacing="0" cellpadding="5" width="100%">
    <thead>
        <tr>
            <th width="1">No</th>
            <th width="1">Kode Pinjam</th>
            <th width="1">Kode Buku</th>
            <th>User</th>
            <th>Buku</th>
            <th>Tanggal Pinjam</th>
            <th>Tanggal Kembali</th>
            <th>Max Tanggal Kembali</th>
            <th>Status Peminjaman</th>
        </tr>
    </thead>
    
    <?php
        $koneksi = mysqli_connect("localhost", "id21904754_roby", "@c4tchm31fy0uc4N", "id21904754_db_perpusroby");
        $i = 1;
        $query = mysqli_query($koneksi, "SELECT * FROM t_peminjaman 
                                            LEFT JOIN t_user ON t_user.userID = t_peminjaman.userID 
                                            LEFT JOIN t_buku ON t_buku.bukuID = t_peminjaman.bukuID 
                                            WHERE t_peminjaman.statusPeminjaman IN ('dipinjam', 'dikembalikan')");
                                           
        while ($data = mysqli_fetch_array($query)) {
            $rowClass = ($i % 2 == 0) ? 'even-row' : '';
    ?>
    <tbody class="<?php echo $rowClass; ?>">
        <tr class="<?php echo $rowClass; ?>">
            <td><?php echo $i++; ?></td>
            <td><?php echo $data['kodePinjam']; ?></td>
            <td><?php echo $data['kd_buku']; ?></td>
            <td><?php echo $data['namaLengkap']; ?></td>
            <td><?php echo $data['judul']; ?></td>
            <td><?php echo $data['tgl_peminjaman']; ?></td>
            <td><?php echo $data['tgl_pengembalian']; ?></td>
            <td><?php echo $data['maxtgl_pengembalian']; ?></td>
            <?php if ($data['statusPeminjaman'] == 'dipinjam') {
                $kelasWarna = 'text-warning';
            } else if ($data['statusPeminjaman'] == 'dikembalikan') {
                $kelasWarna = 'text-success';
            }?>
            <td class="<?php echo $kelasWarna;?>"><?php echo $data['statusPeminjaman']; ?></td> 
        </tr>
    </tbody>
    <?php
        }
    ?>
</table>
<script>
    window.print();
    setTimeout(function() {
        window.close();
    }, 500);
</script>
