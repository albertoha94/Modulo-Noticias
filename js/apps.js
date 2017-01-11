/**
 * Contiene todo lo relacionado con la creación y modificación de las apps y noticias.
 * Creada por Albertoha94 el 19/Dic/16.
 */

 /**
  * Acciones al hacer clic en uno de los items de la lista.
  * Actualiza la toda la div de apps con la seleccionada.
  */
/*$(document).ready(function () {
  console.log('ready listselect');

  $(document).on('click', '.list-group', function(e){
    alert("success");
    /*var $this = $(this);
    var $alias = $this.data('alias');

    $('.active').removeClass('active');
    $this.toggleClass('active')
  });
})*/

/**
 *  Limpia la forma para agregar apps.
 */
 function newApp() {
   console.log("nuevaApp -----> Mostrando forma...");

   //-- Limpiar los campos.
   $("#app-name").val("");
   $("#alert-error-addApp").hide();

   //-- Llena la lista.
   $.ajax( {
     url: "selects/select_languages_addapp.php",
     success: function (oResult) {
       console.log("Lista llenada.");

       //-- Llena la lista.
       $("#app-language").empty().append(oResult);
     }
   } );

   //-- Establecer el titulo.
   $("#modal-app-title").text("Nueva Aplicación");
 }

 /**
  *	Ejecuta un ajax que guarda la app en la base de datos.
  */
 function saveApp() {

   //-- Get the values.
   var name = $("#app-name").val();
   var language = $("#app-language").val();

   console.log("Valor de nombre: ", name);
   console.log("Valor de lenguaje default: ", language);

   //-- Checa si esta todo correcto.
   if(name == "" || language == -1) {

     //-- Mostrar error.
     console.log("No se agrego la app, falta info.");
     $("#alert-error-addapp").show();
   }
   else {

     //-- Agregando la app.
     $.ajax( {
       url: "ws/inserts/insert_app.php",
       data: {
         'name_app': name,
         'deflang': language
       },
       success: function (result) {
         console.log(result);
         console.log("Aplicación agregada.");
         var id = result;
         showAppTab(id);
         $('#modal-dialog-add-app').modal('toggle');
       }
     } );
   }
 }

 /**
 *  Muestra una ventana con todo lo referente a la app.
 */
 function showApp(oAppId) {
   //console.log("App a mostrar: ", oAppId);
   $.ajax( {
     url: "ws/get/get_app.php",
     data: {
        'appId' : oAppId
     },
     success: function (oResult) {
       console.log(oResult);
       var answers = JSON.parse(oResult);

       // TODO: FALTA PONER LOS DATOS DE ANSWER EN LA FORMA.

       var defaultLanguage = answers["idioma_default"];
       createTabs(oAppId, defaultLanguage);
     }
  });
 }

 /**
  * Carga todas las apps disponibles en una lista.
  */
 function loadAppsList() {
   $.ajax( {
     url: "ws/rows/get_rowapps.php",
     success: function (oResult) {
       //console.log(oResult);
       $("#apps-list").empty();
       $("#apps-list").append(oResult)
     }
   })
 }

 /**
  *   Crea una seccion de pestañas de acuerdo a los lenguajes que se manejan en
  *   las noticias de la app.
  */
  function createTabs(oAppId, oDefaultLanguage) {
     $.ajax( {
      url: "ws/get/get_newsLanguagesByApp.php",
      data: {
          'appId' : oAppId
      },
      success: function (oResult) {
         //console.log(oResult);
         var parsed = JSON.parse(oResult);
         var answers = [];
         for(var i = 0; i < parsed.length; i++) {
            if(parsed["id_idioma"] == oDefaultLanguage) {
               answers.unshift(parsed[i]);
            } else {
               answers.push(parsed[i]);
            }
         }
         console.log(answers);

         //-- Creando las pestañas.
         $("#app-edit-news-row").empty();

         //-- Inicio de la lista.
         var finalhtml = "";
         var htmlstart = "<ul class=\"nav nav-tabs nav-justified\" id=\"list_app"
         + oAppId + "\">";
         finalhtml += htmlstart;

         var htmltabs = "";
         var htmltabsdiv = "";
         //-- Contenido del div.
         $.each(answers, function (oIndex, oValue) {
            var htmlactive = "";
            if(oIndex == 0) {
               htmlactive = "class=\"active\"";
            }

            //-- Pestaña
            htmltabs += "<li " + htmlactive + "><a onclick=\"showNewsFromLanguage(" +
            oValue["id_idioma"] + ", " + oAppId + ")\" \
            href=\"#news-language-" + oValue["id_idioma"] + "\" data-toggle=\"tab\">" +
            oValue["titulo"] + "</a></li>";

            //-- Su contenido
            htmltabsdiv +=
            "<div id=\"news-language-" + oValue["id_idioma"] + "\" class=\"div-section tab-pane fade\">\
            Seccion con id: news-language-" + oValue["titulo"] + "-" + oValue["id_idioma"] +
               "<table style=\"max-height: 470px;\" id=\"news_table_" + oValue["id_idioma"] + "_" + oAppId + "\"\
               class=\"table table-striped\">\
           	   </table>"
            "</div>";
         });
         finalhtml += htmltabs;
         //--Cierres
         finalhtml += "</ul><div id=\"div_apps_languages_tab_content\" class=\"tab-content\">";
         finalhtml += htmltabsdiv;
         finalhtml += "</div>"

         //-- Agregar todo al div.
         $("#app-edit-news-row").append(finalhtml);

         // TODO: FALTA HACER QUE AL CREAR LAS TABS SE MUESTRE EL CONTENIDO DE LA QUE SE TIENE POR DEFECTO.
      }
   } );
  }


//-- Noticias ------------------------------------------------------------------

/**
 * Obtiene las noticias que se tengan en una aplicacion en cierto lenguaje.
 * @param   oLanguage La id del lenguaje que tiene la noticia.
 * @param   oApp  La id de la app a la  que la noticia pertenece.
 */
 function showNewsFromLanguage(oLanguage, oApp) {
    console.log("Mostrando noticias del lenguaje: " + oLanguage + " con app: " + oApp);

    //-- Comenzamos el ajax.
    $.ajax( {
     url: "ws/get/get_newsOfLanguage.php",
     data: {
         'id_app' : oApp,
         'id_lang': oLanguage
     },
     success: function (oResult) {
        console.log(oResult);

        //-- Ids usadas dentro de la tabla.
        var table_id = "#news_table_" + oLanguage + "_" + oApp;
        var tbody_id = "#news_table_tbody" + oLanguage + "_" + oApp;
        var answers = JSON.parse(oResult);
        var finalhtml = "";
        if(answers.length > 0) {

           //-- Agregando cabecera.
           finalhtml +=
           "<thead>\
               <tr>\
                  <th>\
                     Publicada\
                  </th>\
                  <th>\
                     Global\
                  </th>\
                  <th>\
                     Icono\
                  </th>\
                  <th>\
                     Cabecera\
                  </th>\
                  <th>\
                     Fecha Visible\
                  </th>\
                  <th>\
                  </th>\
                  <th>\
                  </th>\
               </tr>\
           </thead>\
           <tbody id=\"" + tbody_id + "\">"

           //-- Cuerpo de la tabla.
           var bodyhtml = "";
           $.each(answers, function (oIndex, oValue) {
             // TODO: Falta editar el modal usado en botones de editar y eliminar.
             // TODO: Falta asignar metodos correctos en los botones de editar y eliminar.
             bodyhtml +=
               "<tr>\
                  <td>" +
                     oValue["publicada"] +
                  "</td>\
                  <td>" +
                     oValue["global"] +
                  "</td>\
                  <td>" +
                     oValue["icono"] +
                  "</td>\
                  <td>" +
                     oValue["encabezado"] +
                  "</td>\
                  <td>" +
                     oValue["fecha_visible"] +
                  "</td>\
                  <td>\
                     <button type='button' class='btn btn-primary' style='width: 100%;' data-toggle='modal'\
                     data-target='#modal-dialog-language'\
                              onclick='editNew()'><b>Editar</b></button>\
                  </td>\
                  <td>\
                     <button type='button' class='btn btn-danger' style='width: 100%;' data-toggle='modal'\
                     data-target='#modal-dialog-language'\
                              onclick='editNew()'><b>Desactivar</b></button>\
                  </td>\
                </tr>"
           });
           finalhtml += bodyhtml + "</tbody>";
           $(table_id).append(finalhtml);
        } else {
           // TODO: Falta hacer que se muestre una table sin datos.
        }
     }
  } );
 }
