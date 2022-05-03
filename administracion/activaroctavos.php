<?php
include("../../classes/bd.class.php");
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

$sql1 = "INSERT INTO segundafase (id,fasepartido,equipo1,equipo2,anno) 
		Values('','Octavos','$primeroA','$segundoB','$Y')";
$insert1 = new base_datos;
$insert1->connect();
$insert1->query($sql1);

$sql2 = "INSERT INTO segundafase (id,fasepartido,equipo1,equipo2,anno) 
		Values('','Octavos','$primeroC','$segundoD','$Y')";
$insert2 = new base_datos;
$insert2->connect();
$insert2->query($sql2);

$sql3 = "INSERT INTO segundafase (id,fasepartido,equipo1,equipo2,anno) 
		Values('','Octavos','$primeroB','$segundoA','$Y')";
$insert3 = new base_datos;
$insert3->connect();
$insert3->query($sql3);

$sql4 = "INSERT INTO segundafase (id,fasepartido,equipo1,equipo2,anno) 
		Values('','Octavos','$primeroD','$segundoC','$Y')";
$insert4 = new base_datos;
$insert4->connect();
$insert4->query($sql4);

$sql5 = "INSERT INTO segundafase (id,fasepartido,equipo1,equipo2,anno) 
		Values('','Octavos','$primeroE','$segundoF','$Y')";
$insert5 = new base_datos;
$insert5->connect();
$insert5->query($sql5);

$sql6 = "INSERT INTO segundafase (id,fasepartido,equipo1,equipo2,anno) 
		Values('','Octavos','$primeroG','$segundoH','$Y')";
$insert6 = new base_datos;
$insert6->connect();
$insert6->query($sql6);

$sql7 = "INSERT INTO segundafase (id,fasepartido,equipo1,equipo2,anno) 
		Values('','Octavos','$primeroF','$segundoE','$Y')";
$insert7 = new base_datos;
$insert7->connect();
$insert7->query($sql7);

$sql8 = "INSERT INTO segundafase (id,fasepartido,equipo1,equipo2,anno) 
		Values('','Octavos','$primeroH','$segundoG','$Y')";
$insert8 = new base_datos;
$insert8->connect();
$insert8->query($sql8);

echo "<script>
	alert('Creacion de fechas de octavos creadas con exito');
	window.location = 'cargagrupos.php';
</script>";

?>