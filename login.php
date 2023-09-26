<?php 
session_start();

require 'functions.php';

if(isset($_SESSION['login'])){
    header("Location: index.php"); 
    exit;
}

if(isset($_POST['login'])){

    $email = $_POST['email'];
    $password = $_POST['password'];

    $result = mysqli_query($koneksi, "SELECT * FROM users WHERE
                email = '$email'");

    // cek email
    if(mysqli_num_rows($result) === 1){

        // cek password
        $row = mysqli_fetch_assoc($result);
        if(password_verify($password, $row['password'])){
            // set session
            $_SESSION['login'] = true;

            header("Location: index.php");
            exit;
        }

    }
    $error = true;
}

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&family=Pacifico&family=Poppins:ital,wght@0,500;1,400&family=Roboto:wght@500&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="./css/login-signUp.css" />
    <title>Login</title>
  </head>
  <body>
    <div class="container">
      <img class="bg" src="./image/panglipuran.jpg" alt="" />
      <form class="form_container" method="post">
        <div class="logo"><img style="width: 200px; height: 80px; object-fit: cover" src="./image/DESA_SIDAMULYA.png" alt="" /></div>
        <div class="title_container">
          <p class="title">Masuk dengan akun desa</p>
        </div>
        <br />
        <div class="input_container">
          <label class="input_label">Email</label>
          <input placeholder="name@gmail.id" type="email" class="input_field mail" name="email"/>
        </div>
        <div class="input_container">
          <label class="input_label">Password</label>
          <input placeholder="Password" type="password" class="input_field pass" name="password"/>
        </div>
        <a href=""> 
        <button title="Sign In" type="submit" class="sign in" name="login">Masuk</button>
        </a>
        <a class="login" href="signUp.php">Daftar</a>
      </form>
    </div>
  </body>
</html>
