<?php

header("Content-type: application/vnd.msword");
header("Content-Disposition: attachment; filename=LaporanBukuKategori.doc");

$id = $_GET['id'];
$opts = array( 'http'=>array( 'method'=>"GET",
    'header'=>"Accept-language: en\r\n" .
    "Cookie: ".session_name()."=".session_id()."\r\n" ) );
$context = stream_context_create($opts);
session_write_close();   // this is the key
$data = json_decode(file_get_contents('http://localhost/Perpustakaan/buku/tampilBuku', false, $context));


?>

<table>
    <tr>
        <td colspan="5">Laporan Buku</td>
    </tr>
    <tr>
        
    </tr>
</table>
<table border="1">
    <tr>
    <th scope="col">No</th>
    <th scope="col">ID</th>
    <th scope="col">Nama</th>
    <th scope="col">Kategori</th>
    <th scope="col">Jumlah</th>
    <th scope="col">Pinjam</th>
    <th scope="col">Tanggal Masuk</th>
    </tr>
<?php
$no = 1;
foreach ($data as $v) {
    if ($id == $v->id_jenis) {
        # code...
    
    ?>
    <tr>
        <td><?=$no++?></td>
        <td><?=$v->id_buku?></td>
        <td><?=$v->nama_buku?></td>
        <td><?=$v->nama_jenis?></td>
        <td><?=$v->jumlah_buku?></td>
        <td><?=$v->jumlah_pinjam?></td>
        <td><?=$v->tanggal_masuk?></td>
    </tr>
    <?php
    }
}
?>
</table>