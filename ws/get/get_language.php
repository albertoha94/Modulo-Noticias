<?php
/**
 * Obtiene un lenguaje por medio de su id y regresa su información.
 * Creado por Albertoha94 el 05/Dic/16.
 * Cambios:
 * 05/Dic/16:		-Creado script en base a get_rowlanguages.
 *							-Modificado el ciclo para que haga un array.
 *							-Modificado el echo para que regrese un JSON.
 */
include '../../conn.php';

//-- Obteniendo variables.
$langid = $_GET['LaguageId'];

//-- Select idioma.
$sql = "SELECT `id_idioma`, `titulo`, `abreviacion`
		FROM `idioma`
		WHERE activo = 1
		AND `id_idioma` = ". $langid;
$result = $conn->query($sql);

//-- Obtener el resultado.
$resf = array();
if ($result->num_rows > 0) {

    //-- Datos de cada renglon.
    while($row = $result->fetch_assoc()) {
			$resf["id"] = $row["id_idioma"];
			$resf["titulo"] = $row["titulo"];
			$resf["abreviacion"] = $row["abreviacion"];
    }
}

echo json_encode($resf);
?>
