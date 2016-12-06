/**
 * Creada por Albertoha94 el 1/Nov/16.
 * Cambios:
 * 01/Nov/16.	-Agregados metodos:
 				 			 *nuevaNoticia
 				 	 		 *nuevaApp
 				 			 *newLanguage
 * 02/Nov/16.	-Actualizado nuevaApp para mostrar la forma.
 							-Agregado metodo cerrarForma.
 							-Agergada funcion document.ready para la app.
 * 08/Nov/15.	-Agregado metodo saveLanguage.
 							-Agregado metodo saveApp.
 							-Actualizado metodo newLanguage.
 * 11/Nov/16.	-Actualizado metodo nuevaApp para actualizarse acorde a los idiomas que se tengan.
 * 05/Dic/16.	-Agregada una porcion de codigo en la seccion inicial para definir que hacer al presionar una pestaña.
 							-Movido metodo loadLanguagesTable.
							-Movido metodo newLanguage.
							-Movido metodo saveLanguage.
 */

/**
 *	Codigo ejecutado al inicio de la app.
 */
$(document).ready(function () {
	console.log("document ready Comenzado.");

	//-- Escondemos los dialogos.
	$('#form-add-app').hide();
	$('#form-add-language').hide();

	//-- Preparamos los clics the las tabs.
	$('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {

 	 //-- Sacamos el atributo de la pestaña para saber cual es.
 	 var target = $(e.target).attr("href");
	 console.log("Escrito en target: ", target);
	 switch (target) {
		 case "#div-apps":
		 break;
		 case "#div-log":
		 break;
		 case "#div-languages":
		 loadLanguagesTable();
		 break;
		 default:
		 alert("Error en pestañas.");
		 break;
	 }
  });
} );

//-- Boton dentro de la forma: Agregar App. --//
/**
 *	Ejecuta un ajax que guarda la app en la base de datos.
 */
function saveApp() {

	//-- Get the values.
	var name = $("#app-name").val();
	var language = $("#app-language").val();

	console.log("Valodr de nombre: ", name);
	console.log("Valor de language: ", language);

	//-- Checa si esta todo correcto.
	if(name == "" || language == -1) {

		//-- Mostrar error.
		console.log("No se agrego la app, falta info.");
		$("#alert-error-addapp").show();

	}
	else {

		//-- Adding the app.
		$.ajax( {
			url: "inserts/insert_app.php",
			data: {
				'name_app': name,
				'deflang': language
			},
			success: function (result) {
				console.log(result);
				console.log("Aplicación agregada.");
				cerrarForma("form-add-app");
			}
		} );
	}
}

//-- Botones dentro de la forma: Formas en general. --//
/**
 * Esconde la forma que se tiene
 */
function cerrarForma(oId) {
	var id = "#" + oId;
	$(id).fadeOut(300);
}

//-- Metodos para los botones de la parte superior.

/**
 * Muestra la ventana de nuevaNoticia.
 */
function nuevaNoticia() {
	console.log("nuevaNoticia -----> Comenzado.");
}

/**
 * Muestra la ventana de nuevaApp.
 */
function nuevaApp() {
	console.log("nuevaApp -----> Comenzado.");

	//-- Limpiar la forma.
	$("#app-name").val("");
	$("#alert-error-addapp").hide();
	$.ajax( {
		url: "selects/select_languages_addapp.php",
		success: function (oResult) {
			console.log("Lista llenada.");

			//-- Llena la lista.
			$("#app-language").empty().append(oResult);
		}
	} );
	$('#form-add-app').fadeIn(300);
}
