<?php 
session_start();

if(!isset($_SESSION['login'])){
    header("Location: login.php");
    exit;
}

require 'functions.php';


$dataDesa = query("SELECT * FROM `data-desa` ORDER BY ID DESC");



// tombol cari di klik
if(isset($_POST['cari'])){
    $dataDesa = cari($_POST['keyword']);
}
?>
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Data</title>
    <link rel="stylesheet" href="./css/penduduk-data.css" />
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&family=Pacifico&family=Poppins:ital,wght@0,500;1,400&family=Roboto:wght@500&display=swap" rel="stylesheet" />
  </head>
  <body>
    <div class="container">
      <nav>
        <img src="../image/DESA_SIDAMULYA.png" width="190px" alt="" />
        <ul>
          <li><a href="index.php">Home</a></li>
          <li><a href="#">Data Penduduk</a></li>
          <li><a href="kontak.php">Kontak</a></li>
          <button type="submit" class="out"><a href="logout.php">Log out</a></button>
        </ul>

        <div class="menu-toggle">
          <input type="checkbox" name="" id="" />
          <span></span>
          <span></span>
          <span></span>
        </div>
      </nav>

      <h1>List data</h1>
      <div class="search">
        <form action="" method="post" id="search">
          <input type="search" class="search-input" placeholder="Cari Penduduk" name="keyword" />
          <button class="search-button" type="submit" name="cari">
            <svg class="search-icon" aria-hidden="true" viewBox="0 0 24 24">
              <g>
                <path
                  d="M21.53 20.47l-3.66-3.66C19.195 15.24 20 13.214 20 11c0-4.97-4.03-9-9-9s-9 4.03-9 9 4.03 9 9 9c2.215 0 4.24-.804 5.808-2.13l3.66 3.66c.147.146.34.22.53.22s.385-.073.53-.22c.295-.293.295-.767.002-1.06zM3.5 11c0-4.135 3.365-7.5 7.5-7.5s7.5 3.365 7.5 7.5-3.365 7.5-7.5 7.5-7.5-3.365-7.5-7.5z"
                ></path>
              </g>
            </svg>
          </button>
        </form>
      </div>
      <div id="container">
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
      </div>
    </div>

    <script src="./css/javascript.js"></script>
    <script src="js/script.js"></script>
  </body>
</html>
