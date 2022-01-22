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
				<h3 id="id_absen" class="mb-0" data-id =<?= $absen->id ?> ="<?= $mahasiswa->user_id ?>">Dosen yang Hadir dalam Sidang Skripsi</h3>
				<form action="" class="mt-3">
					<div class="row">
						<div class="col-6">
							<div class="form-check">
								<?php if ($absen->pembimbing_1 == 'belum') : ?>
									<input type="checkbox" class="" id="check_pembimbing1s">
									<?php else: ?>
									<input type="checkbox" class="" id="check_pembimbing1s" checked>
								<?php endif ?>
								<label class="form-check-label" for="check_pembimbing1s"><?= $dosen[0]->nama ?> (Pembimbing 1 Skripsi/TA)</label>
							</div>
						</div>
						
						<div class="col-6 ">
							<div class="form-check">
								<?php if ($absen->penguji_1 == 'belum') : ?>
									<input type="checkbox" class="" id="check_penguji1s">
								<?php else : ?>
									<input type="checkbox" class="" id="check_penguji1s" checked>
								<?php endif ?>
								<label class="form-check-label" for="check_penguji1s"><?= $dosen[2]->nama ?> (Penguji 1 Skripsi/TA)</label>
							</div>
						</div>

						<div class="col-6 mt-3">
							<div class="form-check">
								<?php if ($absen->pembimbing_2 == 'belum') : ?>
									<input type="checkbox" class="" id="check_pembimbing2s">
								<?php else : ?>
									<input type="checkbox" class="" id="check_pembimbing2s" checked>
								<?php endif ?>
								<label class="form-check-label" for="check_pembimbing2s"><?= $dosen[1]->nama ?> (Pembimbing 2 Skripsi/TA)</label>
							</div>
						</div>
					
						<div class="col-6 mt-3">
							<div class="form-check">
								<?php if ($absen->penguji_2 == 'belum') : ?>
									<input type="checkbox" class="" id="check_penguji2s">
								<?php else : ?>
									<input type="checkbox" class="" id="check_penguji2s" checked>
								<?php endif ?>
								<label class="form-check-label" for="check_penguji2s"><?= $dosen[3]->nama ?> (Penguji 2 Skripsi/TA)</label>
							</div>
						</div>
						
						<div class="col-12">
							<div class="button-group float-right">
								<button type="button" class="btn btn-success" onclick="selesai_sidang(<?= $jadwal->id ?>)">Kegiatan selesai</button>
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

