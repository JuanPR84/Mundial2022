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
$hoy = date('Y-m-d');
//$hoy = '2000-01-01';
$fechas = array();
$cons = new base_datos;
$cons->connect();
$sql = "Select * from fechas where fecha > '$hoy' and anno = '$anno' order by fecha Asc, hora asc";
$res = $cons->query($sql);
while($dato = $cons->fetch_row($res))	{
	array_push($fechas,$dato);
}
if ($_POST){
	$idp = $_POST['select'];
} else {
	$idp = $fechas[0]['id'];
}
$pronostico = array();
$cons = new base_datos;
$cons->connect();
$sql = "Select count(*) as cantidad, equipoganador from pronostico where id_partido = '$idp' group by equipoganador";
$res = $cons->query($sql);
while($dato = $cons->fetch_row($res))	{
	array_push($pronostico,$dato);
}
?>
<!doctype html>
<?php include('head.php');?>
<script src="amcharts/amcharts/amcharts.js" type="text/javascript"></script>
<script src="amcharts/amcharts/serial.js" type="text/javascript"></script>
<script>
            var chart;

            var chartData = [
			<?php $a = 1;?>
				<?php foreach ($pronostico as $pr){ ?>
			{
				"country": "<?php echo $pr['equipoganador'];?>",
                "visits": <?php echo $pr['cantidad'];?>,
				<?php if ($a == 1){ $color = '#FF0F00'; } else if ($a == 2){ $color = '#04D215'; } else { $color = '#2A0CD0'; } ?>
                "color": "<?php echo $color;?>"
            }, <?php $a++; } ?>
			 ];


            var chart = AmCharts.makeChart("chartdiv", {
                type: "serial",
                dataProvider: chartData,
                categoryField: "country",
                depth3D: 20,
                angle: 30,
				color: "#FFFFFF",

                categoryAxis: {
                    labelRotation: 90,
                    gridPosition: "start",
					color: "#FFFFFF",
                },

                valueAxes: [{
                    title: "No. Usuarios",
					color: "#FFFFFF",
                }],

                graphs: [{
					
                    valueField: "visits",
                    colorField: "color",
                    type: "column",
                    lineAlpha: 0,
                    fillAlphas: 1,
					color: "#FFFFFF",
                }],

                chartCursor: {
                    cursorAlpha: 0,
                    zoomable: false,
                    categoryBalloonEnabled: false
                },
                "export": {
                    "enabled": true
                }

            });
        </script>
<body>
 <?php include('header2.php');?>

<div id="st-container" class="st-container">
	
    <?php include('menu_2.php');?>

	<!-- content push wrapper -->
	<div class="st-pusher">
		<div class="st-content bg-09"><!-- this is the wrapper for the content -->
			
			<div class="st-content-inner"><!-- extra div for emulating position:fixed of the menu -->
				<div class="main clearfix">
					<div id="st-trigger-effects" class="column">
					<button data-effect="st-effect-4" class="button-inicio">
					 		<i class="fa fa-bars"></i>
					 	</button>
                    
					</div>
					
					<div class="container-fluid">  
						<div class="row">
							<div class="col-md-8 offset-md-2">
                            <form action="estadisticas.php?datos=<?php echo $datos;?>" method="post">
                           	<select class="form-control form-control-sm form-control-loging" onChange="this.form.submit()" name="select" id="select">
                            	<?php foreach ($fechas as $fc){ ?>
                              	<option class="form-control-opcion" value="<?php echo $fc['id'];?>" 
								<?php if ($idp == $fc['id']){ ?> selected <?php } ?> >
                                	<?php echo $fc['fecha'].' / '.utf8_encode($fc['equipo1'].' - '.$fc['equipo2']);?>
                                </option>
                                <?php } ?>
                           	</select>
                            </form>
                            
							<div id="chartdiv" style="width: 100%; height: 400px;"></div>
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

 <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Modal Header</h4>
        </div>
        <div class="modal-body">
          <p>Some text in the modal.</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>


<script src="https://tympanus.net/Development/SidebarTransitions/js/sidebarEffects.js"></script>
<script src="https://tympanus.net/Development/SidebarTransitions/js/classie.js"></script>
<script>
!function(a){"use strict";a('a.js-scroll-trigger[href*="#"]:not([href="#"])').click(function(){if(location.pathname.replace(/^\//,"")==this.pathname.replace(/^\//,"")&&location.hostname==this.hostname){var e=a(this.hash);if((e=e.length?e:a("[name="+this.hash.slice(1)+"]")).length)return a("html, body").animate({scrollTop:e.offset().top-57},1e3,"easeInOutExpo"),!1}}),a(".js-scroll-trigger").click(function(){a(".navbar-collapse").collapse("hide")}),a("body").scrollspy({target:"#mainNav",offset:57});var e=function(){a("#mainNav").offset().top>100?a("#mainNav").addClass("navbar-shrink"):a("#mainNav").removeClass("navbar-shrink")};e(),a(window).scroll(e),window.sr=ScrollReveal(),sr.reveal(".sr-icons",{duration:600,scale:.3,distance:"0px"},200),sr.reveal(".sr-button",{duration:1e3,delay:200}),sr.reveal(".sr-contact",{duration:600,scale:.3,distance:"0px"},300),a(".popup-gallery").magnificPopup({delegate:"a",type:"image",tLoading:"Loading image #%curr%...",mainClass:"mfp-img-mobile",gallery:{enabled:!0,navigateByImgClick:!0,preload:[0,1]},image:{tError:'<a href="%url%">The image #%curr%</a> could not be loaded.'}})}(jQuery);	
</script>
</body>
</html>
