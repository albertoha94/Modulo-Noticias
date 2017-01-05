<?php
/**
 * Obtiene todos los lenguajes activos dentro de la base de datos.
 * Creado por Albertoha94 el 08/Dic/16.
 */
include '../../conn.php';

//-- Select idioma.
$sql = "SELECT `mensaje`, `type`, `fecha_creacion`
				FROM `log`
				ORDER BY fecha_creacion DESC";
$result = $conn->query($sql);

if ($result->num_rows > 0) {

		$resps = array();
    //-- Datos de cada renglon.
    while($row = $result->fetch_assoc()) {
			$resps[] = $row;
    }
		echo json_encode($resps);
}
?>
