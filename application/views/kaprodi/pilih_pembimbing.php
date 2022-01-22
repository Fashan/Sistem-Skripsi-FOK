<div class="container-fluid mt--6">
	<div class="row">
	<div class="col-md-12">
				<div class="card">
            <!-- Card header -->
            <div class="card-header">
            <div class="row">
				<div class="col-md-4">
				<h3 class="mb-0"><?= $mahasiswa->nama; ?></h3>
				</div>
				<div class="col-md-8">
					<div class="float-right">
					<h4><?= $mahasiswa->judul; ?></h4>
					</div>
				</div>
			</div>
              
            </div>
			<div class="card-body">
			<form method="POST" action="<?= base_url('kaprodi/acc/'.$mahasiswa->user_id)?>">
			<input type="hidden" value="<?= $mahasiswa->judul?>" name="judul">
			<input type="hidden" value="<?= $mahasiswa->abstrak?>" name="abstrak">
			<div class="form-group">
    <label for="exampleFormControlTextarea1">Catatan</label>
    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="catatan"></textarea>
  </div>



 <div class="row">
	 <div class="col-8">
	 <div class="row">
  <div class="col-6">
	<select class="custom-select mr-sm-2" id="menu-prodi">
	  <option value="" selected>prodi</option>
	 <?php foreach ($prodi as $p) : ?>
		 <option value="<?= $p->id; ?>"><?= $p->nama_prodi ?></option>
	 <?php endforeach ?>
	</select>
  </div>

  <div class="col-6">
	<select id="menu-dosen1" class="custom-select mr-sm-2" name="p1">
	<option value="" selected>Pembimbing 1</option>
	</select>
  </div>
 
</div>

<div class="row mt-3">
	<div class="col-6"></div>
<div class="col-6">
	<select  id="menu-dosen2" class="custom-select mr-sm-2" name="p2">
	  <option value="" selected>Pembimbing 2</option>
	</select>
  </div>
  
</div>
	 </div>
	 <div id="data-dosen" class="col-4">
	
	 </div>
 </div>

	<div class="row mt-3">
	  <div class="col-4"></div>	
	  <div class="col-4"></div>	
    <div class="col-4">
	<button type="submit" class="btn btn-primary">ACC</button>
	<a href="<?= base_url('dashboard'); ?>" class="btn btn-primary">Cancel</a>
    </div>
  </div>

	<?php foreach ($role as $r) : ?>
		<?php if ($r->role == 'Pembimbing 1 Proposal') : ?>
			<input type="hidden" value="<?= $r->id?>" name="p1_role">
		<?php endif ?>
		<?php if ($r->role == 'Pembimbing 2 Proposal') : ?>
			<input type="hidden" value="<?= $r->id?>" name="p2_role">
		<?php endif ?>
	<?php endforeach ?>


</form>
			</div>
            
          </div>
        </div>
		<div id="informasi_proposal" class="col-md-6">

		</div>
		<div id="informasi_skripsi" class="col-md-6">
			
		</div>
	</div>
    </div>
