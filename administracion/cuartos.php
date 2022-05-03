<?php
include("../../classes/bd.class.php");

$Y = date("Y");

$cantequipos = array();
$conscant = new base_datos;
$conscant->connect();
$sqlcant = "SELECT * FROM segundafase WHERE anno = '$Y' and fasepartido = 'Cuartos';";
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
<form action="guardarfechascuartos.php" method="post">
<table bordercolor="#990000" border="1">

<tr>
	<td colspan="5" align="center" bgcolor="#990000"><font color="#FFFFFF">
    CUARTOS 
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
$a = 1;

foreach($cantequipos as $E)
{
?>
	
<tr align="center">    
	<td>
		<?php echo $E["equipo1"];?>
    </td>
    <td>VS <input type="hidden" name="id<?php echo $a;?>" value="<?php echo $E["id"];?>"  /></td>
    <td>
		<?php echo $E["equipo2"];?>
    </td>
    <td><input type="text" name="fecha<?php echo $E["id"];?>" style="text-align:center"/></td>
    <td>
        <input type="text" name="hora<?php echo $E["id"];?>" style="text-align:center" />
    </td>
</tr>


<?php
$a++;
}
?>
<tr align="center">
	<td colspan="5"><input type="submit" name="enviar" value="Actualizar" id="boton"></td>
</tr>
</table>


</form>
</body>
</html>