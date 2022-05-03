<!doctype html>
<html>
<?php include('head.php');?>

<body>

<?php include('header1.php');?>	

<div id="st-container" class="st-container">
	
    <?php include('menu_1.php');?>

	<!-- content push wrapper -->
	<div class="st-pusher">
		<div class="st-content bg-01"><!-- this is the wrapper for the content -->
			
			<div class="st-content-inner"><!-- extra div for emulating position:fixed of the menu -->
				<div class="main clearfix">
					<div id="st-trigger-effects" class="column">
						<button data-effect="st-effect-4" class="button-inicio">
					 		<i class="fa fa-bars"></i>
					 	</button>
					</div>
					
					<div class="container-fluid">  
						<div class="row">
							<div class="col-md-4 offset-md-4">
							<div class="content-loging">					   
							<form action="validar.php" method="post">
							<div class="form-group ">
								<label for="usuario" class="col-2" style="float: left">
									<i class="fa fa-user-circle" aria-hidden="true"></i>
								</label>
								<input type="text" class="form-control form-control-sm form-control-loging col-10" id="usuario" aria-describedby="emailHelp" placeholder="Usuario" name="usuario" required>
							</div>
								
							<div class="form-group">
								<label for="password" class="col-2" style="float: left">
									<i class="fa fa-asterisk" aria-hidden="true"></i>
								</label>
								<input type="password" class="form-control form-control-sm form-control-loging col-10" id="password" placeholder="Clave" name="password" required>
							</div>
							
							<!--<div class="checkbox checkbox-primary text-right">
								<input id="checkbox1" type="checkbox" required >
								<label for="checkbox1">
									Acepto los terminos y condiciones 
								</label>
							</div>	-->						
							<div class="text-right">	
							<button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#myModal">Olvido su clave <i class="fa fa-question-circle" aria-hidden="true"></i></button>	
							<button type="submit" class="btn btn-primary btn-sm">Ingresar <i class="fa fa-sign-in" aria-hidden="true"></i> </button>
							</div>
						</form>
					</div>	
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
    <div class="modal-dialog ">
    
      <!-- Modal content-->
      <form action="recordar.php" method="post">
      <div class="content-registro">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
			<h3 class="text-center">Recordar Clave</h3>
			
        </div>
        <div class="modal-body">			
			<div class="form-group row">
				<label for="cedula_recordar" class="col-2">
                <i class="fa fa-user-circle"></i></label>
				<input type="text" class="form-control form-control-sm form-control-loging col-10" id="cedula_recordar" aria-describedby="emailHelp" placeholder="Cedula" name="cedula_recordar" required />				
			</div>
			<div class="form-group row">
				<label for="usuario_recordar" class="col-2">
				<i class="fa fa-address-card-o" aria-hidden="true"></i></label>
				<input type="text" class="form-control form-control-sm form-control-loging col-10" id="usuario_recordar" aria-describedby="emailHelp" placeholder="Usuario" name="usuario_recordar" required />				
			</div>
		</div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-success btn-sm" id="submit" >Recordar</button>
        </div>
      </div>
      </form>
    </div>
  </div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>	
	
<script src="https://tympanus.net/Development/SidebarTransitions/js/sidebarEffects.js"></script>
<script src="https://tympanus.net/Development/SidebarTransitions/js/classie.js"></script>
<script>
!function(a){"use strict";a('a.js-scroll-trigger[href*="#"]:not([href="#"])').click(function(){if(location.pathname.replace(/^\//,"")==this.pathname.replace(/^\//,"")&&location.hostname==this.hostname){var e=a(this.hash);if((e=e.length?e:a("[name="+this.hash.slice(1)+"]")).length)return a("html, body").animate({scrollTop:e.offset().top-57},1e3,"easeInOutExpo"),!1}}),a(".js-scroll-trigger").click(function(){a(".navbar-collapse").collapse("hide")}),a("body").scrollspy({target:"#mainNav",offset:57});var e=function(){a("#mainNav").offset().top>100?a("#mainNav").addClass("navbar-shrink"):a("#mainNav").removeClass("navbar-shrink")};e(),a(window).scroll(e),window.sr=ScrollReveal(),sr.reveal(".sr-icons",{duration:600,scale:.3,distance:"0px"},200),sr.reveal(".sr-button",{duration:1e3,delay:200}),sr.reveal(".sr-contact",{duration:600,scale:.3,distance:"0px"},300),a(".popup-gallery").magnificPopup({delegate:"a",type:"image",tLoading:"Loading image #%curr%...",mainClass:"mfp-img-mobile",gallery:{enabled:!0,navigateByImgClick:!0,preload:[0,1]},image:{tError:'<a href="%url%">The image #%curr%</a> could not be loaded.'}})}(jQuery);	
</script>
</body>
</html>
