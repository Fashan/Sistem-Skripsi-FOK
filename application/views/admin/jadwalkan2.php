<div class="container-fluid mt--6">
<div class="row">
	<div class="col-md-12">
				<div class="card">
            <!-- Card header -->
            <div class="card-header">
			<h3 class="mb-0" id="identitas">Jadwal Sidang Skripsi</h3>
            </div>
			<div class="card-body">
			<div class="row">
				<div class="col-md-6">
					<h3>Penguji 1 Skripsi</h3>
					<p><?= $penguji[0]->nama ?></p>
				</div>
				<div class="col-md-6">
					<h3>Penguji 2 Skripsi</h3>
					<p><?= $penguji[1]->nama ?></p>
				</div>
			</div>	

			<div class="row mt-4">
				<div class="col-md-3">
				<form action="">
				<div class="form-group">
					<label for="">Jadwal Sidang</label>
					<?php if (!$jadwal) : ?>
						<div class="input-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
						</div>
						<input class="form-control" placeholder="Select date" type="text" id="tanggal_sidang">
					</div>
					<?php else: ?>
						<div class="input-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
						</div>
						<input class="form-control" placeholder="Select date" type="text" id="tanggal_sidang" value="<?= custom_date('Y-m-d',$jadwal->tanggal); ?>">
					</div>
					<?php endif ?>
				</div>
			</form>
				</div>
				<div class="col-md-3">
				<form action="">
				<div class="form-group">
					<label for="">Waktu Pelaksanaan</label>
					<?php if (!$jadwal) : ?>
						<div class="input-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
						</div>
						<input class="form-control" placeholder="Pick a time" type="text" id="timepicker">
					</div>
					<?php else: ?>
						<div class="input-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
						</div>
						<input class="form-control" placeholder="Pick a time" type="text" id="timepicker" value="<?= custom_date('h:i A',$jadwal->tanggal) ?>">
					</div>
					<?php endif ?>
				</div>
			</form>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="d-flex justify-content-end">
						<div class="btn-jadwal">
						<?php if (!$jadwal) : ?>
							<button class="btn btn-success" onclick="jadwalkan_sidang_skripsi(<?= $mahasiswa->user_id ?>)">Jadwalkan</button>
							<?php else: ?>
								<button class="btn btn-success" onclick="reschedule_sidang_skripsi(<?= $mahasiswa->user_id ?>)">Reschedule</button>
						<?php endif ?>
						</div>
					</div>
				</div>
			</div>
			</div>
            
          </div>
        </div>
	</div>
						
	
    
    </div>


