<?php
    $data = $_POST['data'];
    $kelas = $_POST['kelas'];
    $kelasw = str_replace(' ', '_', $kelas);
    header("Content-type: application/vnd-ms-excel");
    header("Content-Disposition: attachment; filename=LaporanKelas".$kelasw.".xls");
?>
<html>

<body>
    <table>
        <tr>
            <td colspan="2">Laporan Peminjaman Perkelas</td>
        </tr>
        <tr>
            <td>Kelas</td>
            <td><?=$kelas?></td>
        </tr>
    </table><br/><br/>

    <table border="1">
        <tr>
            <th>#</th>
            <th>NIS</th>
            <th>Nama</th>
            <th>Nama Buku</th>
            <th>Kategori</th>
            <th>Tanggal Pinjam</th>
            <th>Tanggal Kembali</th>
            <th>Status</th>
        </tr>

        <?php
            $no = 0;
            for ($i=0; $i <$data['length'] ; $i++) { 
                $no++;
                ?>

                <tr>
                    <td><?=$no?></td>
                    <td><?=$data[$i]['nis']?></td>
                    <td><?=$data[$i]['Nama']?></td>
                    <td><?=$data[$i]['nama_buku']?></td>
                    <td><?=$data[$i]['nama_jenis']?></td>
                    <td><?=date('d/m/Y', strtotime($data[$i]['tanggal_pinjam']))?></td>
                    <td><?=date('d/m/Y', strtotime($data[$i]['tanggal_kembali']))?></td>
                    <td><?=$data[$i]['nama_status']?></td>
                </tr>

                <?php
            }
        ?>
    </table>
</body>
</html>