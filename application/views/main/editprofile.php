<div class="card">
    <div class="card-header">
        Edit profile
    </div>
    <div class="card-body p-5">
        <?= $this->session->flashdata('message'); ?>
        <?= form_open_multipart('profile/edit'); ?>
        <div class="form-group row">
            <label for="email">Email</label>
            <input type="text" class="form-control" id="email" name="email" value="<?= $users['email']; ?>" readonly>
        </div>
        <div class="form-group row">
            <label for="username">Username</label>
            <input type="text" class="form-control" id="username" name="username" value="<?= $users['username']; ?>">
        </div>
        <div class="form-group row">
            <label for="adress">Home adress</label>
            <input type="text" class="form-control" id="adress" name="adress" value="<?= $users['adress']; ?>">
        </div>
        <div class="form-group row">
            <label for="phone">Phone number</label>
            <input type="text" class="form-control" id="phone" name="phone" value="<?= $users['phone']; ?>">
        </div>
        <div class="form-group row">
            <label for="image">Image</label><br>
            <div class="col-sm-2">

                <img src="<?= base_url('assets/profile/') . $users['image']; ?>" class="img-thumbnail" alt="gege" style="height: 100px; width: 100px;"><input type="file" class="form-control-file mx-auto" id="image" name="image">
            </div>
        </div>
        <div class="form-group row">
            <div class="mx-auto">
                <button type="sumbit" class="btn btn-primary"> Edit </button>
            </div>
        </div>
        </form>
    </div>
</div>