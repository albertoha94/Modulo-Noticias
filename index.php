<!DOCTYPE html>
<html>

<head>
	<title>Modulo noticias</title>

	<!-- ########## Componentes usados ########## -->
	<!-- Jquery -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

	<!-- Bootstrap -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

	<!-- Css del programa -->
	<link rel="stylesheet" type="text/css" href="css/news.css">

	<!-- JS del programa -->
	<script type="text/javascript" src="js/news.js"></script>

</head>

<body class="body-news">

	<!-- Dialogos -->
	<?php
			require 'conn.php';
			require 'formas/add-app.php';
			require 'formas/add-language.php';
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
					<button class="btn btn-manx" onclick="nuevaIdioma()">Nuevo Idioma</button>
				</td>
			</tr>
		</table>
		
	</div>

	

	<!-- Pestañas de al app -->
	<div id="div-body">
		<ul class="nav nav-tabs">
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