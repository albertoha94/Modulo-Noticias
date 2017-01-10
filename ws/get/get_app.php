<?php
/**
 * Obtiene la app seleccionada dentro de la base de datos.
 * Creado por Albertoha94 el 22/Dic/16.
 */
include '../../conn.php';

$appid = $_GET['appId'];

//-- Select apps.
$sql = "CALL `sp_getApp`(". $appid .")";

//-- run the store proc
$result = mysqli_query($conn, $sql) or die("Query fail: ". $conn->error);

//-- Loop the result set
$resf = array();
while ($row = mysqli_fetch_array($result)) {
   $resf[] = $row;
}

echo json_encode($resf);
?>
