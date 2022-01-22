<div class="container-fluid mt--6">
	<div class="row">
	<div class="col-md-12">
	<div class="card animate__animated animate__fadeIn">
            <!-- Card header -->
            <div class="card-header">
            <div class="row">
				<div class="col-md-4">
				<h3 class="mb-0">Skripsi Saya</h3>
				</div>
				
			</div>
              
            </div>
			<div class="card-body">
		<?php if ($mahasiswa != '') : ?>
			<p class="mt-3">Judul</p>
			<h3><?= $mahasiswa->judul ?></h3> 
			<p class="mt-3">Abstrak</p>
			<p><?= $mahasiswa->abstrak ?></p>
		<?php else : ?>
			<p class="mt-3">Judul</p>
			<h3>-</h3> 
			<p class="mt-3">Abstrak</p>
			<p>-</p>
		<?php endif ?>

		
          </div>
        </div>
	</div>

	
    
			</div>
			<div class="row" data-aos="fade-up">
        <div class="col-md-6">
		<div class="card">
            <!-- Card header -->
            <div class="card-header">
						<h3 class="mb-0">Tabel Nilai Seminar Proposal</h3>
						<?php if ($seminar) : ?>
							<p class="text-sm mb-0">
               Tanggal seminar: <?= custom_date('d-M-Y',$seminar->tanggal) ?>
              </p>
						 <?php else : ?>
							<p class="text-sm mb-0">
               Tanggal seminar: 
              </p>
						 <?php endif ?>
            </div>
            <div class=" py-4 table-responsive">
                <tbody>
                <table class="table table-flush" id="datatable-nilai_proposal">
                <thead class="thead-light">
                  <tr>
										<th>Pembimbing 1</th>
                    <th>Pembimbing 2</th>
                    <th>Penguji 1</th>
                    <th>Penguji 2</th>
                    <th>Rata-rata</th>
                  </tr>
                </thead>
                  
                </tbody>
              </table>
            </div>
          </div>
        </div>
        <div class="col-md-6">
		<div class="card" data-aos="fade-left-15px" data-aos-duration="1000">
            <!-- Card header -->
            <div class="card-header">
						<h3 class="mb-0">Tabel Nilai Sidang Skripsi</h3>
						<?php if ($sidang) : ?>
							<p class="text-sm mb-0">
               Tanggal sidang: <?= custom_date('d-M-Y',$sidang->tanggal) ?>
              </p>
						 <?php else : ?>
							<p class="text-sm mb-0">
               Tanggal sidang: 
              </p>
						 <?php endif ?>
            </div>
            <div class=" py-4 table-responsive">
              

                <tbody>
                <table class="table table-flush" id="datatable-nilai_skripsi">
                <thead class="thead-light">
                  <tr>
										<th>Pembimbing 1</th>
                    <th>Pembimbing 2</th>
                    <th>Penguji 1</th>
                    <th>Penguji 2</th>
                    <th>Rata-rata</th>
                  </tr>
                </thead>
                  
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
		 </div>

		
