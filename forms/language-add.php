<div id="modal-dialog-language" class="modal fade" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">

      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="modal-language-title">Agregar lengua</h4>
      </div>

        <div class="modal-body">

          <!-- Error -->
          <div class="alert alert-danger fade in" id="alert-error-addlanguage" style="text-align: center;">
      				<strong>ERROR</strong>
      				<br>
      				Es necesario completar los campos para continuar.
    			</div>

          <!-- Forma -->
          <input type="hidden" id="app-lang-id" class="form-control" hidden>
          <p>Título del idioma</p>
          <input type="input" id="app-lang-name" class="form-control" maxlength="20" required="required">
          <p>Abreviación</p>
          <input type="input" id="app-lang-abv" class="form-control" maxlength="2"
          style="text-transform: uppercase;" required="required">
        </div>

        <!-- Botones -->
        <div class="modal-footer">
          <button type="button" id="app-form-lang-actionbutton" class="btn btn-manx" onclick="saveLanguage()">Guardar</button>
        </div>

      </div>

    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
