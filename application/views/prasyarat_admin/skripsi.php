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
						<div class="col-7">
							<div class="form-check">
								<?php if ($prasyarat->status_transkipnilai == 'belum') : ?>
									<input type="checkbox" class="" id="check_transkipnilai">
									<?php else: ?>
									<input type="checkbox" class="" id="check_transkipnilai" checked>
								<?php endif ?>
								<label class="form-check-label" for="check_transkipnilai">Transkip nilai dari puskom dengan ipk 2,50</label>
							</div>
						</div>
						<div class="col-5">
							<button type="button" class="btn btn-primary btn-sm" onclick="download_prasyarat_skripsi('<?= $mahasiswa->nim ?>','<?= $prasyarat->file_transkipnilai ?>')"><i class="fas fa-file-download"></i></button>
						</div>
						<div class="col-7 mt-3">
							<div class="form-check">
								<?php if ($prasyarat->status_biodatafoto == 'belum') : ?>
									<input type="checkbox" class="" id="check_biodatafoto">
								<?php else : ?>
									<input type="checkbox" class="" id="check_biodatafoto" checked>
								<?php endif ?>
								<label class="form-check-label" for="check_biodatafoto">Biodata lengkap, dan foto berwarna 3x4 sebanyak 3 buah </label>
							</div>
						</div>
						<div class="col-5 mt-3">
							<button type="button" class="btn btn-primary btn-sm" onclick="download_prasyarat_skripsi('<?= $mahasiswa->nim ?>','<?= $prasyarat->file_biodatafoto ?>')"><i class="fas fa-file-download"></i></button>
						</div>
						<div class="col-7 mt-3">
							<div class="form-check">
								<?php if ($prasyarat->status_suratlab == 'belum') : ?>
									<input type="checkbox" class="" id="check_suratlab">
								<?php else : ?>
									<input type="checkbox" class="" id="check_suratlab" checked>
								<?php endif ?>
								<label class="form-check-label" for="check_suratlab">Surat bebas LAB dari Jurusan dan Fakultas</label>
							</div>
						</div>
						<div class="col-5 mt-3">
							<button type="button" class="btn btn-primary btn-sm" onclick="download_prasyarat_skripsi('<?= $mahasiswa->nim ?>','<?= $prasyarat->file_suratlab ?>')"><i class="fas fa-file-download"></i></button>
						</div>
						<div class="col-7 mt-3">
							<div class="form-check">
								<?php if ($prasyarat->status_bebaspiutang == 'belum') : ?>
									<input type="checkbox" class="" id="check_bebaspiutang">
								<?php else : ?>
									<input type="checkbox" class="" id="check_bebaspiutang" checked>
								<?php endif ?>
								<label class="form-check-label" for="check_bebaspiutang">Surat bebas piutang HMJ dan BEM </label>
							</div>
						</div>
						<div class="col-5 mt-3">
							<button type="button" class="btn btn-primary btn-sm" onclick="download_prasyarat_skripsi('<?= $mahasiswa->nim ?>','<?= $prasyarat->file_bebaspiutang ?>')"><i class="fas fa-file-download"></i></button>
						</div>
						<div class="col-7 mt-3">
							<div class="form-check">
								<?php if ($prasyarat->status_surattugas == 'belum') : ?>
									<input type="checkbox" class="" id="check_surattugas">
								<?php else : ?>
									<input type="checkbox" class="" id="check_surattugas" checked>
								<?php endif ?>
								<label class="form-check-label" for="check_surattugas">Fotocopy surat tugas Pembimbing </label>
							</div>
						</div>
						<div class="col-5 mt-3">
							<button type="button" class="btn btn-primary btn-sm" onclick="download_prasyarat_skripsi('<?= $mahasiswa->nim ?>','<?= $prasyarat->file_surattugas ?>')"><i class="fas fa-file-download"></i></button>
						</div>
						<div class="col-7 mt-3">
							<div class="form-check">
								<?php if ($prasyarat->status_coverskripsi == 'belum') : ?>
									<input type="checkbox" class="" id="check_coverskripsi">
								<?php else : ?>
									<input type="checkbox" class="" id="check_coverskripsi" checked>
								<?php endif ?>
								<label class="form-check-label" for="check_coverskripsi">Fotocopy cover skripsi </label>
							</div>
						</div>
						<div class="col-5 mt-3">
							<button type="button" class="btn btn-primary btn-sm" onclick="download_prasyarat_skripsi('<?= $mahasiswa->nim ?>','<?= $prasyarat->file_coverskripsi ?>')"><i class="fas fa-file-download"></i></button>
						</div>
						<div class="col-7 mt-3">
							<div class="form-check">
								<?php if ($prasyarat->status_kartubimbingan == 'belum') : ?>
									<input type="checkbox" class="" id="check_kartubimbingan">
								<?php else : ?>
									<input type="checkbox" class="" id="check_kartubimbingan" checked>
								<?php endif ?>
								<label class="form-check-label" for="check_kartubimbingan">Kartu bimbingan skripsi yang asli</label>
							</div>
						</div>
						<div class="col-5 mt-3">
							<button type="button" class="btn btn-primary btn-sm" onclick="download_prasyarat_skripsi('<?= $mahasiswa->nim ?>','<?= $prasyarat->file_kartubimbingan ?>')"><i class="fas fa-file-download"></i></button>
						</div>
						<div class="col-7 mt-3">
							<div class="form-check">
								<?php if ($prasyarat->status_piagam== 'belum') : ?>
									<input type="checkbox" class="" id="check_piagam">
								<?php else : ?>
									<input type="checkbox" class="" id="check_piagam" checked>
								<?php endif ?>
								<label class="form-check-label" for="check_piagam">Piagam (OKK, Ratam dan Study Banding)</label>
							</div>
						</div>
						<div class="col-5 mt-3">
							<button type="button" class="btn btn-primary btn-sm" onclick="download_prasyarat_skripsi('<?= $mahasiswa->nim ?>','<?= $prasyarat->file_piagam ?>')"><i class="fas fa-file-download"></i></button>
						</div>
						<div class="col-7 mt-3">
							<div class="form-check">
								<?php if ($prasyarat->status_buktisumbangan == 'belum') : ?>
									<input type="checkbox" class="" id="check_buktisumbangan">
								<?php else : ?>
									<input type="checkbox" class="" id="check_buktisumbangan" checked>
								<?php endif ?>
								<label class="form-check-label" for="check_buktisumbangan">Bukti sumbangan buku (sumbangan buku baru selama dapat di perkuliahan)</label>
							</div>
						</div>
						<div class="col-5 mt-3">
							<button type="button" class="btn btn-primary btn-sm" onclick="download_prasyarat_skripsi('<?= $mahasiswa->nim ?>','<?= $prasyarat->file_buktisumbangan ?>')"><i class="fas fa-file-download"></i></button>
						</div>
						
						<div class="col-7 mt-3">
							<div class="form-check">
								<?php if ($prasyarat->status_fileskripsi == 'belum') : ?>
									<input type="checkbox" class="" id="check_fileskripsi">
								<?php else : ?>
									<input type="checkbox" class="" id="check_fileskripsi" checked>
								<?php endif ?>
								<label class="form-check-label" for="check_fileskripsi">File Skripsi yang sudah disahkan</label>
							</div>
						</div>
						<div class="col-5 mt-3">
							<button type="button" class="btn btn-primary btn-sm" onclick="download_prasyarat_skripsi('<?= $mahasiswa->nim ?>','<?= $prasyarat->file_skripsi ?>')"><i class="fas fa-file-download"></i></button>
						</div>
						
						<div class="col-7 mt-3">
							<div class="form-check">
								<?php if ($prasyarat->status_buktiartikel == 'belum') : ?>
									<input type="checkbox" class="" id="check_buktiartikel">
								<?php else : ?>
									<input type="checkbox" class="" id="check_buktiartikel" checked>
								<?php endif ?>
								<label class="form-check-label" for="check_buktiartikel">Bukti artikel yang telah terbit di E - jurnal Prodi Penjaskesrek</label>
							</div>
						</div>
						<div class="col-5 mt-3">
							<button type="button" class="btn btn-primary btn-sm" onclick="download_prasyarat_skripsi('<?= $mahasiswa->nim ?>','<?= $prasyarat->file_buktiartikel ?>')"><i class="fas fa-file-download"></i></button>
						</div>
						
						<div class="col-12">
							<div class="button-group float-right">
								<div id='btn-terimacheck'>
									<button type="button" class="btn btn-danger" onclick="tolak_file_s(<?= $prasyarat->id ?>)">tolak</button>
									<?php if ($prasyarat->status_prasyarat == 'diterima') : ?>
										<button id="btn-halskrip1" type="button" class="btn btn-success" onclick="halaman_jadwal_sidang()">terima</button>
										<?php else : ?>
										<button id="btn-halskrip2" type="button" class="btn btn-success" onclick="halaman_jadwal_sidang()" disabled>terima</button>
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

