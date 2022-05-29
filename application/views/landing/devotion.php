<div class="col-md-9 list-into-single">
	<div>
		<p class="list-page-single"><a href="../../index.html">Home</a></p>>><p class="list-page-single"><a href="#">Pengabdian</a></p>
	</div>
</div>
<div class="col-md-9 single-post-posts" style="padding-bottom: 20px;padding-left: 25px;padding-right:25px">
	<h2 class="title-section">PENGABDIAN</h2>
	<div class="underscore"></div>
	<table id="pengabdian" class="table display nowrap table-striped table-bordered">
		<thead>
			<tr>
				<th style="text-align: center;">No</th>
				<th style="text-align: center;">Nama</th>
				<th style="text-align: center;">Kegiatan</th>
				<th style="text-align: center;">Lokasi Pengabdian</th>
				<th style="text-align: center;">Sumber Dana</th>
				<th style="text-align: center;">Tahun</th>
				<th style="text-align: center;">Bukti</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($devotions as $key => $devotion) { ?>
				<tr>
					<td><?= $key + 1 ?></td>
					<td><?= $devotion['lecturer_name'] ?></td>
					<td><?= $devotion['activity'] ?></td>
					<td><?= $devotion['location'] ?></td>
					<td><?= $devotion['source_of_funds'] ?></td>
					<td><?= $devotion['year'] ?></td>
					<td><a href="<?= if_empty($devotion['proof_link'], "#") ?>"><?= !empty($devotion['proof_link'])? "Sertifikat": "-" ?></a></td>
				</tr>
			<?php } ?>
		</tbody>
	</table>
</div>

<script type="text/javascript">
	$(document).ready(function() {
		$('#pengabdian').DataTable({
			"scrollX": true
		});
	});
</script>