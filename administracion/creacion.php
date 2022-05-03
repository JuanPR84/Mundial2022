<?php
include("../bd.class.php");

$Y = date("Y");
$grupo = $_POST["grupoexacto"];
$pos1 = $_POST["1"];
$pos2 = $_POST["2"];
$pos3 = $_POST["3"];
$pos4 = $_POST["4"];

$creado = array();
$conscreado = new base_datos;
$conscreado->connect();
$sqlcreado = "Select * from equiposmundial where Grupo = '$grupo' and Annomundial = '$Y'";
$rescreado = $conscreado->query($sqlcreado);
while($itemcreado = $conscreado->fetch_row($rescreado))	{
	array_push($creado,$itemcreado);
}
$totalequipos = $conscreado->numrows($rescreado);

if ($_POST) {
if ($totalequipos == 0) { 

$sql1 = "INSERT INTO equiposmundial (id,Equipo,Grupo,Pos_grupo,Annomundial) 
		Values('','$pos1','$grupo','1','$Y')";
$insert1 = new base_datos;
$insert1->connect();
$insert1->query($sql1);	

$sql2 = "INSERT INTO equiposmundial (id,Equipo,Grupo,Pos_grupo,Annomundial) 
		Values('','$pos2','$grupo','2','$Y')";
$insert2 = new base_datos;
$insert2->connect();
$insert2->query($sql2);	

$sql3 = "INSERT INTO equiposmundial (id,Equipo,Grupo,Pos_grupo,Annomundial) 
		Values('','$pos3','$grupo','3','$Y')";
$insert3 = new base_datos;
$insert3->connect();
$insert3->query($sql3);	

$sql4 = "INSERT INTO equiposmundial (id,Equipo,Grupo,Pos_grupo,Annomundial) 
		Values('','$pos4','$grupo','4','$Y')";
$insert4 = new base_datos;
$insert4->connect();
$insert4->query($sql4);	

echo "<script>
	alert('Grupo ".$grupo." creado con exito');
	window.location = 'cargagrupos.php';
</script>";

} 
else 
{

if ($creado[0][1] != $pos1){
$sql5 = "update equiposmundial set Equipo = '$pos1' where id = ".$creado[0][0];
$insert5 = new base_datos;
$insert5->connect();
$insert5->query($sql5);	
}

if ($creado[1][1] != $pos2){
echo $sql6 = "update equiposmundial set Equipo = '$pos2' where id = ".$creado[1][0];
$insert6 = new base_datos;
$insert6->connect();
$insert6->query($sql6);
}

if ($creado[2][1] != $pos3)
{
$sql7 = "update equiposmundial set Equipo = '$pos3' where id = ".$creado[2][0];
$insert7 = new base_datos;
$insert7->connect();
$insert7->query($sql7);
}

if ($creado[3][1] != $pos4){
$sql8 = "update equiposmundial set Equipo = '$pos4' where id = ".$creado[3][0];
$insert8 = new base_datos;
$insert8->connect();
$insert8->query($sql8);
}


echo "<script>
	alert('Grupo ".$grupo." actualizado con exito');
	window.location = 'cargagrupos.php';
</script>";

	}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
</head>

<body>

</body>
</html>