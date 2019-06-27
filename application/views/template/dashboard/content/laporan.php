<div class="card">
    <h5 class="card-header"><i class="fas fa-fw fa-file-invoice"></i>LAPORAN</h5>
    <?= $this->session->flashdata('message'); ?>

    <div class="card-body">

        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Phone</th>
                        <th>Adress</th>
                        <th>Total</th>
                        <th>Status</th>
                        <th>Created</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Phone</th>
                        <th>Adress</th>
                        <th>Total</th>
                        <th>Status</th>
                        <th>Created</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
                <tbody>
                    <?php foreach ($laporan as $in) : ?>
                        <tr>
                            <td><?= $in['id']; ?></td>
                            <td><?= ucfirst($in['name']); ?></td>
                            <td><?= $in['phone']; ?></td>
                            <td><?= ucwords($in['adress']); ?></td>
                            <td>Rp. <?= number_format($in['total']); ?></td>
                            <td><?= $in['status']; ?></td>
                            <td><?= date('d F Y', $in['date_created']); ?></td>
                            <td><?= anchor('admin/detailinvoice/' . $in['id'] . '/' . $in['name'], 'Detail', ['class' => 'btn btn-info glyphicon glyphicon-zoom-in', 'role' => 'button']) ?>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
        <div class="text-center">
            <a class="btn btn-primary" href="javascript: w=window.open('<?= base_url('admin/cetak_laporan') ?>') "> <span class="fa fa-fw fa-print"></span> Print</a>
        </div>

        <!-- <div class="text-center">
            <a class="btn btn-default btn-sm bg-primary " href="javascript: w=window.open('<?= base_url('admin/cetak_laporan') ?>') "> <span class="glyphicon glyphicon-print"></span> Print</a>
        </div> -->
    </div>
</div>