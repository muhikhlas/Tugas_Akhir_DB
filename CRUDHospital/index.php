<?php
	//Koneksi Database
	$server = "localhost";
	$user = "root";
	$pass = "";
	$database = "hospital";

	$koneksi = mysqli_connect($server, $user, $pass, $database)or die(mysqli_error($koneksi));

	//jika tombol simpan diklik
	//PASIEN
	if(isset($_POST['bsimpanpasien']))
	{
		//Pengujian Apakah data akan diedit atau disimpan baru
		if($_GET['hal'] == "edit")
		{
			//Data akan di edit
			$edit = mysqli_query($koneksi, "UPDATE Pasien set
											 	id_pasien = '$_POST[tid_pasien]',
											 	nama_pasien = '$_POST[tnama_pasien]',
											 	kelamin = '$_POST[tkelamin]',
												alamat = '$_POST[talamat]',
												telp = '$_POST[ttelp]'
											 WHERE id_pasien = '$_GET[id]'
										   ");
			if($edit) //jika edit sukses
			{
				echo "<script>
						alert('Edit data suksess!');
						document.location='index.php';
				     </script>";
			}
			else
			{
				echo "<script>
						alert('Edit data GAGAL!!');
						document.location='index.php';
				     </script>";
			}
		}
		else
		{
			//Data akan disimpan Baru
			$simpan = mysqli_query($koneksi, "INSERT INTO Pasien (id_pasien, nama_pasien, kelamin, alamat,telp)
										  VALUES ('$_POST[tid_pasien]', 
										  		 '$_POST[tnama_pasien]', 
										  		 '$_POST[tkelamin]', 
										  		 '$_POST[talamat]',
										  		 '$_POST[ttelp]')
										 ");
			if($simpan) //jika simpan sukses
			{
				echo "<script>
						alert('Simpan data suksess!');
						document.location='index.php';
				     </script>";
			}
			else
			{
				echo "<script>
						alert('Simpan data GAGAL!!');
						document.location='index.php';
				     </script>";
			}
		}	
	}
	//Pengujian jika tombol Edit / Hapus di klik
	if(isset($_GET['hal']))
	{
		//Pengujian jika edit Data
		if($_GET['hal'] == "edit")
		{
			//Tampilkan Data yang akan diedit
			$tampil = mysqli_query($koneksi, "SELECT * FROM pasien WHERE id_pasien = '$_GET[id]' ");
			$data = mysqli_fetch_array($tampil);
			if($data)
			{
				//Jika data ditemukan, maka data ditampung ke dalam variabel
				$vid_pasien = $data['id_pasien'];
				$vnama_pasien = $data['nama_pasien'];
				$vkelamin = $data['kelamin'];
				$valamat = $data['alamat'];
				$vtelp = $data['telp'];
				
			}
		}
		else if ($_GET['hal'] == "hapus")
		{
			//Persiapan hapus data
			$hapus = mysqli_query($koneksi, "DELETE FROM `pasien` WHERE `id_pasien` = '$_GET[id]'");
			if($hapus){
				echo "<script>
						alert('Hapus Data Suksess!!');
						document.location='index.php';
				     </script>";
			}
		}
	}

	//DOKTER
	if(isset($_POST['bsimpandokter']))
	{
		//Pengujian Apakah data akan diedit atau disimpan baru
		if($_GET['hal'] == "editD")
		{
			//Data akan di edit
			$edit = mysqli_query($koneksi, "UPDATE dokter set
											 	id_dokter = '$_POST[tid_dokter]',
											 	nama_dokter = '$_POST[tnama_dokter]',
											 	id_spesialisasi = '$_POST[tid_spesialisasi]',
												telp = '$_POST[ttelpdokter]'
											 WHERE id_dokter = '$_GET[idD]'
										   ");
			if($edit) //jika edit sukses
			{
				echo "<script>
						alert('Edit data suksess!');
						document.location='index.php';
				     </script>";
			}
			else
			{
				echo "<script>
						alert('Edit data GAGAL!!');
						document.location='index.php';
				     </script>";
			}
		}
		else
		{
			//Data akan disimpan Baru
			$simpan = mysqli_query($koneksi, "INSERT INTO dokter (id_dokter, nama_dokter, id_spesialisasi, telp)
										  VALUES ('$_POST[tid_dokter]', 
										  		 '$_POST[tnama_dokter]', 
										  		 '$_POST[tid_spesialisasi]',
										  		 '$_POST[ttelpdokter]')
										 ");
			if($simpan) //jika simpan sukses
			{
				echo "<script>
						alert('Simpan data suksess!');
						document.location='index.php';
				     </script>";
			}
			else
			{
				echo "<script>
						alert('Simpan data GAGAL!!');
						document.location='index.php';
				     </script>";
			}
		}		
	}
	//Pengujian jika tombol Edit / Hapus di klik
	if(isset($_GET['hal']))
	{
		//Pengujian jika edit Data
		if($_GET['hal'] == "editD")
		{
			//Tampilkan Data yang akan diedit
			$tampil = mysqli_query($koneksi, "SELECT * FROM dokter WHERE id_dokter = '$_GET[idD]' ");
			$data = mysqli_fetch_array($tampil);
			if($data)
			{
				//Jika data ditemukan, maka data ditampung ke dalam variabel
				$vid_dokter = $data['id_dokter'];
				$vnama_dokter = $data['nama_dokter'];
				$vid_spesialisasi = $data['id_spesialisasi'];
				$vtelpdokter = $data['telp'];
				
			}
		}
		else if ($_GET['hal'] == "hapusD")
		{
			//Persiapan hapus data
			$hapus = mysqli_query($koneksi, "DELETE FROM `dokter` WHERE `id_dokter` = '$_GET[idD]'");
			if($hapus){
				echo "<script>
						alert('Hapus Data Suksess!!');
						document.location='index.php';
				     </script>";
			}
		}
	}

	//OBAT
	if(isset($_POST['bsimpanobat']))
	{
		//Pengujian Apakah data akan diedit atau disimpan baru
		if($_GET['hal'] == "editO")
		{
			//Data akan di edit
			$edit = mysqli_query($koneksi, "UPDATE Obat set
											 	id_obat = '$_POST[tid_obat]',
											 	nama_obat = '$_POST[tnama_obat]'
											 WHERE id_obat = '$_GET[idO]'
										   ");
			if($edit) //jika edit sukses
			{
				echo "<script>
						alert('Edit data suksess!');
						document.location='index.php';
				     </script>";
			}
			else
			{
				echo "<script>
						alert('Edit data GAGAL!!');
						document.location='index.php';
				     </script>";
			}
		}
		else
		{
			//Data akan disimpan Baru
			$simpan = mysqli_query($koneksi, "INSERT INTO obat (id_obat, nama_obat)
										  VALUES ('$_POST[tid_obat]', 
										  		 '$_POST[tnama_obat]')
										 ");
			if($simpan) //jika simpan sukses
			{
				echo "<script>
						alert('Simpan data suksess!');
						document.location='index.php';
				     </script>";
			}
			else
			{
				echo "<script>
						alert('Simpan data GAGAL!!');
						document.location='index.php';
				     </script>";
			}
		}		
	}
	//Pengujian jika tombol Edit / Hapus di klik
	if(isset($_GET['hal']))
	{
		//Pengujian jika edit Data
		if($_GET['hal'] == "editO")
		{
			//Tampilkan Data yang akan diedit
			$tampil = mysqli_query($koneksi, "SELECT * FROM obat WHERE id_obat = '$_GET[idO]' ");
			$data = mysqli_fetch_array($tampil);
			if($data)
			{
				//Jika data ditemukan, maka data ditampung ke dalam variabel
				$vid_obat = $data['id_obat'];
				$vnama_obat = $data['nama_obat'];
				
			}
		}
		else if ($_GET['hal'] == "hapusO")
		{
			//Persiapan hapus data
			$hapus = mysqli_query($koneksi, "DELETE FROM `obat` WHERE `id_obat` = '$_GET[idO]'");
			if($hapus){
				echo "<script>
						alert('Hapus Data Suksess!!');
						document.location='index.php';
				     </script>";
			}
		}
	}

	//Konsultasi
	if(isset($_POST['bsimpankonsultasi']))
	{
		//Pengujian Apakah data akan diedit atau disimpan baru
		if($_GET['hal'] == "editK")
		{
			//Data akan di edit
			$edit = mysqli_query($koneksi, "UPDATE konsultasi set
												id_konsultasi = '$_POST[tid_konsultasi]',
												id_dokter = '$_POST[tid_dokter]',
											 	id_pasien = '$_POST[tid_pasien]',
											 	id_obat = '$_POST[tid_obat]',
											 	keterangan = '$_POST[tketerangan]'
											 WHERE id_konsultasi = '$_GET[idK]'
										   ");
			if($edit) //jika edit sukses
			{
				echo "<script>
						alert('Edit data suksess!');
						document.location='index.php';
				     </script>";
			}
			else
			{
				echo "<script>
						alert('Edit data GAGAL!!');
						document.location='index.php';
				     </script>";
			}
		}
		else
		{
			//Data akan disimpan Baru
			$simpan = mysqli_query($koneksi, "INSERT INTO konsultasi (id_konsultasi, id_dokter,id_pasien, id_obat, keterangan)
										  VALUES ('$_POST[tid_konsultasi]', 
										  		 '$_POST[tid_dokter]', 
										  		 '$_POST[tid_pasien]',
										  		 '$_POST[tid_obat]',
										  		 '$_POST[tketerangan]')
										 ");
			if($simpan) //jika simpan sukses
			{
				echo "<script>
						alert('Simpan data suksess!');
						document.location='index.php';
				     </script>";
			}
			else
			{
				echo "<script>
						alert('Simpan data GAGAL!!');
						document.location='index.php';
				     </script>";
			}
		}		
	}
	//Pengujian jika tombol Edit / Hapus di klik
	if(isset($_GET['hal']))
	{
		//Pengujian jika edit Data
		if($_GET['hal'] == "editK")
		{
			//Tampilkan Data yang akan diedit
			$tampil = mysqli_query($koneksi, "SELECT * FROM konsultasi WHERE id_konsultasi = '$_GET[idK]' ");
			$data = mysqli_fetch_array($tampil);
			if($data)
			{
				//Jika data ditemukan, maka data ditampung ke dalam variabel
				$vid_konsultasi = $data['id_konsultasi'];
				$vid_dokter = $data['id_dokter'];
				$vid_pasien = $data['id_pasien'];
				$vid_obat = $data['id_obat'];
				$vketerangan = $data['keterangan'];
				
			}
		}
		else if ($_GET['hal'] == "hapusK")
		{
			//Persiapan hapus data
			$hapus = mysqli_query($koneksi, "DELETE FROM `konsultasi` WHERE `id_konsultasi` = '$_GET[idK]'");
			if($hapus){
				echo "<script>
						alert('Hapus Data Suksess!!');
						document.location='index.php';
				     </script>";
			}
		}
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Tugas Akhir Basis Data</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
</head>
<body>
<div class="container">

	<h1 class="text-center">Tugas Akhir Basis Data</h1>
	<h2 class="text-center"></h2>
	<!-- Awal Card Form -->
	<div class="card konsultasi input">
	  <div class="card-header bg-primary text-white">
	    Form Input Data Konsultasi
	  </div>
	  <div class="card-body">
	    <form method="post" action="">
	    	<div class="form-group">
	    		<label>Id Konsultasi</label>
	    		<input type="text" name="tid_konsultasi" value="<?=@$vid_konsultasi?>" class="form-control" placeholder="Input Id anda disini!" required>
	    	</div>
	    	<div class="form-group">
	    		<label>Id Dokter</label>
	    		<input type="text" name="tid_dokter" value="<?=@$vid_dokter?>" class="form-control" placeholder="Input Id anda disini!" required>
	    	</div>
	    	<div class="form-group">
	    		<label>Id Pasien</label>
	    		<input type="text" name="tid_pasien" value="<?=@$vid_pasien?>" class="form-control" placeholder="Input Id anda disini!" required>
	    	</div>
	    	<div class="form-group">
	    		<label>Id Obat</label>
	    		<input type="text" name="tid_obat" value="<?=@$vid_obat?>" class="form-control" placeholder="Input Id Obat disini!" required>
	    	</div>
	    	<div class="form-group">
	    		<label>Keterangan</label>
	    		<textarea class="form-control" name="tketerangan"  placeholder="Input Keterangan disini!"><?=@$vketerangan?></textarea>
	    	</div>

	    	<button type="submit" class="btn btn-success" name="bsimpankonsultasi">Simpan</button>
	    	<button type="reset" class="btn btn-danger" name="bresetkonsultasi">Kosongkan</button>

	    </form>
	  </div>
	</div>
	<!-- Akhir Card Form -->
	<!-- Awal Card Form -->
	<div class="card pasien input">
	  <div class="card-header bg-primary text-white">
	    Form Input Data Pasien
	  </div>
	  <div class="card-body">
	    <form method="post" action="">
	    	<div class="form-group">
	    		<label>Id Pasien</label>
	    		<input type="text" name="tid_pasien" value="<?=@$vid_pasien?>" class="form-control" placeholder="Input Id anda disini!" required>
	    	</div>
	    	<div class="form-group">
	    		<label>Nama</label>
	    		<input type="text" name="tnama_pasien" value="<?=@$vnama_pasien?>" class="form-control" placeholder="Input Nama anda disini!" required>
	    	</div>
	    	<div class="form-group">
	    		<label>Jenis Kelamin</label>
	    		<select class="form-control" name="tkelamin">
	    			<option value="<?=@$vkelamin?>"><?=@$vprodi?>None</option>
	    			<option value="L">Laki-laki</option>
	    			<option value="P">Perempuan</option>
	    		</select>
	    	</div>
	    	<div class="form-group">
	    		<label>Alamat</label>
	    		<textarea class="form-control" name="talamat"  placeholder="Input Alamat anda disini!"><?=@$valamat?></textarea>
	    	</div>
	    	<div class="form-group">
	    		<label>Telepon</label>
	    		<input type="text" name="ttelp" value="<?=@$vtelp?>" class="form-control" placeholder="Input no Telepon anda disini!">
	    	</div>

	    	<button type="submit" class="btn btn-success" name="bsimpanpasien">Simpan</button>
	    	<button type="reset" class="btn btn-danger" name="bresetpasien">Kosongkan</button>

	    </form>
	  </div>
	</div>
	<!-- Akhir Card Form -->
	<!-- Awal Card Form -->
	<div class="card dokter input">
	  <div class="card-header bg-primary text-white">
	    Form Input Data Dokter
	  </div>
	  <div class="card-body">
	    <form method="post" action="">
	    	<div class="form-group">
	    		<label>Id Dokter</label>
	    		<input type="text" name="tid_dokter" value="<?=@$vid_dokter?>" class="form-control" placeholder="Input Id anda disini!" required>
	    	</div>
	    	<div class="form-group">
	    		<label>Nama</label>
	    		<input type="text" name="tnama_dokter" value="<?=@$vnama_dokter?>" class="form-control" placeholder="Input Nama anda disini!" required>
	    	</div>
	    	<div class="form-group">
	    		<label>Id Spesialisasi</label>
	    		<input type="text" name="tid_spesialisasi" value="<?=@$vid_spesialisasi?>" class="form-control" placeholder="Input Id Spesialis anda disini!" required>
	    	</div>
	    	<div class="form-group">
	    		<label>Telepon</label>
	    		<input type="text" name="ttelpdokter" value="<?=@$vtelpdokter?>" class="form-control" placeholder="Input no Telepon anda disini!">
	    	</div>

	    	<button type="submit" class="btn btn-success" name="bsimpandokter">Simpan</button>
	    	<button type="reset" class="btn btn-danger" name="bresetdokter">Kosongkan</button>

	    </form>
	  </div>
	</div>
	<!-- Akhir Card Form -->
	<!-- Awal Card Form -->
	<div class="card obat input">
	  <div class="card-header bg-primary text-white">
	    Form Input Data Obat
	  </div>
	  <div class="card-body">
	    <form method="post" action="">
	    	<div class="form-group">
	    		<label>Id Obat</label>
	    		<input type="text" name="tid_obat" value="<?=@$vid_obat?>" class="form-control" placeholder="Input Id Obat disini!" required>
	    	</div>
	    	<div class="form-group">
	    		<label>Nama</label>
	    		<input type="text" name="tnama_obat" value="<?=@$vnama_obat?>" class="form-control" placeholder="Input nama Obat disini!" required>
	    	</div>

	    	<button type="submit" class="btn btn-success" name="bsimpanobat">Simpan</button>
	    	<button type="reset" class="btn btn-danger" name="bresetobat">Kosongkan</button>

	    </form>
	  </div>
	</div>
	<!-- Akhir Card Form -->

	<!-- Awal Card Tabel -->
	
	<div class="card pasien list">
	  <div class="card-header bg-success text-white">
	    Daftar Pasien
	  </div>
	  <div class="card-body">
	    
	    <table class="table table-bordered table-striped">
	    	<tr>
	    		<th>ID</th>
	    		<th>Nama</th>
	    		<th>Kelamin</th>
	    		<th>Alamat</th>
	    		<th>Telepon</th>
	    		<th>Aksi</th>
	    	</tr>
	    	<?php
	    		$tampil = mysqli_query($koneksi, "SELECT * from pasien order by id_pasien");
	    		while($data = mysqli_fetch_array($tampil)) :

	    	?>
	    	<tr>
	    		<td><?=$data['id_pasien']?></td>
	    		<td><?=$data['nama_pasien']?></td>
	    		<td><?=$data['kelamin']?></td>
	    		<td><?=$data['alamat']?></td>
	    		<td><?=$data['telp']?></td>
	    		<td>
	    			<a href="index.php?hal=edit&id=<?=$data['id_pasien']?>" class="btn btn-warning"> Edit </a>
	    			<a href="index.php?hal=hapus&id=<?=$data['id_pasien']?>" 
	    			   onclick="return confirm('Apakah yakin ingin menghapus data ini?')" class="btn btn-danger"> Hapus </a>
	    		</td>
	    	</tr>
	    <?php endwhile; //penutup perulangan while ?>
	    </table>

	  </div>
	</div>
	<!-- Akhir Card Tabel -->
	<!-- Awal Card Tabel -->
	<div class="card dokter list">
	  <div class="card-header bg-success text-white">
	    Daftar Dokter
	  </div>
	  <div class="card-body">
	    
	    <table class="table table-bordered table-striped">
	    	<tr>
	    		<th>ID</th>
	    		<th>Dokter</th>
	    		<th>Spesialis</th>
	    		<th>Telepon</th>
	    		<th>Aksi</th>
	    	</tr>
	    	<?php
	    		$tampil = mysqli_query($koneksi, "SELECT id_dokter,nama_dokter,spesialisasi.nama_spesialisasi,telp
	    			from dokter,spesialisasi where dokter.id_spesialisasi = spesialisasi.id_spesialisasi order by id_dokter ");
	    		while($data = mysqli_fetch_array($tampil)) :

	    	?>
	    	<tr>
	    		<td><?=$data['id_dokter']?></td>
	    		<td><?=$data['nama_dokter']?></td>
	    		<td><?=$data['nama_spesialisasi']?></td>
	    		<td><?=$data['telp']?></td>
	    		<td>
	    			<a href="index.php?hal=editD&idD=<?=$data['id_dokter']?>" class="btn btn-warning"> Edit </a>
	    			<a href="index.php?hal=hapusD&idD=<?=$data['id_dokter']?>" 
	    			   onclick="return confirm('Apakah yakin ingin menghapus data ini?')" class="btn btn-danger"> Hapus </a>
	    		</td>
	    	</tr>
	    <?php endwhile; //penutup perulangan while ?>
	    </table>

	  </div>
	</div>
	<!-- Akhir Card Tabel -->
	<!-- Awal Card Tabel -->
	<div class="card konsultasi list">
	  <div class="card-header bg-success text-white">
	    Daftar Konsultasi
	  </div>
	  <div class="card-body">
	    
	    <table class="table table-bordered table-striped">
	    	<tr>
	    		<th>ID</th>
	    		<th>Dokter</th>
	    		<th>Pasien</th>
	    		<th>Obat</th>
	    		<th>Keterangan</th>
	    		<th>Aksi</th>
	    	</tr>
	    	<?php
	    		$tampil = mysqli_query($koneksi, "SELECT id_konsultasi,id_dokter,nama_pasien,id_obat,keterangan 
	    			from konsultasi,pasien where  konsultasi.id_pasien = Pasien.id_pasien order by id_konsultasi");
	    		while($data = mysqli_fetch_array($tampil)) :

	    	?>
	    	<tr>
	    		<td><?=$data['id_konsultasi']?></td>
	    		<td><?=$data['id_dokter']?></td>
	    		<td><?=$data['nama_pasien']?></td>
	    		<td><?=$data['id_obat']?></td>
	    		<td><?=$data['keterangan']?></td>
	    		<td>
	    			<a href="index.php?hal=editK&idK=<?=$data['id_konsultasi']?>" class="btn btn-warning"> Edit </a>
	    			<a href="index.php?hal=hapusK&idK=<?=$data['id_konsultasi']?>" 
	    			   onclick="return confirm('Apakah yakin ingin menghapus data ini?')" class="btn btn-danger"> Hapus </a>
	    		</td>
	    	</tr>
	    <?php endwhile; //penutup perulangan while ?>
	    </table>

	  </div>
	</div>
	<!-- Akhir Card Tabel -->
	<!-- Awal Card Tabel -->
	<div class="card obat list">
	  <div class="card-header bg-success text-white">
	    Daftar Obat
	  </div>
	  <div class="card-body">
	    
	    <table class="table table-bordered table-striped">
	    	<tr>
	    		<th>ID</th>
	    		<th>Obat</th>
	    		<th>Aksi</th>
	    	</tr>
	    	<?php
	    		$tampil = mysqli_query($koneksi, "SELECT * from obat order by id_obat desc");
	    		while($data = mysqli_fetch_array($tampil)) :

	    	?>
	    	<tr>
	    		<td><?=$data['id_obat']?></td>
	    		<td><?=$data['nama_obat']?></td>
	    		<td>
	    			<a href="index.php?hal=editO&idO=<?=$data['id_obat']?>" class="btn btn-warning"> Edit </a>
	    			<a href="index.php?hal=hapusO&idO=<?=$data['id_obat']?>" 
	    			   onclick="return confirm('Apakah yakin ingin menghapus data ini?')" class="btn btn-danger"> Hapus </a>
	    		</td>
	    	</tr>
	    <?php endwhile; //penutup perulangan while ?>
	    </table>

	  </div>
	</div>
	<!-- Akhir Card Tabel -->
	<!-- Awal Card Tabel -->
	<div class="card spesialisasi list">
	  <div class="card-header bg-success text-white">
	    Daftar Spesialisasi
	  </div>
	  <div class="card-body">
	    
	    <table class="table table-bordered table-striped">
	    	<tr>
	    		<th>ID</th>
	    		<th>Spesialisasi</th>
	    	</tr>
	    	<?php
	    		$tampil = mysqli_query($koneksi, "SELECT * from spesialisasi order by id_spesialisasi");
	    		while($data = mysqli_fetch_array($tampil)) :

	    	?>
	    	<tr>
	    		<td><?=$data['id_spesialisasi']?></td>
	    		<td><?=$data['nama_spesialisasi']?></td>
	    	</tr>
	    <?php endwhile; //penutup perulangan while ?>
	    </table>

	  </div>
	</div>
	<!-- Akhir Card Tabel -->
</div>

<script type="text/javascript" src="js/bootstrap.min.js"></script>
</body>
</html>