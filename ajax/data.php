<?php 

require '../functions.php';

$keyword = $_GET['keyword'];

$query = "SELECT * FROM `data-desa`
                WHERE
                nama LIKE '%$keyword%' OR
                gender LIKE '%$keyword%' OR
                NIK LIKE '%$keyword%' OR
                TTL LIKE '%$keyword%' OR
                alamat LIKE '%$keyword%' 
                #LIKE dan tambah % agar pencarian flexibel
            ";
$dataDesa = query($query);

?>

 <table class="data-penduduk">
        <tr>
          <th>No</th>
          <th>Nama</th>
          <th>Gender</th>
          <th>NIK</th>
          <th>TTL</th>
          <th>Alamat</th>
        </tr>
        <?php $i = 1; ?>
        <?php foreach( $dataDesa as $row ) : ?>
        <tr>
          <td data-th="No"><?= $i; ?></td>
          <td data-th="Nama"><?= $row['nama']; ?></td>
          <td data-th="Gender"><?= $row['gender']; ?></td>
          <td data-th="NIK"><?= $row['NIK']; ?></td>
          <td data-th="TTL"><?= $row['TTL']; ?></td>
          <td data-th="Alamat"><?= $row['alamat']; ?></td>
        </tr>
        <?php $i++; ?>
        <?php endforeach; ?>
      </table> 