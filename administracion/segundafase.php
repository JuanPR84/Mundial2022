<?php
include("../bd.class.php");
$Y = date("Y");

//GRUPOA//
$grupoA = array();
$consgrupoA = new base_datos;
$consgrupoA->connect();
$sqlgrupoA = "select * from equiposmundial where Grupo = 'A' and Annomundial = '$Y' order by Puntos desc, Dif_goles desc, goles_f desc";
$resgrupoA = $consgrupoA->query($sqlgrupoA);
while ($datogrupoA = $consgrupoA->fetch_row($resgrupoA))
{
	array_push($grupoA, $datogrupoA);
}
$primeroA = $grupoA[0]["Equipo"];
$segundoA = $grupoA[1]["Equipo"];
//GRUPOA//

//GRUPOB//
$grupoB = array();
$consgrupoB = new base_datos;
$consgrupoB->connect();
$sqlgrupoB = "select * from equiposmundial where Grupo = 'B' and Annomundial = '$Y' order by Puntos desc, Dif_goles desc, goles_f desc";
$resgrupoB = $consgrupoB->query($sqlgrupoB);
while ($datogrupoB = $consgrupoB->fetch_row($resgrupoB))
{
	array_push($grupoB, $datogrupoB);
}
$primeroB = $grupoB[0]["Equipo"];
$segundoB = $grupoB[1]["Equipo"];
//GRUPOB//

//GRUPOC//
$grupoC = array();
$consgrupoC = new base_datos;
$consgrupoC->connect();
$sqlgrupoC = "select * from equiposmundial where Grupo = 'C' and Annomundial = '$Y' order by Puntos desc, Dif_goles desc, goles_f desc";
$resgrupoC = $consgrupoC->query($sqlgrupoC);
while ($datogrupoC = $consgrupoC->fetch_row($resgrupoC))
{
	array_push($grupoC, $datogrupoC);
}
$primeroC = $grupoC[0]["Equipo"];
$segundoC = $grupoC[1]["Equipo"];
//GRUPOC//

//GRUPOD//
$grupoD = array();
$consgrupoD = new base_datos;
$consgrupoD->connect();
$sqlgrupoD = "select * from equiposmundial where Grupo = 'D' and Annomundial = '$Y' order by Puntos desc, Dif_goles desc, goles_f desc";
$resgrupoD = $consgrupoD->query($sqlgrupoD);
while ($datogrupoD = $consgrupoD->fetch_row($resgrupoD))
{
	array_push($grupoD, $datogrupoD);
}
$primeroD = $grupoD[0]["Equipo"];
$segundoD = $grupoD[1]["Equipo"];
//GRUPOD//

//GRUPOE//
$grupoE = array();
$consgrupoE = new base_datos;
$consgrupoE->connect();
$sqlgrupoE = "select * from equiposmundial where Grupo = 'E' and Annomundial = '$Y' order by Puntos desc, Dif_goles desc, goles_f desc";
$resgrupoE = $consgrupoE->query($sqlgrupoE);
while ($datogrupoE = $consgrupoE->fetch_row($resgrupoE))
{
	array_push($grupoE, $datogrupoE);
}
$primeroE = $grupoE[0]["Equipo"];
$segundoE = $grupoE[1]["Equipo"];
//GRUPOE//

//GRUPOF//
$grupoF = array();
$consgrupoF = new base_datos;
$consgrupoF->connect();
$sqlgrupoF = "select * from equiposmundial where Grupo = 'F' and Annomundial = '$Y' order by Puntos desc, Dif_goles desc, goles_f desc";
$resgrupoF = $consgrupoF->query($sqlgrupoF);
while ($datogrupoF = $consgrupoF->fetch_row($resgrupoF))
{
	array_push($grupoF, $datogrupoF);
}
$primeroF = $grupoF[0]["Equipo"];
$segundoF = $grupoF[1]["Equipo"];
//GRUPOF//

//GRUPOG//
$grupoG = array();
$consgrupoG = new base_datos;
$consgrupoG->connect();
$sqlgrupoG = "select * from equiposmundial where Grupo = 'G' and Annomundial = '$Y' order by Puntos desc, Dif_goles desc, goles_f desc";
$resgrupoG = $consgrupoG->query($sqlgrupoG);
while ($datogrupoG = $consgrupoG->fetch_row($resgrupoG))
{
	array_push($grupoG, $datogrupoG);
}
$primeroG = $grupoG[0]["Equipo"];
$segundoG = $grupoG[1]["Equipo"];
//GRUPOG//

//GRUPOH//
$grupoH = array();
$consgrupoH = new base_datos;
$consgrupoH->connect();
$sqlgrupoH = "select * from equiposmundial where Grupo = 'H' and Annomundial = '$Y' order by Puntos desc, Dif_goles desc, goles_f desc";
$resgrupoH = $consgrupoH->query($sqlgrupoH);
while ($datogrupoH = $consgrupoH->fetch_row($resgrupoH))
{
	array_push($grupoH, $datogrupoH);
}
$primeroH = $grupoH[0]["Equipo"];
$segundoH = $grupoH[1]["Equipo"];
//GRUPOH//
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Segunda Fase</title>
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
<div style="width:1000px;">
<!--GRUPOA-->
<table width="250px;" style="float:left">
	<tr><td colspan="2" align="center" id="boton"><b>GRUPO A</b></td></tr>
    <tr>
    	<td align="center" id="fuente"><b>EQUIPO</b></td>
        <td align="center" id="fuente"><b>PUNTOS</b></td>
    </tr>
    <?php foreach ($grupoA as $A){?>
    <tr>
    	<td align="center"><?php echo $A["Equipo"];?></td>
        <td align="center"><?php echo $A["Puntos"];?></td>
    </tr>
    <?php }?>
</table>
<!--GRUPOA-->

<!--GRUPOB-->
<table width="250px" style="float:left">
	<tr><td colspan="2" align="center" id="boton"><b>GRUPO B</b></td></tr>
    <tr>
    	<td align="center" id="fuente"><b>EQUIPO</b></td>
        <td align="center" id="fuente"><b>PUNTOS</b></td>
    </tr>
    <?php foreach ($grupoB as $B){?>
    <tr>
    	<td align="center"><?php echo $B["Equipo"];?></td>
        <td align="center"><?php echo $B["Puntos"];?></td>
    </tr>
    <?php }?>
</table>
<!--GRUPOB-->

<!--GRUPOC-->
<table width="250px;" style="float:left">
	<tr><td colspan="2" align="center" id="boton"><b>GRUPO C</b></td></tr>
    <tr>
    	<td align="center" id="fuente"><b>EQUIPO</b></td>
        <td align="center" id="fuente"><b>PUNTOS</b></td>
    </tr>
    <?php foreach ($grupoC as $C){?>
    <tr>
    	<td align="center"><?php echo $C["Equipo"];?></td>
        <td align="center"><?php echo $C["Puntos"];?></td>
    </tr>
    <?php }?>
</table>
<!--GRUPOC-->

<!--GRUPOD-->
<table width="250px;" style="float:left">
	<tr><td colspan="2" align="center" id="boton"><b>GRUPO D</b></td></tr>
    <tr>
    	<td align="center" id="fuente"><b>EQUIPO</b></td>
        <td align="center" id="fuente"><b>PUNTOS</b></td>
    </tr>
    <?php foreach ($grupoD as $D){?>
    <tr>
    	<td align="center"><?php echo $D["Equipo"];?></td>
        <td align="center"><?php echo $D["Puntos"];?></td>
    </tr>
    <?php }?>
</table>
<!--GRUPOD-->
<BR/><BR/>
<!--GRUPOE-->
<table width="250px;" style="float:left">
	<tr><td colspan="2" align="center" id="boton"><b>GRUPO E</b></td></tr>
    <tr>
    	<td align="center" id="fuente"><b>EQUIPO</b></td>
        <td align="center" id="fuente"><b>PUNTOS</b></td>
    </tr>
    <?php foreach ($grupoE as $E){?>
    <tr>
    	<td align="center"><?php echo $E["Equipo"];?></td>
        <td align="center"><?php echo $E["Puntos"];?></td>
    </tr>
    <?php }?>
</table>
<!--GRUPOE-->

<!--GRUPOF-->
<table width="250px;" style="float:left">
	<tr><td colspan="2" align="center" id="boton"><b>GRUPO F</b></td></tr>
    <tr>
    	<td align="center" id="fuente"><b>EQUIPO</b></td>
        <td align="center" id="fuente"><b>PUNTOS</b></td>
    </tr>
    <?php foreach ($grupoF as $F){?>
    <tr>
    	<td align="center"><?php echo $F["Equipo"];?></td>
        <td align="center"><?php echo $F["Puntos"];?></td>
    </tr>
    <?php }?>
</table>
<!--GRUPOF-->

<!--GRUPOG-->
<table width="250px;" style="float:left">
	<tr><td colspan="2" align="center" id="boton"><b>GRUPO G</b></td></tr>
    <tr>
    	<td align="center" id="fuente"><b>EQUIPO</b></td>
        <td align="center" id="fuente"><b>PUNTOS</b></td>
    </tr>
    <?php foreach ($grupoG as $G){?>
    <tr>
    	<td align="center"><?php echo $G["Equipo"];?></td>
        <td align="center"><?php echo $G["Puntos"];?></td>
    </tr>
    <?php }?>
</table>
<!--GRUPOG-->

<!--GRUPOH-->
<table width="250px;" style="float:left">
	<tr><td colspan="2" align="center" id="boton"><b>GRUPO H</b></td></tr>
    <tr>
    	<td align="center" id="fuente"><b>EQUIPO</b></td>
        <td align="center" id="fuente"><b>PUNTOS</b></td>
    </tr>
    <?php foreach ($grupoH as $H){?>
    <tr>
    	<td align="center"><?php echo $H["Equipo"];?></td>
        <td align="center"><?php echo $H["Puntos"];?></td>
    </tr>
    <?php }?>
</table>
<!--GRUPOH-->
</div>

<table width="1000px" align="left" style="margin-top:30px;">
	<tr align="center">
    	<td colspan="3" id="boton">PROXIMOS PARTIDOS</td>
    </tr>
	<tr align="center">
        <td id="fuente">EQUIPO1</td>
        <td id="fuente">VS</td>
        <td id="fuente">EQUIPO2</td>
    </tr>
    <tr align="center">
    	<td><?php echo $primeroA;?></td>
        <td>VS</td>
        <td><?php echo $segundoB;?></td>
    </tr>
    <tr align="center">
    	<td><?php echo $primeroC;?></td>
        <td>VS</td>
        <td><?php echo $segundoD;?></td>
    </tr>
    <tr align="center">
    	<td><?php echo $primeroB;?></td>
        <td>VS</td>
        <td><?php echo $segundoA;?></td>
    </tr>
    <tr align="center">
    	<td><?php echo $primeroD;?></td>
        <td>VS</td>
        <td><?php echo $segundoC;?></td>
    </tr>
    <tr align="center">
    	<td><?php echo $primeroE;?></td>
        <td>VS</td>
        <td><?php echo $segundoF;?></td>
    </tr>
    <tr align="center">
    	<td><?php echo $primeroG;?></td>
        <td>VS</td>
        <td><?php echo $segundoH;?></td>
    </tr>
    <tr align="center">
    	<td><?php echo $primeroF;?></td>
        <td>VS</td>
        <td><?php echo $segundoE;?></td>
    </tr>
    <tr align="center">
    	<td><?php echo $primeroH;?></td>
        <td>VS</td>
        <td><?php echo $segundoG;?></td>
    </tr>
</table>


</body>
</html>