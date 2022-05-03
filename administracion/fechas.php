<?php
include("../../classes/bd.class.php");

$Y = date("Y");

$cantequipos = array();
$conscant = new base_datos;
$conscant->connect();
$sqlcant = "SELECT DISTINCT(Grupo) as grupo FROM equiposmundial WHERE Annomundial = '$Y';";
$rescant = $conscant->query($sqlcant);
while ($dato_equipos = $conscant->fetch_row($rescant))
{
	array_push($cantequipos, $dato_equipos);
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Documento sin t&iacute;tulo</title>
<style>
#contenedor {
	width:1200px;
	height:auto;	
}
#fondo {
	background-image:url(imagenes/fondo.jpg);
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
</style>
</head>

<body>
<a href="cargagrupos.php" style="text-decoration:none"><input type="button" value="Regresar" id="boton"/></a><br/><br/>
<form action="guardarfechas.php" method="post">
<table bordercolor="#990000" border="1">
<?php
$num = 0;
$hor = 0;
$equi = 0;
$group = 1;
foreach($cantequipos as $E)
{
?>
<tr>
	<td colspan="5" align="center" bgcolor="#990000"><font color="#FFFFFF">
    GRUPO <?php echo $E["grupo"]; ?>
    <input type="hidden" value="<?php echo $E["grupo"]; ?>" name="grupo<?php echo $group; ?>" />
    </font></td>
</tr>
<tr align="center">
	<td><b>EQUIPO 1</b></td>
    <td><b>VS</b></td>
    <td><b>EQUIPO 2</b></td>
    <td><b>FECHA</b> (dd/mm/yyyy)</td>
    <td><b>HORA</b> (hh:mm)</td>
</tr>

	<?php
	$cantequipos1 = array();
	$conscant1 = new base_datos;
	$conscant1->connect();
	$sqlcant1 = "SELECT Equipo FROM equiposmundial WHERE Grupo = '".$E["grupo"]."';";
	$rescant1 = $conscant1->query($sqlcant1);
	while ($dato_equipos1 = $conscant1->fetch_row($rescant1))
	{
		array_push($cantequipos1, $dato_equipos1);
	}
	?>
<tr align="center">    
	<td>
		<?php echo $cantequipos1[0]["Equipo"]?>
        <input type="hidden" value="<?php echo $cantequipos1[0]["Equipo"]?>"  name="equipo<?php  $equi = $equi + 1; echo $equi; ?>"/>
    </td>
    <td>VS</td>
    <td><?php echo $cantequipos1[1]["Equipo"]?>
    	<input type="hidden" value="<?php echo $cantequipos1[1]["Equipo"]?>"  name="equipo<?php  $equi = $equi + 1; echo $equi; ?>"/>
    </td>
    <td><input type="text" name="fecha<?php  $num = $num + 1; echo $num; ?>" style="text-align:center"/></td>
    <td>
        <input type="text" name="hora<?php $hor = $hor + 1; echo $hor; ?>" style="text-align:center" />
    </td>
</tr>
<tr align="center">    
	<td><?php echo $cantequipos1[2]["Equipo"]?>
    <input type="hidden" value="<?php echo $cantequipos1[2]["Equipo"]?>"  name="equipo<?php  $equi = $equi + 1; echo $equi; ?>"/>
    </td>
    <td>VS</td>
    <td><?php echo $cantequipos1[3]["Equipo"]?>
    <input type="hidden" value="<?php echo $cantequipos1[3]["Equipo"]?>"  name="equipo<?php  $equi = $equi + 1; echo $equi; ?>"/>
    </td>
    <td><input type="text"  name="fecha<?php  $num = $num + 1; echo $num; ?>" style="text-align:center"/></td>
    <td><input type="text"  name="hora<?php $hor = $hor + 1; echo $hor; ?>" style="text-align:center"/></td>
</tr>
<tr align="center">    
	<td><?php echo $cantequipos1[0]["Equipo"]?>
    <input type="hidden" value="<?php echo $cantequipos1[0]["Equipo"]?>"  name="equipo<?php  $equi = $equi + 1; echo $equi; ?>"/>
    </td>
    <td>VS</td>
    <td><?php echo $cantequipos1[2]["Equipo"]?>
    <input type="hidden" value="<?php echo $cantequipos1[2]["Equipo"]?>"  name="equipo<?php  $equi = $equi + 1; echo $equi; ?>"/>
    </td>
    <td><input type="text"  name="fecha<?php  $num = $num + 1; echo $num; ?>" style="text-align:center"/></td>
    <td><input type="text"  name="hora<?php $hor = $hor + 1; echo $hor; ?>" style="text-align:center"/></td>
</tr>
<tr align="center">    
	<td><?php echo $cantequipos1[3]["Equipo"]?>
    <input type="hidden" value="<?php echo $cantequipos1[3]["Equipo"]?>"  name="equipo<?php  $equi = $equi + 1; echo $equi; ?>"/>
    </td>
    <td>VS</td>
    <td><?php echo $cantequipos1[1]["Equipo"]?>
    <input type="hidden" value="<?php echo $cantequipos1[1]["Equipo"]?>"  name="equipo<?php  $equi = $equi + 1; echo $equi; ?>"/>
    </td>
    <td><input type="text"  name="fecha<?php  $num = $num + 1; echo $num; ?>" style="text-align:center"/></td>
    <td><input type="text"  name="hora<?php $hor = $hor + 1; echo $hor; ?>" style="text-align:center"/></td>
</tr>
<tr align="center">    
	<td><?php echo $cantequipos1[3]["Equipo"]?>
    
    <input type="hidden" value="<?php echo $cantequipos1[3]["Equipo"]?>"  name="equipo<?php  $equi = $equi + 1; echo $equi; ?>"/></td>
    <td>VS</td>
    <td><?php echo $cantequipos1[0]["Equipo"]?>
    <input type="hidden" value="<?php echo $cantequipos1[0]["Equipo"]?>"  name="equipo<?php  $equi = $equi + 1; echo $equi; ?>"/>
    </td>
    <td><input type="text"  name="fecha<?php  $num = $num + 1; echo $num; ?>" style="text-align:center"/></td>
    <td><input type="text"  name="hora<?php $hor = $hor + 1; echo $hor; ?>" style="text-align:center"/></td>
</tr>
<tr align="center">    
	<td><?php echo $cantequipos1[1]["Equipo"]?>
    <input type="hidden" value="<?php echo $cantequipos1[1]["Equipo"]?>"  name="equipo<?php  $equi = $equi + 1; echo $equi; ?>"/>
    </td>
    <td>VS</td>
    <td><?php echo $cantequipos1[2]["Equipo"]?>
    <input type="hidden" value="<?php echo $cantequipos1[2]["Equipo"]?>"  name="equipo<?php  $equi = $equi + 1; echo $equi; ?>"/>
    </td>
    <td><input type="text"  name="fecha<?php  $num = $num + 1; echo $num; ?>" style="text-align:center"/></td>
    <td><input type="text"  name="hora<?php $hor = $hor + 1; echo $hor; ?>" style="text-align:center"/></td>
</tr>

<?php
$group++;
}
?>
<tr align="center">
	<td colspan="5"><input type="submit" name="enviar" value="Actualizar" id="boton"></td>
</tr>
</table>


</form>
</body>
</html>