<div class="card mb-3">
    <div class="card-header">
        <i class="fas fa-fw fa-check-circle"></i>
        Payment Confirm</div>
    <?= $this->session->flashdata('message'); ?>
    <div class="card-body p-5">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>User ID</th>
                        <th>Username</th>
                        <th>Image</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>No</th>
                        <th>User ID</th>
                        <th>Username</th>
                        <th>Image</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
                <tbody>
                    <?php foreach ($confirm as $c) : ?>
                        <tr>
                            <td><?= $c['id']; ?></td>
                            <td><?= $c['userid']; ?></td>
                            <td><?= ucfirst($c['username']); ?></td>
                            <td><a href="<?= base_url('assets/confirm/') . $c['image']; ?> "><img class="rounded mx-auto d-block" height="100px" width="100px" src="<?= base_url('assets/confirm/') . $c['image']; ?>" alt=""></a></a></td>
                            <td><?= anchor('admin/deletepay/' . $c['id'], 'Delete', ['class' => 'btn btn-danger', 'role' => 'button']) ?></td>

                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</div>