<?php

use App\Core\Auth;

require __DIR__ . '/../layouts/head.php'; ?>

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
                        </tr>
                    </thead>
                    <tbody class="list">

                        <?php
                        foreach ($late_datas as $late) : ?>
                            <tr>
                                <td><?= getUserName($late['user_id']) ?></td>
                                <td><?= $late['date_created'] ?></td>
                                <td><?= $late['amount'] ?></td>
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