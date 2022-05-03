<?php
include("../../classes/bd.class.php");

$Y = date("Y");

$partidos = array();
$conspartidos = new base_datos;
$conspartidos->connect();
$sqlpartidos = "select * from segundafase where anno = '$Y' and fasepartido = 'Octavos' order by fecha asc, hora asc;";
$respartidos = $conspartidos->query($sqlpartidos);
while ($dato_equipos = $conspartidos->fetch_row($respartidos))
{
	array_push($partidos, $dato_equipos);
}
$partidos1 = array();
$conspartidos1 = new base_datos;
$conspartidos1->connect();
$sqlpartidos1 = "select * from segundafase where anno = '$Y' and fasepartido = 'Octavos' order by fecha asc, hora asc;";
$respartidos1 = $conspartidos1->query($sqlpartidos1);
while ($dato_equipos1 = $conspartidos1->fetch_row($respartidos1))
{
	array_push($partidos1, $dato_equipos1);
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Resultados Octavos</title>
<style>
#contenedor {
	width:1200px;
	height:auto;	
}
#fondo {
	background-image:url(../images/fondo.jpg);
	background-repeat:no-repeat;	
	height:554px;
	width:650px;
	margin-left:275px;
}
#boton {
	background-color:#C60000;
	color:#FFF;	
	border:hidden;
	font-family:"Palatino Linotype", "Book Antiqua", Palatino, serif;
}
#fuente {
	font-family:"Comic Sans MS", cursive;
	color:#2a3a85;
	font-weight:bold;
}
.modal {
    background-image: url(../images/bgmodal.png);
	background-repeat: repeat;
    color: #000000;
    height: 100%;
    left: 0;
    position: fixed;
    top: 0;
    width: 100%;
    padding-top: 5%;
	z-index: 999;
}

.insideModal {
    color: #000000;
    height: 175px;
    width: 350px;
    margin: auto;
	padding-top: 25px;
}

.inside
{
	font-size: 14px;
	color:#000;	
}
</style>
<script type="text/javascript">
function abrir()
{
	var modal =  document.getElementById('modal');
	modal.style.display = '';
}
</script>
</head>

<body>
<a href="cargagrupos.php" style="text-decoration:none"><input type="button" value="Regresar" id="boton"/></a><br/><br/>
<table border="1" >
	<tr align="center" id="boton">
    	<td><b>No.</b></td>
        <td><b>EQUIPO 1</b></td>
        <td><b>MARCADOR</b></td>
        
        <td><b>PENALES</b></td>
        
        <td><b>VS</b></td>
       
        <td><b>PENALES</b></td>
        
        <td><b>MARCADOR</b></td>
        <td><b>EQUIPO 2</b></td>
        <td><b>FECHA</b></td>
        <td><b>HORA</b></td>
        <td></td>
    </tr>
    <?php $i = 1 ?>
    <?php foreach ($partidos as $P){ 
	?> 
    <form action="actresultadosoctavos.php" method="post">   
   	<tr align="center">
    	<td><?php echo $i;?> <input type="hidden" name="id" value="<?php echo $P["id"];?>"/></td>
        <td><?php echo $P["equipo1"];?><input type="hidden" name="equipo1" value="<?php echo $P["equipo1"];?>" /></td>
        <?php if ($P["resultado1"] == ""){ ?>
        <td><input type="text" name="resultado1" size="4" style="text-align:center" maxlength="2"/>
        </td>
        <?php } else { ?>
        <td><?php echo $P["resultado1"];?></td>
        <?php } ?>
        <?php if ($P["resultado1"] != "") { ?>
			<?php if ($P["resultado1"] == $P["resultado2"]) { ?>
                <?php if ($P["penal1"] == "") { ?>
                    <td>
                    <input type="text" name="penal1" size="4" 
                    style="text-align:center" maxlength="2"/>
                    </td>
                <?php } else { ?>
                    <td><?php echo $P["penal1"];?></td>
                <?php } ?>
            <?php } else { ?>
                <td><input type="hidden" name="penal1" value="" /></td>	
            <?php } ?>
        <?php } else { ?>
        	<td><input type="hidden" name="penal1" value="" /></td>
        <?php } ?>
        
        <td>VS</td>
        <?php if ($P["resultado1"] != "") { ?>
			<?php if ($P["resultado1"] == $P["resultado2"]) { ?>
                <?php if ($P["penal2"] == "") { ?>
                    <td>
                    <input type="text" name="penal2" size="4" 
                    style="text-align:center" maxlength="2"/>
                    </td>
                <?php } else { ?>
                    <td><?php echo $P["penal2"];?></td>
                <?php } ?>
            <?php } else { ?>
                <td><input type="hidden" name="penal2" value="" /></td>	
            <?php } ?>
        <?php } else { ?>
        	<td><input type="hidden" name="penal2" value="" /></td>
        <?php } ?>
        
        <?php if ($P["resultado2"] == ""){ ?>
        <td><input type="text" name="resultado2" maxlength="2" size="4" style="text-align:center"/>
        </td>
        <?php } else { ?>
        <td><?php echo $P["resultado2"];?></td>
        <?php } ?>
        <td><?php echo $P["equipo2"];?><input type="hidden" name="equipo2" value="<?php echo $P["equipo2"];?>" /></td>
        <td>
		<?php 
		$fecha1 = explode('-',$P["fecha"]);
		$fecha = ($fecha1[2].'/'.$fecha1[1].'/'.$fecha1[0]);
		echo $fecha;?>
        </td>
        <td><?php echo $P["hora"];?></td>
        
        <?php if (($P["resultado1"] == "")and($P["resultado2"] == "")){ ?>
        	<td><input type="submit" name="actualizar" value="Actualizar" onclick="abrir(); return true;"/></td>
        <?php } else if ($P["resultado1"] == $P["resultado2"]) { ?>
			<?php if (($P["penal1"] == "")and($P["penal2"] == "")) { ?>
        		<td><input type="submit" name="actualizar" value="Actualizar" onclick="abrir(); return true;"/></td>
			<?php } else { ?>
         		<td><b>Cerrado</b></td>
			<?php } ?>
		<?php } else { 	?>
        <td><b>Cerrado</b></td>
        <?php } ?>        
    </tr>
    </form>
    <?php  $i = $i + 1; } ?>
</table>

<!-- MODAL -->
<div id="modal" class="modal" align="center" style="display:none;" >
	<!--<div id="cerrardiv" align="right">
    	<img src="images/close.png" onclick="cerrar()" style="cursor: pointer;" title="Cerrar"/>
    </div>-->
	<div id="insideModal" class="insideModal" >
    	<div class="inside" align="center">
        		<font size="+2" face="Verdana, Geneva, sans-serif" color="#C60000">Por favor espere...</font>
                <br />
        	<img src="../images/zan12.gif" width="130" height="100" />
            <br />
            <font size="+2" face="Verdana, Geneva, sans-serif" color="#C60000">Actualizando su pronostico</font>
        </div>
    </div>
</div>
<!-- MODAL -->
</body>
</html>