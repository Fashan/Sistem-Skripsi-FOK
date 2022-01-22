<div class="container-fluid mt--6">
<div class="row">
	<div class="col-md-12">
				<div class="card">
            <!-- Card header -->
            <div class="card-header">
            <div class="row">
				
				<div class="col-md-4">
				<h3 class="mb-0">Identitas Mahasiswa</h3>
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
			<p class="mt-3">Nama</p>
			<h3><?= $mahasiswa->nama ?></h3>
			<p class="mt-3">NIM</p>
			<p><?= $mahasiswa->username ?></p>
			<p class="mt-3">Judul</p>
			<p><?= $mahasiswa->judul ?></p>

			
			</div>
            
          </div>
        </div>

		<div class="col-md-12">
				<div class="card">
            <!-- Card header -->
            <div class="card-header">
				<h3 id="id_prasyarat" class="mb-0" data-id ="<?= $prasyarat->id ?>" data-mahasiswa_id = "<?= $mahasiswa->user_id ?>">List Prasyarat</h3>
				<form action="" class="mt-3">
					<div class="row">
						<div class="col-5">
							<div class="form-check">
								<?php if ($prasyarat->status_buktirevisi == 'belum') : ?>
									<input type="checkbox" class="" id="check_buktirevisi">
									<?php else: ?>
									<input type="checkbox" class="" id="check_buktirevisi" checked>
								<?php endif ?>
								<label class="form-check-label" for="check_buktirevisi">Bukti sudah selesai revisi keseluruhan</label>
							</div>
						</div>
						<div class="col-7">
							<button type="button" class="btn btn-primary" onclick="download_prasyarat_yudisium('<?= $mahasiswa->nim ?>','<?= $prasyarat->file_buktirevisi?>')"><i class="fas fa-file-download"></i></button>
						</div>
						<div class="col-5 mt-3">
							<div class="form-check">
								<?php if ($prasyarat->status_buktipublikasi == 'belum') : ?>
									<input type="checkbox" class="" id="check_buktipublikasi">
								<?php else : ?>
									<input type="checkbox" class="" id="check_buktipublikasi" checked>
								<?php endif ?>
								<label class="form-check-label" for="check_buktipublikasi">Bukti Publikasi jurnal</label>
							</div>
						</div>
						<div class="col-7 mt-3">
							<button type="button" class="btn btn-primary" onclick="download_prasyarat_yudisium('<?= $mahasiswa->nim ?>','<?= $prasyarat->file_buktipublikasi ?>')"><i class="fas fa-file-download"></i></button>
						</div>
						
						<div class="col-12">
							<div class="button-group float-right">
								<div id='btn-terimacheck'>
									<button type="button" class="btn btn-danger" onclick="tolak_file_y(<?= $prasyarat->id ?>)">tolak</button>
									<?php if ($prasyarat->status_prasyarat == 'diterima') : ?>
										<button id="btn-halyud1" type="button" class="btn btn-success" onclick="halaman_jadwal_yudisium()">terima</button>
										<?php else : ?>
										<button id="btn-halyud2" type="button" class="btn btn-success" onclick="halaman_jadwal_yudisium()" disabled>terima</button>
									<?php endif ?>
								</div>
							</div>
						</div>
					</div>
				</form>
        
            </div>
			
			</div>
            
          </div>
        </div>
	</div>
						
	
    
    </div>

