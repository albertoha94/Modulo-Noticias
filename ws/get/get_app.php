<?php
/**
 * Obtiene la app seleccionada dentro de la base de datos.
 * Creado por Albertoha94 el 22/Dic/16.
 */
include '../../conn.php';

$appid = $_GET['appId'];

//-- Select apps.
$sql = "SELECT `id_app`, `titulo`, `idioma_default`, `icono`, `activo`, `fecha_creacion`
        FROM `apps`
        WHERE `id_app` = ". $appid;
$result = $conn->query($sql);

$num_rows = $result->num_rows;
if ($num_rows > 0) {
  $answer = $result->fetch_assoc();
  $al_results = array();
  for($i = 0; $i < $num_rows; $i++) {
    array_push($al_results, $result->fetch_assoc());
  }
?>