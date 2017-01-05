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
	<script type="text/javascript" src="js/apps.js"></script>
	<script type="text/javascript" src="js/additional.js"></script>
	<script type="text/javascript" src="js/news.js"></script>

</head>

<body class="body-news">

	<?php
			//Conexion
			require 'conn.php';

			//Dialogos
			require "forms/platform-add.php";
			require 'forms/app-add.php';
			require 'forms/language-add.php';
			require 'forms/language-remove.php';
	?>

	<!-- Panel de acciones -->
	<div id="div-actions">
		<table>
			<tr>
				<td>
					<button type="button" class="btn btn-manx" onclick="nuevaNoticia()">Nueva Noticia</button>
				</td>
			</tr>
		</table>

	</div>

	<div class="panel panel-default div-panel-height" style="height: 88%">
	  <div class="panel-body div-panel-height height100">
			<!-- Pestañas de al app -->
			<div id="div-body" class="height100">
				<ul class="nav nav-tabs nav-justified" id="tabs_main">
					<li class="active"><a href="#div-lastnews" data-toggle="tab">Ultimas noticias</a></li>
					<li><a href="#div-apps" data-toggle="tab">Aplicaciones</a></li>
					<li><a href="#div-languages" data-toggle="tab">Tablas adicionales</a></li>
					<li class="active"><a href="#div-log" data-toggle="tab">Cambios</a></li>
				</ul>

				<!-- Contenido de la pagina. -->
				<div id="div-windows" class="tab-content">

					<?php
					require 'secciones/latest_news.php';
					require 'secciones/log.php';
					require 'secciones/languages.php';
					require 'secciones/apps.php';
					?>

				</div>

			</div>
			<div>
			</div>
		</div>
	</div>
	<div>
		<h4 style="text-align: center">Hecho por fulano</h5>
	</div>

</body>

</html>
