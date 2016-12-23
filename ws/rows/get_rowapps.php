<?php
/**
 * Obtiene las apps activas dentro de la base de datos y las muestra en una lista.
 * Creado por Albertoha94 el 20/Dic/16.
 */
include '../../conn.php';

//-- Select apps.
$sql = "SELECT `id_app`, `titulo` FROM `apps` WHERE `activo`= 1 ORDER BY titulo ASC";
$result = $conn->query($sql);

if ($result->num_rows > 0) {

	//-- Datos de cada renglon.
	while($row = $result->fetch_assoc()) {

		//-- Cuenta cuantas noticias activas tienen.
		$sql_count = "SELECT COUNT(activo) as conteo FROM noticia WHERE app_lider = 1 AND activo = 1";
		$result_count = $conn->query($sql_count);

		if($result_count->num_rows > 0) {

			//-- Escribir el renglon con contador.
			$row_count = $result_count->fetch_assoc();
			echo "<li class=\"list-group-item\">". $row["titulo"] ."<span class=\"badge badge-items\">". $row_count["conteo"] ."</span></li>";
		} else {
			//-- Escribir el renglon sin el contador.
			echo "<li class=\"list-group-item\">". $row["titulo"] ."</li>";
		}
	}
} else {
	//-- La tabla esta vacia.
}
?>
