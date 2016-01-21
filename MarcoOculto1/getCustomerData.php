<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"/>
    <title>Obtiene informaci�n del cliente</title>
    <?php
    $sID = $_GET["id"];
    $sInfo = "";
    $sDBServer = "localhost";
    $sDBName = "ventas2016";
    $sDBUserName = "root";
    $sDBPassword = "root";

    //Creamos el SQL Query
    $sQuery = "Select * from  customers where Id = " . $sID;

    //Realizamos la conexi�n
    $oLink = mysql_connect($sDBServer, $sDBUserName, $sDBPassword);
    @mysql_select_db($sDBName) or $sInfo = "No se pudo abir la base de datos";

    if ($sInfo == "") {
        if ($oResult = mysql_query($sQuery) and mysql_num_rows($oResult) > 0) {
            $aValues = mysql_fetch_array($oResult, MYSQL_ASSOC);
            $sInfo = $aValues['Name'] . "<br/>" . $aValues['Address'] . "<br/>" .
                $aValues['City'] . "<br/>" . $aValues['State'] . "<br/>" .
                $aValues['Zip'] . "<br/>" . $aValues['Phone'] . "<br/>" .
                "<a href=\"mailto:" . $aValues['E-Mail'] . "\">" . $aValues['E-Mail'] . "</a>";
        } else {
            $sInfo = "No existe el cliente con el id = " . $sID;
        }
    }

    mysql_close($oLink);
    ?>

    <script type="text/javascript">
        window.onload = function () {
            var divInfoToReturn = document.getElementById("divInfoToReturn");
            top.frames["displayFrame"].displayCustomerInfo(divInfoToReturn.innerHTML);
        }
    </script>


</head>

<body>
</body>
<div id="divInfoToReturn">
    <?php echo $sInfo ?>
</div>
</html>
