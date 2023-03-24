<?php
include 'connect.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- datatables -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
    <script src="script.js"></script>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
    <link rel="stylesheet" href="css/style.css" />
    <title>Admin | Table Laporan</title>
</head>

<body>
    <?php
    session_start();

    if ($_SESSION["level"] != "admin") {
        header("Location: login.php?message=failed");
    }
    ?>
    <!-- Start Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark shadow static-top">
        <div class="container">
            <a class="navbar-brand" href="admin-dashboard.php">
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
    <!-- Body Table -->
    <div class="container my-5">

        <div class="card shadow">
            <div class="card-header d-flex justify-content-between rounded-top">
                <h5 class="mt-2">Data Laporan</h5>

            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover table-bordered" id="dataTableLaporan" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>ID Report</th>
                                <th>Username</th>
                                <th>Title Report</th>
                                <th>Date</th>
                                <th>Location</th>
                                <th>Category</th>
                                <th>Picture/File</th>

                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 0;
                            $query = mysqli_query($connect, "SELECT * from report");

                            while ($data = mysqli_fetch_array($query)) {
                                $no++;

                            ?>
                                <tr>
                                    <td><?= $no; ?></td>
                                    <td><?= $data["id_report"] ?></td>
                                    <td><?= $data["username"] ?></td>
                                    <td><?= $data["title"] ?></td>
                                    <td><?= $data["date"] ?></td>
                                    <td><?= $data["location"] ?></td>
                                    <td><?= $data["category"] ?></td>
                                    <td>
                                        <br>
                                        <a class="btn btn-secondary btn-color btn-sm" href='download.php?file=<?= $data['file']; ?>' style=""><i class="bi bi-upload"></i></a>

                                    </td>

                                    <td>
                                        <div class="dropdown">
                                            <button class="btn btn-color rounded-3 btn-sm dropdown-toggle px-4" type="button" id="dropdownMenu2" data-bs-toggle="dropdown" aria-expanded="false"><i class="bi bi-info-lg"></i></button>
                                            <ul class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                                <li>
                                                    <a class="dropdown-item" type="button" href="delete-report.php?id_report=<?= $data["id_report"]; ?>"><i class="bi bi-trash2 me-1"></i>Hapus</a>
                                                </li>
                                                <li>
                                                    <button data-bs-toggle="modal" data-bs-target="#detailreport<?= $no; ?>" class="dropdown-item" type="button"><i class="bi bi-pencil-square me-1"></i>Detail</button>
                                                </li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                                <!-- modal edit -->
                                <div class="modal fade" id="detailreport<?= $no; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-body">
                                                <h5 class="modal-title mb-4" id="exampleModalLabel">Edit Data Operator</h5>
                                                <form action="crudReport.php?Action=add-report" method="post" enctype="multipart/form-data">

                                                    <div class="mb-3">
                                                        <input class="form-control" type="hidden" id="username" value="<?= $_SESSION['username']; ?>" name="username" />
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="title" class="form-label ps-2">Your Report Title</label>
                                                        <input type="text" class="form-control" id="title" name="title" value="<?= $data["title"] ?>" />
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="content" class="form-label ps-2">Your Report Contents</label>
                                                        <textarea name="content" id="content" cols="30" rows="10" class="form-control" name="content"><?= $data["content"] ?></textarea>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="date" class="form-label ps-2">Select Event Date</label>
                                                        <input type="date" class="form-control" id="date" name="date" value="<?= $data["date"] ?>" />
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="location" class="form-label ps-2">Event Location</label>
                                                        <input type="text" class="form-control" id="location" name="location" value="<?= $data["location"] ?>" />
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="kategori" class="form-label ps-2">Select Your Report Category</label>
                                                        <select class="form-select" aria-label="Default select example" name="category" value="<?= $data["category"] ?>">
                                                            <option>Select the Category</option>
                                                            <option value="KV" <?= ($data["category"] == "KV") ? 'selected' : ''; ?>>Kekerasan verbal/non-verbal</option>
                                                            <option value="TA" <?= ($data["category"] == "TA") ? 'selected' : ''; ?>>Tindakan Asusila</option>
                                                            <option value="PS" <?= ($data["category"] == "PS") ? 'selected' : ''; ?>>Pelecehan Seksual</option>
                                                            <option value="PK" <?= ($data["category"] == "PK") ? 'selected' : ''; ?>>Performa dan Kinerja</option>
                                                            <option value="RS" <?= ($data["category"] == "RS") ? 'selected' : ''; ?>>Rasisme</option>
                                                            <option value="KL" <?= ($data["category"] == "KL") ? 'selected' : ''; ?>>Kolusi</option>
                                                            <option value="KP" <?= ($data["category"] == "KP") ? 'selected' : ''; ?>>Konflik Pekerja</option>
                                                            <option value="KR" <?= ($data["category"] == "KR") ? 'selected' : ''; ?>>Korupsi/Penipuan</option>
                                                        </select>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="file" class="form-label ps-2">Lampiran (Max 2mb)</label>
                                                        <br>
                                                        <?php
                                                        if ($data['file'] == "") { ?>
                                                            <img src="https://via.placeholder.com/500x500.png?text=PAS+FOTO+SISWA" style="width:100px; height:100px;">
                                                        <?php
                                                        } else { ?>
                                                            <img src="file/<?= $data['file']; ?>" alt="" style="width:100px; height:100px;">
                                                        <?php
                                                        }
                                                        ?>
                                                    </div>


                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
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
    <!-- Page level custom scripts -->



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>