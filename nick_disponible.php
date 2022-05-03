<?php
require('../classes/bd.class.php');
$nickname =  $_POST['nick'];
$noticias = array();
$consnoticias = new base_datos;
$consnoticias->connect();
$sqlnoticias = "Select * from usuariosmundial where nickname = '$nickname'";
$resnoticias = $consnoticias->query($sqlnoticias);
while($itemnoticias = $consnoticias->fetch_row($resnoticias))	{
	array_push($noticias,$itemnoticias);
}
$cant = count($noticias);
echo $cant;
?>