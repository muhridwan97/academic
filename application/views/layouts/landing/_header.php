<nav id="navbar-outer-up" class="navbar navbar-inverse">
	<div class="container">
		<div id="nav-header-up" class="navbar-header">
			<div id="navbar-title" class="navbar-brand" href="#">
			<a href="<?= base_url() ?>"><i class="glyphicon glyphicon-book icon-navbar-up"></i></a><b>
				AKADEMIK MAHASISWA PFIS UIN SUNAN KALIJAGA</b>
			</div>

		</div>
	</div>
</nav>
<nav id="navbar-outer-bottom" class="navbar navbar-inverse">
	<div class="container">
		<div class="navbar-header" style="width: 100%;padding-top:29px;">
			<div id="navbar-kiri" class="navbar-brand col-sm-7">
				<div class="col-sm-2 col-xs-4 gambar" style="text-align: center;"><img src="<?= base_url('assets/img/logo-uin.png') ?>" style="float: left;" class="img-responsive">
				</div>
				<div class="col-sm-10 col-xs-8 isi-logo" style="text-align: left;">
					<h2 style="color: #fff; font-family: myf;float: left;margin-bottom: 0px;margin-top: 0px">PENDIDIKAN FISIKA</h2>
					<h3 style="color: #fff; font-family: myf2;float: left;margin-top:5px">UIN SUNAN KALIJAGA</h3>
				</div>
			</div>
			<div id="navbar-kanan" class="navbar-brand col-sm-5 ">
				<!-- <div class="col-sm-6">
            <div class="col-sm-3" style="text-align: right;">
              <h2 class="glyphicon glyphicon-earphone" style="margin-right:5px"></h2>
            </div>
            <div class="col-sm-9" style="text-align: left;">
              <h5 class="text-contact"><b>+62-274-512474</b></h5>
              <h6 class="text-contact">pkim@uin-suka.ac.id</h6>
            </div>
          </div> -->
				<div class="col-sm-12" style="text-align: right;padding:0px">
					<!-- <p class="text-contact"><i class="glyphicon glyphicon-home" style="margin-right:5px"></i>Jl. Marsda Adisucipto Yogyakarta</p> -->
					<form action="<?= base_url('landing/search')?>" method="GET">
						<input id="cari" type="text" name="cari" placeholder="Cari disini" style="position: relative;z-index: 999">

					</form>
				</div>
			</div>
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<div class="collapse navbar-collapse dropdown" id="myNavbar">
				<div class="col-sm-12" id="wrap-putih">
					<ul class="nav navbar-nav navbar-left menu-nav-bottom">
						<li><a href="http://pfis.uin-suka.ac.id/"><i class="glyphicon glyphicon-home" style="margin-right:5px"></i>Home</a> </li>

						<li>
							<a class="dropdown-toggle" data-toggle="dropdown" href="#">IDENTITAS <span class="caret"></span></a>
							<ul class="dropdown-menu listss69">
								<?php foreach ($identities as $key => $identity) : ?>
									<?php if($identity['is_link']): ?>
										
										<li><a href="<?= $identity['description'] ?>" target="_blank"><?= $identity['name'] ?></a></li>
									<?php else: ?>
										<li><a href="<?= base_url().'landing/'.$identity['slug'] ?>"><?= $identity['name'] ?></a></li>
									<?php endif; ?>
								<?php endforeach; ?>
							</ul>
						</li>


						<li>
							<a class="dropdown-toggle" data-toggle="dropdown" href="#">DOSEN <span class="caret"></span></a>
							<ul class="dropdown-menu listss70">
								<li><a href="<?= base_url('/landing/review-curriculum')?>">Review Kurikulum</a></li>
								<li class="dropdown-submenu">
									<a href="#">
										Dosen Prodi</a>
									<ul class="dropdown-menu">
										<?php foreach ($lecturers as $key => $lecturer) : ?>
											<li><a href="<?= base_url('/landing/lecturer-view/'.$lecturer['id']) ?>"><?= $lecturer['name'] ?></a></li>
										<?php endforeach; ?>
									</ul>
								</li>
								<li class="dropdown-submenu">
									<a href="welcome/halaman/30.html">
										Penelitian & Pengabdian</a>

									<ul class="dropdown-menu">
										<li><a href="<?= base_url('/landing/devotion') ?>">Pengabdian</a></li>
										<li><a href="<?= base_url('/landing/research') ?>">Penelitian</a></li>
									</ul>
								</li>
							</ul>
						</li>


						<li>
							<a class="dropdown-toggle" data-toggle="dropdown" href="#">PERKULIAHAN <span class="caret"></span></a>
							<ul class="dropdown-menu listss71">
								<li><a href="<?= $studies[19]['description']?>">Pedoman Akademik</a></li>
								<li><a href="<?= $studies[18]['description']?>">Kalender Akademik</a></li>
								<li><a href="<?= $studies[17]['description']?>">Jadwal Ujian</a></li>
								<li><a href="<?= $studies[16]['description']?>">Jadwal Kuliah</a></li>
								<li><a href="<?= $studies[15]['description']?>">Kurikulum</a></li>
								<li class="dropdown-submenu">
									<a href="#">
										PPM</a>

									<ul class="dropdown-menu">
										<li><a href="<?= $studies[10]['description']?>">Modul PPM</a></li>
										<li class="dropdown-submenu">
											<a href="#">
												Video PPM</a>

											<ul class="dropdown-menu">
												<li><a href="<?= base_url('/landing/').$studies[11]['slug']?>">
														Kelas X</a></li>
												<li><a href="<?= base_url('/landing/').$studies[12]['slug']?>">
														Kelas XI</a></li>
												<li><a href="<?= base_url('/landing/').$studies[13]['slug']?>">
														Kelas XII</a></li>
											</ul>
										</li>
									</ul>
								</li>
								<li class="dropdown-submenu">
									<a href="#">
										PLP</a>

									<ul class="dropdown-menu">
										<li><a href="<?= $studies[14]['description']?>">Modul PLP</a></li>
									</ul>
								</li>
								<li class="dropdown-submenu">
									<a href="#">
										RPS</a>

									<ul class="dropdown-menu">
										<li class="dropdown-submenu">
											<a href="#">
												RPS Semester Gasal</a>

											<ul class="dropdown-menu">
												<li><a href="<?= base_url('/landing/').$studies[1]['slug']?>">
														Semester 1</a></li>
												<li><a href="<?= base_url('/landing/').$studies[3]['slug']?>">
														Semester 3</a></li>
												<li><a href="<?= base_url('/landing/').$studies[5]['slug']?>">
														Semester 5</a></li>
												<li><a href="<?= base_url('/landing/').$studies[7]['slug']?>">
														Semester 7</a></li>
											</ul>
										</li>
										<li class="dropdown-submenu">
											<a href="#">
												RPS Semester Genap</a>

											<ul class="dropdown-menu">
												<li><a href="<?= base_url('/landing/').$studies[2]['slug']?>">
														Semester 2</a></li>
												<li><a href="<?= base_url('/landing/').$studies[4]['slug']?>">
														Semester 4</a></li>
												<li><a href="<?= base_url('/landing/').$studies[6]['slug']?>">
														Semester 6</a></li>
												<li><a href="<?= base_url('/landing/').$studies[8]['slug']?>">
														Semester 8</a></li>
											</ul>
										</li>
										<li><a href="<?= base_url('/landing/').$studies[9]['slug']?>">RPS Mata Kuliah Pilihan</a></li>
									</ul>
								</li>
							</ul>
						</li>


						<li>
							<a class="dropdown-toggle" data-toggle="dropdown" href="#">JURNAL <span class="caret"></span></a>
							<ul class="dropdown-menu listss72">
								<li><a href="<?= base_url('landing/content/'.$journals[1]['slug']) ?>"><?= $journals[1]['name'] ?></a></li>
								<li><a href="<?= base_url('landing/content/'.$journals[2]['slug']) ?>"><?= $journals[2]['name'] ?></a></li>
								<li><a href="<?= $journals[3]['description']?>" target="_blank"><?= $journals[3]['name'] ?></a></li>
								<li><a href="<?= base_url('landing/content/'.$journals[4]['slug']) ?>"><?= $journals[4]['name'] ?></a></li>
							</ul>
						</li>


						<li>
							<a class="dropdown-toggle" data-toggle="dropdown" href="#">LABORATORIUM <span class="caret"></span></a>
							<ul class="dropdown-menu listss73">
								<li class="dropdown-submenu">
									<a href="#">
										Modul Praktikum</a>

									<ul class="dropdown-menu">
										<li><a href="<?= base_url('landing/content/'.$laboratories[5]['slug']) ?>"><?= $laboratories[5]['name'] ?></a></li>
										<li><a href="<?= base_url('landing/content/'.$laboratories[6]['slug']) ?>"><?= $laboratories[6]['name'] ?></a></li>
									</ul>
								</li>
							</ul>
						</li>


						<li>
							<a class="dropdown-toggle" data-toggle="dropdown" href="#">TRACER STUDY <span class="caret"></span></a>
							<ul class="dropdown-menu listss74">
								<li><a href="<?= base_url('landing/alumni') ?>">Alumni PFIS</a></li>
								<li><a href="<?= $tracerStudies[7]['description']?>" target="_blank"><?= $tracerStudies[7]['name'] ?></a></li>
								<li><a href="<?= $tracerStudies[8]['description']?>" target="_blank"><?= $tracerStudies[8]['name'] ?></a></li>
								<li><a href="<?= $tracerStudies[9]['description']?>" target="_blank"><?= $tracerStudies[9]['name'] ?></a></li>
								<li><a href="<?= $tracerStudies[10]['description']?>" target="_blank"><?= $tracerStudies[10]['name'] ?></a></li>
							</ul>
						</li>


						<li>
							<a class="dropdown-toggle" data-toggle="dropdown" href="#">DOKUMEN <span class="caret"></span></a>
							<ul class="dropdown-menu listss75">
								<li><a href="<?= base_url('landing/content/'.$documents[11]['slug']) ?>"><?= $documents[11]['name'] ?></a></li>
							</ul>
						</li>

					</ul>
				</div>
			</div>
		</div>

	</div>
</nav>