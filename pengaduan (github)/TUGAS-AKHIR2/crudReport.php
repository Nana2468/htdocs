<?php
include 'connect.php';
if (isset($_GET['Action'])) {
    switch ($_GET['Action']) {
            //add-action
        case 'add-report':
            $id_report = $_POST["id_report"];
            $username = $_POST["username"];
            $title = $_POST["title"];
            $content = $_POST["content"];
            $date = $_POST["date"];
            $location = $_POST["location"];
            $category = $_POST["category"];
            $file_name = $_FILES["file"]["name"];
            $file_size = $_FILES["file"]["size"];

            if ($file_size > 2097152) {
                header("Location: user-dashboard.php?message=size");
            } else {
                //mengecek adanya file
                if ($file_name != "") {
                    //ekstensi yang diperbolehkan
                    $extension_permission = array('png', 'jpg', 'jpeg', 'docx', 'pdf');
                    //memisahkan nama file dan ekstensi
                    $separating_extension = explode('.', $file_name);
                    $extension = strtolower(end($separating_extension));
                    //nama file yang berada didalam direktori temporer
                    $file_tmp = $_FILES['file']['tmp_name'];
                    //membuat huruf dan angka acak
                    $tanggal = md5(date('Y-m-d h:i:s'));
                    //membuat angka/huruf acak berdasarkan waktu upload
                    $file_name_new = $tanggal . '-' . $file_name;

                    //mengecek apakah ekstensi file sudah sesuai
                    if (in_array($extension, $extension_permission) === true) {
                        //memindahkan file ke dalam folder pic
                        move_uploaded_file($file_tmp, 'file/' . $file_name_new);
                        //memasukan data ke database
                        $query = mysqli_query($connect, "INSERT INTO report VALUES ('', '$username','$title', '$content', '$date', '$location', '$category', '$file_name_new')");
                        // var_dump($query);
                        // exit;
                        //menegcek apakah data berhasil diinput atau tidak
                        if ($query) {
                            header("Location: detail-report.php");
                        } else {
                            header("Location: user-dashboard.php?message=gagal");
                        }
                    } else {
                        //jika ekstensinya tidak sesuai maka akan error
                        header("Location: user-dashboard.php?message=extension");
                    }
                } else {

                    //apabila tidak ada file yang diupload maka jalankan query berikut
                    $query = mysqli_query($connect, "INSERT INTO report (id_report, username, title, content, date, location, category) VALUES ('','$username', '$title', '$content', '$date', '$location', '$category')");
                    // var_dump($query);
                    // exit;
                    //mengecek apakah data berhasil diinput atau tidak
                    if ($query) {
                        header("Location: detail-report.php?message=berhasil");
                    } else {
                        header("Location: user-dashboard.php?message=gagal");
                    }
                }
            }

        case 'delete-report':
            $id_report = $_GET['id_report'];
            $query = "DELETE FROM report WHERE id_report='$id_report'";
            mysqli_query($connect, $query);

            header("Location: user-dashboard.php");
            break;
        default:
            echo 'Aksi tidak ditemukan';
            break;
    }
}
