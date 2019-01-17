<?php

$data = $_POST['data'];
$identitas = $this->model->selectAnggotaId($_POST['id']);
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=".$identitas[0]['Nama']."_".$identitas[0]['jenjang']."".$identitas[0]['grade']."Excel.xls");



?>

<table>
    <tr>
        <td colspan="2">Laporan Peminjaman</td>
    </tr>
    <tr>
        <td>NIS</td>
        <td><?=$identitas[0]['nis']?></td>
    </tr>
    <tr>
        <td>Nama</td>
        <td><?=$identitas[0]['Nama']?></td>
    </tr>
    <tr>
        <td>Jurusan</td>
        <td><?=$identitas[0]['nama_jurusan']?></td>
    </tr>
    <tr>
        <td>Kelas</td>
        <td><?=$identitas[0]['jenjang']." ". $identitas[0]['grade'] ?></td>
    </tr>
    <tr>
        
    </tr>
</table>
<table border="1">
    <tr>
        <th scope="col">No</th>
        <th scope="col">ID</th>
        <th scope="col">Nama Buku</th>
        <th scope="col">Kategori</th>
        <th scope="col">Tgl Pinjam</th>
        <th scope="col">Tgl Kembali</th>
        <th scope="col">Status</th>
    </tr>
<?php
$no = 1;
 for($i = 0; $i < $data['length'];$i++) {
    ?>
    <tr>
        <td><?=$no++?></td>
        <td><?=$data[$i]['id_pinjam']?></td>
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