<?php
include("../bd.class.php");

$Y = date("Y");

//octavos de final//
$partidos = array();
$conspartidos = new base_datos;
$conspartidos->connect();
$sqlpartidos = "select * from segundafase where anno = '$Y' and fasepartido = 'Octavos'";
$respartidos = $conspartidos->query($sqlpartidos);
while ($dato_equipos = $conspartidos->fetch_row($respartidos))
{
	array_push($partidos, $dato_equipos);
}
//octavos de final//

//cuartos de final//
$partidos1 = array();
$conspartidos1 = new base_datos;
$conspartidos1->connect();
$sqlpartidos1 = "select * from segundafase where anno = '$Y' and fasepartido = 'Cuartos'";
$respartidos1 = $conspartidos1->query($sqlpartidos1);
while ($dato_equipos1 = $conspartidos1->fetch_row($respartidos1))
{
	array_push($partidos1, $dato_equipos1);
}
$cantcuartos = $conspartidos1->numrows($respartidos1);
//cuartos de final//

//semifinal//
$partidos2 = array();
$conspartidos2 = new base_datos;
$conspartidos2->connect();
$sqlpartidos2 = "select * from segundafase where anno = '$Y' and fasepartido = 'Semifinal'";
$respartidos2 = $conspartidos2->query($sqlpartidos2);
while ($dato_equipos2 = $conspartidos1->fetch_row($respartidos2))
{
	array_push($partidos2, $dato_equipos2);
}
$cantsemi = $conspartidos2->numrows($respartidos2);
//semifinal//

//final//
$partidos3 = array();
$conspartidos3 = new base_datos;
$conspartidos3->connect();
$sqlpartidos3 = "select * from segundafase where anno = '$Y' and fasepartido = 'Final'";
$respartidos3 = $conspartidos3->query($sqlpartidos3);
while ($dato_equipos3 = $conspartidos3->fetch_row($respartidos3))
{
	array_push($partidos3, $dato_equipos3);
}
$cantfinal = $conspartidos3->numrows($respartidos3);
//final//
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta http-equiv="Expires" content="0" />
<meta http-equiv="Pragma" content="no-cache" />
<title>Resultados</title>
<link href="../css/estilos_iframes.css" type="text/css" rel="stylesheet">
<link href="../css/fuentes.css" type="text/css" rel="stylesheet">
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

<table border="0" class="Estilo05">
	<tr align="center" class="Estilo07">
    	<td colspan="2"><b>OCTAVOS</b></td>
        <td width="20px"></td>
        <td colspan="2"><b>CUARTOS</b></td>
        <td width="20px"></td>
        <td colspan="2"><b>SEMIFINAL</b></td>
        <td width="20px"></td>
        <td colspan="2"><b>FINAL</b></td>
        <td width="20px"></td>
        <td colspan="2"><b>SEMIFINAL</b></td>
        <td width="20px"></td>
        <td colspan="2"><b>CUARTOS</b></td>
        <td width="20px"></td>
        <td colspan="2"><b>OCTAVOS</b></td>
    </tr>
    <tr align="center">
    	<td colspan="20" height="10"></td>
    </tr>
    <tr align="center">
    	<td width="90" class="Estilo05 Estilo03">
        <b><?php echo $partidos[0]["equipo1"];?></b>
        </td>
        <td width="40" class="Estilo05 Estilo03">
		<?php echo $partidos[0]["resultado1"].' / '.$partidos[2]["penal1"];?>
        </td>
        <td colspan="16"></td>
        <td width="40" class="Estilo05 Estilo03"><?php echo $partidos[2]["resultado1"].' / '.$partidos[2]["penal1"];?></td><td width="90" class="Estilo05 Estilo03"><b><?php echo $partidos[2]["equipo1"];?></b></td>
    </tr>
    <tr align="center">
    	<td colspan="2" class="Estilo02 Estilo01">
		<?php 
		$fecha = explode('-',$partidos[0]["fecha"]); 
		$fecha1 = ($fecha[2].'/'.$fecha[1].'/'.$fecha[0]);
		echo $fecha1;?></td>
        <td width="20px"></td>
        <td width="90" class="Estilo05 Estilo03">
        <?php if ($cantcuartos != 0) { ?> 
        	<b><?php echo $partidos1[0]["equipo1"];?></b>
        <?php } ?>
       	</td>
        <td width="40"  class="Estilo05 Estilo03">
        <?php if ($cantcuartos != 0) { ?>
        <?php echo $partidos1[0]["resultado1"].' / '.$partidos1[0]["penal1"];?>
        <?php } ?>
        </td>
        <td colspan="10"></td>
        <td width="40"  class="Estilo05 Estilo03">
        <?php if ($cantcuartos != 0) { ?>
        <?php echo $partidos1[1]["resultado1"].' / '.$partidos1[1]["penal1"];?>
        <?php } ?>
        </td>
        <td width="90" class="Estilo05 Estilo03">
        <?php if ($cantcuartos != 0) { ?>
        <b><?php echo $partidos1[1]["equipo1"];?></b>
        <?php } ?>
        </td>
        <td width="20px"></td>
        <td colspan="2" class="Estilo02 Estilo01">
        <?php 
		$fecha = explode('-',$partidos[2]["fecha"]); 
		$fecha5 = ($fecha[2].'/'.$fecha[1].'/'.$fecha[0]);
		echo $fecha5;?>
        </td>
    </tr>
    <tr align="center">
    	<td width="90" class="Estilo05 Estilo03"><b><?php echo $partidos[0]["equipo2"];?></b></td><td width="40"  class="Estilo05 Estilo03"><?php echo $partidos[0]["resultado2"].' / '.$partidos[0]["penal2"];?></td>
        <td colspan="7"></td>
        <td colspan="2"><b><font color="#003">Final</font></b></td>
        <td colspan="7"></td>
        <td width="40" class="Estilo05 Estilo03"><?php echo $partidos[2]["resultado2"].' / '.$partidos[2]["penal2"];?></td><td width="90" class="Estilo05 Estilo03"><b><?php echo $partidos[2]["equipo2"];?></b></td>
    </tr>
    <tr align="center">
    	<td colspan="3"></td>
        <td colspan="2" class="Estilo02 Estilo01">
		<?php if ($cantcuartos != 0) { ?>
		<?php 
		$fecha = explode('-',$partidos1[0]["fecha"]); 
		$fecha9 = ($fecha[2].'/'.$fecha[1].'/'.$fecha[0]);
		echo $fecha9;?>
        <?php } ?>
        </td>
        <td width="20"></td>
        <td width="90" class="Estilo05 Estilo03">
        <?php if ($cantsemi != 0) { ?>
        <b><?php echo $partidos2[0]["equipo1"];?></b>
        <?php } ?>
        </td>
        <td width="40"  class="Estilo05 Estilo03">
        <?php if ($cantsemi != 0) { ?>
        <?php echo $partidos2[0]["resultado1"].' / '.$partidos2[0]["penal1"];?>
        <?php } ?>
        </td>
        <td></td>
        <td width="90" class="Estilo05 Estilo03">
        <?php if ($cantfinal != 0) { ?>
        <b><?php echo $partidos3[0]["equipo1"];?></b>
        <?php } ?>
        </td><td width="40"  class="Estilo05 Estilo03">
        <?php if ($cantfinal != 0) { ?>
        <?php echo $partidos3[0]["resultado1"].' / '.$partidos3[0]["penal1"];?>
        <?php } ?>
        </td>
        <td></td>
        <td width="40"  class="Estilo05 Estilo03">
        <?php if ($cantsemi != 0) { ?>
        <?php echo $partidos2[1]["resultado1"].' / '.$partidos2[1]["penal1"];?>
        <?php } ?>
        </td><td width="90" class="Estilo05 Estilo03">
        <?php if ($cantsemi != 0) { ?>
        <b><?php echo $partidos2[1]["equipo1"];?></b>
        <?php } ?>
        </td>
        <td width="20"></td>
        <td colspan="2" class="Estilo02 Estilo01">
        <?php if ($cantcuartos != 0) { ?>
		<?php 
		$fecha = explode('-',$partidos1[1]["fecha"]); 
		$fecha11 = ($fecha[2].'/'.$fecha[1].'/'.$fecha[0]);
		echo $fecha11;?>
        <?php } ?>
        </td>
        <td colspan="3"></td>
    </tr>
    <tr align="center">
    	<td width="90" class="Estilo05 Estilo03"><b><?php echo $partidos[1]["equipo1"];?></b></td><td width="40" class="Estilo05 Estilo03"><?php echo $partidos[1]["resultado1"].' / '.$partidos[1]["penal1"];?></td>
        <td colspan="7"></td>
        <td colspan="2" class="Estilo02 Estilo01">
        <?php if ($cantfinal != 0) { ?>
		<?php 
		$fecha = explode('-',$partidos3[0]["fecha"]); 
		$fecha15 = ($fecha[2].'/'.$fecha[1].'/'.$fecha[0]);
		echo $fecha15;?>
        <?php } ?>
        </td>
        <td colspan="7"></td>
        <td width="40" class="Estilo05 Estilo03"><?php echo $partidos[3]["resultado1"].' / '.$partidos[3]["penal1"];?></td><td width="90" class="Estilo05 Estilo03"><b><?php echo $partidos[3]["equipo1"];?></b></td>
    </tr>
    <tr align="center">
    	<td colspan="2" class="Estilo02 Estilo01">
        <?php 
		$fecha = explode('-',$partidos[1]["fecha"]); 
		$fecha2 = ($fecha[2].'/'.$fecha[1].'/'.$fecha[0]);
		echo $fecha2;?>
        </td>
        <td width="20px"></td>
        <td width="90" class="Estilo05 Estilo03">
        <?php if ($cantcuartos != 0) { ?>
        <b><?php echo $partidos1[0]["equipo2"];?></b>
        <?php } ?>
        </td>
        <td width="40" class="Estilo05 Estilo03">
        <?php if ($cantcuartos != 0) { ?>
        <?php echo $partidos1[0]["resultado2"].' / '.$partidos1[0]["penal2"];?>
        <?php } ?>
        </td>
        <td colspan="4"></td>
        <td width="90" class="Estilo05 Estilo03">
        <?php if ($cantfinal != 0) { ?>
        <b><?php echo $partidos3[0]["equipo2"];?></b>
        <?php } ?>
        </td><td width="40" class="Estilo05 Estilo03">
        <?php if ($cantfinal != 0) { ?>
        <?php echo $partidos3[0]["resultado2"].' / '.$partidos3[0]["penal2"];?>
        <?php } ?>
        </td>
        <td colspan="4"></td>
        <td width="40" class="Estilo05 Estilo03">
        <?php if ($cantcuartos != 0) { ?>
        <?php echo $partidos1[1]["resultado2"].' / '.$partidos1[1]["penal2"];?>
        <?php } ?>
        </td>
        <td width="90" class="Estilo05 Estilo03">
        <?php if ($cantcuartos != 0) { ?>
        <b><?php echo $partidos1[1]["equipo2"];?></b>
        <?php } ?>
        </td>
        <td width="20px">
        
        </td>
        <td colspan="2" class="Estilo02 Estilo01">
        <?php 
		$fecha = explode('-',$partidos[3]["fecha"]); 
		$fecha6 = ($fecha[2].'/'.$fecha[1].'/'.$fecha[0]);
		echo $fecha6;?>
        </td>
    </tr>
    <tr align="center">
    	<td width="90" class="Estilo05 Estilo03"><b><?php echo $partidos[1]["equipo2"];?></b></td><td width="40" class="Estilo05 Estilo03"><?php echo $partidos[1]["resultado2"].' / '.$partidos[1]["penal2"];?></td>
        <td colspan="16"></td>
        <td width="40" class="Estilo05 Estilo03"><?php echo $partidos[3]["resultado2"].' / '.$partidos[3]["penal2"];?></td><td width="90" class="Estilo05 Estilo03"><b><?php echo $partidos[3]["equipo2"];?></b></td>
    </tr>
    <tr align="center">
    	<td colspan="6"></td>
        <td colspan="2" class="Estilo02 Estilo01">
        <?php if ($cantsemi != 0) { ?>
		<?php 
		$fecha = explode('-',$partidos2[0]["fecha"]); 
		$fecha13 = ($fecha[2].'/'.$fecha[1].'/'.$fecha[0]);
		echo $fecha13;?>
        <?php } ?>
        </td>
        <td colspan="4"></td>
        <td colspan="2" class="Estilo02 Estilo01">
        <?php if ($cantsemi != 0) { ?>
		<?php 
		$fecha = explode('-',$partidos2[1]["fecha"]); 
		$fecha14 = ($fecha[2].'/'.$fecha[1].'/'.$fecha[0]);
		echo $fecha14;?>
        <?php } ?>
        </td>
        <td colspan="6"></td>
    </tr>
    <tr align="center">
    	<td width="90" class="Estilo05 Estilo03"><b><?php echo $partidos[4]["equipo1"];?></b></td><td width="40" class="Estilo05 Estilo03"><?php echo $partidos[4]["resultado1"].' / '.$partidos[4]["penal1"];?></td>
        <td colspan="16"></td>
        <td width="40" class="Estilo05 Estilo03"><?php echo $partidos[6]["resultado1"].' / '.$partidos[6]["penal1"];?></td><td width="90" class="Estilo05 Estilo03"><b><?php echo $partidos[6]["equipo1"];?></b></td>
    </tr>
    <tr align="center">
    	<td colspan="2" class="Estilo02 Estilo01">
        <?php 
		$fecha = explode('-',$partidos[4]["fecha"]); 
		$fecha3 = ($fecha[2].'/'.$fecha[1].'/'.$fecha[0]);
		echo $fecha3;?>
        </td>
        <td width="20px"></td>
        <td width="90" class="Estilo05 Estilo03">
        <?php if ($cantcuartos != 0) { ?>
        <b><?php echo $partidos1[2]["equipo1"];?></b>
        <?php } ?>
        </td>
        <td width="40" class="Estilo05 Estilo03">
        <?php if ($cantcuartos != 0) { ?>
        <?php echo $partidos1[2]["resultado1"].' / '.$partidos1[2]["penal1"];?>
        <?php } ?>
        </td>
        <td colspan="10"></td>
        <td width="40" class="Estilo05 Estilo03">
        <?php if ($cantcuartos != 0) { ?>
        <?php echo $partidos1[3]["resultado1"].' / '.$partidos1[3]["penal1"];?>
        <?php } ?>
        </td>
        <td width="90" class="Estilo05 Estilo03">
        <?php if ($cantcuartos != 0) { ?>
        <b><?php echo $partidos1[3]["equipo1"];?></b>
        <?php } ?>
        </td>
        <td width="20px"></td>
        <td colspan="2" class="Estilo02 Estilo01">
        <?php 
		$fecha = explode('-',$partidos[6]["fecha"]); 
		$fecha7 = ($fecha[2].'/'.$fecha[1].'/'.$fecha[0]);
		echo $fecha7;?>
        </td>
    </tr>
    <tr align="center">
    	<td width="90" class="Estilo05 Estilo03"><b><?php echo $partidos[4]["equipo2"];?></b></td><td width="40" class="Estilo05 Estilo03"><?php echo $partidos[4]["resultado2"].' / '.$partidos[4]["penal2"];?></td>
        <td colspan="7"></td>
        <td colspan="2"><b><font color="#003">Tercer Lugar</font></b></td>
        <td colspan="7"></td>
        <td width="40" class="Estilo05 Estilo03"><?php echo $partidos[6]["resultado2"].' / '.$partidos[6]["penal2"];?></td><td width="90" class="Estilo05 Estilo03"><b><?php echo $partidos[6]["equipo2"];?></b></td>
    </tr>
    <tr align="center">
    	<td colspan="3"></td>
        <td colspan="2" class="Estilo02 Estilo01">
        <?php if ($cantcuartos != 0) { ?>
		<?php 
		$fecha = explode('-',$partidos1[2]["fecha"]); 
		$fecha10 = ($fecha[2].'/'.$fecha[1].'/'.$fecha[0]);
		echo $fecha10;?>
        <?php } ?>
        </td>
        <td width="20"></td>
        <td width="90" class="Estilo05 Estilo03">
        <?php if ($cantsemi != 0) { ?>
        <b><?php echo $partidos2[0]["equipo2"];?></b>
        <?php } ?>
        </td><td width="40" class="Estilo05 Estilo03">
        <?php if ($cantsemi != 0) { ?>
        <?php echo $partidos2[0]["resultado2"].' / '.$partidos2[0]["penal2"];?>
        <?php } ?>
        </td>
        <td></td>
        <td width="90" class="Estilo05 Estilo03">
        <?php if ($cantfinal != 0) { ?>
        <b><?php echo $partidos3[1]["equipo1"];?></b>
        <?php } ?>
        </td><td width="40" class="Estilo05 Estilo03">
        <?php if ($cantfinal != 0) { ?>
        <?php echo $partidos3[1]["resultado1"].' / '.$partidos3[1]["penal1"];?>
        <?php } ?>
        </td>
        <td></td>
        <td width="40" class="Estilo05 Estilo03">
        <?php if ($cantsemi != 0) { ?>
        <?php echo $partidos2[1]["resultado2"].' / '.$partidos2[1]["penal2"];?>
        <?php } ?>
        </td><td width="90" class="Estilo05 Estilo03">
        <?php if ($cantsemi != 0) { ?>
        <b><?php echo $partidos2[1]["equipo2"];?></b>
        <?php } ?>
        </td>
        <td width="20"></td>
        <td colspan="2" class="Estilo02 Estilo01">
        <?php if ($cantcuartos != 0) { ?>
		<?php 
		$fecha = explode('-',$partidos1[3]["fecha"]); 
		$fecha12 = ($fecha[2].'/'.$fecha[1].'/'.$fecha[0]);
		echo $fecha12;?>
        <?php } ?>
        </td>
        <td colspan="3"></td>
    </tr>
    <tr align="center">
    	<td width="90" class="Estilo05 Estilo03"><b><?php echo $partidos[5]["equipo1"];?></b></td><td width="40" class="Estilo05 Estilo03"><?php echo $partidos[5]["resultado1"].' / '.$partidos[5]["penal1"];?></td>
        <td colspan="7"></td>
        <td colspan="2" class="Estilo02 Estilo01">
        <?php if ($cantfinal != 0) { ?>
		<?php 
		$fecha = explode('-',$partidos3[1]["fecha"]); 
		$fecha16 = ($fecha[2].'/'.$fecha[1].'/'.$fecha[0]);
		echo $fecha16;?>
        <?php } ?>
        </td>
        <td colspan="7"></td>
        <td width="40" class="Estilo05 Estilo03"><?php echo $partidos[7]["resultado1"].' / '.$partidos[7]["penal1"];?></td><td width="90" class="Estilo05 Estilo03"><b><?php echo $partidos[7]["equipo1"];?></b></td>
    </tr>
    <tr align="center">
    	<td colspan="2" class="Estilo02 Estilo01">
        <?php 
		$fecha = explode('-',$partidos[5]["fecha"]); 
		$fecha4 = ($fecha[2].'/'.$fecha[1].'/'.$fecha[0]);
		echo $fecha4;?>
        </td>
        <td width="20px"></td>
        <td width="90" class="Estilo05 Estilo03">
        <?php if ($cantcuartos != 0) { ?>
        <b><?php echo $partidos1[2]["equipo2"];?></b>
        <?php } ?>
        </td>
        <td width="40" class="Estilo05 Estilo03">
        <?php if ($cantcuartos != 0) { ?>
        <?php echo $partidos1[2]["resultado2"].' / '.$partidos1[2]["penal2"];?>
        <?php } ?>
        </td>
        <td colspan="4"></td>
        <td width="90" class="Estilo05 Estilo03">
        <?php if ($cantfinal != 0) { ?>
        <b><?php echo $partidos3[1]["equipo2"];?></b>
        <?php } ?>
        </td><td width="40" class="Estilo05 Estilo03">
        <?php if ($cantfinal != 0) { ?>
        <?php echo $partidos3[1]["resultado2"].' / '.$partidos3[1]["penal2"];?>
        <?php } ?>
        </td>
        <td colspan="4"></td>
        <td width="40" class="Estilo05 Estilo03">
        <?php if ($cantcuartos != 0) { ?>
        <?php echo $partidos1[3]["resultado2"].' / '.$partidos1[3]["penal2"];?>
        <?php } ?>
        </td>
        <td width="90" class="Estilo05 Estilo03">
        <?php if ($cantcuartos != 0) { ?>
        <b><?php echo $partidos1[3]["equipo2"];?></b>
        <?php } ?>
        </td>
        <td width="20px"></td>
        <td colspan="2" class="Estilo02 Estilo01">
        <?php 
		$fecha = explode('-',$partidos[7]["fecha"]); 
		$fecha8 = ($fecha[2].'/'.$fecha[1].'/'.$fecha[0]);
		echo $fecha8;?>
        </td>
    </tr>
    <tr align="center">
    	<td width="90" class="Estilo05 Estilo03"><b><?php echo $partidos[5]["equipo2"];?></b></td><td width="40" class="Estilo05 Estilo03"><?php echo $partidos[5]["resultado2"].' / '.$partidos[5]["penal2"];?></td>
        <td colspan="16"></td>
        <td width="40" class="Estilo05 Estilo03"><?php echo $partidos[7]["resultado2"].' / '.$partidos[7]["penal2"];?></td><td width="90" class="Estilo05 Estilo03"><b><?php echo $partidos[7]["equipo2"];?></b></td>
    </tr>
</table>
</body>
</html>