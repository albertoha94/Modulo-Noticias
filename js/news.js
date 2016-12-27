/**
 * Contiene todo el codigo para propositos generales de la app.
 * Creada por Albertoha94 el 1/Nov/16.
 */

/**
 *	Codigo ejecutado al inicio de la app.
 */
$(document).ready(function () {
	//console.log("document ready Comenzado.");

  //-- Mostramos los logs.
  loadLogs()

	//-- Preparamos los clics the las tabs.
	$('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {

 	 //-- Sacamos el atributo de la pestaña para saber cual es.
 	 var target = $(e.target).attr("href");
	 console.log("Escrito en target: ", target);
	 switch (target) {
		 case "#div-apps":
		 	loadAppsList()
		 break
		 case "#div-log":
		 	loadLogs()
		 break
		 case "#div-languages":
		 	loadLanguagesTable()
		 break
		 default:
		 break;
		 alert("Error en pestañas.");
	 }
  });
});

/**
 *	Loads all the logs in the app and adds them into a table.
 */
function loadLogs() {
	//-- Llamar el proceso.
	$.ajax( {
		url: "ws/rows/get_rowlogs.php",
		success: function (oResult) {
			$("#log_table").empty();
			$("#log_table").append(oResult);
		}
	} )
}

//-- Metodos para los botones de la parte superior.
/**
 * Muestra la ventana de nuevaNoticia.
 */
function nuevaNoticia() {
  console.log('nuevaNoticia -----> Comenzado.')
}
