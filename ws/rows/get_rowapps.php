<?php
/**
 * Obtiene las apps activas dentro de la base de datos y las muestra en una lista.
 * Creado por Albertoha94 el 20/Dic/16.
 */
include '../../conn.php';

$firstRound = true;

//-- 2 vueltas.
//-- La primera agarra a global y la segunda al resto.
for($i = 0; $i < 2; $i++) {
	$sql = "";
	if($firstRound) {
		$sql = "SELECT `id_app`, `titulo`, `plataforma` FROM `apps`
						WHERE `activo`= 1 AND `id_app` = 5";
		$firstRound = false;
	} else {
		$sql = "SELECT `id_app`, `titulo`, `plataforma` FROM `apps`
						WHERE `activo`= 1 AND `id_app` != 5
						ORDER BY titulo ASC";
	}

	//-- Select apps.
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {

		//-- Datos de cada renglon.
		while($row = $result->fetch_assoc()) {

			//-- Cuenta cuantas noticias activas tienen.
			$sql_count = "SELECT COUNT(activo) as conteo
										FROM noticia
										WHERE app_lider = ". $row["id_app"] ." AND activo = 1";
			$result_count = $conn->query($sql_count);

			if($result_count->num_rows > 0) {

				$row_count = $result_count->fetch_assoc();

				//-- Si tiene noticias, poner el contador.
				if($row_count < 0) {
					echo "<button type='button' class='list-group-item list-group-item-action'
												onclick='showApp(". $row["id_app"] .")'>
									". $row["titulo"] ."
									<span class=\"badge badge-items\">". $row_count["conteo"] ."</span>
								</button>";
				} else {
					echo "<button type='button' class='list-group-item list-group-item-action'
												onclick='showApp(". $row["id_app"] .")'>
									". $row["titulo"] ."
								</button>";
				}
			}
		}
	} else {
		//-- La tabla esta vacia.
	}
}
?>
