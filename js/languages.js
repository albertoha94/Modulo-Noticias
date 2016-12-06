/**
 * Contiene todo lo relacionado con los lenguajes dentro de la app.
 * Creada por Albertoha94 el 05/Dic/16.
 * Cambios:
 * 05/Dic/16. -Agregado metodo loadLanguagesTable.
 *            -Agregado metodo newLanguage.
 *            -Agregado metodo editLanguage.
 *            -Agregado metodo deleteLanguage.
 *            -Agregado metodo saveLanguage.
 */

 /**
 * Limpia los campos de la forma de lenguajes.
 */
 function newLanguage() {
   console.log("nuevoIdioma -----> Mostrando forma...");

   //-- Limpiar los campos.
   $("#app-lang-id").val("");
   $("#app-lang-name").val("");
   $("#app-lang-abv").val("");
   $("#alert-error-addlanguage").hide();

   //-- Establecer el titulo.
   $("#modal-language-title").text("Nueva lengua");
 }

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
     $("#alert-error-addlanguage").show();
   }
   else {
     console.log("Todo correcto, guardando.");

     //-- Obteniendo id.
     var currentid = $("#app-lang-id").val();
     if(currentid == "") {

       //-- Agregando nuevo lenguaje.
       $.ajax( {
         url: "inserts/insert_language.php",
         data: {
           'language': lang,
           'language_abv': abv
         },
         success: function (oResult) {
           console.log(oResult);
           $('#modal-dialog-language').modal('toggle');
         }
       } );
     }
     else {
       //-- Actualizando lenguaje.
       $.ajax( {
         url: "ws/update/update_language.php",
         data: {
           'language_id': currentid,
           'language': lang,
           'language_abv': abv
         },
         success: function (oResult) {
           console.log(oResult);
           loadLanguagesTable();
           $('#modal-dialog-language').modal('toggle');
         }
       } );
     }
   }
 }

 /**
 *	Carga todos los lenguajes disponibles y los muestra en una tabla.
 */
 function loadLanguagesTable() {

   //-- Llamar el proceso.
   $.ajax( {
     url: "ws/rows/get_rowlanguages.php",
     success: function (oResult) {
       $("#languages_table").empty();
       $("#languages_table").append(oResult);
     }
   } );
 }

 /**
 * Llama a la forma para editar un lenguaje.
 * @param oId La id usada como referencia.
 */
 function editLanguage(oId) {

   //-- Llamar el proceso.
   $.ajax( {
     url: "ws/edit/get_language.php",
     data: {
       "LaguageId" : oId
     },
     success: function (oResult) {
       //console.log(oResult);
       var res = JSON.parse(oResult);

       //-- Llenar los campos.
       $("#app-lang-id").val(res["id"]);
       $("#app-lang-name").val(res["titulo"]);
       $("#app-lang-abv").val(res["abreviacion"]);
       $("#alert-error-addlanguage").hide();

       //-- Establecer el titulo.
       $("#modal-language-title").text("Editar lengua: " + res["titulo"]);
     }
   } );
 }

 /**
 *  Prepara el dialogo para eliminar el idioma.
 */
 function deleteLanguagePrompt(oId, oLanguage, oAbv) {
   $("#modal-language-remove-language").text(oLanguage + " (" + oAbv + ")");
   $("#app-lang-remove-id").val(oId);
 }

 /**
 * Llama a la forma para eliminar un lenguaje.
 * @param oId La id usada como referencia.
 */
 function deleteLanguage(oId) {
   var currentid = $("#app-lang-remove-id").val();

   //-- Eliminando lenguaje.
   $.ajax( {
     url: "ws/update/delete_language.php",
     data: {
       'language_id': currentid,
     },
     success: function (oResult) {
       console.log(oResult);
       loadLanguagesTable();
       $('#modal-dialog-language-remove').modal('toggle');
     }
   } );
 }
