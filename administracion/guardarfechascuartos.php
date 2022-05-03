<?php
include("../../classes/bd.class.php");
$Y = date("Y");
$i = 0;
$a = 0;

	for ($i = 0; $i < 8; $i++)
	{
	$a = $a + 1;
	$id = $_POST["id$a"];
	$fecha = $_POST["fecha$id"];
	$fecha1 = explode('/',$fecha);
	$fechareal = ($fecha1[2].'-'.$fecha1[1].'-'.$fecha1[0]);
	$hora = $_POST["hora$id"];
	
	if (($fecha != "")and($id != "")and($hora != "")) {
	$sql1 = "update segundafase set fecha = '$fechareal',hora = '$hora' where id = '$id'";
	$insert = new base_datos;
	$insert->connect();
	$insert->query($sql1);
	} else {
		echo "<script>
		alert('Debe diligenciar fecha y hora del partido');
		history.back = 'cuartos.php';
		</script>"; 
	}
	}
	
	header("Location: cargagrupos.php");

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
</head>

<body>
</body>
</html>