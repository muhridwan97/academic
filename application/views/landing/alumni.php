<div class="col-md-9 list-into-single">
	<div>
		<p class="list-page-single"><a href="<?= base_url()?>">Home</a></p>>><p class="list-page-single"><a href="#">Alumni</a></p>
	</div>
</div>
<div class="col-md-9 single-post-posts" style="padding-bottom: 20px;padding-left: 25px;padding-right:25px">
	<h2 class="title-section">ALUMNI</h2>
	<div class="underscore"></div>
	<table id="alumni" class="table display nowrap table-striped table-bordered" style="width:100%">
		<thead>
			<tr>
				<th style="text-align: center;">No</th>
				<th style="text-align: center;">Nama</th>
				<th style="text-align: center;">Alamat</th>
				<th style="text-align: center;">Pekerjaan</th>
				<th style="text-align: center;">Alamat Kantor</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($alumnis as $key => $alumni) { ?>
				<tr>
					<td><?= $key + 1 ?></td>
					<td><?= $alumni['name'] ?></td>
					<td><?= $alumni['address'] ?></td>
					<td><?= $alumni['job'] ?></td>
					<td><?= $alumni['office_address'] ?></td>
				</tr>
			<?php } ?>
		</tbody>
	</table>
</div>

<script type="text/javascript">
	$(document).ready(function() {
		$('#alumni').DataTable({
			"scrollX": true
		});
	});
</script>