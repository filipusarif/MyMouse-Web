<!-- 
MYMOUSE WEBSITE(MOUSE WEB)
Dibuat Oleh : Filipus Arif Kristiyan
Tujuan Web : Untuk memenuhi Tugas,UTS,UAS Pemrograman Web Lanjut(Semester 2)
Github : github.com/filipusarif
Dibuat : 15 Maret 2023 - 25 April 2023
File : daftar.php
-->

<?php 
session_start();
require '../php/fungsi.php';

// if(isset($_SESSION['admin'])){
//     header("location: index.php");
//     exit;
// }
if(isset($_SESSION['user'])){
    header("location: ../");
    exit;
}

if(isset($_SESSION['admin'])){
    header("location: ../");
    exit;
}

if(isset($_POST['daftar'])){

    if(daftar($_POST) > 0) {
        echo '<script>
            alert("Berhasil Mendaftarkan Akun");
            </script>';
    } else {
        echo '<script>
            alert("Gagal Mendaftarkan Akun");
            </script>';
    }

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="../css/daftar.css"> -->
    <link rel="stylesheet" href="../css/masuk.css">
    <link rel="icon" href="../gambar/miniLogo.png">
    <title>MyMouse ~ Daftar</title>
</head>
<body>
    <div class="container">
    <span class="bg"></span>
        <form action="" method="post" class="container-log">
            <div class="log">
                    <a href="../">
                        <img src="../gambar/logoWeb.png" alt="Mymouse">
                    </a>
                    <a href="../toko/">
                        <img src="../gambar/Union.png" alt="home">
                    </a>
                </div>
            <h1>Daftar</h1>
            <p>Selamat datang di MyMouse</p>

            <!-- <label for="username">Username</label><br> -->
            <div class="div-user">
                <input type="text" name="username" id="username" required class="label">
                <span>Username</span>
            </div>
            <!-- <label for="password">Password</label><br> -->
            <div class="div-user">
                <input type="password" name="password" id="password" required class="label">
                <span>Password</span>
            </div>
            <div class="div-user">
                <input type="number" name="hp" id="hp" required class="label">
                <span>No HP</span>
            </div>
            <!-- <label for="email">Email</label><br> -->
            <div class="div-user">
                <input type="email" name="email" id="email" required class="label">
                <span>Email</span>
            </div>
            <div class="syarat">
                    <input type="checkbox" name="syarat" id="syarat">
                    <label for="syarat">Menyetujui kebijakan privasi</label>
                </div>
            <div class="button">
                <button type="submit" name="daftar">Daftar</button>
                <a href="masuk.php">Masuk</a>
            </div>
            <div class="watermarkIconD">
                    <a href="https://www.facebook.com/mymouseofc/" target="_blank"><img src="../gambar/facebook1.png"
                            alt=""></a>
                    <a href="https://twitter.com/curvast" target="_blank"><img src="../gambar/twiter1.png" alt=""></a>
                    <a href="https://www.instagram.com/mymouseofc/" target="_blank"><img src="../gambar/instagram1.png"
                            alt=""></a>
                </div>
        </form>
    </div>
</body>
</html>