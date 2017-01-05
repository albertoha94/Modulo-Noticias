<div id="div-apps" class="div-section tab-pane fade">
	<div class="row" style="margin-top: 15px;">
		<div class="col-lg-3">
			<button type="button" class="btn btn-manx" data-toggle="modal"
							style="width: 100%; margin: 0px; margin-bottom: 3px;"
							data-target="#modal-dialog-add-app" onclick="newApp()">
							Nueva Aplicación
			</button>
			<div class="list-group" id="apps-list"
					 style="height: 100%; padding-top: 2px; font-size: 16px; max-height: 380px;">
			</div>
		</div>
		<div class="col-lg-9">
			<?php
			include 'forms/app-edit.php';
			?>
		</div>
	</div>
</div>
