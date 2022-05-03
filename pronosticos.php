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

$rapido = array();
$cons = new base_datos;
$cons->connect();
$sql = "Select * from usuariosmundial where id = '$iu'";
$res = $cons->query($sql);
while($dato = $cons->fetch_row($res))	{
	array_push($rapido,$dato);
}

if($rapido[0]['ingresos'] < 1){
	echo "<script>
		alert('Bienvenido debe participar en los pronosticos rapidos');
		window.location.href = 'pronostico_rapido.php?datos=".$datos."';
	</script>";
}


$fechas = array();
$cons = new base_datos;
$cons->connect();
$sql = "Select * from fechas where anno = '$anno' order by fecha Asc, hora asc";
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
		<div class="st-content bg-02"><!-- this is the wrapper for the content -->
			
			<div class="st-content-inner"><!-- extra div for emulating position:fixed of the menu -->
				<div class="main clearfix">
					<div id="st-trigger-effects" class="column">
						<button data-effect="st-effect-4" class="button-inicio">
					 		<i class="fa fa-bars"></i>
					 	</button>
					</div>	
					
					<div class="container-fluid">  
						
						<?php include('puntajes.php');?>
						
						<div class="row">
							<div class="col-sm-6 offset-sm-3 col-xl-4 offset-xl-4">
								
								<div class="degra-hor-azul marco-titulos-pages text-center ">
								<h2 class="text-center text-white sin-margen">Primera Fase</h2>
								<small class="text-center text-white">Predice diariamente y hasta una hora antes de cada partido<br/>los siguientes eventos</small>
								</div>
								<div class="linea-pages"></div>	
							</div>						  
						</div><!-- row -->
						
						<form action="actualizar_marcador.php" method="post">
						<input type="hidden" name="datos" value="<?php echo $datos;?>">
						<div class="row">
							<div  class="col-12 col-sm-6 btn-group-sm margen-top">	
								<br>
								<button type="submit" class="btn btn-primary">Grabar Marcadores</button>
								<!--<button type="button" class="btn btn-secondary sesion">Editar marcadores</button>
								<button type="button" class="btn btn-danger sesion">Borrar marcadores</button>-->
						    </div>	
							
							<div  class="col-12 col-sm-6">								
								<div class="text-right portfolioFilter">
									<div class="filter-button text-white">Filtro por grupos</div>
								
									<a class="btn filter-button" data-filter=".Todos">Todos</a>
									<a class="btn filter-button" data-filter=".GrupoA">A</a>                            
									<a class="btn filter-button" data-filter=".GrupoB">B</a>
									<a class="btn filter-button" data-filter=".GrupoC">C</a>
									<a class="btn filter-button" data-filter=".GrupoD">D</a>
									<a class="btn filter-button" data-filter=".GrupoE">E</a>
									<a class="btn filter-button" data-filter=".GrupoF">F</a>
									<a class="btn filter-button" data-filter=".GrupoG">G</a>
									<a class="btn filter-button sin-border" data-filter=".GrupoH">H</a>							
														
								</div>
						    </div>	
						</div><!-- row -->	
						<hr color="#C1A374">
						<div class="row">
							<div class="col-md-10 offset-md-1">	
								<div class="row portfolioContainer">		
										
										<?php foreach($fechas as $fec){ ?>
										
											<?php 
											if ($fec['grupo'] == 'A'){
												$colorgrupo = 'dorado';
											} else if ($fec['grupo'] == 'B'){
												$colorgrupo = 'rojo';
											} else if ($fec['grupo'] == 'C'){
												$colorgrupo = 'azul';
											} else if ($fec['grupo'] == 'D'){
												$colorgrupo = 'verde';
											} else if ($fec['grupo'] == 'E'){
												$colorgrupo = 'morado';
											} else if ($fec['grupo'] == 'F'){
												$colorgrupo = 'verde-2';
											} else if ($fec['grupo'] == 'G'){
												$colorgrupo = 'naranja';
											} else if ($fec['grupo'] == 'H'){
												$colorgrupo = 'azul-2';
											} 
											?>
										<div class="col-12 col-md-6 col-lg-4 col-xl-3 Grupo<?php echo $fec['grupo'];?> Todos">
											<div class="Grupo-vertical-2 text-center degra-ver-<?php echo $colorgrupo;?>">
												<img src="img/grupo-<?php echo $fec['grupo'];?>.PNG" class="img-responsive"/>
											</div>
											<div class="gallery_product">
												<div class="marco-puntos-estado text-center">                                    	
													<div class="puntos">
													<?php
													$idpartido = $fec['id'];
													$puntosobt = array();
													$cons = new base_datos;
													$cons->connect();
													$sql = "Select * from pronostico where id_partido = '$idpartido' and fase = 'Primera Fase' and usuario = '$iu'";
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
													<h4 class="h4">+<?php echo $totalpuntos;?> <span>pts</span></h4>
													</div>
												</div>									
												<div class="marco-equipos-vs">	
													<div class="marco-equipo-A text-center">
													<?php
													$equipo1 = $fec['equipo1'];
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
	
													$equipo2 = $fec['equipo2'];
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
													<img src="img/<?php echo $bandera1;?>" class="bandera">
														
													<h5 class="text-center sin-margen sin-espacio"><small><strong><?php echo $sigla1;?></strong></small></h5>		
													</div>
													
													<?php
													$idp = $fec['id'];
													$marcador = array();
													$consmarcador = new base_datos;
													$consmarcador->connect();
													$sqlmarcador = "select * from pronostico where anno = '$anno' and usuario = '$iu' and id_partido = '$idp' and fase = 'Primera Fase';";
													$resmarcador = $consmarcador->query($sqlmarcador);
													while ($datomarcador = $consmarcador->fetch_row($resmarcador))
													{
														array_push($marcador, $datomarcador);
													}
													$marcadorvacio = count($marcador);

													if ($marcadorvacio > 0 ){
													$resultado1 = $marcador[0]['golesequipo1'];
													$resultado2 = $marcador[0]['golesequipo2'];
													} else {
													$resultado1 = "-";
													$resultado2 = "-";	
													}
	
													$fechap = explode('-',$fec['fecha']);
													$horap = explode(':',$fec['hora']);
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
													
													<div class="marcador ">
													<?php if ($estadop == 'ABIERTO'){ ?>
													<input class="form-control form-control-sm text-center form-control-loging" type="number" placeholder="-" min="0" max="99" value="<?php echo $resultado1;?>" name="resultado1-<?php echo $idp;?>">
													<?php } else { ?>
													<div class="form-control form-control-sm text-center form-control-loging" style="color:#4B4B4B !important" ><?php echo $resultado1;?></div>	
													<?php } ?>
													</div>
													<div class="marco-vs text-center">	
													<h6 class="sin-margen sin-espacio"><strong>Vs</strong></h6>
													</div>
													<div class="marcador">
													<?php if ($estadop == 'ABIERTO'){ ?>
													<input class="form-control form-control-sm text-center form-control-loging" type="number" placeholder="-" min="0" max="99" value="<?php echo $resultado2;?>" name="resultado2-<?php echo $idp;?>">
													<?php } else { ?>
													<div class="form-control form-control-sm text-center form-control-loging" style="color:#4B4B4B !important"><?php echo $resultado2;?></div>	
													<?php } ?>
													</div>
													
													<div class="marco-equipo-B text-center">	
													<img src="img/<?php echo $bandera2;?>" class="bandera">
													<h5 class="text-center sin-margen sin-espacio"><small><strong><?php echo $sigla2;?></strong></small></h5>
													</div>	
													<div class="align-items-center text-center">	
														<p class="sin-margen sin-espacio"><small>
															Fecha <?php echo $fechaf;?><br/>
															<!--Fecha Servidor <?php echo date('Y-m-d H:i:s');?>-->
															
															</small></p>
														<p class="sin-margen sin-espacio"><small><strong>Hora <?php echo $fec['hora'];?></strong></small></p>
														<p class="sin-margen sin-espacio"><small><em>&nbsp;</em></small></p>	
													</div>
													<?php
													if($estadop == 'ABIERTO'){
														$colormarcador = 'pronostico-final';
													} else {
														if (($marcador[0]['golesequipo1'] == $fec['resultado1'])and($marcador[0]['golesequipo2'] == $fec['resultado2'])){
															$colormarcador = 'pronostico-acertado';
														} else {
															$colormarcador = 'pronostico-fallido';
														}
													}
													?>
													<div class="<?php echo $colormarcador;?>">	
														<p class="sin-margen sin-espacio text-left"><small>Resultado final</small></p>
														<p class="sin-margen text-center">
															<?php
															$golesreal1 = $fec['resultado1'];
															$golesreal2 = $fec['resultado2'];
															?>
															<strong><?php echo $golesreal1;?>-<?php echo $golesreal2;?></strong>
														</p>
													</div>
													<?php
													if($estadop == 'ABIERTO'){
														$colormarcador2 = 'pronostico-final';
													} else {
														if ($marcador[0]['primergol'] == $fec['primeromarcar']){
															$colormarcador2 = 'pronostico-acertado';
														} else {
															$colormarcador2 = 'pronostico-fallido';
														}
													}
													?>
													<!--<div class="<?php echo $colormarcador2;?>">	
														<p class="equipo-marcar text-left"><small>Primer equipo en marcar</small></p>
														<?php $primergol = $marcador[0]['primergol'];?>
														<ul class="equipo-marcar text-right">
														  <?php if ($estadop == 'ABIERTO'){ ?>
														  <?php
														  	$sel1 = '';
															$sel2 = '';
															$sel3 = '';
														  //echo $primergol;
														  if($primergol == $fec['equipo1']){
															  $sel1 = 'class="active"';
														  } else if($primergol == $fec['equipo2']){
															  $sel2 = 'class="active"';
														  } else if ($primergol == 'EMPATE') {
															  $sel3 = 'class="active"';
														  }
															?>
														  <li <?php echo $sel2;?>>
															<a id="customoptions_image_0_0" title="" onClick="return false;" href="#"> 
															<img class="img-responsive equipo-ganador" src="img/<?php echo $bandera2;?>" >
															</a>
															<input id="<?php echo $idp.'/'.$fec['equipo2'];?>" class="radio validate-one-required-by-name product-custom-option" type="radio" value="<?php echo $fec['equipo2'];?>" name="partido<?php echo $idp;?>" onClick="opConfig.reloadPrice();" >
														  </li>											
														   <li <?php echo $sel3;?>> 
															 <a id="" title="" onClick="return false;" href="#">
															 <img class="img-responsive equipo-ganador" title="" src="img/vacio.png"> </a>
															 <input id="<?php echo $idp.'/NINGUNO';?>" class="radio validate-one-required-by-name product-custom-option" type="radio" value="NINGUNO" name="partido<?php echo $idp;?>" onClick="opConfig.reloadPrice();" >
														  </li>	
														   <li <?php echo $sel1;?>> 
															 <a id="customoptions_image_0_0" title="" onClick="return false;" href="#">
															 <img class="img-responsive equipo-ganador" title="" src="img/<?php echo $bandera1;?>"> </a>
															 <input id="<?php echo $idp.'/'.$fec['equipo1'];?>" class="radio validate-one-required-by-name product-custom-option" type="radio" value="<?php echo $fec['equipo1'];?>" name="partido<?php echo $idp;?>" onClick="opConfig.reloadPrice();">
														  </li>
														  <?php } else { ?>
															<li>
															 <?php
															 if($fec['primeromarcar'] == $equipo1){
															 	$imagenprimero = $bandera1;
															 } else if ($fec['primeromarcar'] == $equipo2){
																$imagenprimero = $bandera2;
															 } else {
																$imagenprimero = 'vacio.png';
															 }
															 ?>
															 <img class="img-responsive equipo-ganador" title="" src="img/<?php echo $imagenprimero;?>">
															 
														  	</li>
														  <?php } ?>
														</ul>
														
													</div>-->
												</div>
											</div>	
										</div>
										<?php } ?>
								
								</div><!-- row -->	
							</div>
							<div  class="col-12 col-sm-6 btn-group-sm">	
								<button type="submit" class="btn btn-primary">Grabar Marcadores</button>
								<!--<button type="button" class="btn btn-secondary sesion">Editar marcadores</button>
								<button type="button" class="btn btn-danger sesion">Borrar marcadores</button>-->
						    </div>
						</div><!-- row -->
						</form>
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
<!--=========JS-filtro==========-->	
<script>
$(window).load(function(){
    var $container = $('.portfolioContainer');
    $container.isotope({
        filter: '*',
        animationOptions: {
            duration: 750,
            easing: 'linear',
            queue: false
        }
    });
 
    $('.portfolioFilter a').click(function(){
        $('.portfolioFilter .current').removeClass('current');
        $(this).addClass('current');
 
        var selector = $(this).attr('data-filter');
        $container.isotope({
            filter: selector,
            animationOptions: {
                duration: 750,
                easing: 'linear',
                queue: false
            }
         });
         return false;
    }); 
});
</script>
	
<!--=========JS-check input==========-->	
<script>
$("a").click(function() {
    $(this).next().prop("checked", "checked");
});

  $('a').click(function() {
        $('li:has(input:radio:checked)').addClass('active');
        $('li:has(input:radio:not(:checked))').removeClass('active');
    });
</script>	
	

	
<script src="https://tympanus.net/Development/SidebarTransitions/js/sidebarEffects.js"></script>
<script src="https://tympanus.net/Development/SidebarTransitions/js/classie.js"></script>
<script>
!function(a){"use strict";a('a.js-scroll-trigger[href*="#"]:not([href="#"])').click(function(){if(location.pathname.replace(/^\//,"")==this.pathname.replace(/^\//,"")&&location.hostname==this.hostname){var e=a(this.hash);if((e=e.length?e:a("[name="+this.hash.slice(1)+"]")).length)return a("html, body").animate({scrollTop:e.offset().top-57},1e3,"easeInOutExpo"),!1}}),a(".js-scroll-trigger").click(function(){a(".navbar-collapse").collapse("hide")}),a("body").scrollspy({target:"#mainNav",offset:57});var e=function(){a("#mainNav").offset().top>100?a("#mainNav").addClass("navbar-shrink"):a("#mainNav").removeClass("navbar-shrink")};e(),a(window).scroll(e),window.sr=ScrollReveal(),sr.reveal(".sr-icons",{duration:600,scale:.3,distance:"0px"},200),sr.reveal(".sr-button",{duration:1e3,delay:200}),sr.reveal(".sr-contact",{duration:600,scale:.3,distance:"0px"},300),a(".popup-gallery").magnificPopup({delegate:"a",type:"image",tLoading:"Loading image #%curr%...",mainClass:"mfp-img-mobile",gallery:{enabled:!0,navigateByImgClick:!0,preload:[0,1]},image:{tError:'<a href="%url%">The image #%curr%</a> could not be loaded.'}})}(jQuery);	
</script>
	
	
</body>
</html>
