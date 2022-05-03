<?php
include("../../classes/bd.class.php");
$Y = date("Y");
$a = 0;


for ($i = 0; $i < 96; $i++)
{
		$a = $a + 1;
		$b = 1;
		if (($a > 6)and($a <= 12)){
			$b = $b + 1;	
		}
		if (($a > 12)and($a <= 18)){
			$b = $b + 2;	
		}
		if (($a > 18)and($a <= 24)){
			$b = $b + 3;	
		}
		if (($a > 24)and($a <= 30)){
			$b = $b + 4;	
		}
		if (($a > 30)and($a <= 36)){
			$b = $b + 5;	
		}
		if (($a > 36)and($a <= 42)){
			$b = $b + 6;	
		}
		if (($a > 42)and($a <= 48)){
			$b = $b + 7;	
		}
	 /*echo $i + 1;
	  $i = $i + 1;
	  echo " - ";
	  echo $i + 1;
	  echo "<br />";*/
	 
	 
	 $i = $i + 1;
	 $i2 = $i + 1;
	 
	 $fecha = $_POST["fecha".$a];
	 $fecha1 = explode('/',$fecha);
	 $fechapartido = ($fecha1[2].'/'.$fecha1[1].'/'.$fecha1[0]);
	 
	$sql1 = "insert into fechas (id,grupo,equipo1,resultado1,equipo2,resultado2,fecha,hora,anno) values ('', '".$_POST["grupo".$b]."','".$_POST["equipo".$i]."','',";
	 
	$sql2 = "'".$_POST["equipo".$i2] ."','','".$fechapartido."','".$_POST["hora".$a]."','".$Y."');";
	
	$sqlfinal = $sql1.$sql2;
	
	$insert = new base_datos;
	$insert->connect();
	$insert->query($sqlfinal);
	header("Location: cargagrupos.php");
}
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