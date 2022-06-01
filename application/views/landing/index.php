<div id="myModal" class="modal fade" role="dialog">
	<div class="modal-dialog">

		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 style="color:rgb(28, 71, 128);font-family: myf;text-align:center;">Login Mahasiswa</h4>
			</div>
			<div class="modal-body">
				<div class="col-sm-12" style="text-align: center;margin-bottom:50px">
					<img src="assets/img/wew.png" style="width: 100px">
				</div>
				<form action="https://akademik.pkimuin-suka.ac.id/Login/aksi_login" method="post" accept-charset="utf-8">
					<form action="https://akademik.pkimuin-suka.ac.id/Pagemhs/aksi_login" method="post">
						<div class="col-sm-4" style="text-align: right;">
							<label style="margin-left:40px;position: relative;top:3px;font-family: myf2 ">NIM : </label>
						</div>
						<div class="col-sm-8">
							<input type="text" name="nim" placeholder="Input Your NIM" style="width: 100%" required>
						</div>

						<div class="col-sm-4" style="text-align: right;margin-top: 30px">
							<label style="margin-left:40px;position: relative;top:3px;font-family: myf2 ">Password : </label>
						</div>
						<div class="col-sm-8" style="margin-top: 30px">
							<input type="Password" name="password" placeholder="Input Your Password" style="width: 100%" required>
						</div>




						<center>
							<button type="submit" style="margin-top: 50px" class="btn btn-primary"><i class="glyphicon glyphicon-send" style="margin-right:5px"></i>Login Mahasiswa</button>
						</center>
					</form>
			</div>
			<div class="modal-footer">
			</div>
		</div>

	</div>
</div>
<!--   <script type="text/javascript">
    function navbars(id, no){
      $.ajax({
        type: "GET",
        url: "https://akademik.pkimuin-suka.ac.id/Admin/dropdown//"+id,
        dataType: "JSON",
        success:function(data){
          var subcat = "";
          for(var i=0;i<data.length;i++){
            if(data[i].keterangan == "halaman"){
              subcat += '<li><a href="https://akademik.pkimuin-suka.ac.id/welcome/halaman/'+data[i].id_menu+'">'+data[i].nama_menu+'</a></li>';
            }else if(data[i].keterangan == "kategori"){
              subcat += '<li><a href="https://akademik.pkimuin-suka.ac.id/welcome/list_post/'+data[i].id_menu+'">'+data[i].nama_menu+'</a></li>';
            }
          }
          $('.listss'+no).html(subcat);
        },
        error:function(){
          alert("error");
        }
      });
    }
  </script> -->
<div class="container">
	<div class="col-sm-12">
		<h2 class="title-section">PENELITIAN</h2>
		<div class="underscore"></div>
		<table class="table table-responsive table-striped table-bordered">
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
				<?php foreach ($data['researches'] as $key => $research) : ?>
					<tr>
						<td><?= $key+1 ?></td>
						<td><?= $research['lecturer_name'] ?></td>
						<td><?= $research['research_title'] ?></td>
						<td><?= $research['research_type'] ?></td>
						<td><?= $research['source_of_funds'] ?></td>
						<td><?= $research['year'] ?></td>
						<td><?= $research['journal_accreditation'] ?></td>
						<td><a href="<?= if_empty($research['journal_link'],'#')?>"><?= if_empty($research['journal_link'],'#') ?></a></td>
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
		<a href="<?= base_url('/landing/research') ?>">
			<button class="btn btn-primary"><b>SELENGKAPNYA </b><i class="glyphicon glyphicon glyphicon-hand-right" style="margin-left: 5px"></i></button>
		</a>
	</div>

	<div class="col-sm-12">
		<h2 class="title-section">PENGABDIAN</h2>
		<div class="underscore"></div>
		<table class="table table-responsive table-striped table-bordered">
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
				
			<?php foreach ($data['devotions'] as $key => $devotion) : ?>
					<tr>
						<td><?= $key+1 ?></td>
						<td><?= $devotion['lecturer_name'] ?></td>
						<td><?= $devotion['activity'] ?></td>
						<td><?= $devotion['location'] ?></td>
						<td><?= $devotion['source_of_funds'] ?></td>
						<td><?= $devotion['year'] ?></td>
						<td><a href="<?= if_empty($devotion['proof_link'],'#')?>"><?= !empty($devotion['proof_link'])? 'Sertifikat': '-' ?></a></td>
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
		<a href="<?= base_url('/landing/devotion') ?>">
			<button class="btn btn-primary"><b>SELENGKAPNYA </b><i class="glyphicon glyphicon glyphicon-hand-right" style="margin-left: 5px"></i></button>
		</a>
	</div>
</div>
<hr>
<div class="col-sm-12" style="padding-bottom: 40px">
	<div class="container">
		<div class="col-sm-8">
			<h2 class="title-section" style="text-align: left;">POST TERBARU</h2>
			<div class="underscore" style="margin-left:0px"></div>
			<?php foreach ($newPosts as $key => $post) :?>
			<div class="col-sm-12" style="padding:0px;border-bottom: 1px solid #bcccec;padding-bottom: 20px;margin-bottom: 30px">
				<div class="custom-entry">
					<div class="entry-month">
						<?= format_date($post['date'], 'F') ?> </div>
					<div class="entry-date">
					<?= format_date($post['date'], 'd') ?> </div>
					<div class="entry-month">
					<?= format_date($post['date'], 'Y') ?> </div>
				</div>
				<a href="single/Review-Kurikulum-Dalam-Rangka-Pengembangan-Program-Studi-ke-Arah-Internasional2019-04-1213-01-48.html">
					<h3 class="title-post-popular" style="margin-top:0px"><?= $post['title'] ?></h3>
				</a>
				<h6 style="color:#555;font-family: myf">Penulis : <b><?= $post['writer_name'] ?></b></h6>

				<p class="content-popular-post">

				<?= substr($post['body'], 0, 200)  ?> .... </p>
			</div>
			<?php endforeach; ?>
		</div>
		<div class="col-sm-4">
			<h3 class="title-section" style="text-align: left;">POST POPULER</h3>
			<div class="underscore" style="margin-left:0px"></div>
			<div id="post-populer-sidebar">
				<ul id="post-populer-sidebar-list">
					<?php foreach ($postPopulars as $key => $post) : ?>
					<li><a href="<?= base_url('landing/review-curriculum-view/'.$post['id'])?>"><span class="glyphicon glyphicon-file" style="margin-right:5px"></span><?= $post['title'] ?></a></li>
					<?php endforeach; ?>
				</ul>
			</div>
		</div>
	</div>
</div>