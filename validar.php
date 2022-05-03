<?php
session_start();
require("../classes/bd.class.php");

$us = $_POST['usuario'];
$pass = $_POST['password'];

if (($us != '')and($pass != '')){
	$list_codigos = array();
	$cons = new base_datos;
	$cons->connect();
	$sql = "Select * from usuariosmundial where nickname = '$us' and contrasena = '$pass'";
	$res = $cons->query($sql);
	while($dato = $cons->fetch_row($res))	{
		array_push($list_codigos,$dato);
	}
	$cant = count($list_codigos);
	if($cant > 0){
		$idu = $list_codigos[0]['id'];
		$idup = $list_codigos[0]['id_asociado'];
		$list_codigos1 = array();
		$cons = new base_datos;
		$cons->connect();
		$sql = "Select * from asociados where id = '$idup'";
		$res = $cons->query($sql);
		while($dato = $cons->fetch_row($res))	{
			array_push($list_codigos1,$dato);
		}
		$nomp = $list_codigos1[0]['nombres'];
		
		$fecha = date('Ymd');
		$url = base64_encode($us.'|'.$pass.'|'.$fecha.'|'.$nomp.'|'.$idu);
		header("Location: pronosticos.php?datos=".$url);
	} else {
		echo "<script>
		alert('Los datos no corresponden');
		window.location.href='login.php';
		</script>";
	}
} else {
	echo "<script>
	alert('Los campos son obligatorios');
	window.location.href='login.php';
	</script>";
}
?>
