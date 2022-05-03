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

$octavos = array();
$cons = new base_datos;
$cons->connect();
$sql = "Select * from segundafase where anno = '$anno' and fasepartido = 'Octavos' order by fecha Asc, hora asc";
$res = $cons->query($sql);
while($dato = $cons->fetch_row($res))	{
	array_push($octavos,$dato);
}
$cantoctavos = count($octavos);

$cuartos = array();
$cons = new base_datos;
$cons->connect();
$sql = "Select * from segundafase where anno = '$anno' and fasepartido = 'Cuartos' order by fecha Asc, hora asc";
$res = $cons->query($sql);
while($dato = $cons->fetch_row($res))	{
	array_push($cuartos,$dato);
}
$cantcuartos = count($cuartos);

$semi = array();
$cons = new base_datos;
$cons->connect();
$sql = "Select * from segundafase where anno = '$anno' and fasepartido = 'Semifinal' order by fecha Asc, hora asc";
$res = $cons->query($sql);
while($dato = $cons->fetch_row($res))	{
	array_push($semi,$dato);
}
$cantsemi = count($semi);

$final = array();
$cons = new base_datos;
$cons->connect();
$sql = "Select * from segundafase where anno = '$anno' and fasepartido = 'Final' order by fecha Asc, hora asc";
$res = $cons->query($sql);
while($dato = $cons->fetch_row($res))	{
	array_push($final,$dato);
}
$cantfinal = count($final);

$hoy = date('Y-m-d');
$horasparacierre = 1;
?>
<!doctype html>
<html>
<?php include('head.php');?>
<body>
 
 <?php include('header2.php');?>

<div id="st-container" class="st-container">
	
    <?php include('menu_2.php');?>
    
	<!-- content push wrapper -->
	<div class="st-pusher">
		<div class="st-content bg-10"><!-- this is the wrapper for the content -->
			
			<div class="st-content-inner "><!-- extra div for emulating position:fixed of the menu -->
				<div class="main clearfix">
					<div id="st-trigger-effects" class="column">
						<button data-effect="st-effect-4" class="button-inicio">
					 		<i class="fa fa-bars"></i>
					 	</button>                    
					</div>	
					
					<div class="container-fluid">
						
						
						<div class="row">
							<div class="col-md-10 offset-md-1">
								<!--+++++++++++++OCTAVOS+++++++++++++++-->
								<div class="row justify-content-center">
									<div class="col-12 col-sm-8 col-md-6 col-lg-4 margen2-bottom">
										<div class="degra-hor-azul marco-titulos-pages">
											<h3 class="text-center text-white sin-margen">Octavos de Final</h3>
										</div>
										<div class="linea-pages"></div>	
									</div>
								</div><!-- row -->
								
								<?php if($cantoctavos > 0){ ?>
								<form action="guardar_octavos.php" method="post">
								<div class="row justify-content-left">
									<div class="col-12 col-sm-8 col-md-6 col-lg-4 margen2-bottom">
										<button type="submit" class="btn btn-primary">Grabar Marcadores Octavos</button>
									</div>
								</div>
								<input type="hidden" name="datos" id="datos" value="<?php echo $datos;?>"/>
								<?php $i = 0;?>
								<?php foreach ($octavos as $oct){ ?>
								
								<?php if ($i==0) { ?>
								<div class="row justify-content-between">	
									<?php
									$idpartido = $oct['id'];
									$puntosobt = array();
									$cons = new base_datos;
									$cons->connect();
									$sql = "Select * from pronostico where id_partido = '$idpartido' and fase = 'Octavos' and usuario = '$iu'";
									$res = $cons->query($sql);
									while($dato = $cons->fetch_row($res))	{
										array_push($puntosobt,$dato);
									}
									$cantpuntos = count($puntosobt);
									if ($cantpuntos > 0){
										if ($puntosobt[0]['puntosobtenidos'] < 10){
											$totalpuntos = '0'.$puntosobt[0]['puntosobtenidos'];
										} else {
											$totalpuntos = $puntosobt[0]['puntosobtenidos'];
										}
									} else {
										$totalpuntos = '00';
									}
									?>
									<?php
									$equipo1 = $oct['equipo1'];
									$banderas = array();
									$cons = new base_datos;
									$cons->connect();
									$sql = "Select * from equiposmundial where Equipo = '$equipo1'";
									$res = $cons->query($sql);
									while($dato = $cons->fetch_row($res))	{
										array_push($banderas,$dato);
									}
									$bandera1 = $banderas[0]['bandera'];
									$sigla1 = $banderas[0]['sigla'];

									$equipo2 = $oct['equipo2'];
									$banderas2 = array();
									$cons = new base_datos;
									$cons->connect();
									$sql = "Select * from equiposmundial where Equipo = '$equipo2'";
									$res = $cons->query($sql);
									while($dato = $cons->fetch_row($res))	{
										array_push($banderas2,$dato);
									}
									$bandera2 = $banderas2[0]['bandera'];
									$sigla2 = $banderas2[0]['sigla'];
									?>
									<?php
									if ($cantpuntos > 0 ){
									$resultado1 = $puntosobt[0]['golesequipo1'];
									$resultado2 = $puntosobt[0]['golesequipo2'];
									} else {
									$resultado1 = "-";
									$resultado2 = "-";	
									}

									$fechap = explode('-',$oct['fecha']);
									$horap = explode(':',$oct['hora']);
									$fechaf = $fechap[2].'/'.$fechap[1].'/'.$fechap[0];

									$fechapartido = ($fechap[2].'-'.$fechap[1].'-'.$fechap[0].' '.($horap[0]-$horasparacierre).':'.$horap[1]);
									$fecha_cierre = strtotime($fechapartido);

									//echo $fecha_cierre.'<br/>'.$fecha_actual;
									if($fecha_actual < $fecha_cierre){ 
										$estadop = 'ABIERTO';
									} else {
										$estadop = 'CERRADO';
									}
									//echo $estadop;
									?>
									<div class="col-12 col-md-4">
										<div class="marco-octavos">
											<div class="marco-puntos-estado text-center">                                    	
												<div class="puntos">										
													<h4 class="h4">+<?php echo $totalpuntos;?> <span>pts</span></h4>
												</div>
											</div>										
											<div class="marco-equipos-vs">	
												<div class="marco-equipo-A text-center">	
													<img src="img/<?php echo $bandera1;?>" alt="Goles a fondo - Hale systems" class="bandera">
													<h5 class="text-center sin-margen sin-espacio"><small><strong><?php echo $sigla1;?></strong></small></h5>		
												</div>
												<div class="marcador ">	
													<?php if ($estadop == 'ABIERTO'){ ?>
													<input class="form-control form-control-sm text-center form-control-loging" type="number" placeholder="-" min="0" max="99" value="<?php echo $resultado1;?>" name="resultado1-<?php echo $idpartido;?>">
													<?php } else { ?>
													<div class="form-control form-control-sm text-center form-control-loging" style="color:#4B4B4B !important" ><?php echo $resultado1;?></div>	
													<?php } ?>
												</div>
												<div class="marco-vs text-center">	
													<h6 class="sin-margen sin-espacio"><strong>Vs</strong></h6>
												</div>
												<div class="marcador">	
													<?php if ($estadop == 'ABIERTO'){ ?>
													<input class="form-control form-control-sm text-center form-control-loging" type="number" placeholder="-" min="0" max="99" value="<?php echo $resultado2;?>" name="resultado2-<?php echo $idpartido;?>">
													<?php } else { ?>
													<div class="form-control form-control-sm text-center form-control-loging" style="color:#4B4B4B !important"><?php echo $resultado2;?></div>	
													<?php } ?>
												</div>
												<div class="marco-equipo-B text-center">	
													<img src="img/<?php echo $bandera2;?>" alt="Goles a fondo - Hale systems" class="bandera">
													<h5 class="text-center sin-margen sin-espacio"><small><strong><?php echo $sigla2;?></strong></small></h5>
												</div>	
												<div class="align-items-center text-center">	
													<p class="sin-margen sin-espacio"><small>Fecha <?php echo $fechaf;?></small></p>
													<p class="sin-margen sin-espacio"><small><strong>hora <?php echo $oct['hora'];?></strong></small></p>
													<p class="sin-margen sin-espacio"><small><em>&nbsp;</em></small></p>	
												</div>
												<?php
												$golesreal1 = $oct['resultado1'];
												$golesreal2 = $oct['resultado2'];
												$penales1 = $oct['penal1'];
												$penales2 = $oct['penal2'];
												if($golesreal1 != ''){
													if($golesreal1 < 10){ $golesreal1 = '0'.$golesreal1; }
												}
												if($golesreal2 != ''){
													if($golesreal2 < 10){ $golesreal2 = '0'.$golesreal2; }
												}
												if($penales1 != ''){
													if($penales1 < 10){ $penales1 = '0'.$penales1; }
												}
												if($penales2 != ''){
													if($penales2 < 10){ $penales2 = '0'.$penales2; }
												}
												?>
												<div class="pronostico-final">	
													<p class="sin-margen sin-espacio text-left"><small>Resultado final</small></p>
													<p class="sin-margen text-center"><strong><?php echo $golesreal1;?>-<?php echo $golesreal2;?></strong></p>										
												</div>
												<div class="pronostico-final">	
													<p class="sin-margen sin-espacio text-left"><small>Definición por penales</small></p>
													<p class="sin-margen text-center"><strong><?php echo $penales1;?>-<?php echo $penales2;?></strong></p>										
												</div>
											</div>
										</div>
									</div>
								<?php $i = 1; } else { ?>
									<?php
									$idpartido = $oct['id'];
									$puntosobt = array();
									$cons = new base_datos;
									$cons->connect();
									$sql = "Select * from pronostico where id_partido = '$idpartido' and fase = 'Octavos' and usuario = '$iu'";
									$res = $cons->query($sql);
									while($dato = $cons->fetch_row($res))	{
										array_push($puntosobt,$dato);
									}
									$cantpuntos = count($puntosobt);
									if ($cantpuntos > 0){
										if ($puntosobt[0]['puntosobtenidos'] < 10){
											$totalpuntos = '0'.$puntosobt[0]['puntosobtenidos'];
										} else {
											$totalpuntos = $puntosobt[0]['puntosobtenidos'];
										}
									} else {
										$totalpuntos = '00';
									}
									?>
									<?php
									$equipo1 = $oct['equipo1'];
									$banderas = array();
									$cons = new base_datos;
									$cons->connect();
									$sql = "Select * from equiposmundial where Equipo = '$equipo1'";
									$res = $cons->query($sql);
									while($dato = $cons->fetch_row($res))	{
										array_push($banderas,$dato);
									}
									$bandera1 = $banderas[0]['bandera'];
									$sigla1 = $banderas[0]['sigla'];

									$equipo2 = $oct['equipo2'];
									$banderas2 = array();
									$cons = new base_datos;
									$cons->connect();
									$sql = "Select * from equiposmundial where Equipo = '$equipo2'";
									$res = $cons->query($sql);
									while($dato = $cons->fetch_row($res))	{
										array_push($banderas2,$dato);
									}
									$bandera2 = $banderas2[0]['bandera'];
									$sigla2 = $banderas2[0]['sigla'];
									?>
									<?php
									if ($cantpuntos > 0 ){
									$resultado1 = $puntosobt[0]['golesequipo1'];
									$resultado2 = $puntosobt[0]['golesequipo2'];
									} else {
									$resultado1 = "-";
									$resultado2 = "-";	
									}

									$fechap = explode('-',$oct['fecha']);
									$horap = explode(':',$oct['hora']);
									$fechaf = $fechap[2].'/'.$fechap[1].'/'.$fechap[0];

									$fechapartido = ($fechap[2].'-'.$fechap[1].'-'.$fechap[0].' '.($horap[0]-$horasparacierre).':'.$horap[1]);
									$fecha_cierre = strtotime($fechapartido);

									//echo $fecha_cierre.'<br/>'.$fecha_actual;
									if($fecha_actual < $fecha_cierre){ 
										$estadop = 'ABIERTO';
									} else {
										$estadop = 'CERRADO';
									}
									//echo $estadop;
									?>
									<div class="col-12 col-md-4">
										<div class="marco-octavos">
											<div class="marco-puntos-estado text-center">                                    	
												<div class="puntos">										
													<h4 class="h4">+<?php echo $totalpuntos;?> <span>pts</span></h4>
												</div>
											</div>										
											<div class="marco-equipos-vs">	
												<div class="marco-equipo-A text-center">	
													<img src="img/<?php echo $bandera1;?>" alt="Goles a fondo - Hale systems" class="bandera">
													<h5 class="text-center sin-margen sin-espacio"><small><strong><?php echo $sigla1;?></strong></small></h5>		
												</div>
												<div class="marcador ">	
													<?php if ($estadop == 'ABIERTO'){ ?>
													<input class="form-control form-control-sm text-center form-control-loging" type="number" placeholder="-" min="0" max="99" value="<?php echo $resultado1;?>" name="resultado1-<?php echo $idpartido;?>">
													<?php } else { ?>
													<div class="form-control form-control-sm text-center form-control-loging" style="color:#4B4B4B !important" ><?php echo $resultado1;?></div>	
													<?php } ?>
												</div>
												<div class="marco-vs text-center">	
													<h6 class="sin-margen sin-espacio"><strong>Vs</strong></h6>
												</div>
												<div class="marcador">	
													<?php if ($estadop == 'ABIERTO'){ ?>
													<input class="form-control form-control-sm text-center form-control-loging" type="number" placeholder="-" min="0" max="99" value="<?php echo $resultado2;?>" name="resultado2-<?php echo $idpartido;?>">
													<?php } else { ?>
													<div class="form-control form-control-sm text-center form-control-loging" style="color:#4B4B4B !important"><?php echo $resultado2;?></div>	
													<?php } ?>
												</div>
												<div class="marco-equipo-B text-center">	
													<img src="img/<?php echo $bandera2;?>" alt="Goles a fondo - Hale systems" class="bandera">
													<h5 class="text-center sin-margen sin-espacio"><small><strong><?php echo $sigla2;?></strong></small></h5>
												</div>	
												<div class="align-items-center text-center">	
													<p class="sin-margen sin-espacio"><small>Fecha <?php echo $fechaf;?></small></p>
													<p class="sin-margen sin-espacio"><small><strong>hora <?php echo $oct['hora'];?></strong></small></p>
													<p class="sin-margen sin-espacio"><small><em>&nbsp;</em></small></p>	
												</div>
												<?php
												$golesreal1 = $oct['resultado1'];
												$golesreal2 = $oct['resultado2'];
												$penales1 = $oct['penal1'];
												$penales2 = $oct['penal2'];
												if($golesreal1 != ''){
													if($golesreal1 < 10){ $golesreal1 = '0'.$golesreal1; }
												}
												if($golesreal2 != ''){
													if($golesreal2 < 10){ $golesreal2 = '0'.$golesreal2; }
												}
												if($penales1 != ''){
													if($penales1 < 10){ $penales1 = '0'.$penales1; }
												}
												if($penales2 != ''){
													if($penales2 < 10){ $penales2 = '0'.$penales2; }
												}
												?>
												<div class="pronostico-final">	
													<p class="sin-margen sin-espacio text-left"><small>Resultado final</small></p>
													<p class="sin-margen text-center"><strong><?php echo $golesreal1;?>-<?php echo $golesreal2;?></strong></p>										
												</div>
												<div class="pronostico-final">	
													<p class="sin-margen sin-espacio text-left"><small>Definición por penales</small></p>
													<p class="sin-margen text-center"><strong><?php echo $penales1;?>-<?php echo $penales2;?></strong></p>										
												</div>
											</div>
										</div>
									</div>
							  	</div><!-- row -->
								<?php $i = 0; } ?>
								<?php } ?>
								</form>
								<?php } ?>
								
								<hr color="#C1A374">
								
								
								<!--+++++++++++++CUARTOS+++++++++++++++-->
								<div class="row justify-content-center">
									<div class="col-12 col-sm-8 col-md-6 col-lg-4 margen2-bottom">
										<div class="degra-hor-azul marco-titulos-pages">
											<h3 class="text-center text-white sin-margen">Cuartos de Final</h3>
										</div>
										<div class="linea-pages"></div>	
									</div>
								</div><!-- row -->
								
								<?php if($cantcuartos > 0){ ?>
								<form action="guardar_cuartos.php" method="post">
								<div class="row justify-content-left">
									<div class="col-12 col-sm-8 col-md-6 col-lg-4 margen2-bottom">
										<button type="submit" class="btn btn-primary">Grabar Marcadores Cuartos</button>
									</div>
								</div>
								<input type="hidden" name="datos" id="datos" value="<?php echo $datos;?>"/>
									
								<?php $a = 0;?>
								<?php foreach ($cuartos as $cua){ ?>
								
								<?php if ($a==0) { ?>
								<?php
								$idpartido = $cua['id'];
								$puntosobt = array();
								$cons = new base_datos;
								$cons->connect();
								$sql = "Select * from pronostico where id_partido = '$idpartido' and fase = 'Cuartos' and usuario = '$iu'";
								$res = $cons->query($sql);
								while($dato = $cons->fetch_row($res))	{
									array_push($puntosobt,$dato);
								}
								$cantpuntos = count($puntosobt);
								if ($cantpuntos > 0){
									if ($puntosobt[0]['puntosobtenidos'] < 10){
										$totalpuntos = '0'.$puntosobt[0]['puntosobtenidos'];
									} else {
										$totalpuntos = $puntosobt[0]['puntosobtenidos'];
									}
								} else {
									$totalpuntos = '00';
								}
								?>
								<?php
								$equipo1 = $cua['equipo1'];
								$banderas = array();
								$cons = new base_datos;
								$cons->connect();
								$sql = "Select * from equiposmundial where Equipo = '$equipo1'";
								$res = $cons->query($sql);
								while($dato = $cons->fetch_row($res))	{
									array_push($banderas,$dato);
								}
								$bandera1 = $banderas[0]['bandera'];
								$sigla1 = $banderas[0]['sigla'];

								$equipo2 = $cua['equipo2'];
								$banderas2 = array();
								$cons = new base_datos;
								$cons->connect();
								$sql = "Select * from equiposmundial where Equipo = '$equipo2'";
								$res = $cons->query($sql);
								while($dato = $cons->fetch_row($res))	{
									array_push($banderas2,$dato);
								}
								$bandera2 = $banderas2[0]['bandera'];
								$sigla2 = $banderas2[0]['sigla'];
								?>
								<?php
								if ($cantpuntos > 0 ){
								$resultado1 = $puntosobt[0]['golesequipo1'];
								$resultado2 = $puntosobt[0]['golesequipo2'];
								} else {
								$resultado1 = "-";
								$resultado2 = "-";	
								}

								$fechap = explode('-',$cua['fecha']);
								$horap = explode(':',$cua['hora']);
								$fechaf = $fechap[2].'/'.$fechap[1].'/'.$fechap[0];

								$fechapartido = ($fechap[2].'-'.$fechap[1].'-'.$fechap[0].' '.($horap[0]-$horasparacierre).':'.$horap[1]);
								$fecha_cierre = strtotime($fechapartido);

								//echo $fecha_cierre.'<br/>'.$fecha_actual;
								if($fecha_actual < $fecha_cierre){ 
									$estadop = 'ABIERTO';
								} else {
									$estadop = 'CERRADO';
								}
								//echo $estadop;
								?>
								<div class="row justify-content-between">	
									<div class="col-12 col-md-4">
										<div class="marco-octavos">
											<div class="marco-puntos-estado text-center">                                    	
												<div class="puntos">										
													<h4 class="h4">+<?php echo $totalpuntos;?> <span>pts</span></h4>
												</div>
											</div>										
											<div class="marco-equipos-vs">	
												<div class="marco-equipo-A text-center">	
													<img src="img/<?php echo $bandera1;?>" alt="Goles a fondo - Hale systems" class="bandera">
													<h5 class="text-center sin-margen sin-espacio"><small><strong><?php echo $sigla1;?></strong></small></h5>		
												</div>
												<div class="marcador ">	
													<?php if ($estadop == 'ABIERTO'){ ?>
													<input class="form-control form-control-sm text-center form-control-loging" type="number" placeholder="-" min="0" max="99" value="<?php echo $resultado1;?>" name="resultado1-<?php echo $idpartido;?>">
													<?php } else { ?>
													<div class="form-control form-control-sm text-center form-control-loging" style="color:#4B4B4B !important" ><?php echo $resultado1;?></div>	
													<?php } ?>
												</div>
												<div class="marco-vs text-center">	
													<h6 class="sin-margen sin-espacio"><strong>Vs</strong></h6>
												</div>
												<div class="marcador">	
													<?php if ($estadop == 'ABIERTO'){ ?>
													<input class="form-control form-control-sm text-center form-control-loging" type="number" placeholder="-" min="0" max="99" value="<?php echo $resultado2;?>" name="resultado2-<?php echo $idpartido;?>">
													<?php } else { ?>
													<div class="form-control form-control-sm text-center form-control-loging" style="color:#4B4B4B !important"><?php echo $resultado2;?></div>	
													<?php } ?>
												</div>
												<div class="marco-equipo-B text-center">	
													<img src="img/<?php echo $bandera2;?>" alt="Goles a fondo - Hale systems" class="bandera">
													<h5 class="text-center sin-margen sin-espacio"><small><strong><?php echo $sigla2;?></strong></small></h5>
												</div>	
												<div class="align-items-center text-center">	
													<p class="sin-margen sin-espacio"><small>Fecha <?php echo $fechaf;?></small></p>
													<p class="sin-margen sin-espacio"><small><strong>hora <?php echo $cua['hora'];?></strong></small></p>
													<p class="sin-margen sin-espacio"><small><em>&nbsp;</em></small></p>	
												</div>
												<?php
												$golesreal1 = $cua['resultado1'];
												$golesreal2 = $cua['resultado2'];
												$penales1 = $cua['penal1'];
												$penales2 = $cua['penal2'];
												if($golesreal1 != ''){
													if($golesreal1 < 10){ $golesreal1 = '0'.$golesreal1; }
												}
												if($golesreal2 != ''){
													if($golesreal2 < 10){ $golesreal2 = '0'.$golesreal2; }
												}
												if($penales1 != ''){
													if($penales1 < 10){ $penales1 = '0'.$penales1; }
												}
												if($penales2 != ''){
													if($penales2 < 10){ $penales2 = '0'.$penales2; }
												}
												?>
												<div class="pronostico-final">	
													<p class="sin-margen sin-espacio text-left"><small>Resultado final</small></p>
													<p class="sin-margen text-center"><strong><?php echo $golesreal1;?>-<?php echo $golesreal2;?></strong></p>										
												</div>
												<div class="pronostico-final">	
													<p class="sin-margen sin-espacio text-left"><small>Definición por penales</small></p>
													<p class="sin-margen text-center"><strong><?php echo $penales1;?>-<?php echo $penales2;?></strong></p>										
												</div>
											</div>
										</div>
									</div>
									
									<?php $a = 1; } else { ?>
									<?php
									$idpartido = $cua['id'];
									$puntosobt = array();
									$cons = new base_datos;
									$cons->connect();
									$sql = "Select * from pronostico where id_partido = '$idpartido' and fase = 'Cuartos' and usuario = '$iu'";
									$res = $cons->query($sql);
									while($dato = $cons->fetch_row($res))	{
										array_push($puntosobt,$dato);
									}
									$cantpuntos = count($puntosobt);
									if ($cantpuntos > 0){
										if ($puntosobt[0]['puntosobtenidos'] < 10){
											$totalpuntos = '0'.$puntosobt[0]['puntosobtenidos'];
										} else {
											$totalpuntos = $puntosobt[0]['puntosobtenidos'];
										}
									} else {
										$totalpuntos = '00';
									}
									?>
									<?php
									$equipo1 = $cua['equipo1'];
									$banderas = array();
									$cons = new base_datos;
									$cons->connect();
									$sql = "Select * from equiposmundial where Equipo = '$equipo1'";
									$res = $cons->query($sql);
									while($dato = $cons->fetch_row($res))	{
										array_push($banderas,$dato);
									}
									$bandera1 = $banderas[0]['bandera'];
									$sigla1 = $banderas[0]['sigla'];

									$equipo2 = $cua['equipo2'];
									$banderas2 = array();
									$cons = new base_datos;
									$cons->connect();
									$sql = "Select * from equiposmundial where Equipo = '$equipo2'";
									$res = $cons->query($sql);
									while($dato = $cons->fetch_row($res))	{
										array_push($banderas2,$dato);
									}
									$bandera2 = $banderas2[0]['bandera'];
									$sigla2 = $banderas2[0]['sigla'];
									?>
									<?php
									if ($cantpuntos > 0 ){
									$resultado1 = $puntosobt[0]['golesequipo1'];
									$resultado2 = $puntosobt[0]['golesequipo2'];
									} else {
									$resultado1 = "-";
									$resultado2 = "-";	
									}

									$fechap = explode('-',$cua['fecha']);
									$horap = explode(':',$cua['hora']);
									$fechaf = $fechap[2].'/'.$fechap[1].'/'.$fechap[0];

									$fechapartido = ($fechap[2].'-'.$fechap[1].'-'.$fechap[0].' '.($horap[0]-$horasparacierre).':'.$horap[1]);
									$fecha_cierre = strtotime($fechapartido);

									//echo $fecha_cierre.'<br/>'.$fecha_actual;
									if($fecha_actual < $fecha_cierre){ 
										$estadop = 'ABIERTO';
									} else {
										$estadop = 'CERRADO';
									}
									//echo $estadop;
									?>
									<div class="col-12 col-md-4">
										<div class="marco-octavos">
											<div class="marco-puntos-estado text-center">                                    	
												<div class="puntos">										
													<h4 class="h4">+<?php echo $totalpuntos;?> <span>pts</span></h4>
												</div>
											</div>										
											<div class="marco-equipos-vs">	
												<div class="marco-equipo-A text-center">	
													<img src="img/<?php echo $bandera1;?>" alt="Goles a fondo - Hale systems" class="bandera">
													<h5 class="text-center sin-margen sin-espacio"><small><strong><?php echo $sigla1;?></strong></small></h5>		
												</div>
												<div class="marcador ">	
													<?php if ($estadop == 'ABIERTO'){ ?>
													<input class="form-control form-control-sm text-center form-control-loging" type="number" placeholder="-" min="0" max="99" value="<?php echo $resultado1;?>" name="resultado1-<?php echo $idpartido;?>">
													<?php } else { ?>
													<div class="form-control form-control-sm text-center form-control-loging" style="color:#4B4B4B !important" ><?php echo $resultado1;?></div>	
													<?php } ?>
												</div>
												<div class="marco-vs text-center">	
													<h6 class="sin-margen sin-espacio"><strong>Vs</strong></h6>
												</div>
												<div class="marcador">	
													<?php if ($estadop == 'ABIERTO'){ ?>
													<input class="form-control form-control-sm text-center form-control-loging" type="number" placeholder="-" min="0" max="99" value="<?php echo $resultado2;?>" name="resultado2-<?php echo $idpartido;?>">
													<?php } else { ?>
													<div class="form-control form-control-sm text-center form-control-loging" style="color:#4B4B4B !important"><?php echo $resultado2;?></div>	
													<?php } ?>
												</div>
												<div class="marco-equipo-B text-center">	
													<img src="img/<?php echo $bandera2;?>" alt="Goles a fondo - Hale systems" class="bandera">
													<h5 class="text-center sin-margen sin-espacio"><small><strong><?php echo $sigla2;?></strong></small></h5>
												</div>	
												<div class="align-items-center text-center">	
													<p class="sin-margen sin-espacio"><small>Fecha <?php echo $fechaf;?></small></p>
													<p class="sin-margen sin-espacio"><small><strong>hora <?php echo $cua['hora'];?></strong></small></p>
													<p class="sin-margen sin-espacio"><small><em>&nbsp;</em></small></p>	
												</div>
												<?php
												$golesreal1 = $cua['resultado1'];
												$golesreal2 = $cua['resultado2'];
												$penales1 = $cua['penal1'];
												$penales2 = $cua['penal2'];
												if($golesreal1 != ''){
													if($golesreal1 < 10){ $golesreal1 = '0'.$golesreal1; }
												}
												if($golesreal2 != ''){
													if($golesreal2 < 10){ $golesreal2 = '0'.$golesreal2; }
												}
												if($penales1 != ''){
													if($penales1 < 10){ $penales1 = '0'.$penales1; }
												}
												if($penales2 != ''){
													if($penales2 < 10){ $penales2 = '0'.$penales2; }
												}
												?>
												<div class="pronostico-final">	
													<p class="sin-margen sin-espacio text-left"><small>Resultado final</small></p>
													<p class="sin-margen text-center"><strong><?php echo $golesreal1;?>-<?php echo $golesreal2;?></strong></p>										
												</div>
												<div class="pronostico-final">	
													<p class="sin-margen sin-espacio text-left"><small>Definición por penales</small></p>
													<p class="sin-margen text-center"><strong><?php echo $penales1;?>-<?php echo $penales2;?></strong></p>										
												</div>
											</div>
										</div>
									</div>								
									
							  	</div><!-- row -->
									
								<?php $a = 0; } ?>
								<?php } ?>
								</form>
								<?php } ?>
								
								<hr color="#C1A374">
								
								<!--+++++++++++++SEMIFINALES+++++++++++++++-->
								<div class="row justify-content-center">
									<div class="col-12 col-sm-8 col-md-6 col-lg-4 margen2-bottom">
										<div class="degra-hor-azul marco-titulos-pages">
											<h3 class="text-center text-white sin-margen">Semi Final</h3>
										</div>
										<div class="linea-pages"></div>	
									</div>
								</div><!-- row -->								
								
								<?php if($cantsemi > 0){ ?>
								<form action="guardar_semifinal.php" method="post">
								<div class="row justify-content-left">
									<div class="col-12 col-sm-8 col-md-6 col-lg-4 margen2-bottom">
										<button type="submit" class="btn btn-primary">Grabar Marcadores Semifinal</button>
									</div>
								</div>
								<input type="hidden" name="datos" id="datos" value="<?php echo $datos;?>"/>
								
								<div class="row justify-content-between">
									
									<?php foreach ($semi as $sm){ ?>
									
									<?php
									$idpartido = $sm['id'];
									$puntosobt = array();
									$cons = new base_datos;
									$cons->connect();
									$sql = "Select * from pronostico where id_partido = '$idpartido' and fase = 'Semifinal' and usuario = '$iu'";
									$res = $cons->query($sql);
									while($dato = $cons->fetch_row($res))	{
										array_push($puntosobt,$dato);
									}
									$cantpuntos = count($puntosobt);
									if ($cantpuntos > 0){
										if ($puntosobt[0]['puntosobtenidos'] < 10){
											$totalpuntos = '0'.$puntosobt[0]['puntosobtenidos'];
										} else {
											$totalpuntos = $puntosobt[0]['puntosobtenidos'];
										}
									} else {
										$totalpuntos = '00';
									}
									?>
									<?php
									$equipo1 = $sm['equipo1'];
									$banderas = array();
									$cons = new base_datos;
									$cons->connect();
									$sql = "Select * from equiposmundial where Equipo = '$equipo1'";
									$res = $cons->query($sql);
									while($dato = $cons->fetch_row($res))	{
										array_push($banderas,$dato);
									}
									$bandera1 = $banderas[0]['bandera'];
									$sigla1 = $banderas[0]['sigla'];

									$equipo2 = $sm['equipo2'];
									$banderas2 = array();
									$cons = new base_datos;
									$cons->connect();
									$sql = "Select * from equiposmundial where Equipo = '$equipo2'";
									$res = $cons->query($sql);
									while($dato = $cons->fetch_row($res))	{
										array_push($banderas2,$dato);
									}
									$bandera2 = $banderas2[0]['bandera'];
									$sigla2 = $banderas2[0]['sigla'];
									?>
									<?php
									if ($cantpuntos > 0 ){
									$resultado1 = $puntosobt[0]['golesequipo1'];
									$resultado2 = $puntosobt[0]['golesequipo2'];
									} else {
									$resultado1 = "-";
									$resultado2 = "-";	
									}

									$fechap = explode('-',$sm['fecha']);
									$horap = explode(':',$sm['hora']);
									$fechaf = $fechap[2].'/'.$fechap[1].'/'.$fechap[0];

									$fechapartido = ($fechap[2].'-'.$fechap[1].'-'.$fechap[0].' '.($horap[0]-$horasparacierre).':'.$horap[1]);
									$fecha_cierre = strtotime($fechapartido);

									//echo $fecha_cierre.'<br/>'.$fecha_actual;
									if($fecha_actual < $fecha_cierre){ 
										$estadop = 'ABIERTO';
									} else {
										$estadop = 'CERRADO';
									}
									//echo $estadop;
									?>
									<div class="col-12 col-md-4">
										<div class="marco-octavos">
											<div class="marco-puntos-estado text-center">                                    	
												<div class="puntos">										
													<h4 class="h4">+<?php echo $totalpuntos;?> <span>pts</span></h4>
												</div>
											</div>										
											<div class="marco-equipos-vs">	
												<div class="marco-equipo-A text-center">	
													<img src="img/<?php echo $bandera1;?>" alt="Goles a fondo - Hale systems" class="bandera">
													<h5 class="text-center sin-margen sin-espacio"><small><strong><?php echo $sigla1;?></strong></small></h5>		
												</div>
												<div class="marcador ">	
													<?php if ($estadop == 'ABIERTO'){ ?>
													<input class="form-control form-control-sm text-center form-control-loging" type="number" placeholder="-" min="0" max="99" value="<?php echo $resultado1;?>" name="resultado1-<?php echo $idpartido;?>">
													<?php } else { ?>
													<div class="form-control form-control-sm text-center form-control-loging" style="color:#4B4B4B !important" ><?php echo $resultado1;?></div>	
													<?php } ?>
												</div>
												<div class="marco-vs text-center">	
													<h6 class="sin-margen sin-espacio"><strong>Vs</strong></h6>
												</div>
												<div class="marcador">	
													<?php if ($estadop == 'ABIERTO'){ ?>
													<input class="form-control form-control-sm text-center form-control-loging" type="number" placeholder="-" min="0" max="99" value="<?php echo $resultado2;?>" name="resultado2-<?php echo $idpartido;?>">
													<?php } else { ?>
													<div class="form-control form-control-sm text-center form-control-loging" style="color:#4B4B4B !important"><?php echo $resultado2;?></div>	
													<?php } ?>
												</div>
												<div class="marco-equipo-B text-center">	
													<img src="img/<?php echo $bandera2;?>" alt="Goles a fondo - Hale systems" class="bandera">
													<h5 class="text-center sin-margen sin-espacio"><small><strong><?php echo $sigla2;?></strong></small></h5>
												</div>	
												<div class="align-items-center text-center">	
													<p class="sin-margen sin-espacio"><small>Fecha <?php echo $fechaf;?></small></p>
													<p class="sin-margen sin-espacio"><small><strong>hora <?php echo $sm['hora'];?></strong></small></p>
													<p class="sin-margen sin-espacio"><small><em>&nbsp;</em></small></p>	
												</div>
												<?php
												$golesreal1 = $sm['resultado1'];
												$golesreal2 = $sm['resultado2'];
												$penales1 = $sm['penal1'];
												$penales2 = $sm['penal2'];
												if($golesreal1 != ''){
													if($golesreal1 < 10){ $golesreal1 = '0'.$golesreal1; }
												}
												if($golesreal2 != ''){
													if($golesreal2 < 10){ $golesreal2 = '0'.$golesreal2; }
												}
												if($penales1 != ''){
													if($penales1 < 10){ $penales1 = '0'.$penales1; }
												}
												if($penales2 != ''){
													if($penales2 < 10){ $penales2 = '0'.$penales2; }
												}
												?>
												<div class="pronostico-final">	
													<p class="sin-margen sin-espacio text-left"><small>Resultado final</small></p>
													<p class="sin-margen text-center"><strong><?php echo $golesreal1;?>-<?php echo $golesreal2;?></strong></p>										
												</div>
												<div class="pronostico-final">	
													<p class="sin-margen sin-espacio text-left"><small>Definición por penales</small></p>
													<p class="sin-margen text-center"><strong><?php echo $penales1;?>-<?php echo $penales2;?></strong></p>										
												</div>
											</div>
										</div>
									</div>	
									
									<?php } ?>
									
							  	</div><!-- row -->
								</form>
								<?php } ?>
								
								<hr color="#C1A374">
								
								<!--+++++++++++++FINALES+++++++++++++++-->
								<div class="row justify-content-center">
									<div class="col-12 col-sm-8 col-md-6 col-lg-4 margen2-bottom">
										<div class="degra-hor-azul marco-titulos-pages">
											<h3 class="text-center text-white sin-margen">Finales</h3>
										</div>
										<div class="linea-pages"></div>	
									</div>
								</div><!-- row -->	
								
								<?php if($cantfinal > 0){ ?>
								<form action="guardar_final.php" method="post">
								<div class="row justify-content-left">
									<div class="col-12 col-sm-8 col-md-6 col-lg-4 margen2-bottom">
										<button type="submit" class="btn btn-primary">Grabar Marcadores Final</button>
									</div>
								</div>
								<input type="hidden" name="datos" id="datos" value="<?php echo $datos;?>"/>
								
								<div class="row">
									<?php foreach ($final as $fn){ ?>
									<?php
									$idpartido = $fn['id'];
									$puntosobt = array();
									$cons = new base_datos;
									$cons->connect();
									$sql = "Select * from pronostico where id_partido = '$idpartido' and fase = 'Final' and usuario = '$iu'";
									$res = $cons->query($sql);
									while($dato = $cons->fetch_row($res))	{
										array_push($puntosobt,$dato);
									}
									$cantpuntos = count($puntosobt);
									if ($cantpuntos > 0){
										if ($puntosobt[0]['puntosobtenidos'] < 10){
											$totalpuntos = '0'.$puntosobt[0]['puntosobtenidos'];
										} else {
											$totalpuntos = $puntosobt[0]['puntosobtenidos'];
										}
									} else {
										$totalpuntos = '00';
									}
									?>
									<?php
									$equipo1 = $fn['equipo1'];
									$banderas = array();
									$cons = new base_datos;
									$cons->connect();
									$sql = "Select * from equiposmundial where Equipo = '$equipo1'";
									$res = $cons->query($sql);
									while($dato = $cons->fetch_row($res))	{
										array_push($banderas,$dato);
									}
									$bandera1 = $banderas[0]['bandera'];
									$sigla1 = $banderas[0]['sigla'];

									$equipo2 = $fn['equipo2'];
									$banderas2 = array();
									$cons = new base_datos;
									$cons->connect();
									$sql = "Select * from equiposmundial where Equipo = '$equipo2'";
									$res = $cons->query($sql);
									while($dato = $cons->fetch_row($res))	{
										array_push($banderas2,$dato);
									}
									$bandera2 = $banderas2[0]['bandera'];
									$sigla2 = $banderas2[0]['sigla'];
									?>
									<?php
									if ($cantpuntos > 0 ){
									$resultado1 = $puntosobt[0]['golesequipo1'];
									$resultado2 = $puntosobt[0]['golesequipo2'];
									} else {
									$resultado1 = "-";
									$resultado2 = "-";	
									}

									$fechap = explode('-',$fn['fecha']);
									$horap = explode(':',$fn['hora']);
									$fechaf = $fechap[2].'/'.$fechap[1].'/'.$fechap[0];

									$fechapartido = ($fechap[2].'-'.$fechap[1].'-'.$fechap[0].' '.($horap[0]-$horasparacierre).':'.$horap[1]);
									$fecha_cierre = strtotime($fechapartido);

									//echo $fecha_cierre.'<br/>'.$fecha_actual;
									if($fecha_actual < $fecha_cierre){ 
										$estadop = 'ABIERTO';
									} else {
										$estadop = 'CERRADO';
									}
									//echo $estadop;
									?>
									<div class="col-md-4 offset-md-4">
										<div class="marco-octavos">
											<div class="marco-puntos-estado text-center">                                    	
												<div class="puntos">										
													<h4 class="h4">+<?php echo $totalpuntos;?> <span>pts</span></h4>
												</div>
											</div>										
											<div class="marco-equipos-vs">	
												<div class="marco-equipo-A text-center">	
													<img src="img/<?php echo $bandera1;?>" alt="Goles a fondo - Hale systems" class="bandera">
													<h5 class="text-center sin-margen sin-espacio"><small><strong><?php echo $sigla1;?></strong></small></h5>		
												</div>
												<div class="marcador ">	
													<?php if ($estadop == 'ABIERTO'){ ?>
													<input class="form-control form-control-sm text-center form-control-loging" type="number" placeholder="-" min="0" max="99" value="<?php echo $resultado1;?>" name="resultado1-<?php echo $idpartido;?>">
													<?php } else { ?>
													<div class="form-control form-control-sm text-center form-control-loging" style="color:#4B4B4B !important" ><?php echo $resultado1;?></div>	
													<?php } ?>
												</div>
												<div class="marco-vs text-center">	
													<h6 class="sin-margen sin-espacio"><strong>Vs</strong></h6>
												</div>
												<div class="marcador">	
													<?php if ($estadop == 'ABIERTO'){ ?>
													<input class="form-control form-control-sm text-center form-control-loging" type="number" placeholder="-" min="0" max="99" value="<?php echo $resultado2;?>" name="resultado2-<?php echo $idpartido;?>">
													<?php } else { ?>
													<div class="form-control form-control-sm text-center form-control-loging" style="color:#4B4B4B !important"><?php echo $resultado2;?></div>	
													<?php } ?>
												</div>
												<div class="marco-equipo-B text-center">	
													<img src="img/<?php echo $bandera2;?>" alt="Goles a fondo - Hale systems" class="bandera">
													<h5 class="text-center sin-margen sin-espacio"><small><strong><?php echo $sigla2;?></strong></small></h5>
												</div>	
												<div class="align-items-center text-center">	
													<p class="sin-margen sin-espacio"><small>Fecha <?php echo $fechaf;?></small></p>
													<p class="sin-margen sin-espacio"><small><strong>hora <?php echo $fn['hora'];?></strong></small></p>
													<p class="sin-margen sin-espacio"><small><em>&nbsp;</em></small></p>	
												</div>
												<?php
												$golesreal1 = $fn['resultado1'];
												$golesreal2 = $fn['resultado2'];
												$penales1 = $fn['penal1'];
												$penales2 = $fn['penal2'];
												if($golesreal1 != ''){
													if($golesreal1 < 10){ $golesreal1 = '0'.$golesreal1; }
												}
												if($golesreal2 != ''){
													if($golesreal2 < 10){ $golesreal2 = '0'.$golesreal2; }
												}
												if($penales1 != ''){
													if($penales1 < 10){ $penales1 = '0'.$penales1; }
												}
												if($penales2 != ''){
													if($penales2 < 10){ $penales2 = '0'.$penales2; }
												}
												?>
												<div class="pronostico-final">	
													<p class="sin-margen sin-espacio text-left"><small>Resultado final</small></p>
													<p class="sin-margen text-center"><strong><?php echo $golesreal1;?>-<?php echo $golesreal2;?></strong></p>										
												</div>
												<div class="pronostico-final">	
													<p class="sin-margen sin-espacio text-left"><small>Definición por penales</small></p>
													<p class="sin-margen text-center"><strong><?php echo $penales1;?>-<?php echo $penales2;?></strong></p>										
												</div>
											</div>
										</div>
									</div>	
									<?php } ?>
									
							  	</div><!-- row -->
								</form>
								<?php } ?>
								
							</div>
						 </div><!-- row -->	
					</div><!-- container-fluid -->	
					
				</div><!-- /main -->
			</div><!-- /st-content-inner -->
		</div><!-- /st-content -->
	</div><!-- /st-pusher -->
</div><!-- /st-container -->
	
<footer class="footer-GF">	
<div class="container-fluid">
	<div class="row justify-content-end text-right">
    	<div class="col-12 col-sm-7">
             <div class="desarrollo2"><!--inicio_desarrollo2-->  
                <div class="hale">
                <img src="img/logo-hale.png" class="img-fluid"> 
                </div> 
                <p>Diseño y Desarrollo
                <a href="http://www.halesystems.com" class="vineta" >
                <strong>Hale Systems S.A.S</strong></a><br/>
                Bogotá D.C. - Colombia.<br/>
                Derechos Reservados C 2018.</p>            
             </div><!--ifin_links-->
              
        	 <div class="desarrollo"><!--inicio_links-->
                <p><br/>    
                Recomendado visualizar en:<br/> 
                IE 10-11 / Chrome / Firefox 10.0 / Safari</p>
              </div><!--ifin_links-->               
              
        </div><!-- col-4 -->
	</div><!-- row -->
</div><!--container -->
</footer>


<script src="https://tympanus.net/Development/SidebarTransitions/js/sidebarEffects.js"></script>
<script src="https://tympanus.net/Development/SidebarTransitions/js/classie.js"></script>
<script>
!function(a){"use strict";a('a.js-scroll-trigger[href*="#"]:not([href="#"])').click(function(){if(location.pathname.replace(/^\//,"")==this.pathname.replace(/^\//,"")&&location.hostname==this.hostname){var e=a(this.hash);if((e=e.length?e:a("[name="+this.hash.slice(1)+"]")).length)return a("html, body").animate({scrollTop:e.offset().top-57},1e3,"easeInOutExpo"),!1}}),a(".js-scroll-trigger").click(function(){a(".navbar-collapse").collapse("hide")}),a("body").scrollspy({target:"#mainNav",offset:57});var e=function(){a("#mainNav").offset().top>100?a("#mainNav").addClass("navbar-shrink"):a("#mainNav").removeClass("navbar-shrink")};e(),a(window).scroll(e),window.sr=ScrollReveal(),sr.reveal(".sr-icons",{duration:600,scale:.3,distance:"0px"},200),sr.reveal(".sr-button",{duration:1e3,delay:200}),sr.reveal(".sr-contact",{duration:600,scale:.3,distance:"0px"},300),a(".popup-gallery").magnificPopup({delegate:"a",type:"image",tLoading:"Loading image #%curr%...",mainClass:"mfp-img-mobile",gallery:{enabled:!0,navigateByImgClick:!0,preload:[0,1]},image:{tError:'<a href="%url%">The image #%curr%</a> could not be loaded.'}})}(jQuery);	
</script>
</body>
</html>
