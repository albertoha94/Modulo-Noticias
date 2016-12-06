<!DOCTYPE html>
<html>

<head>
	<title>Modulo noticias</title>

	<!-- ########## Componentes usados ########## -->
	<!-- Jquery -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

	<!-- Bootstrap -->
	<link rel="stylesheet" href="libs/bootstrap.min.css">
	<script src="libs/bootstrap.min.js"></script>

	<!-- Css del programa -->
	<link rel="stylesheet" type="text/css" href="css/news.css">

	<!-- JS del programa -->
	<script type="text/javascript" src="js/languages.js"></script>
	<script type="text/javascript" src="js/news.js"></script>

</head>

<body class="body-news">

	<?php
			//Conexion
			require 'conn.php';

			//Dialogos
			require 'forms/add-app.php';
			require 'forms/language.php';
			require 'forms/language-remove.php';
	?>

	<!-- Panel de acciones -->
	<div id="div-actions">
		<table>
			<tr>
				<td>
					<button type="button" class="btn btn-manx" onclick="nuevaNoticia()">Nueva Noticia</button>
				</td>
				<td>
					<button class="btn btn-manx" onclick="nuevaApp()">Nueva App</button>
				</td>
				<td>
					<button type="button" class="btn btn-manx" data-toggle="modal"
									data-target="#modal-dialog-language" onclick="newLanguage()">Nuevo Idioma</button>
				</td>
			</tr>
		</table>

	</div>

	<!-- Pestañas de al app -->
	<div id="div-body">
		<ul class="nav nav-tabs nav-justified" id="tabs_main">
			<li class="active"><a href="#div-log" data-toggle="tab">Cambios</a></li>
			<li><a href="#div-apps" data-toggle="tab">Aplicaciones</a></li>
			<li><a href="#div-languages" data-toggle="tab">Idiomas</a></li>
		</ul>

		<!-- Contenido de la pagina. -->
		<div id="div-windows" class="tab-content">

			<?php
			require 'secciones/log.php';
			require 'secciones/languages.php';
			require 'secciones/apps.php';
			?>

		</div>

	</div>

</body>

</html>
