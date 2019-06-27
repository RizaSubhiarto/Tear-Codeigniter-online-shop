<!-- DataTables Example -->
<div class="card mb-3">
    <div class="card-header">
        <i class="fas fa-table"></i>
        Item List</div>
    <?= $this->session->flashdata('message'); ?>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Item name</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>ID</th>
                        <th>Item name</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
                <tbody>
                    <?php foreach ($itemlist as $i) : ?>
                        <tr>
                            <td><?= $i['id']; ?></td>
                            <td><?= ucfirst($i['name']); ?></td>
                            <td>Rp.<?= number_format($i['price']); ?></td>
                            <td><?= $i['qty']; ?></td>
                            <td><?= anchor('admin/edititem/' . $i['id'], 'Edit', ['class' => 'btn btn-primary glyphicon glyphicon-zoom-in', 'role' => 'button']) ?> <?= anchor('admin/delete/' . $i['id'], 'Delete', ['class' => 'btn btn-danger glyphicon glyphicon-zoom-in', 'role' => 'button']) ?></td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
    <!-- end div table -->
</div>