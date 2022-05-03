<?php
date_default_timezone_set('America/Bogota');
$fecha_actual = strtotime(date("d-m-Y H:i",time()));
$horasparacierre = 1;
require('classes/bd.class.php');
//INICIO DATOS//
$datos = $_POST['datos'];
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
//FIN DATOS//
for($i=15;$i<=16;$i++){
	
	if(($_POST['resultado1-'.$i]!='')and($_POST['resultado2-'.$i]!='')){
		
		//INICIO COMPROBAR ESTADO PARTIDO//
		$fechas = array();
		$cons = new base_datos;
		$cons->connect();
		$sql = "Select * from segundafase where anno = '$anno' and id='$i' and fasepartido = 'Final'";
		$res = $cons->query($sql);
		while($dato = $cons->fetch_row($res))	{
			array_push($fechas,$dato);
		}
		$fechap = explode('-',$fechas[0]['fecha']);
		$horap = explode(':',$fechas[0]['hora']);
		$fechaf = $fechap[2].'/'.$fechap[1].'/'.$fechap[0];

		$fechapartido = ($fechap[2].'-'.$fechap[1].'-'.$fechap[0].' '.($horap[0]-$horasparacierre).':'.$horap[1]);
		$fecha_cierre = strtotime($fechapartido);

		//echo $fecha_cierre.'<br/>'.$fecha_actual;
		if($fecha_actual < $fecha_cierre){ 
			$estadop = 'ABIERTO';
		} else {
			$estadop = 'CERRADO';
		}
		//FIN COMPROBAR ESTADO PARTIDO//
		if ($estadop == 'ABIERTO'){
			
			$goles1 = $_POST['resultado1-'.$i];
			$goles2 = $_POST['resultado2-'.$i];
			$primergol = '';
			
			//INICIO GANADOR//
			$equipo1 = $fechas[0]["equipo1"];
			$equipo2 = $fechas[0]["equipo2"];
			
			if ($goles1 > $goles2){
				$ganador = $equipo1;
			} else if ($goles2 > $goles1){
				$ganador = $equipo2;
			} else if ($goles1 == $goles2){
				$ganador = 'EMPATE';
			}
			//FIN GANADOR//
			
			$puntosobt = array();
			$cons = new base_datos;
			$cons->connect();
			$sql = "Select * from pronostico where id_partido = '$i' and fase = 'Final' and usuario = '$iu'";
			$res = $cons->query($sql);
			while($dato = $cons->fetch_row($res))	{
				array_push($puntosobt,$dato);
			}
			$cantpuntos = count($puntosobt);
			if ($cantpuntos > 0){
				
				$sql = "UPDATE pronostico SET golesequipo1 = '$goles1', golesequipo2 = '$goles2', equipoganador = '$ganador', primergol = '$primergol' where id_partido = '$i' and fase = 'Final' and usuario = '$iu'";
				
			} else {
				
				$sql = "INSERT INTO pronostico (id_partido,golesequipo1,golesequipo2,fase,anno,usuario,puntosobtenidos,equipoganador,primergol) VALUES ('$i','$goles1','$goles2','Final','$anno','$iu','0','$ganador','$primergol')";
			}
			$insert = new base_datos;
			$insert->connect();
			$insert->query($sql);	
			//echo $i.': Equipo1='.$_POST['resultado1-'.$i].' Equipo2='.$_POST['resultado2-'.$i].' / Primero='.$_POST['partido'.$i].'<br>';
			
			
			
		} else {
			$e1 = $fechas[0]['equipo1'].' VS '.$fechas[0]['equipo2'];
			$mensaje = 'No se puede actualizar el marcador del partido entre '.$e1.' esta fuera del tiempo de posiblidad';
			
			echo "<script>
				alert('".$mensaje."');
			</script>";
		}
		
	}
	
}
echo "<script>
	alert('Marcadores de Final actualizados con exito');
	window.location.href = 'segunda_ronda.php?datos=".$datos."';
</script>";
?>