<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Login</title>

    <!-- Custom fonts for this template-->
    <link href="<?= base_url('asset/sb_admin2/'); ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?= base_url('asset/sb_admin2/'); ?>css/sb-admin-2.min.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        #titleLogin {
            color: rgb(225 29 72) !important;
            text-shadow: 2px 2px 0 #4074b5, 2px -2px 0 #4074b5, -2px 2px 0 #4074b5, -2px -2px 0 #4074b5, 2px 0px 0 #4074b5, 0px 2px 0 #4074b5, -2px 0px 0 #4074b5, 0px -2px 0 #4074b5;
        }

        body {
            background-image: url('<?php echo base_url('asset/admin/img/bg.jpg') ?>');
        }
    </style>

</head>

<body>

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-lg-5">

                <div class="card o-hidden border-0 shadow-lg my-5 rounded-xl bg-gradient-to-r from-blue-900 via-indigo-700 to-indigo-900 " style="opacity: 0.8;">
                    <div class="card-body p-0 ">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4" id="titleLogin"><?php echo $titleLogin ?></h1>
                                    </div>
                                    <form class="user" method="POST" action="<?= base_url('Auth/login') ?>">
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user" id="username" name="username" aria-describedby="emailHelp" placeholder="Enter username...">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user" id="password" name="password" placeholder="Password">
                                            <small class="mt-3"><a href="<?php echo base_url('Refral') ?>">Register</a></small>
                                        </div>
                                        <button class="btn btn-primary btn-user btn-block" type="submit">Login</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="<?= base_url('asset/sb_admin2/'); ?>vendor/jquery/jquery.min.js"></script>
    <script src="<?= base_url('asset/sb_admin2/'); ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?= base_url('asset/sb_admin2/'); ?>vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?= base_url('asset/sb_admin2/'); ?>js/sb-admin-2.min.js"></script>

</body>

</html>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?php
if (!empty($this->session->flashdata('msg'))) {
    echo "<script>
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: '" . $this->session->flashdata('msg') . "',
        })
    </script>";
    $this->session->set_flashdata('msg', '');
}
?>