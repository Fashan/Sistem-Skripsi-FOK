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
				<h3 id="id_absen" class="mb-0" data-id =<?= $absen->id ?> ="<?= $mahasiswa->user_id ?>">Dosen yang Hadir dalam Seminar Proposal</h3>
				<form action="" class="mt-3">
					<div class="row">
						<div class="col-6">
							<div class="form-check">
								<?php if ($absen->pembimbing_1 == 'belum') : ?>
									<input type="checkbox" class="" id="check_pembimbing1">
									<?php else: ?>
									<input type="checkbox" class="" id="check_pembimbing1" checked>
								<?php endif ?>
								<label class="form-check-label" for="check_pembimbing1"><?= $dosen[0]->nama ?> (Pembimbing 1 Proposal)</label>
							</div>
						</div>
						
						<div class="col-6 ">
							<div class="form-check">
								<?php if ($absen->penguji_1 == 'belum') : ?>
									<input type="checkbox" class="" id="check_penguji1">
								<?php else : ?>
									<input type="checkbox" class="" id="check_penguji1" checked>
								<?php endif ?>
								<?php if ($dosen[2]) : ?>
									<label class="form-check-label" for="check_penguji1"><?= $dosen[2]->nama ?> (Penguji 1 Proposal)</label>
								<?php else : ?>
									<label class="form-check-label">belum dipilih</label>
								<?php endif ?>
							</div>
						</div>

						<div class="col-6 mt-3">
							<div class="form-check">
								<?php if ($absen->pembimbing_2 == 'belum') : ?>
									<input type="checkbox" class="" id="check_pembimbing2">
								<?php else : ?>
									<input type="checkbox" class="" id="check_pembimbing2" checked>
								<?php endif ?>
								<label class="form-check-label" for="check_pembimbing2"><?= $dosen[1]->nama ?> (Pembimbing 2 Proposal)</label>
							</div>
						</div>
					
						<div class="col-6 mt-3">
							<div class="form-check">
								<?php if ($absen->penguji_2 == 'belum') : ?>
									<input type="checkbox" class="" id="check_penguji2">
								<?php else : ?>
									<input type="checkbox" class="" id="check_penguji2" checked>
								<?php endif ?>
								<?php if ($dosen[3]) : ?>
									<label class="form-check-label" for="check_penguji2"><?= $dosen[3]->nama ?> (Penguji 2 Proposal)</label>
								<?php else : ?>
									<label class="form-check-label" >belum dipilih</label>
								<?php endif ?>
							</div>
						</div>
						
						<div class="col-12">
							<div class="button-group float-right">
								<!-- <a href="<?= base_url("admin/jadwal_seminar") ?>" class="btn btn-success">Kirim</a> -->
								<button type="button" class="btn btn-success" onclick="selesai_seminar(<?= $jadwal->id ?>)">Kegiatan selesai</button>
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

