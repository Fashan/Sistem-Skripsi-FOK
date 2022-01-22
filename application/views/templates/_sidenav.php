<?php if (userdata()->role == "admin") : ?>
	  <!-- Sidenav -->
		<nav class="sidenav navbar navbar-vertical fixed-left navbar-expand-xs navbar-light bg-white" id="sidenav-main">
    <div class="scrollbar-inner">
      <!-- Brand -->
      <div class="sidenav-header d-flex align-items-center">
        <a class="navbar-brand" href="../../pages/dashboards/dashboard.html">
				<img src="<?= base_url('assets/img/fok.png'); ?>" class="navbar-brand-img" alt="...">
        </a>
        <div class="ml-auto">
          <!-- Sidenav toggler -->
          <div class="sidenav-toggler d-none d-xl-block" data-action="sidenav-unpin" data-target="#sidenav-main">
            <div class="sidenav-toggler-inner">
              <i class="sidenav-toggler-line"></i>
              <i class="sidenav-toggler-line"></i>
              <i class="sidenav-toggler-line"></i>
            </div>
          </div>
        </div>
      </div>
      <div class="navbar-inner">
        <!-- Collapse -->
        <div class="collapse navbar-collapse" id="sidenav-collapse-main">
          <!-- Nav items -->
          <ul class="navbar-nav">
					<li class="nav-item">
              <a class="nav-link" href="<?= base_url('dashboard'); ?>">
							<i class="fas fa-home color-navy"></i>
                <span class="nav-link-text">Dashboards</span>
              </a>
            </li>
						<li class="nav-item">
              <a class="nav-link" href="<?= base_url('fakultas'); ?>">
							<i class="fas fa-university color-navy"></i>
                <span class="nav-link-text">FOK</span>
              </a>
            </li>
          
						<li class="nav-item">
              <a class="nav-link" href="<?= base_url('user'); ?>">
							<i class="fas fa-users color-navy"></i>
                <span class="nav-link-text">User</span>
              </a>
            </li>
						<li class="nav-item">
              <a class="nav-link" href="#navbar-examples4" data-toggle="collapse" role="button" aria-expanded="false"
                aria-controls="navbar-examples">
                <i class="fas fa-paste color-navy"></i>
                <span class="nav-link-text">Prasyarat</span>
              </a>
              <div class="collapse" id="navbar-examples4">
                <ul class="nav nav-sm flex-column">
                  <li class="nav-item">
                    <a href="<?= base_url('admin/prasyarat_proposal'); ?>" class="nav-link">Seminar Proposal</a>
                  </li>
                  <li class="nav-item">
                    <a href="<?= base_url('admin/prasyarat_skripsi'); ?>" class="nav-link">Skripsi</a>
                  </li>
									<li class="nav-item">
                    <a href="<?= base_url('admin/prasyarat_yudisium'); ?>" class="nav-link">Yudisium</a>
                  </li>
                 
                </ul>
              </div>
            </li>

						<li class="nav-item">
              <a class="nav-link" href="#navbar-examples5" data-toggle="collapse" role="button" aria-expanded="false"
                aria-controls="navbar-examples">
                <i class="fas fa-calendar-alt color-navy"></i>
                <span class="nav-link-text">Jadwal</span>
              </a>
              <div class="collapse" id="navbar-examples5">
                <ul class="nav nav-sm flex-column">
                  <li class="nav-item">
                    <a href="<?= base_url('admin/jadwal_seminar'); ?>" class="nav-link">Seminar Proposal</a>
                  </li>
                  <li class="nav-item">
                    <a href="<?= base_url('admin/jadwal_sidang'); ?>" class="nav-link">Skripsi</a>
                  </li>
									<li class="nav-item">
                    <a href="<?= base_url('admin/yudisium'); ?>" class="nav-link">Yudisium</a>
                  </li>
                 
                </ul>
              </div>
            </li>
						<!-- <li class="nav-item">
              <a class="nav-link" href="#navbar-examples" data-toggle="collapse" role="button" aria-expanded="false"
                aria-controls="navbar-examples">
                <i class="ni ni-ungroup text-orange"></i>
                <span class="nav-link-text">Data</span>
              </a>
              <div class="collapse" id="navbar-examples">
                <ul class="nav nav-sm flex-column">
                  <li class="nav-item">
                    <a href="<?= base_url('fakultas'); ?>" class="nav-link">Jurusan</a>
                  </li>
                  <li class="nav-item">
                    <a href="../../pages/examples/login.html" class="nav-link">Prodi</a>
                  </li>
                 
                </ul>
              </div>
            </li> -->
           
          </ul>

        </div>
      </div>
    </div>
  </nav>

<?php endif ?>

<?php if (userdata()->role == "dosen" || userdata()->role =="PA" || userdata()->role =="kaprodi") : ?>
	  <!-- Sidenav -->
		<nav class="sidenav navbar navbar-vertical fixed-left navbar-expand-xs navbar-light bg-white" id="sidenav-main">
    <div class="scrollbar-inner">
      <!-- Brand -->
      <div class="sidenav-header d-flex align-items-center">
        <a class="navbar-brand" href="../../pages/dashboards/dashboard.html">
          <img src="<?= base_url('assets/img/fok.png'); ?>" class="navbar-brand-img" alt="...">
        </a>
        <div class="ml-auto">
          <!-- Sidenav toggler -->
          <div class="sidenav-toggler d-none d-xl-block" data-action="sidenav-unpin" data-target="#sidenav-main">
            <div class="sidenav-toggler-inner">
              <i class="sidenav-toggler-line"></i>
              <i class="sidenav-toggler-line"></i>
              <i class="sidenav-toggler-line"></i>
            </div>
          </div>
        </div>
      </div>
      <div class="navbar-inner">
        <!-- Collapse -->
        <div class="collapse navbar-collapse" id="sidenav-collapse-main">
          <!-- Nav items -->
          <ul class="navbar-nav">
					<li class="nav-item">
              <a class="nav-link" href="<?= base_url('dashboard'); ?>">
							<i class="fas fa-home color-navy"></i>
                <span class="nav-link-text">Dashboards</span>
              </a>
            </li>
						<li class="nav-item">
              <a class="nav-link" href="<?= base_url('dosen/pembimbing'); ?>">
							<i class="fas fa-chalkboard-teacher color-navy"></i>
                <span class="nav-link-text">Pembimbing</span>
              </a>
            </li>
          
						<li class="nav-item">
              <a class="nav-link" href="<?= base_url('dosen/penguji'); ?>">
							<i class="fas fa-chalkboard-teacher color-navy"></i>
                <span class="nav-link-text">Penguji</span>
              </a>
            </li>
						<li class="nav-item">
              <a class="nav-link" href="<?= base_url('dosen/daftarskripsi'); ?>">
							<i class="fas fa-book color-navy"></i>
                <span class="nav-link-text">Daftar Skripsi</span>
              </a>
            </li>

						<li class="nav-item">
              <a class="nav-link" href="<?= base_url('dosen/datayudisium'); ?>">
							<i class="fas fa-user-graduate color-navy"></i>
                <span class="nav-link-text">Data Yudisium</span>
              </a>
            </li>
						<?php if (userdata()->role == "kaprodi") : ?>
							<li class="nav-item">
              <a class="nav-link" href="<?= base_url('kaprodi/print'); ?>">
							<i class="fas fa-user-graduate color-navy"></i>
                <span class="nav-link-text">Cetak Laporan Dosen</span>
              </a>
            </li>
						<?php endif ?>
						<!-- <li class="nav-item">
              <a class="nav-link" href="#navbar-examples" data-toggle="collapse" role="button" aria-expanded="false"
                aria-controls="navbar-examples">
                <i class="ni ni-ungroup text-orange"></i>
                <span class="nav-link-text">Data</span>
              </a>
              <div class="collapse" id="navbar-examples">
                <ul class="nav nav-sm flex-column">
                  <li class="nav-item">
                    <a href="<?= base_url('fakultas'); ?>" class="nav-link">Jurusan</a>
                  </li>
                  <li class="nav-item">
                    <a href="../../pages/examples/login.html" class="nav-link">Prodi</a>
                  </li>
                 
                </ul>
              </div>
            </li> -->
           
          </ul>

        </div>
      </div>
    </div>
  </nav>

<?php endif ?>



<?php if (userdata()->role == "mahasiswa") : ?>
	  <!-- Sidenav -->
		<nav class="sidenav navbar navbar-vertical fixed-left navbar-expand-xs navbar-light bg-white" id="sidenav-main">
    <div class="scrollbar-inner">
      <!-- Brand -->
      <div class="sidenav-header d-flex align-items-center">
        <a class="navbar-brand" href="../../pages/dashboards/dashboard.html">
          <img src="<?= base_url('assets/img/fok.png'); ?>" class="navbar-brand-img" alt="...">
        </a>
        <div class="ml-auto">
          <!-- Sidenav toggler -->
          <div class="sidenav-toggler d-none d-xl-block" data-action="sidenav-unpin" data-target="#sidenav-main">
            <div class="sidenav-toggler-inner">
              <i class="sidenav-toggler-line"></i>
              <i class="sidenav-toggler-line"></i>
              <i class="sidenav-toggler-line"></i>
            </div>
          </div>
        </div>
      </div>
      <div class="navbar-inner">
        <!-- Collapse -->
        <div class="collapse navbar-collapse" id="sidenav-collapse-main">
          <!-- Nav items -->
          <ul class="navbar-nav">
					<li class="nav-item">
              <a class="nav-link" href="<?= base_url('dashboard'); ?>">
							<i class="fas fa-home color-navy"></i>
                <span class="nav-link-text">Dashboards</span>
              </a>
            </li>

						<li class="nav-item">
              <a class="nav-link" href="#navbar-examples" data-toggle="collapse" role="button" aria-expanded="false"
                aria-controls="navbar-examples">
                <i class="fas fa-book color-navy"></i>
                <span class="nav-link-text">Skripsi</span>
              </a>
              <div class="collapse" id="navbar-examples">
                <ul class="nav nav-sm flex-column">
                  <li class="nav-item">
                    <a href="<?= base_url('mahasiswa/ide_skripsi'); ?>" class="nav-link">Ajukan Judul</a>
                  </li>
                  <li class="nav-item">
                    <a href="<?= base_url('mahasiswa/skripsi'); ?>" class="nav-link">Skripsi Saya</a>
                  </li>
                 
                </ul>
              </div>
            </li>

						<li class="nav-item">
              <a class="nav-link" href="#navbar-examples2" data-toggle="collapse" role="button" aria-expanded="false"
                aria-controls="navbar-examples">
                <i class="fas fa-chalkboard-teacher color-navy"></i>
                <span class="nav-link-text">Bimbingan Proposal</span>
              </a>
								<?php if (check_pembimbing_p() == true || check_pembimbing_s()) : ?>
									<div class="collapse" id="navbar-examples2">
                <ul class="nav nav-sm flex-column">
                  <li class="nav-item">
                    <a href="<?= base_url('mahasiswa/pembimbing1_proposal'); ?>" class="nav-link">Pembimbing 1</a>
                  </li>
                  <li class="nav-item">
                    <a href="<?= base_url('mahasiswa/pembimbing2_proposal'); ?>" class="nav-link">Pembimbing 2</a>
                  </li>
									<?php if (check_seminar()) : ?>
										<li class="nav-item">
                    <a href="<?= base_url('mahasiswa/penguji1_proposal'); ?>" class="nav-link">Penguji 1</a>
                  </li>
                  <li class="nav-item">
                    <a href="<?= base_url('mahasiswa/penguji2_proposal'); ?>" class="nav-link">Penguji 2</a>
                  </li>
									<?php else: ?>
										<li class="nav-item">
                    <a href="#" class="nav-link" disabled>Penguji 1</a>
                  </li>
                  <li class="nav-item">
                    <a href="#" class="nav-link" disabled>Penguji 2</a>
                  </li>
									<?php endif ?>

                 
                </ul>
              </div>
								<?php else : ?>
									<div class="collapse" id="navbar-examples2">
                <ul class="nav nav-sm flex-column">
                  <li class="nav-item">
                    <a href="#"  class="nav-link" disabled>Pembimbing 1</a>
                  </li>
                  <li class="nav-item">
                    <a href="#" class="nav-link" disabled>Pembimbing 2</a>
                  </li>
                  <li class="nav-item">
                    <a href="#" class="nav-link" disabled>Penguji 1</a>
                  </li>
                  <li class="nav-item">
                    <a href="#" class="nav-link" disabled>Penguji 2</a>
                  </li>

                 
                </ul>
              </div>
								<?php endif ?>
            </li>

						<li class="nav-item">
              <a class="nav-link" href="#navbar-examples3" data-toggle="collapse" role="button" aria-expanded="false"
                aria-controls="navbar-examples">
                <i class="fas fa-chalkboard-teacher color-navy"></i>
                <span class="nav-link-text">Bimbingan Skripsi</span>
              </a>
							<?php if (check_pembimbing_s() == true) : ?>
								<div class="collapse" id="navbar-examples3">
                <ul class="nav nav-sm flex-column">
								<li class="nav-item">
                    <a href="<?= base_url('mahasiswa/pembimbing1_skripsi'); ?>" class="nav-link">Pembimbing 1</a>
                  </li>
                  <li class="nav-item">
                    <a href="<?= base_url('mahasiswa/pembimbing2_skripsi'); ?>" class="nav-link">Pembimbing 2</a>
                  </li>
									<?php if (check_sidang()) : ?>
										<li class="nav-item">
                    <a href="<?= base_url('mahasiswa/penguji1_skripsi'); ?>" class="nav-link">Penguji 1</a>
                  </li>
									<li class="nav-item">
                    <a href="<?= base_url('mahasiswa/penguji2_skripsi'); ?>" class="nav-link">Penguji 2</a>
                  </li>
									<?php else: ?>
										</li>
                  <li class="nav-item">
                    <a href="#" class="nav-link" disabled>Penguji 1</a>
                  </li>
                  <li class="nav-item">
                    <a href="#" class="nav-link" disabled>Penguji 2</a>
                  </li>
									<?php endif ?>

                </ul>
              </div>
								<?php else : ?>
									<div class="collapse" id="navbar-examples3">
                <ul class="nav nav-sm flex-column">
								<li class="nav-item">
                    <a href="#" class="nav-link">Pembimbing 1</a>
                  </li>
                  <li class="nav-item">
                    <a href="#" class="nav-link">Pembimbing 2</a>
                  </li>
									<li class="nav-item">
                    <a href="#" class="nav-link">Penguji 1</a>
                  </li>
									<li class="nav-item">
                    <a href="#" class="nav-link">Penguji 2</a>
                  </li>

                </ul>
              </div>
								<?php endif ?>
            </li>


						<li class="nav-item">
              <a class="nav-link" href="#navbar-examples4" data-toggle="collapse" role="button" aria-expanded="false"
                aria-controls="navbar-examples">
                <i class="fas fa-paste color-navy"></i>
                <span class="nav-link-text">Prasyarat</span>
              </a>
              <div class="collapse" id="navbar-examples4">
                <ul class="nav nav-sm flex-column">
                 <?php if (check_acc_proposal() == true) : ?>
									<li class="nav-item">
                    <a href="<?= base_url('mahasiswa/seminar_proposal'); ?>" class="nav-link">Seminar Proposal</a>
                  </li>
									<?php else: ?>
										<li class="nav-item">
                    <a href="#" class="nav-link">Seminar Proposal</a>
                  </li>
								 <?php endif ?>
								 <?php if (check_acc_skripsi() == true) : ?>
									<li class="nav-item">
                    <a href="<?= base_url('mahasiswa/sidang_skripsi'); ?>" class="nav-link">Sidang Skripsi</a>
                  </li>
								
									<?php else: ?>
										<li class="nav-item">
                    <a href="#" class="nav-link">Sidang Skripsi</a>
                  </li>
								
								 <?php endif ?>

								 <?php if (check_nilai_skripsi(userdata()->user_id)) : ?>
									<li class="nav-item">
                    <a href="<?= base_url('mahasiswa/yudisium'); ?>" class="nav-link">Yudisium</a>
                  </li>
									<?php else: ?>
										<li class="nav-item">
                    <a href="#" class="nav-link">Yudisium</a>
                  </li>
								 <?php endif ?>
								
                 
                </ul>
              </div>
            </li>

					

          
						<!-- <li class="nav-item">
              <a class="nav-link" href="<?= base_url('user'); ?>">
							<i class="fas fa-users text-blue"></i>
                <span class="nav-link-text">Rekomendasi Judul</span>
              </a>
            </li> -->
					
           
          </ul>

        </div>
      </div>
    </div>
  </nav>

<?php endif ?>




