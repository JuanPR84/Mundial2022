<?php
require("../classes/bd.class.php");

$user = $_POST['cedula_recordar'];
$nick = $_POST['usuario_recordar'];

if (($user != '')and($nick != '')){
	$list_cedulas = array();
	$cons = new base_datos;
	$cons->connect();
	$sql = "Select * from asociados where cedula = '$user'";
	$res = $cons->query($sql);
	while($dato = $cons->fetch_row($res))	{
		array_push($list_cedulas,$dato);
	}
	$cant1 = count($list_cedulas);
	if($cant1>0){
		$idasociado = $list_cedulas[0]['id'];
		$list_codigos = array();
		$cons = new base_datos;
		$cons->connect();
		$sql = "Select * from usuariosmundial where nickname = '$nick' and id_asociado = '$idasociado'";
		$res = $cons->query($sql);
		while($dato = $cons->fetch_row($res))	{
			array_push($list_codigos,$dato);
		}
		$cant = count($list_codigos);
		if($cant > 0){
			$email = 'webmaster@golesafondo.com';
			$asunto = 'RECORDAR DATOS GOLES A FONDO';
			$destinatario = $list_codigos[0]['e_mail'];
			$contra = $list_codigos[0]['contrasena'];
			mail($destinatario,'GOLES A FONDO','Usuario: '.$nick. "\n" .'Clave: '.$contra."\n".'Asunto '.$asunto."\n",'From:'.$email);
			echo "<script>
			alert('Los datos fueron enviados al correo elctronico suministrado en el momento del registro');
			window.location.href='login.php';
			</script>";
		
		} else {
			echo "<script>
			alert('Los datos no corresponden');
			history.back();
			</script>";
		}
	} else {
		echo "<script>
		alert('El numero de cedula no es valido');
		history.back();
		</script>";
	}
} else {
	echo "<script>
	alert('Los campos son obligatorios');
	history.back();
	</script>";
}
?>
