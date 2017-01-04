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
   //loadLogs()

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
         //-- Limpia la tabla.
         $("#log_table").empty();
         var row = "";

         if(oResult == null){
            console.log("res_array es null");
            row = "<thead>\
                   </thead>\
                   <tbody>\
                    <tr>\
                      <tc>\
                        Sin datos que mostrar\
                      </tc>\
                    </tr>\
                   </tbody>";
         } else {

         }
      var res_array = JSON.parse(oResult);


        console.log("res_array noes null");
        /*row = "\
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
         </tr>";*/
      }
			$("#log_table").append(row);
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
