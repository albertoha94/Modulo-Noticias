/**
 * Creada por Albertoha94 el 1/Nov/16.
 * Cambios:
 * 1/Nov/16.	-Agregados metodos:
 				 *nuevaNoticia
 				 *nuevaApp
 				 *nuevaIdioma

 * 2/Nov/16.	-Actualizado nuevaApp para mostrar la forma.
 				-Agregado metodo cerrarForma.
 				-Agergada funcion document.ready para la app.
 */

//-- Inicio de la app.
$(document).ready(function () {
	console.log("document ready Comenzado.");
	//-- Escondemos los dialogos.
	$('#form-add-app').hide();
	$('#form-add-language').hide();
} );

//-- Botones dentro de la forma.

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
	//-- FALTA QUE SE INICIEN LIMPIEN LOS CAMPOS AL ABRIR.
	$('#form-add-app').fadeIn(300);
}