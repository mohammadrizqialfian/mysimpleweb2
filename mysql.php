<?php
	try {
		$conn = new PDO("sqlsrv:server = tcp:alfiandicoding.database.windows.net,1433; Database = alfiandicoding", "alfian", "password12345%");
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}
	catch (PDOException $e) {
		print("Error connecting to SQL Server.");
		die(print_r($e));
	}

	// SQL Server Extension Sample Code:
	$connectionInfo = array("UID" => "alfian", "pwd" => "password12345%", "Database" => "alfiandicoding", "LoginTimeout" => 30, "Encrypt" => 1, "TrustServerCertificate" => 0);
	$serverName = "tcp:alfiandicoding.database.windows.net,1433";
	$conn = sqlsrv_connect($serverName, $connectionInfo);
?>