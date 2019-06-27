<div class="card mb-3">
    <div class="card-header">
        <i class="fas fa-fw fa-check-circle"></i>
        Confirm</div>
    <div class="card-body p-5">
        <?= $this->session->flashdata('message'); ?>
        <?= form_open_multipart('confirm/index'); ?>
        <div class="form-group">
            <label for="userid">User ID</label>
            <input type="text" class="form-control" id="userid" name="userid" value="<?= $users['userid']; ?>" readonly>
            <?= form_error('userid', '<small class="text-danger pl-3">', '</small>') ?>
        </div>

        <div class="form-group">
            <label for="username">Username</label>
            <input type="text" class="form-control" id="username" name="username" value="<?= ucwords($users['username']); ?>" readonly>
            <?= form_error('username', '<small class="text-danger pl-3">', '</small>') ?>
        </div>

        <div class="form-group row">
            <div class="col-sm-2">
                <label for="image">Image</label>
                <input type="file" class="form-control-file mx-auto" id="image" name="image" required>
            </div>
        </div>


        <button class="btn btn-primary" type="submit">Submit</button>
        </form>

    </div>
</div>