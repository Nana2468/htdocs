<?php
include 'connect.php';
if (isset($_GET['Action'])) {
    switch ($_GET['Action']) {
            //add-action
        case 'add-user':
            $id_user = $_POST['id_user'];
            $nik = $_POST['nik'];
            $nip = $_POST['nip'];
            $level = $_POST['level'];
            $username = $_POST['username'];
            $password = $_POST['password'];

            $query = "INSERT INTO user VALUES ('','$nik','$nip', '$username', '$password', '$level')";
            mysqli_query($connect, $query);

            header("Location: admin-table-user.php");
            break;
        case 'edit-user':
            $id_user = $_POST['id_user'];
            $nik = $_POST['nik'];
            $nip = $_POST['nip'];
            $level = $_POST['level'];
            $username = $_POST['username'];

            $query = "UPDATE user SET 
            nik='$nik',
            nip='$nip',
            username='$username'
            WHERE id_user='$id_user'

            ";
            mysqli_query($connect, $query);

            header("Location: admin-table-user.php");
            break;
        case 'delete-user':
            $id_user = $_GET['id_user'];
            $query = "DELETE FROM user WHERE id_user='$id_user'";
            mysqli_query($connect, $query);

            header("Location: admin-table-user.php");
            break;
        default:
            echo 'Aksi tidak ditemukan';
            break;
    }
}
