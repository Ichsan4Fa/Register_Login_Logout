<?php
include "koneksi.php";

if (isset($_POST['daftar'])) {
    global $koneksi;
    $username = mysqli_real_escape_string($koneksi,$_POST['username']);
    $nama = mysqli_real_escape_string($koneksi,$_POST['nama']);
    $password = mysqli_real_escape_string($koneksi,$_POST['password']);
    //error handling
    //jika data field kosong/tidak diisi
    if (empty($username)|| empty($nama)|| empty($password)) {
        header("Location : ../signup.php?signup=kosong");
        exit();
    }else {
        //cek validasi karakter
        if (!preg_match("/^[a-zA-Z]*$/",$nama)) {
            header("Location : signup.php?signup=invalidchar");
        }else {
           //cek apakah username pernah terpakai
           $sql1 = "SELECT * FROM tbl_regist WHERE username = '$username'";
           $r1 = mysqli_query($koneksi,$sql1);
           $check = mysqli_num_rows($r1);
           if ($check>0) {
               header("Location : signup.php?signup=usernameterdaftar");
               exit();
           }else {
               $sql1 = "INSERT INTO tb_regist (username,pwd,nama) VALUES('$username','$password','$nama')";
               mysqli_query($koneksi,$sql1);
               header("Location : index.php?signup=berhasil");
               exit(); 
           }
        }
    }
}
//login
if (isset($_POST['login'])) {
    $username = mysqli_real_escape_string($koneksi,$_POST['username']);
    $password = mysqli_real_escape_string($koneksi,$_POST['pwd']);

    if (empty($username)||empty($password)) {
        header("Location : index.php?login=kosong");
        exit();
    }else {
        //cek login
        $sql1 = "SELECT * FROM tb_regist WHERE username='$username'";
        $r1 = mysqli_query($koneksi,$sql1);
        $check = mysqli_num_rows($r1);
        if ($check < 1) {
            header("Location : index.php?login=kosong");
            exit();
        }else {
            $row;
            if ($row = mysqli_fetch_array($r1) {
                //password sesuai atau tidak?
                $cocok =(md5($password,PASSWORD_DEFAULT) == $row['pwd']);
                if ($cocok == false) {
                    header("Location : index.php?login=usernamedanpasswordsalah");
                    exit(); 
                }
                elseif ($cocok == true) {
                    //login dan buat session
                    $_SESSION['username'] = $row['username'];
                    $_SESSION['nama'] = $row['nama'];
                    header("Location : index.php?login=sukses");
                    exit();
                }
            }
        }
    }
}else {
    header("Location : signup.php?signup=error");
    exit();
}
?>