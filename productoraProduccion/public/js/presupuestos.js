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
        url: "/api/presupuesto/presupuestos/"+inicio+"/"+hasta, 
      //  headers: {'Authorization': "Bearer " + getCookie("token")},
        success: function(data){ 
            
            html ='<table id="tablaReservasClientes" class="display" >';
            html +='<thead>';
            html +='<tr>';
            html +='<th style="font-size:12px;">fecha</th>';
            html +='<th style="font-size:12px;">n presupuesto</th>';
            html +='<th style="font-size:12px;">cliente</th>';
            html +='<th style="font-size:12px;">email</th>';
            html +='<th style="font-size:12px;">fono</th>';
            html +='<th style="font-size:12px;">total</th>';
            html +='<th></th>';
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
                    html +='<td style="font-size:12px;">'+v.n_presupuesto+'</td>';
                    html +='<td style="font-size:12px;">'+v.cliente+'</td>';
                    html +='<td style="font-size:12px;">'+v.email+'</td>';
                    html +='<td style="font-size:12px;">'+v.fono+'</td>';
                    html +='<td style="font-size:12px;">$'+addCommas(v.total)+'</td>';

                    html +='<td>';
                    html +='<button type="button" style="font-size:12px;" name="button" class="btn btn-primary" onclick="modalEditar(\''+v.id+'\')">Editar</button>';
                    html +='</td>';

                    html +='<td>';
                    html +='<button style="font-size:12px;" type="button" name="button" class="btn btn-success" onclick="crearPdf(\''+v.id+'\')">PDF</button>';
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

function crearPdf(id){
    window.open("/pdf/"+id,'_blank');
}


function modalIngreso(){
    let html ='';             
        html +='<div class="modal" id="modalIngresoFormulario" tabindex="-1" role="dialog" data-backdrop="false">';
        html +='<div class="modal-dialog" role="document">';
        html +='<div class="modal-content" style="width: 127%;">';
        html +='<div class="modal-header">';
        html +='<h5 class="modal-title">Presupuesto</h5>';
        html +='<button type="button"  onclick="cerraModalIgreso()" class="close" data-dismiss="modal" aria-label="Close">';
        html +='<span aria-hidden="true">&times;</span>';
        html +='</button>';
        html +='</div>';
        html +='<div class="modal-body">';
        html +='<div class="conteiner">';
        html +='<form id="ingresoReserva">';

        html +='<div class="form-group row">';
        html +='<label for="nombre" class="col-form-label col-sm-2">Fecha</label>';
        html +='<div clas="col-sm-6">';
        html +='<input type="date" class="form-control" name="fecha" id="fecha" />';
        html +='</div>';
        html +='</div>';
                
        html +='<div class="form-group row">';
        html +='<label for="direccion" class="col-form-label col-sm-2">N Presupuesto</label>';
        html +='<div clas="col-sm-6">';
        html +='<input type="text" class="form-control" name="n_presupuesto" >';
        html +='</div>';
        html +='</div>';

        html +='<div class="form-group row">';
        html +='<label for="telefono" class="col-form-label col-sm-2">Para</label>';
        html +='<div clas="col-sm-6">';
        html +='<input type="text" class="form-control" name="para" >';
        html +='</div>';
        html +='</div>';

        html +='<div class="form-group row">';
        html +='<label for="email" class="col-form-label col-sm-2">Email</label>';
        html +='<div clas="col-sm-6">';
        html +='<input type="text" class="form-control" name="email" >';
        html +='</div>';
        html +='</div>';

        html +='<div class="form-group row">';
        html +='<label for="nombre" class="col-form-label col-sm-2">Fono </label>';
        html +='<div clas="col-sm-6">';
        html +='<input type="text" class="form-control" name="fono" >';
        html +='</div>';
        html +='</div>';

        html +='<div class="row">';
        html +='<div clas="col-sm-2">';
        html +='<button type="button" class="btn btn-primary" onClick="nuevoServicio()">Nuevo</button>';
        html +='</div>';  
        html +='<table>';
        html +='<thead style="background:#7BCFF3">';
        html +='<tr>';
        html +='<th style="font-size:12px;">Servicio</th>';
        html +='<th style="font-size:12px;">Valor</th>';
        html +='<th style="font-size:12px;">Cant</th>';
        html +='<th style="font-size:12px;">SubTotal</th>';
        html +='</tr>';
        html +='</thead>';
        html +='<tbody id="servicio">';
        html +='</tbody>';
        html +='</table>';
        html +='</div>';
        html +="<input type='hidden' name='cantidades' id='cantidades' value=''>";
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
}

window.nid = 0;
let i = 1;
function nuevoServicio(){
    let html ="";
    if(nid == 0){
        $("#cantidades").val(i);
           
        html +="<tr id='fila_"+i+"'>";
        html +="<input type='hidden' name='ids_"+i+"' id='ids_"+i+"' value='0'>";
        html +="<td><input type='text' class='form-control' name='servicio_"+i+"' ></td>";
        html +="<td><input type='text' class='form-control' name='valor_"+i+"' ></td>"
        html +="<td><input type='text' class='form-control' name='cant_"+i+"' ></td>";
        html +="<td><input type='text' class='form-control' name='subtotal_"+i+"' ></td>";
        html +="</tr>";
    }else{
        nid = nid + 1;
        
        html +="<tr id='fila_"+nid+"'>";
        html +="<input type='hidden' name='ids_"+nid+"' id='ids_"+nid+"' value='0'>";
        html +="<td><input type='text' class='form-control' name='servicio_"+nid+"' ></td>";
        html +="<td><input type='text' class='form-control' name='valor_"+nid+"' ></td>"
        html +="<td><input type='text' class='form-control' name='cant_"+nid+"' ></td>";
        html +="<td><input type='text' class='form-control' name='subtotal_"+nid+"' ></td>";
        html +="</tr>"; 
       
        $("#cantidades").val(nid);
    }
   
 
    $("#servicio").append(html);
    i++

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
        url: "/api/presupuesto/presupuestos/guarda/", 
        data:  JSON.stringify({"formulario":formulario}),
        //  headers: {'Authorization': "Bearer " + getCookie("token")},
        success: function(data){ 

            alert("Presupuesto Ingresado...!")
            $("#tablaReservasClientes").DataTable().destroy();
            tabla();
            $('#modalIngresoFormulario').modal('hide');
            nid = 0;
        }
    });
}


function modalEditar(id){
    let ids=1;
    let html ='';             
        $.ajax({ 
            type: "GET",
            dataType: "json",
            url: "/api/presupuesto/clientes/"+id, 
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
                html +='<label for="nombre" class="col-form-label col-sm-2">N Presupuesto</label>';
                html +='<div clas="col-sm-6">';
                html +='<input type="text" name="npresupuesto" class="form-control" value="'+data.data[0].n_presupuesto+'">';
                html +='</div>';
                html +='</div>';
                              
                html +='<div class="form-group row">';
                html +='<label for="direccion" class="col-form-label col-sm-2">Para</label>';
                html +='<div clas="col-sm-6">';
                html +='<input type="text" class="form-control" name="para" value="'+data.data[0].cliente+'">';
                html +='</div>';
                html +='</div>';
                    
    
                   
                html +='<div class="form-group row">';
                html +='<label for="email" class="col-form-label col-sm-2">Email</label>';
                html +='<div clas="col-sm-6">';
                html +='<input type="text" class="form-control" name="email" value="'+data.data[0].correo+'">';
                html +='</div>';
                html +='</div>';


                html +='<div class="form-group row">';
                html +='<label for="telefono" class="col-form-label col-sm-2">Fono</label>';
                html +='<div clas="col-sm-6">';
                html +='<input type="text" class="form-control" name="fono" value="'+data.data[0].telefono+'">';
                html +='</div>';
                html +='</div>';
                    
        
                let i=1;
                html +='<button type="button" class="btn btn-primary" onClick="nuevoServicio()">Nuevo</button>';
                html +='<table>';
                html +='<thead style="background:#7BCFF3">';
                html +='<tr>';
                html +='<th style="font-size:12px;">Servicio</th>';
                html +='<th style="font-size:12px;">Valor</th>';
                html +='<th style="font-size:12px;">Cant</th>';
                html +='<th style="font-size:12px;">SubTotal</th>';
                html +='</tr>';
                html +='</thead>';
                html +='<tbody id="servicio">';
                $.each(data.data[0].lista, function(i, v){

                    html +="<tr id='fila_"+ids+"'>";
                    html +="<input type='hidden' name='ids_"+ids+"' id='ids_"+ids+"' value="+v.id+">";
                    html +="<td><input type='text' class='form-control' name='servicio_"+ids+"' value='"+v.servicio+"'></td>";
                    html +="<td><input type='text' class='form-control' name='valor_"+ids+"' value='"+v.valor+"'></td>"
                    html +="<td><input type='text' class='form-control' name='cant_"+ids+"' value='"+v.cantidad+"'></td>";
                    html +="<td><input type='text' class='form-control' name='subtotal_"+ids+"' value='"+v.subtotal+"'></td>";
                    html +="</tr>";
                    nid = ids;
                    ids++;
                  
                    
                });
                html +='</tbody>';
                html +='</table>';
                html +="<input type='hidden' name='cantidades' id='cantidades' value="+nid+">";
                html +='</form>';
                html +='</div>';
                html +='<div class="modal-footer">';
                html +='<button type="button" class="btn btn-primary" onClick="actualizaReserva(\''+data.data[0].id+'\')">Actualiza</button>';
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

    if (confirm("¿Desea eliminar este Presupuesto?") == true) {
        $.ajax({ 
            type: "POST",
            dataType: "json",
            url: "/api/presupuesto/clientes/elimina/", 
            data:  JSON.stringify({"id":id}),
            //  headers: {'Authorization': "Bearer " + getCookie("token")},
            success: function(data){ 

                alert("Presupuesto eliminado...!")

                $("#tablaReservasClientes").DataTable().destroy();
                tabla();
    
            }
        });
      } 
 
}

function actualizaReserva(id){

    var formulario = $("#actualizoReserva").serialize();

    $.ajax({ 
        type: "POST",
        dataType: "json",
        url: "/api/presupuesto/presupuestos/actualiza/", 
        data:  JSON.stringify({"formulario":formulario, "id":id}),
        //  headers: {'Authorization': "Bearer " + getCookie("token")},
        success: function(data){ 
            $("#tablaReservasClientes").DataTable().destroy();
            tabla();
            $('#modalIngresoEditaFormulario').modal('hide');

            nid = 0;

        }
    });
}

function cerraModalIgreso(){
    $('#modalIngresoFormulario').hide()
    nid = 0;
    i = 1
}

function cerraModalEdita(){
    $('#modalIngresoEditaFormulario').hide()
    nid = 0;
    i = 1
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