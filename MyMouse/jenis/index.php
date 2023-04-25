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
    <link rel="stylesheet" href="../css/jenis1.css">
    <link rel="stylesheet" href="../css/navbar.css">
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <link rel="icon" href="../gambar/miniLogo.png">
    <title>MyMouse ~ Jenis</title>
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
                <li><a href="" class="hover aktif">jenis</a></li>
                <li><a href="../berita/" class="hover">berita</a></li>
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
    <a href="#product" class="keAtas"><img src="../gambar/keatas.png" alt="keatas" width="30px" height="auto"></a>



    <section id="product" class="product1">
        <!-- <img src="../gambar/effectmouse2.jpg" alt=""> -->
        <div class="contentProduct1">
            <h1>What's up <span class="blue"> Everyone</span></h1>
        </div>
    </section>
    <section id="productPage2" class="product2">
        <h1 class="jenisHead">Jenis Jenis Mouse</h1>
        <p class="jenis">Jenis Mouse terbagi menjadi 2 yaitu dengan</p>
        <h3 class="jenisPort">1. Jenis portnya</h3>


        <div class="containerPort">
            <div class="cardPort fade">
                <img class="gam" src="../gambar/serial.jpg" alt="Mouse Serial">
                <div class="ket">
                    <h1>Mouse Serial</h1>
                    <p>Mouse Serial digunakan pada komputer jaman dahulu, pada era
                        Pentium 1, Pentium 3 atau lainnya yang berjenis AT. Dilihat dari bentuknya, mouse ini
                        memiliki port serial dengan beberapa pin di ujungnya, atau yang dikenal dengan port VGA.</p>
                    <a href="../toko/" class="toToko">Toko</a>
                </div>
            </div>
            <div class="cardPort fade">
                <img class="gam" src="../gambar/ps2.jpg" alt="Mouse PS/2">
                <div class="ket">
                    <h1>Mouse PS/2</h1>
                    <p>Mouse PS2 juga merupakan jenis mouse pada era pentium 1-4 namun sampai saat ini jenis mouse PS2
                        masih digunakan meski kini penggunanya mulai sedikit saja karena saat ini telah banyak jenis
                        mouse dengan tipe dan teknologi terbaru.</p>
                    <a href="../toko/" class="toToko">Toko</a>
                </div>
            </div>
            <div class="cardPort fade">
                <img class="gam" src="../gambar/usb.jpg" alt="Mouse Usb">
                <div class="ket">
                    <h1>Mouse USB</h1>
                    <p>Saat ini mouse USB adalah jenis mouse yang paling umum dan banyak digunakan, karena Mouse ini
                        adalah jenis mouse yang sangat kompatibel untuk model tipe komputer jaman sekarang yang memiliki
                        port USB. Mouse USB ini adalah salah satu jenis mouse yang mudah digunakan.</p>
                    <a href="../toko/" class="toToko">Toko</a>
                </div>
            </div>
            <div class="cardPort fade">
                <img class="gam" src="../gambar/wireless.jpg" alt="Mouse Wireless">
                <div class="ket">
                    <h1>Mouse Wireless</h1>
                    <p>jenis mouse teknologi terbaru yang penggunaannya menggunakan fitur wireless (tanpa kabel). Dengan
                        adanya fitur wireless penggunaan mouse menjadi lebih simple dan efisien bahkan mouse ini bisa di
                        gunakan dari
                        jarak jauh.</p>
                    <a href="../toko/" class="toToko">Toko</a>
                </div>
            </div>
        </div>


        <h3 class="jenisSensor">2. Jenis sensornya</h3>
        <div class="containerSensor">
            <div class="cardPort fade">
                <img class="gam" src="../gambar/mekanikal.jpg" alt="Mouse Serial">
                <div class="ket">
                    <h1>Mouse Mekanik</h1>
                    <p> Mouse mekanik juga Disebut mouse trackball karena pada bagian bawah mouse ini terdapat sebuah
                        bola yang dapat
                        menggerakkan kursor.
                        Bola ini dapat menggerakkan kursor dengan cara bergeser dan menyambungkan ke sensor yang ada
                        pada bagian dalam mouse.</p>
                        <a href="../toko/" class="toToko">Toko</a>
                </div>
            </div>
            <div class="cardPort fade">
                <img class="gam" src="../gambar/optikal.jpg" alt="Mouse Serial">
                <div class="ket">
                    <h1>Mouse optomekanik</h1>
                    <p> Optomechanical mouse ini jenis mouse yang memiliki prinsip hampir sama dengan mechanical mouse.
                        Memiliki komponen yang mirip dengan bola dan mouse jenis ini memiliki sensor sinar yang
                        merepresentasikan posisi koordinat pointer. Kelebihan dari mouse tipe ini memiliki keakuratan
                        yang lebih tinggi jika dibandingkan dengan mechanical mouse.</p>
                        <a href="../toko/" class="toToko">Toko</a>
                </div>
            </div>
            <div class="cardPort fade">
                <img class="gam" src="../gambar/laser.jpg" alt="Mouse Usb">
                <div class="ket">
                    <h1>Mouse Optik</h1>
                    <p>Mouse Optik atau Mouse Laser yaitu menggunakan sinar laser atau sinar LED (Light Emitting Diode)
                        untuk mendeteksi pergerakan mouse.
                    </p>
                    <a href="../toko/" class="toToko">Toko</a>
                </div>
            </div>
        </div>

        <h1 class="headKel">kekurangan dan kelebihan mouse</h1>
        <div class="containerTable">
            <table class="tabelKel">
                <tr>
                    <th class="jenisTable">Jenis Mouse</th>
                    <th class="kelebihan">Kelebihan</th>
                    <th class="Kekurangan"> Kekurangan</th>
                </tr>
                <tr>
                    <td rowspan="2">Serial Mouse</td>
                    <td>Mouse jenis ini cocok digunakan pada komputer jaman dahulu seperti komputer Pentium 1, 2
                        hingga
                        3.
                    </td>
                    <td>
                        Sudah jarang ditemukan karena perkembangan teknologi yang semakin berubah.
                    </td>
                </tr>
                <tr>
                    <td>Mouse lebih rapat dan tidak mudah goyang karena banyak pin yang menempel dan adanya
                        sekrup
                        pemutar untuk mengencangkan.</td>
                    <td>
                        Harus hati-hati memasang mouse karena jika salah atau terbalik, pin di komputer akan terdorong
                        ke belakang bahkan miring dan menyebabkan tidak bisa menggunakan mouse.
                    </td>
                </tr>
                <tr>
                    <td rowspan="2">Mouse PS/2</td>
                    <td>Lebih praktis tanpa harus memutar sekrup.</td>
                    <td>Harus hati-hati karena pin-pin pada komputer akan rusak jika terdorong ke belakang atau miring
                        disebabkan kesalahan atau terbaliknya pemasangan mouse.
                    </td>
                </tr>
                <tr>
                    <td>Banyak komputer tipe dulu menggunakan mouse jenis ini terutama pada Pentium 4.</td>
                    <td>Lambat dalam menggerakkan kursor.</td>
                </tr>
                <tr>
                    <td rowspan="2">Mouse USB</td>
                    <td>Pergerakan kursor lebih tinggi.</td>
                    <td>Membutuhkan port penghubung apabila ingin menggunakan pada komputer lama.</td>
                </tr>
                <tr>
                    <td>Banyak laptop maupun komputer yang saat ini cocok dengan jenis mouse USB.</td>
                    <td> Dalam beberapa kasus, mouse mudah goyang dan lepas apabila tersenggol.</td>
                </tr>
                <tr>
                    <td rowspan="2">Mouse Wireless</td>
                    <td>Lebih simpel dan fleksibel digunakan dimana saja.</td>
                    <td>Harus mengganti baterai jika habis.</td>
                </tr>
                <tr>
                    <td>Dapat digunakan dalam jangkauan area yang luas karena tidak terikat kabel.</td>
                    <td> Harga lebih mahal.</td>
                </tr>
                <tr>
                    <td rowspan="2">Mouse Mekanik</td>
                    <td>Harga murah.</td>
                    <td>Mouse menjadi lebih berat karena adanya bola.</td>
                </tr>
                <tr>
                    <td>Awet karena kerusakannya rata-rata hanya karena bola yang kotor dan hal ini bisa dengan mudah
                        dibersihkan.</td>
                    <td>Kurangnya sensitivitas pergerakan kursor pada komputer.</td>
                </tr>
                <tr>
                    <td>Mouse Optomekanik</td>
                    <td>keakuratan yang lebih tinggi jika dibandingkan dengan mechanical mouse.</td>
                    <td>Jika terlalu kotor akan membuat bola tidak bergerak dan mouse tidak berfungsi.</td>
                </tr>
                <tr>
                    <td rowspan="2">Mouse Optik</td>
                    <td>Tingkat keakuratan lebih tinggi</td>
                    <td>Jika rusak dan bagian cahaya laser susah menyala, akan sulit memperbaikinya.</td>
                </tr>
                <tr>
                    <td>Dapat digunakan meski tanpa mousepad (alas mouse).</td>
                    <td>Cahaya laser berbahaya bagi tubuh sehingga tidak disarankan meletakkan mouse di atas telapak
                        tangan atau bagian tubuh lainnya.</td>
                </tr>
            </table>
        </div>

        <!-- <h3 class="rec">Rekomendasi</h3>
        <div class="containeritems">
            <button class="carditems"
                href="../toko/"
                data-target="#modal1"
                target="_blank">
                <img src="../gambar/laser.jpg" alt="">
                <p>
                    Logitech MX Master 2S</p>
            </button>
            <a class="carditems" href="https://fantech.id/product/mouse-gaming/mouse-gaming-xd-series/helios-xd3"
                target="_blank">
                <img src="../gambar/rec 2.jpg" alt="">
                <p>Fantech
                    Helios XD3</p>
            </a>
            <a class="carditems" href="https://rexus.id/language/en/produk/rexus-wireless-gaming-mouse-109/"
                target="_blank">
                <img src="../gambar/rec3.jpg" alt="">
                <p>Rexus Xierra RX 109</p>
            </a>
            <a class="carditems"
                href="https://www.logitech.com/en-us/products/mice/mx-vertical-ergonomic-mouse.910-005447.html"
                target="_blank">
                <img src="../gambar/rec4.jpg" alt="">
                <p>Logitech MX Vertical</p>
            </a>
            <a class="carditems" href="https://www.logitech.com/id-id/products/mice/m575-ergo-wireless-trackball.html"
                target="_blank">
                <img src="../gambar/rec5.jpg" alt="">
                <p>Logitech Ergo M575</p>
            </a>
            <a class="carditems" href="https://www.razer.com/gaming-mice/razer-deathadder-v2" target="_blank">
                <img src="../gambar/rec1.jpg" alt="">
                <p>Razer Deathadder</p>
            </a>
        </div> -->
    </section>

    <!-- footer -->

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