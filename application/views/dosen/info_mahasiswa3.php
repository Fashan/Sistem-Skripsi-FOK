<div class="container-fluid mt--6">
<div class="row">
	<div class="col-md-12">
				<div class="card">
            <!-- Card header -->
            <div class="card-header">
            <div class="row">
				<div class="col-md-4">
				<h3 class="mb-0" id="identitas" data-mahasiswa_id="<?= $mahasiswa->user_id ?>" data-dosen2id="<?= $pembimbing[1]->user_id ?>" data-dosenrole1="<?= str_replace(" ","_",$pembimbing[0]->role) ?>" data-dosenrole2="<?= str_replace(" ","_",$pembimbing[1]->role) ?>">Identitas Mahasiswa</h3>
				</div>
				<div class="col-md-8">
					<div class="float-right">
					<h4><?= $mahasiswa->status ?></h4>
					</div>
				</div>
				<div class="col-md-12">
				<?php if ($this->session->flashdata('msg')) : ?>
								<?= $this->session->flashdata('msg') ?>
							<?php endif ?>
				</div>
			</div>
              
            </div>
			<div class="card-body">
			<p class="mt-3">Nama </p>
			<h3><?= $mahasiswa->nama ?></h3>
			<p class="mt-3">NIM</p>
			<p><?= $mahasiswa->username ?></p>
			<p class="mt-3">Judul</p>
			<p><?= $mahasiswa->judul ?></p>

			<?php if ($jadwal) : ?>
				<div class="row mt-3">
			<div class="col-md-12">
				  <div class="d-flex flex-column">
				  <div class="align-self-center">
					<?php if ($absen->pembimbing_1 == 'hadir' && $pembimbing[0]->role == 'Pembimbing 1 Skripsi/TA') : ?>
						<button data-toggle="modal" data-target="#nilai_skripsi" class="btn btn-success text-white" data-aos="zoom-in">berikan nilai</button>
					<button data-toggle="modal" data-target="#modal-catatan_skripsi" class="btn btn-success text-white" data-aos="zoom-in">Catatan</button>
				
						<?php else: ?>
							<?php if ($absen->pembimbing_2 == 'hadir' && $pembimbing[0]->role == 'Pembimbing 2 Skripsi/TA') : ?>
								<button data-toggle="modal" data-target="#nilai_skripsi" class="btn btn-success text-white" data-aos="zoom-in">berikan nilai</button>
							<?php else: ?>
									<p>mohon maaf Anda tidak dapat mengakses sistem</p>
							<?php endif ?>
					<?php endif ?>
				
				
				  </div>
				  </div>
					</div>
			  </div>
		<?php else : ?>
			<?php if ($pembimbing[0]->role == "Pembimbing 1 Skripsi/TA") : ?>
				<div class="row" data-aos="fade-up">
				  <div class="col-md-6">
				  <div class="d-flex flex-column">
				  <div class="align-self-center">
				  <h3 class="mb-0 text-center">Pembimbing 1</h3>
					<div class="button-acc">
				 <?php if ($skripsi->status_pem1 == 'belum ACC') : ?>
					<button class="btn btn-primary mt-1" onclick="acc_skripsi(<?= $skripsi->id ?>,'status_pem1')">ACC Skripsi</button>
					<?php else: ?>
						<button class="btn btn-danger mt-1" onclick="batal_skripsi(<?= $skripsi->id ?>,'status_pem1')">batalkan Sidang Skripsi</button>
				 <?php endif ?>
				 </div>
				  </div>
				  </div>
				  </div>
				  <div class="col-md-6">
				  <div class="d-flex flex-column">
				  <div class="align-self-center">
				  <h3 class="mb-0 text-center">Pembimbing 2</h3>
				  <p class="text-center mt-2"><?= $skripsi->status_pem2 ?></p>
				  </div>
				  </div>
					</div>
			  </div>
			<?php else: ?>
				<div class="row" data-aos="fade-up">
				  <div class="col-md-6">
				  <div class="d-flex flex-column">
				  <div class="align-self-center">
				  <h3 class="mb-0 text-center">Pembimbing 2</h3>
				 	<div class="button-acc">
					 <?php if ($skripsi->status_pem2 == 'belum ACC') : ?>
					<button class="btn btn-primary mt-1" onclick="acc_skripsi(<?= $skripsi->id ?>,'status_pem2')">ACC Skripsi</button>
					<?php else: ?>
						<button class="btn btn-danger mt-1" onclick="batal_skripsi(<?= $skripsi->id ?>,'status_pem2')">batalkan Sidang Skripsi</button>
					<?php endif ?>
					 </div>
				  </div>
				  </div>
				  </div>
				  <div class="col-md-6">
				  <div class="d-flex flex-column">
				  <div class="align-self-center">
				  <h3 class="mb-0 text-center">Pembimbing 1</h3>
					<p class="text-center mt-2"> <?= $skripsi->status_pem1 ?></p>
				  </div>
				  </div>
					</div>
			  </div>
				
			<?php endif ?>
			<div class="row mt-3"  data-aos="zoom-in" data-aos-offset="50">
			<div class="col-md-12">
				  <div class="d-flex flex-column">
				  <div class="align-self-center">
				<?php if ($skripsi->file) : ?>
					<a href="<?= base_url("mahasiswa/download_skripsi/".$skripsi->file) ?>" class="btn btn-success text-white">Unduh Skripsi Fix</a>
					<?php else: ?>
						<button class="btn btn-success text-white" disabled>Unduh Skripsi Fix</button>
				<?php endif ?>
				  </div>
				  </div>
					</div>
			  </div>
		<?php endif ?>
			</div>
            
          </div>
        </div>
	</div>
						
	<div class="row">
	<div class="col-md-12">
	<div class="nav-wrapper">
    <ul class="nav nav-pills nav-fill flex-column flex-md-row" id="tabs-icons-text" role="tablist" data-aos="fade-up">

			<li class="nav-item">
            <a class="nav-link mb-sm-3 mb-md-0 active" id="tabs-icons-text-1-tab" data-toggle="tab" href="#tabs-icons-text-1" role="tab" aria-controls="tabs-icons-text-1" aria-selected="true"><i class="fas fa-user-tie mr-2"></i><?= $pembimbing[0]->nama ?> (<?= $pembimbing[0]->role ?>)</a>
        </li>		

		
		<li class="nav-item">
            <a class="nav-link mb-sm-3 mb-md-0" id="tabs-icons-text-2-tab" data-toggle="tab" href="#tabs-icons-text-2" role="tab" aria-controls="tabs-icons-text-2" aria-selected="false"><i class="fas fa-user-tie mr-2"></i><?= $pembimbing[1]->nama ?> (<?= $pembimbing[1]->role ?>)</a>
        </li>	

        
    </ul>
</div>
<div class="tab-content" id="myTabContent" data-aos="fade=up" data-aos-delay="500">
            <div class="tab-pane fade show active" id="tabs-icons-text-1" role="tabpanel" aria-labelledby="tabs-icons-text-1-tab">
						<div class="card">
            <!-- Card header -->
            <div class="card-header">
						<div class="row">
				  <div class="col">
				  <h3 class="mb-0">Daftar Bimbingan</h3>
				  </div>
				  <div class="col-md-2 justify-content-end">
					<?php foreach ($role as $r) : ?>
						<?php if ($r->role =="dosen") : ?>
													          <!-- Button trigger modal -->
<button type="button" id="btn-tambahbp" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal-bimbingan" data-id="<?= $mahasiswa->user_id ?>" data-role_id="<?= $r->id ?>" data-username="<?= $mahasiswa->username ?>" data-role="<?= str_replace(" ","_",$pembimbing[0]->role) ?>">
  <i class="fas fa-users"></i> Tambah Topik 
</button>
						<?php endif ?>
					<?php endforeach ?>
					</div>
			  </div>

            </div>
            <div class=" py-4  table-responsive">
              <table class="table table-flush" id="datatable-logbimbingandosen3">
                <thead class="thead-light">
                  <tr>
					<th>No</th>
                    <th>Tanggal</th>
                    <th>Topik</th>
                    <th>Status</th>
                    <th>Oleh</th>
                    <th>file</th>
                    <th>Aksi</th>
                  </tr>
                </thead>

                <tbody>
                  
                  
                </tbody>
              </table>
            </div>
          </div>
            </div>
           

					  <div class="tab-pane fade active" id="tabs-icons-text-2" role="tabpanel" aria-labelledby="tabs-icons-text-2-tab">

								<div class="card">
            <!-- Card header -->
            <div class="card-header">
				

            </div>
            <div class=" py-4  table-responsive">
              <table class="table table-flush" id="datatable-logbimbingandosen4">
                <thead class="thead-light">
                  <tr>
					<th>No</th>
                    <th>Tanggal</th>
                    <th>Topik</th>
                    <th>Status</th>
                    <th>Oleh</th>
                    <th>file</th>
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
	</div>
    
    </div>


<!-- delete bimbingan skripsi -->
<div class="modal fade" id="hapus_bp" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Hapus Log Bimbingan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Apakah log bimbingan ini ingin di hapus?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-danger btn-delete">Hapus</button>
      </div>
    </div>
  </div>
</div>


		<!-- tambah topik bimbingan -->
		<div class="modal fade" id="modal-bimbingan" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Topik</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form action="" method="POST" id="form-bp">
			<div class="form-group">
				<input type="hidden" id="id" name="id">
				<input type="hidden" name="status" value="ditolak">
    <label for="text_bimbingan"><b>Bimbingan</b></label>
    <textarea class="form-control" id="text_bimbingan" rows="2"></textarea>
  </div>
	<div class="form-group">
                    <label class="form-label" for="file"><b>Upload File</b></label>
                    <div class="custom-file">
                        <input accept="aplication/pdf" type="file" class="custom-file-input" id="file_bimbingan" name="file" aria-describedby="inputGroupFileAddon01">
                        <label class="custom-file-label" for="file" id="filename">Choose file</label>
                    </div>
                </div>

   
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" onclick="bimbingan2(<?= userdata()->user_id ?>)">Kirim</button>
        </form>
      </div>
    </div>
  </div>
</div>



		<!-- edit topik bimbingan -->
		<div class="modal fade" id="modal-editbimbingan" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Topik</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form action="" method="POST" id="form-bp">
			<div class="form-group">
				<input type="hidden" id="id" name="id">
				<input type="hidden" name="status" value="ditolak">
    <label for="text_bimbingan"><b>Bimbingan</b></label>
    <textarea class="form-control" id="text_bimbingan2" rows="2"></textarea>
  </div>
	<div class="form-group">
                    <label class="form-label" for="file"><b>Upload File</b></label>
                    <div class="custom-file">
                        <input accept="aplication/pdf" type="file" class="custom-file-input" id="file_bimbingan2" name="file" aria-describedby="inputGroupFileAddon01">
                        <label class="custom-file-label" for="file" id="filename2">Choose file</label>
                    </div>
                </div>

   
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" id="btn-editbp" class="btn btn-primary" onclick="editlogbp2()">Save</button>
        </form>
      </div>
    </div>
  </div>
</div>



<!-- delete bimbingan skripsi -->
<div class="modal fade" id="nilai_skripsi" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Input nilai</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
			<div class="form-group">
    <label for="input-nilai">input nilai</label>
    <input type="text" class="form-control" id="input-nilai" aria-describedby="emailHelp" placeholder="0">
  </div>
      </div>
			<div class="row">
					<div class="col-md-12">
						<div class="note-card">
							<h5>CATATAN</h5>
							<ul>
								<li>penilaian yang diberikan yaitu dari angka 0 - 100</li>
								<li>Range nilai bisa dilihat pada gambar di bawah ini:</li>
								<img class="zoom" src="<?= base_url("assets/img/nilai.jpeg") ?>" alt="gambar nilai" width="20%">
							</ul>
							
						</div>
					</div>
					<div class="col-md-12 modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        	<button type="button" class="btn btn-primary" onclick="nilai_skripsi()" >kirim</button>
					</div>
				</div>	
    </div>
  </div>
</div>




<!-- Modal -->
<div class="modal fade" id="modal-catatan_skripsi" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Catatan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
	<form action="<?= base_url("dosen/catatan_skripsi/".$mahasiswa->user_id.'/'.$pembimbing[0]->user_id) ?>" method="post">
	<div class="form-group">
    <label for="exampleFormControlSelect1">Pilihan Catatan</label>
    <select class="form-control" id="exampleFormControlSelect1" name="catatan">
	<option value="" selected>pilih...</option>
      <option value="lulus dengan revisi 1 bulan">lulus dengan revisi 1 bulan</option>
      <option value="lulus dengan revisi 2 bulan">lulus dengan revisi 2 bulan</option>
      <option value="lulus dengan revisi 3 bulan">lulus dengan revisi 3 bulan</option>
      <option value="lulus dengan tanpa revisi">lulus dengan tanpa revisi</option>
      <option value="lulus dengan revisi">lulus dengan revisi</option>
    </select>
  </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">kirim</button>
		</form>
      </div>
    </div>
  </div>
</div>
