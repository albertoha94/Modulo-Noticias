/**
 * Contiene todo el codigo para propositos generales de la app.
 * Creada por Albertoha94 el 1/Nov/16.
 */

/**
 *	Codigo ejecutado al inicio de la app.
 */
 $(document).ready(function () {
   //console.log("document ready Comenzado.");

   //-- Habilitar los tooltips.
   $('[data-toggle="tooltip"]').tooltip();

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
       loadLanguagesTable();
       loadPlatformsTable();
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
         //console.log(oResult);
         //-- Limpia la tabla.
         $("#log_table").empty();
         var row = "";

         if(oResult == "") {

            //-- Crea un renglon vacio.
            //console.log("res_array es null");
            row = "<thead>\
                   </thead>\
                   <tbody>\
                    <tr style=\"display: block;\">\
                      <td class=\"log-cell\" style=\"width: 100%;\">\
                        Sin datos que mostrar\
                      </td>\
                    </tr>\
                   </tbody>";
            $("#log_table").append(row);
         } else {
            var res_array = JSON.parse(oResult);
            //console.log("res_array noes null: ", oResult);
            var head = "\
            <thead class=\"additional-headtable\" style=\"padding-left: 4px;\">\
               <tr style=\"display: block;\">\
                  <th class=\"log-cell\">\
                     Tipo de acción\
                  </th>\
                  <th class=\"log-cell\">\
                     Descripción\
                  </th>\
                  <th class=\"log-cell\">\
                     Fecha realizada\
                  </th>\
               </tr>\
            </thead>\
            <tbody id=\"log_tbody\" class=\"log-tablebody\">";
            $("#log_table").append(head);

            //-- Para cada item.
            $.each(res_array, function(oIndex, oValue) {
               //console.log(oValue);
               var img = "";
               switch (oValue['type']) {

                  //-- Agregar.
                  case "0":
                     img = "res/imgs/add.png";
                  break;

                  //-- Editar.
                  case "1":
                     img = "res/imgs/edit.png";
                  break;

                  //-- Eliminar
                  case "2":
                     img = "res/imgs/delete.png";
                  break;
               }

               row = "\
                 <tr style=\"display: block;\">\
                   <td class=\"log-cell\">\
                     <img src=\"" + img + "\" width=\"30px\" height=\"30px\" />\
                   </td>\
                   <td class=\"log-cell\">" + oValue['mensaje'] + " \
                   </td>\
                   <td class=\"log-cell\">" + oValue['fecha_creacion'] + " \
                   </td>\
                 </tr>";
               $("#log_tbody").append(row);
            } );

            //-- Cerramos la etiqueta.
            $("#log_table").append("</tbody>");
         }
		}
	} );
}

//-- Metodos para los botones de la parte superior.
/**
 * Muestra la ventana de nuevaNoticia.
 */
function nuevaNoticia() {
  console.log('nuevaNoticia -----> Comenzado.')
}
