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
				<tr>
					<td>1</td>
					<td>Dr. Ibrahim, S.Pd., M.Pd.</td>
					<td>Analisis Sikap, Kecemasan Dan Hasil Belajar Matematika Siswa</td>
					<td>Nasional</td>
					<td>Mandiri</td>
					<td>2022</td>
					<td>Nasional</td>
					<td><a href="http://jurnal.una.ac.id/index.php/jmp/article/view/2106">http://jurnal.una.ac.id/index.php/jmp/article/view/2106</a></td>
				</tr>
				<tr>
					<td>2</td>
					<td>Dr. Ibrahim, S.Pd., M.Pd.</td>
					<td>Perbandingan Cara Belajar Siswa dari Sekolah Pondok dan Sekolah Negeri Terhadap Hasil Belajar</td>
					<td>Nasional</td>
					<td>Mandiri</td>
					<td>2022</td>
					<td>Nasional</td>
					<td><a href="https://jonedu.org/index.php/joe/article/view/423">https://jonedu.org/index.php/joe/article/view/423</a></td>
				</tr>
				<tr>
					<td>3</td>
					<td>Dr. Ibrahim, S.Pd., M.Pd.</td>
					<td>Keterampilan Berpikir Matematis Tingkat Tinggi Siswa Madrasah Aliyah Ditinjau dari Gender dan Status Sekolah</td>
					<td>Nasional</td>
					<td>Mandiri</td>
					<td>2022</td>
					<td>Nasional</td>
					<td><a href="https://fkip.ummetro.ac.id/journal/index.php/matematika/article/view/4171">https://fkip.ummetro.ac.id/journal/index.php/matematika/article/view/4171</a></td>
				</tr>
				<tr>
					<td>4</td>
					<td>Retno Aliyatul Fikroh; Titah Nor Fahmi </td>
					<td>Pengembangan Modul Bermuatan Multirepresentasi pada Materi Hidrokarbon untuk SMA/MA</td>
					<td>Nasional </td>
					<td>Mandiri </td>
					<td>2022</td>
					<td>Nasional S3</td>
					<td><a href="https://journal.unnes.ac.id/nju/index.php/JIPK/article/view/30116">https://journal.unnes.ac.id/nju/index.php/JIPK/article/view/30116</a></td>
				</tr>
				<tr>
					<td>5</td>
					<td>Muhammad Zamhari, S.Pd.Si., M.Sc.</td>
					<td>Pengembangan Cacing Kimia sebagai Media Pembelajaran Kimia Berbasis Android pada Materi Larutan</td>
					<td>Nasional </td>
					<td>Mandiri</td>
					<td>2022</td>
					<td>Nasional S3</td>
					<td><a href="https://journal.unnes.ac.id/nju/index.php/JIPK/article/view/29921">https://journal.unnes.ac.id/nju/index.php/JIPK/article/view/29921</a></td>
				</tr>
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
				<tr>
					<td>1</td>
					<td>karmanto</td>
					<td>Pelatihan Sertifikasi Calon Kepala Laboratorium IPA Sekolah</td>
					<td>Daffam Hotel Seturan Yogyakarta</td>
					<td>BLU UIN Sunan Kalijaga</td>
					<td>2019</td>
					<td><a href="Sertifikat.html">Sertifikat</a></td>
				</tr>
				<tr>
					<td>2</td>
					<td>Khamidinal, M.Si </td>
					<td>Penyuluhan sertifikasi halal dan hygieniis pangan.</td>
					<td>PT Pringsewu Cemerlang Restoran, Jl. Magelang KM 9. Yogyakarta.</td>
					<td>MUI</td>
					<td>2018</td>
					<td><a href="-.html">-</a></td>
				</tr>
				<tr>
					<td>3</td>
					<td>Khamidinal, M.Si</td>
					<td>Penyuluhan sertifikasi halal dan hygienis pangan</td>
					<td>CV Mitra Mandiri Bumbu Marinasi Mantub baru, Baturetno, Banguntapan, Bantul.</td>
					<td>MUI</td>
					<td>2018</td>
					<td><a href="-.html">-</a></td>
				</tr>
				<tr>
					<td>4</td>
					<td>Khamidinal, M.Si</td>
					<td>Penyuluhan sertifikasi halal dan hygienis pangan.</td>
					<td>Tiga Mutiara Cake & Bakery Jl. Imogiri Barat KM 9,8 Ngentak Timbulharjo, Sewon, Bantul.</td>
					<td>MUI</td>
					<td>2018</td>
					<td><a href="-.html">-</a></td>
				</tr>
				<tr>
					<td>5</td>
					<td>Khamidinal, M.Si</td>
					<td>Penyuluhan sertifikasi halal dan hygienis pangan.</td>
					<td>PT Gujati 59 Utama Jamu. Jl. Raya Solo – Wonogiri Km 26,5 Nguter, Sukoharjo, Jateng.</td>
					<td>MUI</td>
					<td>2018</td>
					<td><a href="-.html">-</a></td>
				</tr>
				<tr>
					<td>6</td>
					<td>Khamidinal, M.Si</td>
					<td>Penyuluhan sertifikasi halal dan hygienis pangan. </td>
					<td>Griya Coklat Nglanggeran, Nglanggeran, Patuk, Gunung Kidul.</td>
					<td>MUI</td>
					<td>2018</td>
					<td><a href="-.html">-</a></td>
				</tr>
			</tbody>
		</table>
		<a href="welcome/pengabdian/index.html">
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
			<div class="col-sm-12" style="padding:0px;border-bottom: 1px solid #bcccec;padding-bottom: 20px;margin-bottom: 30px">
				<div class="custom-entry">
					<div class="entry-month">
						Apr </div>
					<div class="entry-date">
						12 </div>
					<div class="entry-month">
						2019 </div>
				</div>
				<a href="single/Review-Kurikulum-Dalam-Rangka-Pengembangan-Program-Studi-ke-Arah-Internasional2019-04-1213-01-48.html">
					<h3 class="title-post-popular" style="margin-top:0px">Review Kurikulum Dalam Rangka Pengembangan Program Studi ke Arah Internasional</h3>
				</a>
				<h6 style="color:#555;font-family: myf">Penulis : <b>Admin</b></h6>

				<p class="content-popular-post">

					Fakultas Sains dan Teknologi UIN Sunan Kalijaga Yogyakarta mendapat Dosen Pakar/Ahli Prof. Ewald Giovanni Daltrozzo dari Technical University of Munich, Republik Federal Jerman melalui Program Senio </p>
			</div>
		</div>
		<div class="col-sm-4">
			<h3 class="title-section" style="text-align: left;">POST POPULER</h3>
			<div class="underscore" style="margin-left:0px"></div>
			<div id="post-populer-sidebar">
				<ul id="post-populer-sidebar-list">
					<li><a href="single/Review-Kurikulum-Dalam-Rangka-Pengembangan-Program-Studi-ke-Arah-Internasional2019-04-1213-01-48.html"><span class="glyphicon glyphicon-file" style="margin-right:5px"></span>Review Kurikulum Dalam Rangka Pengembangan Program Studi ke Arah Internasional</a></li>
				</ul>
			</div>
		</div>
	</div>
</div>