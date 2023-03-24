<?php
include "connect.php";
if (isset($_GET['id_report'])) {
    if ($_GET['id_report']!="") {
        $id_report = $_GET['id_report'];
        $get_file="SELECT file FROM report WHERE id_report='$id_report'";
        $data_file=mysqli_query($connect,$get_file);
        $old_file=mysqli_fetch_array($data_file);
        unlink("file/".$old_file['file']);
        $query= mysqli_query($connect,"DELETE FROM report WHERE id_report='$id_report'");
        if ($query) {
            header("location:admin-table-report.php?message=deleted");
        }else {
            header("location:admin-table-report.php?message=failed");
        }
    }else {
        header("location:admin-table-report.php");
    }
}else{
    header("location:admin-table-report.php");
}
?>