<?php
$puntos = array();
$cons = new base_datos;
$cons->connect();
$sql = "Select * from pronostico where usuario = '$iu' and puntosobtenidos > 0 and fase = 'Primera Fase'";
$res = $cons->query($sql);
while($dato = $cons->fetch_row($res))	{
	array_push($puntos,$dato);
}
$cant1 = count($puntos);
if($cant1 < 10){
	$aciertos = '0'.$cant1;
} else {
	$aciertos = $cant1;
}
$puntos1 = array();
$cons = new base_datos;
$cons->connect();
$sql = "Select * from pronostico where usuario = '$iu' and puntosobtenidos = 0 and fase = 'Primera Fase'";
$res = $cons->query($sql);
while($dato = $cons->fetch_row($res))	{
	array_push($puntos1,$dato);
}
$cant2 = count($puntos1);

$puntos22 = array();
$cons = new base_datos;
$cons->connect();
$sql = "Select * from fechas where resultado1 != '' and resultado2 != ''";
$res = $cons->query($sql);
while($dato = $cons->fetch_row($res))	{
	array_push($puntos22,$dato);
}
$cant32 = count($puntos22);

if($cant32 > 0){
	$fallidos1 = 0;
	foreach ($puntos22 as $fp){
		
		$idpartido = $fp['id'];
		$puntos11 = array();
		$cons = new base_datos;
		$cons->connect();
		$sql = "Select * from pronostico where usuario = '$iu' and id_partido = '$idpartido' and puntosobtenidos = '0' and fase = 'Primera Fase'";
		$res = $cons->query($sql);
		while($dato = $cons->fetch_row($res))	{
			array_push($puntos11,$dato);
		}
		$cant2f = count($puntos11);
		if ($cant2f > 0){
			$fallidos1 = $fallidos1 + 1;
		}
	
		if($fallidos1 < 10){
			$fallidos = '0'.$fallidos1;
		} else {
			$fallidos = $fallidos1;
		}
		
	}
} else {
	$fallidos = '00';
}



$puntos2 = array();
$cons = new base_datos;
$cons->connect();
$sql = "Select * from pronostico where usuario = '$iu' and fase = 'Primera Fase'";
$res = $cons->query($sql);
while($dato = $cons->fetch_row($res))	{
	array_push($puntos2,$dato);
}
$cant3 = count($puntos2);

$dif = (48 - $cant3);
if($dif < 10){
	$sin = '0'.$dif;
} else {
	$sin = $dif;
}
?>
<div class="row">
	<div  class="col-12 col-sm-6 col-xl-3">
		<div  class="marco-pronostico">	

			<h5 class="sin-margen">Nickname</h5>

			<div class="input-group mb-12">								
			  <!--<select class="form-control form-control-sm form-control-loging">
			  <option class="form-control-opcion">Name nick-1</option>
			  <option class="form-control-opcion">Name nick-2</option>
			  <option class="form-control-opcion">Name nick-3</option>
			  </select>-->
				<h2 style="color: #FFFFFF;"><?php echo $nk;?></h2>
			</div>	
		</div>	
	</div>

	<div  class="col-4 col-sm-6 col-xl-3">							
		<div  class="marco-pronostico">	
			<div  class="icono-pronostico">
			<img src="img/marcador acertado.png" width="504" height="504" alt="Goles a fondo -hales systems" class="img-fluid"/>
			</div>	
			<h5 class="sin-margen">Pronosticos<br> <span>Acertados</span></h5>

			<div class="total-pronostico">								
			<h1 class="sin-margen"><?php echo $aciertos;?></h1>
			</div>	
		</div>	
	</div>

	<div  class="col-4 col-sm-6 col-xl-3">
		<div  class="marco-pronostico">	
			<div  class="icono-pronostico">
			<img src="img/marcador fallidos.png" width="504" height="504" alt="Goles a fondo -hales systems" class="img-fluid"/>
			</div>	
			<h5 class="sin-margen">Pronosticos<br> <span>Fallidos</span></h5>
			<div class="total-pronostico">								
			<h1 class="sin-margen"><?php echo $fallidos;?></h1>
			</div>	
		</div>		
	</div>

	<div  class="col-4 col-sm-6 col-xl-3">
		<div  class="marco-pronostico">	
			<div  class="icono-pronostico">
			<img src="img/sin marcador.png" width="504" height="504" alt="Goles a fondo -hales systems" class="img-fluid"/>
			</div>	
			<h5 class="sin-margen">Sin <br><span>Pronostico</span></h5>


			<div class="total-pronostico">								
			<h1 class="sin-margen"><?php echo $sin;?></h1>
			</div>	
		</div>	
	</div>
</div><!-- row -->