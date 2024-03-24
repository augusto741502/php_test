$(function () {
    tabla();
})


function tabla(){
    let html ='';


let inicio = $("#fechaInicio").val();
let hasta = $("#fechaFin").val();

if(inicio=='' && hasta==''){
    inicio = null;
    hasta = null;

}else{
    inicio = $("#fechaInicio").val();
    hasta = $("#fechaFin").val();
}



    $.ajax({ 
        type: "GET",
        dataType: "json",
        url: "/api/reserva/clientes/"+inicio+"/"+hasta, 
      //  headers: {'Authorization': "Bearer " + getCookie("token")},
        success: function(data){ 
            
            html ='<table id="tablaReservasClientes" class="display" >';
            html +='<thead>';
            html +='<tr>';
            html +='<th style="font-size:12px;">fecha</th>';
            html +='<th style="font-size:12px;">nombre</th>';
            html +='<th style="font-size:12px;">correo</th>';
            html +='<th style="font-size:12px;">telefono</th>';
            html +='<th style="font-size:12px;">direccion</th>';
            html +='<th style="font-size:12px;">inicio</th>';
            html +='<th style="font-size:12px;">instalacion</th>';
            html +='<th style="font-size:12px;">retiro</th>';
            html +='<th style="font-size:12px;">reserva</th>';
            html +='<th style="font-size:12px;">valor</th>';
            html +='<th style="font-size:12px;">valor iva</th>';
             html +='<th style="font-size:12px;">iva</th>';
            html +='<th style="font-size:12px;">servicio</th>';
             html +='<th style="font-size:12px;">estado</th>';
            html +='<th></th>';
            html +='<th></th>';
            html +='</tr>';
            html +='</thead>';
            html +='<tbody>';
                $.each(data.data, function(i, v){
                    
                    let iva = 0;
                    let valoriva = 0;

                    if(v.iva == 1){
                        iva = v.valor * 0.19;
                        valoriva =  parseInt(v.valor) + parseInt(iva);
                    }
       
                    html +='<tr>';
                    html +='<td style="font-size:12px;">'+v.fecha+'</td>';
                    html +='<td style="font-size:12px;">'+v.nombre+'</td>';
                    html +='<td style="font-size:12px;">'+v.correo+'</td>';
                    html +='<td style="font-size:12px;">'+v.telefono+'</td>';
                    html +='<td style="font-size:12px;">'+v.direccion+'</td>';
                    html +='<td style="font-size:12px;">'+v.inicio+'</td>';
                    html +='<td style="font-size:12px;">'+v.instalacion+'</td>';
                    html +='<td style="font-size:12px;">'+v.retiro+'</td>';
                    html +='<td style="font-size:12px;">'+v.reserva+'</td>';
                    html +='<td style="font-size:12px;">$'+addCommas(v.valor)+'</td>';
                    
                    html +='<td style="font-size:12px;">$'+addCommas(valoriva) +'</td>';
                    html +='<td style="font-size:12px;">$'+addCommas(iva) +'</td>';
                    html +='<td style="font-size:12px;">'+v.servicio+'</td>';
                    html +='<td style="font-size:12px;">'+v.estado+'</td>';
                    html +='<td>';
                    html +='<button type="button" style="font-size:12px;" name="button" class="btn btn-primary" onclick="modalEditar(\''+v.id+'\')">Editar</button>';
                    html +='</td>';

                    html +='<td>';
                    html +='<button style="font-size:12px;" type="button" name="button" class="btn btn-danger" onclick="eliminaReserva(\''+v.id+'\')">Eliminar</button>';
                    html +='</td>';
                    html +='</tr>';
                });
             
            html +='</tbody>';
            html +='</table>';

            $("#tablaReservas").html(html);

            $('#tablaReservasClientes').DataTable({
                dom: 'Bfrtip',
          

                buttons: [
                    {
                        extend: 'pdfHtml5',
                        orientation: 'landscape',
                        pageSize: 'LEGAL',
                        exportOptions: {
                            columns: [ 0, 1, 3, 4, 5, 6, 7, 11]
                        }
                    }
                   
                ],
                "lengthChange": true,
                    pageLength : 20,
                language: {
                    "decimal": "",
                    "emptyTable": "No hay información",
                    "info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
                    "infoEmpty": "Mostrando 0 to 0 of 0 Entradas",
                    "infoFiltered": "(Filtrado de _MAX_ total entradas)",
                    "infoPostFix": "",
                    "thousands": ",",
                    "lengthMenu": "Mostrar _MENU_ Entradas",
                    "loadingRecords": "Cargando...",
                    "processing": "Procesando...",
                    "search": "Buscar:",
                    "zeroRecords": "Sin resultados encontrados",
                    "paginate": {
                        "first": "Primero",
                        "last": "Ultimo",
                        "next": "Siguiente",
                        "previous": "Anterior"
                    }
                }
            });

        }
    });
}






function modalIngreso(){

   // $('#modalIngreso').show()
    let html ='';             
        $.ajax({ 
            type: "GET",
            dataType: "json",
            url: "/api/reserva/servicio/", 
            //  headers: {'Authorization': "Bearer " + getCookie("token")},
            success: function(data){ 
                html  +='<div class="modal" id="modalIngresoFormulario" tabindex="-1" role="dialog" data-backdrop="false">';
                html +='<div class="modal-dialog" role="document">';
                html +='<div class="modal-content" style="width: 127%;">';
                html +='<div class="modal-header">';
                html +='<h5 class="modal-title">Ingresa Reserva</h5>';
                html +='<button type="button"  onclick="cerraModalIgreso()" class="close" data-dismiss="modal" aria-label="Close">';
                html +='<span aria-hidden="true">&times;</span>';
                html +='</button>';
                html +='</div>';
                html +='<div class="modal-body">';
                html +='<div class="conteiner">';
                html +='<form id="ingresoReserva">';

                html +='<div class="form-group row">';
                html +='<label for="nombre" class="col-form-label col-sm-2">Nombre</label>';
                html +='<div clas="col-sm-6">';
                html +='<input type="text" name="nombre" class="form-control" >';
                html +='</div>';
                html +='</div>';
                              
                html +='<div class="form-group row">';
                html +='<label for="direccion" class="col-form-label col-sm-2">Direccion</label>';
                html +='<div clas="col-sm-6">';
                html +='<input type="text" class="form-control" name="direccion" >';
                html +='</div>';
                html +='</div>';
                   
                html +='<div class="form-group row">';
                html +='<label for="telefono" class="col-form-label col-sm-2">Telefono</label>';
                html +='<div clas="col-sm-6">';
                html +='<input type="text" class="form-control" name="telefono" >';
                html +='</div>';
                html +='</div>';
                   
                html +='<div class="form-group row">';
                html +='<label for="email" class="col-form-label col-sm-2">Email</label>';
                html +='<div clas="col-sm-6">';
                html +='<input type="text" class="form-control" name="email" >';
                html +='</div>';
                html +='</div>';
                   
                html +='<div class="form-group row">';
                html +='<label for="nombre" class="col-form-label col-sm-2">Fecha </label>';
                html +='<div clas="col-sm-6">';
                html +='<input type="date" class="form-control" name="fecha" id="fecha" />';
                html +='</div>';
                html +='</div>';

                html +='<div class="form-group row">';
                html +='<label for="email" class="col-form-label col-sm-2">Hora Instalacion</label>';
                html +='<div clas="col-sm-6">';
                html +='<input type="time" class="form-control" name="instalacion" id="instalacion">';
                html +='</div>';
                html +='</div>';
                    
                html +='<div class="form-group row">';
                html +='<label for="email" class="col-form-label col-sm-2">Hora Inicio</label>';
                html +='<div clas="col-sm-6">';
                html +='<input type="time" class="form-control" name="inicio" >';
                html +='</div>';
                html +='</div>';
                    
                html +='<div class="form-group row">';
                html +='<label for="email" class="col-form-label col-sm-2">Hora Retiro</label>';
                html +='<div clas="col-sm-6">';
                html +='<input type="time" class="form-control" name="retiro"  id="retiro" onblur="buscaServicio()">';
                html +='</div>';
                html +='</div>';
                   
         
                   
                html +='<div class="form-group row">';
                html +='<label for="email" class="col-form-label col-sm-2">Servicio</label>';
                html +='<div class="containerlis">';
                
                $.each(data.data, function(i, v){
                    console.log(v.producto);
                    html +='<label>';
                    html +='<input type="checkbox" name="servicio[]" id="servicio_'+v.id+'" value="'+v.id+ '">'+v.producto;
                    html +='</label>';
                });


            html +='</div>';
            html +='</div>';
                
            html +='<div class="form-group row">';
            html +='<label for="email" class="col-form-label col-sm-2">Reserva</label>';
            html +='<div class="col-sm-12">';
            html +='<input type="text" class="form-control" name="reserva" >';
            html +='</div>';
            html +='</div>';
                
            html +='<div class="form-group row">';
            
            html +='<div class="col-sm-4">';
            html +='<label for="email" class="col-form-label col-sm-2">Valor</label>';
            html +='<input type="text" class="form-control" name="valor" id="valor">';
            html +='</div>';

            html +='<div class="col-sm-8">';
            html +='<label for="email" class="col-form-label col-sm-2">con Iva</label>';
            html +='<input type="radio" name="iva" id="iva1" value="1">';
            html +='<label for="email" class="col-form-label col-sm-2">sin Iva</label>';
            html +='<input type="radio" name="iva" id="iva2" value="0">';
            html +='</div>';
            html +='</div>';
                
            html +='</form>';
            html +='</div>';
            html +='<div class="modal-footer">';
            html +='<button type="button" class="btn btn-primary" onClick="ingresaReserva()">Guardar</button>';
            html +='<button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="cerraModalIgreso()">Cerrar</button>';
            html +='</div>';
            html +='</div>';
            html +='</div>';
            html +='</div>';
            $("#modalIngreso").html(html);
                setTimeout(function(){
                  
                    $('#modalIngresoFormulario').modal('show');
                },1500)

                $("#valor").on({
                    "focus": function(event) {
                      $(event.target).select();
                    },
                    "keyup": function(event) {
                      $(event.target).val(function(index, value) {
                        return value.replace(/\D/g, "")
                         // .replace(/([0-9])([0-9]{2})$/, '$1.$2')
                          .replace(/\B(?=(\d{3})+(?!\d)\.?)/g, ".");
                      });
                    }
                  });
        }
    })
}


function buscaServicio(){
    let fecha = $("#fecha").val();
    let instalacion=$("#instalacion").val();
    let retiro=$("#retiro").val();
    let html ='';
    $.ajax({ 
        type: "GET",
        dataType: "json",
        url: "/api/reserva/serviciosLista/"+fecha+"/"+instalacion+"/"+retiro,
        //  headers: {'Authorization': "Bearer " + getCookie("token")},
        success: function(data){ 

            console.log(data.data.length)
            if(data.data.length > 0){
                $.each(data.data, function(i, v){

                    html +='<div class="modal" tabindex="2" role="dialog" id="modalMensaje" data-backdrop="false">';
                    html +='<div class="modal-dialog" role="document">';
                    html +='<div class="modal-content">';
                    html +='<div class="modal-header">';
                    html +='<h5 class="modal-title">Servicio REservados</h5>';
                    html +='<button type="button" class="close" data-dismiss="modal" aria-label="Close">';
                    html +='<span aria-hidden="true">&times;</span>';
                    html +='</button>';
                    html +='</div>';
                    html +='<div class="modal-body">';

                    html +='<p>Los siguientes servicios estan reservados en la fecha:'+fecha+' y hora:'+instalacion+'/'+retiro+' </p>';
                    $.each(data.data, function(i, v){
                        console.log(v.producto);
                        html +='<label>';
                        html +=v.producto;
                        html +='</label>';
                    });

                    html +='</div>';
                    html +='<div class="modal-footer">';
                    html +='<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>';
                    html +='</div>';
                    html +='</div>';
                    html +='</div>';
                    html +='</div>';

                    $("#modalReserva").html(html);
                    $('#modalMensaje').modal('show');
                    
                
                });
            }
        }
    });
}

function ingresaReserva(){

    var formulario = $("#ingresoReserva").serialize();

    $.ajax({ 
        type: "POST",
        dataType: "json",
        url: "/api/reserva/clientes/guarda/", 
        data:  JSON.stringify({"formulario":formulario}),
        //  headers: {'Authorization': "Bearer " + getCookie("token")},
        success: function(data){ 

            alert("Reserva Ingresada...!")
            $("#tablaReservasClientes").DataTable().destroy();
            tabla();
            $('#modalIngresoFormulario').modal('hide');
        }
    });
}


function modalEditar(id){

    let html ='';             
        $.ajax({ 
            type: "GET",
            dataType: "json",
            url: "/api/reserva/clientes/"+id, 
            //  headers: {'Authorization': "Bearer " + getCookie("token")},
            success: function(data){ 
                html  ='<div class="modal" id="modalIngresoEditaFormulario" tabindex="-1" role="dialog"  data-backdrop="false">';
                html +='<div class="modal-dialog" role="document">';
                html +='<div class="modal-content" style="width: 127%;">';
                html +='<div class="modal-header">';
                html +='<h5 class="modal-title">Edita Reserva</h5>';
                html +='<button type="button"  onclick="cerraModalEdita()" class="close" data-dismiss="modal" aria-label="Close">';
                html +='<span aria-hidden="true">&times;</span>';
                html +='</button>';
                html +='</div>';
                html +='<div class="modal-body">';
                html +='<div class="conteiner">';
                html +='<form id="actualizoReserva">';
                
                html +='<div class="form-group row">';
                html +='<label for="nombre" class="col-form-label col-sm-2">Fecha </label>';
                html +='<div clas="col-sm-6">';
                html +='<input type="date" class="form-control" name="fecha" value="'+data.data[0].fecha+'"/>';
                html +='</div>';
                html +='</div>';
                    
                html +='<div class="form-group row">';
                html +='<label for="nombre" class="col-form-label col-sm-2">Nombre</label>';
                html +='<div clas="col-sm-6">';
                html +='<input type="text" name="nombre" class="form-control" value="'+data.data[0].nombre+'">';
                html +='</div>';
                html +='</div>';
                              
                html +='<div class="form-group row">';
                html +='<label for="direccion" class="col-form-label col-sm-2">Direccion</label>';
                html +='<div clas="col-sm-6">';
                html +='<input type="text" class="form-control" name="direccion" value="'+data.data[0].direccion+'">';
                html +='</div>';
                html +='</div>';
                    
                html +='<div class="form-group row">';
                html +='<label for="telefono" class="col-form-label col-sm-2">Telefono</label>';
                html +='<div clas="col-sm-6">';
                html +='<input type="text" class="form-control" name="telefono" value="'+data.data[0].telefono+'">';
                html +='</div>';
                html +='</div>';
                   
                html +='<div class="form-group row">';
                html +='<label for="email" class="col-form-label col-sm-2">Email</label>';
                html +='<div clas="col-sm-6">';
                html +='<input type="text" class="form-control" name="email" value="'+data.data[0].correo+'">';
                html +='</div>';
                html +='</div>';
                    
                html +='<div class="form-group row">';
                html +='<label for="email" class="col-form-label col-sm-2">Servicio</label>';
                html +='<div class="containerlis">';

                    $.each(data.data[0].lista, function(i, v){
                        html +='<label>';
                            if(data.data[0].idServicio.includes(v.id)){
                                html +='<input type="checkbox" name="servicio[]" id="servicio_'+v.id+'" value="'+v.id+ '" checked>'+v.producto;
                            }else{
                                html +='<input type="checkbox" name="servicio[]" id="servicio_'+v.id+'" value="'+v.id+ '">'+v.producto;
                            }
                        html +='</label>';
                    });


                html +='</div>';
                html +='</div>';
            
                html +='<div class="form-group row">';
                html +='<label for="email" class="col-form-label col-sm-2">Observación Reserva</label>';
                html +='<div clas="col-sm-6">';
                html +='<input type="text" class="form-control" name="reserva" value="'+data.data[0].reserva+'">';
                html +='</div>';
                html +='</div>';
                    
                html +='<div class="form-group row">';
                html +='<label for="email" class="col-form-label col-sm-2">Hora Instalacion</label>';
                html +='<div clas="col-sm-6">';
                html +='<input type="time" class="form-control" name="instalacion" value="'+data.data[0].instalacion+'">';
                html +='</div>';
                html +='</div>';
                
                html +='<div class="form-group row">';
                html +='<label for="email" class="col-form-label col-sm-2">Hora Inicio</label>';
                html +='<div clas="col-sm-6">';
                html +='<input type="time" class="form-control" name="inicio" value="'+data.data[0].inicio+'">';
                html +='</div>';
                html +='</div>';
            
                html +='<div class="form-group row">';
                html +='<label for="email" class="col-form-label col-sm-2">Hora Retiro</label>';
                html +='<div clas="col-sm-6">';
                html +='<input type="time" class="form-control" name="retiro" value="'+data.data[0].retiro+'">';
                html +='</div>';
                html +='</div>';
            
                html +='<div class="form-group row">';
                html +='<label for="email" class="col-form-label col-sm-2">Valor</label>';
                html +='<div clas="col-sm-6">';
                html +='<input type="text" class="form-control" name="valor" value="'+addCommas(data.data[0].valor)+'">';
                html +='</div>';
                html +='</div>';
           
                html +='<div class="col-sm-8">';
                html +='<input type="radio" name="iva" id="iva1" value="1">';
                html +='<label for="email" class="col-form-label col-sm-2">con Iva</label>';
                html +='<input type="radio" name="iva" id="iva2" value="0">';
                html +='<label for="email" class="col-form-label col-sm-2">sin Iva</label>';
                
                html +='</div>';
                html +='</div>';

                html +='</form>';
                html +='</div>';
                html +='<div class="modal-footer">';
                html +='<button type="button" class="btn btn-primary" onClick="actualizaReserva(\''+data.data[0].id+'\', \''+data.data[0].idReserva+'\')">Actualiza</button>';
                html +='<button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="cerraModalEdita()">Cerrar</button>';
                html +='</div>';
                html +='</div>';
                html +='</div>';
                html +='</div>';
                $("#modalIngreso").html(html);
                setTimeout(function(){
                    
                    $('#modalIngresoEditaFormulario').modal('show');

                     
                    if(data.data[0].iva == 1){
                        $("#iva1").prop("checked", true);
                    }else{
                        $("#iva2").prop("checked", true);
                    }
                },500)
        }
    })
}

function eliminaReserva(id){

    if (confirm("¿Desea eliminar esta reserva?") == true) {
        $.ajax({ 
            type: "POST",
            dataType: "json",
            url: "/api/reserva/clientes/elimina/", 
            data:  JSON.stringify({"id":id}),
            //  headers: {'Authorization': "Bearer " + getCookie("token")},
            success: function(data){ 

                alert("Reserva eliminada...!")

                $("#tablaReservasClientes").DataTable().destroy();
                tabla();
    
            }
        });
      } 
 
}

function actualizaReserva(id, idReserva){

    var formulario = $("#actualizoReserva").serialize();

    $.ajax({ 
        type: "POST",
        dataType: "json",
        url: "/api/reserva/clientes/actualiza/", 
        data:  JSON.stringify({"formulario":formulario, "id":id, "idReserva":idReserva}),
        //  headers: {'Authorization': "Bearer " + getCookie("token")},
        success: function(data){ 
            $("#tablaReservasClientes").DataTable().destroy();
            tabla();
            $('#modalIngresoEditaFormulario').modal('hide');

        }
    });
}

function cerraModalIgreso(){
    $('#modalIngresoFormulario').hide()
}

function cerraModalEdita(){
    $('#modalIngresoEditaFormulario').hide()
}

const addCommas = function (nStr) { 
    nStr += ''; 
    var x = nStr.split('.'); 
    var x1 = x[0]; 
    var x2 = x.length > 1 ? '.' + x[1] : ''; 
    var rgx = /(\d+)(\d{3})/; 
    while (rgx.test(x1)) { 
        x1 = x1.replace(rgx, '$1' + '.' + '$2'); 
    } 
    return x1 + x2; 
}