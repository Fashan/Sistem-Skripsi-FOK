  <!-- Page content -->
  <div class="container-fluid mt--6">
      <div class="row">
        <div class="col-md-6">
				<div class="card animate__animated animate__backInDown animate__delay-1s">
            <!-- Card header -->
            <div class="card-header">
			<h3 id="titleform-judul" class="mb-0">Ide Skripsi</h3>
              <p class="text-sm mb-0">
                form untuk mengajukan judul skripsi
              </p>
							<?php if ($this->session->flashdata('msg')) : ?>
								<?= $this->session->flashdata('msg'); ?>
							<?php endif ?>
            </div>
			<div class="card-body">
    <!-- <h5 class="card-title">Card title</h5> -->
    <form action="<?= base_url('mahasiswa/ajukanjudul'); ?>" method="POST" id="form-ajukanjudul" enctype="multipart/form-data">
  <div class="form-group">
    <label for="exampleFormControlInput1">Judul Skripsi</label>
    <input type="hidden" value="<?= userdata()->user_id; ?>" name="mahasiswa_id">
    <input type="hidden" name="id">
    <input type="text" class="form-control" id="judul" name="judul">
  </div>
	
  <div class="form-group">
		<label for="exampleFormControlTextarea1">Abstrak</label>
    <textarea class="form-control" id="abstrak" rows="3" name="abstrak"></textarea>
  </div>
	
	<div class="form-group">
		<label class="form-label" for="file"><b>Referensi</b></label>
		<div class="custom-file">
				<input accept="aplication/pdf" type="file" class="custom-file-input" id="file_referensi" name="file" aria-describedby="inputGroupFileAddon01">
				<label class="custom-file-label" for="file" id="filename_ref">Choose file</label>
		</div>
</div>
<h3>Catatan</h3>
<ul>
	<li><small>Referensi untuk abstrak diharapkan untuk mencari referensi pendukung minimal 3 jurnal terkait atau 3 buku</small></li>
</ul>
  <button type="submit" id="btn-ajukan" class="btn btn-primary float-right ml-3">Ajukan</button>
  <button type="reset" id="clear-judul" class="btn btn-primary float-right ">clear</button>
</form>
  </div>
          </div>
        </div>
        <div class="col-md-6">
				<div class="card animate__animated animate__backInDown animate__delay-2s">
            <!-- Card header -->
            <div class="card-header">
            <h3 class="mb-0">Tabel Pengajuan Judul</h3>
              <p class="text-sm mb-0">
               Judul yang telah di ajukan
              </p>
            </div>
            <div class=" py-4">
              <table class="table table-flush" id="datatable-ideskripsi">
                <thead class="thead-light">
                  <tr>
					<th>No</th>
                    <th>Judul</th>
                    <th>Abstrak</th>
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


	<!-- Modal -->
	<div class="modal fade" id="modal-judul" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Informasi</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <h3>Judul</h3>
				<p id="judul2"></p>
        <h3>Abstrak</h3>
				<p id="abstrak2"></p>
      </div>
      
    </div>
  </div>
</div>
