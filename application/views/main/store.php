<div class="container">
    <div class="alert alert-primary alert-dismissible fade show" role="alert">
        <strong>Added to cart</strong> go to <a href="cart">Cart</a>.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="row mt-5 mb-5">
        <?php foreach ($item as $row) : ?>
            <div class="card" style="width: 20rem; margin: 5px;">
                <img class="card-img-top img-fluid" src="<?= base_url('assets/itempic/') . $row->image; ?>" alt="Card image cap" style="width: 350px; height:200px">
                <div class="card-body">
                    <p class="card-text">Item name : <?= $row->name;; ?></p>
                    <p>Price : <?= $row->price; ?></p>
                    <p>Stock : <?= $row->qty; ?></p>
                    <?= anchor('store/additem/' . $row->id, 'Add to cart', ['class' => 'btn btn-primary glyphicon glyphicon-zoom-in', 'role' => 'button']) ?>
                </div>
            </div>
        <?php endforeach ?>
    </div>
</div>