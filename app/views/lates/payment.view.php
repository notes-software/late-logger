<?php

use App\Core\Auth;

require __DIR__ . '/../layouts/head.php'; ?>
<?= msg('VALIDATION_ERROR'); ?>
<div class="row mb-0">
    <div class="col-md-12">
        <form method="POST" action="<?= route('payment') ?>">
            <div style="display: flex;flex-direction: row;align-items: flex-end;">
                <div class="form-group mb-0">
                    <label for="username">Select User</label>
                    <select name="pay_user" class="form-control" style="width: 400px;">
                        <?php
                        foreach ($users_data as $userList) :
                        ?>
                            <option value="<?= $userList->id ?>"><?= $userList->fullname ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group mb-0 ml-2">
                    <label for="pay_amount">Amount</label>
                    <input type="number" class="form-control" name="pay_amount" id="pay_amount" min="0">
                </div>
                <div class="d-flex justify-content-end ml-2"><button type="submit" class="btn btn-default btn-md text-rigth">ADD PAYMENT</button></div>
            </div>
        </form>
    </div>
</div>

<div class="row pb-3 mt-0">
    <div class="col">
        <?= msg('ALERT_MSG', "success"); ?>
        <div class="card">
            <!-- Light table -->
            <div class="table-responsive">
                <table class="table align-items-center table-striped table-bordered" id="projectTable">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col" class="sort" data-sort="name">NAME</th>
                            <th scope="col" class="sort" data-sort="budget">DATE</th>
                            <th scope="col" class="sort" data-sort="status">AMOUNT</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody class="list">

                        <?php
                        foreach ($payment_datas as $pay) : ?>
                            <tr>
                                <td><?= getUserName($pay->user_id) ?></td>
                                <td><?= $pay->date_created ?></td>
                                <td><?= $pay->amount ?></td>
                                <td><a href="<?= route('payment/delete', $pay->id) ?>" style="color: red;"><i class="far fa-trash-alt"></i></a></td>
                            </tr>
                        <?php endforeach ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#projectTable').DataTable({
            "ordering": false
        });
    });
</script>

<?php require __DIR__ . '/../layouts/footer.php'; ?>