   <!-- Topnav -->
   <nav class="navbar navbar-top navbar-expand navbar-dark bg-maroon border-bottom">
      <div class="container-fluid">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <!-- Search form -->
          <!-- <form class="navbar-search navbar-search-light form-inline mr-sm-3" id="navbar-search-main">
            <div class="form-group mb-0">
              <div class="input-group input-group-alternative input-group-merge">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fas fa-search"></i></span>
                </div>
                <input class="form-control" placeholder="Search" type="text">
              </div>
            </div>
            <button type="button" class="close" data-action="search-close" data-target="#navbar-search-main"
              aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </form> -->
          <!-- Navbar links -->
          <ul class="navbar-nav align-items-center ml-md-auto">
            <li class="nav-item d-xl-none">
              <!-- Sidenav toggler -->
              <div class="pr-3 sidenav-toggler sidenav-toggler-dark" data-action="sidenav-pin"
                data-target="#sidenav-main">
                <div class="sidenav-toggler-inner">
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                </div>
              </div>
            </li>
            <li class="nav-item d-sm-none">
              <a class="nav-link" href="#" data-action="search-show" data-target="#navbar-search-main">
                <i class="ni ni-zoom-split-in"></i>
              </a>
            </li>
          
            
          </ul>
          <ul class="navbar-nav align-items-center ml-auto ml-md-0">
            <li class="nav-item dropdown">
              <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true"
                aria-expanded="false">
                <div class="media align-items-center animate__animated animate__fadeInDown">
                  <span class="avatar avatar-sm rounded-circle">
                    <?php if (userdata()->avatar) : ?>
											<img alt="Image placeholder" src="<?= base_url('assets/img/user/'.userdata()->avatar); ?>" width="100%" height="100%">
											<?php else: ?>
												<img alt="Image placeholder" src="<?= base_url('assets/img/avatar-default.jpg'); ?>">
										<?php endif ?>
                  </span>
                  <div class="media-body ml-2 d-none d-lg-block">
                    <span class="mb-0 text-sm  font-weight-bold "><?= userdata()->nama; ?></span>
                  </div>
                </div>
              </a>
              <div class="dropdown-menu dropdown-menu-right">
                <div class="dropdown-header noti-title">
                  <h6 class="text-overflow m-0">Welcome!</h6>
                </div>
                <button data-toggle="modal" data-target="#ubah_foto" class="dropdown-item">
                  <i class="ni ni-single-02"></i>
                  <span>foto profile</span>
                </button>
                <button data-toggle="modal" data-target="#ubah_password" class="dropdown-item">
                  <i class="ni ni-settings-gear-65"></i>
                  <span>ubah password</span>
                </button>
                <!-- <a href="#!" class="dropdown-item">
                  <i class="ni ni-calendar-grid-58"></i>
                  <span>Activity</span>
                </a>
                <a href="#!" class="dropdown-item">
                  <i class="ni ni-support-16"></i>
                  <span>Support</span>
                </a> -->
                <div class="dropdown-divider"></div>
                <a href="<?= base_url('auth/signout'); ?>" class="dropdown-item">
                  <i class="ni ni-user-run"></i>
                  <span>Logout</span>
                </a>
              </div>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <!-- Header -->
    <!-- Header -->
    <div class="header bg-maroon pb-6">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4">
            <div class="col-lg-6 col-7 animate__animated animate__fadeInLeft">
              <h6 class="h2 text-white d-inline-block mb-0 "><?= $judul; ?></h6>
              <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <?= $breadcrumb; ?>
                  <!-- <li class="breadcrumb-item active" aria-current="page">Default</li> -->
                </ol>
              </nav>
            </div>
            <!-- <div class="col-lg-6 col-5 text-right">
              <a href="#" class="btn btn-sm btn-neutral">New</a>
              <a href="#" class="btn btn-sm btn-neutral">Filters</a>
            </div> -->
          </div>
         <?php if ($judul == 'Dashboard' && userdata()->role != "mahasiswa" && userdata()->role != "admin") : ?>

				  <!-- Card stats -->
          <div class="row">
            <div class="col-xl-3 col-md-6">
              <div class="card card-stats animate__animated animate__backInLeft animate__delay-5s">
                <!-- Card body -->
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Mahasiswa Yudisium Bulan Ini</h5>
                      <span class="h2 font-weight-bold mb-0"><?= $yudisium ?></span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-gradient-red text-white rounded-circle shadow">
                        <i class="fas fa-user-graduate"></i>
                      </div>
                    </div>
                  </div>
                  <!-- <p class="mt-3 mb-0 text-sm">
                    <span class="text-success mr-2"><i class="fa fa-arrow-up"></i> 3.48%</span>
                    <span class="text-nowrap">Since last month</span>
                  </p> -->
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-md-6">
              <div class="card card-stats animate__animated animate__backInLeft animate__delay-4s">
                <!-- Card body -->
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Skripsi Yang Di Bimbing</h5>
											<p></p>
                      <span class="h2 font-weight-bold mb-0"><?= $bimbing ?></span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-gradient-orange text-white rounded-circle shadow">
                        <i class="fas fa-chalkboard-teacher"></i>
                      </div>
                    </div>
                  </div>
                  <!-- <p class="mt-3 mb-0 text-sm">
                    <span class="text-success mr-2"><i class="fa fa-arrow-up"></i> 3.48%</span>
                    <span class="text-nowrap">Since last month</span>
                  </p> -->
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-md-6">
              <div class="card card-stats animate__animated animate__backInLeft animate__delay-3s">
                <!-- Card body -->
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Skripsi Yang Di Uji</h5>
											<p></p>
                      <span class="h2 font-weight-bold mb-0"><?= $uji ?></span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-gradient-green text-white rounded-circle shadow">
                        <i class="fas fa-chalkboard-teacher"></i>
                      </div>
                    </div>
                  </div>
                  <!-- <p class="mt-3 mb-0 text-sm">
                    <span class="text-success mr-2"><i class="fa fa-arrow-up"></i> 3.48%</span>
                    <span class="text-nowrap">Since last month</span>
                  </p> -->
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-md-6">
              <div class="card card-stats animate__animated animate__backInLeft animate__delay-2s">
                <!-- Card body -->
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Total Skripsi</h5>
											<p></p>
                      <span class="h2 font-weight-bold mb-0"><?= $total_skripsi ?></span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-gradient-info text-white rounded-circle shadow">
                        <i class="fas fa-book"></i>
                      </div>
                    </div>
                  </div>
                  <!-- <p class="mt-3 mb-0 text-sm">
                    <span class="text-success mr-2"><i class="fa fa-arrow-up"></i> 3.48%</span>
                    <span class="text-nowrap">Since last month</span>
                  </p> -->
                </div>
              </div>
            </div>
          </div>

		  <?php else: ?>
			<br><br><br>
		 <?php endif ?>
        </div>
      </div>
    </div>
