<?php
session_start();
// Session Keluar Mulai
session_encode();
session_destroy();
header("location: masuk.php");
// Session Keluar Selesai