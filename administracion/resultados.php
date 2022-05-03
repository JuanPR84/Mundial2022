<?php
include("../../classes/bd.class.php");

$Y = date("Y");

$partidos = array();
$conspartidos = new base_datos;
$conspartidos->connect();
$sqlpartidos = "select * from fechas where anno = '$Y' order by fecha, hora asc;";
$respartidos = $conspartidos->query($sqlpartidos);
while ($dato_equipos = $conspartidos->fetch_row($respartidos))
{
	array_push($partidos, $dato_equipos);
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Resultados</title>
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
        <td><b>VS</b></td>
        <td><b>MARCADOR</b></td>
        <td><b>EQUIPO 2</b></td>
        <td><b>PRIMERO EN ANOTAR</b></td>
        <td><b>FECHA</b></td>
        <td><b>HORA</b></td>
        <td></td>
    </tr>
    <?php $i = 1 ?>
    <?php foreach ($partidos as $P){ 
	?> 
    <form action="actresultado.php" method="post">   
   	<tr align="center">
    	<td><?php echo $i;?> <input type="hidden" name="id" value="<?php echo $P["id"];?>"/></td>
        <td><?php echo $P["equipo1"];?><input type="hidden" name="equipo1" value="<?php echo $P["equipo1"];?>" /></td>
        <td>
        <?php if ($P["resultado1"] == "") { ?>
        <input type="text" name="resultado1"  size="4" style="text-align:center" maxlength="2"/>
        <?php } else { ?>
        <?php echo $P["resultado1"];?>
        <?php } ?>
        </td>
        <td>VS</td>
        <td>
        <?php if ($P["resultado2"] == "") { ?>
        <input type="text" name="resultado2" size="4" style="text-align:center" maxlength="2"/>
        <?php } else { ?>
        <?php echo $P["resultado2"];?>
        <?php } ?>
        </td>
        <td><?php echo $P["equipo2"];?><input type="hidden" name="equipo2" value="<?php echo $P["equipo2"];?>" /></td>
        <td>
        	<?php if ($P["primeromarcar"] == "") { ?>
        	<select name="primergol" required >
            	<option value="">Seleccione una opcion</option>
            	<option value="<?php echo $P['equipo1'];?>"><?php echo $P['equipo1'];?></option>
                <option value="NINGUNO">NINGUNO</option>
                <option value="<?php echo $P['equipo2'];?>"><?php echo $P['equipo2'];?></option>
            </select>
            <?php } else { ?>
            <?php echo $P['primeromarcar'];?>
            <?php } ?>
        </td>
        <td>
        <?php 
		$fecha = explode('-',$P["fecha"]);
		$fecha1 = ($fecha[2].'/'.$fecha[1].'/'.$fecha[0]);
		?>
		<?php echo $fecha1;?>
        
        </td>
        <td><?php echo $P["hora"];?></td>
        <?php if (($P["resultado1"] == "")and($P["resultado2"] == "")){ ?>
        <td><input type="submit" name="actualizar" value="Actualizar" onclick="abrir(); return true;" /></td>
        <?php } else { ?>
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
            <font size="+2" face="Verdana, Geneva, sans-serif" color="#C60000">Actualizando su resultado</font>
        </div>
    </div>
</div>
<!-- MODAL -->

</body>
</html>