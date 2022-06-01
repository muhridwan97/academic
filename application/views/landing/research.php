<div class="col-md-9 list-into-single">
	<div>
		<p class="list-page-single"><a href="<?= base_url()?>">Home</a></p>>><p class="list-page-single"><a href="#">Penelitian</a></p>
	</div>
</div>
<div class="col-md-9 single-post-posts" style="padding-bottom: 20px;padding-left: 25px;padding-right:25px">
	<h2 class="title-section">PENELITIAN</h2>
	<div class="underscore"></div>
	<table id="penelitian" class="table display nowrap table-striped table-bordered">
		<thead>
			<tr>
				<th style="text-align: center;">No</th>
				<th style="text-align: center;">Nama</th>
				<th style="text-align: center;">Judul</th>
				<th style="text-align: center;">Jenis Penelitian</th>
				<th style="text-align: center;">Sumber Dana</th>
				<th style="text-align: center;">Tahun</th>
				<th style="text-align: center;">Akreditasi Journal</th>
				<th style="text-align: center;">Alamat Journal</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($researches as $key => $research) { ?>
				<tr>
					<td><?= $key + 1 ?></td>
					<td><?= $research['lecturer_name'] ?></td>
					<td><?= $research['research_title'] ?></td>
					<td><?= $research['research_type'] ?></td>
					<td><?= $research['source_of_funds'] ?></td>
					<td><?= $research['year'] ?></td>
					<td><?= $research['journal_accreditation'] ?></td>
					<td><a href="<?= $research['journal_link'] ?>"><?= $research['journal_link'] ?></a></td>
				</tr>
			<?php } ?>
		</tbody>
	</table>
</div>

<script type="text/javascript">
	$(document).ready(function() {
		$('#penelitian').DataTable({
			"scrollX": true
		});
	});
</script>