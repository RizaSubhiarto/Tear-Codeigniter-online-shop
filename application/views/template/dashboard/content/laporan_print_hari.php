<!DOCTYPE html>
<html>

<head>
    <!-- <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge"> -->
    <title>Print Data Pembelian</title>
</head>

<body>
    <style type="text/css">
        .table-data {
            width: 100%;
            border-collapse: collapse;
        }

        .table-data tr th,
        .table-data tr td {
            border: 1px solid black;
            font-size: 10pt;
        }

        thead {
            background-color: wheat;

        }

        .container {
            margin: 2rem;
        }
    </style>
    <div class="container">
        <center>
            <h3>LAPORAN DATA PEMBELIAN </h3>
        </center>

        <br>
        <table class="table-data">
            <!-- <table class="table table-bordered table-striped table-hover" id="table-datatable"> -->
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Handphone</th>
                    <th>Address</th>
                    <th>Total</th>
                    <th>Create In</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                foreach ($laporan as $in) {
                    ?>
                    <tr>
                        <td><?= $in['id']; ?></td>
                        <td><?= ucfirst($in['name']); ?></td>
                        <td><?= $in['phone']; ?></td>
                        <td><?= $in['adress']; ?></td>
                        <td>Rp. <?= number_format($in['total']); ?></td>
                        <td><?= date('d F Y', $in['date_created']); ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
        <script type="text/javascript">
            window.print();
        </script>
    </div>

</body>

</html>