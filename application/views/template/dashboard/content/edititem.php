<div class="card mb-3">
    <div class="card-header">
        <i class="fas fa-fw fa-edit"></i>
        Edit Item</div>
    <div class="card-body ">
        <?php echo form_open_multipart('admin/ubahitem'); ?>

        <div class="form-group">
            <label for="id">ID</label>
            <input type="text" class="form-control" id="id" name="id" value="<?= $items->id; ?>" readonly>
            <?= form_error('id', '<small class="text-danger pl-3">', '</small>') ?>
        </div>

        <div class="form-group">
            <label for="name">Item name</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Item name" value="<?= $items->name; ?>">
            <?= form_error('name', '<small class="text-danger pl-3">', '</small>') ?>
        </div>

        <div class="form-group">
            <label for="price">Price</label>
            <input type="number" class="form-control" id="price" name="price" placeholder="Price" value="<?= $items->price; ?>">
            <?= form_error('price', '<small class="text-danger pl-3">', '</small>') ?>
        </div>

        <div class="form-group">
            <label for="qty">Quantity</label>
            <input type="number" class="form-control" id="qty" name="qty" placeholder="Quantity" value="<?= $items->qty; ?>" autocomplete="off">
            <?= form_error('qty', '<small class="text-danger pl-3">', '</small>') ?>
        </div>

        <div class="form-group">
            <img src="<?= base_url('assets/itempic/') . $items->image; ?>" alt="" width="100px" height="100px">
            <label for="image">Input picture</label>
            <input type="file" class="form-control-file" id="image" name="image">
            <?= form_error('image', '<small class="text-danger pl-3">', '</small>') ?>
        </div>

        <button type="submit" class="btn btn-primary mb-2">EDIT</button>
        </form>
    </div>
</div>
</div>