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
                    <label class="form-label" for="file"><b>Proposal yang telah di ACC</b></label>
                    <div class="custom-file">
                        <input accept="aplication/pdf" type="file" class="custom-file-input" id="file_proposal" name="file" aria-describedby="inputGroupFileAddon01">
                        <label class="custom-file-label" for="file" id="filename_proposal">Choose file</label>
                    </div>
                </div>
			<div class="form-group">
                    <label class="form-label" for="file"><b>KDN</b></label>
                    <div class="custom-file">
                        <input accept="aplication/pdf" type="file" class="custom-file-input" id="file_kdn" name="file" aria-describedby="inputGroupFileAddon01">
                        <label class="custom-file-label" for="file" id="filename_kdn">Choose file</label>
                    </div>
                </div>
				<div class="form-group">
					<label class="form-label" for="file"><b>Kartu Bimbingan Proposal Asli</b></label>
                    <div class="custom-file">
						<input accept="aplication/pdf" type="file" class="custom-file-input" id="file_kartubimbingan" name="file" aria-describedby="inputGroupFileAddon01">
                        <label class="custom-file-label" for="file" id="filename_kartubimbingan">Choose file</label>
                    </div>
                </div>
				<div class="form-group">
						<label class="form-label" for="file"><b>KHS Terakhir</b></label>
						<div class="custom-file">
							<input accept="aplication/pdf" type="file" class="custom-file-input" id="file_khs" name="file" aria-describedby="inputGroupFileAddon01">
							<label class="custom-file-label" for="file" id="filename_khs">Choose file</label>
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
				<button class="btn btn-primary" onclick="upload_prasyarat_p(<?= $mahasiswa->user_id ?>)">Daftar</button>
				<?php else: ?>
					<?php if ($prasyarat->status_prasyarat == 'menunggu') : ?>
						<p>menunggu...</p>
					<?php endif ?>

					<?php if ($prasyarat->status_prasyarat == 'ditolak') : ?>
						<button class="btn btn-warning" onclick="reupload_prasyarat_p(<?= $mahasiswa->user_id ?>)">Daftar Kembali</button>
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
						<?php if ($moderator) : ?>
							<h3>Moderator</h3>
							<p><?= $moderator->nama ?></p>
							<h3>Catatan</h3>
						<ul>
							<li><small>untuk minimal audience Seminar Proposal sejumlah 5 mahasiswa</small></li>
							<li><small>diharapkan untuk mencari satu mahasiswa yang akan dijadikan sebagai moderator</small></li>
						</ul>
							<?php else: ?>
								<div class="rangkaian-form" >
								<h3>Isi data Moderator</h3>
								<form id="form-moderator">
									<div class="form-row align-items-center">
							<div class="col-6">
							<label class="sr-only" for="inlineFormInput">Name</label>
							<input type="hidden" value="<?= userdata()->user_id ?>" name="mahasiswa_id">
							<input type="text" class="form-control mb-2"  placeholder="Nama Mahasiswa" name="nama">
							</div>
							<div class="col-auto">
							<label class="sr-only" for="inlineFormInputGroup">Username</label>
							<div class="input-group mb-2">
								<input type="text" class="form-control" placeholder="NIM" name="nim">
							</div>
							</div>
							<div class="col-auto">
							<button type="button" class="btn btn-primary mb-2" onclick="set_moderator()"><i class="fas fa-paper-plane"></i></button>
							</div>
						</div>
						</form>
						<h3>Catatan</h3>
						<ul>
							<li><small>untuk minimal audience Seminar Proposal sejumlah 5 mahasiswa</small></li>
							<li><small>diharapkan untuk mencari satu mahasiswa yang akan dijadikan sebagai moderator</small></li>
						</ul>
						</div>
						<?php endif ?>
						

      </div>
      <!-- <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div> -->
    </div>
  </div>
</div>

