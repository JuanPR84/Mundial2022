<?php
include("../../classes/bd.class.php");
$Y = date("Y");

//GRUPOA//
$grupo = array();
$consgrupo = new base_datos;
$consgrupo->connect();
$sqlgrupo = "select * from segundafase where anno = '$Y' and fasepartido = 'Octavos' order by id asc";
$resgrupo = $consgrupo->query($sqlgrupo);
while ($datogrupo = $consgrupo->fetch_row($resgrupo))
{
	array_push($grupo, $datogrupo);
}

//partido1//
if ($grupo[0]["resultado1"] > $grupo[0]["resultado2"]){
	$equipo1 = $grupo[0]["equipo1"];	
} else if ($grupo[0]["resultado1"] < $grupo[0]["resultado2"]){
	$equipo1 = $grupo[0]["equipo2"];
} else if ($grupo[0]["resultado1"] == $grupo[0]["resultado2"]){
	if ($grupo[0]["penal1"] > $grupo[0]["penal2"]){
		$equipo1 = $grupo[0]["equipo1"];
	} else { 
		$equipo1 = $grupo[0]["equipo2"];
	}
}
if ($grupo[1]["resultado1"] > $grupo[1]["resultado2"]){
	$equipo2 = $grupo[1]["equipo1"];	
} else if ($grupo[1]["resultado1"] < $grupo[1]["resultado2"]){
	$equipo2 = $grupo[1]["equipo2"];
} else if ($grupo[1]["resultado1"] == $grupo[1]["resultado2"]){
	if ($grupo[1]["penal1"] > $grupo[1]["penal2"]){
		$equipo2 = $grupo[1]["equipo1"];
	} else { 
		$equipo2 = $grupo[1]["equipo2"];
	}
}
$sql1 = "INSERT INTO segundafase (id,fasepartido,equipo1,equipo2,anno) 
		Values('','Cuartos','$equipo1','$equipo2','$Y')";
$insert1 = new base_datos;
$insert1->connect();
$insert1->query($sql1);
//partido1//

//partido2//
if ($grupo[2]["resultado1"] > $grupo[2]["resultado2"]){
	$equipo3 = $grupo[2]["equipo1"];	
} else if ($grupo[2]["resultado1"] < $grupo[2]["resultado2"]){
	$equipo3 = $grupo[2]["equipo2"];
} else if ($grupo[2]["resultado1"] == $grupo[2]["resultado2"]){
	if ($grupo[2]["penal1"] > $grupo[2]["penal2"]){
		$equipo3 = $grupo[2]["equipo1"];
	} else { 
		$equipo3 = $grupo[2]["equipo2"];
	}
}
if ($grupo[3]["resultado1"] > $grupo[3]["resultado2"]){
	$equipo4 = $grupo[3]["equipo1"];	
} else if ($grupo[3]["resultado1"] < $grupo[3]["resultado2"]){
	$equipo4 = $grupo[3]["equipo2"];
} else if ($grupo[3]["resultado1"] == $grupo[3]["resultado2"]){
	if ($grupo[3]["penal1"] > $grupo[3]["penal2"]){
		$equipo4 = $grupo[3]["equipo1"];
	} else { 
		$equipo4 = $grupo[3]["equipo2"];
	}
}
$sql2 = "INSERT INTO segundafase (id,fasepartido,equipo1,equipo2,anno) 
		Values('','Cuartos','$equipo3','$equipo4','$Y')";
$insert2 = new base_datos;
$insert2->connect();
$insert2->query($sql2);
//partido2//

//partido3//
if ($grupo[4]["resultado1"] > $grupo[4]["resultado2"]){
	$equipo5 = $grupo[4]["equipo1"];	
} else if ($grupo[4]["resultado1"] < $grupo[4]["resultado2"]){
	$equipo5 = $grupo[4]["equipo2"];
} else if ($grupo[4]["resultado1"] == $grupo[4]["resultado2"]){
	if ($grupo[4]["penal1"] > $grupo[4]["penal2"]){
		$equipo5 = $grupo[4]["equipo1"];
	} else { 
		$equipo5 = $grupo[4]["equipo2"];
	}
}
if ($grupo[5]["resultado1"] > $grupo[5]["resultado2"]){
	$equipo6 = $grupo[5]["equipo1"];	
} else if ($grupo[5]["resultado1"] < $grupo[5]["resultado2"]){
	$equipo6 = $grupo[5]["equipo2"];
} else if ($grupo[5]["resultado1"] == $grupo[5]["resultado2"]){
	if ($grupo[5]["penal1"] > $grupo[5]["penal2"]){
		$equipo6 = $grupo[5]["equipo1"];
	} else { 
		$equipo6 = $grupo[5]["equipo2"];
	}
}
$sql3 = "INSERT INTO segundafase (id,fasepartido,equipo1,equipo2,anno) 
		Values('','Cuartos','$equipo5','$equipo6','$Y')";
$insert3 = new base_datos;
$insert3->connect();
$insert3->query($sql3);
//partido3//

//partido4//
if ($grupo[6]["resultado1"] > $grupo[6]["resultado2"]){
	$equipo7 = $grupo[6]["equipo1"];	
} else if ($grupo[6]["resultado1"] < $grupo[6]["resultado2"]){
	$equipo7 = $grupo[6]["equipo2"];
} else if ($grupo[6]["resultado1"] == $grupo[6]["resultado2"]){
	if ($grupo[6]["penal1"] > $grupo[6]["penal2"]){
		$equipo7 = $grupo[6]["equipo1"];
	} else { 
		$equipo7 = $grupo[6]["equipo2"];
	}
}
if ($grupo[7]["resultado1"] > $grupo[7]["resultado2"]){
	$equipo8 = $grupo[7]["equipo1"];	
} else if ($grupo[7]["resultado1"] < $grupo[7]["resultado2"]){
	$equipo8 = $grupo[7]["equipo2"];
} else if ($grupo[7]["resultado1"] == $grupo[7]["resultado2"]){
	if ($grupo[7]["penal1"] > $grupo[7]["penal2"]){
		$equipo8 = $grupo[7]["equipo1"];
	} else { 
		$equipo8 = $grupo[7]["equipo2"];
	}
}
$sql4 = "INSERT INTO segundafase (id,fasepartido,equipo1,equipo2,anno) 
		Values('','Cuartos','$equipo7','$equipo8','$Y')";
$insert4 = new base_datos;
$insert4->connect();
$insert4->query($sql4);
//partido4//


echo "<script>
	alert('Creacion de fechas de cuartos creadas con exito');
	window.location = 'cargagrupos.php';
</script>";

?>