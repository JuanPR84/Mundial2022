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

$usuarios = array();
$cons = new base_datos;
$cons->connect();
$sql = "select sum(puntosobtenidos) as puntos, usuario from pronostico where anno = '$anno' and fase = 'Primera Fase' group by usuario order by puntos desc";
$res = $cons->query($sql);
while($dato = $cons->fetch_row($res))	{
	array_push($usuarios,$dato);
}

$marcador = array();
$consmarcador = new base_datos;
$consmarcador->connect();
$sqlmarcador = "select sum(puntosobtenidos) as puntos from pronostico where anno = '$anno' and fase = 'Primera Fase' and usuario = '$iu'";
$resmarcador = $consmarcador->query($sqlmarcador);
while ($datomarcador = $consmarcador->fetch_row($resmarcador))
{
	array_push($marcador, $datomarcador);
}
?>
<!doctype html>
<html>
<?php include('head.php');?>
<link href="css/jquery.dataTables.min.css" rel="stylesheet">	
<link href="css/responsive.dataTables.min.css" rel="stylesheet">
<link href="css/dataTables.bootstrap4.min.css" rel="stylesheet">	
<link href="css/responsive.bootstrap4.min.css" rel="stylesheet">
<body>
	
<?php include('header2.php');?>

<div id="st-container" class="st-container">
	
	<?php include('menu_2.php');?>

	<!-- content push wrapper -->
	<div class="st-pusher">
		<div class="st-content bg-05"><!-- this is the wrapper for the content -->
			
			<div class="st-content-inner "><!-- extra div for emulating position:fixed of the menu -->
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
								
								<div class="degra-hor-dorado marco-titulos-pages ">
								<h2 class="text-center text-white sin-margen">Tabla de posiciones</h2>
								</div>
								<div class="linea-pages"></div>	
							</div>
							<div  class="col-12">							
								<h4 class="text-center text-white">Su posición es</h4>
								<h3 class="text-center text-success">
									<?php $e = 1; ?>
									<?php foreach($usuarios as $usr){
										if ($usr['usuario']==$iu){
											echo $e;
										}
										$e = $e+1;;
									}
									?>
								</h3>
							 </div>	
							 <div  class="col-md-10 offset-md-1">
								<!--======TABLA======-->
								<table id="example" class="table-hover table-striped table-bordered responsive nowrap table-sm" cellspacing="0" width="100%" role="grid">														
								<thead>
									<tr align="center">
										<th>Posición</th>
										<th>Usuario</th>
										<th>Sucursal</th>	
										<th>Puntaje</th>	
									</tr>
								</thead>
								<tbody>
									<?php $a = 1;?>
									<?php foreach($usuarios as $us){ ?>
									<tr>
										<td><?php echo $a;?></td>
										<td>
                                        <?php
										$idus = $us['usuario'];
										$marcador1 = array();
										$consmarcador = new base_datos;
										$consmarcador->connect();
										$sqlmarcador = "select * from usuariosmundial where id = '$idus'";
										$resmarcador = $consmarcador->query($sqlmarcador);
										while ($datomarcador = $consmarcador->fetch_row($resmarcador))
										{
											array_push($marcador1, $datomarcador);
										}
										$idas = $marcador1[0]['id_asociado'];
										?>
										<?php echo $marcador1[0]['nickname'];?>
                                        </td>
										<td>
                                        <?php
										$marcador2 = array();
										$consmarcador = new base_datos;
										$consmarcador->connect();
										$sqlmarcador = "select * from asociados where id = '$idas'";
										$resmarcador = $consmarcador->query($sqlmarcador);
										while ($datomarcador = $consmarcador->fetch_row($resmarcador))
										{
											array_push($marcador2, $datomarcador);
										}
										?>
										<?php echo $marcador2[0]['sucursal'];?>
                                        </td>
										<td><?php echo $us['puntos'];?></td>
									</tr>
									<?php $a = $a + 1;; } ?>
								</tbody>
								</table>
								<!--======FIN-TABLA======-->
								
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
	
<!-- JS-Datatables-Base -->
<script src="js/jquery.dataTables.min.js"></script>
<script src="js/dataTables.bootstrap4.min.js"></script>	
<script src="js/dataTables.responsive.min.js"></script>
<script src="js/responsive.bootstrap4.min.js"></script>

	
<script>
$(document).ready(function() {
    $('#example').DataTable();
} );	
</script>
	
<script src="https://tympanus.net/Development/SidebarTransitions/js/sidebarEffects.js"></script>
<script src="https://tympanus.net/Development/SidebarTransitions/js/classie.js"></script>
<script>
!function(a){"use strict";a('a.js-scroll-trigger[href*="#"]:not([href="#"])').click(function(){if(location.pathname.replace(/^\//,"")==this.pathname.replace(/^\//,"")&&location.hostname==this.hostname){var e=a(this.hash);if((e=e.length?e:a("[name="+this.hash.slice(1)+"]")).length)return a("html, body").animate({scrollTop:e.offset().top-57},1e3,"easeInOutExpo"),!1}}),a(".js-scroll-trigger").click(function(){a(".navbar-collapse").collapse("hide")}),a("body").scrollspy({target:"#mainNav",offset:57});var e=function(){a("#mainNav").offset().top>100?a("#mainNav").addClass("navbar-shrink"):a("#mainNav").removeClass("navbar-shrink")};e(),a(window).scroll(e),window.sr=ScrollReveal(),sr.reveal(".sr-icons",{duration:600,scale:.3,distance:"0px"},200),sr.reveal(".sr-button",{duration:1e3,delay:200}),sr.reveal(".sr-contact",{duration:600,scale:.3,distance:"0px"},300),a(".popup-gallery").magnificPopup({delegate:"a",type:"image",tLoading:"Loading image #%curr%...",mainClass:"mfp-img-mobile",gallery:{enabled:!0,navigateByImgClick:!0,preload:[0,1]},image:{tError:'<a href="%url%">The image #%curr%</a> could not be loaded.'}})}(jQuery);	
</script>
	
	
	
	
</body>
</html>
