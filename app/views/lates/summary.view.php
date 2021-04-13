<?php

use App\Core\Auth;

require __DIR__ . '/../layouts/head.php'; ?>
<?= msg('VALIDATION_ERROR'); ?>

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
                            <th scope="col" class="sort" data-sort="budget">TOTAL LATE</th>
                            <th scope="col" class="sort" data-sort="budget">TOTAL PAYMENT</th>
                            <th scope="col" class="sort" data-sort="status">BALANCE</th>
                        </tr>
                    </thead>
                    <tbody class="list">

                        <?php
                        foreach ($summary as $sumList) :
                        ?>
                            <tr>
                                <td><?= $sumList['name'] ?></td>
                                <td><?= $sumList['total_late'] ?></td>
                                <td><?= $sumList['total_pay'] ?></td>
                                <td><?= $sumList['balance'] ?></td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th colspan="3" style="text-align:right">Total:</th>
                            <th></th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#projectTable').DataTable({
            "ordering": false,
            "paging": false,
            "footerCallback": function(row, data, start, end, display) {
                var api = this.api(),
                    data;

                // Remove the formatting to get integer data for summation
                var intVal = function(i) {
                    return typeof i === 'string' ?
                        i.replace(/[\$,]/g, '') * 1 :
                        typeof i === 'number' ?
                        i : 0;
                };

                // Total over all pages
                total = api
                    .column(3)
                    .data()
                    .reduce(function(a, b) {
                        return intVal(a) + intVal(b);
                    }, 0);

                // Total over this page
                pageTotal = api
                    .column(3, {
                        page: 'current'
                    })
                    .data()
                    .reduce(function(a, b) {
                        return intVal(a) + intVal(b);
                    }, 0);

                // Update footer
                $(api.column(3).footer()).html(
                    pageTotal
                );
            }
        });
    });
</script>

<?php require __DIR__ . '/../layouts/footer.php'; ?>