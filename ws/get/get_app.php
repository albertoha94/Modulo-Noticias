<?php
/**
 * Obtiene la app seleccionada dentro de la base de datos.
 * Creado por Albertoha94 el 22/Dic/16.
 */
include '../../conn.php';

$appid = $_GET['appId'];

//-- Select apps.
$sql = "SET @p0='". $appid ."'; CALL `sp_getApp`(@p0)";

$result = $conn->query($sql);

//-- Obtener el resultado.
$resf = array();

//-- Datos de cada renglon.
while($row = $result->fetch_assoc()) {
  $resf[] = $row;
}

echo json_encode($resf);
?>
