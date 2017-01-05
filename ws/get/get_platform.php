<?php
/**
 * Obtiene un lenguaje por medio de su id y regresa su información.
 * Creado por Albertoha94 el 05/Ene/17.
 */
include '../../conn.php';

//-- Obteniendo variables.
$platid = $_GET['PlatId'];

//-- Select idioma.
$sql = "SELECT `id_plataforma`, `titulo`, `icono`
				FROM `plataformas`
				WHERE activo = 1
				AND `id_plataforma` = ". $platid;
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
