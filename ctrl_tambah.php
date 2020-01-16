<?php
	//memanggil file mysql.php
	include"mysql.php";

	//cek apakah menekan tombol daftar
	if(isset($_POST['daftar'])){
		//cek apakah form id_dokter telah terisi
		if($_POST['id_dokter']){
		// ambil data dari form
		//variabel id berisi data dari form id_dokter
			$id = $_POST['id_dokter'];
			//variabel nama berisi data dari form nama_dokter
			$nama = $_POST['nama_dokter'];
			//variabel alamat berisi data dari form alamat_dokter
			$alamat = $_POST['alamat_dokter'];
			//variabel jk berisi data dari form jenis_kelamin
			$jk = $_POST['jenis_kelamin'];
			//variabel sk berisi data dari form gaji
			$sk = $_POST['gaji'];
			//variabel sql yang berisi query untuk menambahkan/insert data
			$sql = "INSERT INTO dokter (Kd_dokter, Nama, Alamat, Gender, Gaji) VALUES ('$id','$nama','$alamat','$jk', '$sk');";
			//variabel query berisi mysqli_query yang memanggil variabel sambung2 dan variabel sql
			$query = sqlsrv_query($conn, $sql);
		
			//cek apakah query berjalan lancar/True.
			if( $query ) {
				// kalau berhasil menampilkan status=sukses
				header('Location: index.php?status=sukses');
			} else {
				// kalau gagal menampilkan status=gagal
				header('Location: index.php?status=gagal');
			}
		}
		else {
			//kalau gagal/tidak ada id maka muncul seperti ini
			die("Masukkan Id terlebih Dahulu...");
		}
	} 
	else {
		//jika tidak menklik tombol/button daftar
		die("Akses dilarang...");
	}
?>
