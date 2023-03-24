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
	<title>Admin | Table Operator</title>
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
		<!-- modal add -->
		<div class="modal fade" id="addOperator" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-body">
						<h5 class="modal-title mb-4" id="exampleModalLabel">Add Data Operator</h5>
						<form action="crudOperator.php?Action=add-operator" method="post">
							<div class="mb-3">

								<input type="hidden" class="form-control" id="nik" placeholder="16 digits" name="id_user" />
							</div>
							<div class="mb-3">
								<label class="mb-2" for="nik">NIK</label>
								<input type="text" class="form-control" id="nik" placeholder="16 digits" name="nik" />
							</div>
							<div class="mb-3">
								<label class="mb-2" for="nik">NIP</label>
								<input type="text" class="form-control" id="nip" placeholder="16 digits" name="nip" />
							</div>
							<div class="mb-3">
								<label class="mb-2" for="username">Username</label>
								<input type="text" class="form-control" id="username" placeholder="16 digits" name="username" />
							</div>
							<div class="mb-3">
								<label class="mb-2" for="password">Password</label>
								<input type="password" class="form-control" id="password" placeholder="16 digits" name="password" />
							</div>
							<div class=" mb-3">
								<input type="hidden" class="form-control" id="level" placeholder="level" name="level" value="operator" />
							</div>
							<div class="d-flex justify-content-end mt-3">
								<button type="submit" class="btn btn-color " aria-label="">Save Changes</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
		<div class="card shadow">
			<div class="card-header d-flex justify-content-between rounded-top">
				<h5 class="mt-2">Data Operator</h5>
				<a data-bs-toggle="modal" data-bs-target="#addOperator" class="btn btn-color rounded-5">Add</a>
			</div>
			<div class="card-body">
				<div class="table-responsive">
					<table class="table table-hover table-bordered" id="dataTableOperator" width="100%" cellspacing="0">
						<thead>
							<tr>
								<th>#</th>
								<th>ID Operator</th>
								<th>NIK</th>
								<th>NIP</th>
								<th>Username</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$no = 0;
							$query = mysqli_query($connect, "SELECT * from user WHERE level='operator'");

							while ($data = mysqli_fetch_array($query)) {
								$no++;

							?>
								<tr>
									<td><?= $no; ?></td>
									<td><?= $data["id_user"] ?></td>
									<td><?= $data["nik"] ?></td>
									<td><?= $data["nip"] ?></td>
									<td><?= $data["username"] ?></td>
									<td>
										<div class="dropdown">
											<button class="btn btn-color rounded-3 btn-sm dropdown-toggle px-4" type="button" id="dropdownMenu2" data-bs-toggle="dropdown" aria-expanded="false"><i class="bi bi-info-lg"></i></button>
											<ul class="dropdown-menu" aria-labelledby="dropdownMenu2">
												<li>
													<button data-bs-toggle="modal" data-bs-target="#editOperator<?= $no; ?>" class="dropdown-item" type="button"><i class="bi bi-pencil-square me-1"></i>Edit</button>
												</li>
												<li>
													<a class="dropdown-item" type="button" href="crudOperator.php?Action=delete-operator&id_user=<?= $data["id_user"]; ?>"><i class="bi bi-trash2 me-1"></i>Hapus</a>
												</li>
												<li>
													<button class="dropdown-item" type="button" data-bs-toggle="modal"><i class="bi bi-pencil-square me-1"></i>Detail</button>
												</li>
											</ul>
										</div>
									</td>
								</tr>
								<!-- modal edit -->
								<div class="modal fade" id="editOperator<?= $no; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
									<div class="modal-dialog">
										<div class="modal-content">
											<div class="modal-body">
												<h5 class="modal-title mb-4" id="exampleModalLabel">Edit Data Operator</h5>
												<form action="crudOperator.php?Action=edit-operator" method="post">
													<input type="hidden" class="form-control" id="id_user" placeholder="16 digits" name="id_user" value="<?= $data["id_user"]; ?> " />
													<div class="mb-3">
														<label class="mb-2" for="nik">NIK</label>
														<input type="text" class="form-control" id="nik" placeholder="16 digits" name="nik" value="<?= $data["nik"]; ?> " />
													</div>
													<div class="mb-3">
														<label class="mb-2" for="nik">NIP</label>
														<input type="text" class="form-control" id="nip" placeholder="16 digits" name="nip" value="<?= $data["nip"]; ?> " />
													</div>
													<div class="mb-3">
														<label class="mb-2" for="username">Username</label>
														<input type="text" class="form-control" value="<?= $data["username"]; ?>" id="username" placeholder="16 digits" name="username" />
													</div>
													<div class=" mb-3">
														<input type="hidden" class="form-control" id="level" placeholder="level" name="level" value="<?= $data["level"]; ?> " />
													</div>
													<div class="d-flex justify-content-end mt-3">
														<button type="submit" class="btn btn-color " aria-label="">Add</button>
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
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>