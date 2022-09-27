<!doctype html>
<html lang="en">

<head>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    <!-- slick -->
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
    <link rel="stylesheet" href="https://unpkg.com/flowbite@1.4.7/dist/flowbite.min.css" />

    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="<?php echo base_url('asset/public/js/grubClass.js') ?>"></script>
    <script src="https://unpkg.com/flowbite@1.4.7/dist/flowbite.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="<?php echo base_url('asset/public/css/') ?>base.css">
    <title>My Matic</title>
</head>

<style>
    body {
        background-image: url('<?php echo base_url('asset/admin/img/bg.jpg') ?>');
    }
</style>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark text-4xl uppercase">
        <div class="container-fluid">
            <div class="navbar-brand ">
                <a href="<?php echo base_url('Game/crypto') ?>" class="flex">
                    <img src="<?php echo base_url('asset/public/img/') ?>usdt.png" alt="Logo" class="w-14">
                    <!-- <span class="ml-2 font-semibold" id="crypto"><?php echo number_format($account['crypto']) ?></span> -->
                    <span class="ml-2 font-semibold my-auto text-4xl" id="crypto">Wallet</span>
                </a>
            </div>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav font-medium">
                    <li class="nav-item">
                        <a class="nav-link <?php echo isset($nav) && $nav == 'home' ? 'active' : '' ?>" aria-current="page" href="<?php echo base_url() ?>">Wall</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo isset($nav) && $nav == 'range' ? 'active' : '' ?>" href="<?php echo base_url('Game/range') ?>">N-POOLS</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo isset($nav) && $nav == 'gpool' ? 'active' : '' ?>" href="<?php echo base_url('Game/gpool') ?>">G-POOLS</a>
                    </li>
                    <li class=" nav-item">
                        <a class="nav-link" href="<?php echo base_url('Auth/logout') ?>">exit</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>