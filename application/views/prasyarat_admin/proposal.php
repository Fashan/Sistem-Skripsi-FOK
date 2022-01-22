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
								<?php if ($prasyarat->status_fileproposal == 'belum') : ?>
									<input type="checkbox" class="" id="check_proposal">
									<?php else: ?>
									<input type="checkbox" class="" id="check_proposal" checked>
								<?php endif ?>
								<label class="form-check-label" for="check_proposal">Proposal yang telah di ACC</label>
							</div>
						</div>
						<div class="col-7">
							<button type="button" class="btn btn-primary" onclick="download_prasyarat_proposal('<?= $mahasiswa->nim ?>','<?= $prasyarat->file_proposal ?>')"><i class="fas fa-file-download"></i></button>
						</div>
						<div class="col-5 mt-3">
							<div class="form-check">
								<?php if ($prasyarat->status_filekdn == 'belum') : ?>
									<input type="checkbox" class="" id="check_kdn">
								<?php else : ?>
									<input type="checkbox" class="" id="check_kdn" checked>
								<?php endif ?>
								<label class="form-check-label" for="check_kdn">File KDN </label>
							</div>
						</div>
						<div class="col-7 mt-3">
							<button type="button" class="btn btn-primary" onclick="download_prasyarat_proposal('<?= $mahasiswa->nim ?>','<?= $prasyarat->file_kdn ?>')"><i class="fas fa-file-download"></i></button>
						</div>
						<div class="col-5 mt-3">
							<div class="form-check">
								<?php if ($prasyarat->status_filekartubimbingan == 'belum') : ?>
									<input type="checkbox" class="" id="check_kartubimbingan">
								<?php else : ?>
									<input type="checkbox" class="" id="check_kartubimbingan" checked>
								<?php endif ?>
								<label class="form-check-label" for="check_kartubimbingan">File Kartu Bimbingan Proposal Asli</label>
							</div>
						</div>
						<div class="col-7 mt-3">
							<button type="button" class="btn btn-primary" onclick="download_prasyarat_proposal('<?= $mahasiswa->nim ?>','<?= $prasyarat->file_kartubimbingan ?>')"><i class="fas fa-file-download"></i></button>
						</div>
						<div class="col-5 mt-3">
							<div class="form-check">
								<?php if ($prasyarat->status_filekhs == 'belum') : ?>
									<input type="checkbox" class="" id="check_khs">
								<?php else : ?>
									<input type="checkbox" class="" id="check_khs" checked>
								<?php endif ?>
								<label class="form-check-label" for="check_khs">File KHS Terakhir</label>
							</div>
						</div>
						<div class="col-7 mt-3">
							<button type="button" class="btn btn-primary" onclick="download_prasyarat_proposal('<?= $mahasiswa->nim ?>','<?= $prasyarat->file_khs ?>')"><i class="fas fa-file-download"></i></button>
						</div>
						<div class="col-12">
							<div class="button-group float-right">
								<div id='btn-terimacheck'>
									<button type="button" class="btn btn-danger" onclick="tolak_file_p(<?= $prasyarat->id ?>)">tolak</button>
									<?php if ($prasyarat->status_prasyarat == 'diterima') : ?>
										<button id="btn-halprop1" type="button" class="btn btn-success" onclick="halaman_jadwal_seminar()">terima</button>
										<?php else : ?>
										<button id="btn-halprop2" type="button" class="btn btn-success" onclick="halaman_jadwal_seminar()" disabled>terima</button>
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

