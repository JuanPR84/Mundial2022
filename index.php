<!doctype html>
<html>

<?php include('head.php');?>
<script type="text/javascript">
var a = 0;
var b = 0;
function password(){
	var p1 = document.getElementById('pass1').value;
	var p2 = document.getElementById('pass2').value;
	if((p1 == p2)&&(p1 != '')){
		document.getElementById('pass1').classList.remove('form-control');
		document.getElementById('pass1').classList.remove('form-control-sm');
		document.getElementById('pass1').classList.remove('form-control-loging');
		document.getElementById('pass1').classList.remove('form-control-loging-rojo');
		document.getElementById('pass1').classList.remove('col-10');
		document.getElementById('pass1').classList.add('form-control');
		document.getElementById('pass1').classList.add('form-control-sm');
		document.getElementById('pass1').classList.add('form-control-loging-verde');
		document.getElementById('pass1').classList.add('col-10');	
		document.getElementById('pass2').classList.remove('form-control');
		document.getElementById('pass2').classList.remove('form-control-sm');
		document.getElementById('pass2').classList.remove('form-control-loging');
		document.getElementById('pass2').classList.remove('form-control-loging-rojo');
		document.getElementById('pass2').classList.remove('col-10');
		document.getElementById('pass2').classList.add('form-control');
		document.getElementById('pass2').classList.add('form-control-sm');
		document.getElementById('pass2').classList.add('form-control-loging-verde');
		document.getElementById('pass2').classList.add('col-10');
		document.getElementById('pass1').title = 'Las claves coinciden';
		document.getElementById('pass2').title = 'Las claves coinciden';
		a = 1;
		habilitar();
	} else {
		document.getElementById('pass1').classList.remove('form-control');
		document.getElementById('pass1').classList.remove('form-control-sm');
		document.getElementById('pass1').classList.remove('form-control-loging');
		document.getElementById('pass1').classList.remove('form-control-loging-verde');
		document.getElementById('pass1').classList.remove('col-10');
		document.getElementById('pass1').classList.add('form-control');
		document.getElementById('pass1').classList.add('form-control-sm');
		document.getElementById('pass1').classList.add('form-control-loging-rojo');
		document.getElementById('pass1').classList.add('col-10');	
		document.getElementById('pass2').classList.remove('form-control');
		document.getElementById('pass2').classList.remove('form-control-sm');
		document.getElementById('pass2').classList.remove('form-control-loging');
		document.getElementById('pass2').classList.remove('form-control-loging-verde');
		document.getElementById('pass2').classList.remove('col-10');
		document.getElementById('pass2').classList.add('form-control');
		document.getElementById('pass2').classList.add('form-control-sm');
		document.getElementById('pass2').classList.add('form-control-loging-rojo');
		document.getElementById('pass2').classList.add('col-10');
		document.getElementById('pass1').title = 'Las claves no coinciden';
		document.getElementById('pass2').title = 'Las claves no coinciden';
		a = 0;
		habilitar();
	}
}
function disponible(){
	var nick = document.getElementById('usuario').value;
	if (nick != ''){
		if (nick.length > 5){
	
			var parametros = {
					"nick" : nick
			};
			$.ajax({
					data:  parametros,
					url:   'nick_disponible.php',
					type:  'post',
					beforeSend: function () {

					},
					success:  function (response) {
						if(response > 0){
							document.getElementById('usuario').classList.remove('form-control');
							document.getElementById('usuario').classList.remove('form-control-sm');
							document.getElementById('usuario').classList.remove('form-control-loging');
							document.getElementById('usuario').classList.remove('form-control-loging-verde');
							document.getElementById('usuario').classList.remove('col-10');
							document.getElementById('usuario').classList.add('form-control');
							document.getElementById('usuario').classList.add('form-control-sm');
							document.getElementById('usuario').classList.add('form-control-loging-rojo');
							document.getElementById('usuario').classList.add('col-10');
							document.getElementById('usuario').title = 'Usuario no disponible';
							b = 0;
							habilitar();
						} else {
							document.getElementById('usuario').classList.remove('form-control');
							document.getElementById('usuario').classList.remove('form-control-sm');
							document.getElementById('usuario').classList.remove('form-control-loging');
							document.getElementById('usuario').classList.remove('form-control-loging-rojo');
							document.getElementById('usuario').classList.remove('col-10');
							document.getElementById('usuario').classList.add('form-control');
							document.getElementById('usuario').classList.add('form-control-sm');
							document.getElementById('usuario').classList.add('form-control-loging-verde');
							document.getElementById('usuario').classList.add('col-10');
							document.getElementById('usuario').title = 'Usuario disponible';
							b = 1;
							habilitar();
						}
					}
			});
		} else {
			document.getElementById('usuario').classList.remove('form-control');
			document.getElementById('usuario').classList.remove('form-control-sm');
			document.getElementById('usuario').classList.remove('form-control-loging');
			document.getElementById('usuario').classList.remove('form-control-loging-verde');
			document.getElementById('usuario').classList.remove('col-10');
			document.getElementById('usuario').classList.add('form-control');
			document.getElementById('usuario').classList.add('form-control-sm');
			document.getElementById('usuario').classList.add('form-control-loging-rojo');
			document.getElementById('usuario').classList.add('col-10');
			document.getElementById('usuario').title = 'Minimo 6 caracteres';
			b = 0;
			habilitar();
		}
	} else {
		document.getElementById('usuario').classList.remove('form-control');
		document.getElementById('usuario').classList.remove('form-control-sm');
		document.getElementById('usuario').classList.remove('form-control-loging');
		document.getElementById('usuario').classList.remove('form-control-loging-verde');
		document.getElementById('usuario').classList.remove('col-10');
		document.getElementById('usuario').classList.add('form-control');
		document.getElementById('usuario').classList.add('form-control-sm');
		document.getElementById('usuario').classList.add('form-control-loging-rojo');
		document.getElementById('usuario').classList.add('col-10');
		document.getElementById('usuario').title = 'Completa este campo';
		b = 0;
		habilitar();
	}
}
function habilitar(){
	if((a == 1)&&(b == 1)){
		document.getElementById('submit').disabled = false;
	} else {
		document.getElementById('submit').disabled = true;
	}
}
</script>
<body onLoad="disponible(); password(); ">
 
<?php include('header1.php');?>
	
<div id="st-container" class="st-container">
	
    <?php include('menu_1.php');?>

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
							<div class="col-11 col-sm-6 offset-sm-3">
								<div class="content-intro">								
									<h2 class="text-center card-primary">Bienvenido</h2>
									
									<p>Participa, predice y gana fabulosos premios en torno al evento  deportivo más importante del año.</p>
									
									<p>Regístrate, sigue las instrucciones y comienza a participar...</p>

									<hr color="#fff">
									
									<div class="text-center ">	
										 <button type="button" class="btn btn-sm btn-success" data-toggle="modal" data-target="#myModal">
										 Registro
										 </button>
										<a href="login.php"><button type="button" class="btn btn-primary btn-sm">Ingreso</button></a>
									</div>	
								</div>	
							</div>
							
							<div class="col-12 sin-espacio">
								 
								<section class="container clearfix">
									
									
									
									<ul id="scene" class="scene">

										<li class="layer" data-depth="0.80">
											<div class="jugador"><img src="img/jugador.png"></div>
										</li>
										
										<li class="layer" data-depth="1.20">
											<div class="balon"><img src="img/balon.png"></div>
										</li>

										<li class="layer" data-depth="1.60">
											<div class="arquero"><img src="img/arquero.png"></div>
										</li>
										
										<li class="layer" data-depth="2.00">
											<div class="malla"><img src="img/malla.png"></div>
										</li>

										<li class="layer" data-depth="2.40">
											<div class="cesped"><img src="img/cesped.png"></div>
										</li>
									</ul>
								</section>
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
                <a href="http://www.halesystems.com" class="vineta" target="_blank" >
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
  <div class="modal fade" id="myModal" role="dialog" style="background-image:img/bg-01.jpg">
    <div class="modal-dialog ">
    
      <!-- Modal content-->
      <form action="registrar.php" method="post">
      <div class="content-registro">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
			<h3 class="text-center">Registro</h3>
			
        </div>
        <div class="modal-body">			
			<div class="form-group row">
				<label for="cedula" class="col-2">
                <i class="fa fa-user-circle"></i></label>
				<input type="text" class="form-control form-control-sm form-control-loging col-10" id="cedula" aria-describedby="emailHelp" placeholder="Cedula Asociado" name="cedula" required />				
			</div>
			<div class="form-group row">
				<label for="sucursal" class="col-2">
				<i class="fa fa-briefcase" aria-hidden="true"></i></label>
				<input type="text" class="form-control form-control-sm form-control-loging col-10" id="sucursal" aria-describedby="emailHelp" placeholder="Sucursal" name="sucursal" required />				
			</div>
                       <input type="hidden" class="form-control form-control-sm form-control-loging col-10" id="codigo" aria-describedby="emailHelp" name="codigo" value= 'MAKRO1234'/>
            <div class="form-group row">
				<label for="usuario" class="col-2">
				<i class="fa fa-address-card-o" aria-hidden="true"></i></label>
				<input type="text" class="form-control form-control-sm form-control-loging col-10" id="usuario" aria-describedby="emailHelp" placeholder="Usuario" name="usuario" required onKeyUp="disponible()" />				
			</div>
			<div class="form-group row">
				<label for="email" class="col-2">
				<i class="fa fa-envelope-o" aria-hidden="true"></i></label>
				<input type="email" class="form-control form-control-sm form-control-loging col-10" id="email" aria-describedby="emailHelp" placeholder="E-mail" name="email" required />			
			</div>
			
			<div class="form-group row">
				<label for="pass1" class="col-2">
				<i class="fa fa-asterisk" aria-hidden="true"></i></label>
				<input type="password" class="form-control form-control-sm form-control-loging col-10" id="pass1" aria-describedby="emailHelp" placeholder="Clave" name="pass1" required onKeyUp="password()"/>				
			</div>
			
			<div class="form-group row">
				<label for="pass2" class="col-2">
				<i class="fa fa-asterisk" aria-hidden="true"></i></label>
				<input type="password" class="form-control form-control-sm form-control-loging col-10" id="pass2" aria-describedby="emailHelp" placeholder="Confirmar Clave" name="pass2" required onKeyUp="password()" />				
			</div>
        </div>
        <div class="modal-footer">
          	<button type="submit" class="btn btn-success btn-sm" id="submit" disabled>Registrar</button>
			
        </div>
      </div>
      </form>
    </div>
  </div>


<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>	
	
<script src="https://andwecode.com/playground-demo/naruto-with-parallax-js/js/jquery.parallax.min.js"></script>
<script>$('#scene').parallax();</script>	
	
<script src="https://tympanus.net/Development/SidebarTransitions/js/sidebarEffects.js"></script>
<script src="https://tympanus.net/Development/SidebarTransitions/js/classie.js"></script>
<script>
!function(a){"use strict";a('a.js-scroll-trigger[href*="#"]:not([href="#"])').click(function(){if(location.pathname.replace(/^\//,"")==this.pathname.replace(/^\//,"")&&location.hostname==this.hostname){var e=a(this.hash);if((e=e.length?e:a("[name="+this.hash.slice(1)+"]")).length)return a("html, body").animate({scrollTop:e.offset().top-57},1e3,"easeInOutExpo"),!1}}),a(".js-scroll-trigger").click(function(){a(".navbar-collapse").collapse("hide")}),a("body").scrollspy({target:"#mainNav",offset:57});var e=function(){a("#mainNav").offset().top>100?a("#mainNav").addClass("navbar-shrink"):a("#mainNav").removeClass("navbar-shrink")};e(),a(window).scroll(e),window.sr=ScrollReveal(),sr.reveal(".sr-icons",{duration:600,scale:.3,distance:"0px"},200),sr.reveal(".sr-button",{duration:1e3,delay:200}),sr.reveal(".sr-contact",{duration:600,scale:.3,distance:"0px"},300),a(".popup-gallery").magnificPopup({delegate:"a",type:"image",tLoading:"Loading image #%curr%...",mainClass:"mfp-img-mobile",gallery:{enabled:!0,navigateByImgClick:!0,preload:[0,1]},image:{tError:'<a href="%url%">The image #%curr%</a> could not be loaded.'}})}(jQuery);	
</script>
</body>
</html>
