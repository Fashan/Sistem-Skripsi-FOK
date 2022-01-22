<!-- =========================================================
* Argon Dashboard PRO v1.1.0
=========================================================

* Product Page: https://www.creative-tim.com/product/argon-dashboard-pro
* Copyright 2019 Creative Tim (https://www.creative-tim.com)

* Coded by Creative Tim

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
 -->
 <!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
  <meta name="author" content="Creative Tim">
  <title><?= $judul; ?></title>
  <!-- Favicon -->
  <link rel="icon" href="<?= base_url('assets/img/logo_fok.png'); ?>" type="image/png">
  <!-- Fonts -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
  <!-- Icons -->
  <link rel="stylesheet" href="<?= base_url('assets/vendor/nucleo/css/nucleo.css'); ?>" type="text/css">
  <link rel="stylesheet" href="<?= base_url('assets/vendor/@fortawesome/fontawesome-free/css/all.min.css'); ?>" type="text/css">
    <!-- Page plugins datatable -->
	<link rel="stylesheet" href="<?= base_url('assets/vendor/datatables.net-bs4/css/dataTables.bootstrap4.min.css'); ?>">
  <link rel="stylesheet" href="<?= base_url('assets/vendor/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css'); ?>">
  <link rel="stylesheet" href="<?= base_url('assets/vendor/datatables.net-select-bs4/css/select.bootstrap4.min.css'); ?>">
	 <link rel="stylesheet" href="<?= base_url('assets/vendor/datatables.responsive/css/bootstrap.css'); ?>">
   <link rel="stylesheet" href="<?= base_url('assets/vendor/datatables.responsive/css/responsive.bootstrap4.min.css'); ?>">
   <link rel="stylesheet" href="<?= base_url('assets/vendor/timepicker/mdtimepicker.css'); ?>">
   <link rel="stylesheet" href="<?= base_url('assets/css/style.css'); ?>">
	 <link rel="stylesheet" href="<?= base_url("node_modules/animate.css/animate.css") ?>">
	 <link rel="stylesheet" href="<?= base_url("node_modules/aos/dist/aos.css") ?>">

  <!-- Argon CSS -->
  <link rel="stylesheet" href="<?= base_url('assets/css/argon.css?v=1.1.0'); ?>" type="text/css">
</head>

<?php if ($judul != "Login") : ?>
	<body>
<?php $this->tmp->view('templates/_sidenav'); ?>
  <!-- Main content -->
  <div class="main-content" id="panel">
	<?php $this->tmp->view('templates/_topnav'); ?>
 

		<?= $contents; ?>

		<?php $this->tmp->view('templates/_footer'); ?>
  </div>
</body>
<?php else : ?>
	<?= $contents; ?>
	<?php $this->tmp->view('templates/_footer'); ?>
	
	</body>
<?php endif ?>
</html>


<!-- ubah foto profile -->
<div class="modal fade animate__animated animate_fadeIn" id="ubah_foto" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ubah Foto Profil</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
			<form action="">
				<div class="form-group">
                    <!-- <label class="form-label" for="file"><b>File</b></label> -->
                    <div class="custom-file">
                        <input id="file_foto" accept="image/png, image/jpg, image/jpeg" type="file"  class="custom-file-input"  name="file" aria-describedby="inputGroupFileAddon01">
                        <label class="custom-file-label" for="file" id="filename3">Choose file</label>
                    </div>
                </div>
				</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" onclick="ubah_foto(<?= userdata()->user_id ?>)">Save changes</button>
      </div>
    </div>
  </div>
</div>

<!-- ubah password -->
<div class="modal fade" id="ubah_password" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ubah Password</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
		<form action="" id="form-password">
		<div class="form-group">
    <label for="username">Password Lama</label>
		<input type="hidden" value="<?= userdata()->user_id ?>" name="id">
    <input type="password" class="form-control password_lama" id="password_lama" aria-describedby="emailHelp" name="password_lama">
		<div class="invalid-feedback"></div>
  </div>
	<div class="form-group">
    <label for="username">Password Baru</label>
    <input type="password" class="form-control password" id="password_baru" aria-describedby="emailHelp" name="password">
		<div class="invalid-feedback"></div>
  </div>
	<div class="form-group">
    <label for="username">konfirmasi Password Baru</label>
    <input type="password" class="form-control passwordconf" id="passwordconf" aria-describedby="emailHelp" name="passwordconf">
		<div class="invalid-feedback"></div>
  </div>
		</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" onclick="ubah_password()">Save changes</button>
      </div>
    </div>
  </div>
</div>
