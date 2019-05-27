<!-- DataTables Example -->
<div class="card mb-3">
    <div class="card-header">
        <i class="fas fa-table"></i>
        Data Table Example</div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Item name</th>
                        <th>Price</th>
                        <th>Quantity</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>ID</th>
                        <th>Item name</th>
                        <th>Price</th>
                        <th>Quantity</th>
                    </tr>
                </tfoot>
                <tbody>
                    <?php foreach ($itemlist as $i) : ?>
                        <tr>
                            <td><?= $i['id']; ?></td>
                            <td><?= $i['name']; ?></td>
                            <td><?= $i['price']; ?></td>
                            <td><?= $i['qty']; ?></td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
    <!-- end div table -->
</div>