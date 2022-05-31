<div class="col-md-9 list-into-single">
	<div>
		<p class="list-page-single"><a href="<?= base_url()?>">Home</a></p>>><p class="list-page-single"><a href="<?= base_url('/landing/review-curriculum')?>">Review Kurikulum</a></p>
	</div>
</div>
<div class="col-md-9 single-post-posts" style="padding-bottom: 20px">

	<div id="title-post">
		<h2><?= $reviewCurriculum['title'] ?></h2>
	</div>
	<div class="detail-post">
		<p class="date-post">
			<span class="glyphicon glyphicon-dashboard" style="margin-right:5px;color:rgb(28, 71, 128)"></span><b>Tanggal :</b>
			<span class="text-date-post"><?= format_date($reviewCurriculum['title'], 'd F Y') ?></span>
		</p>
		<p class="created-post" style="margin-right:10px">
			<span class="glyphicon glyphicon-user" style="margin-right:5px;color:rgb(28, 71, 128)"></span><b>Ditulis oleh : </b>
			<span class="text-created-post"><?= $reviewCurriculum['writer_name'] ?></span>
		</p>
		<p class="created-post">
			<span class="glyphicon glyphicon-star" style="margin-right:5px;color:rgb(28, 71, 128)"></span><b>Dilihat oleh : </b>
			<span class="text-created-post"><?= $reviewCurriculum['count_view'] ?></span>
		</p>
	</div>
	<?php if(!empty($reviewCurriculum['attachment'])): ?>
	<a href="<?= base_url().'uploads/'.$reviewCurriculum['attachment'] ?>">
		<button class="btn btn-primary">Lihat Lampiran</button>
	</a>
	<?php endif; ?>
	<p id="isi-post">
	<div style="text-align:justify">
	<?= $reviewCurriculum['body'] ?>
	</div>


	<br>
	<br>
	<br>

	</p>

</div>