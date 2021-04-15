<?php

use App\Core\Auth;

require __DIR__ . '/../layouts/head.php'; ?>

<div class="row mb-0">
    <div class="col-md-12">
        <form method="POST" action="<?= route('entry') ?>">
            <div style="display: flex;flex-direction: row;align-items: flex-end;">
                <div class="form-group mb-0">
                    <label for="username">Select User</label>
                    <select name="late_user" class="form-control" style="width: 400px;">
                        <?php
                        foreach ($users_data as $userList) :
                        ?>
                            <option value="<?= $userList->id ?>"><?= $userList->fullname ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="d-flex justify-content-end ml-2"><button type="submit" class="btn btn-default btn-md text-rigth">ADD NEW LATE</button></div>
            </div>
        </form>
    </div>
</div>

<div class="row pb-3 mt-0">
    <div class="col">
        <?= msg('RESPONSE_MSG'); ?>
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
                        foreach ($late_datas as $late) : ?>
                            <tr>
                                <td><?= getUserName($late->user_id) ?></td>
                                <td><?= $late->date_created ?></td>
                                <td><?= $late->amount ?></td>
                                <td><a href="<?= route('delete', $late->id) ?>" style="color: red;"><i class="far fa-trash-alt"></i></a></td>
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