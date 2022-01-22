<div class="container-fluid mt--6">
<div class="row">
	<div class="col-md-12">
				<div class="card">
            <!-- Card header -->
            <div class="card-header">
            <div class="row">
				<div class="col-md-4">
				<h3 class="mb-0" id="identitas">Identitas Mahasiswa</h3>
				</div>
				<div class="col-md-8">
					<div class="float-right">
					<h4><?= $mahasiswa->status ?></h4>
					</div>
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

			<div class="row">
				<div class="col-md-6">
				<form action="">
				<div class="form-group">
                    <label class="form-label" for="file"><b>Bukti sudah selesai revisi keseluruhan</b></label>
                    <div class="custom-file">
                        <input accept="aplication/pdf" type="file" class="custom-file-input" id="file_buktirevisi" name="file" aria-describedby="inputGroupFileAddon01">
                        <label class="custom-file-label" for="file" id="filename_buktirevisi">Choose file</label>
                    </div>
                </div>
				<div class="form-group">
                    <label class="form-label" for="file"><b>Bukti publikasi jurnal</b></label>
                    <div class="custom-file">
                        <input accept="aplication/pdf" type="file" class="custom-file-input" id="file_buktipublikasi" name="file" aria-describedby="inputGroupFileAddon01">
                        <label class="custom-file-label" for="file" id="filename_buktipublikasi">Choose file</label>
                    </div>
                </div>
			</form>
				</div>
			</div>
			
		<div class="row">
			<div class="col-md-12">
			<div class="d-flex justify-content-center">
				<div class="btn-daftar">
			<?php if (!$prasyarat) : ?>
				<button class="btn btn-primary" onclick="upload_prasyarat_y(<?= $mahasiswa->user_id ?>)">Daftar</button>
				<?php else: ?>
					<?php if ($prasyarat->status_prasyarat == 'menunggu') : ?>
						<p>menunggu...</p>
					<?php endif ?>

					<?php if ($prasyarat->status_prasyarat == 'ditolak') : ?>
						<button class="btn btn-warning" onclick="reupload_prasyarat_y(<?= $mahasiswa->user_id ?>)">Daftar Kembali</button>
					<?php endif ?>
					<?php if ($prasyarat->status_prasyarat == 'diterima') : ?>
						<button class="btn btn-primary" data-toggle="modal" data-target="#jadwal">Lihat Jadwal</button>
					<?php endif ?>
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

	

	<!-- Modal -->
	<div class="modal fade bd-example-modal-lg" id="jadwal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Lihat Jadwal</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
						<h3>Kegiatan</h3>
						<p><?= $jadwal->keterangan ?></p>
						<h3>Tanggal</h3>
						<p><?= custom_date('d-M-Y',$jadwal->tanggal) ?></p>
						<h3>Jam</h3>
						<p><?= custom_date('h:i A',$jadwal->tanggal); ?></p>
						
						

      </div>
      <!-- <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div> -->
    </div>
  </div>
</div>

