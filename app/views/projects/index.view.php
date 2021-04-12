<?php

use App\Core\Auth;

require __DIR__ . '/../layouts/head.php'; ?>

<div class="row">
	<div class="col-md-12 pb-3">
		<a href="<?= route('project/add') ?>" class="btn btn-secondary btn-sm text-rigth"><i class="fas fa-plus"></i> Add Project</a>
	</div>
</div>

<div class="row pb-3">
	<div class="col">
		<?= msg('ALERT_MSG', "success"); ?>
		<div class="card">
			<!-- Light table -->
			<div class="table-responsive">
				<table class="table align-items-center table-striped table-bordered" id="projectTable">
					<thead class="thead-light">
						<tr>
							<th scope="col" class="sort" data-sort="name">Project Code</th>
							<th scope="col" class="sort" data-sort="budget">Project Name</th>
							<th scope="col" class="sort" data-sort="status">Project Description</th>
							<th scope="col"></th>
						</tr>
					</thead>
					<tbody class="list">
						<?php foreach ($project_datas as $projects) : ?>
							<tr>
								<td><a href="<?= route('project/detail', $projects->id) ?>"><?= $projects->project_code ?></a></td>
								<td><?= $projects->project_name ?></td>
								<td><?= $projects->description ?></td>
								<td><a href="<?= route('project/delete', $projects->id) ?>" style="color: red;"><i class="far fa-trash-alt"></i></a></td>
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
		$('#projectTable').DataTable();
	});
</script>

<?php require __DIR__ . '/../layouts/footer.php'; ?>