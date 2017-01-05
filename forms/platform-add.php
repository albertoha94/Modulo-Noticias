<div id="modal-dialog-platform" class="modal fade" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">

      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="modal-platform-title">Agregar lengua</h4>
      </div>

        <div class="modal-body">

          <!-- Error -->
          <div class="alert alert-danger fade in" id="alert-error-addplatform" style="text-align: center;">
      				<strong>ERROR</strong>
      				<br>
      				Es necesario agregar un titulo y una imagen con dimension igual o menor a 64 pixeles.
    			</div>

          <!-- Forma -->
          <input type="hidden" id="app-platform-id" class="form-control" hidden>
          <p>Título de la plataforma</p>
          <input type="input" id="app-platform-name" class="form-control" maxlength="20" required="required">
          <p>Icono</p>
          <div class="row">
            <div class="col-sm-8">
              <input type="input" id="app-platform-icontxt" class="form-control" maxlength="2" disabled>
              <input type="file" id="app-platform-iconadd" class="btn btn-default"
              style="margin-top: 5px; width: 100%;" value="Cargar imagen" accept="image/*"/>
              <h6 style="margin-top: 5px; margin-bottom: 0;">(Tamaño maximo 64x64)</h6>
            </div>
            <div class="col-sm-4">
              <img src="" alt="icon" id="app-platform-iconimg"/>
            </div>
          </div>
        </div>

        <!-- Botones -->
        <div class="modal-footer">
          <button type="button" id="app-form-lang-actionbutton" class="btn btn-manx" onclick="savePlatform()">Guardar</button>
        </div>

      </div>

    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
