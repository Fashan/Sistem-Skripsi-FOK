<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?= $judul ?></title>
	<style>
		p{
			float: right;
		}
		.cf:before, 
		.cf:after {
			content: " "; /* 1 */
			display: table; /* 2 */
		}

		.cf:after {
			clear: both;
		}

		/**
		* For IE 6/7 only
		* Include this rule to trigger hasLayout and contain floats.
		*/
		.cf {
			*zoom: 1;
		}

		.nomargin{
			margin-top: 0px;
			padding-top: 0px;
		}
		.nomargin_bottom{
			margin-bottom: 0px;
		}
	</style>
</head>
<body>
	
	<table>
		<tr>
			<td rowspan="4"><img src="assets/img/logo_undiksha.png" alt="" width="15%"></td>
			<td align="center"><h3>KEMENTERIAN PENDIDIKAN, KEBUDAYAAN, RISET DAN TEKNOLOGI</h3></td>
		</tr>
		<tr>
			<td align="center">
				<h2>UNIVERSITAS PENDIDIKAN GANESHA</h2>
			</td>
		</tr>
		<tr>
			<td align="center">
				<small>Alamat : Jalan Udayana No. 11 Singaraja, Bali • Telp.: (0362) 22570 • Fax.: (0362) 25735</small>
			</td>
		</tr>
		<tr>
			<td align="center">
				<small>Website : <a href="http://undiksha.ac.id/">http://undiksha.ac.id</a> • Email : <a href="">humas@undiksha.ac.id</a></small>
			</td>
		</tr>
	</table>
	<hr style="height:2px;border-width:0;color:gray;background-color:gray;margin-bottom:1;margin-top:2">
	<hr style="height:2px;border-width:0;color:gray;background-color:gray;margin-top:0">
	<h3>Laporan Kerja Dosen</h3>

	<p align="center" class="nomargin_bottom">Daftar Pembimbing dan Penguji Proposal Serta Skripsi/Tugas Akhir</p>
	<p align="center" class="nomargin nomargin_bottom">Fakultas Olahraga dan Kesehatan</p>
	<p align="center" class="nomargin nomargin_bottom">Universitas Pendidikan Ganesha</p>
	<p align="center" class="nomargin">Semester Genap Tahun 2021/2022</p>

	<?php foreach ($dosen as $d) : ?>
	<p>Nama Dosen: <?= $d->nama ?></p>
	<?php $pembimbing1_prop = $this->main->get_mahasiswa_prop($d->user_id,'Pembimbing 1 Proposal') ?>
	<?php if ($pembimbing1_prop) : ?>
		<p>Sebagai Pembimbing 1 Proposal</p>

			<table width="100%" border="1" cellspacing="0">
				<tr>
					<th>NO</th>
					<th>NIM</th>
					<th>Mahasiswa</th>
					<th>Judul</th>
				</tr>
				<?php $no = 1 ?>
				<?php foreach ($pembimbing1_prop as $mhs) : ?>
					<tr>
					<td align="center"><?= $no ?></td>
					<td align="center"><?= $mhs->username ?></td>
					<td align="center"><?= $mhs->nama ?></td>
					<td align="center"><?= $mhs->judul ?></td>
				</tr>
				<?php $no++; ?>
				<?php endforeach ?>
			</table>
			<?php else: ?>
				<p>Sebagai Pembimbing 1 Proposal</p>
				<table width="100%" border="1" cellspacing="0">
				<tr>
					<th>NO</th>
					<th>NIM</th>
					<th>Mahasiswa</th>
					<th>Judul</th>
				</tr>
				<tr>
					<td align="center"> - </td>
					<td align="center"> - </td>
					<td align="center"> - </td>
					<td align="center"> - </td>
				</tr>
				</table>
	<?php endif ?>

	<?php $pembimbing2_prop = $this->main->get_mahasiswa_prop($d->user_id,'Pembimbing 2 Proposal') ?>
	<?php if ($pembimbing2_prop) : ?>
		<p>Sebagai Pembimbing 2 Proposal</p>

			<table width="100%" border="1" cellspacing="0">
				<tr>
					<th>NO</th>
					<th>NIM</th>
					<th>Mahasiswa</th>
					<th>Judul</th>
				</tr>
				<?php $no = 1 ?>
				<?php foreach ($pembimbing2_prop as $mhs) : ?>
					<tr>
					<td align="center"><?= $no ?></td>
					<td align="center"><?= $mhs->username ?></td>
					<td align="center"><?= $mhs->nama ?></td>
					<td align="center"><?= $mhs->judul ?></td>
				</tr>
				<?php $no++; ?>
				<?php endforeach ?>
			</table>
			<?php else: ?>
				<p>Sebagai Pembimbing 2 Proposal</p>
				<table width="100%" border="1" cellspacing="0">
				<tr>
					<th>NO</th>
					<th>NIM</th>
					<th>Mahasiswa</th>
					<th>Judul</th>
				</tr>
				<tr>
					<td align="center"> - </td>
					<td align="center"> - </td>
					<td align="center"> - </td>
					<td align="center"> - </td>
				</tr>
				</table>
	<?php endif ?>

	<?php $penguji1_prop = $this->main->get_mahasiswa_prop($d->user_id,'Penguji 1 Proposal') ?>
	<?php if ($penguji1_prop) : ?>
		<p>Sebagai Penguji 1 Proposal</p>

			<table width="100%" border="1" cellspacing="0">
				<tr>
					<th>NO</th>
					<th>NIM</th>
					<th>Mahasiswa</th>
					<th>Judul</th>
				</tr>
				<?php $no = 1 ?>
				<?php foreach ($penguji1_prop as $mhs) : ?>
					<tr>
					<td align="center"><?= $no ?></td>
					<td align="center"><?= $mhs->username ?></td>
					<td align="center"><?= $mhs->nama ?></td>
					<td align="center"><?= $mhs->judul ?></td>
				</tr>
				<?php $no++; ?>
				<?php endforeach ?>
			</table>
			<?php else: ?>
				<p>Sebagai Penguji 1 Proposal</p>
				<table width="100%" border="1" cellspacing="0">
				<tr>
					<th>NO</th>
					<th>NIM</th>
					<th>Mahasiswa</th>
					<th>Judul</th>
				</tr>
				<tr>
					<td align="center"> - </td>
					<td align="center"> - </td>
					<td align="center"> - </td>
					<td align="center"> - </td>
				</tr>
				</table>
	<?php endif ?>

	<?php $penguji2_prop = $this->main->get_mahasiswa_prop($d->user_id,'Penguji 2 Proposal') ?>
	<?php if ($penguji2_prop) : ?>
		<p>Sebagai Penguji 2 Proposal</p>

			<table width="100%" border="1" cellspacing="0">
				<tr>
					<th>NO</th>
					<th>NIM</th>
					<th>Mahasiswa</th>
					<th>Judul</th>
				</tr>
				<?php $no = 1 ?>
				<?php foreach ($penguji2_prop as $mhs) : ?>
					<tr>
					<td align="center"><?= $no ?></td>
					<td align="center"><?= $mhs->nama ?></td>
					<td align="center"><?= $mhs->username ?></td>
					<td align="center"><?= $mhs->judul ?></td>
				</tr>
				<?php $no++; ?>
				<?php endforeach ?>
			</table>
			<?php else: ?>
				<p>Sebagai Penguji 2 Proposal</p>
				<table width="100%" border="1" cellspacing="0">
				<tr>
					<th>NO</th>
					<th>NIM</th>
					<th>Mahasiswa</th>
					<th>Judul</th>
				</tr>
				<tr>
					<td align="center"> - </td>
					<td align="center"> - </td>
					<td align="center"> - </td>
					<td align="center"> - </td>
				</tr>
				</table>
	<?php endif ?>


	<?php $pembimbing1_skripsi = $this->main->get_mahasiswa_skripsi($d->user_id,'Pembimbing 1 Skripsi/TA') ?>
	<?php if ($pembimbing1_skripsi) : ?>
		<p>Sebagai Pembimbing 1 Skripsi/TA</p>

			<table width="100%" border="1" cellspacing="0">
				<tr>
					<th>NO</th>
					<th>NIM</th>
					<th>Mahasiswa</th>
					<th>Judul</th>
				</tr>
				<?php $no = 1 ?>
				<?php foreach ($pembimbing1_skripsi as $mhs) : ?>
					<tr>
					<td align="center"><?= $no ?></td>
					<td align="center"><?= $mhs->nama ?></td>
					<td align="center"><?= $mhs->username ?></td>
					<td align="center"><?= $mhs->judul ?></td>
				</tr>
				<?php $no++; ?>
				<?php endforeach ?>
			</table>
			<?php else: ?>
				<p>Sebagai Pembimbing 1 Skripsi/TA</p>
				<table width="100%" border="1" cellspacing="0">
				<tr>
					<th>NO</th>
					<th>NIM</th>
					<th>Mahasiswa</th>
					<th>Judul</th>
				</tr>
				<tr>
					<td align="center"> - </td>
					<td align="center"> - </td>
					<td align="center"> - </td>
					<td align="center"> - </td>
				</tr>
				</table>
	<?php endif ?>

	<?php $pembimbing2_skripsi = $this->main->get_mahasiswa_skripsi($d->user_id,'Pembimbing 2 Skripsi/TA') ?>
	<?php if ($pembimbing2_skripsi) : ?>
		<p>Sebagai Pembimbing 2 Skripsi/TA</p>

			<table width="100%" border="1" cellspacing="0">
				<tr>
					<th>NO</th>
					<th>NIM</th>
					<th>Mahasiswa</th>
					<th>Judul</th>
				</tr>
				<?php $no = 1 ?>
				<?php foreach ($pembimbing2_skripsi as $mhs) : ?>
					<tr>
					<td align="center"><?= $no ?></td>
					<td align="center"><?= $mhs->username ?></td>
					<td align="center"><?= $mhs->nama ?></td>
					<td align="center"><?= $mhs->judul ?></td>
				</tr>
				<?php $no++; ?>
				<?php endforeach ?>
			</table>
			<?php else: ?>
				<p>Sebagai Pembimbing 2 Skripsi/TA</p>
				<table width="100%" border="1" cellspacing="0">
				<tr>
					<th>NO</th>
					<th>NIM</th>
					<th>Mahasiswa</th>
					<th>Judul</th>
				</tr>
				<tr>
					<td align="center"> - </td>
					<td align="center"> - </td>
					<td align="center"> - </td>
					<td align="center"> - </td>
				</tr>
				</table>
	<?php endif ?>


	<?php $penguji1_skripsi = $this->main->get_mahasiswa_skripsi($d->user_id,'Penguji 1 Skripsi/TA') ?>
	<?php if ($penguji1_skripsi) : ?>
		<p>Sebagai Penguji 1 Skripsi/TA</p>

			<table width="100%" border="1" cellspacing="0">
				<tr>
					<th>NO</th>
					<th>NIM</th>
					<th>Mahasiswa</th>
					<th>Judul</th>
				</tr>
				<?php $no = 1 ?>
				<?php foreach ($penguji1_skripsi as $mhs) : ?>
					<tr>
					<td align="center"><?= $no ?></td>
					<td align="center"><?= $mhs->username ?></td>
					<td align="center"><?= $mhs->nama ?></td>
					<td align="center"><?= $mhs->judul ?></td>
				</tr>
				<?php $no++; ?>
				<?php endforeach ?>
			</table>
			<?php else: ?>
				<p>Sebagai Penguji 1 Skripsi/TA</p>
				<table width="100%" border="1" cellspacing="0">
				<tr>
					<th>NO</th>
					<th>NIM</th>
					<th>Mahasiswa</th>
					<th>Judul</th>
				</tr>
				<tr>
					<td align="center"> - </td>
					<td align="center"> - </td>
					<td align="center"> - </td>
					<td align="center"> - </td>
				</tr>
				</table>
	<?php endif ?>

	<?php $penguji2_skripsi = $this->main->get_mahasiswa_skripsi($d->user_id,'Penguji 2 Skripsi/TA') ?>
	<?php if ($penguji2_skripsi) : ?>
		<p>Sebagai Penguji 2 Skripsi/TA</p>

			<table width="100%" border="1" cellspacing="0">
				<tr>
					<th>NO</th>
					<th>NIM</th>
					<th>Mahasiswa</th>
					<th>Judul</th>
				</tr>
				<?php $no = 1 ?>
				<?php foreach ($penguji2_skripsi as $mhs) : ?>
					<tr>
					<td align="center"><?= $no ?></td>
					<td align="center"><?= $mhs->username ?></td>
					<td align="center"><?= $mhs->nama ?></td>
					<td align="center"><?= $mhs->judul ?></td>
				</tr>
				<?php $no++; ?>
				<?php endforeach ?>
			</table>
			<?php else: ?>
				<p>Sebagai Penguji 2 Skripsi/TA</p>
				<table width="100%" border="1" cellspacing="0">
				<tr>
					<th>NO</th>
					<th>NIM</th>
					<th>Mahasiswa</th>
					<th>Judul</th>
				</tr>
				<tr>
					<td align="center"> - </td>
					<td align="center"> - </td>
					<td align="center"> - </td>
					<td align="center"> - </td>
				</tr>
				</table>
	<?php endif ?>
<br>
<?php endforeach ?>
<br><br>

<table  align="right">
        <tr>
		<td align="center"><?= date('l,d M Y') ?></td>
             
        </tr>
        <tr>
		<td>An. Kaprodi</td> 
        </tr>
        <tr>
            <td align="center"><br></td>
        </tr>
        <tr>
            <td align="center"><br></td>
        </tr>
        <tr>
            <td align="center"><?= userdata()->nama ?></td>
        </tr>
    </table>
</body>
</html>
