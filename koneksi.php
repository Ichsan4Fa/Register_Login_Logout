<?php 
 $host = "localhost";
 $user = "root";
 $pass = "";
 $db   = "users";
 $koneksi = mysqli_connect($host,$user,$pass,$db);
 //pengecekan koneksi data base
 if ($koneksi) {
     die("Tidak dapat terkoneksi ke data base");
 }
?>