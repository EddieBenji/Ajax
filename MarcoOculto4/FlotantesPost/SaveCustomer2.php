<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Crear nuevo cliente</title>
<?php
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
?>

<script type="text/javascript">
	window.onload = function(){
		parent.saveResult("<?php echo $sStatus ?>");
		//top.frames["displayFrame"].saveResult("<?php echo $sStatus ?>");
	}
</script>


</head>

<body>
</body>
</html>
