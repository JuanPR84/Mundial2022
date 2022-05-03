<?php
include("../../classes/bd.class.php");

$Y = date("Y");

$id = $_POST["id"];


if (($_POST["penal1"] != "") and ($_POST["penal2"] != "")) { 

	$penal1 = $_POST["penal1"];
	$penal2 = $_POST["penal2"];
	
$sql3 = "update segundafase set penal1 = '$penal1', penal2 = '$penal2' where id = '$id'"; 
$insert3 = new base_datos;
$insert3->connect();
$insert3->query($sql3);

echo "<script>
	alert('Marcador penales actualizado con exito');
	window.location = 'resultadosoctavos.php';
	</script>";

}
else {
$resultado1 = $_POST["resultado1"];
$resultado2 = $_POST["resultado2"];
$equipo1 = $_POST["equipo1"];
$equipo2 = $_POST["equipo2"];

if (($resultado1 != "")and($resultado2 != "")){

if ($resultado1 > $resultado2) {
	$ganador = $equipo1;
	$marcadorg = $resultado1;
	$diferenciagoles = ($resultado1 - $resultado2);
} else if ($resultado2 > $resultado1) {
	$ganador = $equipo2;
	$marcadorg = $resultado2;
	$diferenciagoles = ($resultado2 - $resultado1);
} else if ($resultado1 == $resultado2) {
	$ganador = 'EMPATE';
	$diferenciagoles = '0';
}

$sql = "update segundafase set resultado1 = '$resultado1' where id = '$id'"; 
$insert = new base_datos;
$insert->connect();
$insert->query($sql);

$sql2 = "update segundafase set resultado2 = '$resultado2' where id = '$id'";
$insert2 = new base_datos;
$insert2->connect();
$insert2->query($sql2);


//asignacion de puntaje en pronostico//

$pronostico = array();
$conspronostico = new base_datos;
$conspronostico->connect();
$sqlpronostico = "select * from pronostico where id_partido = '$id' and anno = '$Y' and fase = 'Octavos';";
$respronostico = $conspronostico->query($sqlpronostico);
while ($datospronostico = $conspronostico->fetch_row($respronostico))
{
	array_push($pronostico, $datospronostico);
}

foreach ($pronostico as $P1) { 
	
	$puntos = 0;
	$acierto = 'false';
	
	if ($acierto == 'false') {
		
		if (($resultado1 == $P1["golesequipo1"])and($resultado2 == $P1["golesequipo2"])and($ganador == $P1["equipoganador"])){
			$puntos = '5';
			$acierto = 'true';
		}
		
		if ($acierto == 'false'){
			
			if (($ganador == 'EMPATE')and($P1["equipoganador"] == 'EMPATE')){
				$puntos = 3;
				$acierto = 'true';
			}
			else if(($P1["equipoganador"] != 'EMPATE')and($ganador != 'EMPATE')){
				
				if ($P1["golesequipo1"] > $P1["golesequipo2"]){
					$marcadorp = $P1["golesequipo1"];	
				} else if ($P1["golesequipo2"] > $P1["golesequipo1"]){
					$marcadorp = $P1["golesequipo2"];
				}
				
				if(($ganador == $P1["equipoganador"])and($marcadorg == $marcadorp)){
					$puntos = 3;
					$acierto = 'true';
				}
				
			}
			
			if ($acierto == 'false'){
				
				if(($P1["equipoganador"] != 'EMPATE')and($ganador != 'EMPATE')){
					if ($P1["equipoganador"] == $ganador){
						$puntos = 2;
						$acierto = 'true';
					}
				}
				
				if ($acierto == 'false'){
				
					if (($resultado1 == $P1["golesequipo1"])or($resultado2 == $P1["golesequipo2"])){
						$puntos = 1;
						$acierto = 'true';	
					}
				}
				
			}
			
		}
		
	}
	
	$totalpuntos = $puntos;
	
	$sql = "update pronostico set puntosobtenidos = '$totalpuntos' where id_pronostico = '$P1[id_pronostico]'"; 
	$insert = new base_datos;
	$insert->connect();
	$insert->query($sql);
}

//asignacion de puntaje en pronostico//

echo "<script>
	alert('Marcador actualizado con exito');
	window.location = 'resultadosoctavos.php';
	</script>";	

}
else
{
	echo "<script>
	history.back (alert('Debe diligenciar ambos marcadores'));
	</script>";	
} 
} 

?>