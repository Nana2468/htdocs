<?php
include "connect.php";
// $id_report = $_GET['id_report'];
// $detail = mysqli_query($connect, "select * from report where id_report = '$id_report'");
// $data = mysqli_fetch_object($detail);
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css" />
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
	<link rel="stylesheet" href="css/style.css" />
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css" />
	<title>Hello, world!</title>
</head>

<body>
	<?php
	session_start();

	if ($_SESSION["level"] != "operator") {
		header("Location: login.php?message=failed");
	}
	?>
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
	<!-- Card -->
	<div class="container my-5">
		<div class="row my-5">
			<div class="col-2"></div>
			<div class="col-8">
				<?php
				$id_report = $_GET['id_report'];
				$query = mysqli_query($connect, "SELECT id_report, username, title, content, date, file from report WHERE id_report='$id_report'");

				while ($data = mysqli_fetch_array($query)) {

				?>
					<div class="card">
						<div class="card-body container">
							<h4 class="mb-4">Hi, <?= $data["username"] ?></h4>
							<h5><?= $data["title"] ?></h5>
							<p style="font-size:17px"><?= $data["content"] ?></p>
							<div class="pb-4">
								<i class="bi bi-calendar-week-fill pe-2"></i>
								<span> <?= $data["date"] ?></span>
							</div>							
							<div class="pb-4">
							<i class="bi bi-image-fill pe-2"></i>
								<?php
							if ($data['file'] == "") { ?>
								<img src="https://via.placeholder.com/500x500.png?text=PAS+FOTO+SISWA" style="width:150px; height:150px;">
							<?php
							} else { ?>
								
								<a class="btn btn-secondary btn-color btn-sm" href= 'download.php?file=<?= $data['file']; ?>'> Download Image</a>
							<?php
							}
							?>
							</div>
							
							<a href="response.php?id_report=<?= $data["id_report"]; ?>" class="pe-5 link-dark"><i class="pe-2 bi bi-pencil-fill"></i>GIve Feedback</a>
							<a href="crudResponse.php?Action=delete-report&id_report=<?= $data["id_report"]; ?>" class="link-dark"><i class="pe-2 bi bi-trash3-fill"></i>Delete Report</a>
						</div>
						<div class="card-footer text-muted text-center">
							<i class="bi bi-hourglass-split"></i>
							This Report will be processed
						</div>
					</div>
				<?php
				}
				?>
			</div>
			<div class="col-2"></div>
		</div>
	</div>
	<!-- Start Footer -->
	<div class="relative-bottom">
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