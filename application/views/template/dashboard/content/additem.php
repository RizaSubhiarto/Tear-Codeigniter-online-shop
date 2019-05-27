<?= $this->session->flashdata('message'); ?>
<div class="card-body ">
    <?php echo form_open_multipart('admin/additem'); ?>
    <div class="form-group">
        <label for="itemname">Item name</label>
        <input type="text" class="form-control" id="name" name="name" placeholder="Item name" value="<?= set_value('name'); ?>">
        <?= form_error('name', '<small class="text-danger pl-3">', '</small>') ?>
    </div>
    <div class="form-group">
        <label for="price">Price</label>
        <input type="number" class="form-control" id="price" name="price" placeholder="Price" value="<?= set_value('price'); ?>">
        <?= form_error('price', '<small class="text-danger pl-3">', '</small>') ?>
    </div>
    <div class="form-group">
        <label for="qty">Quantity</label>
        <input type="number" class="form-control" id="qty" name="qty" placeholder="Quantity" value="<?= set_value('qty'); ?>" autocomplete="off">
        <?= form_error('qty', '<small class="text-danger pl-3">', '</small>') ?>
    </div>
    <div class="form-group">
        <label for="image">Input picture</label>
        <input type="file" class="form-control-file" id="image" name="image">
        <?= form_error('image', '<small class="text-danger pl-3">', '</small>') ?>
    </div>
    <button type="submit" class="btn btn-primary mb-2">POST</button>
    </form>
</div>