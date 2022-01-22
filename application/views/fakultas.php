  <!-- Page content -->
  <div class="container-fluid mt--6">
      <div class="row">
        <div class="col-md-6">
				<div class="card">
            <!-- Card header -->
            <div class="card-header">
              <div class="row">
				  <div class="col">
				  <h3 class="mb-0">Prodi</h3>
				  </div>
				  <div class="col-md-3 justify-content-end">
						          <!-- Button trigger modal -->
<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal-addprodi">
  <i class="fas fa-users"></i> add Prodi
</button>
					</div>
			  </div>
              <p class="text-sm mb-0">
                kumpulan data prodi di FOK
              </p>
            </div>
            <div class=" py-4">
              <table class="table table-flush" id="datatable-prodi">
                <thead class="thead-light">
                  <tr>
                    <th>No</th>
                    <th>Prodi</th>
                    <th>Aksi</th>
                  </tr>
                </thead>

                <tbody>
                  
                  
                </tbody>
              </table>
            </div>
          </div>
        </div>
        <div class="col-md-6">
				<div class="card">
            <!-- Card header -->
            <div class="card-header">
              <div class="row">
				  <div class="col">
				  <h3 class="mb-0">Jurusan</h3>
				  </div>
				  <div class="col-md-4 justify-content-end">
						          <!-- Button trigger modal -->
<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal-addjurusan">
  <i class="fas fa-users"></i> add Jurusan
</button>
					</div>
			  </div>
              <p class="text-sm mb-0">
               kumpulan data jurusan di FOK
              </p>
            </div>
            <div class=" py-4">
              <table class="table table-flush" id="datatable-jurusan">
                <thead class="thead-light">
                  <tr>
									<th>No</th>
                    <th>Jurusan</th>
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


				<!-- Modal -->
<div class="modal fade" id="modal-addprodi" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Prodi</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form action="<?= base_url('prodi/addprodi'); ?>" method="POST" id="form-addprodi">
			<div class="form-group">
    <label for="username">Nama Prodi</label>
    <input type="text" class="form-control" aria-describedby="emailHelp" name="nama_prodi">
  </div>

   
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Add</button>
        </form>
      </div>
    </div>
  </div>
</div>

				<!-- Modal -->
				<div class="modal fade" id="modal-addjurusan" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Prodi</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form action="<?= base_url('Jurusan/addjurusan'); ?>" method="POST" id="form-addjurusan">
			<div class="form-group">
    <label for="username">Nama Jurusan</label>
    <input type="text" class="form-control" aria-describedby="emailHelp" name="nama_jurusan">
  </div>

   
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Add</button>
        </form>
      </div>
    </div>
  </div>
</div>


<!-- Modal -->
<div class="modal fade" id="modal-editprodi" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Prodi</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form action="<?= base_url('prodi/editprodi'); ?>" id="form-editprodi">
         <div class="form-group">
    <label for="username">Nama Prodi</label>
    <input type="hidden" class="form-control" id="id_prodi" aria-describedby="emailHelp" name="id">
    <input type="text" class="form-control" id="prodi" aria-describedby="emailHelp" name="nama_prodi">
  </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Edit</button>
        </form>
      </div>
    </div>
  </div>
</div>


<!-- Modal -->
<div class="modal fade" id="modal-editjurusan" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Jurusan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form action="<?= base_url('jurusan/editjurusan'); ?>" id="form-editjurusan">
         <div class="form-group">
    <label for="username">Nama Jurusan</label>
    <input type="hidden" class="form-control" id="id_jurusan" aria-describedby="emailHelp" name="id">
    <input type="text" class="form-control" id="jurusan" aria-describedby="emailHelp" name="nama_jurusan">
  </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Edit</button>
        </form>
      </div>
    </div>
  </div>
</div>
