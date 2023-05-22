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
require "../php/fungsi.php";

$user = "Tamu";
$role = "Pengunjung";
// cek Session User Mulai
if(isset($_SESSION['user'])) {
    $user = $_SESSION['user'];
    $role = "Pengguna";
} else if (isset($_SESSION['admin'])) {
    $user = $_SESSION['admin'];
    $role = "Admin";
} else {
    header("location: masuk.php");
    exit;
}
// Cek Session User Selesai

//  Isset Hapus Akun Mulai
if(isset($_GET['hapus'])){
    hapusAkun($user);
    header('location: keluar.php');
}
// Isset Hapus Akun Selesai
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/navbar.css">
    <link rel="stylesheet" href="../css/akun.css">
    <link rel="stylesheet" href="../css/footer.css">
    <link rel="icon" href="../gambar/miniLogo.png">
    <title>MyMouse ~ Akun</title>
</head>

<body>
    <!-- Header Mulai -->
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
        <a href="../toko/" class="shop" title="Toko"><img class="shopLogo" src="../gambar/Union.png" alt="" width="30px"><p id="notif" class="notifikasi"></p></a>
        <!-- Profil Mulai -->
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
                        <li><a href="" class="tip"><img src="../gambar/icon/User.png" alt="">Kelola Akun</a></li>
                        <li><a href="../toko/pesanan.php" class="tip"><img src="../gambar/icon/Shopping_Bag.png" alt="">Pesanan</a></li>
                        ';
                        ?>
                        <li><a href="keluar.php" class="tip" onclick="return confirm('Apakah anda yakin ingin keluar?')" type="button"><img src="../gambar/icon/Exit.png" alt="">Keluar</a></li>
                    <?php
                    } else if(isset($_SESSION['admin'])) {
                        echo '
                        <li><a href="../toko/admin.php" class="tip"><img src="../gambar/icon/Eye.png" alt="">Halaman Admin</a></li>
                        <li><a href="" class="tip"><img src="../gambar/icon/User.png" alt="">Kelola Akun</a></li>
                        <li><a href="../toko/pesanan.php" class="tip"><img src="../gambar/icon/Shopping_Bag.png" alt="">Pesanan</a></li>
                        ';
                        ?>
                        <li><a href="keluar.php" class="tip" onclick="return confirm('Apakah anda yakin ingin keluar?')" type="button"><img src="../gambar/icon/Exit.png" alt="">Keluar</a></li>
                    <?php
                    } else {
                        echo '
                        <li><a href="masuk.php" class="tip"><img src="../gambar/icon/Enter.png" alt="">Masuk</a></li>
                        <li><a href="daftar.php" class="tip"><img src="../gambar/icon/User_Add.png" alt="">Daftar</a></li>
                        ';
                    }
                    ?>
                </ul>
            </div>
        </div>
        <!-- Profil Selesai -->
        <div class="hamburger">
            <input type="checkbox" name="" id="">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </header>
    <!-- header Selesai -->

    <?php 
    // Pembagian Halaman Mulai
    if(isset($_GET['user'])) {
        editAkun($user,$role);
    }else {
        masukAkun($user,$role);
    }
    // Pembagian Halaman Selesai

    // Fungsi Halaman Akun Mulai
    function masukAkun($user,$role){
        $data = mysqli_fetch_assoc(ambilAkun($user));
            ?>
        <!-- Halaman Menampilkan Akun Mulai -->
        <section id="main">
            <div class="container-box">
                <h1>PROFILE</h1>
                <div class="wrapper">
                    <div class="kanan">
                        <img src="../gambar/pp/<?= $data['profil'] ?>" alt="Profile Picture">
                        <a href="?hapus=<?= $data['username'] ?>" type="submit" onclick="return confirm('Apakah anda yakin ingin Menghapus permanen akun <?= $data['username'] ?>?')" class="hapus">Hapus Akun</a>
                    </div>
                    <div class="kiri">
                        <h2 style="text-align:start;">Data Saya</h2>
                        <div class="box">
                            <div class="box-kiri">
                                <p>Nama Pengguna</p>
                                <p>Email</p>
                                <p>Password</p>
                                <p>No Hp</p>
                                <p>Provinsi</p>
                                <p>Kode POS</p>
                                <p>Alamat</p>
                            </div>
                            <div class="box-kanan">
                                <p>: <?= $data['username'] ?></p>
                                <p>: <?= $data['email'] ?></p>
                                <p>: <?= $data['password'] ?></p>
                                <p>: <?= $data['hp'] ?></p>
                                <p>: <?= $data['prov_akun'] ?></p>
                                <p>: <?= $data['kode_pos'] ?></p>
                                <p>: <?= $data['alamat_akun'] ?></p>
                            </div>
                        </div>
                        <a href="?user=" class="edit">Ubah</a>
                    </div>
                </div>
            </div>
        </section>
        <!-- Halaman Menampilkan Akun Selesai -->

        <?php 
        // Cek Jika belum melengkapi data Mulai
        if($data['prov_akun']== NULL || $data['kode_pos']==NULL || $data['alamat_akun']==NULL){?>
            <script language ="javascript">
                alert('Silahkan lengkapi data diri anda');
            </script><?php
        }
        // Cek Jika belum melengkapi data Selesai

    };
    // Fungsi Halaman Akun Selesai

    // Fungsi Halaman Edit Akun Mulai
    function editAkun($user,$role){
        $data = mysqli_fetch_assoc(ambilAkun($user));
        
        ?>
        <!-- Halaman Edit Akun Mulai -->
        <section id="main">
            <form class="container-box" method="post" enctype="multipart/form-data">
                <h1>PROFILE</h1>
                <div class="wrapper">
                    <div class="kanan editt">
                        <img src="../gambar/pp/<?= $data['profil'] ?>" alt="">
                        <input type="file" name="gambar" id="gambar">
                    </div>
                    <div class="kiri" >
                        <h2 style="text-align:start;">Ubah Data Saya</h2>
                        <div class="box">
                            <div class="box-kiri">
                                <label for="user">Nama Pengguna</label>
                                <label for="email">Email</label>
                                <label for="pass">Password</label>
                                <label for="hp">No Hp</label>
                                <label for="prov">Provinsi</label>
                                <label for="pos">Kode POS</label>
                                <label for="alamat">Alamat</label>
                            </div>
                            <div class="input-kanan">
                                <p>: <input type="text" name="username" id="user" value="<?=$data['username']?>"></p>
                                <p>: <input type="email" name="email" id="email" value="<?=$data['email']?>"></p>
                                <p>: <input type="password" name="password" id="pass" value="<?=$data['password']?>"></p>
                                <p>: <input type="number" name="hp" id="hp" value="<?=$data['hp']?>"></p>
                                <p>: 
                                    <select name="prov" id="prov">
                                        <option value="<?=$data['prov_akun']?>"><?=$data['prov_akun']?></option>
                                        <?php foreach(ambilProvinsi() as $kurir){
                                            echo '
                                            <option value="'.$kurir['provinsi'].'">'.$kurir['provinsi'].'</option>
                                            ';
                                        }?>
                                    </select>
                                </p>
                                <p>: <input type="number" name="pos" id="pos" value="<?=$data['kode_pos']?>"></p>
                                <p>: <input type="text" name="alamat" id="alamat" value="<?=$data['alamat_akun']?>"></p>
                            </div>
                        </div>
                        <button type="submit" name="edit" class="edit">Simpan</button>
                        <a href="../akun/" type="submit" onclick="return confirm('Apakah anda yakin ingin membatalkan pengeditan?')" name="batal" class="hapus">Batal</a>
                    </div>
                </div>
            </form>
        </section>
        <!-- Halaman Edit Akun Selesai -->

        <?php 
        // Isset Button edit Mulai
        if(isset($_POST['edit'])){
            $username = $_POST['username'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $hp = $_POST['hp'];
            $prov = $_POST['prov'];
            $pos = $_POST['pos'];
            $alamat = $_POST['alamat'];
            // Melakuka Update Akun
            $update = updateAkun($user,$username,$email,$password,$hp,$prov,$pos,$alamat,$data['profil']);
            if (!$update){
                echo '
                <script>
                    alert("foto profil gagal diubah");
                </script>
            ';
            }else {
                // header('location: ../akun/');
                echo '
                    <script language ="javascript">
                        // alert("Berhasil melakukan update");
                        window.location.href="../akun/";
                    </script>
                ';
            }
        }
        // Isset BUtton edit Selesai
    }
    // Fungsi Halaman Edit Akun Selesai
    ?>
    
    <!-- footer  Mulai-->
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
    <!-- Footer Selesai -->

    <!-- Link File Javascript Mulai -->
    <script src="../javascript/main.js"></script>
    <script src="../javascript/notifikasi.js"></script>
    <script src="../javascript/dropdown.js" ></script>
    <!-- Link File Javascript Selesai -->

</body>
</html>