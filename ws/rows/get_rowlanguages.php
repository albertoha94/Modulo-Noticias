<?php
/**
 * Obtiene todos los lenguajes activos dentro de la base de datos y los muestra en formato de tabla.
 * Creado por Albertoha94 el 28/Nov/16.
 */
include '../../conn.php';

//-- Select idioma.
$sql = "SELECT `id_idioma`, `titulo`, `abreviacion`, `fecha_edicion`
		FROM `idioma`
		WHERE activo = 1
		ORDER BY fecha_creacion DESC";
$result = $conn->query($sql);

if ($result->num_rows > 0) {

    //-- Datos de cada renglon.
    while($row = $result->fetch_assoc()) {

    	//-- Ultima edición.
    	$ult_edit = "-";
    	if(!is_null($row["fecha_edicion"]))
    		$ult_edit = $row["fecha_edicion"];

     	echo "
				<tr>
					<td style=\"width: 200px;\">
						<p>
							". $row["titulo"] ."
						</p>
					</td>
					<td style=\"width: 200px;\">
						<p>
							". $row["abreviacion"] ."
						</p>
					</td>
					<td style=\"width: 200px;\">
							<button type='button' class='btn btn-primary' style='width: 100%;' data-toggle='modal'
											data-target='#modal-dialog-language'
											onclick='editLanguage(". $row["id_idioma"] .")'><b>Editar</b></button>
					</td>
					<td style=\"width: 200px;\">
							<button type='button' class='btn btn-danger' style='width: 100%;' data-toggle='modal'
											data-target='#modal-dialog-language-remove'
											onclick=\"deleteLanguagePrompt(". $row["id_idioma"] .", '". $row["titulo"] ."', '". $row["abreviacion"] ."')\">
											<b>Desactivar</b>
							</button>
					</td>
				</tr>";
    }
}
?>
