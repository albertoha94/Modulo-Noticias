<div id="div-languages" class="div-section tab-pane fade">
	<table class="additional-fulltable">
		<tr>
		  <td style="width: 600px; margin-right: 20px;">

				<!-- Renglon de busqueda -->
				<table class="btn-marginbottom" style="width:450px;">
					<tr>
						<td style="height: 45px; width: 100px;">
							<button type="button" class="btn btn-manx-nomargin" data-toggle="modal"
							data-target="#modal-dialog-platform" onclick="newPlatform()">Nueva Plataforma</button>
						</td>
						<td style="width: 200px;">
							<input type="text" id="platform-search-text" class="form-control noradius-right height45px"
							style="margin-left: 10px;" maxlength="30"/>
						</td>
						<td>
							<button type="button" style="width: 45px; height: 45px;"
							class="btn nopadding btn-manx-nomargin noradius-left"
							id="platform-search-button">
								<img src="res/imgs/search.png" width="25px" height="25px" />
							</button>
						</td>
					</tr>
				</table>

				<!-- Tabla -->
				<div class="panel panel-default" style="height: 425px; width: 400px;">
					<div class="panel panel-heading" style="margin-bottom: 0;">
						Plataformas
					</div>
					<div class="panel-body nopadding" style="height: 335px;">
						<table  id="languages_table" class="table table-striped"
						style="height: 235px;">
						<thead class="additional-tablehead">
							<tr>
								<th style='width: 200px;'>
									Plataforma
								</th>
								<th style='width: 200px;'/>
								<th style='width: 200px'/>
								<th style='width: 200px'/>
							</tr>
						</thead>
							<tbody id="platforms_table_tbody"
							style="overflow-y: scroll; overflow-x: hidden; max-height: 295px; display: block; width:800px;">
							</tbody>
						</table>
					</div>

					<div class="panel-footer">
						<p id="dummy-txt">Ultima modificación:</p><p id="platform-lastedit">-</p>
					</div>
				</div>
				<table  id="platform_table" class="table table-striped">
				</table>
			</td>
			<td style="max-width: 600px;">

				<!-- Renglon de busqueda -->
				<table class="width100 btn-marginbottom">
					<tr class="width100">
						<td class="width30 height100">
							<button type="button" class="btn btn-manx-nomargin" data-toggle="modal"
							data-target="#modal-dialog-language" onclick="newLanguage()">Nuevo Lenguaje</button>
						</td>
						<td class="width40 height100">
							<input type="text" id="language-search-text" class="form-control noradius-right height45px"
							maxlength="30"/>
						</td>
						<td class="width25 height100">
							<select class="form-control fill-space noradius height45px" id="language-search-type">
								<option value="0">Lenguaje</option>
								<option value="1">Abreviación</option>
							</select>
						</td>
						<td class="height100">
							<button type="button" class="btn nopadding btn-manx-nomargin noradius-left height45px"
							id="language-search-button">
								<img src="res/imgs/search.png" width="25px" height="25px" />
							</button>
						</td>
					</tr>
				</table>

				<!-- Tabla -->
				<div class="panel panel-default" style="height: 425px; width: 450px;">
					<div class="panel panel-heading" style="margin-bottom: 0;">
						Lenguajes
					</div>
					<div class="panel-body nopadding" style="height: 335px;">
						<table  id="languages_table" class="table table-striped"
						style="height: 235px;">
						<thead class="additional-tablehead">
							<tr>
								<th style='width: 200px;'>
									Idioma
								</th>
								<th style='width: 200px;'>
									Abreviación
								</th>
									<th style='width: 200px'/>
									<th style='width: 200px'/>
								</tr>
							</thead>
							<tbody id="languages_table_tbody"
							style="overflow-y: scroll; overflow-x: hidden; max-height: 295px; display: block; width:800px;">
							</tbody>
						</table>
					</div>

					<div class="panel-footer">
						<p id="dummy-txt">Ultima modificación:</p><p id="language-lastedit">-</p>
					</div>
				</div>
			</td>
		</tr>
	</table>
</div>
