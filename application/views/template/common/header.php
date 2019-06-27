<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Electronic Shop">

    <!-- favicon -->
    <link rel="icon" type="image/png" sizes="180x180" href="<?= base_url(); ?>assets/favicon/favicon.ico">
    <link rel="apple-touch-icon" sizes="180x180" href="<?= base_url(); ?>assets/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?= base_url(); ?>assets/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?= base_url(); ?>assets/favicon/favicon-16x16.png">
    <link rel="manifest" href="<?= base_url(); ?>assets/favicon/site.webmanifest">

    <title><?= $title; ?></title>

    <!-- Bootstrap core CSS -->
    <link href="<?= base_url(); ?>assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="<?= base_url(); ?>css/blog-home.css" rel="stylesheet">

    <!-- cuma untuk teleport ke atas -->
    <link href="<?= base_url(); ?>assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="<?= base_url(); ?>assets/css/sb-admin.css" rel="stylesheet">

    <!-- custom css -->
    <style>
        body {
            background-color: #DCDCDC;
        }
    </style>
</head>

<body id="page-top">

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="<?= base_url('home'); ?>"><i class="fas fa-fw fa-store"></i> Tear</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">

                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('home'); ?>">Home
                            <span class="sr-only"></span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?= base_url('about') ?>" class="nav-link">About</a>
                    </li>

                    <?php if ($this->session->userdata('email')) : ?>

                        <li class="nav-item">
                            <a href="<?= base_url('profile') ?>" class="nav-link">Profile</a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('home/cart') ?>" class="nav-link">Cart</a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('confirm') ?>" class="nav-link">Confirm</a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('user/logout') ?>" class="nav-link">Logout</a>
                        </li>

                    <?php else : ?>

                        <li class="nav-item">
                            <a href="<?= base_url('user') ?>" class="nav-link">Login</a>
                        </li>

                    <?php endif; ?>

                </ul>
            </div>
        </div>
    </nav>