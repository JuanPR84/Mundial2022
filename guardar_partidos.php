<?php
date_default_timezone_set('America/Bogota');
$fecha_actual = strtotime(date("d-m-Y H:i",time()));

require('classes/bd.class.php');
$datos = $_GET['datos'];
$fecha =  date('Ymd');
$anno = date('Y');
$bas = base64_decode($datos);
$explode = explode('|',$bas);
if ($explode[2] != $fecha){
	echo "<script>
	window.location.href='index.php';
	</script>";
} else {
	$nk = $explode[0];
	$ps = $explode[1];
	$nom_us = $explode[3];
	$iu = $explode[4];
}
$hoy = date('Y-m-d');

$p1 = $_POST['p1'];
$p2 = $_POST['p2'];
$p3 = $_POST['p3'];

$sql = "UPDATE pronostico_rapido SET partido1 = '$p1', partido2 = '$p2', partido3 = '$p3' where id_usuario = '$iu'";
$insert = new base_datos;
$insert->connect();
$insert->query($sql);

$sql = "UPDATE usuariosmundial SET ingresos = '1' where id = '$iu'";
$insert = new base_datos;
$insert->connect();
$insert->query($sql);

echo "<script>
	alert('Primer pronostico rapido guardado correctamente');
	window.location.href = 'pronosticos.php?datos=".$datos."';
</script>";


?>