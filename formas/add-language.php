
<div id="form-add-language" class="div-body">
	
	<div id="app-form-lang-back" class="form-back"></div>

	<div class="panel panel-default small-form">
		<div class="panel-heading manx-panel-heading">
			<h5 id="app-lang-title">Agregar idioma</h5>
		</div>
		<div class="panel-body" >
			<div class="alert alert-danger fade in" id="alert-error-addl" style="text-align: center;">
  				<strong>ERROR</strong>
  				<br>
  				Todos los campos deben ser llenados.
			</div>
				<p>Nombre del idioma</p>
				<input type="input" id="app-lang-name" class="form-control" maxlength="20" tabindex="1" required="required">
				<p>Abreviación</p>
				<input type="input" id="app-lang-abv" class="form-control" maxlength="2" tabindex="1" 
					   style="text-transform: uppercase;" required="required">
				<button type="submit" id="app-form-lang-actionbutton" class="btn btn-manx-form fill-space" 
						style="margin-bottom: 5px; margin-top: 5px;" tabindex="3" onclick="saveLanguage()">Agregar</button>
				<button type="button" class="btn btn-manx-form fill-space" onclick="cerrarForma('form-add-language')" tabindex="4">
					Cancelar
				</button>
		
		</div>
	</div>

</div>