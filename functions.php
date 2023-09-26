<?php 

// koneksi ke database
$koneksi = mysqli_connect("localhost", "root", "", "project-ft-maul");

// query untuk menampilkan data
function query ($query) {
    global $koneksi;
    $result = mysqli_query($koneksi, $query);
    $rows = [];
    while( $row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;

    }
    return $rows;
}


// login register
function register($data){
    global $koneksi;

    $email = strtolower(stripslashes($data['email']));
    $password = mysqli_real_escape_string($koneksi, $data['password']);
    $password2 = mysqli_real_escape_string($koneksi, $data['password2']);

    // ccek username sudah ada atau belum
   $result =  mysqli_query($koneksi, "SELECT email FROM users 
                WHERE email = '$email'");
    if(mysqli_fetch_assoc($result)){
        echo "<script>
                alert('email sudah terdaftar');
            </script>";
        return false;
    }

    // cek konfirmasi password
    if($password !== $password2){
        echo "<script>
                alert('konfirmasi password tidak sesuai');
            </script>";
        return false;
    }

    // enkripsi password
    $password =  password_hash($password, PASSWORD_DEFAULT);

    // tambahkan userbaru ke databe
    mysqli_query($koneksi, "INSERT INTO users (email, password) 
                VALUES
                ('$email','$password')");

    // untuk menghasilkan angka 1 untuk berhasil 
    return mysqli_affected_rows($koneksi);
}


// search
function cari($keyword){
    $query = "SELECT * FROM `data-desa`
                WHERE
                nama LIKE '%$keyword%' OR
                gender LIKE '%$keyword%' OR
                NIK LIKE '%$keyword%' OR
                TTL LIKE '%$keyword%' OR
                alamat LIKE '%$keyword%' 
            ";
    return query($query);
}


// pesan
function pesan($data){
    global $koneksi;
    // ambil data dari tiap elemen form
    $nama = $data['nama'];
    $email = htmlspecialchars($data['email']);
    $isiPesan = htmlspecialchars($data['isiPesan']);

        // query insert date 
    $query = "INSERT INTO pesan (nama, email, isiPesan) 
                VALUES
                ('$nama', '$email', '$isiPesan')";
    mysqli_query($koneksi, $query);

    return mysqli_affected_rows($koneksi);
}

