<?php

$data = $_POST['data'];
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=LaporanTanggalWord.xls");



?>

<table>
    <tr>
        <td colspan="2">Laporan Peminjaman dari tanggal <?=$_POST['dari']?> sampai <?=$_POST['sampai']?></td>
    </tr>
    <tr>
        
    </tr>
</table>
<table border="1">
    <tr>
    <th scope="col">No</th>
    <th scope="col">ID</th>
    <th scope="col">NIS</th>
    <th scope="col">Nama Murid</th>
    <th scope="col">Nama Buku</th>
    <th scope="col">Kategori</th>
    <th scope="col">Tgl Pinjam</th>
    <th scope="col">Tgl Kembali</th>
    <th scope="col">Status</th>
    </tr>
<?php
$no = 1;
for($i= 0; $i<$data['length']; $i++) {
    ?>
    <tr>
        <td><?=$no++?></td>
        <td><?=$data[$i]['id_pinjam']?></td>
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