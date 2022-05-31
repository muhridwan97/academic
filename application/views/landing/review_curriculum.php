<div class="col-md-9 list-into-single">
	<div>
		<p class="list-page-single"><a href="../../index.html">Beranda</a></p>
		<p class="list-page-single">>> <a href="#">Review Kurikulum</a></p>
	</div>
</div>
<div class="col-md-9 single-post-posts">

	<div id="title-list-posts-wrap">
		<h2 class="title-section" style="text-align:left">Review Kurikulum</h2>
		<div class="underscore" style="margin-left:0px;margin-right:0px;"></div>
	</div>

	<?php foreach ($data as $row) :?>
	<div class="panel-post-wrap">

		<div class="custom-entry" style="margin-right:25px">
			<div class="entry-month">
				<?= format_date($row['date'], 'F') ?> </div>
			<div class="entry-date">
				<?= format_date($row['date'], 'd') ?>  </div>
			<div class="entry-month">
				<?= format_date($row['date'], 'Y') ?>  </div>
		</div>

		<h3 class="title-isi-list-posts"><a href="<?= base_url('/landing/review-curriculum-view/'.$row['id']) ?>"><?= $row['title'] ?></a></h3>
		<div class="detail-post detail-post-list-posts">
			<p class="created-post">
				<span class="glyphicon glyphicon-user" style="margin-right:5px;color:#407DC2"></span><b>Ditulis oleh : </b>
				<span class="text-created-post"><?= $row['writer_name'] ?></span>
			</p>
			<div class="isi-lists-posts">
				<?= substr($row['body'], 0, 200)  ?> ....
			</div>
			<a href="<?= base_url('/landing/review-curriculum-view/'.$row['id']) ?>">
				<button type="button" class="btn btn-primary">Read More</button>
			</a>
		</div>
	</div>
	<?php endforeach; ?>

	<div class="col-sm-12 pagination-wrap">
		<?php echo $pagination; ?>
	</div>
</div>