        <?php
        $total = 0;
        if ($keranjang = $this->cart->contents()) {
            foreach ($keranjang as $items) {
                $total = $total + $items['subtotal'];
            }
        }
        ?>
        <div class="card mb-3">
            <div class="card-header">
                <i class="fas fa-fw fa-money-bill-wave"></i>
                Checkout</div>
            <div class="card-body p-5">
                <?= form_open_multipart('checkout/submit'); ?>

                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" name="name" value="<?= ucwords($users['username']); ?>" readonly required>
                </div>

                <div class="form-group">
                    <label for="phone">Phone number</label>
                    <input type="number" class="form-control" id="phone" name="phone" value="<?= $users['phone']; ?>" required>
                </div>

                <div class="form-group">
                    <label for="adress">Home adress <small style="color:red">(must be accurate)</small></label>
                    <input type="text" class="form-control" id="adress" name="adress" value="<?= ucwords($users['adress']); ?>" required>
                </div>


                <div class="form-group">
                    <label for="courier">Courier</label>
                    <select class="form-control" name="courier" id="courier">
                        <option>JNE</option>
                        <option>TIKI</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="bank">Payment Method (bank transfer)</label>
                    <select class="form-control" name="bank" id="bank">
                        <option>Mandiri - xxxxxxxxxxx</option>
                        <option>BTN - xxxxxxxxxx</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="total">Total</label>
                    <input type="text" class="form-control" id="total" value="Rp. <?= number_format($total, 0, ',', '.') . "-"; ?>" readonly>
                </div>

                <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#myModal">Process</button>

                <!-- Modal -->
                <div id="myModal" class="modal fade" role="dialog">
                    <div class="modal-dialog">

                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">Checkout</h4>
                            </div>
                            <div class="modal-body">
                                <p>Are you sure?</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>

                    </div>
                </div>
                </form>
            </div>
        </div>