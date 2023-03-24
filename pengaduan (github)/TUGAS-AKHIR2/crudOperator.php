<?php
include 'connect.php';
if (isset($_GET['Action'])) {
    switch ($_GET['Action']) {
            //add-action
        case 'add-operator':
            $id_user = $_POST['id_user'];
            $nik = $_POST['nik'];
            $nip = $_POST['nip'];
            $level = $_POST['level'];
            $username = $_POST['username'];
            $password = $_POST['password'];

            $query = "INSERT INTO user VALUES ('','$nik','$nip', '$username', '$password', '$level')";
            mysqli_query($connect, $query);

            header("Location: admin-table-operator.php");
            break;
        case 'edit-operator':
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

            header("Location: admin-table-operator.php");
            break;
        case 'delete-operator':
            $id_user = $_GET['id_user'];
            $query = "DELETE FROM user WHERE id_user='$id_user'";
            mysqli_query($connect, $query);

            header("Location: admin-table-operator.php");
            break;
        default:
            echo 'Aksi tidak ditemukan';
            break;
    }
}
?>