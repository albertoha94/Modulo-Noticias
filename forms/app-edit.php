<div id="form-app">
  <div id="form-app-info">
    <div class="row">

      <!-- Icono e imagen -->
      <div class="col-md-2" style="height: 162px; width: 120px;">
        <div class="row">
          <img src="" alt="Icono de la app" id="app_edit_iconedit" width="110px" height="110px"
          style="margin-left: 5px;">
        </div>
        <div class="row">
          <input type="button" class="btn btn-manx" value="Cambiar" style="width: 110px;"/>
        </div>
      </div>

      <!-- Panel de informacion -->
      <div class="col-md-8">
              <div class="row">
                <div class="col-md-1">
                  <img id="form-app-info-platform" width="32px" height="32px"/>
                </div>
                <div class="col-md-9">
                  <p id="form-app-info-title">Titulo de la app</p>
                </div>
              </div>
              <p id="form-app-info-language">Lenguaje defecto</p>
              <p id="form-app-info-totalnews">Total noticias: 5</p>
              <div class="row">
                <div class="col-lg-1">
                  <img src="" alt="icono global" width="32px;" height="32px;" />
                </div>
                <div class="col-lg-1">
                  <p id="form-app-info-global-news">2</p>
                </div>
                <div class="col-lg-1">
                  /
                </div>
                <div class="col-lg-1">
                  <p id="form-app-info-local-news">2</p>
                </div>
                <div class="col-lg-1">
                  <img src="" alt="icono local" width="32px;" height="32px;" id="form-app-info-local-icon" />
                </div>
              </div>
      </div>

      <!-- Acciones -->
      <div class="col-md-2">
        <input class="btn btn-manx" style="width:100%;" type="button" value="Publicar"/>
        <input class="btn btn-manx" style="width:100%;" type="button" value="Editar"/>
        <input class="btn btn-danger" style="width:100%; margin:5px; font-size:16px; padding:10px;" type="button" value="Desactivar"/>
      </div>
    </div>
    <hr>
    <div class="row">
      <div class="col-lg-2">
        <button type="button" class="btn btn-manx" onclick="nuevaNoticia()"
        data-toggle="modal" data-target="#modal-dialog-add-news">
          Nueva Noticia
        </button>
      </div>
      <div class="col-lg-10">
      </div>
    </div>
    <div class="row" id="app-edit-news-row">
      <table class="table table-striped" id="app-news-table">
      </table>
    </div>
  </div>
</div>
