<?php
include "connect.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
    <link rel="stylesheet" href="css/style.css" />
    <title>Hello, world!</title>
</head>

<body>
    <?php
    session_start();

    if ($_SESSION["level"] != "operator") {
        header("Location: login.php?message=failed");
    }
    ?>
    <!-- Navbar -->
    <!-- Start Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark shadow static-top">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="img/logo project (white).png" alt="..." height="36" />
            </a>
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <h6 class="pt-1 pe-3" aria-current="page"><?= $_SESSION['username']; ?></h6>
                </li>
                <img src="img/icon.svg" alt="" width="32" />
            </ul>
        </div>
    </nav>
    <!-- End Navbar -->
    <div class="container mt-2">
        <h5 class="mt-4 mb-3">Laporan Pengaduan</h5>
        <div class="card shadow">
            <div class="card-body">
                <form action='crudResponse.php?Action=add-response' method='post'>

                    <div class="my-3 p-3 rounded">
                        <input type="hidden" class=" form-control" id="title" name="id_respond" required />

                        <div class="mb-3 row">
                            <label for="content" class="col-sm-2 form-label ps-2">Respond Date</label>
                            <div class="col-sm-10">
                                <input type="date" class="form-control" id="date" name="respond_date" required />
                            </div>

                        </div>
                        <div class="mb-3 row">
                            <label for="date" class=" col-sm-2 form-label ps-2">Your Respond</label>
                            <div class="col-sm-10">

                                <textarea id="content" cols="30" rows="10" class="form-control" name="isi_respond" required></textarea>
                            </div>

                        </div>
                        <input class="form-control" type="hidden" id="username" value="<?= $_SESSION['username']; ?>" name="username" required />
                        <div class="mb-3 row">
                            <label for="date" class=" col-sm-2 form-label ps-2">ID report</label>

                            <div class="col-sm-10">
                                <select class="col-sm-2 form-select mb-3" name="id_report" aria-label=".form-select-lg example">
                                    <?php
                                    $id_report = $_GET['id_report'];
                                    $query = mysqli_query($connect, "SELECT id_report, title, username from report WHERE id_report='$id_report'");

                                    while ($data = mysqli_fetch_array($query)) {

                                    ?>
                                    
                                        <option value="<?= $data["id_report"] ?>">report : <?= $data["title"] ?> || username : <?= $data["username"] ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>


                        </div>

                        <div class="mb-3 row">
                            <label for="jurusan" class="col-sm-2 col-form-label"></label>
                            <div class="col-sm-10"><button type="submit" class="btn btn-sm btn-color">Submit</button></div>
                        </div>
                    </div>
                </form>
            </div>
        </div>


    </div>
    <!-- Start Footer -->
    <div class="fixed-bottom">
        <svg class="waves" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 24 150 28" preserveAspectRatio="none" shape-rendering="auto">
            <defs>
                <path id="gentle-wave" d="M-160 44c30 0 58-18 88-18s 58 18 88 18 58-18 88-18 58 18 88 18 v44h-352z" />
            </defs>
            <g class="parallax">
                <use xlink:href="#gentle-wave" x="48" y="0" fill="#6A7597" />
                <use xlink:href="#gentle-wave" x="48" y="3" fill="#6A7597" />
                <use xlink:href="#gentle-wave" x="48" y="5" fill="#3E4457" />
                <use xlink:href="#gentle-wave" x="48" y="7" fill="#3E4457" />
            </g>
        </svg>
        <footer class="page-footer font-small unique-color-dark pt-4">
            <div class="container">
                <div class="footer-copyright text-center py-3">
                    <h6 class="mb-1 text-white">©Intel Solution</h6>
                </div>
            </div>
        </footer>
    </div>
    <!-- End Footer -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>