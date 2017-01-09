<div id="modal-dialog-add-news" class="modal fade" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">

      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="modal-app-title">Agregar noticia</h4>
      </div>

        <div class="modal-body">

          <!-- Error -->
          <div class="alert alert-danger fade in" id="alert-error-addApp" style="text-align: center;">
      				<strong>ERROR</strong>
      				<br>
      				Es necesario de rellenar TODOS los campos.
    			</div>

          <!-- Forma -->
					<p>Nombre de la aplicación</p>
					<input type="input" id="app-name" class="form-control" maxlength="30" tabindex="1">
					<p>Lenguaje defecto</p>
					<select class="form-control fill-space" id="app-language" tabindex="2">
					</select>
        </div>

        <!-- Botones -->
        <div class="modal-footer">
          <button type="button" id="app-form-lang-actionbutton" class="btn btn-manx" onclick="saveApp()">Crear aplicación</button>
        </div>
      </div>

    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
