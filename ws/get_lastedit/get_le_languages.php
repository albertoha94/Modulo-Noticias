<?php
/**
 * Obtiene la fecha mas reciente de ultimo_cambio dentro de idiomas.
 * Creado por Albertoha94 el 03/Ene/17.
 */
include '../../conn.php';

//-- Select de fecha edicion.
$sql = "SELECT `ultimo_cambio` FROM `idioma` ORDER BY ultimo_cambio DESC LIMIT 1";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

if(!is_null($row)) {
  echo $row['ultimo_cambio'];
} else {
  echo "-";
}
?>
