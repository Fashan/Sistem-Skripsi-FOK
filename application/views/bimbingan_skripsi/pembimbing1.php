<div class="container-fluid mt--6">
	<div class="row">
	<div class="col-md-12">
				<div class="card">
            <!-- Card header -->
            <div class="card-header">
            <h3 class="mb-0">Identitas Pembimbing 1</h3>
            </div>
            <div class=" py-4">
			<div class="card-body">
    <!-- <h5 class="card-title">Card title</h5> -->
		<h3>Nama</h3>
  <p><?= $pembimbing->nama?></p>
  <h3>NIP</h3>
  <p><?= $pembimbing->username?></p>
  </div>
            </div>
          </div>
        </div>
	</div>

	<div class="row">
	<div class="col-md-12">
				<div class="card">
            <!-- Card header -->
            <div class="card-header">
						<div class="row">
				  <div class="col">
				  <h3 class="mb-0">Daftar Bimbingan</h3>
				  </div>
				  <div class="col-md-2 justify-content-end">
						          <!-- Button trigger modal -->
<button type="button" id="btn-tambahbp" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal-bimbingan" data-id="<?= userdata()->user_id ?>" data-role_id="<?= userdata()->role_id ?>" data-username="<?= userdata()->username ?>" data-role="mahasiswa_pem1">
  <i class="fas fa-users"></i> Tambah Topik 
</button>
					</div>
			  </div>

            </div>
            <div class=" py-4  table-responsive">
              <table class="table table-flush" id="datatable-logbimbingan3">
                <thead class="thead-light">
                  <tr>
					<th>No</th>
                    <th>Tanggal</th>
                    <th>Topik</th>
                    <th>Status</th>
                    <th>Oleh</th>
                    <th>file</th>
                    <th>Aksi</th>
                  </tr>
                </thead>

                <tbody>
                  
                  
                </tbody>
              </table>
            </div>
          </div>
        </div>
	</div>
    
    </div>


<!-- delete bimbingan proposal -->
<div class="modal fade" id="hapus_bp" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Hapus Log Bimbingan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Apakah log bimbingan ini ingin di hapus?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-danger btn-delete">Hapus</button>
      </div>
    </div>
  </div>
</div>


		<!-- tambah topik bimbingan -->
		<div class="modal fade" id="modal-bimbingan" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Topik</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form action="" method="POST" id="form-bp">
			<div class="form-group">
				<input type="hidden" id="id" name="id">
				<input type="hidden" name="status" value="ditolak">
    <label for="text_bimbingan"><b>Bimbingan</b></label>
    <textarea class="form-control" id="text_bimbingan" rows="2"></textarea>
  </div>
	<div class="form-group">
                    <label class="form-label" for="file"><b>Upload File</b></label>
                    <div class="custom-file">
                        <input accept="aplication/pdf" type="file" class="custom-file-input" id="file_bimbingan" name="file" aria-describedby="inputGroupFileAddon01">
                        <label class="custom-file-label" for="file" id="filename">Choose file</label>
                    </div>
                </div>

   
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" onclick="bimbingan2(<?= $pembimbing->user_id ?>)">Kirim</button>
        </form>
      </div>
    </div>
  </div>
</div>



		<!-- edit topik bimbingan -->
		<div class="modal fade" id="modal-editbimbingan" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Topik</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form action="" method="POST" id="form-bp">
			<div class="form-group">
    <label for="text_bimbingan"><b>Bimbingan</b></label>
    <textarea class="form-control" id="text_bimbingan2" rows="2"></textarea>
  </div>
	<div class="form-group">
                    <label class="form-label" for="file"><b>Upload File</b></label>
                    <div class="custom-file">
                        <input accept="aplication/pdf" type="file" class="custom-file-input" id="file_bimbingan2" name="file" aria-describedby="inputGroupFileAddon01">
                        <label class="custom-file-label" for="file" id="filename2">Choose file</label>
                    </div>
                </div>

   
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" id="btn-editbp" class="btn btn-primary" onclick="editlogbp2()" data-role="mahasiswa_pem1">Save</button>
        </form>
      </div>
    </div>
  </div>
</div>
