<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Reagister</title>

    <!-- Custom fonts for this template-->
    <link href="<?= base_url('asset/sb_admin2/'); ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?= base_url('asset/sb_admin2/'); ?>css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-lg-5 ">

                <div class="card o-hidden border-0 my-5 bg-transparent">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Verification</h1>
                                    </div>
                                    <form class="user" method="POST" action="<?= base_url('Refral/confirm') ?>">
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user" name="code" aria-describedby="emailHelp" placeholder="Enter Code...">
                                            <small><a id="resend" class="text-light ml-2">Kirim Ulang Code</a></small>
                                        </div>
                                        <button class="btn btn-primary btn-user btn-block" type="submit">Verifikasi</button>
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
    <script src="<?= base_url('asset/public/'); ?>js/jquery.countdown.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $(document).ready(function() {
            var obj = '#resend';
            $(obj).click(function(a) {
                $.ajax({
                    type: "method",
                    url: "<?php echo base_url('Refral/resend') ?>",
                    success: function(res) {
                        $(obj).text('telah di click');
                        $(obj).replaceWith($('<span id ="resendDisable"class="ml-2 text-secondary"></span>'));
                        var newObj = '#resendDisable';
                        $(newObj).countdown(res, function(event) {
                            $(newObj).text(event.strftime('Kirim Ulang : %H:%M:%S'));
                        });
                    }
                });
            })
        });
    </script>

    <?php
    if (!empty($this->session->flashdata('msg'))) {
        echo "<script>
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: '" . $this->session->flashdata('msg') . "',
        })
    </script>";
    }
    ?>
</body>

</html>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>