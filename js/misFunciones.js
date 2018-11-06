$(document).ready(function(){
    $(".lista").mouseover(function() {
        $("input", this).css('display', 'block');
    });
    $(".lista").mouseout(function() {
        $("input", this).css('display', 'none');
    });         
});

function alertaEliminar(id){
    document.getElementById('alertaEliminar').innerHTML=
    " <div id='msjEliminar' class= 'modal' tabindex= '-1' role= 'dialog' > <div class= 'modal-dialog' role= 'document' > <div class= 'modal-content' > <div class= 'modal-header' > <h5 class= 'modal-title' > !!Aviso!! </h5><button type= 'button' class= 'close' data-dismiss= 'modal' aria-label= 'Cerrar' > <span aria-hidden= 'true' > &times; </span> </button> </div><div class= 'modal-body' ><p> ¿Desea eliminar este usuario? </p></div> <div class= 'modal-footer' > <button class='btn btn-primary' onclick='eliminarUsuario("+id+")'> Si </a> <button type= 'button' class= 'btn btn-secondary' data-dismiss= 'modal' onclick='limpiarAlertaEliminar()'> No </button> </div> </div> </div> </div>";
    $('#msjEliminar').modal('show');
}
function limpiarAlertaEliminar(){
    document.getElementById('alertaEliminar').innerHTML="";
}

    //FUNCION QUE LLAMA AL ARCHIVO ELIMINAR USUARIO MEDIANTE AJAX
function eliminarUsuario(IDUsuario){
    $('#msjEliminar').modal('hide'); 
    $('#msjEliminar').modal('hide'); 
    document.getElementById('alertaEliminar').innerHTML="";

    jQuery.ajax({
        type: "POST",
        url: "../controladores/eliminarUsuario.php",
        dataType: 'json',
        data:{id:IDUsuario},
        success: function(res){
            document.getElementById('alertaEliminar').innerHTML="<div onclick='recargar()' id='msjOK' class= 'modal fade bd-example-modal-sm' tabindex= '-1' role= 'dialog' aria-labelledby= 'mySmallModalLabel' aria-hidden= 'true' ><div class= 'modal-dialog modal-sm' ><button type= 'button' class= 'close' data-dismiss= 'modal' aria-label= 'Cerrar'> <span aria-hidden= 'true' > &times; </span> </button><div class= 'modal-content' ><center>"+res+"</center></div> </div></div>"; 
            $('#msjOK').modal('show');
        },
        error: function(textStatus,errorThrown) {  
            document.getElementById('alertaEliminar').innerHTML="<div id='msjOK' class= 'modal fade bd-example-modal-sm' tabindex= '-1' role= 'dialog' aria-labelledby= 'mySmallModalLabel' aria-hidden= 'true' ><div class= 'modal-dialog modal-sm' > <div class= 'modal-content' ><center>Oops: Ha ocurrido un error.</center></div> </div></div>"; 
            $('#msjOK').modal('show');
        } 
    });
}
function recargar(){
            location.reload();
        }

//ESTADO EN EN EL QUE SE ENCUENTRE EL USUARIO EN EL MENU
function myFunction() {
    var x = document.getElementsByTagName("BODY")[0];
    if (x.id === "PagInicio") { 
        document.getElementById('inicio').classList.add('active');
    }
    else if (x.id === "PagCaptura") {
    	document.getElementById('captura').classList.add('active');
    }
    else if (x.id === "PagSinValidar") {
    	document.getElementById('sinValidar').classList.add('active');
    }
    else if (x.id === "PagSuspendidas") {
    	document.getElementById('suspendidas').classList.add('active');
    }
    else if (x.id === "PagRechazadas") {
        document.getElementById('rechazadas').classList.add('active');
    }
    else if (x.id === "PagValidadas") {
    	document.getElementById('validadas').classList.add('active');
    }
    else if (x.id === "PagAprobadas") {
    	document.getElementById('aprobadas').classList.add('active');
    }
    else if (x.id === "PagZonas") {
        document.getElementById('zonas').classList.add('active');
    }
}
$(document).ready( function () {
  myFunction();
});

//FUNCIONES PARA CARGAR LOS DATOS DE LAS SOLICITUDES
function cargarInfoSolicitud(IDSolicitud,IDAccion){
var elemento=document.getElementById("cargarDatos");
elemento.innerHTML="<img src='img/ajax-loader.gif' id='cargando-img' style='width: 5rem;height: 5rem;position: fixed;margin-left: 23%;'/>";
var objAjax;
if (window.XMLHttpRequest) // Para navegadores modernos
objAjax=new XMLHttpRequest();
else
objAjax=new ActiveXObject("Microsoft.XMLHTTP"); // para navegadores antiguos
objAjax.onreadystatechange=function(){
if (objAjax.readyState == 4 && objAjax.status == 200 ){
elemento.innerHTML=objAjax.responseText;
$("#modalInfo").modal();
}
}
if (IDSolicitud.value!=0){
objAjax.open("GET", "infoSolicitud.php?IDSolicitud=" + IDSolicitud + "&IDAccion="+IDAccion);
objAjax.send();
}
else
elemento.innerHTML.innerHTML=" ";
}

//FUNCIONES PARA CARGAR LOS DATOS DE LAS SOLICITUDES
function cargarSolicitudesXZona(IDZona){
var zona = document.getElementById('inputZona').value;
var elemento=document.getElementById("cargarSolicitudes");
elemento.innerHTML="<img src='img/ajax-loader.gif' id='cargando-img' style='width: 5rem;height: 5rem;position: fixed;margin-left: 23%;'/>";
var objAjax;
if (window.XMLHttpRequest) // Para navegadores modernos
objAjax=new XMLHttpRequest();
else
objAjax=new ActiveXObject("Microsoft.XMLHTTP"); // para navegadores antiguos
objAjax.onreadystatechange=function(){
if (objAjax.readyState == 4 && objAjax.status == 200 ){
elemento.innerHTML=objAjax.responseText;
}
}
if (true) {}
if (zona.value!=""){
objAjax.open("GET", "solicitudes.php?zona=" + zona);
objAjax.send();
}
else
elemento.innerHTML.innerHTML=" ";
}

//FUNCIONES PARA Validar SOLICITUD
function validarSolicitud(IDSolicitud){
    var elemento=document.getElementById("esperando");
    elemento.innerHTML="<img src='img/ajax-loader.gif' id='cargando-img' style='width: 5rem;height: 5rem;position: fixed;margin-left: 23%;'/>";
    var objAjax;
    if (window.XMLHttpRequest) // Para navegadores modernos
    objAjax=new XMLHttpRequest();
    else
    objAjax=new ActiveXObject("Microsoft.XMLHTTP"); // para navegadores antiguos
    objAjax.onreadystatechange=function(){
    if (objAjax.readyState == 4 && objAjax.status == 200 ){
        msj();
    }
}
if (IDSolicitud!=""){
    objAjax.open("GET", "validarSolicitud.php?IDSolicitud=" + IDSolicitud + "&accion=1");
    objAjax.send();
}
else
    elemento.innerHTML.innerHTML=" ";
}

function msj(){
    alert("Solicitud Validada con Exito!!");
}

function adjuntarArchivos(IDSolicitud) {
    var CURP = document.getElementById('CURP').value;
    var IDCliente=document.getElementById('IDCliente').value;
    var IDSolicitud=document.getElementById('idSolicitud').value;
    window.open("adjuntarArchivos.php?curp="+CURP+"&IDCliente="+IDCliente+"&IDSolicitud="+IDSolicitud);
}

function suspenderSolicitud(IDSolicitud){
    var elemento=document.getElementById("esperando");
    elemento.innerHTML="<img src='img/ajax-loader.gif' id='cargando-img' style='width: 5rem;height: 5rem;position: fixed;margin-left: 23%;'/>";
    var objAjax;
    if (window.XMLHttpRequest) // Para navegadores modernos
        objAjax=new XMLHttpRequest();
        else
        objAjax=new ActiveXObject("Microsoft.XMLHTTP"); // para navegadores antiguos
        objAjax.onreadystatechange=function(){
        if (objAjax.readyState == 4 && objAjax.status == 200 ){
        }
    }
    if (IDSolicitud!=""){
        objAjax.open("GET", "validarSolicitud.php?IDSolicitud=" + IDSolicitud+"&accion=2");
        objAjax.send();
    }
    else
        elemento.innerHTML.innerHTML=" ";
}
function zoomIn() {
  $('#perfil').css({"display":"block", "background-color":"#fff"});
}
function zoomOut() {
  $('#perfil').css("display", "none");
}
function focoMenuPerfil(id){
        $('#'+id).css({"background-color":"rgb(208, 207, 207)"});

}
function sinfocoMenuPerfil(id){
        $('#'+id).css({"background-color":"#fff"});

}