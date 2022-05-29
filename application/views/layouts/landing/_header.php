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
					<form action="https://akademik.pkimuin-suka.ac.id/hasil_search" method="GET">
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
								<li><a href="https://drive.google.com/file/d/1bIUmx2b1cPrZEy5HJK3-4FF-0QHL2jVA/view?usp=sharing">Leafet</a></li>
								<li><a href="https://drive.google.com/file/d/1WLNefHlbITdwwU0_y78HQv-QUwOck-u1/view?usp=sharing">Brosur Versi Inggris</a></li>
								<li><a href="https://drive.google.com/file/d/1etFn4zwaw2Ht4Z2Ro-K_fMYKJcLuCMwx/view?usp=sharing">Brosur Versi Indonesia</a></li>
								<li><a href="welcome/halaman/55.html">Visi-Misi</a></li>
								<li><a href="welcome/halaman/54.html">Learning Outcome</a></li>
								<li><a href="welcome/halaman/53.html">Profil Lulusan</a></li>
							</ul>
						</li>


						<li>
							<a class="dropdown-toggle" data-toggle="dropdown" href="#">DOSEN <span class="caret"></span></a>
							<ul class="dropdown-menu listss70">
								<li><a href="welcome/list_post/4.html">Review Kurikulum</a></li>
								<li class="dropdown-submenu">
									<a href="welcome/halaman/31.html">
										Dosen Prodi</a>

									<ul class="dropdown-menu">
										<li><a href="welcome/halaman/82.html">Setia Rahmawan, M.Pd.</a></li>
										<li><a href="welcome/halaman/75.html">Retno Aliyatul Fikroh, M.Sc</a></li>
										<li><a href="welcome/halaman/76.html">Laily Nailul Muna, M.Sc., Apt</a></li>
										<li><a href="welcome/halaman/39.html">Asih Widi Wisudawati, M.Pd</a></li>
										<li><a href="welcome/halaman/38.html">Jamil Suprihatiningrum, PhD</a></li>
										<li><a href="welcome/halaman/37.html">Khamidinal, M.Si</a></li>
										<li><a href="welcome/halaman/35.html">Agus Kamaludin, M.Pd</a></li>
										<li><a href="welcome/halaman/83.html">Muhammad Zamhari, S.Pd.Si., M.Sc</a></li>
										<li><a href="welcome/halaman/40.html">Nina Hamidah, S.Si, M.A. M.Sc</a></li>
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
								<li><a href="http://pkim.uin-suka.ac.id/id/page/pedoman_akademik/1">Pedoman Akademik</a></li>
								<li><a href="http://pkim.uin-suka.ac.id/id/page/kalender">Kalender Akademik</a></li>
								<li><a href="http://pkim.uin-suka.ac.id/id/page/jadwal_ujian">Jadwal Ujian</a></li>
								<li><a href="http://pkim.uin-suka.ac.id/id/page/jadwal_kuliah">Jadwal Kuliah</a></li>
								<li><a href="http://pkim.uin-suka.ac.id/id/page/kurikulum">Kurikulum</a></li>
								<li class="dropdown-submenu">
									<a href="welcome/halaman/86.html">
										RPS 2021</a>

									<ul class="dropdown-menu">
										<li class="dropdown-submenu">
											<a href="welcome/halaman/88.html">
												RPS Genap 2021</a>

											<ul class="dropdown-menu">
												<li><a href="welcome/halaman/90.html">
														Sem_2</a></li>
												<li><a href="welcome/halaman/92.html">
														Sem_4</a></li>
												<li><a href="welcome/halaman/94.html">
														Sem_6</a></li>
												<li><a href="welcome/halaman/96.html">
														Sem_8</a></li>
											</ul>
										</li>
										<li class="dropdown-submenu">
											<a href="welcome/halaman/87.html">
												RPS Gasal 2021</a>

											<ul class="dropdown-menu">
												<li><a href="welcome/halaman/89.html">
														Sem_1</a></li>
												<li><a href="welcome/halaman/91.html">
														Sem_3</a></li>
												<li><a href="welcome/halaman/93.html">
														Sem_5</a></li>
												<li><a href="welcome/halaman/95.html">
														Sem_7</a></li>
											</ul>
										</li>
									</ul>
								</li>
								<li class="dropdown-submenu">
									<a href="welcome/halaman/17.html">
										PPM</a>

									<ul class="dropdown-menu">
										<li><a href="https://drive.google.com/file/d/1ZZVx3Yg-Yz2udb-rIRFdBnYjv-qLCmD2/view">Modul PPM</a></li>
										<li class="dropdown-submenu">
											<a href="welcome/halaman/59.html">
												Video PPM</a>

											<ul class="dropdown-menu">
												<li><a href="welcome/halaman/60.html">
														Kelas X</a></li>
												<li><a href="welcome/halaman/61.html">
														Kelas XI</a></li>
												<li><a href="welcome/halaman/62.html">
														Kelas XII</a></li>
											</ul>
										</li>
									</ul>
								</li>
								<li class="dropdown-submenu">
									<a href="welcome/halaman/18.html">
										PLP</a>

									<ul class="dropdown-menu">
										<li><a href="https://drive.google.com/file/d/1Y5fvPC-zaL4Wy5rrPsBmdmjD_lr3j9oV/view">Modul PLP</a></li>
									</ul>
								</li>
								<li class="dropdown-submenu">
									<a href="welcome/halaman/10.html">
										RPS</a>

									<ul class="dropdown-menu">
										<li class="dropdown-submenu">
											<a href="welcome/halaman/12.html">
												RPS Semester Gasal</a>

											<ul class="dropdown-menu">
												<li><a href="welcome/halaman/65.html">
														Semester 1</a></li>
												<li><a href="welcome/halaman/23.html">
														Semester 3</a></li>
												<li><a href="welcome/halaman/27.html">
														Semester 7</a></li>
												<li><a href="welcome/halaman/25.html">
														Semester 5</a></li>
											</ul>
										</li>
										<li class="dropdown-submenu">
											<a href="welcome/halaman/13.html">
												RPS Semester Genap</a>

											<ul class="dropdown-menu">
												<li><a href="welcome/halaman/22.html">
														Semester 2</a></li>
												<li><a href="welcome/halaman/24.html">
														Semester 4</a></li>
												<li><a href="welcome/halaman/26.html">
														Semester 6</a></li>
												<li><a href="welcome/halaman/28.html">
														Semester 8</a></li>
											</ul>
										</li>
										<li><a href="welcome/halaman/14.html">RPS Mata Kuliah Pilihan</a></li>
									</ul>
								</li>
							</ul>
						</li>


						<li>
							<a class="dropdown-toggle" data-toggle="dropdown" href="#">JURNAL <span class="caret"></span></a>
							<ul class="dropdown-menu listss72">
								<li><a href="welcome/halaman/68.html">Jurnal Difabel</a></li>
								<li><a href="welcome/halaman/50.html">Jurnal Pendidikan Kimia</a></li>
								<li><a href="http://ejournal.uin-suka.ac.id/tarbiyah/jtcre/index">Jurnal Prodi</a></li>
								<li><a href="welcome/halaman/51.html">Jurnal Internasional</a></li>
							</ul>
						</li>


						<li>
							<a class="dropdown-toggle" data-toggle="dropdown" href="#">LABORATORIUM <span class="caret"></span></a>
							<ul class="dropdown-menu listss73">
								<li class="dropdown-submenu">
									<a href="welcome/halaman/11.html">
										Modul Praktikum</a>

									<ul class="dropdown-menu">
										<li><a href="welcome/halaman/47.html">Modul Praktikum Gasal</a></li>
										<li><a href="welcome/halaman/48.html">Modul Praktikum Genap</a></li>
									</ul>
								</li>
							</ul>
						</li>


						<li>
							<a class="dropdown-toggle" data-toggle="dropdown" href="#">TRACER STUDY <span class="caret"></span></a>
							<ul class="dropdown-menu listss74">
								<li><a href="welcome/alumni.html">Alumni PKIM</a></li>
								<li><a href="https://docs.google.com/forms/d/1uqgUJ-paOflhjInvuZJiouEJMAcl5KpV3jCBwrwiN2E/edit?usp=sharing">Aduan Mahasiswa</a></li>
								<li><a href="https://docs.google.com/forms/d/e/1FAIpQLSc6scoYeuzxO45lCDbja42GkZB0N7pnbAgpCF-hd3tTT2h2fQ/viewform?usp=sf_link">Survei Kepuasan mahasiswa</a></li>
								<li><a href="https://docs.google.com/forms/d/e/1FAIpQLSdp5vBnyF5NZ-864FWBflIBgS1Zs2ddOAtV0hxY_xA-fnOKug/viewform">Tracer Pengguna Alumni</a></li>
								<li><a href="https://docs.google.com/forms/d/e/1FAIpQLSfpca7aHdnyzafc2QrAZe4oJYUOIDtUYxU8q2AYNwFfLJY0dA/viewform">Tracer Alumni</a></li>
							</ul>
						</li>


						<li>
							<a class="dropdown-toggle" data-toggle="dropdown" href="#">DOKUMEN <span class="caret"></span></a>
							<ul class="dropdown-menu listss75">
								<li><a href="welcome/halaman/74.html">Dokumen Perkuliahan</a></li>
							</ul>
						</li>

					</ul>
				</div>
			</div>
		</div>

	</div>
</nav>