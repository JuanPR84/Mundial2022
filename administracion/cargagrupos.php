<?php
include("../../classes/bd.class.php");

$Y = date("Y");

//inicio de cantidad de equipos en los grupos//
$cantequipos = array();
$conscant = new base_datos;
$conscant->connect();
$sqlcant = "SELECT COUNT(Annomundial) AS cant_equipos FROM equiposmundial WHERE Annomundial = '$Y';";
$rescant = $conscant->query($sqlcant);
while ($dato_equipos = $conscant->fetch_row($rescant))
{
	array_push($cantequipos, $dato_equipos);
}
//fin de cantidad de equipos en los grupos//

//inicio de fechas vacias en la primera fase//
$fechas1 = array();
$consfechas1 = new base_datos;
$consfechas1->connect();
$sqlfechas1 = "SELECT * FROM fechas WHERE anno = '$Y' and fecha = '0000-00-00';";
$resfechas1 = $consfechas1->query($sqlfechas1);
while ($dato_fechas1 = $consfechas1->fetch_row($resfechas1))
{
	array_push($fechas1, $dato_fechas1);
}
$fechavacia1 = $consfechas1->numrows($resfechas1);

$fechas2 = array();
$consfechas2 = new base_datos;
$consfechas2->connect();
$sqlfechas2 = "SELECT * FROM fechas WHERE anno = '$Y' and fecha != '0000-00-00';";
$resfechas2 = $consfechas2->query($sqlfechas2);
while ($dato_fechas2 = $consfechas2->fetch_row($resfechas2))
{
	array_push($fechas2, $dato_fechas2);
}
$fechavacia2 = $consfechas2->numrows($resfechas2);
//fin de fechas vacias en la primera fase//

//inicio de resultados vacios primera fase//
$resultados1 = array();
$consresultados1 = new base_datos;
$consresultados1->connect();
$sqlresultados1 = "SELECT * FROM fechas WHERE Anno = '$Y' and resultado1 = '' and resultado2 = '' and fecha != '0000-00-00';";
$resresultados1 = $consresultados1->query($sqlresultados1);
while ($dato_resultados1 = $consresultados1->fetch_row($resresultados1))
{
	array_push($resultados1, $dato_resultados1);
}
$resultadosvacio1 = $consresultados1->numrows($resresultados1);
//fin de resultados vacios primera fase//

//inicio de resultados llenos primera fase//
$fase1 = array();
$consfase1 = new base_datos;
$consfase1->connect();
$sqlfase1 = "SELECT COUNT(anno) AS cantidadfase1 FROM fechas WHERE resultado1 <> '' and resultado2 <> '' and anno = '$Y' ;";
$resfase1 = $consfase1->query($sqlfase1);
while ($datofase1 = $consfase1->fetch_row($resfase1))
{
	array_push($fase1, $datofase1);
}
//fin de resultados llenos primera fase//

//inicio de fechas fase octavos//
$cantequipos1 = array();
$conscant1 = new base_datos;
$conscant1->connect();
$sqlcant1 = "SELECT COUNT(anno) AS cant_equipos FROM segundafase WHERE Anno = '$Y' and fasepartido = 'Octavos';";
$rescant1 = $conscant1->query($sqlcant1);
while ($dato_equipos1 = $conscant1->fetch_row($rescant1))
{
	array_push($cantequipos1, $dato_equipos1);
}
//fin de fechas fase octavos//

//inicio de fechas llenas fase octavos//
$octavos = array();
$consoctavos = new base_datos;
$consoctavos->connect();
$sqloctavos = "SELECT COUNT(anno) AS fechasvacias FROM segundafase WHERE Anno = '$Y' and fasepartido = 'Octavos' and fecha != '0000-00-00';";
$resoctavos = $consoctavos->query($sqloctavos);
while ($datooctavos = $consoctavos->fetch_row($resoctavos))
{
	array_push($octavos, $datooctavos);
}

$octavos2 = array();
$consoctavos2 = new base_datos;
$consoctavos2->connect();
$sqloctavos2 = "SELECT COUNT(anno) AS resultados FROM segundafase WHERE anno = '$Y' and fasepartido = 'Octavos' and fecha != '0000-00-00' and resultado1 != '';";
$resoctavos2 = $consoctavos2->query($sqloctavos2);
while ($datooctavos2 = $consoctavos2->fetch_row($resoctavos2))
{
	array_push($octavos2, $datooctavos2);
}
//fin de fechas llenas fase octavos//

//inicio de fechas fase cuartos//
$cantequipos2 = array();
$conscant2 = new base_datos;
$conscant2->connect();
$sqlcant2 = "SELECT COUNT(Anno) AS cant_equipos FROM segundafase WHERE Anno = '$Y' and fasepartido = 'Cuartos';";
$rescant2 = $conscant2->query($sqlcant2);
while ($dato_equipos2 = $conscant2->fetch_row($rescant2))
{
	array_push($cantequipos2, $dato_equipos2);
}

$cuartos = array();
$conscuartos = new base_datos;
$conscuartos->connect();
$sqlcuartos = "SELECT COUNT(anno) AS fechasvacias FROM segundafase WHERE Anno = '$Y' and fasepartido = 'Cuartos' and fecha != '0000-00-00';";
$rescuartos = $conscuartos->query($sqlcuartos);
while ($datocuartos = $conscuartos->fetch_row($rescuartos))
{
	array_push($cuartos, $datocuartos);
}

$cuartos2 = array();
$conscuartos2 = new base_datos;
$conscuartos2->connect();
$sqlcuartos2 = "SELECT COUNT(anno) AS resultados FROM segundafase WHERE anno = '$Y' and fasepartido = 'Cuartos' and fecha != '0000-00-00' and resultado1 != '';";
$rescuartos2 = $conscuartos2->query($sqlcuartos2);
while ($datocuartos2 = $conscuartos2->fetch_row($rescuartos2))
{
	array_push($cuartos2, $datocuartos2);
}
//fin de fechas fase cuartos//

//inicio de fechas fase semifinal//
$cantequipos3 = array();
$conscant3 = new base_datos;
$conscant3->connect();
$sqlcant3 = "SELECT COUNT(Anno) AS cant_equipos FROM segundafase WHERE Anno = '$Y' and fasepartido = 'Semifinal';";
$rescant3 = $conscant3->query($sqlcant3);
while ($dato_equipos3 = $conscant3->fetch_row($rescant3))
{
	array_push($cantequipos3, $dato_equipos3);
}

$semi = array();
$conssemi = new base_datos;
$conssemi->connect();
$sqlsemi = "SELECT COUNT(anno) AS fechasvacias FROM segundafase WHERE Anno = '$Y' and fasepartido = 'Semifinal' and fecha != '0000-00-00';";
$ressemi = $conssemi->query($sqlsemi);
while ($datosemi = $conssemi->fetch_row($ressemi))
{
	array_push($semi, $datosemi);
}

$semi2 = array();
$conssemi2 = new base_datos;
$conssemi2->connect();
$sqlsemi2 = "SELECT COUNT(anno) AS resultados FROM segundafase WHERE anno = '$Y' and fasepartido = 'Semifinal' and fecha != '0000-00-00' and resultado1 != '';";
$ressemi2 = $conssemi2->query($sqlsemi2);
while ($datosemi2 = $conssemi2->fetch_row($ressemi2))
{
	array_push($semi2, $datosemi2);
}
//fin de fechas fase semifinal//

//inicio de fechas fase final//
$cantequipos4 = array();
$conscant4 = new base_datos;
$conscant4->connect();
$sqlcant4 = "SELECT COUNT(Anno) AS cant_equipos FROM segundafase WHERE Anno = '$Y' and fasepartido = 'Final';";
$rescant4 = $conscant4->query($sqlcant4);
while ($dato_equipos4 = $conscant4->fetch_row($rescant4))
{
	array_push($cantequipos4, $dato_equipos4);
}

$final = array();
$consfinal = new base_datos;
$consfinal->connect();
$sqlfinal = "SELECT COUNT(anno) AS fechasvacias FROM segundafase WHERE Anno = '$Y' and fasepartido = 'Final' and fecha != '0000-00-00';";
$resfinal = $consfinal->query($sqlfinal);
while ($datofinal = $consfinal->fetch_row($resfinal))
{
	array_push($final, $datofinal);
}

$final2 = array();
$consfinal2 = new base_datos;
$consfinal2->connect();
$sqlfinal2 = "SELECT COUNT(anno) AS resultados FROM segundafase WHERE anno = '$Y' and fasepartido = 'Final' and fecha != '0000-00-00' and resultado1 != '';";
$resfinal2 = $consfinal2->query($sqlfinal2);
while ($datofinal2 = $consfinal2->fetch_row($resfinal2))
{
	array_push($final2, $datofinal2);
}
//fin de fechas fase semifinal//
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Administración Mundial</title>
</head>

<body>
<!--inicia carga de grupos-->
<?php if (number_format($cantequipos[0]["cant_equipos"],0) < 32) { ?>
	<div style="width:500px; height:auto">
		<div align="center"><b>Seleccione grupo a ingresar</b></div>
        <br/>
		<form action="actualizargrupo.php" method="post" >
            <table width="100%" align="center">
                <tr>
                    <td align="center"><input type="submit" name="grupo" value="Grupo-A" /></td>
                    <td align="center"><input type="submit" name="grupo" value="Grupo-B" /></td>
                </tr>
                <tr>
                    <td colspan="2" style="height:10px;"></td>	
                </tr>
                <tr>
                    <td align="center"><input type="submit" name="grupo" value="Grupo-C" /></td>
                    <td align="center"><input type="submit" name="grupo" value="Grupo-D" /></td>
                </tr>
                <tr>
                    <td colspan="2" style="height:10px;"></td>	
                </tr>
                <tr>
                    <td align="center"><input type="submit" name="grupo" value="Grupo-E" /></td>
                    <td align="center"><input type="submit" name="grupo" value="Grupo-F" /></td>
                </tr>
                <tr>
                    <td colspan="2" style="height:10px;"></td>	
                </tr>
                <tr>
                    <td align="center"><input type="submit" name="grupo" value="Grupo-G" /></td>
                    <td align="center"><input type="submit" name="grupo" value="Grupo-H" /></td>
                </tr>
                <tr>
                    <td colspan="2" style="height:10px;"></td>	
                </tr>
            </table>
		</form>
	</div>
<?php } else if (number_format($cantequipos[0]["cant_equipos"],0) == 32) { ?><!--grupos completos-->
	<?php if (($fechavacia1 == 0)and($fechavacia2 == 0)) { ?><!--fechas vacias primera fase-->
		<div style="width:500px; height:auto">
            <div align="center"><b>Administracion de fechas</b></div>
            <br/>
            <div align="center">
                Los grupos han sido creados completamente, pulse el boton de "Fechas" para la asignacion de fechas
                 de los partidos de primera ronda.
            </div>
            <br/>
            <div align="center">
                <a href="fechas.php" style="text-decoration:none">
                    <input type="button" value="Fechas" />
                </a>
            </div>
            <br/>
		</div>
	<?php } ?>
    
    <?php if ($resultadosvacio1 > 0){ ?><!--resultados vacios primera fase-->
		<div style="width:500px; height:auto">
			<div align="center">
            	<b>Administracion de resultados</b>
           	</div>
            <br/>
			<div align="center">
            	Ingrese los resultados de los partidos, pulse el boton "Resultados", recuerde que los resultados 
                solo pueden ingresarse una vez por lo cual debe ser exacto su ingreso.
          	</div>
            <br/>
			<div align="center">
				<a href="resultados.php" style="text-decoration:none">
					<input type="button" value="Resultados" />
				</a>
			</div>
            <br/>
		</div>
	<?php } ?>

	<?php if ($fase1[0]["cantidadfase1"] == 48) { ?><!-- inicia resultados llenos primera fase-->
		<?php if ($cantequipos1[0]["cant_equipos"] < 8) { ?><!--inicia fase octavos-->
			<div style="width:500px; height:auto">
				<div align="center">
            		<b>Activaci&oacute;n de octavos de final</b>
               	</div>
                <br/>
				<div align="center">
                	Pulse el bot&oacute;n activar octavos para crear las fechas automaticamente.
              	</div>
                <br/>
				<div align="center">
					<a href="activaroctavos.php" style="text-decoration:none">
						<input type="button" value="Activar Octavos" />
					</a>
				</div>
                <br/>
			</div>
		<?php } ?>
    <?php } ?>

	<?php if ($cantequipos1[0]["cant_equipos"] == 8) { ?><!-- inicia fechas fase octavos-->
    
    	<?php if ($octavos[0]["fechasvacias"] == 0){ ?><!-- inicia fechas vacias fase octavos-->
			<div style="width:500px; height:auto">
				<div align="center">
                	<b>Administracion de octavos de final</b>
              	</div>
                <br/>
				<div align="center">
                	Ingrese las fechas de los partidos de octavos de final, recuerde que esta parte permitira
                     definiciones desde el punto penal.
              	</div>
                <br/>
				<div align="center">
					<a href="octavos.php" style="text-decoration:none">
						<input type="button" value="Fechas Octavos" />
					</a>
				</div>
                <br/>
			</div>
		<?php } ?>
        
        <!-- inicia fechas llenas fase octavos-->
        <?php if (($octavos[0]["fechasvacias"] == 8)and($octavos2[0]["resultados"] == 0)) { ?>
        	<div style="width:500px; height:auto">
                <div align="center">
                    <b>Administracion de resultados octavos</b>
                </div>
                <br/>
                <div align="center">
                    Ingrese los resultados de los partidos, pulse el boton "Resultados", recuerde que los
                     resultados solo pueden ingresarse una vez por lo cual debe ser exacto su ingreso.
                </div>
                <br/>
                <div align="center">
                    <a href="resultadosoctavos.php" style="text-decoration:none">
                        <input type="button" value="Resultados Octavos" />
                    </a>
                </div>
                <br/>
            </div>
         <?php } ?>   
         <!--cuartos de final-->
         <?php if (($octavos[0]["fechasvacias"] == 8)and($cantequipos2[0]["cant_equipos"] == 0)and($octavos2[0]["resultados"] == 8)) {?>
            <div style="width:500px; height:auto">
				<div align="center">
            		<b>Activaci&oacute;n de cuartos de final</b>
               	</div>
                <br/>
				<div align="center">
                	Pulse el bot&oacute;n activar cuartos de final para crear las fechas automaticamente.
              	</div>
                <br/>
				<div align="center">
					<a href="activarcuartos.php" style="text-decoration:none">
						<input type="button" value="Activar Cuartos" />
					</a>
				</div>
                <br/>
			</div>            
         <?php } ?>	
         
         <?php if (($cantequipos2[0]["cant_equipos"] == 4)and($cuartos[0]["fechasvacias"] < 4)) {?>
         	<div style="width:500px; height:auto">
				<div align="center">
                	<b>Administracion de cuartos de final</b>
              	</div>
                <br/>
				<div align="center">
                	Ingrese las fechas de los partidos de cuartos de final, recuerde que esta parte permitira
                     definiciones desde el punto penal.
              	</div>
                <br/>
				<div align="center">
					<a href="cuartos.php" style="text-decoration:none">
						<input type="button" value="Fechas Cuartos" />
					</a>
				</div>
                <br/>
			</div>
         <?php } ?>
         
         <?php if (($cuartos[0]["fechasvacias"] == 4)and($cuartos2[0]["resultados"] == 0)) { ?>
         	<div style="width:500px; height:auto">
                <div align="center">
                    <b>Administracion de resultados cuartos</b>
                </div>
                <br/>
                <div align="center">
                    Ingrese los resultados de los partidos, pulse el boton "Resultados", recuerde que los
                     resultados solo pueden ingresarse una vez por lo cual debe ser exacto su ingreso.
                </div>
                <br/>
                <div align="center">
                    <a href="resultadoscuartos.php" style="text-decoration:none">
                        <input type="button" value="Resultados Cuartos" />
                    </a>
                </div>
                <br/>
            </div>
         <?php } ?>
         <!--cuartos de final-->
         
         <!--semifinal-->
         <?php if (($cuartos[0]["fechasvacias"] == 4)and($cantequipos3[0]["cant_equipos"] == 0)and($cuartos2[0]["resultados"] == 4)) {?>
            <div style="width:500px; height:auto">
				<div align="center">
            		<b>Activaci&oacute;n de semifinal</b>
               	</div>
                <br/>
				<div align="center">
                	Pulse el bot&oacute;n activar semifinal para crear las fechas automaticamente.
              	</div>
                <br/>
				<div align="center">
					<a href="activarsemi.php" style="text-decoration:none">
						<input type="button" value="Activar Semifinal" />
					</a>
				</div>
                <br/>
			</div>            
         <?php } ?>	
         <?php if (($cantequipos3[0]["cant_equipos"] == 2)and($semi[0]["fechasvacias"] < 2)) {?>
         	<div style="width:500px; height:auto">
				<div align="center">
                	<b>Administracion de semifinal</b>
              	</div>
                <br/>
				<div align="center">
                	Ingrese las fechas de los partidos de semifinal, recuerde que esta parte permitira
                     definiciones desde el punto penal.
              	</div>
                <br/>
				<div align="center">
					<a href="semi.php" style="text-decoration:none">
						<input type="button" value="Fechas Semifinal" />
					</a>
				</div>
                <br/>
			</div>
         <?php } ?>
         <?php if (($semi[0]["fechasvacias"] == 2)and($semi2[0]["resultados"] == 0)) { ?>
         	<div style="width:500px; height:auto">
                <div align="center">
                    <b>Administracion de resultados semifinal</b>
                </div>
                <br/>
                <div align="center">
                    Ingrese los resultados de los partidos, pulse el boton "Resultados", recuerde que los
                     resultados solo pueden ingresarse una vez por lo cual debe ser exacto su ingreso.
                </div>
                <br/>
                <div align="center">
                    <a href="resultadossemi.php" style="text-decoration:none">
                        <input type="button" value="Resultados Semifinal" />
                    </a>
                </div>
                <br/>
            </div>
         <?php } ?>
         <!--semifinal-->
         
         <!--final-->
         <?php if (($semi2[0]["fechasvacias"] == 0)and($cantequipos4[0]["cant_equipos"] == 0)and($octavos[0]["fechasvacias"] == 8)and($octavos2[0]["resultados"] == 8)and($cuartos2[0]["resultados"] == 4)and($semi2[0]["resultados"] == 2)) {?>
            <div style="width:500px; height:auto">
				<div align="center">
            		<b>Activaci&oacute;n de final</b>
               	</div>
                <br/>
				<div align="center">
                	Pulse el bot&oacute;n activar final para crear las fechas automaticamente.
              	</div>
                <br/>
				<div align="center">
					<a href="activarfinal.php" style="text-decoration:none">
						<input type="button" value="Activar Final" />
					</a>
				</div>
                <br/>
			</div>            
         <?php } ?>	
         <?php if (($cantequipos4[0]["cant_equipos"] == 2)and($final[0]["fechasvacias"] < 2)) {?>
         	<div style="width:500px; height:auto">
				<div align="center">
                	<b>Administracion de final</b>
              	</div>
                <br/>
				<div align="center">
                	Ingrese las fechas de los partidos de la final, recuerde que esta parte permitira
                     definiciones desde el punto penal.
              	</div>
                <br/>
				<div align="center">
					<a href="final.php" style="text-decoration:none">
						<input type="button" value="Fechas Final" />
					</a>
				</div>
                <br/>
			</div>
         <?php } ?>
         <?php if (($final[0]["fechasvacias"] == 2)and($final2[0]["resultados"] == 0)) { ?>
         	<div style="width:500px; height:auto">
                <div align="center">
                    <b>Administracion de resultados Final</b>
                </div>
                <br/>
                <div align="center">
                    Ingrese los resultados de los partidos, pulse el boton "Resultados", recuerde que los
                     resultados solo pueden ingresarse una vez por lo cual debe ser exacto su ingreso.
                </div>
                <br/>
                <div align="center">
                    <a href="resultadosfinal.php" style="text-decoration:none">
                        <input type="button" value="Resultados Final" />
                    </a>
                </div>
                <br/>
            </div>
         <?php } ?>
         <!--final-->
         <?php if (($final[0]["fechasvacias"] == 2)and($final2[0]["resultados"] == 2)) { ?>
         	<div style="width:500px; height:auto">
                <div align="center">
                    <b>Mundial Finalizado</b>
                </div>
            </div>
         <?php } ?>
         
	<?php } ?>
<?php } ?>
</body>
</html>