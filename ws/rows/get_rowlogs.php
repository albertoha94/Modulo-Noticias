<?php
/**
 * Obtiene todos los lenguajes activos dentro de la base de datos y los muestra en formato de tabla.
 * Creado por Albertoha94 el 08/Dic/16.
 */
include '../../conn.php';

//-- Select idioma.
$sql = "SELECT `mensaje`, `type`, `fecha_creacion`
				FROM `log`
				ORDER BY fecha_creacion DESC";
$result = $conn->query($sql);

if ($result->num_rows > 0) {

	//-- Cabecera de la tabla.
	echo "  <thead>
				<tr>
					<th style='text-align: center; width: 150px;'>
					</th>
					<th style='text-align: center; width: 400px;'>
						Descripción
					</th>
					<th style='text-align: center; width: 250px;'>
						Fecha
					</th>
				</tr>
			</thead>";

    //-- Datos de cada renglon.
		$temp_icon_name = "";
    while($row = $result->fetch_assoc()) {

			//-- Icono para representar la acción.
			switch ($row["type"]) {
				case 0:
					$temp_icon_name = "<span class='glyphicon glyphicon-plus'></span>";
				break;
				case 1:
					$temp_icon_name = "<span class='glyphicon glyphicon-pencil'></span>";
				break;
				case 2:
					$temp_icon_name = "<span class='glyphicon glyphicon-minus'></span>";
				break;
			}

     	echo "	<tr>
					<td>
						<p style='text-align: center;'>
							". $temp_icon_name ."
						</p>
					</td>
					<td>
						<p style='text-align: center;'>
							". $row["mensaje"] ."
						</p>
					</td>
					<td>
						<p style='text-align: center;'>
							". $row["fecha_creacion"] ."
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
