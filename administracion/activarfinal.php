<?php
include("../../classes/bd.class.php");
$Y = date("Y");

//GRUPOA//
$grupo = array();
$consgrupo = new base_datos;
$consgrupo->connect();
$sqlgrupo = "select * from segundafase where anno = '$Y' and fasepartido = 'Semifinal' order by id asc";
$resgrupo = $consgrupo->query($sqlgrupo);
while ($datogrupo = $consgrupo->fetch_row($resgrupo))
{
	array_push($grupo, $datogrupo);
}

if ($grupo[0]["resultado1"] > $grupo[0]["resultado2"]){
	$ganador1 = $grupo[0]["equipo1"];
	$perdedor1 = $grupo[0]["equipo2"];		
} else if ($grupo[0]["resultado1"] < $grupo[0]["resultado2"]){
	$ganador1 = $grupo[0]["equipo2"];
	$perdedor1 = $grupo[0]["equipo1"];
} else if ($grupo[0]["resultado1"] == $grupo[0]["resultado2"]){
	if ($grupo[0]["penal1"] > $grupo[0]["penal2"]){
		$ganador1 = $grupo[0]["equipo1"];
		$perdedor1 = $grupo[0]["equipo2"];
	} else { 
		$ganador1 = $grupo[0]["equipo2"];
		$perdedor1 = $grupo[0]["equipo1"];
	}
}
if ($grupo[1]["resultado1"] > $grupo[1]["resultado2"]){
	$ganador2 = $grupo[1]["equipo1"];	
	$perdedor2 = $grupo[1]["equipo2"];
} else if ($grupo[1]["resultado1"] < $grupo[1]["resultado2"]){
	$ganador2 = $grupo[1]["equipo2"];	
	$perdedor2 = $grupo[1]["equipo1"];
} else if ($grupo[1]["resultado1"] == $grupo[1]["resultado2"]){
	if ($grupo[1]["penal1"] > $grupo[1]["penal2"]){
		$ganador2 = $grupo[1]["equipo1"];	
		$perdedor2 = $grupo[1]["equipo2"];
	} else { 
		$ganador2 = $grupo[1]["equipo2"];	
		$perdedor2 = $grupo[1]["equipo1"];
	}
}
$sql1 = "INSERT INTO segundafase (id,fasepartido,equipo1,equipo2,anno) 
		Values('','Final','$ganador1','$ganador2','$Y')";
$insert1 = new base_datos;
$insert1->connect();
$insert1->query($sql1);

$sql2 = "INSERT INTO segundafase (id,fasepartido,equipo1,equipo2,anno) 
		Values('','Final','$perdedor1','$perdedor2','$Y')";
$insert2 = new base_datos;
$insert2->connect();
$insert2->query($sql2);


echo "<script>
	alert('Creacion de fechas de semifinal creadas con exito');
	window.location = 'cargagrupos.php';
</script>";

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