<div class="card">
    <div class="card-header">
        My profile
    </div>
    <div class="card-body">
        <p class="card-text d-flex justify-content-center">
            <img class="img-profile rounded-circle img-thumbnail" style="height: 90px; width: 90px;" src="<?= base_url('assets/profile/') . $users['image']; ?>">
            <p class="text-center"><?= 'Name : ' . ucfirst($users['username']); ?></p>
            <p class="text-center"><?= 'Email : ' . ucfirst($users['email']); ?></p>
            <p class="text-center"><?= 'Adress : ' . ucfirst($users['adress']); ?></p>
            <p class="text-center"><?= 'User type : ' . ucfirst($users['roleid']); ?></p>
            <a class="btn btn-primary mx-auto" href="profile/edit">Edit Profile</a>
        </p>
    </div>
</div>