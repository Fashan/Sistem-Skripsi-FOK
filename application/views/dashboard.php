<?php if (userdata()->role=="mahasiswa") : ?>
	  <div class="container-fluid mt--6">
			<div class="row">
				<div class="col-md-12">
					<div class="card">
						<div class="card-header">
						<div class="card-header">
            <h3 class="mb-0">Tabel Pengajuan Judul</h3>
              <p class="text-sm mb-0">
               Judul yang telah di ajukan
              </p>
            </div>
						</div>
						<div class="py-4 table-responsive">
							<table class="table table-flush" id="dashboard-ideskripsi">
							<thead class="thead-light">
                  <tr>
										<th>No</th>
                    <th>Judul</th>
                    <th>Abstrak</th>
                    <th>Keterangan</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
							</table>
						</div>
					</div>
				</div>
			</div>

			
		<div class="nav-wrapper">
	<ul class="nav nav-pills nav-pills-circle" id="tabs_2" role="tablist" >
				<li class="nav-item" data-aos="fade-right">
            <a class="nav-link rounded-circle active" id="tabs-icons-text-1-tab" data-toggle="tab" href="#tabs-icons-text-1" role="tab" aria-controls="tabs-icons-text-1" aria-selected="true"><span class="nav-link-icon d-block"><i class="far fa-copy"></i></span></a>
						
        </li>

					<li class="nav-item" data-aos="fade-left" data-aos-delay="200">
            <a class="nav-link" id="tabs-icons-text-2-tab" data-toggle="tab" href="#tabs-icons-text-2" role="tab" aria-controls="tabs-icons-text-2" aria-selected="false">   
							<span class="nav-link-icon d-block"><i class="fas fa-book"></i></i></span></a>
        </li>
    </ul>
</div>

<div class="row">
	<div class="col-md-4" data-aos="zoom-in" data-aos-duration = "1000" data-aos-delay="400">
	<div class="tab-content" id="myTabContent">
							<div class="tab-pane fade show active" id="tabs-icons-text-1" role="tabpanel" aria-labelledby="tabs-icons-text-1-tab">
							<div class="card">
							<div class="card-body">
								<h5 class="card-title">Upload Proposal Fix</h5>
								<div id="menu1">
									
								<?php if (get_proposal()) : ?>
												<?php if (get_proposal()->file) : ?>
													<?php $file = get_proposal()->file ?>
													<button class="btn btn-success btn-sm" disabled><?= $file ?></button>
													<button class="btn btn-danger btn-sm " onclick="hapus_proposal(<?= get_proposal()->id ?>)"><i class="fa fa-trash"></i></button>
													<?php else: ?>
														<p class="card-text">Silahkan mengunggah file Final Proposal.</p>
														<?php if (userdata()->status =='seminar proposal') : ?>
																<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-upload_proposal">
															Upload
														</button>
														<?php else: ?>
															<button type="button" class="btn btn-primary" disabled>
															Upload
														</button>
															<?php endif ?>
														
								<?php endif ?>
												<?php else: ?>
													<p class="card-text">Silahkan mengunggah file Final Proposal.</p>
												<?php if (userdata()->status =='seminar proposal') : ?>
													<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-upload_proposal">
												Upload
											</button>
											<?php else: ?>
												<button type="button" class="btn btn-primary" disabled>
												Upload
											</button>
												<?php endif ?>
								<?php endif ?>
								</div>
							</div>
						</div>
					
            </div>
            <div class="tab-pane fade" id="tabs-icons-text-2" role="tabpanel" aria-labelledby="tabs-icons-text-2-tab">
						<div class="card">
							<div class="card-body">
								<h5 class="card-title">Upload Skripsi Fix</h5>
								
							<div id="menu2">
							<?php if (get_skripsi()) : ?>
											<?php if (get_skripsi()->file ) : ?>
												<?php $file = get_skripsi()->file ?>
												<button class="btn btn-success btn-sm" disabled><?= $file ?></button>
												<button class="btn btn-danger btn-sm " onclick="hapus_skripsi(<?= get_skripsi()->id ?>)"><i class="fa fa-trash"></i></button>
											<?php else : ?>
												<p class="card-text">silakan menggunggah File Skripsi</p>
															<?php if (userdata()->status =='sidang skripsi') : ?>
															<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-upload_skripsi">
														Upload
													</button>
													<?php else: ?>
														<button type="button" class="btn btn-primary" disabled>
														Upload
													</button>
														<?php endif ?>
											<?php endif ?>
									<?php else: ?>
										<p class="card-text">silakan menggunggah File Skripsi</p>
										<?php if (userdata()->status =='sidang skripsi') : ?>
										<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-upload_skripsi">
									Upload
								</button>
								<?php else: ?>
									<button type="button" class="btn btn-primary" disabled>
									Upload
								</button>
									<?php endif ?>
								<?php endif ?>
							</div>
							</div>
						</div>
            </div>
        </div>
	</div>
	<div class="col-md-6 offset-2">
	<div class="card" data-aos="fade-up"> 
  <div class="card-body">
    <h5 class="card-title">Papan Pengumuman</h5>
		<ul>
		<?php if (userdata()->status == 'selesai seminar proposal') : ?>
		<li>setelah mahasiswa menyelesaikan Seminar Proposal, mahasiswa diwajibkan untuk mencari surat Pengantar melakukan penelitian </li>
		<?php endif ?>
		<?php if (get_proposal()) : ?>
			<?php if (get_proposal()->catatan && userdata()->status == 'selesai seminar proposal') : ?>
			<li>proposal <?= get_proposal()->catatan ?></li>
		<?php endif ?>
		<?php endif ?>
		<?php if (get_skripsi()) : ?>
			<?php if (get_skripsi()->catatan && userdata()->status == 'selesai sidang skripsi') : ?>
			<li>skripsi <?= get_skripsi()->catatan ?></li>
		<?php endif ?>
		<?php endif ?>
		</ul>
    <!-- <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6> -->
    <!-- <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p> -->
    <!-- <a href="#" class="card-link">Card link</a>
    <a href="#" class="card-link">Another link</a> -->
  </div>
</div>
	</div>
</div>
		</div>

<!-- upload file skripsi -->
<div class="modal fade" id="modal-upload_skripsi" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Upload file</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form action="">
                      <div class="form-group">
                          <!-- <label class="form-label" for="file"><b>File</b></label> -->
                          <div class="custom-file">
                              <input accept="aplication/pdf" type="file" class="custom-file-input" id="file_skripsi" name="file" aria-describedby="inputGroupFileAddon01">
                              <label class="custom-file-label" for="file" id="filename2">Choose file</label>
                          </div>
                      </div>
                      </form>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <?php if (get_skripsi()) : ?>
								<button type="button" class="btn btn-primary" onclick="upload_skripsi(<?= get_skripsi()->id ?>)">Upload</button>
							<?php endif ?>
            </div>
          </div>
        </div>
      </div>
	
			  
    <!-- upload file proposal -->
<div class="modal fade" id="modal-upload_proposal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Upload file</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="">
                  <div class="form-group">
                      <!-- <label class="form-label" for="file"><b>File</b></label> -->
                      <div class="custom-file">
                          <input accept="aplication/pdf" type="file" class="custom-file-input" id="file_proposal" name="file" aria-describedby="inputGroupFileAddon01">
                          <label class="custom-file-label" for="file" id="filename">Choose file</label>
                      </div>
                  </div>
                  </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
         <?php if (get_proposal()) : ?>
					 <button type="button" class="btn btn-primary" onclick="upload_proposal(<?= get_proposal()->id ?>)">Upload</button>
				 <?php endif ?>
        </div>
      </div>
    </div>
  </div>
  
  
		<!-- modal menampilkan catatan -->
		<div class="modal fade" id="modal-catatan2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Catatan</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                          <p id="catatan"></p>
                
                </div>
              </div>
            </div>
          </div>
          
          <!-- apload file bukti -->
          <div class="modal fade" id="modal-uploadbukti" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Upload File</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
          
                        
                <div class="form-group">
                              <label class="form-label" for="file"><b>File</b></label>
                              <div class="custom-file">
                                  <input accept="aplication/pdf" type="file" class="custom-file-input" id="filebukti" name="file" aria-describedby="inputGroupFileAddon01">
                                  <label class="custom-file-label" for="file" id="filename_bukti">Choose file</label>
                              </div>
                          </div>
          
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal" id="closefile">Close</button>
                  <button type="button" class="btn btn-primary" onclick="uploadbukti(<?= userdata()->user_id?>)">Upload</button>
          
                </div>
              </div>
            </div>
          </div>
          

<?php endif ?>

<?php if (userdata()->role == "dosen") : ?>
	<div class="container-fluid mt--6">
	<div class="row">
	<div class="col-md-12">
				<div class="card">
            <!-- Card header -->
            <div class="card-header">
            <h3 class="mb-0 text-center">Selamat Datang di SIF-OKe</h3>
             <br><br>
							<div>
						
							</div>
            </div>
            
          </div>
        </div>
	</div>
    
    </div>

<?php endif ?>

<?php if (userdata()->role == "admin") : ?>
	<div class="container-fluid mt--6">
	<div class="row">
	<div class="col-md-12">
				<div class="card ">
            <!-- Card header -->
            <div class="card-header">
            <h1 class="mb-0 text-center animate__animated animate__backInDown animate__slow">Selamat Datang di SIF-OKe</h1>
             <br><br>
							<div>
						
							</div>
            </div>
            
          </div>
        </div>
	</div>
    
    </div>

<?php endif ?>


<?php if (userdata()->role=="kaprodi") : ?>
	  <!-- Page content -->
		<div class="container-fluid mt--6">
	<div class="row">
	<div class="col-md-12">
				<div class="card">
            <!-- Card header -->
            <div class="card-header">
            <h3 class="mb-0">Tabel Pengajuan Judul</h3>
              <p class="text-sm mb-0">
               Judul yang telah di ajukan
              </p>
							<div>
							<?php if ($this->session->flashdata('msg')) : ?>
								<?= $this->session->flashdata('msg') ?>
							<?php endif ?>
							</div>
            </div>
            <div class=" py-4 table-responsive">
              <table class="table table-flush" id="dashboard-judulmahasiswa">
                <thead class="thead-light">
                  <tr>
										<th>No</th>
                    <th>Mahasiswa</th>
                    <th>Judul</th>
                    <th>Abstrak</th>
                    <th>Status</th>
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
<div class="modal fade" id="modal-judul" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Informasi</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <h3>Nama Mahasiswa</h3>
				<p id="nama_mahasiswa"></p>
        <h3>Judul</h3>
				<p id="judul"></p>
        <h3>Abstrak</h3>
				<p id="abstrak"></p>
				<h3>Referensi</h3>
				<button id="file" class="btn btn-success" onclick="download_ref()"></button>
      </div>
      <!-- <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div> -->
    </div>
  </div>
</div>
				<!-- Modal -->
				<!-- <div class="modal fade" id="modal-catatan" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Catatan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form action="<?= base_url('prodi/tolakjudul'); ?>" method="POST" id="form-tolakjudul">
			<div class="form-group">
				<input type="hidden" id="id" name="id">
				<input type="hidden" name="status" value="ditolak">
    <label for="exampleFormControlTextarea1">mohon memberikan catatan</label>
    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="catatan"></textarea>
  </div>

   
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Kirim</button>
        </form>
      </div>
    </div>
  </div>
</div> -->

<?php endif ?>

<?php if (userdata()->role=="PA") : ?>
	  <!-- Page content -->
		<div class="container-fluid mt--6">
	<div class="row">
	<div class="col-md-12">
				<div class="card">
            <!-- Card header -->
            <div class="card-header">
            <h3 class="mb-0">Tabel Pengajuan Judul</h3>
              <p class="text-sm mb-0">
               Judul yang telah di ajukan
              </p>
							<div class="message"></div>
							<?php if ($this->session->flashdata('msg')) : ?>
								<?= $this->session->flashdata('msg') ?>
							<?php endif ?>
            </div>
            <div class=" py-4 table-responsive">
              <table class="table table-flush" id="dashboard-PA">
                <thead class="thead-light">
                  <tr>
										<th>No</th>
                    <th>Mahasiswa</th>
                    <th>Judul</th>
                    <th>Abstrak</th>
                    <th>Status</th>
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
<div class="modal fade" id="modal-judul" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Informasi</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <h3>Nama Mahasiswa</h3>
				<p id="nama_mahasiswa"></p>
        <h3>Judul</h3>
				<p id="judul"></p>
        <h3>Abstrak</h3>
				<p id="abstrak"></p>
        <h3>Referensi</h3>
				<button id="file" class="btn btn-success" onclick="download_ref()"></button>
      </div>
      <!-- <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div> -->
    </div>
  </div>
</div>
				<!-- Modal -->
				<div class="modal fade" id="modal-catatan" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Catatan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form action="<?= base_url('prodi/tolakjudul'); ?>" method="POST" id="form-tolakjudul">
			<div class="form-group">
				<input type="hidden" id="id" name="id">
				<input type="hidden" name="status" value="ditolak">
    <label for="exampleFormControlTextarea1">mohon memberikan catatan</label>
    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="catatan"></textarea>
  </div>

   
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Kirim</button>
        </form>
      </div>
    </div>
  </div>
</div>

<?php endif ?>
