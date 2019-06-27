<div class="card mb-3">
    <div class="card-header">
        <i class="fas fa-fw fa-shopping-cart"></i>
        Cart</div>
    <div class="card-body p-5">
        <?= $this->session->flashdata('message'); ?>

        <table class="table" cellpadding="6" cellspacing="1" style="width:100%">

            <tr>
                <th>QTY</th>
                <th>Item Name</th>
                <th style="text-align:right">Item Price</th>
                <th style="text-align:right">Sub-Total</th>
            </tr>

            <?php $i = 1; ?>

            <?php foreach ($this->cart->contents() as $items) : ?>

                <?php echo form_hidden($i . '[rowid]', $items['rowid']); ?>

                <tr>
                    <td>
                        <!-- <?php echo form_input(array('name' => $i . '[qty]', 'value' => $items['qty'], 'maxlength' => '3', 'size' => '5')); ?> -->
                        <?= $items['qty']; ?>
                    </td>

                    <td>
                        <?php echo $items['name']; ?> <?= anchor('home/delete/' . $items['rowid'], 'Remove', ['class' => 'btn btn-danger  btn-xs ml-2', 'role' => 'button']) ?>

                        <?php if ($this->cart->has_options($items['rowid']) == TRUE) : ?>

                            <p>
                                <?php foreach ($this->cart->product_options($items['rowid']) as $option_name => $option_value) : ?>

                                    <strong><?php echo $option_name; ?>:</strong> <?php echo $option_value; ?><br />

                                <?php endforeach; ?>
                            </p>

                        <?php endif; ?>

                    </td>
                    <td style="text-align:right">Rp.<?php echo $this->cart->format_number($items['price']); ?></td>
                    <td style="text-align:right">Rp.<?php echo $this->cart->format_number($items['subtotal']); ?></td>
                </tr>

                <?php $i++; ?>

            <?php endforeach; ?>

            <tr>
                <td colspan="2"> </td>
                <td class="right"><strong>Total</strong></td>
                <td class="right">Rp.<?php echo $this->cart->format_number($this->cart->total()); ?></td>
            </tr>

        </table>
        <br>
        <hr>
        <br>
        <div class="container" align="right">
            <a class="btn btn-primary" href="<?= base_url('home'); ?>">Continue Shopping</a>
            <a class="btn btn-danger" href="<?= base_url('checkout/delete'); ?>">Delete Cart</a>
            <a class="btn btn-success" href="<?= base_url('checkout'); ?>">Check Out</a>
        </div>

    </div>
</div>