$(function () {
    tabla();
})


function tabla(){
    let html ='';


    $.ajax({ 
        type: "GET",
        dataType: "json",
        url: "/api/reserva/servicios/stock/", 
      //  headers: {'Authorization': "Bearer " + getCookie("token")},
        success: function(data){ 
            
            html ='<table id="tablaReservasClientes" class="display" >';
            html +='<thead>';
            html +='<tr>';
            html +='<th style="font-size:12px;">codigo</th>';
            html +='<th style="font-size:12px;">nombre</th>';
            html +='<th style="font-size:12px;">estado</th>';
            html +='<th style="font-size:12px;">cantidad</th>';
            html +='<th></th>';
           // html +='<th></th>';
            html +='</tr>';
            html +='</thead>';
            html +='<tbody>';
                $.each(data.data, function(i, v){
                    html +='<tr>';
                    html +='<td style="font-size:12px;">'+v.id+'</td>';
                    html +='<td style="font-size:12px;">'+v.producto+'</td>';
                    html +='<td style="font-size:12px;">'+v.estado+'</td>';
                    html +='<td style="font-size:12px;">'+v.cantidad+'</td>';
                    html +='<td>';
                    html +='<button type="button" style="font-size:12px;" name="button" class="btn btn-primary" onclick="modalEditar(\''+v.id+'\')">Editar</button>';
                    html +='</td>';

                    /*html +='<td>';
                    html +='<button style="font-size:12px;" type="button" name="button" class="btn btn-danger" onclick="eliminaReserva(\''+v.id+'\')">Eliminar</button>';
                    html +='</td>';*/
                    html +='</tr>';
                });
             
            html +='</tbody>';
            html +='</table>';

            $("#tablaReservas").html(html);

            $('#tablaReservasClientes').DataTable({
               
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
            url: "/api/reserva/servicios/", 
            //  headers: {'Authorization': "Bearer " + getCookie("token")},
            success: function(data){ 
                html  +='<div class="modal" id="modalIngresoFormulario" tabindex="-1" role="dialog" data-backdrop="false">';
                html +='<div class="modal-dialog" role="document">';
                html +='<div class="modal-content" style="width: 127%;">';
                html +='<div class="modal-header">';
                html +='<h5 class="modal-title">Ingresa Stock</h5>';
                html +='<button type="button"  onclick="cerraModalIgreso()" class="close" data-dismiss="modal" aria-label="Close">';
                html +='<span aria-hidden="true">&times;</span>';
                html +='</button>';
                html +='</div>';
                html +='<div class="modal-body">';
                html +='<div class="conteiner">';
                html +='<form id="ingresoReserva">';
                   
                   
                html +='<div class="form-group row">';
                html +='<label for="servicio" class="col-form-label col-sm-2">Nombre Servicio</label>';
                html +='<div clas="col-sm-6">';
                html +='<input type="text" name="servicio" class="form-control" >';
                html +='</div>';
                html +='</div>';
                              
                   
                html +='<div class="form-group row">';
                html +='<label for="cantidad" class="col-form-label col-sm-2">Cantida</label>';
                html +='<div clas="col-sm-6">';
                html +='<input type="text" class="form-control" name="cantidad" >';
                html +='</div>';
                html +='</div>';

                    
                html +='</form>';
                html +='</div>';
                html +='<div class="modal-footer">';
                html +='<button type="button" class="btn btn-primary" onClick="ingresaReserva()">Guardar</button>';
                html +='<button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="cerraModalIgreso()">Close</button>';
                html +='</div>';
                html +='</div>';
                html +='</div>';
                html +='</div>';
            $("#modalIngreso").html(html);
                setTimeout(function(){
                  
                    $('#modalIngresoFormulario').modal('show');
                },1500)
        }
    })
}


function ingresaReserva(){

    var formulario = $("#ingresoReserva").serialize();

    $.ajax({ 
        type: "POST",
        dataType: "json",
        url: "/api/reserva/servicio/guarda/stock", 
        data:  JSON.stringify({"formulario":formulario}),
        //  headers: {'Authorization': "Bearer " + getCookie("token")},
        success: function(data){ 

            alert("Stock Ingresado...!")
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
            url: "/api/reserva/servicio/stock/"+id, 
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
                html +='<label for="producto" class="col-form-label col-sm-4">Nombre Servicio</label>';
                html +='<div clas="col-sm-6">';
                html +='<input type="text" name="producto" class="form-control" value="'+data.data[0].producto+'">';
                html +='</div>';
                html +='</div>';
                              
                   
                html +='<div class="form-group row">';
                html +='<label for="cantidad" class="col-form-label col-sm-4">Estado</label>';
                html +='<div clas="col-sm-6">';
              

                html += '<select name="estado" id="estado" class="form-select" aria-label="Default select example">';
                html += '<option value="0">Selecciones Estado</option>';
                html += '<option value="1">Disponible</option>';
                html += '<option value="2">Mantención</option>';
                html += '<option value="3">No Disponible</option>';
                html += '</select>';
                html +='</div>';
                html +='</div>';

                html +='<div class="form-group row">';
                html +='<label for="cantidad" class="col-form-label col-sm-2">Cantidad</label>';
                html +='<div clas="col-sm-6">';
                html +='<input type="text" class="form-control" name="cantidad" value="'+data.data[0].cantidad+'">';
                html +='</div>';
                html +='</div>';
                    
                
                html +='</form>';
                html +='</div>';
                html +='<div class="modal-footer">';
                html +='<button type="button" class="btn btn-primary" onClick="actualizaReserva(\''+data.data[0].id+'\', \''+data.data[0].idStock+'\')">Actualiza</button>';
                html +='<button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="cerraModalEdita()">Close</button>';
                html +='</div>';
                html +='</div>';
                html +='</div>';
                html +='</div>';
                $("#modalIngreso").html(html);



                $("#estado option[value="+ data.data[0].estado +"]").attr("selected",true);
                setTimeout(function(){
                    
                    $('#modalIngresoEditaFormulario').modal('show');
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

function actualizaReserva(id, idStock){

    var formulario = $("#actualizoReserva").serialize();

    $.ajax({ 
        type: "POST",
        dataType: "json",
        url: "/api/reserva/stock/actualiza/", 
        data:  JSON.stringify({"formulario":formulario, "id":id, "idStock":idStock}),
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