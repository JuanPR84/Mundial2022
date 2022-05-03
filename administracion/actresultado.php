<?php
include("../../classes/bd.class.php");

$Y = date("Y");

$id = $_POST["id"];
$resultado1 = $_POST["resultado1"];
$resultado2 = $_POST["resultado2"];
$equipo1 = $_POST["equipo1"];
$equipo2 = $_POST["equipo2"];
$primergol = $_POST["primergol"];

if (($resultado1 != "")and($resultado2 != "")){

if ($resultado1 > $resultado2) {
	$ganador = $equipo1;
	$marcadorg = $resultado1;
	$diferenciagoles = ($resultado1 - $resultado2);
} else if ($resultado2 > $resultado1) {
	$ganador = $equipo2;
	$diferenciagoles = ($resultado2 - $resultado1);
	$marcadorg = $resultado2;
} else if ($resultado1 == $resultado2) {
	$ganador = 'EMPATE';
	$diferenciagoles = '0';
}

//primer equipo//
$primer = array();
$consprimer = new base_datos;
$consprimer->connect();
$sqlprimer = "select * from equiposmundial where Equipo = '$equipo1' and Annomundial = '$Y';";
$resprimer = $consprimer->query($sqlprimer);
while ($datosprimer = $consprimer->fetch_row($resprimer))
{
	array_push($primer, $datosprimer);
}
$idequipo1 = $primer[0]['id'];
//primer equipo//

//segundo equipo//
$segundo = array();
$conssegundo = new base_datos;
$conssegundo->connect();
$sqlsegundo = "select * from equiposmundial where Equipo = '$equipo2' and Annomundial = '$Y';";
$ressegundo = $conssegundo->query($sqlsegundo);
while ($datossegundo = $conssegundo->fetch_row($ressegundo))
{
	array_push($segundo, $datossegundo);
}
$idequipo2 = $segundo[0]['id'];
//segundo equipo//

//actualizacion partidos jugados//
$jugados1 = $primer[0]['P_jugados'] + 1;
$jugados2 = $segundo[0]['P_jugados'] + 1;

$sql6 = "update equiposmundial set P_jugados = '$jugados1' where id = '$idequipo1'"; 
$insert6 = new base_datos;
$insert6->connect();
$insert6->query($sql6);

$sql7 = "update equiposmundial set P_jugados = '$jugados2' where id = '$idequipo2'"; 
$insert7 = new base_datos;
$insert7->connect();
$insert7->query($sql7);
//actualizacion partidos jugados//

//actualizacion de goles anotados y recibidos//
$golesf1 = $primer[0]['goles_f'] + $resultado1;
$golesf2 = $segundo[0]['goles_f'] + $resultado2;
$golesc1 = $primer[0]['goles_c'] + $resultado2;
$golesc2 = $segundo[0]['goles_c'] + $resultado1;
$dgoles1 = $golesf1 - $golesc1;
$dgoles2 = $golesf2 - $golesc2;

$sql8 = "update equiposmundial set goles_f = '$golesf1', goles_c = '$golesc1', Dif_goles = '$dgoles1' where id = '$idequipo1'"; 
$insert8 = new base_datos;
$insert8->connect();
$insert8->query($sql8);

$sql9 = "update equiposmundial set goles_f = '$golesf2', goles_c = '$golesc2', Dif_goles = '$dgoles2' where id = '$idequipo2'"; 
$insert9 = new base_datos;
$insert9->connect();
$insert9->query($sql9);
 
//actualizacion de goles anotados y recibidos//

//si el ganador es el primero//
if ($resultado1 > $resultado2) {
	//partidos ganados//
	$ganados = $primer[0]['P_ganados'] + 1;
	$perdidos = $segundo[0]['P_perdidos'] + 1;
	
	$sql3 = "update equiposmundial set P_ganados = '$ganados' where id = '$idequipo1'"; 
	$insert3 = new base_datos;
	$insert3->connect();
	$insert3->query($sql3);
	
	$sql4 = "update equiposmundial set P_perdidos = '$perdidos' where id = '$idequipo2'"; 
	$insert4 = new base_datos;
	$insert4->connect();
	$insert4->query($sql4);
	
	//se le suman 3 puntos al ganador//
	$puntos = $primer[0]['Puntos'] + 3;
	$sql4 = "update equiposmundial set Puntos = '$puntos' where id = '$idequipo1'"; 
	$insert4 = new base_datos;
	$insert4->connect();
	$insert4->query($sql4);	
	
//si el ganador es el segundo//	
} else if ($resultado2 > $resultado1) {
	//partidos ganados//
	$ganados = $segundo[0]['P_ganados'] + 1;
	$perdidos = $primer[0]['P_perdidos'] + 1;
	
	$sql3 = "update equiposmundial set P_ganados = '$ganados' where id = '$idequipo2'"; 
	$insert3 = new base_datos;
	$insert3->connect();
	$insert3->query($sql3);
	
	$sql4 = "update equiposmundial set P_perdidos = '$perdidos' where id = '$idequipo1'"; 
	$insert4 = new base_datos;
	$insert4->connect();
	$insert4->query($sql4);
	
	//se le suman 3 puntos al ganador//
	$puntos = $segundo[0]['Puntos'] + 3;
	$sql4 = "update equiposmundial set Puntos = '$puntos' where id = '$idequipo2'"; 
	$insert4 = new base_datos;
	$insert4->connect();
	$insert4->query($sql4);
// si es empate//	
} else if ($resultado1 == $resultado2) { 
	//partidos ganados//
	$ganados = $primer[0]['P_empatados'] + 1;
	$perdidos = $segundo[0]['P_empatados'] + 1;
	
	$sql3 = "update equiposmundial set P_empatados = '$ganados' where id = '$idequipo1'"; 
	$insert3 = new base_datos;
	$insert3->connect();
	$insert3->query($sql3);
	
	$sql4 = "update equiposmundial set P_empatados = '$perdidos' where id = '$idequipo2'"; 
	$insert4 = new base_datos;
	$insert4->connect();
	$insert4->query($sql4);
	
	//se le suman 3 puntos al ganador//
	$puntos1 = $primer[0]['Puntos'] + 1;
	$puntos2 = $segundo[0]['Puntos'] + 1;
	
	$sql4 = "update equiposmundial set Puntos = '$puntos1' where id = '$idequipo1'"; 
	$insert4 = new base_datos;
	$insert4->connect();
	$insert4->query($sql4);	
	
	$sql5 = "update equiposmundial set Puntos = '$puntos2' where id = '$idequipo2'"; 
	$insert5 = new base_datos;
	$insert5->connect();
	$insert5->query($sql5);	
	
}
	

$sql = "update fechas set resultado1 = '$resultado1', resultado2 = '$resultado2', primeromarcar = '$primergol' where id = '$id'";
$insert = new base_datos;
$insert->connect();
$insert->query($sql);


//asignacion de puntaje en pronostico//

$pronostico = array();
$conspronostico = new base_datos;
$conspronostico->connect();
$sqlpronostico = "select * from pronostico where id_partido = '$id' and anno = '$Y' and fase = 'Primera Fase';";
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
			$puntos = 5;
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
	
	//PRIMERO EN MARCAR
	if ($P1['primergol'] == $primergol){
		$puntos = $puntos + 0;
	}
	
	$totalpuntos = $puntos;
	
	$sql = "update pronostico set puntosobtenidos = '$totalpuntos' where id_pronostico = '$P1[id_pronostico]'"; 
	$insert = new base_datos;
	$insert->connect();
	$insert->query($sql);
}
//si marcador exacto//	

//asignacion de puntaje en pronostico//


echo "<script>
	alert('Marcador actualizado con exito');
	window.location = 'resultados.php';
	</script>";	

}
else
{
	echo "<script>
	history.back (alert('Debe diligenciar ambos marcadores'));
	</script>";	
}
?>