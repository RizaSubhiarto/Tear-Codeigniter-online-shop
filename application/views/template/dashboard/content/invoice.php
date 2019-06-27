<div class="card">
    <h5 class="card-header"><i class="fas fa-fw fa-file-invoice"></i>Invoice</h5>
    <?= $this->session->flashdata('message'); ?>
    <div class="card-body">
        <h5 class="card-title">Invoice</h5>
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
                    <?php foreach ($invoice as $in) : ?>
                        <tr>
                            <td><?= $in['id']; ?></td>
                            <td><?= ucfirst($in['name']); ?></td>
                            <td><?= $in['phone']; ?></td>
                            <td><?= ucwords($in['adress']); ?></td>
                            <td>Rp. <?= number_format($in['total']); ?></td>
                            <td><?= $in['status']; ?></td>
                            <td><?= date('d F Y', $in['date_created']); ?></td>
                            <td><?= anchor('admin/detailinvoice/' . $in['id'] . '/' . $in['name'], 'Detail', ['class' => 'btn-sm btn btn-info', 'role' => 'button']) ?>
                                <?= anchor('admin/confirm/' . $in['id'], 'Confirm', ['class' => 'btn btn-success btn-sm', 'role' => 'button']) ?>
                                <?= anchor('admin/deleteinv/' . $in['id'], 'Delete', ['class' => 'btn btn-danger btn-sm', 'role' => 'button']) ?>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</div>