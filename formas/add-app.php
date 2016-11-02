<div id="form-add-app" class="div-body">
	
	<div id="app-form-back" class="form-back"></div>

	<div class="panel panel-default small-form">
		<div class="panel-heading manx-panel-heading">
			<h5 id="app-title">Agregar aplicación</h5>
		</div>
		<div class="panel-body">
			<p>Nombre de la aplicación</p>
			<input type="input" id="app-name" class="form-control" maxlength="30" tabindex="1">
			<p>Lenguaje defecto</p>
			<select class="form-control fill-space" id="app-language" tabindex="2">
				<option selected="selected">Preuba 1</option>
				<option>Prueba 2</option>
				<option>Prueba 3</option>
			</select>
			<button type="button" id="app-form-actionbutton" class="btn btn-manx-form fill-space" onclick="" style="margin-bottom: 5px; margin-top: 5px;" tabindex="3">Agregar</button>
			<button type="button" class="btn btn-manx-form fill-space" onclick="cerrarForma('form-add-app')" tabindex="4">Cancelar</button>
		</div>
	</div>

</div>