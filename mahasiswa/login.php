<?php
require 'function.php';

session_start();

$username = $_POST['username'];
$password = $_POST['password'];
$conn = mysqli_connect('localhost', 'root', '', 'akademik');
$sql = mysqli_query($conn, "SELECT * FROM user WHERE username='$username'");

$data = mysqli_fetch_assoc($sql);
//var_dump (md5($password));die;
if(!empty($data)){
if (md5($password)==$data["password"]) {
    if ($data['level'] == "admin") {
        $_SESSION['user'] = $data['username'];
        $_SESSION['level'] = "admin";
        header("location: admin/index.php");
    } else if ($data['level'] == "user") {
        $_SESSION['user'] = $data['username'];
        $_SESSION['level'] = "user";
        header("location: user/index.php");
    } else {
        header("location:login.php?alert=gagal");
    }
}
}