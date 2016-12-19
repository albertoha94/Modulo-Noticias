/**
 * Contiene todo lo relacionado con la creación y modificación de las apps.
 * Creada por Albertoha94 el 19/Dic/16.
 */

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
 function showAppTab(oAppId) {

 }
