<div id="modal-dialog-language-remove" class="modal fade" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">

      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="modal-language-remove-title">¿Desactivar el siguiente lenguaje?</h4>
      </div>

      <div class="modal-body" style="text-align: center;">
        <input type="hidden" id="app-lang-remove-id" class="form-control" hidden>
        <p>El siguiente lenguaje sera desactivado y no podra ser recuperado: </p>
        <p id="modal-language-remove-language">Mensaje temporal</p>
      </div>

      <!-- Botones -->
      <div class="modal-footer">
        <button type="button" class="btn btn-manx" onclick="deleteLanguage()">Desactivar</button>
      </div>

    </div>

  </div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
</div><!-- /.modal -->
