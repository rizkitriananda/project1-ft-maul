<?php 
require 'functions.php';

if(isset($_POST['submit'])){
    if(register($_POST) > 0 ){
        echo "<script>
                alert('user baru ditambahkan');
            </script>";
    }else {
        echo mysqli_error($koneksi);
    }
}

?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&family=Pacifico&family=Poppins:ital,wght@0,500;1,400&family=Roboto:wght@500&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="./css/login-signUp.css" />
    <title>Daftar</title>
  </head>
  <body>
    <div class="container">
      <img class="bg" src="./image/panglipuran.jpg" alt="" />
      <form class="form_container" action="" method="post">
        <div class="logo"><img style="width: 200px; height: 80px; object-fit: cover" src="./image/DESA_SIDAMULYA.png" alt="" /></div>
        <div class="title_container">
          <p class="title">Buat akun desa</p>
        </div>
        <br />
        <div class="input_container">
          <label class="input_label">Email</label>
          <input placeholder="name@gmail.id" type="email" class="input_field mail" name="email" />
        </div>
        <div class="input_container">
          <label class="input_label">Password</label>
          <input placeholder="Password" type="password" class="input_field pass" name="password" />
        </div>
        <div class="input_container">
          <label class="input_label">Konfimrnasi password</label>
          <input placeholder="Konfirmasi Password" type="password" class="input_field pass" name="password2" />
        </div>

        <a href="#masuk-ke-landing-page"
          ><button title="Sign In" type="submit" class="sign un" name="submit">
            <span>Daftar</span>
          </button></a
        >

        <!-- Masuk ke halaman login -->
        <a href="login.php" class="sign-up"> Masuk</a>
      </form>
    </div>
  </body>
</html>
