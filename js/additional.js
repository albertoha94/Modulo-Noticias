/**
 * Contiene todo lo relacionado con los lenguajes y las plataformas dentro de la app.
 * Creada por Albertoha94 el 05/Dic/16.
 */

//-- Lenguajes -----------------------------------------------------------------
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

   //console.log("Valor de lang: ", lang);
   //console.log("Valor de abv: ", abv);

   //-- Si alguno esta vacio, no guardes.
   if(lang == "" || abv == "") {
     //console.log("Campos vacios.");
     $("#alert-error-addlanguage").show();
   }
   else {
     //console.log("Todo correcto, guardando.");

     //-- Obteniendo id.
     var currentid = $("#app-lang-id").val();
     if(currentid == "") {

       //-- Agregando nuevo lenguaje.
       $.ajax( {
         url: "ws/inserts/insert_language.php",
         data: {
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
       $("#languages_table_tbody").empty();
       var myhtml = [];
       var info = JSON.parse(oResult);
       //console.log(info);

       //-- Ciclo para crear la tabla.
       $.each(info, function (oIndex, oValue) {

          //-- Si se deben deshabilitan botones.
          var dehab = "";
          if(oValue["manejable"] == 0) {
             dehab = "disabled";
             //console.log("Bloqueado en index ", oIndex);
          }

          //-- Crea un renglon.
          var row = "\
 				<tr style=\"display: block;\">\
 					<td class=\"additional-headtable-cell-2\">\
 						<p>\
 							" + oValue["titulo"] + "\
 						</p>\
 					</td>\
 					<td class=\"additional-headtable-cell-2\">\
 						<p>\
 							" + oValue["abreviacion"] + "\
 						</p>\
 					</td>\
 					<td class=\"additional-headtable-cell\">\
 							<button type='button' class='btn btn-primary' style='width: 100%;' data-toggle='modal'\
 											data-target='#modal-dialog-language'\
 											onclick='editLanguage(" + oValue["id_idioma"] + ")' " + dehab + "><b>Editar</b></button>\
 					</td>\
 					<td class=\"additional-headtable-cell\">\
 							<button type='button' class='btn btn-danger' style='width: 100%;' data-toggle='modal'\
 											data-target='#modal-dialog-language-remove'\
 											onclick=\"deleteLanguagePrompt(" + oValue["id_idioma"] + ", '" + oValue["titulo"] + "', '" + oValue["abreviacion"] + "')\" " + dehab + ">\
 											<b>Desactivar</b>\
 							</button>\
 					</td>\
 				</tr>";
          if(oValue["manejable"] == 0) {
             //console.log("Haciendo unshift");
             myhtml.unshift(row);
          } else {
             //console.log("Haciendo push");
             myhtml.push(row);
          }
          /*console.log("Index actual", oIndex);
          console.log(oValue["id_idioma"]);
          console.log(oValue["titulo"]);
          console.log(oValue["abreviacion"]);
          console.log(oValue["manejable"]);*/

       } );
       //console.log(myhtml);
       $("#languages_table_tbody").append(myhtml);
       checkLastEditLanguage();
     }
   } );
 }

/**
 * Obtiene la fecha mas reciente de idiomas y la muestra.
 */
 function checkLastEditLanguage() {
    $.ajax( {
     url: "ws/get_lastedit/get_le_languages.php",
     success: function (oResult) {
        //console.log("Ultima edicion: ", oResult);
        $("#language-lastedit").text("");
        $("#language-lastedit").text(oResult);
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
     url: "ws/get/get_language.php",
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

   // TODO: FALTA HACER QUE LAS NOTICIAS CON ESTE LENGUAJE DENTRO DE CADA APP SEA DADA DE BAJA.
   // TODO: SI EL LENGUAJE ES DEFAULT DE ALGUNA APP, CAMBIAR LA APP A INGLES COMO DEFAULT.

   //-- Eliminando lenguaje.
   $.ajax( {
     url: "ws/delete/delete_language.php",
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

//-- Plataformas ---------------------------------------------------------------

/**
 *	Carga todas las plataformas disponibles y los muestra en una tabla.
 */
function loadPlatformsTable() {

  //-- Llamar el proceso.
  $.ajax( {
    url: "ws/rows/get_rowplatforms.php",
    success: function (oResult) {
      $("#platforms_table_tbody").empty();
      var myhtml = [];
      var info = JSON.parse(oResult);
      //console.log(info);

      //-- Ciclo para crear la tabla.
      $.each(info, function (oIndex, oValue) {

         //-- Si se deben deshabilitan botones.
         var dehab = "";
         if(oValue["manejable"] == 0) {
           dehab = "disabled";
           //console.log("Bloqueado en index ", oIndex);
         }

         //-- Crea un renglon.
         var row = "\
           <tr style=\"display: block;\">\
              <td class=\"additional-headtable-cell-2\">\
                 <p>\
                    " + oValue["titulo"] + "\
                 </p>\
              </td>\
              <td class=\"additional-headtable-cell-2\">\
                 <p>\
                    " + oValue["icono"] + "\
                 </p>\
              </td>\
              <td class=\"additional-headtable-cell\">\
                    <button type='button' class='btn btn-primary' style='width: 100%;' data-toggle='modal'\
                                data-target='#modal-dialog-language'\
                                onclick='editLanguage(" + oValue["id_plataforma"] + ")' " + dehab + "><b>Editar</b></button>\
              </td>\
              <td class=\"additional-headtable-cell\">\
                    <button type='button' class='btn btn-danger' style='width: 100%;' data-toggle='modal'\
                                data-target='#modal-dialog-language-remove'\
                                onclick=\"deleteLanguagePrompt(" + oValue["id_plataforma"] + ", '" + oValue["titulo"] + "', '" + oValue["icono"] + "')\" " + dehab + ">\
                                <b>Desactivar</b>\
                    </button>\
              </td>\
           </tr>";
         if(oValue["manejable"] == 0) {
           //console.log("Haciendo unshift");
           myhtml.unshift(row);
         } else {
           //console.log("Haciendo push");
           myhtml.push(row);
         }
         /*console.log("Index actual", oIndex);
         console.log(oValue["id_idioma"]);
         console.log(oValue["titulo"]);
         console.log(oValue["abreviacion"]);
         console.log(oValue["manejable"]);*/

      } );
      //console.log(myhtml);
      $("#platforms_table_tbody").append(myhtml);
      checkLastEditPlatform();
    }
  } );
}

/**
 * Obtiene y muestra la fecha del ultimo cmabio hecho.
 */
 function checkLastEditPlatform() {
    $.ajax( {
     url: "ws/get_lastedit/get_le_platform.php",
     success: function (oResult) {
        //console.log("Ultima edicion: ", oResult);
        $("#platform-lastedit").text("");
        $("#platform-lastedit").text(oResult);
     }
    } );
 }

 /**
 * Limpia los campos de la forma de plataforma.
 */
 function newPlatform() {

    // TODO: Actualizar variables de este metodo.

   //-- Limpiar los campos.
   $("#app-platform-id").val("");
   $("#app-platform-name").val("");
   $("#app-platform-icontxt").val("");
   $("#alert-error-addplatform").hide();

   //-- Establecer el titulo.
   $("#modal-platform-title").text("Nueva plataforma");
 }

 /**
 *	Ejecuta un ajax que guarda la plataforma en la base de datos.
 */
 function savePlatform(){

    // TODO: ACTUAlIZAR LOS CAMPOS.

   //-- Agrega los valores.
   var lang = $("#app-lang-name").val();
   var abv = $("#app-lang-abv").val().toUpperCase();

   //console.log("Valor de lang: ", lang);
   //console.log("Valor de abv: ", abv);

   //-- Si alguno esta vacio, no guardes.
   if(lang == "" || abv == "") {
     //console.log("Campos vacios.");
     $("#alert-error-addlanguage").show();
   }
   else {
     //console.log("Todo correcto, guardando.");

     //-- Obteniendo id.
     var currentid = $("#app-lang-id").val();
     if(currentid == "") {

       //-- Agregando nuevo lenguaje.
       $.ajax( {
         url: "ws/inserts/insert_language.php",
         data: {
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
 * Llama a la forma para editar una plataforma.
 * @param oId La id usada como referencia.
 */
 function editPlatform(oId) {

    // TODO: Actualizar su editar para usar campos correctos.

   //-- Llamar el proceso.
   $.ajax( {
     url: "ws/get/get_language.php",
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
 *  Prepara el dialogo para eliminar la plataforma.
 */
 function deletePlatformPrompt(oId, oLanguage, oIcon) {
    // TODO: Actualizar para que se muestre diferente a la forma.
   $("#modal-language-remove-language").text(oLanguage + " (" + oIcon + ")");
   $("#app-lang-remove-id").val(oId);
 }

 /**
 * Elimina una plataforma.
 * @param oId La id usada como referencia.
 */
 function deleteLanguage(oId) {
   var currentid = $("#app-lang-remove-id").val();

   // TODO: FALTA QUE LAS APPS (Y SUS NOTICIAS) CON LA PLATAFORMA SE DEN DE BAJA.
   // TODO: Actualizar todos los campos para que correspondan al modal.
   //-- Eliminando lenguaje.
   $.ajax( {
     url: "ws/delete/delete_language.php",
     data: {
       'language_id': currentid,
     },
     success: function (oResult) {
       console.log(oResult);
       loadPlatformsTable();
       $('#modal-dialog-language-remove').modal('toggle');
     }
   } );
 }
