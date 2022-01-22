
	<!-- Page content -->
  <div class="container-fluid mt--6">
      <div class="row justify-content-center">
        <div class="col-md-12">
		<div class="card">
            <!-- Card header -->
            <div class="card-header">
              <div class="row">
				  <div class="col">
				  <h3 class="mb-0">Users</h3>
				  </div>
				  <div class="col-md-2 justify-content-end">
						          <!-- Button trigger modal -->
<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal-adduser">
  <i class="fas fa-users"></i> add user
</button>
					</div>
			  </div>
              <p class="text-sm mb-0">
               kumpulan data User di FOK
              </p>
            </div>
						<div class=" py-4 table-responsive">
              <table class="table table-flush" id="datatable-user">
                <thead class="thead-light">
                  <tr>
									<th>No</th>
                    <th>Nama</th>
                    <th>NIM/NIP</th>
                    <th>Email</th>
                    <th>Jurusan</th>
                    <th>Prodi</th>
                    <th>Role</th>
                    <th>Aksi</th>
                  </tr>
                </thead>

                <tbody>
                  
                  
                </tbody>
              </table>
            </div>
          </div>
        </div>

      </div>
	

    </div>
		

		<!-- Modal -->
<div class="modal fade" id="modal-adduser" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah User</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form action="<?= base_url('user/adduser'); ?>" method="POST" id="form-adduser">
			<div class="form-group">
    <label for="username">Nama</label>
    <input type="text" class="form-control" aria-describedby="emailHelp" name="nama">
  </div>
  <div class="form-group">
    <label for="username">NIM/NIP</label>
    <input type="text" class="form-control" aria-describedby="emailHelp" name="username">
  </div>
       <div class="form-group">
    <label for="username">Email</label>
    <input type="email" class="form-control" aria-describedby="emailHelp" name="email">
  </div>
	<div class="form-group">
    <label for="exampleFormControlSelect1">Prodi</label>
    <select class="form-control" name="prodi_id">
			<option value="">pilih...</option>
		<?php foreach ($prodi as $prd) : ?>
				<option value="<?= $prd->id; ?>"><?= $prd->nama_prodi; ?></option>
			<?php endforeach ?>
    </select>
  </div>
       <div class="form-group">
    <label for="exampleFormControlSelect1">Jurusan</label>
    <select class="form-control" name="jurusan_id">
		<option value="">pilih...</option>
		<?php foreach ($jurusan as $jrn) : ?>
				<option value="<?= $jrn->id; ?>"><?= $jrn->nama_jurusan; ?></option>
			<?php endforeach ?>
    </select>
  </div>
       <div class="form-group">
    <label for="exampleFormControlSelect1">Role</label>
    <select id="menu_role1" class="form-control" name="role_id">
		<option value="">pilih...</option>
		<?php foreach ($role as $rl) : ?>
				<option value="<?= $rl->id; ?>" data-name="<?= $rl->role; ?>"><?= $rl->role; ?></option>
			<?php endforeach ?>
    </select>
  </div>
	<div id="menu_pa1">
		
	</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Add</button>
        </form>
      </div>
    </div>
  </div>
</div>


<!-- Modal -->
<div class="modal fade" id="modal-edituser" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit User</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form action="<?= base_url('user/edituser'); ?>" id="form-edituser">
         <div class="form-group">
    <label for="username">Nama</label>
    <input type="hidden" class="form-control" id="user_id" aria-describedby="emailHelp" name="user_id">
    <input type="text" class="form-control" id="nama" aria-describedby="emailHelp" name="nama">
  </div>
	<small>menu optional</small>
	<div class="form-group">
    <label for="password">Password</label>
    <input type="password" class="form-control" id="password" aria-describedby="emailHelp" name="password">
  </div>
         <div class="form-group">
    <label for="username">NIM/NIP</label>
    <input type="text" class="form-control" id="username" aria-describedby="emailHelp" name="username">
  </div>
       <div class="form-group">
    <label for="email">Email</label>
    <input type="email" class="form-control" id="email" aria-describedby="emailHelp" name="email">
  </div>
       <div class="form-group">
    <label for="exampleFormControlSelect1">Prodi</label>
    <select class="form-control" name="prodi_id" id="prodi-menu">
		<?php foreach ($prodi as $prd) : ?>
				<option value="<?= $prd->id; ?>"><?= $prd->nama_prodi; ?></option>
			<?php endforeach ?>
    </select>
  </div>
       <div class="form-group">
    <label for="exampleFormControlSelect1">Jurusan</label>
    <select class="form-control" name="jurusan_id" id="jurusan-menu">
		<?php foreach ($jurusan as $jrn) : ?>
				<option value="<?= $jrn->id; ?>"><?= $jrn->nama_jurusan; ?></option>
			<?php endforeach ?>
    </select>
  </div>
       <div class="form-group">
    <label for="exampleFormControlSelect1">Role</label>
    <select id="menu_role2" class="form-control" name="role_id">
		<?php foreach ($role as $rl) : ?>
				<option value="<?= $rl->id; ?>"  data-name="<?= $rl->role; ?>"><?= $rl->role; ?></option>
			<?php endforeach ?>
    </select>
  </div>
	<div id="menu_pa2">
		<h5>tes</h5>
	</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Edit</button>
        </form>
      </div>
    </div>
  </div>
</div>
