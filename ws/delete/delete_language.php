<?php
/**
 * Service usado para dar de baja un lenguaje, crea un log conforme a este.
 * Creado por Albertoha94 el 05/Dic/16.
 */
include '../../conn.php';

//-- Obteniendo la info.
$_id = $_GET['language_id'];

//-- Insert language.
$sql_add = "UPDATE `idioma`
						SET `fecha_baja`= NOW(),
								`ultimo_cambio` = NOW(),
								`activo`= 0
						WHERE id_idioma = ". $_id;

if (mysqli_query($conn, $sql_add)) {
    echo "Lenguaje eliminado.";
}
else {
    echo "Error: " . $sql_add . "<br>" . mysqli_error($conn);
}

//-- Log -----------------------------------------------------------------------
$select_log = "SELECT `titulo`, `abreviacion`
		FROM `idioma`
		WHERE `id_idioma` = ". $_id;

$result_select = $conn->query($select_log);

//-- Obtener el resultado.
$resf = array();
if ($result_select->num_rows > 0) {

    //-- Datos de cada renglon.
    while($row = $result_select->fetch_assoc()) {
			$resf["titulo"] = $row["titulo"];
			$resf["abreviacion"] = $row["abreviacion"];
    }
}

$sql_log = "INSERT INTO `log`(`mensaje`, `type`)
			VALUES ('Desactivación del lenguaje ". $resf["titulo"] ."(". $resf["abreviacion"] .").', 2)";
if (mysqli_query($conn, $sql_log)) {
    echo "Log de lenguaje desactivado creado.";
}
else {
    echo "Error: " . $sql_log . "<br>" . mysqli_error($conn);
}
?>
