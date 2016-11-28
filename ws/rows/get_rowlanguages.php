<?php
/**
 * Obtiene todos los lenguajes activos dentro de la base de datos y los muestra en formato de tabla.
 * Creado por Albertoha94 el 28/Nov/16.
 * Cambios:
 * 28/Nov/16:	-Creado llamada a conexión.
 				-Creado query SELECT.
 				-Creado un ciclo para dibujar lo obtenido del SELECT.
 */
include '../conn.php';

//-- Select idioma.
$sql = "SELECT `id_idioma`, `titulo`, `abreviacion`, `fecha_edicion` 
		FROM `idioma`
		WHERE activo = 1";
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
							<button type='button' class='btn btn-primary' style='width: 100%;' onclick='editLanguage(
							". $row["id_idioma"] .")'>Editar</button>
						</p>
					</td>
					<td>
						<p style='text-align: center;'>
							<button type='button' class='btn btn-danger' style='width: 100%;' onclick='deleteLanguageLog(
							". $row["id_idioma"] .")'>Eliminar</button>
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
    			Sin datos que obtener.
    		</td>
    	  </tr>";
}
?>