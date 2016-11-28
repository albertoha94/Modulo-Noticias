/**
 * Creada por Albertoha94 el 1/Nov/16.
 * Cambios:
 * 01/Nov/16.	-Agregados metodos:
 				 *nuevaNoticia
 				 *nuevaApp
 				 *nuevaIdioma

 * 02/Nov/16.	-Actualizado nuevaApp para mostrar la forma.
 				-Agregado metodo cerrarForma.
 				-Agergada funcion document.ready para la app.
 * 08/Nov/15.	-Agregado metodo saveLanguage.
 				-Agregado metodo saveApp.
 				-Actualizado metodo nuevaIdioma.
 * 11/Nov/16.	-Actualizado metodo nuevaApp para actualizarse acorde a los idiomas que se tengan.
 */

//-- Inicio de la app.
$(document).ready(function () {
	console.log("document ready Comenzado.");

	//-- Escondemos los dialogos.
	$('#form-add-app').hide();
	$('#form-add-language').hide();
} );

//-- Evento de una pestaña presionada.
$(document).ready(function() {
    $('#tabs_main').tabs( {
        select: function(event, ui) {
            var tabNumber = ui.index;
            var tabName = $(ui.tab).text();
            
            console.log('Tab number ' + tabNumber + ' - ' + tabName + ' - clicked');
        }
    } );
} );

/**
 *	Carga todos los lenguajes disponibles y los muestra en una tabla.
 */
function loadLanguagesTable() {

	//-- Call the process.
	$.ajax( {
		url: "ws/rows/get_rowlanguages.php",
		success: function (oResult) {
			//console.log(oResult);
			//cerrarForma("form-add-language");
			$("#div-languages").append(oResult);
		}
	} );
}

//-- Boton dentro de la forma: Agregar Idioma. --//
/**
 *	Ejecuta un ajax que guarda el idioma en la base de datos.
 */
function saveLanguage(){

  	//-- Agrega los valores.
  	var lang = $("#app-lang-name").val();
  	var abv = $("#app-lang-abv").val().toUpperCase();

  	console.log("Valor de lang: ", lang);
  	console.log("Valor de abv: ", abv);

  	//-- Si alguno esta vacio, no guardes.
  	if(lang == "" || abv == "") {
  		console.log("Campos vacios.");
  		$("#alert-error-addl").show();
  	}
  	else {
  		console.log("Todo correcto, guardando.");

		//-- Agregando el lenguaje.
		$.ajax( {
				url: "inserts/insert_language.php",
				data: {
					'language': lang,
					'language_abv': abv
				},
				success: function (oResult) {
					console.log(oResult);
					cerrarForma("form-add-language");
				}
		} );
	}
}

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
 * Muestra la ventana de AgregarIdioma.
 */
function nuevaIdioma() {
	console.log("nuevoIdioma -----> Comenzado.");
	$("#app-lang-name").val("");
  	$("#app-lang-abv").val("");
  	$("#alert-error-addl").hide();
	$('#form-add-language').fadeIn(300);
}

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