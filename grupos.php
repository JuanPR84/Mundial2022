<?php
date_default_timezone_set('America/Bogota');
$fecha_actual = strtotime(date("d-m-Y H:i",time()));

require('../classes/bd.class.php');
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

$fechas = array();
$cons = new base_datos;
$cons->connect();
$sql = "Select * from equiposmundial order by Grupo Asc, Puntos Desc";
$res = $cons->query($sql);
while($dato = $cons->fetch_row($res))	{
	array_push($fechas,$dato);
}
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
		<div class="st-content bg-04"><!-- this is the wrapper for the content -->
			
			<div class="st-content-inner "><!-- extra div for emulating position:fixed of the menu -->
				<div class="main clearfix">
					<div id="st-trigger-effects" class="column">
						<button data-effect="st-effect-4" class="button-inicio">
					 		<i class="fa fa-bars"></i>
					 	</button>
					</div>	
					
					<div class="container-fluid">  
						<div class="row">
                        	<div class="col-sm-6 offset-sm-3 col-xl-4 offset-xl-4">
								
								<div class="degra-hor-dorado marco-titulos-pages ">
								<h2 class="text-center text-white sin-margen">Tabla de Grupos</h2>
								</div>
								<div class="linea-pages"></div>	
							</div>	
                        </div>
                        <hr>    
                        <div class="row"> 
							<div  class="col-md-10 offset-md-1">
								<div class="row">
                                
                                                                 
									<div  class="col-12 col-sm-6 margen2-bottom">
									<table  width="100%" border="0" class="table-hover table-striped table-sm table-bordered" role="grid" cellpadding="0">
										<thead >                                    										
											<tr align="center" class="cabezote-grupos" >										 
											  <td align="left" class="sin-border degra-hor-dorado"><h3>Grupo<span> A</span></h3></td>
											  <td class="sin-border-izqui">PJ</td>
											  <td>PG</td>
											  <td>PE</td>
											  <td>PP</td>
											  <td>GF</td>
											  <td>GC</td>
											  <td class="sin-border-der">PTS.</td>
											</tr>
										</thead>
										<tbody class="body-grupos">
											<tr align="center">										 
											   <td align="left" class="sin-border-izqui sin-border-top">
												  <div class="icono-grupo">
												  <img src="img/<?php echo $fechas[0]['bandera'];?>" alt="Goles a fondo - Hale systems" class="img-fluid">	  
												  </div>
												  <p><?php echo $fechas[0]['Equipo'];?></p>									      
											  </td>
											  <td><?php echo $fechas[0]['P_jugados'];?></td>
											  <td><?php echo $fechas[0]['P_ganados'];?></td>
											  <td><?php echo $fechas[0]['P_empatados'];?></td>
											  <td><?php echo $fechas[0]['P_perdidos'];?></td>
											  <td><?php echo $fechas[0]['goles_f'];?></td>
											  <td><?php echo $fechas[0]['goles_c'];?></td>
											  <td class="sin-border-der"><?php echo $fechas[0]['Puntos'];?></td>
											</tr>
											<tr align="center">										 
											   <td align="left" class="sin-border-izqui sin-border-top">
												  <div class="icono-grupo">
												  <img src="img/<?php echo $fechas[1]['bandera'];?>" alt="Goles a fondo - Hale systems" class="img-fluid">	  
												  </div>
												  <p><?php echo $fechas[1]['Equipo'];?></p>									      
											  </td>
											  <td><?php echo $fechas[1]['P_jugados'];?></td>
											  <td><?php echo $fechas[1]['P_ganados'];?></td>
											  <td><?php echo $fechas[1]['P_empatados'];?></td>
											  <td><?php echo $fechas[1]['P_perdidos'];?></td>
											  <td><?php echo $fechas[1]['goles_f'];?></td>
											  <td><?php echo $fechas[1]['goles_c'];?></td>
											  <td class="sin-border-der"><?php echo $fechas[1]['Puntos'];?></td>
											</tr>
											<tr align="center">										 
											   <td align="left" class="sin-border-izqui sin-border-top">
												  <div class="icono-grupo">
												  <img src="img/<?php echo $fechas[2]['bandera'];?>" alt="Goles a fondo - Hale systems" class="img-fluid">	  
												  </div>
												  <p><?php echo $fechas[2]['Equipo'];?></p>									      
											  </td>
											  <td><?php echo $fechas[2]['P_jugados'];?></td>
											  <td><?php echo $fechas[2]['P_ganados'];?></td>
											  <td><?php echo $fechas[2]['P_empatados'];?></td>
											  <td><?php echo $fechas[2]['P_perdidos'];?></td>
											  <td><?php echo $fechas[2]['goles_f'];?></td>
											  <td><?php echo $fechas[2]['goles_c'];?></td>
											  <td class="sin-border-der"><?php echo $fechas[2]['Puntos'];?></td>
											</tr>
											<tr align="center">										 
											   <td align="left" class="sin-border-izqui sin-border-top">
												  <div class="icono-grupo">
												  <img src="img/<?php echo $fechas[3]['bandera'];?>" alt="Goles a fondo - Hale systems" class="img-fluid">	  
												  </div>
												  <p><?php echo $fechas[3]['Equipo'];?></p>									      
											  </td>
											  <td><?php echo $fechas[3]['P_jugados'];?></td>
											  <td><?php echo $fechas[3]['P_ganados'];?></td>
											  <td><?php echo $fechas[3]['P_empatados'];?></td>
											  <td><?php echo $fechas[3]['P_perdidos'];?></td>
											  <td><?php echo $fechas[3]['goles_f'];?></td>
											  <td><?php echo $fechas[3]['goles_c'];?></td>
											  <td class="sin-border-der"><?php echo $fechas[3]['Puntos'];?></td>
											</tr>
										  </tbody>
										</table>	
									</div><!-- col-6 -->
									
									<div  class="col-12 col-sm-6 margen2-bottom">
									<table width="100%" border="0" class="table-hover table-striped table-sm table-bordered" role="grid" cellpadding="0">
										<thead >                                    										
											<tr align="center" class="cabezote-grupos" >										 
											  <td align="left" class="sin-border degra-hor-rojo"><h3>Grupo<span> B</span></h3></td>
											  <td class="sin-border-izqui">PJ</td>
											  <td>PG</td>
											  <td>PE</td>
											  <td>PP</td>
											  <td>GF</td>
											  <td>GC</td>
											  <td class="sin-border-der">PTS.</td>
											</tr>
										</thead>
										<tbody class="body-grupos">
											<tr align="center">										 
											   <td align="left" class="sin-border-izqui sin-border-top">
												  <div class="icono-grupo">
												  <img src="img/<?php echo $fechas[4]['bandera'];?>" alt="Goles a fondo - Hale systems" class="img-fluid">	  
												  </div>
												  <p><?php echo $fechas[4]['Equipo'];?></p>									      
											  </td>
											  <td><?php echo $fechas[4]['P_jugados'];?></td>
											  <td><?php echo $fechas[4]['P_ganados'];?></td>
											  <td><?php echo $fechas[4]['P_empatados'];?></td>
											  <td><?php echo $fechas[4]['P_perdidos'];?></td>
											  <td><?php echo $fechas[4]['goles_f'];?></td>
											  <td><?php echo $fechas[4]['goles_c'];?></td>
											  <td class="sin-border-der"><?php echo $fechas[4]['Puntos'];?></td>
											</tr>
											<tr align="center">										 
											   <td align="left" class="sin-border-izqui sin-border-top">
												  <div class="icono-grupo">
												  <img src="img/<?php echo $fechas[5]['bandera'];?>" alt="Goles a fondo - Hale systems" class="img-fluid">	  
												  </div>
												  <p><?php echo $fechas[5]['Equipo'];?></p>									      
											  </td>
											  <td><?php echo $fechas[5]['P_jugados'];?></td>
											  <td><?php echo $fechas[5]['P_ganados'];?></td>
											  <td><?php echo $fechas[5]['P_empatados'];?></td>
											  <td><?php echo $fechas[5]['P_perdidos'];?></td>
											  <td><?php echo $fechas[5]['goles_f'];?></td>
											  <td><?php echo $fechas[5]['goles_c'];?></td>
											  <td class="sin-border-der"><?php echo $fechas[5]['Puntos'];?></td>
											</tr>
											<tr align="center">										 
											   <td align="left" class="sin-border-izqui sin-border-top">
												  <div class="icono-grupo">
												  <img src="img/<?php echo $fechas[6]['bandera'];?>" alt="Goles a fondo - Hale systems" class="img-fluid">	  
												  </div>
												  <p><?php echo $fechas[6]['Equipo'];?></p>									      
											  </td>
											  <td><?php echo $fechas[6]['P_jugados'];?></td>
											  <td><?php echo $fechas[6]['P_ganados'];?></td>
											  <td><?php echo $fechas[6]['P_empatados'];?></td>
											  <td><?php echo $fechas[6]['P_perdidos'];?></td>
											  <td><?php echo $fechas[6]['goles_f'];?></td>
											  <td><?php echo $fechas[6]['goles_c'];?></td>
											  <td class="sin-border-der"><?php echo $fechas[6]['Puntos'];?></td>
											</tr>
											<tr align="center">										 
											   <td align="left" class="sin-border-izqui sin-border-top">
												  <div class="icono-grupo">
												  <img src="img/<?php echo $fechas[7]['bandera'];?>" alt="Goles a fondo - Hale systems" class="img-fluid">	  
												  </div>
												  <p><?php echo $fechas[7]['Equipo'];?></p>									      
											  </td>
											  <td><?php echo $fechas[7]['P_jugados'];?></td>
											  <td><?php echo $fechas[7]['P_ganados'];?></td>
											  <td><?php echo $fechas[7]['P_empatados'];?></td>
											  <td><?php echo $fechas[7]['P_perdidos'];?></td>
											  <td><?php echo $fechas[7]['goles_f'];?></td>
											  <td><?php echo $fechas[7]['goles_c'];?></td>
											  <td class="sin-border-der"><?php echo $fechas[7]['Puntos'];?></td>
											</tr>
										  </tbody>
										</table>	
									</div><!-- col-6 -->
								</div><!-- row -->
								
								<div class="row"> 
									<div  class="col-12 col-sm-6 margen2-bottom">
									<table  width="100%" border="0" class="table-hover table-striped table-sm table-bordered" role="grid" cellpadding="0">
										<thead >                                    										
											<tr align="center" class="cabezote-grupos" >										 
											  <td align="left" class="sin-border degra-hor-azul"><h3>Grupo<span> C</span></h3></td>
											  <td class="sin-border-izqui">PJ</td>
											  <td>PG</td>
											  <td>PE</td>
											  <td>PP</td>
											  <td>GF</td>
											  <td>GC</td>
											  <td class="sin-border-der">PTS.</td>
											</tr>
										</thead>
										<tbody class="body-grupos">
											<tr align="center">										 
											   <td align="left" class="sin-border-izqui sin-border-top">
												  <div class="icono-grupo">
												  <img src="img/<?php echo $fechas[8]['bandera'];?>" alt="Goles a fondo - Hale systems" class="img-fluid">	  
												  </div>
												  <p><?php echo $fechas[8]['Equipo'];?></p>									      
											  </td>
											  <td><?php echo $fechas[8]['P_jugados'];?></td>
											  <td><?php echo $fechas[8]['P_ganados'];?></td>
											  <td><?php echo $fechas[8]['P_empatados'];?></td>
											  <td><?php echo $fechas[8]['P_perdidos'];?></td>
											  <td><?php echo $fechas[8]['goles_f'];?></td>
											  <td><?php echo $fechas[8]['goles_c'];?></td>
											  <td class="sin-border-der"><?php echo $fechas[8]['Puntos'];?></td>
											</tr>
											<tr align="center">										 
											   <td align="left" class="sin-border-izqui sin-border-top">
												  <div class="icono-grupo">
												  <img src="img/<?php echo $fechas[9]['bandera'];?>" alt="Goles a fondo - Hale systems" class="img-fluid">	  
												  </div>
												  <p><?php echo $fechas[9]['Equipo'];?></p>									      
											  </td>
											  <td><?php echo $fechas[9]['P_jugados'];?></td>
											  <td><?php echo $fechas[9]['P_ganados'];?></td>
											  <td><?php echo $fechas[9]['P_empatados'];?></td>
											  <td><?php echo $fechas[9]['P_perdidos'];?></td>
											  <td><?php echo $fechas[9]['goles_f'];?></td>
											  <td><?php echo $fechas[9]['goles_c'];?></td>
											  <td class="sin-border-der"><?php echo $fechas[9]['Puntos'];?></td>
											</tr>
											<tr align="center">										 
											   <td align="left" class="sin-border-izqui sin-border-top">
												  <div class="icono-grupo">
												  <img src="img/<?php echo $fechas[10]['bandera'];?>" alt="Goles a fondo - Hale systems" class="img-fluid">	  
												  </div>
												  <p><?php echo $fechas[10]['Equipo'];?></p>									      
											  </td>
											  <td><?php echo $fechas[10]['P_jugados'];?></td>
											  <td><?php echo $fechas[10]['P_ganados'];?></td>
											  <td><?php echo $fechas[10]['P_empatados'];?></td>
											  <td><?php echo $fechas[10]['P_perdidos'];?></td>
											  <td><?php echo $fechas[10]['goles_f'];?></td>
											  <td><?php echo $fechas[10]['goles_c'];?></td>
											  <td class="sin-border-der"><?php echo $fechas[10]['Puntos'];?></td>
											</tr>
											<tr align="center">										 
											   <td align="left" class="sin-border-izqui sin-border-top">
												  <div class="icono-grupo">
												  <img src="img/<?php echo $fechas[11]['bandera'];?>" alt="Goles a fondo - Hale systems" class="img-fluid">	  
												  </div>
												  <p><?php echo $fechas[11]['Equipo'];?></p>									      
											  </td>
											  <td><?php echo $fechas[11]['P_jugados'];?></td>
											  <td><?php echo $fechas[11]['P_ganados'];?></td>
											  <td><?php echo $fechas[11]['P_empatados'];?></td>
											  <td><?php echo $fechas[11]['P_perdidos'];?></td>
											  <td><?php echo $fechas[11]['goles_f'];?></td>
											  <td><?php echo $fechas[11]['goles_c'];?></td>
											  <td class="sin-border-der"><?php echo $fechas[11]['Puntos'];?></td>
											</tr>
										  </tbody>
										</table>	
									</div><!-- col-6 -->

									<div  class="col-12 col-sm-6 margen2-bottom">
									<table width="100%" border="0" class="table-hover table-striped table-sm table-bordered" role="grid" cellpadding="0">
										<thead >                                    										
											<tr align="center" class="cabezote-grupos" >										 
											  <td align="left" class="sin-border degra-hor-verde "><h3>Grupo<span> D</span></h3></td>
											  <td class="sin-border-izqui">PJ</td>
											  <td>PG</td>
											  <td>PE</td>
											  <td>PP</td>
											  <td>GF</td>
											  <td>GC</td>
											  <td class="sin-border-der">PTS.</td>
											</tr>
										</thead>
										<tbody class="body-grupos">
											<tr align="center">										 
											   <td align="left" class="sin-border-izqui sin-border-top">
												  <div class="icono-grupo">
												  <img src="img/<?php echo $fechas[12]['bandera'];?>" alt="Goles a fondo - Hale systems" class="img-fluid">	  
												  </div>
												  <p><?php echo $fechas[12]['Equipo'];?></p>									      
											  </td>
											  <td><?php echo $fechas[12]['P_jugados'];?></td>
											  <td><?php echo $fechas[12]['P_ganados'];?></td>
											  <td><?php echo $fechas[12]['P_empatados'];?></td>
											  <td><?php echo $fechas[12]['P_perdidos'];?></td>
											  <td><?php echo $fechas[12]['goles_f'];?></td>
											  <td><?php echo $fechas[12]['goles_c'];?></td>
											  <td class="sin-border-der"><?php echo $fechas[12]['Puntos'];?></td>
											</tr>
											<tr align="center">										 
											   <td align="left" class="sin-border-izqui sin-border-top">
												  <div class="icono-grupo">
												  <img src="img/<?php echo $fechas[13]['bandera'];?>" alt="Goles a fondo - Hale systems" class="img-fluid">	  
												  </div>
												  <p><?php echo $fechas[13]['Equipo'];?></p>									      
											  </td>
											  <td><?php echo $fechas[13]['P_jugados'];?></td>
											  <td><?php echo $fechas[13]['P_ganados'];?></td>
											  <td><?php echo $fechas[13]['P_empatados'];?></td>
											  <td><?php echo $fechas[13]['P_perdidos'];?></td>
											  <td><?php echo $fechas[13]['goles_f'];?></td>
											  <td><?php echo $fechas[13]['goles_c'];?></td>
											  <td class="sin-border-der"><?php echo $fechas[13]['Puntos'];?></td>
											</tr>
											<tr align="center">										 
											   <td align="left" class="sin-border-izqui sin-border-top">
												  <div class="icono-grupo">
												  <img src="img/<?php echo $fechas[14]['bandera'];?>" alt="Goles a fondo - Hale systems" class="img-fluid">	  
												  </div>
												  <p><?php echo $fechas[14]['Equipo'];?></p>									      
											  </td>
											  <td><?php echo $fechas[14]['P_jugados'];?></td>
											  <td><?php echo $fechas[14]['P_ganados'];?></td>
											  <td><?php echo $fechas[14]['P_empatados'];?></td>
											  <td><?php echo $fechas[14]['P_perdidos'];?></td>
											  <td><?php echo $fechas[14]['goles_f'];?></td>
											  <td><?php echo $fechas[14]['goles_c'];?></td>
											  <td class="sin-border-der"><?php echo $fechas[14]['Puntos'];?></td>
											</tr>
											<tr align="center">										 
											   <td align="left" class="sin-border-izqui sin-border-top">
												  <div class="icono-grupo">
												  <img src="img/<?php echo $fechas[15]['bandera'];?>" alt="Goles a fondo - Hale systems" class="img-fluid">	  
												  </div>
												  <p><?php echo $fechas[15]['Equipo'];?></p>									      
											  </td>
											  <td><?php echo $fechas[15]['P_jugados'];?></td>
											  <td><?php echo $fechas[15]['P_ganados'];?></td>
											  <td><?php echo $fechas[15]['P_empatados'];?></td>
											  <td><?php echo $fechas[15]['P_perdidos'];?></td>
											  <td><?php echo $fechas[15]['goles_f'];?></td>
											  <td><?php echo $fechas[15]['goles_c'];?></td>
											  <td class="sin-border-der"><?php echo $fechas[15]['Puntos'];?></td>
											</tr>
										  </tbody>
										</table>	
									</div><!-- col-6 -->
								</div><!-- row -->
								
								<div class="row"> 
									<div  class="col-12 col-sm-6 margen2-bottom">
									<table  width="100%" border="0" class="table-hover table-striped table-sm table-bordered" role="grid" cellpadding="0">
										<thead >                                    										
											<tr align="center" class="cabezote-grupos" >										 
											  <td align="left" class="sin-border degra-hor-morado"><h3>Grupo<span> E</span></h3></td>
											  <td class="sin-border-izqui">PJ</td>
											  <td>PG</td>
											  <td>PE</td>
											  <td>PP</td>
											  <td>GF</td>
											  <td>GC</td>
											  <td class="sin-border-der">PTS.</td>
											</tr>
										</thead>
										<tbody class="body-grupos">
											<tr align="center">										 
											   <td align="left" class="sin-border-izqui sin-border-top">
												  <div class="icono-grupo">
												  <img src="img/<?php echo $fechas[16]['bandera'];?>" alt="Goles a fondo - Hale systems" class="img-fluid">	  
												  </div>
												  <p><?php echo $fechas[16]['Equipo'];?></p>									      
											  </td>
											  <td><?php echo $fechas[16]['P_jugados'];?></td>
											  <td><?php echo $fechas[16]['P_ganados'];?></td>
											  <td><?php echo $fechas[16]['P_empatados'];?></td>
											  <td><?php echo $fechas[16]['P_perdidos'];?></td>
											  <td><?php echo $fechas[16]['goles_f'];?></td>
											  <td><?php echo $fechas[16]['goles_c'];?></td>
											  <td class="sin-border-der"><?php echo $fechas[16]['Puntos'];?></td>
											</tr>
											<tr align="center">										 
											   <td align="left" class="sin-border-izqui sin-border-top">
												  <div class="icono-grupo">
												  <img src="img/<?php echo $fechas[17]['bandera'];?>" alt="Goles a fondo - Hale systems" class="img-fluid">	  
												  </div>
												  <p><?php echo $fechas[17]['Equipo'];?></p>									      
											  </td>
											  <td><?php echo $fechas[17]['P_jugados'];?></td>
											  <td><?php echo $fechas[17]['P_ganados'];?></td>
											  <td><?php echo $fechas[17]['P_empatados'];?></td>
											  <td><?php echo $fechas[17]['P_perdidos'];?></td>
											  <td><?php echo $fechas[17]['goles_f'];?></td>
											  <td><?php echo $fechas[17]['goles_c'];?></td>
											  <td class="sin-border-der"><?php echo $fechas[17]['Puntos'];?></td>
											</tr>
											<tr align="center">										 
											   <td align="left" class="sin-border-izqui sin-border-top">
												  <div class="icono-grupo">
												  <img src="img/<?php echo $fechas[18]['bandera'];?>" alt="Goles a fondo - Hale systems" class="img-fluid">	  
												  </div>
												  <p><?php echo $fechas[18]['Equipo'];?></p>									      
											  </td>
											  <td><?php echo $fechas[18]['P_jugados'];?></td>
											  <td><?php echo $fechas[18]['P_ganados'];?></td>
											  <td><?php echo $fechas[18]['P_empatados'];?></td>
											  <td><?php echo $fechas[18]['P_perdidos'];?></td>
											  <td><?php echo $fechas[18]['goles_f'];?></td>
											  <td><?php echo $fechas[18]['goles_c'];?></td>
											  <td class="sin-border-der"><?php echo $fechas[18]['Puntos'];?></td>
											</tr>
											<tr align="center">										 
											   <td align="left" class="sin-border-izqui sin-border-top">
												  <div class="icono-grupo">
												  <img src="img/<?php echo $fechas[19]['bandera'];?>" alt="Goles a fondo - Hale systems" class="img-fluid">	  
												  </div>
												  <p><?php echo $fechas[19]['Equipo'];?></p>									      
											  </td>
											  <td><?php echo $fechas[19]['P_jugados'];?></td>
											  <td><?php echo $fechas[19]['P_ganados'];?></td>
											  <td><?php echo $fechas[19]['P_empatados'];?></td>
											  <td><?php echo $fechas[19]['P_perdidos'];?></td>
											  <td><?php echo $fechas[19]['goles_f'];?></td>
											  <td><?php echo $fechas[19]['goles_c'];?></td>
											  <td class="sin-border-der"><?php echo $fechas[19]['Puntos'];?></td>
											</tr>
										  </tbody>
										</table>	
									</div><!-- col-6 -->

									<div  class="col-12 col-sm-6 margen2-bottom">
									<table width="100%" border="0" class="table-hover table-striped table-sm table-bordered" role="grid" cellpadding="0">
										<thead >                                    										
											<tr align="center" class="cabezote-grupos" >										 
											  <td align="left" class="sin-border degra-hor-verde-2"><h3>Grupo<span> F</span></h3></td>
											  <td class="sin-border-izqui">PJ</td>
											  <td>PG</td>
											  <td>PE</td>
											  <td>PP</td>
											  <td>GF</td>
											  <td>GC</td>
											  <td class="sin-border-der">PTS.</td>
											</tr>
										</thead>
										<tbody class="body-grupos">
											<tr align="center">										 
											   <td align="left" class="sin-border-izqui sin-border-top">
												  <div class="icono-grupo">
												  <img src="img/<?php echo $fechas[20]['bandera'];?>" alt="Goles a fondo - Hale systems" class="img-fluid">	  
												  </div>
												  <p><?php echo $fechas[20]['Equipo'];?></p>									      
											  </td>
											  <td><?php echo $fechas[20]['P_jugados'];?></td>
											  <td><?php echo $fechas[20]['P_ganados'];?></td>
											  <td><?php echo $fechas[20]['P_empatados'];?></td>
											  <td><?php echo $fechas[20]['P_perdidos'];?></td>
											  <td><?php echo $fechas[20]['goles_f'];?></td>
											  <td><?php echo $fechas[20]['goles_c'];?></td>
											  <td class="sin-border-der"><?php echo $fechas[20]['Puntos'];?></td>
											</tr>
											<tr align="center">										 
											   <td align="left" class="sin-border-izqui sin-border-top">
												  <div class="icono-grupo">
												  <img src="img/<?php echo $fechas[21]['bandera'];?>" alt="Goles a fondo - Hale systems" class="img-fluid">	  
												  </div>
												  <p><?php echo $fechas[21]['Equipo'];?></p>									      
											  </td>
											  <td><?php echo $fechas[21]['P_jugados'];?></td>
											  <td><?php echo $fechas[21]['P_ganados'];?></td>
											  <td><?php echo $fechas[21]['P_empatados'];?></td>
											  <td><?php echo $fechas[21]['P_perdidos'];?></td>
											  <td><?php echo $fechas[21]['goles_f'];?></td>
											  <td><?php echo $fechas[21]['goles_c'];?></td>
											  <td class="sin-border-der"><?php echo $fechas[21]['Puntos'];?></td>
											</tr>
											<tr align="center">										 
											   <td align="left" class="sin-border-izqui sin-border-top">
												  <div class="icono-grupo">
												  <img src="img/<?php echo $fechas[22]['bandera'];?>" alt="Goles a fondo - Hale systems" class="img-fluid">	  
												  </div>
												  <p><?php echo $fechas[22]['Equipo'];?></p>									      
											  </td>
											  <td><?php echo $fechas[22]['P_jugados'];?></td>
											  <td><?php echo $fechas[22]['P_ganados'];?></td>
											  <td><?php echo $fechas[22]['P_empatados'];?></td>
											  <td><?php echo $fechas[22]['P_perdidos'];?></td>
											  <td><?php echo $fechas[22]['goles_f'];?></td>
											  <td><?php echo $fechas[22]['goles_c'];?></td>
											  <td class="sin-border-der"><?php echo $fechas[22]['Puntos'];?></td>
											</tr>
											<tr align="center">										 
											   <td align="left" class="sin-border-izqui sin-border-top">
												  <div class="icono-grupo">
												  <img src="img/<?php echo $fechas[23]['bandera'];?>" alt="Goles a fondo - Hale systems" class="img-fluid">	  
												  </div>
												  <p><?php echo $fechas[23]['Equipo'];?></p>									      
											  </td>
											  <td><?php echo $fechas[23]['P_jugados'];?></td>
											  <td><?php echo $fechas[23]['P_ganados'];?></td>
											  <td><?php echo $fechas[23]['P_empatados'];?></td>
											  <td><?php echo $fechas[23]['P_perdidos'];?></td>
											  <td><?php echo $fechas[23]['goles_f'];?></td>
											  <td><?php echo $fechas[23]['goles_c'];?></td>
											  <td class="sin-border-der"><?php echo $fechas[23]['Puntos'];?></td>
											</tr>
										  </tbody>
										</table>	
									</div><!-- col-6 -->
								</div><!-- row -->
								<div class="row "> 
									<div  class="col-12 col-sm-6 margen2-bottom">
									<table  width="100%" border="0" class="table-hover table-striped table-sm table-bordered" role="grid" cellpadding="0">
										<thead >                                    										
											<tr align="center" class="cabezote-grupos" >										 
											  <td align="left" class="sin-border degra-hor-naranja"><h3>Grupo<span> G</span></h3></td>
											  <td class="sin-border-izqui">PJ</td>
											  <td>PG</td>
											  <td>PE</td>
											  <td>PP</td>
											  <td>GF</td>
											  <td>GC</td>
											  <td class="sin-border-der">PTS.</td>
											</tr>
										</thead>
										<tbody class="body-grupos">
											<tr align="center">										 
											   <td align="left" class="sin-border-izqui sin-border-top">
												  <div class="icono-grupo">
												  <img src="img/<?php echo $fechas[24]['bandera'];?>" alt="Goles a fondo - Hale systems" class="img-fluid">	  
												  </div>
												  <p><?php echo $fechas[24]['Equipo'];?></p>									      
											  </td>
											  <td><?php echo $fechas[24]['P_jugados'];?></td>
											  <td><?php echo $fechas[24]['P_ganados'];?></td>
											  <td><?php echo $fechas[24]['P_empatados'];?></td>
											  <td><?php echo $fechas[24]['P_perdidos'];?></td>
											  <td><?php echo $fechas[24]['goles_f'];?></td>
											  <td><?php echo $fechas[24]['goles_c'];?></td>
											  <td class="sin-border-der"><?php echo $fechas[24]['Puntos'];?></td>
											</tr>
											<tr align="center">										 
											   <td align="left" class="sin-border-izqui sin-border-top">
												  <div class="icono-grupo">
												  <img src="img/<?php echo $fechas[25]['bandera'];?>" alt="Goles a fondo - Hale systems" class="img-fluid">	  
												  </div>
												  <p><?php echo $fechas[25]['Equipo'];?></p>									      
											  </td>
											  <td><?php echo $fechas[25]['P_jugados'];?></td>
											  <td><?php echo $fechas[25]['P_ganados'];?></td>
											  <td><?php echo $fechas[25]['P_empatados'];?></td>
											  <td><?php echo $fechas[25]['P_perdidos'];?></td>
											  <td><?php echo $fechas[25]['goles_f'];?></td>
											  <td><?php echo $fechas[25]['goles_c'];?></td>
											  <td class="sin-border-der"><?php echo $fechas[25]['Puntos'];?></td>
											</tr>
											<tr align="center">										 
											   <td align="left" class="sin-border-izqui sin-border-top">
												  <div class="icono-grupo">
												  <img src="img/<?php echo $fechas[26]['bandera'];?>" alt="Goles a fondo - Hale systems" class="img-fluid">	  
												  </div>
												  <p><?php echo $fechas[26]['Equipo'];?></p>									      
											  </td>
											  <td><?php echo $fechas[26]['P_jugados'];?></td>
											  <td><?php echo $fechas[26]['P_ganados'];?></td>
											  <td><?php echo $fechas[26]['P_empatados'];?></td>
											  <td><?php echo $fechas[26]['P_perdidos'];?></td>
											  <td><?php echo $fechas[26]['goles_f'];?></td>
											  <td><?php echo $fechas[26]['goles_c'];?></td>
											  <td class="sin-border-der"><?php echo $fechas[26]['Puntos'];?></td>
											</tr>
											<tr align="center">										 
											   <td align="left" class="sin-border-izqui sin-border-top">
												  <div class="icono-grupo">
												  <img src="img/<?php echo $fechas[27]['bandera'];?>" alt="Goles a fondo - Hale systems" class="img-fluid">	  
												  </div>
												  <p><?php echo $fechas[27]['Equipo'];?></p>									      
											  </td>
											  <td><?php echo $fechas[27]['P_jugados'];?></td>
											  <td><?php echo $fechas[27]['P_ganados'];?></td>
											  <td><?php echo $fechas[27]['P_empatados'];?></td>
											  <td><?php echo $fechas[27]['P_perdidos'];?></td>
											  <td><?php echo $fechas[27]['goles_f'];?></td>
											  <td><?php echo $fechas[27]['goles_c'];?></td>
											  <td class="sin-border-der"><?php echo $fechas[27]['Puntos'];?></td>
											</tr>
										  </tbody>
										</table>	
									</div><!-- col-6 -->

									<div  class="col-12 col-sm-6 margen2-bottom">
									<table width="100%" border="0" class="table-hover table-striped table-sm table-bordered" role="grid" cellpadding="0">
										<thead >                                    										
											<tr align="center" class="cabezote-grupos" >										 
											  <td align="left" class="sin-border degra-hor-azul-2"><h3>Grupo<span> H</span></h3></td>
											  <td class="sin-border-izqui">PJ</td>
											  <td>PG</td>
											  <td>PE</td>
											  <td>PP</td>
											  <td>GF</td>
											  <td>GC</td>
											  <td class="sin-border-der">PTS.</td>
											</tr>
										</thead>
										<tbody class="body-grupos">
											<tr align="center">										 
											   <td align="left" class="sin-border-izqui sin-border-top">
												  <div class="icono-grupo">
												  <img src="img/<?php echo $fechas[28]['bandera'];?>" alt="Goles a fondo - Hale systems" class="img-fluid">	  
												  </div>
												  <p><?php echo $fechas[28]['Equipo'];?></p>									      
											  </td>
											  <td><?php echo $fechas[28]['P_jugados'];?></td>
											  <td><?php echo $fechas[28]['P_ganados'];?></td>
											  <td><?php echo $fechas[28]['P_empatados'];?></td>
											  <td><?php echo $fechas[28]['P_perdidos'];?></td>
											  <td><?php echo $fechas[28]['goles_f'];?></td>
											  <td><?php echo $fechas[28]['goles_c'];?></td>
											  <td class="sin-border-der"><?php echo $fechas[28]['Puntos'];?></td>
											</tr>
											<tr align="center">										 
											   <td align="left" class="sin-border-izqui sin-border-top">
												  <div class="icono-grupo">
												  <img src="img/<?php echo $fechas[29]['bandera'];?>" alt="Goles a fondo - Hale systems" class="img-fluid">	  
												  </div>
												  <p><?php echo $fechas[29]['Equipo'];?></p>									      
											  </td>
											  <td><?php echo $fechas[29]['P_jugados'];?></td>
											  <td><?php echo $fechas[29]['P_ganados'];?></td>
											  <td><?php echo $fechas[29]['P_empatados'];?></td>
											  <td><?php echo $fechas[29]['P_perdidos'];?></td>
											  <td><?php echo $fechas[29]['goles_f'];?></td>
											  <td><?php echo $fechas[29]['goles_c'];?></td>
											  <td class="sin-border-der"><?php echo $fechas[29]['Puntos'];?></td>
											</tr>
											<tr align="center">										 
											   <td align="left" class="sin-border-izqui sin-border-top">
												  <div class="icono-grupo">
												  <img src="img/<?php echo $fechas[30]['bandera'];?>" alt="Goles a fondo - Hale systems" class="img-fluid">	  
												  </div>
												  <p><?php echo $fechas[30]['Equipo'];?></p>									      
											  </td>
											  <td><?php echo $fechas[30]['P_jugados'];?></td>
											  <td><?php echo $fechas[30]['P_ganados'];?></td>
											  <td><?php echo $fechas[30]['P_empatados'];?></td>
											  <td><?php echo $fechas[30]['P_perdidos'];?></td>
											  <td><?php echo $fechas[30]['goles_f'];?></td>
											  <td><?php echo $fechas[30]['goles_c'];?></td>
											  <td class="sin-border-der"><?php echo $fechas[30]['Puntos'];?></td>
											</tr>
											<tr align="center">										 
											   <td align="left" class="sin-border-izqui sin-border-top">
												  <div class="icono-grupo">
												  <img src="img/<?php echo $fechas[31]['bandera'];?>" alt="Goles a fondo - Hale systems" class="img-fluid">	  
												  </div>
												  <p><?php echo $fechas[31]['Equipo'];?></p>									      
											  </td>
											  <td><?php echo $fechas[31]['P_jugados'];?></td>
											  <td><?php echo $fechas[31]['P_ganados'];?></td>
											  <td><?php echo $fechas[31]['P_empatados'];?></td>
											  <td><?php echo $fechas[31]['P_perdidos'];?></td>
											  <td><?php echo $fechas[31]['goles_f'];?></td>
											  <td><?php echo $fechas[31]['goles_c'];?></td>
											  <td class="sin-border-der"><?php echo $fechas[31]['Puntos'];?></td>
											</tr>
										  </tbody>
										</table>	
									</div><!-- col-6 -->
								</div><!-- row -->
							</div><!-- col-md-10 offset-md-1 -->	
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
	
<script src="js/bootstrap.min.js"></script>	
<script src="js/jquery-2.1.4.js"></script>
	



<script src="https://tympanus.net/Development/SidebarTransitions/js/sidebarEffects.js"></script>
<script src="https://tympanus.net/Development/SidebarTransitions/js/classie.js"></script>
<script>
!function(a){"use strict";a('a.js-scroll-trigger[href*="#"]:not([href="#"])').click(function(){if(location.pathname.replace(/^\//,"")==this.pathname.replace(/^\//,"")&&location.hostname==this.hostname){var e=a(this.hash);if((e=e.length?e:a("[name="+this.hash.slice(1)+"]")).length)return a("html, body").animate({scrollTop:e.offset().top-57},1e3,"easeInOutExpo"),!1}}),a(".js-scroll-trigger").click(function(){a(".navbar-collapse").collapse("hide")}),a("body").scrollspy({target:"#mainNav",offset:57});var e=function(){a("#mainNav").offset().top>100?a("#mainNav").addClass("navbar-shrink"):a("#mainNav").removeClass("navbar-shrink")};e(),a(window).scroll(e),window.sr=ScrollReveal(),sr.reveal(".sr-icons",{duration:600,scale:.3,distance:"0px"},200),sr.reveal(".sr-button",{duration:1e3,delay:200}),sr.reveal(".sr-contact",{duration:600,scale:.3,distance:"0px"},300),a(".popup-gallery").magnificPopup({delegate:"a",type:"image",tLoading:"Loading image #%curr%...",mainClass:"mfp-img-mobile",gallery:{enabled:!0,navigateByImgClick:!0,preload:[0,1]},image:{tError:'<a href="%url%">The image #%curr%</a> could not be loaded.'}})}(jQuery);	
</script>
</body>
</html>