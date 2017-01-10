<?php
/**
 * Obtiene los lenguajes manejados en la app.
 * Creado por Albertoha94 el 09/Ene/17.
 */
include '../../conn.php';

$appid = $_GET['appId'];

//-- Select apps.
$sql = "CALL `sp_getNewsLanguagesByApp`(". $appid .")";

//-- Corre el procedimiento
$result = $conn->query($sql) or die("Query fail: ". $conn->error);

//-- Loop the result set
$resf = array();
if ($result->num_rows > 0) {
   while ($row = mysqli_fetch_array($result)) {
      $resf[] = $row;
   }
}

echo json_encode($resf);
?>
