<?php
session_start();
include "connect.php";
$username = $_POST["username"];
$password = $_POST["password"];

// $login = mysqli_query($connect, "SELECT * FROM user WHERE username = '$username' AND password = '$password' OR nik = '$nik' AND password = '$password'");
$login = mysqli_query($connect, "SELECT * FROM user WHERE username = '$username' AND password = '$password'");
$cek = mysqli_num_rows($login);

if ($cek > 0) {
    $data = mysqli_fetch_assoc($login);

    if ($data['level'] == "admin") {
        $_SESSION["username"] = $username;
        $_SESSION["level"] = "admin";
        $_SESSION["nik"] = $nik;
        header("Location: admin-dashboard.php");
    } elseif ($data['level'] == "operator") {
        $_SESSION["username"] = $username;
        $_SESSION["level"] = "operator";
        $_SESSION["nik"] = $nik;
        header("Location: operator-dashboard.php");
    } elseif ($data['level'] == "public") {
        $_SESSION["username"] = $username;
        $_SESSION["level"] = "public";
        $_SESSION["nik"] = $nik;
        header("Location: user-dashboard.php");
    } else {
        header("Location: login.php?message=failed");
    }
} else {
    header("Location: login.php?message=failed");
}
