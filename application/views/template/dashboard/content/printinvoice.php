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
    <div class="container">
        <div class="card">
            <div class="card-header">
                Invoice
                <strong><?= date('d F Y', $itemx->date_created); ?></strong>
                <span class="float-right"> <strong>Status:</strong> <?= $itemx->status; ?></span>

            </div>
            <div class="card-body">
                <div class="row mb-4">
                    <div class="col-sm-6">
                        <h6 class="mb-3">From:</h6>
                        <div>
                            <strong>Tear Shop</strong>
                        </div>
                        <div>Cempaka 1</div>
                        <div>17433 Bekasi, Indonesia</div>
                        <div>Email: cs@tear.com</div>
                        <div>Phone: 080989999</div>
                    </div>

                    <div class="col-sm-6">
                        <h6 class="mb-3">To:</h6>
                        <div>
                            <strong><?= ucwords($itemx->name); ?></strong>
                        </div>
                        <div><?= ucwords($itemx->adress); ?></div>
                        <div>Phone: <?= $itemx->phone; ?></div>
                        <div>Courier: <?= ucwords($itemx->courier); ?><div>
                            </div>
                        </div>
                    </div>



                </div>

                <div class="table-responsive-sm">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th class="center">#</th>
                                <th>Item</th>
                                <th>Qty</th>
                                <th>Item Price</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($orderx as $it) : ?>
                                <tr>
                                    <td><?= $it['id_item']; ?></td>
                                    <td><?= $it['name']; ?></td>
                                    <td><?= $it['qty']; ?></td>
                                    <td>Rp. <?= number_format($it['price']); ?></td>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
                <div class="row">
                    <div class="col-lg-4 col-sm-5">

                    </div>

                    <div class="col-lg-4 col-sm-5 ml-auto">
                        <table class="table table-clear">
                            <tbody>
                                <tr>
                                    <td class="left">
                                        <strong>Total</strong>
                                    </td>
                                    <td class="right">
                                        <strong>Rp. <?= number_format($itemx->total); ?></strong>
                                    </td>
                                </tr>
                            </tbody>
                        </table>

                    </div>

                </div>

            </div>
        </div>
    </div>
</body>
</footer>

<!-- sumber -->
<!-- https://codepen.io/daplo/pen/xYVQPz -->

<!-- Bootstrap core JavaScript-->
<script src="<?= base_url(); ?>assets/vendor/jquery/jquery.min.js"></script>
<script src="<?= base_url(); ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="<?= base_url(); ?>assets/vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="<?= base_url(); ?>assets/js/sb-admin.min.js"></script>

<script type="text/javascript">
    window.print();
</script>

</body>

</html>