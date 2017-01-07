<?php
/**
 * Obtiene la app seleccionada dentro de la base de datos.
 * Creado por Albertoha94 el 22/Dic/16.
 */
include '../../conn.php';

$appid = $_GET['appId'];

//-- Select apps.
$sql = "SELECT `id_app`, `titulo`, `idioma_default`, `plataforma`, `icono`, `manejable`,
               `fecha_creacion`, `ultimo_cambio`
        FROM `apps`
        WHERE `id_app` = ". $appid;

/*
SELECT `id_app`, `titulo`, `idioma_default`, `plataforma`, `icono`, `manejable`, `activo`, `fecha_creacion`, `ultimo_cambio`, i.titulo, i.abreviacion,
COUNT(SELECT * FROM n WHERE n.activo = 1 AND n.app_lider = id_app AND n.idioma = idioma_default AND n.publicada = 1) AS `noticias_total`,
COUNT(SELECT * FROM n WHERE n.activo = 1 AND n.app_lider = id_app AND n.idioma = idioma_default AND n.publicada = 1 AND n.global = 1) AS `noticias_global`,
COUNT(n.id_noticia WHERE n.activo = 1 AND n.app_lider = id_app AND n.idioma = idioma_default AND n.publicada = 1 AND n.global = 0) AS `noticias_local`
FROM apps AS a
INNER JOIN idioma as i on i.id_idioma = a.idioma_default
INNER JOIN noticia as n on n.app_lider = a.id_app
WHERE a.activo = 1
AND i.activo = 1
AND a.id_app = 6
*/

$result = $conn->query($sql);

//-- Obtener el resultado.
$resf = array();
if ($result->num_rows > 0) {

  //-- Datos de cada renglon.
  while($row = $result->fetch_assoc()) {
    $resf[] = $row;
  }
}

echo json_encode($resf);
?>
