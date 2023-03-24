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
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
	<link rel="stylesheet" href="css/style.css" />
	<title>Hello, world!</title>
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

	<!-- Start Card -->
	<div class="container my-5">

		<div class="row">
			<div class="col">
				<div class="card mb-4 shadow" style="width: 34rem;">
					<div class="row g-0">
						<div class="col-md-4 justify-content-center d-flex card-bg">
							<img src="img/user-tie-solid.svg" class="img-fluid rounded-start mb-3 icon" width="39%" alt="..." />
						</div>
						<div class="col-md-8">
							<div class="card-body">
								<h5 class="card-title">Data Operator</h5>
								<p class="card-text">Berikut ini adalah sekumpulan data Operator</p>
								<a href="admin-table-operator.php" class="btn btn-color link px-4">View</a>
							</div>
						</div>
					</div>
				</div>
				<div class="card mb-3 shadow" style="width: 34rem;">
					<div class="row g-0">
						<div class="col-md-4 justify-content-center d-flex card-bg">
							<img src="img/clipboard-user-solid.svg" class="img-fluid rounded-start mb-3 icon" width="35%" alt="..." />
						</div>
						<div class="col-md-8">
							<div class="card-body">
								<h5 class="card-title">Data Laporan</h5>
								<p class="card-text">Berikut ini adalah sekumpulan data Laporan</p>
								<a href="admin-table-report.php" class="btn btn-color link px-4">View</a>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col">
				<div class="card mb-3 shadow" style="width: 34rem;">
					<div class="row g-0">
						<div class="col-md-4 justify-content-center d-flex card-bg">
							<img src="img/users-solid.svg" class="img-fluid rounded-start mb-3 icon" width="44%" alt="..." />
						</div>
						<div class="col-md-8">
							<div class="card-body">
								<h5 class="card-title">Data User</h5>
								<p class="card-text">Berikut ini adalah sekumpulan data User</p>
								<a href="admin-table-user.php" class="btn btn-color link px-4">View</a>
							</div>
						</div>
					</div>
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
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>