<?php
/**
 * Obtiene la app seleccionada dentro de la base de datos.
 * Creado por Albertoha94 el 22/Dic/16.
 */
include '../../conn.php';

$appid = $_GET['appId'];

//-- Select apps.
$sql = "SELECT `id_app`, `titulo`, `idioma_default`, `icono`, `activo`, `plataforma`, `fecha_creacion`
        FROM `apps`
        WHERE `id_app` = ". $appid;
        //echo $sql + "\n";
$result = $conn->query($sql);

$num_rows = $result->num_rows;
//echo $num_rows + "\n";
if ($num_rows > 0) {
  $answer = $result->fetch_assoc();
  //print_r($answer);
  echo json_encode($answer);
} else {
  echo json_encode(array());
}
?>
