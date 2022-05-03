<?php
include("../bd.class.php");

$grupo = $_POST["grupo"];	
$grupoexacto = explode("-", $grupo);
$grupoequipo = $grupoexacto[1];
$Y = date("Y");

$creado = array();
$conscreado = new base_datos;
$conscreado->connect();
$sqlcreado = "Select * from equiposmundial where grupo = '$grupoequipo' and annomundial = '$Y'";
$rescreado = $conscreado->query($sqlcreado);
while($itemcreado = $conscreado->fetch_row($rescreado))	{
	array_push($creado,$itemcreado);
}
$totalequipos = $conscreado->numrows($rescreado);
if ($totalequipos > 0){
$equipo1 = $creado[0][1];
$equipo2 = $creado[1][1];
$equipo3 = $creado[2][1];
$equipo4 = $creado[3][1];
}
else 
{
$equipo1 = "Sin Equipo Asignado";
$equipo2 = "Sin Equipo Asignado";
$equipo3 = "Sin Equipo Asignado";
$equipo4 = "Sin Equipo Asignado";
}


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Documento sin título</title>
<script>
    function soloLetras(e){
       key = e.keyCode || e.which;
       tecla = String.fromCharCode(key).toLowerCase();
       letras = " áéíóúabcdefghijklmnñopqrstuvwxyz";
       especiales = [8,37,39,46];

       tecla_especial = false
       for(var i in especiales){
            if(key == especiales[i]){
                tecla_especial = false;
                break;
            }
        }

        if(letras.indexOf(tecla)==-1 && !tecla_especial){
            return false;
        }
    }
	
	function editar(id)
	{
		var td = document.getElementById('equipo'+id);
		var tdE = document.getElementById('equipo'+id+'E');	
		var Beditar = document.getElementById('editar'+id);
		var Bcancelar = document.getElementById('cancelar'+id);
		var campo = document.getElementById(id);
		
		if(campo.value == 'Sin Equipo Asignado')
		{
			campo.value = '';
		}
		
		td.style.display = 'none';
		tdE.style.display = '';
		
		Beditar.style.display = 'none';
		Bcancelar.style.display = '';
	}
	
	function cancelar(id)
	{
		var td = document.getElementById('equipo'+id);
		var tdE = document.getElementById('equipo'+id+'E');	
		var Beditar = document.getElementById('editar'+id);
		var Bcancelar = document.getElementById('cancelar'+id);
		
		td.style.display = '';
		tdE.style.display = 'none';
		
		Beditar.style.display = '';
		Bcancelar.style.display = 'none';
	}
</script>
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
<br/>
<a href="cargagrupos.php" style="text-decoration:none"><input type="button" value="Regresar" id="boton"/></a><br/><br/>
<form action="creacion.php" method="post">
<table>
	<tr>
    	<td colspan="2" align="center">
        	<?php echo $grupo;?><input type="hidden" value="<?php echo $grupoequipo;?>" name="grupoexacto" />
        </td>
	</tr>
    <tr>
    	<td align="center"><b>POSICION</b></td>
        <td align="center"><b>EQUIPO</b></td>
    </tr>
    <tr>
    	<td align="center">1</td>
        <td id="equipo1"><?php echo $equipo1;?></td>
        <td id="equipo1E" style="display:none;"><input type="text" name="1" id="1" style="text-transform:uppercase;" 
        	onkeyup="javascript:this.value=this.value.toUpperCase();" onkeypress="return soloLetras(event);" 
        	value="<?php echo $equipo1;?>" />
       	</td>
        <td>
        	<input type="button" id="editar1" value="Editar" onclick="editar(1);" />
            <input type="button" id="cancelar1" value="Cancelar" onclick="cancelar(1);" style="display:none;" />
        </td>
    </tr>
    <tr>
    	<td align="center">2</td>
        <td id="equipo2">
		<?php echo $equipo2;?>
        </td>
        <td id="equipo2E" style="display:none;">
        <input type="text" name="2" id="2" style="text-transform:uppercase;" 
        	onkeyup="javascript:this.value=this.value.toUpperCase();" onkeypress="return soloLetras(event);" 
            value="<?php echo $equipo2; ?>"/></td>
            <td>
        	<input type="button" id="editar2" value="Editar" onclick="editar(2);" />
            <input type="button" id="cancelar2" value="Cancelar" onclick="cancelar(2);" style="display:none;" />
        </td>
    </tr>
    <tr>
    	<td align="center">3</td>
        <td id="equipo3"><?php echo $equipo3;?></td>
        <td id="equipo3E" style="display:none;"><input type="text" name="3" id="3" style="text-transform:uppercase;" 
        	onkeyup="javascript:this.value=this.value.toUpperCase();" onkeypress="return soloLetras(event);" 
            value="<?php echo $equipo3;?>"/></td>
            <td>
        	<input type="button" id="editar3" value="Editar" onclick="editar(3);" />
            <input type="button" id="cancelar3" value="Cancelar" onclick="cancelar(3);" style="display:none;" />
        </td>
    </tr>
    <tr>
    	<td align="center">4</td>
        <td id="equipo4"><?php echo $equipo4;?></td>
        <td id="equipo4E" style="display:none;"><input type="text" name="4" id="4" style="text-transform:uppercase;" 
        	onkeyup="javascript:this.value=this.value.toUpperCase();" onkeypress="return soloLetras(event);" 
            value="<?php echo $equipo4;?>"/></td>
            <td>
        	<input type="button" id="editar4" value="Editar" onclick="editar(4);" />
            <input type="button" id="cancelar4" value="Cancelar" onclick="cancelar(4);" style="display:none;" />
        </td>
    </tr>
    <tr>
    	<td colspan="2" align="center"><input type="submit" name="actualizar" value="Actualizar" /></td>
    </tr>
</table>
</form>
</body>
</html>