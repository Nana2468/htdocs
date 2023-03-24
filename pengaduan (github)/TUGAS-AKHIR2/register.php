<?php
include 'connect.php';
$nik = $_POST["nik"];
$nip = $_POST["nip"];
$username = $_POST["username"];
$password = $_POST["password"];
$level = $_POST["level"];

mysqli_query($connect, "INSERT INTO user VALUES('', '$nik','$nip', '$username', '$password', '$level')");
$login = mysqli_query($connect, "SELECT * FROM user WHERE username = '$username' AND password = '$password'");
$cek = mysqli_num_rows($login);

header("Location: login.php");
?>



// if ($cek > 0) {
//     $data = mysqli_fetch_assoc($login);

//     if ($data['level'] == "public") {
//         $_SESSION["username"] = $username;
//         $_SESSION["level"] = "public";
//         header("Location: user-dashboard.php");
//     } else {
//         header("Location: login.php?message=failed");
//     }
// } else {
//     header("Location: login.php?message=failed");
// }
