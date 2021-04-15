<?php

use App\Core\Auth;

require __DIR__ . '/../layouts/head.php'; ?>

<div class="row">
    <div class="col-6 mt-2">
        <div class="card" style="background-color: #fff; border: 0px; border-radius: 8px; box-shadow: 0 4px 5px 0 rgba(0,0,0,0.2);">
            <div class="card-body">
                <?= msg('RESPONSE_MSG'); ?>

                <form method="POST" action="<?= route('deduction') ?>">
                    <div class="form-group">
                        <label for="username">Amount to deduct</label>
                        <input type="text" class="form-control" name="deduct-amount" autocomplete="off" value="<?= number_format($deduct_data['amount'], 2) ?>">
                    </div>

                    <div class="d-flex justify-content-end"><button type="submit" class="btn btn-default btn-sm text-rigth">SAVE CHANGES</button></div>
                </form>
            </div>
        </div>
    </div>
</div>


<?php require __DIR__ . '/../layouts/footer.php'; ?>