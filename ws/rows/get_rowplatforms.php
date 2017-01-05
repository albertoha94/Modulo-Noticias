<?php
/**
 * Obtiene todas las plataformas activas dentro de la base de datos.
 * Creado por Albertoha94 el 04/Ene/17.
 */
include '../../conn.php';

//-- Select idioma.
$sql = "SELECT `id_plataforma`, `titulo`, `icono`, `manejable`
				FROM `plataformas`
				ORDER BY titulo ASC";
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
