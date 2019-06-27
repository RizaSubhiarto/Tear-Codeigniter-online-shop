<!-- DataTables Example -->
<div class="card mb-3">
    <div class="card-header">
        <i class="fas fa-table"></i>
        User Table</div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Home adress</th>
                        <th>Phone Number</th>
                        <th>User Type</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>ID</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Home adress</th>
                        <th>Phone Number</th>
                        <th>User Type</th>
                    </tr>
                </tfoot>
                <tbody>
                    <?php foreach ($userlist as $u) : ?>
                        <tr>
                            <td><?= $u['userid']; ?></td>
                            <td><?= ucwords($u['username']); ?></td>
                            <td><?= $u['email']; ?></td>
                            <td><?= ucwords($u['adress']); ?></td>
                            <td><?= $u['phone']; ?></td>
                            <td><?= $u['roleid']; ?></td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
    <!-- end div table -->
</div>