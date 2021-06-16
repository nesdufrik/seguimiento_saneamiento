/*----------------------------
||							||
||		ACCESO USUARIOS		||
||							||
----------------------------*/

//Iniciar Sesion Login Usuario
function validarUsuario() {
	var ad_usuario = document.getElementById("ad_usuario").value;
	var pass_usuario = document.getElementById("pass_usuario").value;
	var url = "php/sis_validar_usuario.php";
	
	$.ajax({
		type: "post",
		url: url,
		data: {
			ad_usuario: ad_usuario,
			pass_usuario: pass_usuario
		},
		success: function(datos) {
			$("#mostrardatos").html(datos);
		}
	});
}

//Finalizar Sesion Logout Usuario
function logout() {
	var desconectar = document.getElementById("desconectar").value;
	var url = "php/sis_logout.php";
	$.ajax({
		type: "post",
		url: url,
		data: {
			desconectar: desconectar
		},
		success: function(datos) {
			$("#mostrarDesconexion").html(datos);
		}
	});
}

//Barra de navegacion por usuario
function navbar() {
	var url = "php/sis_navbar.php";
	$.ajax({
		type: "post",
		url: url,
		success: function(datos) {
			$("#navbar").html(datos);
		}
	});
}

/*----------------------------
||							||
||	TIC ADMINISTRACION		||
||							||
----------------------------*/

//Registro de Nuevo Usuario para el sistema
function registrarUsuario() {
	var nom_usuario = document.getElementById("nom_usuario").value;
	var cargo_usuario = document.getElementById("cargo_usuario").value;
	var nivel_usuario = document.getElementById("nivel_usuario").value;
	var ad_usuario = document.getElementById("ad_usuario").value;
	var pass_usuario = document.getElementById("pass_usuario").value;
	var sexo_usuario = document.getElementById("sexo_usuario").value;
	var url = "php/adm_reg_usuario.php";
	
	$.ajax({
		type: "post",
		url: url,
		data: {
			nom_usuario: nom_usuario,
			cargo_usuario: cargo_usuario,
			nivel_usuario: nivel_usuario,
			ad_usuario: ad_usuario,
			pass_usuario: pass_usuario,
			sexo_usuario: sexo_usuario
		},
		success: function(datos) {
			$("#mostrardatos").html(datos);
		}
	});
}

//Actualizar datos personales usuario del sistema
function actualizarUsuario() {
	var nom_usuario = document.getElementById("nom_usuario").value;
	var cargo_usuario = document.getElementById("cargo_usuario").value;
	var pass_usuario_ant = document.getElementById("pass_usuario_ant").value;
	var pass_usuario_new1 = document.getElementById("pass_usuario_new1").value;
	var pass_usuario_new2 = document.getElementById("pass_usuario_new2").value;
	var url = "php/gen_actualizar_usuario.php";
	
	$.ajax({
		type: "post",
		url: url,
		data: {
			nom_usuario: nom_usuario,
			cargo_usuario: cargo_usuario,
			pass_usuario_ant: pass_usuario_ant,
			pass_usuario_new1: pass_usuario_new1,
			pass_usuario_new2: pass_usuario_new2
		},
		success: function(datos) {
			$("#mostrardatos").html(datos);
		}
	});
}

//Mostrar Datos del Usuario/Funcionario
function updateUsuario() {
	var url = "php/gen_configuracion.php";
	$.ajax({
		type: "post",
		url: url,
		success: function(datos) {
			$("#updateUsuario").html(datos);
		}
	});
}

/*----------------------------
||							||
||		GENERAL TODOS		||
||							||
----------------------------*/

//Buscador de Tramites
function buscarDato() {
	var buscar_dato = document.getElementById("buscar_dato").value;
	var url = "php/gen_buscar_dato.php";
	$.ajax({
		type: "post",
		url: url,
		data: {
			buscar_dato: buscar_dato
		},
		success: function(datos) {
			$("#mostrardatos").html(datos);
		}
	});
}

/*----------------------------
||							||
||		SANEAMIENTO			||
||							||
----------------------------*/

//Registro de Nuevo Tramite de Saneamiento
function registrarTramite() {
	var id_tramite = document.getElementById("id_tramite").value;
	var ci_saneamiento = document.getElementById("ci_saneamiento").value;
	var cic_saneamiento = document.getElementById("cic_saneamiento").value;
	var nom_saneamiento = document.getElementById("nom_saneamiento").value;
	var ref_saneamiento = document.getElementById("ref_saneamiento").value;
	var url = "php/saneo_registrar_tramite.php";
	
	$.ajax({
		type: "post",
		url: url,
		data: {
			id_tramite: id_tramite,
			ci_saneamiento: ci_saneamiento,
			cic_saneamiento: cic_saneamiento,
			nom_saneamiento: nom_saneamiento,
			ref_saneamiento: ref_saneamiento
		},
		success: function(datos) {
			$("#mostrardatos").html(datos);
		}
	});
}

//Derivar Tramite de Saneamiento
function derivarTramite(v1,v2,v3,v4,v5) {
	var id_usuario_para = document.getElementById(v1).value;
	var obs_control = document.getElementById(v2).value;
	var cod_saneamiento = document.getElementById(v3).value;
	var id_tramite = document.getElementById(v4).value;
	var id_sub_estado = document.getElementById(v5).value;
	var url = "php/saneo_derivar_tramite.php";
	
	$.ajax({
		type: "post",
		url: url,
		data: {
			id_usuario_para: id_usuario_para,
			obs_control: obs_control,
			cod_saneamiento: cod_saneamiento,
			id_tramite: id_tramite,
			id_sub_estado: id_sub_estado
		},
		success: function(datos) {
			$("#mostrardatos").html(datos);
		}
	});
}

//Regular Datos
function habilitarExterno(v1,v2){
	var exteno = document.getElementById(v1).value;
	if(exteno=="EXTERNO" || exteno==true){
		document.getElementById(v2).disabled=false;
	}else{
		document.getElementById(v2).disabled=true;
	}
}

//Finalizar Tramite de Saneamiento
function finalizarTramite(v1) {
	var cod_saneamiento = document.getElementById(v1).value;
	var url = "php/saneo_finalizar_tramite.php";
	
	$.ajax({
		type: "post",
		url: url,
		data: {
			cod_saneamiento: cod_saneamiento
		},
		success: function(datos) {
			$("#mostrardatos").html(datos);
		}
	});
}

//Listar Mis Tramites
function misTramites() {
	var fecha_de = document.getElementById("fecha_de").value;
	var fecha_a = document.getElementById("fecha_a").value;
	var url = "php/saneo_mis_tramites.php";
	$.ajax({
		type: "post",
		url: url,
		data: {
			fecha_de: fecha_de,
			fecha_a: fecha_a
		},
		success: function(datos) {
			$("#mostrardatos").html(datos);
		}
	});
}

//Mostrar Tipos de Tramites
function listarTramites() {
	var url = "php/saneo_listar_tramites.php";
	$.ajax({
		url: url,
		success: function(datos) {
			$("#listartramites").html(datos);
		}
	});
}

//Mostrar Tramites Pendientes
function listarPendientes() {
	var url = "php/saneo_pendientes.php";
	$.ajax({
		type: "post",
		url: url,
		success: function(datos) {
			$("#listarpendientes").html(datos);
		}
	});
}

//Reportes
function reporte() {
	var year = document.getElementById("year").value;
	var mes = document.getElementById("mes").value;
	var url = "php/saneo_reportes.php";
	$.ajax({
		type: "post",
		url: url,
		data: {
			year: year,
			mes: mes
		},
		success: function(datos) {
			$("#showreporte").html(datos);
		}
	});
}

//Fecha para REGULARIZAR

function regularMes(){
	var year = document.getElementById("year").value;
	var url = "php/saneo_regular_mes.php";
	$.ajax({
		type: "post",
		url: url,
		data: {
			year: year
		},
		success: function(datos) {
			$("#mes").html(datos);
			$("#mes").prop( "disabled", false );
			$("#dia").prop( "disabled", false );
		}
	});
}

//Cargar datos para REGULARIZAR
function loadRegularizar() {
	var year = document.getElementById("year").value;
	var mes = document.getElementById("mes").value;
	var dia = document.getElementById("dia").value;
	var url = "php/saneo_loadRegularizar.php";
	$.ajax({
		type: "post",
		url: url,
		data: {
			year: year,
			mes: mes,
			dia: dia
		},
		success: function(datos) {
			$("#loadRegularizar").html(datos);
		}
	});
}

//Generar los datos para REGULARIZAR
function inputRegularizar(v1,v2,v3){
	var year = document.getElementById("year").value;
	var mes = document.getElementById("mes").value;
	var dia = document.getElementById("dia").value;
	var cantidad = document.getElementById(v1).value;
	var id_tramite = document.getElementById(v2).value;
	var url = "php/saneo_inputRegularizar.php";
	$.ajax({
		type: "post",
		url: url,
		data: {
			year: year,
			mes: mes,
			dia: dia,
			cantidad: cantidad,
			id_tramite: id_tramite
		},
		success: function(datos) {
			$("#mostrarDesconexion").html(datos);
			$("#"+v1).prop( "disabled", true );
			$("#"+v3).prop( "disabled", true );
		}
	});
}

//Registrar tramite para REGULARIZAR
function registrarRegularizar() {
	var id_tramite = document.getElementById("id_tramite").value;
	var ci_saneamiento = document.getElementById("ci_saneamiento").value;
	var cic_saneamiento = document.getElementById("cic_saneamiento").value;
	var nom_saneamiento = document.getElementById("nom_saneamiento").value;
	var ref_saneamiento = document.getElementById("ref_saneamiento").value;
	var fecha_inicio = document.getElementById("fecha_inicio").value;
	var fecha_fin = document.getElementById("fecha_fin").value;
	var url = "php/saneo_registrar_regularizar.php";
	
	$.ajax({
		type: "post",
		url: url,
		data: {
			id_tramite: id_tramite,
			ci_saneamiento: ci_saneamiento,
			cic_saneamiento: cic_saneamiento,
			nom_saneamiento: nom_saneamiento,
			ref_saneamiento: ref_saneamiento,
			fecha_inicio: fecha_inicio,
			fecha_fin: fecha_fin
		},
		success: function(datos) {
			$("#mostrardatos").html(datos);
		}
	});
}

/*----------------------------
||							||
||		RESPONSABLES		||
||							||
----------------------------*/

//Grafico estadistico de la gestion
function graficas(){
	var year = $("#year").val();
	var mes = $("#mes").val();
	var url1 = "php/sup_estadisticos.php";
	$.ajax({
		url: url1,
		method: 'post',
		data: {
			year: year,
			mes: mes
		},
		success:function(datos) {
			$("#graficos").html(datos);
		}
	});
}