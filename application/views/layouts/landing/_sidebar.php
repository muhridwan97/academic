<?php
$segment1 = $this->uri->segment(1);
$segment2 = $this->uri->segment(2);
?>

<div id="wrap-sidebar-single" class="col-md-3">
	<div id="populer-wrap" class="col-md-12 col-sm-6">
		<div class="title-sidebar">
			<h4 style="color:#407DC2">
				<span class="glyphicon glyphicon-file"></span>
				<b>POST</b> POPULER
			</h4>
			<div class="underscore" style="margin-left:0px;margin-left:0px;margin-bottom:15px;"></div>
		</div>

		<div id="post-populer-sidebar">
			<ul id="post-populer-sidebar-list">
				<?php foreach ($postPopulars as $key => $post) : ?>
				<li><a href="<?= base_url('landing/review-curriculum-view/'.$post['id'])?>"><span class="glyphicon glyphicon-file" style="margin-right:5px"></span><?= $post['title'] ?></a></li>
				<?php endforeach; ?>
			</ul>
		</div>
	</div>
</div>