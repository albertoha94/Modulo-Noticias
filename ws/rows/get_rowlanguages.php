<?php
/**
 * Obtiene todos los lenguajes activos dentro de la base de datos.
 * Creado por Albertoha94 el 28/Nov/16.
 */
include '../../conn.php';

//-- Select idioma.
$sql = "SELECT `id_idioma`, `titulo`, `abreviacion`, `manejable`
				FROM `idioma`
				WHERE activo = 1
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
