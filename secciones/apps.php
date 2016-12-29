<div id="div-apps" class="div-section tab-pane fade">
	<table style="width: 100%; height: 100%; margin-top: 15px;">
		<tr style="width: 100%; height: 100%;">
			<td style="width: 25%; padding: 5px; padding-top: 25px;">
				<button type="button" class="btn btn-manx" data-toggle="modal"
								style="width: 91%; margin: 15px; margin-bottom: 3px; margin-right: 0;"
								data-target="#modal-dialog-add-app" onclick="newApp()">Nueva Aplicación</button>
				<div class="list-group" id="apps-list"
						 style="height: 100%; padding: 5px;  padding-top: 2px; font-size: 16px;">
				</div>
			</td>
			<td style="width: 75%; vertical-align: text-top;">
				<div class="panel panel-default">
					<div class="panel-body">
						<?php
						include 'forms/app-edit.php';
						?>
					</div>
				</div>
			</td>
		</tr>
	</table>
</div>
