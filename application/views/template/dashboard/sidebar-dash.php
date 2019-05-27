<!-- Sidebar -->
<ul class="sidebar navbar-nav">
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('admin'); ?>">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
        </a>
        <a class="nav-link" href="<?= base_url('admin/additem'); ?>">
            <i class="fas fa-fw fa-plus-circle"></i>
            <span>Add item</span>
        </a>
        <a class="nav-link" href="<?= base_url('admin/itemtable'); ?>">
            <i class="fas fa-fw fa-list-alt"></i>
            <span>Item list</span>
        </a>
        <a class="nav-link" href="<?= base_url('user/logout'); ?>">
            <i class="fas fa-fw fa-sign-out-alt"></i>
            <span>Logout</span>
        </a>
    </li>
</ul>
<div id="content-wrapper">

    <div class="container-fluid">