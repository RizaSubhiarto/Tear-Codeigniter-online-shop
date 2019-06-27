<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- favicon -->
    <link rel="icon" type="image/png" sizes="180x180" href="<?= base_url(); ?>assets/favicon/favicon.ico">
    <link rel="apple-touch-icon" sizes="180x180" href="<?= base_url(); ?>assets/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?= base_url(); ?>assets/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?= base_url(); ?>assets/favicon/favicon-16x16.png">
    <link rel="manifest" href="<?= base_url(); ?>assets/favicon/site.webmanifest">

    <title><?= $title; ?></title>

    <!-- Custom fonts for this template-->
    <link href="<?= base_url(); ?>assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- Custom styles for this template-->
    <link href="<?= base_url(); ?>assets/css/sb-admin.css" rel="stylesheet">

    <!-- custom style -->
    <style>
        body {
            background-image: url("https://images.pexels.com/photos/247791/pexels-photo-247791.png?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940");
            background-color: #cccccc;
            background-repeat: no-repeat;
            background-size: cover;
        }
    </style>
</head>

<body class="bg-dark">
    <div class="container">
        <div class="card card-login mx-auto mt-5">
            <div class="card-header">Login</div>
            <div class="card-body">
                <?= $this->session->flashdata('message'); ?>
                <form method="post" action="<?= base_url('user'); ?>">
                    <div class="form-group">
                        <div class="form-label-group">
                            <input type="text" id="email" name="email" class="form-control" placeholder="Email address" value="<?= set_value('email'); ?>">
                            <label for="email">Email address</label>
                            <?= form_error('email', '<small class="text-danger pl-3">', '</small>') ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-label-group">
                            <input type="password" id="password" name="password" class="form-control" placeholder="Password">
                            <label for="password">Password</label>
                            <?= form_error('password', '<small class="text-danger pl-3">', '</small>') ?>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">Login</button>
                </form>
                <div class="text-center">
                    <!-- menuju register -->
                    <a class="d-block small mt-3" href="<?= base_url('register'); ?>">Register an Account</a>

                    <a class="d-block small mt-3" href="<?= base_url('home'); ?>">Home</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="<?= base_url(); ?>assets/vendor/jquery/jquery.min.js"></script>
    <script src="<?= base_url(); ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?= base_url(); ?>assets/vendor/jquery-easing/jquery.easing.min.js"></script>

</body>

</html>