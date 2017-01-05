<div id="div-languages" class="div-section tab-pane fade">
	<div class="row additional-fulltable">

		<!-- Plataformas -->
		<div class="col-lg-6" style="height: 100%;">

			<!-- Renglon de busqueda -->
			<div class="row" style="margin-bottom: 5px;">
				<div class="col-md-4">
					<button type="button" class="btn btn-manx-nomargin" data-toggle="modal"
					data-target="#modal-dialog-platform" onclick="newPlatform()" style="width: 100%;">
						Nueva Plataforma
					</button>
				</div>
				<div class="col-md-8">
					<input type="text" id="platform-search-text" maxlength="30"
					class="form-control additional-searchInputs"/>
				</div>
			</div>
			<!-- Fin de renglon de busqueda -->

			<!-- Renglon con la tabla -->
			<div class="row" style="height: 350px;">
				<div class="col-md-12" style="height: inherit;">
					<div class="panel panel-default" style="height: inherit;">
						<div class="panel panel-heading" style="margin-bottom: 0;">
							Plataformas
						</div>
						<div class="panel-body additional-panel-body">
							<table  id="languages_table" class="table table-striped additional-tables">
								<thead class="additional-headtable">
									<tr style="display: block;">
										<th class="additional-headtable-cell-2">
											Nombre
										</th>
										<th class="additional-headtable-cell"/>
										<th class="additional-headtable-cell"/>
										<th class="additional-headtable-cell"/>
									</tr>
								</thead>
								<tbody id="platforms_table_tbody" class="additional-tablebody">
								</tbody>
							</table>
						</div>
						<div class="panel-footer">
							<p id="dummy-txt">Ultima modificación:</p><p id="platform-lastedit">-</p>
						</div>
					</div>
				</div>
			</div>
			<!-- Fin de renglon con la tabla -->

		</div>
		<!-- Fin de plataformas -->

		<!-- Lenguajes -->
		<div class="col-lg-6" style="height: 100%;">

			<!-- Busqueda -->
			<div class="row" style="margin-bottom: 5px;">
				<div class="col-md-4">
					<button type="button" class="btn btn-manx-nomargin" data-toggle="modal"
					style="width: 100%;" data-target="#modal-dialog-language"
					onclick="newLanguage()">Nuevo Lenguaje</button>
				</div>
				<div class="col-md-4" style="padding-right: 0;">
					<input type="text" id="language-search-text" maxlength="30"
					style="border-radius: 5px 0 0 5px;"
					class="form-control noradius-right additional-searchInputs"/>
				</div>
				<div class="col-md-3" style="padding: 0;">
					<select class="form-control fill-space noradius additional-searchInputs"
					style="border-radius: 0;" id="language-search-type">
						<option value="0">Lenguaje</option>
						<option value="1">Abreviación</option>
					</select>
				</div>
				<div class="col-md-1" style="padding: 0;">
					<button type="button" id="language-search-button" style="border-radius: 0 5px 5px 0;"
					class="btn nopadding btn-manx-nomargin additional-searchInputs">
						<img src="res/imgs/search.png" width="25px" height="25px" />
					</button>
				</div>
			</div>
			<!-- Fin de Busqueda -->

			<!-- Tabla-->
			<div class="panel panel-default">
				<div class="panel panel-heading" style="margin-bottom: 0;">
					Lenguajes
				</div>

				<div class="panel-body additional-panel-body">
					<table  id="languages_table" class="table table-striped additional-tables">
						<thead class="additional-headtable">
							<tr style="display: block;">
								<th class="additional-headtable-cell-2">
									Idioma
								</th>
								<th class="additional-headtable-cell-2">
									Abreviación
								</th>
								<th class="additional-headtable-cell"/>
								<th class="additional-headtable-cell"/>
							</tr>
						</thead>
						<tbody id="languages_table_tbody" class="additional-tablebody">
						</tbody>
					</table>
				</div>

				<div class="panel-footer">
					<p id="dummy-txt">Ultima modificación:</p><p id="language-lastedit">-</p>
				</div>
			</div>
			<!-- Fin de tabla -->
		</div>
		<!-- Fin de Lenguajes -->

	</div>
</div>
