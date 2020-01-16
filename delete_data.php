<?php
	include"mysql.php";

// cek apakah sudah menekan tombol delete
	if(isset($_POST['delete'])){
		//variabel id berisi data dari id_dokter
		$id = $_POST['id_dokter'];
		//variabel cek berisi query untuk cek apakah ada datanya.
		$cek = "select Kd_dokter from dokter where Kd_dokter='$id'";
		//variabel cek2 berisi mysqli query
		$cek2 = sqlsrv_query($conn, $cek);
		//variabel cek2 berisi extract array dari variabel cek2
		$cek2 = sqlsrv_fetch_array($cek2);
		//jika variabel cek2 yang di index Kd_dokter tidak kosong maka
		if ($cek2["Kd_dokter"]!=""){
			//variabel sql yang berisi query untuk delete data
			$sql = "delete from dokter where Kd_dokter='$id'";
			//variabel query yang berisi mysqli query
			$query = sqlsrv_query($conn, $sql);
			// cek apakah query berhasil/True
			if($query) {
				// kalau berhasil menampilkan status=sukses
				header('Location: index.php?status=sukses');
			} 
			else {
				// kalau berhasil menampilkan status=gagal
				header('Location: index.php?status=gagal');
			}	
		}
		//jika tidak/ Kd_dokter kosong maka
		else{
			//menampilkan id tidak ada
			header('Location: index.php?status=gagal_id_tidak_ada');
		}
	}
	//jika tidak menekan tombol delete
	else {
		//maka menampilkan akses dilarang
		die("Akses dilarang...");
	}
?>
