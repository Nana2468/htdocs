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
    <title>Login</title>
</head>

<body>
    <div class="container-fluid vh-100">
        <div class="row">
            <div class="col-5 left p-5">
                <div class="container">
                    <img src="img/logo project (white).png" alt="cannot reload" width="50%" />
                    <h5 class="my-4">Menampung Aspirasi dan Pengaduan Intel Solution</h5>
                    <img src="img/cover.png" alt="cannot reload" width="90%" />
                </div>
            </div>
            <div class="col-7 right">
                <div class="container my-5 login">
                    <h3>Register</h3>
                    <h6 class="mb-5"><i>Create Your Account</i></h6>
                    <div class="row">
                        <div class="col-2"></div>
                        <div class="col-8">
                            <form action="register.php" method="post" >
                                <div class="row">
                                    <div class="col-6">

                                        <div class="form-floating mb-4">
                                            <input type="text" class="form-control" id="nik" placeholder="16 digits" name="nik" width="50px" />
                                            <label for="nik">NIK</label>
                                        </div>
                                    </div>
                                    <div class="col-6">

                                        <div class="form-floating mb-4">
                                            <input type="text" class="form-control" id="nip" placeholder="16 digits" name="nip" width="50px" />
                                            <label for="nip">NIP</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-floating mb-4">
                                    <input type="text" class="form-control" id="username" placeholder="16 digits" name="username" />
                                    <label for="username">Username</label>
                                </div>
                                <div class="form-floating mb-1">
                                    <input type="password" class="form-control" id="password" placeholder="Password" name="password" />
                                    <label for="password">Password</label>
                                </div>
                                <div class=" mb-3">
                                    <input type="hidden" class="form-control" id="level" placeholder="level" name="level" value="public" />
                                </div>
                                <div class="d-flex justify-content-center mt-3">
                                    <button type="submit" class="btn btn-color btn-size" aria-label="">
                                        <h6>Sign Up</h6>
                                    </button>
                                </div>
                            </form>
                        </div>
                        <div class="col-2"></div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>