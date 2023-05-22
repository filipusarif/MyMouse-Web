<!-- 
MYMOUSE WEBSITE(MOUSE WEB)
Dibuat Oleh : Filipus Arif Kristiyan
Tujuan Web : Untuk memenuhi Tugas,UTS,UAS Pemrograman Web Lanjut(Semester 2)
Github : github.com/filipusarif
Dibuat : 15 Maret 2023 - 25 April 2023
File : masuk.php
-->

<?php 
    session_start();
    require "../php/fungsi.php";

    // Cek jika sudah masuk Mulai
    if(isset($_SESSION['user'])){
        header("location: ../");
        exit;
    }
    
    if(isset($_SESSION['admin'])){
        header("location: ../");
        exit;
    }
    // Cek Jika Sudah Masuk Selesai

    // isset button masuk Mulai
    if(isset($_POST['masuk'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $koneksi = konek();
        $status = "admin";

        // Cek ada username di database Mulai
        $ambil = mysqli_query($koneksi, "SELECT * FROM tbpengguna WHERE username = '$username'");
        $temp = NULL;
        if(mysqli_num_rows($ambil) === 1){
            $data = mysqli_fetch_assoc($ambil);
            $temp =$data['status'];
        }
        // Cek ada username di database selesai

        // Cek Masuk Admin / User Mulai
        if ($status == $temp) {
            if(mysqli_num_rows($ambil) === 1){
                //cek password
                if ( $data['password'] == $password ) {
                    $_SESSION['admin'] = $data['username'];
                    header("location: ../toko/index.php");
                    exit;
                } else {
                    $erorP = true;
                }
            } else {
                $erorS = true;
            }
        } else {
            if(mysqli_num_rows($ambil) === 1){
                //cek password
                if ( $data['password'] == $password ) {
                    $_SESSION['user'] = $data['username'];
                    header("location: ../toko/index.php");
                    exit;
                } else {
                    $erorP = true;
                }
            } else {
                $erorS = true;
            }
        }
        // Cek Masuk Admin / user selesai
        
    }
    // isset button masuk selesai

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/masuk.css">
    <link rel="icon" href="../gambar/miniLogo.png">
    <title>MyMouse ~ Masuk</title>
</head>

<body>
    <!-- Container Mulai -->
    <div class="container">
        <!-- Background Mouse -->
        <span class="bg"></span>

        <!-- Wrapper Masuk Mulai -->
        <form action="" method="post" class="container-log">  
            <!-- Header Mulai -->
            <div class="log">
                <a href="../">
                    <img src="../gambar/logoWeb.png" alt="Mymouse">
                </a>
                <a href="../toko/">
                    <img src="../gambar/Union.png" alt="home">
                </a>
            </div>
            <!-- Header Selesai -->

            <h1>Masuk</h1>
                
            <p>Selamat datang di MyMouse</p>
            <!-- Input Masuk Mulai -->
            <div class="div-user">
                <input type="text" name="username" id="username" required class="label">
                <span>Username</span>
            </div>
            
            <div class="div-user">
                <input type="password" name="password" id="password" required class="label">
                <span>Password</span>
            </div>

            <div class="button">
                <button type="submit" name="masuk" required>Masuk</button>
                <a href="daftar.php">Daftar</a>
            </div>
            <!-- input Masuk Selesai -->
            
            <?php 
            // Menampilkan jika salah Mulai
            if (isset($erorS)) {
                echo '                
                    <p class="alert"><img src="../gambar/icon/Warning.png" alt="">Username / Pasword salah</p>
                    ';
            } else if (isset($erorP)) {
                echo '
                    <p class="alert"><img src="../gambar/icon/Warning.png" alt="">Pasword salah</p>
                    ';
            }
            // Menampilkan jika salah Selesai
            ?>

            <!-- Watermark logo Mulai -->
            <div class="watermarkIcon">
                <a href="https://www.facebook.com/mymouseofc/" target="_blank"><img src="../gambar/facebook1.png"
                        alt=""></a>
                <a href="https://twitter.com/curvast" target="_blank"><img src="../gambar/twiter1.png" alt=""></a>
                <a href="https://www.instagram.com/mymouseofc/" target="_blank"><img src="../gambar/instagram1.png"
                        alt=""></a>
            </div>
            <!-- Watermark Logo Selesai -->

        </form>
        <!-- Wrapper Masuk Selesai -->
    </div>
    <!-- Container Selesai -->
</body>
</html>