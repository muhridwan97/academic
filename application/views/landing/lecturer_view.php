<div class="col-md-9 list-into-single">
	<div>
		<p class="list-page-single"><a href="<?= base_url() ?>">Home</a></p>>><p class="list-page-single"><a href="#"><?= $lecturer['name'] ?></a></p>
	</div>
</div>
<div class="col-md-9 single-post-posts" style="padding-bottom: 20px;padding-left: 25px;padding-right:25px">

	<div id="title-post" style="margin-bottom:20px">
		<h2><?= $lecturer['name'] ?></h2>
		<div class="underscore" style="margin-left:0px;margin-left:0px;margin-bottom:15px;"></div>
	</div>
	<br />

	<div class="col-md-12 text-center" style="padding-bottom: 20px;">
		<img src="<?= letter_url() . 'uploads/' . $lecturer['avatar'] ?>" alt="avatar" style="height: 150px; width: 150px;border-radius: 50%;">
	</div>

	<p class="form-control-plaintext">
		<?= if_empty($lecturer['profile'], '-') ?>
	</p>
</div>