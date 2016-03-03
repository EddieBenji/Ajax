<?php
	header("Content-Type: text/plain");
	
	$sName = $_POST["txtName"];
	$sAddress = $_POST["txtAdress"];
	$sCity = $_POST["txtCity"];
	$sState = $_POST["txtState"];
	$sZipCode = $_POST["txtZipCode"];
	$sPhone = $_POST["txtPhone"];
	$sEmail = $_POST["txtEmail"];
	
	$sStatus = "";
	$sInfo = "";
	
	//Conexión
	$sDBServer = "localhost";
	$sDBName = "ventas2016";
	$sDBUserName = "root";
	$sDBPassword = "";
	
	$sSQL = "insert into customers(Name, Address, City, State, Zip, Phone,`E-Mail`)"."values('$sName','$sAddress','$sCity','$sState','$sZipCode','$sPhone','$sEmail')";
	
	//Realizamos la conexión
	$oLink = mysql_connect($sDBServer,$sDBUserName,$sDBPassword);
	@mysql_select_db($sDBName) or $sInfo = "No se pudo abir la base de datos";
	
	if($sInfo==""){
		if($oResult = mysql_query($sSQL)){
			$sStatus = "Se ha agregado el cliente con id = ".mysql_insert_id();
		}
		else{
			$sStatus = "Ocurrió un error al insertar el dato, el cliente no fue creado";
		}
	}
	
	mysql_close($oLink );	
	
	echo $sStatus;
?>
