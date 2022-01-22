<div class="container-fluid mt--6">
<div class="row">
	<div class="col-md-12">
				<div class="card">
            <!-- Card header -->
            <div class="card-header">
			<h3 class="mb-0" id="identitas">Jadwal Seminar Proposal</h3>
            </div>
			<div class="card-body">
			<div class="row">
				<div class="col-md-6">
					<h3>Penguji 1 Proposal</h3>
					<?php if ($penguji[0]) : ?>
						<p><?= $penguji[0]->nama ?></p>
					<?php else : ?>
						<p>belum di tentukan</p>
					<?php endif ?>
				</div>
				<div class="col-md-6">
					<h3>Penguji 2 Proposal</h3>
					<?php if ($penguji[0]) : ?>
						<p><?= $penguji[1]->nama ?></p>
					<?php else : ?>
						<p>belum di tentukan</p>
					<?php endif ?>
				</div>
			</div>	

			<div class="row mt-4">
				<div class="col-md-3">
				<form action="">
				<div class="form-group">
					<label for="">Jadwal Seminar</label>
					<?php if (!$jadwal) : ?>
						<div class="input-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
						</div>
						<input class="form-control" placeholder="Select date" type="text" id="tanggal_seminar">
					</div>
					<?php else: ?>
						<div class="input-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
						</div>
						<input class="form-control" placeholder="Select date" type="text" id="tanggal_seminar" value="<?= custom_date('Y-m-d',$jadwal->tanggal); ?>">
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
						<input class="form-control" placeholder="Pick a time" type="text" id="timepicker" value="<?= custom_date('h:i A',$jadwal->tanggal); ?>">
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
							<button class="btn btn-success" onclick="jadwalkan_seminar_proposal(<?= $mahasiswa->user_id ?>)">Jadwalkan</button>
							<?php else: ?>
								<button class="btn btn-success" onclick="reschedule_seminar_proposal(<?= $mahasiswa->user_id ?>)">Reschedule</button>
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


