<?php
/**
 * Created by PhpStorm.
 * User: Lalo
 * Date: 27/01/2016
 * Time: 06:48 PM
 */
header("Content-Type: text/plain");
$sID = $_GET["id"];
$sInfo = "";
$sDBServer = "localhost";
$sDBName = "ventas2016";
$sDBUserName = "root";
$sDBPassword = "root";

//Creamos el SQL Query
$sQuery = "Select * from  customers where Id = " . $sID;

//Realizamos la conexión
$oLink = mysql_connect($sDBServer, $sDBUserName, $sDBPassword);
@mysql_select_db($sDBName) or $sInfo = "No se pudo abir la base de datos";

if ($sInfo == "") {
    if ($oResult = mysql_query($sQuery) and mysql_num_rows($oResult) > 0) {
        $aValues = mysql_fetch_array($oResult, MYSQL_ASSOC);
        $sInfo = $aValues['Name'] . "<br/>" . $aValues['Address'] . "<br/>" .
            $aValues['City'] . "<br/>" . $aValues['State'] . "<br/>" .
            $aValues['Zip'] . "<br/>" . $aValues['Phone'] . "<br/>" .
            "<a href=\"mailto:" . $aValues['E-mail'] . "\">" . $aValues['E-mail'] . "</a>";
    } else {
        $sInfo = "No existe el cliente con el id = " . $sID;
    }
}

mysql_close($oLink);

echo $sInfo;