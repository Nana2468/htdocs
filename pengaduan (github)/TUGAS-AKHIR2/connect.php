<?php
$connect = mysqli_connect("localhost", "root", "", "pengaduan");

if (mysqli_connect_errno()) {
    echo "connection failed : " . mysqli_connect_error();
}
