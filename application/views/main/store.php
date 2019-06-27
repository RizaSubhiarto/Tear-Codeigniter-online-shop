<div class="container">
    <?= $this->session->flashdata('message'); ?>
    <div class="row mt-10 mb-5 mx-auto ">
        <?php foreach ($item as $row) : ?>
            <div class="card mx-auto col-sm-3 m-1" style="border-radius:25px;">
                <a href="<?= base_url('assets/itempic/') . $row->image; ?>">
                    <img style="border-radius:30px; height:200px;" class="card-img-top mt-2 img-fluid" src="<?= base_url('assets/itempic/') . $row->image; ?>" alt="Card image cap"></a>
                <div class=" card-body">
                    <p class="card-text">Item Name : <?= ucwords($row->name); ?></p>
                    <p>Price : Rp.<?= number_format($row->price, 0, ',', '.') . "-"; ?></p>
                    <p>Ready Stock : <?= $row->qty; ?></p>
                    <div class="text-center">
                        <?= anchor('home/addcart/' . $row->id, 'Add to cart', ['class' => 'btn btn-primary', 'role' => 'button']) ?>
                    </div>
                </div>
            </div>
        <?php endforeach ?>
    </div>
</div>