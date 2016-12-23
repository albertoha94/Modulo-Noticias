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

	//-- Cabecera de la tabla.
	echo "  <thead>
				<tr>
					<th style='text-align: center; width: 200px;'>
						Idioma
					</th>
					<th style='text-align: center; width: 200px;'>
						Abreviación
					</th>
					<th style='text-align: center; width: 200px;'>
						Última edición
					</th>
					<th style='width: 100px'/>
					<th style='width: 100px'/>
				</tr>
			</thead>";

    //-- Datos de cada renglon.
    while($row = $result->fetch_assoc()) {

    	//-- Ultima edición.
    	$ult_edit = "-";
    	if(!is_null($row["fecha_edicion"]))
    		$ult_edit = $row["fecha_edicion"];

     	echo "	<tr>
					<td>
						<p style='text-align: center;'>
							". $row["titulo"] ."
						</p>
					</td>
					<td>
						<p style='text-align: center;'>
							". $row["abreviacion"] ."
						</p>
					</td>
					<td>
						<p style='text-align: center;'>
							". $ult_edit ."
						</p>
					</td>
					<td>
						<p style='text-align: center;'>
							<button type='button' class='btn btn-primary' style='width: 100%;' data-toggle='modal'
											data-target='#modal-dialog-language'
											onclick='editLanguage(". $row["id_idioma"] .")'><b>Editar</b></button>
						</p>
					</td>
					<td>
						<p style='text-align: center;'>
							<button type='button' class='btn btn-danger' style='width: 100%;' data-toggle='modal'
											data-target='#modal-dialog-language-remove'
											onclick=\"deleteLanguagePrompt(". $row["id_idioma"] .", '". $row["titulo"] ."', '". $row["abreviacion"] ."')\">
											<b>Desactivar</b>
							</button>
						</p>
					</td>
				</tr>";
    }
} else {

	//-- Cabecera de la tabla.
	echo "  <thead>
				<tr>
					<th style='text-align: center; width: 100%;'/>
				</tr>
			</thead>";

	//-- Tabla vacia
    echo "<tr>
    		<td>
    			Sin datos que mostrar.
    		</td>
    	  </tr>";
}
?>
