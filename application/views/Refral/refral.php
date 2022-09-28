<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="icon" type="image/x-icon" href="<?php echo base_url('asset/public/img/usdt.png') ?>">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Register Now!!!</title>

    <!-- Custom fonts for this template-->
    <link href="<?= base_url('asset/sb_admin2/'); ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?= base_url('asset/sb_admin2/'); ?>css/sb-admin-2.min.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
            background-image: url('<?php echo base_url('asset/admin/img/bg.jpg') ?>');
        }
    </style>

</head>

<body>

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-lg-5 ">

                <div class="card o-hidden border-0 shadow-lg my-5 rounded-xl bg-gradient-to-r from-blue-900 via-indigo-700 to-indigo-900" style="opacity: 0.8;">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="text-2xl mb-4 text-orange-400 font-extrabold">Register Now !!!</h1>
                                    </div>
                                    <form class="user" method="POST" action="<?= base_url('Referral/register') ?>">
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user" id="username" name="username" aria-describedby="emailHelp" placeholder="Enter username...">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user" name="phone" placeholder="WhastApp Number">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user" id="password" name="password" placeholder="Password">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user" name="refral" placeholder="Referral" value="<?php echo $ref ?>">
                                        </div>
                                        <button class="btn btn-primary btn-user btn-block" type="submit">Register</button>
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
<script>
    $(document).ready(function() {
        var post = <?php echo json_encode($this->session->flashdata('post')) ?>;
        var obj = $('.form-group');
        $.each(post, function(index, value) {
            obj.find('[name=' + index + ']').val(value);
        });
        console.log(post);
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
    // $this->session->set_flashdata('msg', '');
}
?>