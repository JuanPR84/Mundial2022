<?php
require("../classes/bd.class.php");

$user = $_POST['cedula'];
$cod = $_POST['codigo'];
$sucursal= $_POST['sucursal'];
$mail = $_POST['email'];
$nick = $_POST['usuario'];
$p1 = $_POST['pass1'];
$p2 = $_POST['pass2'];
if($p1 != $p2){
	echo "<script>
	alert('Las claves no coinciden, intente nuevamente');
	history.back();
	</script>";
} else {
	
	$list_codigos = array();
	$cons = new base_datos;
	$cons->connect();
	$sql = "Select * from codigos where codigo = '$cod' and estado = 'D'";
	$res = $cons->query($sql);
	while($dato = $cons->fetch_row($res))	{
		array_push($list_codigos,$dato);
	}
	$cant = count($list_codigos);
	
	$list_codigost = array();
	$cons = new base_datos;
	$cons->connect();
	$sql = "Select * from codigos where responsable = '$user'";
	$res = $cons->query($sql);
	while($dato = $cons->fetch_row($res))	{
		array_push($list_codigost,$dato);
	}
	$canttotal = count($list_codigost);
	
	$list_cedulas = array();
	$cons = new base_datos;
	$cons->connect();
	$sql = "Select * from asociados where cedula = '$user'";
	$res = $cons->query($sql);
	while($dato = $cons->fetch_row($res))	{
		array_push($list_cedulas,$dato);
	}
	$cant1 = count($list_cedulas);
	
	if ($cant > 0){ 
		if($cant1 > 0){
			if($canttotal < 4){
				$idasociado = $list_cedulas[0]['id'];
				
				$sql = "INSERT INTO usuariosmundial (id,id_asociado,contrasena,e_mail,nickname,ingresos) VALUE ('','$idasociado','$p1','$mail','$nick','1')";
				$insert = new base_datos;
				$insert->connect();
				$insert->query($sql);
				
				/*$sql1 = "UPDATE codigos SET estado = 'N', responsable = '$user' WHERE codigo = '$cod'";
				$insert1 = new base_datos;
				$insert1->connect();
				$insert1->query($sql1);*/

                                $sql1 = "UPDATE asociados SET sucursal= '$sucursal'  WHERE cedula= '$user'";
				$insert1 = new base_datos;
				$insert1->connect();
				$insert1->query($sql1);
				
				echo "<script>
				alert('Gracias por registrarse, ahora puede ingresar');
				window.location.href='index.php';
				</script>";
				
			} else {
				echo "<script>
				alert('Esta cedula ya tiene asignados 4 codigos, no es posible registrar mas');
				window.location.href='index.php';
				</script>";
			}
		} else {
			echo "<script>
			alert('La cedula no esta autorizada para el registro');
			window.location.href='index.php';
			</script>";
		}
	} else {
		echo "<script>
		alert('El codigo ingresado no es valido');
		window.location.href='index.php';
		</script>";
	}
	
}
?>
