<?php
	//memanggil file header.php
	include ("header.php");
	include"mysql.php";
?>
<body>
	<header>
		<h3>Tambah Data Dokter</h3>
	</header>
	<!--============================================== Batas Atas ==============================-->
	<div >
	<!--Memasukan data ke database <insert>-->
		<!--Jika terdapat sesuatu aktivitas maka akan memanggil file ctrl_tambah.php-->
		<form action="ctrl_tambah.php" method="POST">
			<table class="table">
				<fieldset>	
					<tr>
						<td><label for="id_dokter">Id Dokter</label></td>
						<td>: <input type="text" name="id_dokter" placeholder="Masukan id"/>
						</td>
					</tr>
					<tr>
						<td><label for="nama_dokter">Nama Dokter</label></td>
						<td>: <input type="text" name="nama_dokter" placeholder="Nama lengkap"/>
						</td>
					</tr>
					<tr>
						<td><label for="alamat_dokter">Alamat Dokter</label></td>
						<td>: <textarea name="alamat_dokter"></textarea></td>
					</tr>
					<tr>
						<td><label for="jenis_kelamin">Jenis Kelamin</label></td>
						<td>: <label><input type="radio" name="jenis_kelamin" value="L"> Laki-laki</label>
						<label><input type="radio" name="jenis_kelamin" value="P"> Perempuan</label></td>
					</tr>
					<tr>
						<td><label for="skill_dokter">Gaji: </label></td>
						<td>: <select name="gaji" >
							<option value="100000">100.000</option>
							<option value="200000">200.000</option>
							<option value="300000">300.000</option>
						</select></td>
					</tr>
					<tr>
						<!--Membuat 3 tombol yaitu daftar, clear, dan kembali-->
						<td><input class="btn btn-danger btn-sm" type="submit" value="Daftar" name="daftar" /> <input class="btn btn-danger btn-sm" type="button" value="Clear" onclick="window.location.href='index.php'" /> </td>

					</tr>
				</fieldset>
			</table>
		</form>
	</div>
	<header>
		<h3>Lihat Data Dokter</h3>
	</header>
	<?php
	include "mysql.php";
	$inputan = "SELECT * FROM dokter";
	//variabel query berisi mysqli query yang digunakan untuk menampilkan semua data di tabel dokter
	$query = sqlsrv_query($conn, $inputan);
?>
	<div >
		<form action="" method="post">
			<table class="table">
				<tr>
					<th>Id Dokter</th>
					<th>Nama Dokter</th>
					<th>Alamat Dokter</th>
					<th>Jenis Kelamin</th>
					<th>Gaji</th>
					<th>Tanggal</th>
				</tr>
				<?php
				$checkdata = "SELECT COUNT(*) AS RowCnt FROM dokter";
				$querychek = (sqlsrv_query($conn, $checkdata));
				if ($querychek > 0){
				//jika jumlah data/baris lebih dari 0 maka
					while($data = sqlsrv_fetch_array($query)){
				?>
					<tr>
						<!--memanggil variabel data dengan index Kd_dokter-->
						<td> <?php echo $data["Kd_dokter"]; ?> </td>
						<!--memanggil variabel data dengan index Nama-->
						<td> <?php echo $data["Nama"]; ?> </td>
						<!--memanggil variabel data dengan index Alamat-->
						<td> <?php echo $data["Alamat"]; ?> </td>
						<!--memanggil variabel data dengan index Gender-->
						<td> <?php echo $data["Gender"]; ?> </td>
						<!--memanggil variabel data dengan index Gaji-->
						<td> <?php echo $data["Gaji"]; ?> </td>
						<td> <?php echo $data["tanggal"]->format('d M Y'); ?> </td>
					</tr>
				<?php
				}
				
} 			
				
				?>
			</table>
		</form>
		<br>
		<br>
		<h3>Hapus Data Dokter</h3>
		<!--jika terdapat action maka akan memanggil delete_data.php`-->
		<form action="delete_data.php" method="post">
			<table class="table">	
				<tr>
					<td><label for="id_dokter">Masukkan Id Dokter</label></td>
					<td>: <input type="text" name="id_dokter" placeholder="Masukan id"/> </td>
				</tr>
				<!--terdapat 3 button yaitu delete, clear, kembali-->
				<td><input class="btn btn-danger btn-sm" type="submit" value="delete" name="delete" /> <input class="btn btn-danger btn-sm" type="button" value="Clear" onclick="window.location.href='index.php'" /></td>
			</table>
		</form>
	</div>
	<!--============================================== Batas bawah ==============================-->
	<br>
<?php
	include("footer.php");
	sqlsrv_close($conn);
?>