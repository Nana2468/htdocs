<?php
include 'connect.php';
if (isset($_GET['Action'])) {
    switch ($_GET['Action']) {
            //add-action
        case 'add-response':
            $id_respond = $_POST['id_respond'];
            $respond_date = $_POST['respond_date'];
            $isi_respond = $_POST['isi_respond'];
            $username = $_POST['username'];
            $id_report = $_POST['id_report'];


            $query = "INSERT INTO respon VALUES ('','$respond_date','$isi_respond', '$username','$id_report')";
            mysqli_query($connect, $query);

            header("Location: operator-dashboard.php?message=berhasil");
            break;
        case 'delete-report':
            $id_report = $_GET['id_report'];
            $query = "DELETE FROM report WHERE id_report='$id_report'";
            mysqli_query($connect, $query);

            header("Location: operator-dashboard.php");
            break;
        default:
            echo 'Aksi tidak ditemukan';
            break;
    }
}
?>