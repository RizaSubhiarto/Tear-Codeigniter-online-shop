<div class="card mb-3">
    <div class="card-header">
        <i class="fas fa-fw fa-money-bill-wave"></i>
        Invoice Detail</div>
    <div class="card-body p-5">
        <?= form_open_multipart('admin/confirm'); ?>

        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" value="<?= ucwords($itemx->name); ?>" readonly>
        </div>

        <div class="form-group">
            <label for="date">Date</label>
            <input type="text" class="form-control" id="date" value="<?= date('d F Y', $itemx->date_created); ?>" readonly>
        </div>

        <div class="form-group">
            <label for="phone">Phone number</label>
            <input type="text" class="form-control" id="phone" value="<?= $itemx->phone; ?>" readonly>
        </div>

        <div class="form-group">
            <label for="adress">Home adress <small style="color:red">(must be accurate)</small></label>
            <input type="text" class="form-control" id="adress" value="<?= ucwords($itemx->adress); ?>" readonly>
        </div>

        <div class="form-group">
            <label for="courier">Courier</label>
            <input type="text" class="form-control" id="courier" value="<?= $itemx->courier; ?>" readonly>
        </div>

        <div class="form-group">
            <label for="bank">Bank</label>
            <input type="text" class="form-control" id="bank" value="<?= $itemx->bank; ?>" readonly>
            </select>
        </div>

        <div class="form-group">
            <label for="total">Total</label>
            <input type="text" class="form-control" id="total" value="Rp. <?= number_format($itemx->total, 0, ',', '.'); ?>" readonly>
        </div>

        <div class="form-group">
            <label for="status">Status</label>
            <input type="text" class="form-control" id="status" value="<?= $itemx->status; ?>" readonly>
        </div>

        <br>
        <hr><br>
        <div class=" table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>ID Item</th>
                        <th>Item Name</th>
                        <th>QTY</th>
                        <th>Price</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>ID Item</th>
                        <th>Item Name</th>
                        <th>QTY</th>
                        <th>Price</th>
                    </tr>
                </tfoot>
                <tbody>
                    <?php foreach ($orderx as $it) : ?>
                        <tr>
                            <td><?= $it['id_item']; ?></td>
                            <td><?= ucwords($it['name']); ?></td>
                            <td><?= $it['qty']; ?></td>
                            <td>Rp. <?= number_format($it['price']); ?></td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
        <br><br>
        <div class="container" align="center">
            <a class="btn btn-warning" href="<?= base_url('admin/invoice'); ?>">Back</a>

            <?= anchor('admin/confirm/' . $itemx->id, 'Confirm', ['class' => 'btn btn-primary', 'role' => 'button']) ?>

            <a class="btn btn-primary" href="javascript: w=window.open('<?= base_url('admin/printinvoice/') . $itemx->id; ?>') "> <span class="fa fa-fw fa-print"></span> Print</a>
        </div>
        </form>
    </div>
</div>