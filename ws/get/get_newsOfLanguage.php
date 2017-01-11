<?php
/**
 * Obtiene las noticias de una app de acuerdo al lenguaje.
 * Creado por Albertoha94 el 09/Ene/17.
 */
include '../../conn.php';

$idapp = $_GET['id_app'];
$idlang = $_GET['id_lang'];

//-- Select apps.
$sql = "CALL `sp_getNewsOfLanguage`(". $idapp .", ". $idlang .")";
//echo $sql ."\n";

//-- Corre el procedimiento
$result = $conn->query($sql) or die("Query fail: ". $conn->error);

//-- Loop the result set
$resf = array();
//echo $result->num_rows ."\n";
if ($result->num_rows > 0) {
   while ($row = mysqli_fetch_array($result)) {
      //print_r($row);
      $resf[] = $row;
   }
}

echo json_encode($resf);
?>
