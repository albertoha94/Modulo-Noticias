<?php
/**
 * Creado por Albertoha94 el 05/Dic/16.
 * Cambios:
 * 05/Dic/16:	-Script creado en base a update_language.
 *						-Actualizado query para hacer una funcion diferente.
 *						-Actualizado mensajes de respuesta.
 * 07/Dic/16:	-Descomentado y actualizado segmento de codigo para logs.
 */
include '../../conn.php';

//-- Obteniendo la info.
$_id = $_GET['language_id'];

//-- Insert language.
$sql_add = "UPDATE `idioma`
						SET `fecha_baja`= NOW(),
								`activo`= 0
						WHERE activo = 1
						AND id_idioma = ". $_id;

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

$sql_log = "INSERT INTO `log`(`mensaje`, `type`, `fecha_creacion`)
			VALUES ('Se ha desactivado el lenguaje ". $resf["titulo"] ."(". $resf["abreviacion"] .").', 2, NOW())";
if (mysqli_query($conn, $sql_log)) {
    echo "Nuevo log creado por desactivar un lenguaje.";
}
else {
    echo "Error: " . $sql_log . "<br>" . mysqli_error($conn);
}
?>
