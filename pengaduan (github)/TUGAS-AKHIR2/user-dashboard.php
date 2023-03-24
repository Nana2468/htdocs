<?php
include 'connect.php';
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

	if ($_SESSION["level"] != "public") {
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

	<!-- Start Title -->
	<div class="title text-center">
		<h2 class="pt-5 pb-4">Pelaporan Pengaduan Online Pegawai</h2>
		<div class="d-flex justify-content-center mt-100">
			<div class="">
				<div class="card">
					<div class="card-block">
						<div class="page-header-breadcrumb" style="--bs-breadcrumb-divider: '_____'">
							<ul class="breadcrumb">
								<li class="breadcrumb-item">
									<a href="#"><img src="img/icon _user_.svg" alt="" width="50%" /></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">
									<a href=""><img src="img/icon _paper_.svg" alt="" width="35%" /></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">
									<a href=""><img src="img/icon _check_.svg" alt="" width="34%" /></a>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<img src="img/Wave.png" alt="" class="background" />
	<!-- End Title -->

	<!-- Start Form -->
	<div class="container">

		<div class="row mb-5">
			<div class="col-3"></div>
			<div class="col-6">
				<div class="card">
					<div class="card-body">
						<div class="mb-3">
							<input type="text" class="form-control" id="header" name="header" readonly placeholder="Submit Your Report!" />
						</div>
						<form action="crudReport.php?Action=add-report" method="post" enctype="multipart/form-data">

							<div class="mb-3">
								<div class="mb-3">
									<input class="form-control" type="hidden" id="id_report" name="id_report" required />
								</div>
							</div>

							<div class="mb-3">
								<input class="form-control" type="hidden" id="username" value="<?= $_SESSION['username']; ?>" name="username" required />
							</div>
							<div class="mb-3">
								<label for="title" class="form-label ps-2">Your Report Title</label>
								<input type="text" class="form-control" id="title" name="title" required />
							</div>
							<div class="mb-3">
								<label for="content" class="form-label ps-2">Your Report Contents</label>
								<textarea name="content" id="content" cols="30" rows="10" class="form-control" name="content" required></textarea>
							</div>
							<div class="mb-3">
								<label for="date" class="form-label ps-2">Select Event Date</label>
								<input type="date" class="form-control" id="date" name="date" required />
							</div>
							<div class="mb-3">
								<label for="location" class="form-label ps-2">Event Location</label>
								<input type="text" class="form-control" id="location" name="location" required />
							</div>
							<div class="mb-3">
								<label for="kategori" class="form-label ps-2">Select Your Report Category</label>
								<select class="form-select" aria-label="Default select example" name="category" required>
									<option>Select the Category</option>
									<option value="KV">Kekerasan verbal/non-verbal</option>
									<option value="TA">Tindakan Asusila</option>
									<option value="PS">Pelecehan Seksual</option>
									<option value="PK">Performa dan Kinerja</option>
									<option value="RS">Rasisme</option>
									<option value="KL">Kolusi</option>
									<option value="KP">Konflik Pekerja</option>
									<option value="KR">Korupsi/Penipuan</option>
								</select>
							</div>
							<div class="mb-3">
								<label for="file" class="form-label ps-2">Upload Lampiran (Max 2mb)</label>
								<input class="form-control" type="file" id="file" name="file" />
							</div>

							<div class="d-flex justify-content-end">

								<button type="button" data-bs-toggle="modal" data-bs-target="#confirm" class="btn btn-color">Lapor!</button>


							</div>

							
								<!-- Modal submit -->
								<div class="modal fade" id="confirm" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
									<div class="modal-dialog">
										<div class="modal-content">
											<div class="modal-header">
												<h1 class="modal-title fs-5" id="staticBackdropLabel">Confirm</h1>
												<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
											</div>
											<div class="modal-body">
												Are you sure you want to send this report?
											</div>
											<div class="modal-footer">
												<button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Close</button>
												<button type="submit" class="btn btn-sm btn-color">Submit</button>
											</div>
										</div>
									</div>
								</div>
							
						</form>
					</div>
				</div>
			</div>
			<div class="col-3"></div>
		</div>
	</div>
	<!-- End Form -->

	<!-- Start Footer -->
	<div>
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


	<!-- Option 1: Bootstrap Bundle with Popper -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

	<!-- Option 2: Separate Popper and Bootstrap JS -->
	<!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
</body>

</html>