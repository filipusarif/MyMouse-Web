<!-- 
MYMOUSE WEBSITE(MOUSE WEB)
Dibuat Oleh : Filipus Arif Kristiyan
Tujuan Web : Untuk memenuhi Tugas,UTS,UAS Pemrograman Web Lanjut(Semester 2)
Github : github.com/filipusarif
Dibuat : 15 Maret 2023 - 25 April 2023
File : Index.php
-->

<?php 
session_start();
require '../php/fungsi.php';
$user = "Tamu";
$role = "Pengunjung";
if(isset($_SESSION['user'])) {
    $user = $_SESSION['user'];
    $role = "Pengguna";
} else if(isset($_SESSION['admin'])) {
    $user = $_SESSION['admin'];
    $role = "Admin";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/berita1.css">
    <link rel="stylesheet" href="../css/navbar.css">
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <link rel="icon" href="../gambar/miniLogo.png">
    <title>MyMouse ~ Berita</title>
</head>

<body>
    <!-- Header -->
    <header class="container">
        <a href="../" class="logo">
            <img class="logo" src="../gambar/logoWeb.png" alt="Mymouse" width="180px">
        </a>
        <nav class="">
            <ul class="navigation ">
                <li><a href="../" class="hover" >beranda</a></li>
                <li><button id="btnDrop1" class="hover">Tetikus</button>
                    <ul class="dropdown1" id="drop1">
                        <li><a href="../#definitionPage">pengertian</a></li>
                        <li><a href="../#historyPage">sejarah</a></li>
                        <li><a href="../#functionPage">Fungsi</a></li>
                    </ul>
                </li>
                <li><a href="../jenis/" class="hover">jenis</a></li>
                <li><a href="" class="hover aktif">berita</a></li>
                <li><button onclick="btnTetikus()" id="btnDrop2" class="hover">Kontak</button>
                    <ul class="dropdown2" id="drop2">
                        <li><a href="https://www.facebook.com/mymouseofc/" target="_blank">Facebook</a></li>
                        <li><a href="https://twitter.com/curvast" target="_blank">Twiter</a></li>
                        <li><a href="https://www.instagram.com/mymouseofc/" target="_blank">Instagram</a></li>
                        <li><a href="https://github.com/filipusarif" target="_blank">GitHub</a></li>
                        <li><a href="https://discord.gg/TRsCsN86mB" target="_blank">Discord</a></li>
                        <li><a href="https://www.linkedin.com/in/filipus-arif-kristiyan/" target="_blank">linkedin</a>
                        </li>
                    </ul>
                </li>
                <li class="toko"><a href="../toko/">toko</a></li>
            </ul>
        </nav>
        <div class="container-profile">
        <a href="../toko/" class="shop"><img class="shopLogo" src="../gambar/Union.png" alt="" width="30px"><p id="notif" class="notifikasi"></p></a>
        <div class="profil">
                <button onclick="btnTetikus()" id="btnDrop3" class="prof">
                    <?php 
                    $temp = mysqli_fetch_assoc(ambilAkun($user));
                    if(isset($_SESSION['user'])) {
                        echo '
                        <img src="../gambar/pp/'.$temp['profil'].'" alt="" title="'. $user.'">
                        ';
                    } else if(isset($_SESSION['admin'])) {
                        echo '
                        <img src="../gambar/pp/'.$temp['profil'].'" alt="" title="'. $user .'">
                        ';
                    } else {
                        echo '
                        <img src="../gambar/pp/profile.jpeg" alt="" title="Pengunjung">
                        ';
                    }
                    ?>
                </button>
                <ul class="dropdown3" id="drop3">
                <?php 
                    if(isset($_SESSION['user'])) {
                        echo '
                        <li><img src="../gambar/pp/'.$temp['profil'].'" alt="" class="pp" title="'. $user.'"></li>
                        ';
                    } else if(isset($_SESSION['admin'])) {
                        echo '
                        <li><img src="../gambar/pp/'.$temp['profil'].'" alt="" class="pp" title="'. $user .'"></li>
                        ';
                    } else {
                        echo '
                        <li><img src="../gambar/pp/profile.jpeg" alt="" class="pp" title="Tamu"></li>
                        ';
                    }
                    ?>
                    <li class="ketStatus"><h1><?= $user ?> </h1>
                    <p>-----------------</p>
                    <p><?= $role ?></p></li>
                    <?php 
                    if(isset($_SESSION['user'])) {
                        echo '
                        <li><a href="../akun/" class="tip"><img src="../gambar/icon/User.png" alt="">Kelola Akun</a></li>
                        <li><a href="../toko/pesanan.php" class="tip"><img src="../gambar/icon/Shopping_Bag.png" alt="">Pesanan</a></li>
                        ';
                        ?>
                        <li><a href="../akun/keluar.php" class="tip" onclick="return confirm('Apakah anda yakin ingin keluar?')" type="button"><img src="../gambar/icon/Exit.png" alt="">Keluar</a></li>
                    <?php
                    } else if(isset($_SESSION['admin'])) {
                        echo '
                        <li><a href="../toko/admin.php" class="tip"><img src="../gambar/icon/Eye.png" alt="">Halaman Admin</a></li>
                        <li><a href="../akun/" class="tip"><img src="../gambar/icon/User.png" alt="">Kelola Akun</a></li>
                        <li><a href="../toko/pesanan.php" class="tip"><img src="../gambar/icon/Shopping_Bag.png" alt="">Pesanan</a></li>
                        ';
                        ?>
                        <li><a href="../akun/keluar.php" class="tip" onclick="return confirm('Apakah anda yakin ingin keluar?')" type="button"><img src="../gambar/icon/Exit.png" alt="">Keluar</a></li>
                    <?php
                    } else {
                        echo '
                        <li><a href="../akun/masuk.php" class="tip"><img src="../gambar/icon/Enter.png" alt="">Masuk</a></li>
                        <li><a href="../akun/daftar.php" class="tip"><img src="../gambar/icon/User_Add.png" alt="">Daftar</a></li>
                        ';
                    }
                    ?>
                </ul>
            </div>
        </div>
        <div class="hamburger">
            <input type="checkbox" name="" id="">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </header>
    <!-- header End -->

    <a href="#news" class="keAtas"><img src="../gambar/keatas.png" alt="keatas" width="30px" height="auto"></a>


    <section id="news" class="newsPage1">
        <h1 class="newsHeader">berita</h1>
        <div class="containerAll">
            <div class="containerNews">

                <div class="newsCard2">
                    <video width="100%" controls>
                        <source src="../gambar/News2.mp4" type="video/mp4">
                    </video>
                    <h4>Logitech Pop Mouse: Muncul Dengan Warna dan Emoji mencolok | The Gadgets 360 show</h4>
                </div>
                <div class="newsCard">
                    <a href="https://www.liputan6.com/disabilitas/read/4430079/perusahaan-ini-meluncurkan-mouse-komputer-khusus-untuk-anak-disabilitas"
                        target="_blank">
                        <img src="../gambar/news1.jpg" alt="" width="95%">
                        <h4>Perusahaan Ini Meluncurkan Mouse Komputer Khusus untuk Anak Disabilitas</h4>
                    </a>
                </div>

                <div class="newsCard">
                    <a href="https://inet.detik.com/review-produk/d-6135612/review-logitech-mx-master-3s-mouse-premium-yang-pendiam"
                        target="_blank">
                        <img src="../gambar/news2.jpeg" alt="mouse logitech MX Master 3S">
                        <h4>Review Logitech MX Master 3S, Mouse Premium yang Pendiam</h4>
                    </a>
                </div>

                <div class="newsCard">
                    <a href="https://inet.detik.com/review-produk/d-6096786/review-logitech-lift-mouse-vertikal-yang-unik"
                        target="_blank">
                        <img src="../gambar/news3.jpeg" alt="Mouse Logitech Lift">
                        <h4>Review Logitech Lift, Mouse Vertikal yang Unik</h4>
                    </a>
                </div>
                <div class="newsCard">
                    <a href="https://techno.okezone.com/read/2022/08/15/57/2647968/7-cara-sederhana-atasi-masalah-pada-wireless-mouse-dijamin-ampuh"
                        target="_blank">
                        <img src="../gambar/news4.jpeg" alt="Mouse Wireless">
                        <h4>7 Cara Sederhana Atasi Masalah pada Wireless Mouse, Dijamin Ampuh</h4>
                    </a>
                </div>

                <div class="newsCard">
                    <a href="https://techno.okezone.com/read/2022/10/17/326/2688572/6-mouse-gaming-terbaik-dari-razer-viper-ultimate-hingga-hyperx-pulsefire-haste"
                        target="_blank">
                        <img src="../gambar/news5.jfif" alt="Mouse Gaming">
                        <h4>6 Mouse Gaming Terbaik, dari Razer Viper Ultimate hingga HyperX Pulsefire Haste</h4>
                    </a>
                </div>

                <div class="newsCard">
                    <a href="https://www.liputan6.com/tekno/read/4858892/logitech-signature-m650-mouse-nirkabel-senyap-yang-ramah-lingkungan"
                        target="_blank">
                        <img src="../gambar/news6.jpg" alt="Logitech Signature M650">
                        <h4>Logitech Signature M650, Mouse Nirkabel Senyap yang Ramah Lingkungan</h4>
                    </a>
                </div>
                <div class="newsCard">
                    <a href="https://www.liputan6.com/tekno/read/3182791/setelah-35-tahun-microsoft-akhirnya-luncurkan-mouse-baru"
                        target="_blank">
                        <img src="../gambar/news7.jpg" alt="Microsoft">
                        <h4>Setelah 35 Tahun, Microsoft Akhirnya Luncurkan Mouse Baru</h4>
                    </a>
                </div>
                <div class="newsCard">
                    <a href="https://www.liputan6.com/tekno/read/3012348/lagi-logitech-rilis-mouse-untuk-kontrol-dua-perangkat-sekaligus"
                        target="_blank">
                        <img src="../gambar/news8.jpg" alt="Logitech ">
                        <h4>Lagi, Logitech Rilis Mouse untuk Kontrol Dua Perangkat Sekaligus</h4>
                    </a>
                </div>
            </div>
        </div>

    </section>

    <footer id="footerHome">
        <div class="containerFoot">
            <ul class="footMenu">
                <li><a href="../"><img src="../gambar/logoWeb.png" alt="MyMouse" width="150px"></a></li>
                <li><a href="../#homePage">beranda</a></li>
                <li><a href="../#definitionPage">tetikus</a></li>
                <li><a href="../jenis/">jenis</a></li>
                <li><a href="../berita/">berita</a></li>
            </ul>
            <ul class="refrensi">
                <li>
                    <h3>refrensi</h3>
                </li>
                <li><a href="https://www.w3schools.com/" target="_blank">w3schools</a></li>
                <li><a href="https://stackoverflow.com/" target="_blank">stack overflow</a></li>
                <li><a href="https://html.com/" target="_blank">html.com</a></li>
            </ul>
            <ul>
                <li>
                    <h3>created by</h3>
                </li>
                <li>
                    <p>filipus arif kristiyan</p>
                </li>
                <li>
                    <p>a11.2022.14278</p>
                </li>
                <li>
                    <p>a11.4107</p>
                </li>
                <li>
                    <p>teknik informatika</p>
                </li>
            </ul>
        </div>
        <div class="footSosmed">
            <a href="https://www.facebook.com/mymouseofc/" target="_blank"><img src="../gambar/sosmed/facebook.png"
                    alt="fb"></a>
            <a href="https://twitter.com/curvast" target="_blank"><img src="../gambar/sosmed/twitter.png" alt="twr"></a>
            <a href="https://www.instagram.com/mymouseofc/" target="_blank"><img src="../gambar/sosmed/instagram.png"
                    alt="ig"></a>
            <a href="https://github.com/filipusarif" target="_blank"><img src="../gambar/sosmed/github.png"
                    alt="gt"></a>
            <a href="https://discord.gg/TRsCsN86mB" target="_blank"><img src="../gambar/sosmed/discord.png"
                    alt="dc"></a>
            <a href="https://www.linkedin.com/in/filipus-arif-kristiyan/" target="_blank"><img
                    src="../gambar/sosmed/linkedin.png" alt="li"></a>
        </div>
    </footer>
    <script src="../javascript/slider.js"></script>
    <script src="../javascript/notifikasi.js"></script>
    <script src="../javascript/dropdown.js" ></script>
    <script src="../javascript/main.js"></script>
</body>

</html>