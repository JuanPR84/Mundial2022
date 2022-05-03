<?php
include_once('bd.class.php');

class consultas 
{
	//Usuarios
	function usuarios()
	{
		$usuarios = array();
		$consdowusuarios = new base_datos;
		$consdowusuarios->connect();
		$sqlusuarios = "Select * from usuarios";
		$resusuarios = $consdowusuarios->query($sqlusuarios);
		while($itemusuarios = $consdowusuarios->fetch_row($resusuarios))	{
			array_push($usuarios,$itemusuarios);
		}
		$consdowusuarios->close();
		return $usuarios;	
	}
	//Usuarios

	//docs
	function docs()
	{
		$destacadas = array();
		$consdestacadas = new base_datos;
		$consdestacadas->connect();
		$sqldestacadas = "Select * from circulares where categoria = 'f_afiliacion' order by id desc";
		$resdestacadas = $consdestacadas->query($sqldestacadas);
		while($itemdestacadas = $consdestacadas->fetch_row($resdestacadas))	{
			array_push($destacadas,$itemdestacadas);
		}
		$consdestacadas->close();
		return $destacadas;
	}
	//docs
	
	//encuetas
	function encuestas()
	{
		$encuesta = array();
		$cons = new base_datos;
		$cons->connect();
		$sql = "Select * from encuestas where enc_activa = 'S'";
		$res = $cons->query($sql);
		while($dato = $cons->fetch_row($res))	{
			array_push($encuesta,$dato);
		}
		$cons->close();
		if($cons->numrows($res) == 0)
		{
			return 0;	
		}
		else
		{
			return $encuesta;
		}
	}
	//encuestas
	
	//preguntas encuestas
	function preguntasenc()
	{
		$preguntas = array();
		$cons1 = new base_datos;
		$cons1->connect();
		$sql1 = "Select * from enc_preguntas A, encuestas B where B.enc_activa = 'S' and A.id_encuesta = B.id_encuesta";
		$res1 = $cons1->query($sql1);
		while($dato1 = $cons1->fetch_row($res1))	{
			array_push($preguntas,$dato1);
		}
		$cons1->close();
		return $preguntas;
	}
	//preguntas encuestas

	//respuetas enuestas
	function respuestasenc($pregunta)
	{
		$respuestas = array();
		$cons2 = new base_datos;
		$cons2->connect();
		$sql2 = "Select * from enc_respuestas where id_pregunta = ".$pregunta;
		$res2 = $cons2->query($sql2);
		while($dato2 = $cons2->fetch_row($res2))	{
			array_push($respuestas,$dato2);
		}
		$cons2->close();
		return $respuestas;
	}
	//respuetas enuestas


	//reporte encuestas
	function reporte_encuesta($dato1){
		$convenios = array();
		$consnoticias1 = new base_datos;
		$consnoticias1->connect();
		$sqlnoticias1 = "Select enc_nombre from encuestas where id_encuesta = '$dato1'";
		$resnoticias1 = $consnoticias1->query($sqlnoticias1);
		while($itemnoticias1 = $consnoticias1->fetch_row($resnoticias1))	{
			array_push($convenios,$itemnoticias1);
		}
		$consnoticias1->close();
		return $convenios;
	}
	function reporte_pregunta($dato1){
		$convenios = array();
		$consnoticias1 = new base_datos;
		$consnoticias1->connect();
		$sqlnoticias1 = "Select enc_pregunta from enc_preguntas where id_pregunta = '$dato1'";
		$resnoticias1 = $consnoticias1->query($sqlnoticias1);
		while($itemnoticias1 = $consnoticias1->fetch_row($resnoticias1))	{
			array_push($convenios,$itemnoticias1);
		}
		$consnoticias1->close();
		return $convenios;
	}
	function reporte_respuesta($dato1){
		$convenios = array();
		$consnoticias1 = new base_datos;
		$consnoticias1->connect();
		$sqlnoticias1 = "Select enc_respuesta from enc_respuestas where id_respuesta = '$dato1'";
		$resnoticias1 = $consnoticias1->query($sqlnoticias1);
		while($itemnoticias1 = $consnoticias1->fetch_row($resnoticias1))	{
			array_push($convenios,$itemnoticias1);
		}
		$consnoticias1->close();
		return $convenios;
	}
	//reporte encuestas
	
	//menu
	function menu($tipo)
	{
		$menu = array();
		$consdowmenu = new base_datos;
		$consdowmenu->connect();
		$sqlmenu = "Select * from tipos where categoria = '$tipo' and pc = 'S' order by posicion Asc";
		$resmenu = $consdowmenu->query($sqlmenu);
		while($itemmenu = $consdowmenu->fetch_row($resmenu))	{
			array_push($menu,$itemmenu);
		}
		$consdowmenu->close();
		return $menu;	
	}
	//menu
	
	//menumovil
	function menumovil($tipo)
	{
		$menumovil = array();
		$consdowmenumovil = new base_datos;
		$consdowmenumovil->connect();
		$sqlmenumovil = "Select * from tipos where categoria = '$tipo' and movil = 'S' order by posicion Asc";
		$resmenumovil = $consdowmenumovil->query($sqlmenumovil);
		while($itemmenumovil = $consdowmenumovil->fetch_row($resmenumovil))	{
			array_push($menumovil,$itemmenumovil);
		}
		$consdowmenumovil->close();
		return $menumovil;	
	}
	//menumovil
	
	//redes
	function redes()
	{
		$redes = array();
		$consdowredes = new base_datos;
		$consdowredes->connect();
		$sqlredes = "Select * from redessociales";
		$resredes = $consdowredes->query($sqlredes);
		while($itemredes = $consdowredes->fetch_row($resredes))	{
			array_push($redes,$itemredes);
		}
		$consdowredes->close();
		return $redes;	
	}
	//redes
	
	//pie_pagina
	function pie_pagina()
	{
		$pie_pagina = array();
		$consdow13 = new base_datos;
		$consdow13->connect();
		$sql13 = "Select * from pie_pagina";
		$res13 = $consdow13->query($sql13);
		while($item13 = $consdow13->fetch_row($res13))	{
			array_push($pie_pagina,$item13);
		}
		$consdow13->close();
		return $pie_pagina;	
	}
	//pie_pagina
	
	//banner
	function banner()
	{
		$banner = array();
		$banner13 = new base_datos;
		$banner13->connect();
		$sqlbanner13 = "Select * from banner";
		$resbanner13 = $banner13->query($sqlbanner13);
		while($itembanner13 = $banner13->fetch_row($resbanner13))	{
			array_push($banner,$itembanner13);
		}
		$banner13->close();
		return $banner;	
	}
	//banner
	
	
	
	//destacadas
	function destacadas()
	{
		$destacadas = array();
		$consdestacadas = new base_datos;
		$consdestacadas->connect();
		$sqldestacadas = "Select * from circulares where categoria = 'Destacadas' order by Id Desc";
		$resdestacadas = $consdestacadas->query($sqldestacadas);
		while($itemdestacadas = $consdestacadas->fetch_row($resdestacadas))	{
			array_push($destacadas,$itemdestacadas);
		}
		$consdestacadas->close();
		return $destacadas;
	}
	//destacadas
	
	//Eventos de Actualidad
	function actualidad()
	{
		$eventos = array();
		$conseventos = new base_datos;
		$conseventos->connect();
		$sqleventos = "Select * from circulares where categoria = 'Actualidad' order by id Desc";
		$reseventos = $conseventos->query($sqleventos);
		while($itemeventos = $conseventos->fetch_row($reseventos))	{
			array_push($eventos,$itemeventos);
		}	
		$conseventos->close();
		return $eventos;
	}
	
	//Eventos de Actualidad
	
	//Sitios
	function enlaces()
	{
		$enlaces1 = array();
		$conssitios1 = new base_datos;
		$conssitios1->connect();
		$sqlsitios1 = "Select * from circulares where categoria = 'Enlaces' and publicado = 'S' order by posicion Asc";
		$ressitios1 = $conssitios1->query($sqlsitios1);
		while($itemsitios1 = $conssitios1->fetch_row($ressitios1))	{
			array_push($enlaces1,$itemsitios1);
		}
		$conssitios1->close();
		return $enlaces1;	
	}
	//Noticias
	
	//links
	function links()
	{
		$links = array();
		$conslinks = new base_datos;
		$conslinks->connect();
		$sqllinks = "Select * from circulares where categoria = 'Enlaces' order by id Desc";
		$reslinks = $conslinks->query($sqllinks);
		while($itemlinks = $conslinks->fetch_row($reslinks))	{
			array_push($links,$itemlinks);
		}
		$conslinks->close();
		return $links;	
	}
	//links
	
	//links
	function pse()
	{
		$pse = array();
		$conspse = new base_datos;
		$conspse->connect();
		$sqlpse = "Select * from circulares where categoria = 'Pse' order by posicion Asc";
		$respse = $conspse->query($sqlpse);
		while($itempse = $conspse->fetch_row($respse))	{
			array_push($pse,$itempse);
		}
		$conspse->close();
		return $pse;	
	}
	//links
	
	//Quienes somos
	function quienes()
	{
		$quienes = array();
		$consnoticias1 = new base_datos;
		$consnoticias1->connect();
		$sqlnoticias1 = "Select * from circulares where categoria = 'quienes' order by Id Desc";
		$resnoticias1 = $consnoticias1->query($sqlnoticias1);
		while($itemnoticias1 = $consnoticias1->fetch_row($resnoticias1))	{
			array_push($quienes,$itemnoticias1);
		}
		$consnoticias1->close();
		return $quienes;
	}
	//Quienes somos
	
	//Comites
	function comites($categoria1)
	{
		$comites = array();
		$conscomites1 = new base_datos;
		$conscomites1->connect();
		$sqlcomites1 = "Select * from circulares where categoria = 'Comites' and categoria1 = '$categoria1'";
		$rescomites1 = $conscomites1->query($sqlcomites1);
		while($itemcomites1 = $conscomites1->fetch_row($rescomites1))	{
			array_push($comites,$itemcomites1);
		}
		$conscomites1->close();
		return $comites;
	}
	//Comites
	
	//Comites categoría
	function comites_cat()
	{
		$preguntas = array();
		$consnoticias = new base_datos;
		$consnoticias->connect();
		$sqlnoticias = "Select distinct(tipo) as tipo, id from tipos WHERE categoria = 'Comites'";
		$resnoticias = $consnoticias->query($sqlnoticias);
		while($itemnoticias = $consnoticias->fetch_row($resnoticias))	{
			array_push($preguntas,$itemnoticias);
		}	
		$consnoticias->close();
		return $preguntas;
	}
	//Comites categoría

		//Ultima Categoria
	function ultcategoria($cat){
		$ultcategoria = array();
		$consdowD = new base_datos;
		$consdowD->connect();
		$sqlD = "Select * from circulares where categoria = '$cat' order by id Asc limit 1";
		$resD = $consdowD->query($sqlD);
		while($itemD = $consdowD->fetch_row($resD)){
			array_push($ultcategoria,$itemD);
		}
		$consdowD->close();
		return $ultcategoria;
	}
	//Ultima Categoria
	
	//Servicios
	function servicios()
	{
		$Servicios = array();
		$consServicios = new base_datos;
		$consServicios->connect();
		$sqlServicios = "Select * from circulares where categoria = 'Servicios' order by id Desc";
		$resServicios = $consServicios->query($sqlServicios);
		while($itemServicios = $consServicios->fetch_row($resServicios))	{
			array_push($Servicios,$itemServicios);
		}
		$consServicios->close();
		return $Servicios;
	}
	//Servicios
	
	//Portafolio
	function portafolio()
	{
		$portafolio = array();
		$consnoticias1 = new base_datos;
		$consnoticias1->connect();
		$sqlnoticias1 = "Select * from circulares where categoria = 'Portafolio' order by posicion Asc";
		$resnoticias1 = $consnoticias1->query($sqlnoticias1);
		while($itemnoticias1 = $consnoticias1->fetch_row($resnoticias1))	{
			array_push($portafolio,$itemnoticias1);
		}
		$consnoticias1->close();
		return $portafolio;
	}
	//Portafolio
	

	
	
	//formatos
	function formatos()
	{
		$formatos = array();
		$consnoticias1 = new base_datos;
		$consnoticias1->connect();
		$sqlnoticias1 = "Select * from circulares where categoria = 'Formatos' order by id Asc";
		$resnoticias1 = $consnoticias1->query($sqlnoticias1);
		while($itemnoticias1 = $consnoticias1->fetch_row($resnoticias1))	{
			array_push($formatos,$itemnoticias1);
		}	
		$consnoticias1->close();
		return $formatos;
	} 
	//formatos
	
	//clasificados
	function clasificados()
	{
		$clasificados = array();
		$consnoticias = new base_datos;
		$consnoticias->connect();
		$sqlnoticias = "Select * from circulares where categoria = 'Clasificados' order by id Asc";
		$resnoticias = $consnoticias->query($sqlnoticias);
		while($itemnoticias = $consnoticias->fetch_row($resnoticias))	{
			array_push($clasificados,$itemnoticias);
		}	
		$consnoticias->close();
		return $clasificados;
	}
	//clasificados
	
	//clasificados tipo
	function clasificadosdes($categoria1)	
	{
		$clasificadostipo = array();
		$consnoticias1 = new base_datos;
		$consnoticias1->connect();
		$sqlnoticias1 = "Select * from circulares where categoria = 'Clasificados' and categoria1 = '$categoria1'";
		$resnoticias1 = $consnoticias1->query($sqlnoticias1);
		while($itemnoticias1 = $consnoticias1->fetch_row($resnoticias1))	{
			array_push($clasificadostipo,$itemnoticias1);
		}
		$consnoticias1->close();
		return $clasificadostipo;	
	}
	//clasificados tipo
	//Galeria de imagenes
	function galeriaicat($categoria)
	{
		$galeria = array();
		$consnoticias = new base_datos;
		$consnoticias->connect();
		$sqlnoticias = "Select distinct(categoria) from galeria where categoria = '$categoria' order by id";
		$resnoticias = $consnoticias->query($sqlnoticias);
		while($itemnoticias = $consnoticias->fetch_row($resnoticias))	{
			array_push($galeria,$itemnoticias);
		}
		$consnoticias->close();
		return $galeria;
	}
	//Galeria de imagenes
	
	//Galeria de imagenes
	function videosicat($tipo)
	{
		$galeria = array();
		$consnoticias = new base_datos;
		$consnoticias->connect();
		$sqlnoticias = "Select distinct(categoria) from videos where categoria = '$tipo' order by id";
		$resnoticias = $consnoticias->query($sqlnoticias);
		while($itemnoticias = $consnoticias->fetch_row($resnoticias))	{
			array_push($galeria,$itemnoticias);
		}
		$consnoticias->close();
		return $galeria;
	}
	//Galeria de imagenes
	
	//Galeria de videos tipo
	function videostipo($tipo)
	{
		$videostipo = array();
		$consdow1 = new base_datos;
		$consdow1->connect();
		$sql1 = "Select * from videos where categoria = '".$tipo."' order by id";
		$res1 = $consdow1->query($sql1);
		while($item1 = $consdow1->fetch_row($res1))	{
			array_push($videostipo,$item1);
		}
		$consdow1->close();
		return $videostipo;
	}
	//Galeria de videos tipo
	
	//Galeria de imagenes tipo
	function galeriaitipo($tipo)
	{
		$galeriatipo = array();
		$consnoticias1 = new base_datos;
		$consnoticias1->connect();
		$sqlnoticias1 = "Select * from galeria where categoria = '".$tipo."'  order by id desc";
		$resnoticias1 = $consnoticias1->query($sqlnoticias1);
		while($itemnoticias1 = $consnoticias1->fetch_row($resnoticias1))	{
			array_push($galeriatipo,$itemnoticias1);
		}
		$consnoticias1->close();
		return $galeriatipo;
	}
	//Galeria de imagenes tipo
	//Galeria de imagenes
	function galeriai()
	{
		$galeria = array();
		$consnoticias = new base_datos;
		$consnoticias->connect();
		$sqlnoticias = "Select distinct(categoria) from galeria order by categoria";
		$resnoticias = $consnoticias->query($sqlnoticias);
		while($itemnoticias = $consnoticias->fetch_row($resnoticias))	{
			array_push($galeria,$itemnoticias);
		}
		$consnoticias->close();
		return $galeria;
	}
	//Galeria de imagenes
	
	//Galeria de imagenes tipo
	function galeriafoto($tipo)
	{
		$galeriatipo = array();
		$consnoticias1 = new base_datos;
		$consnoticias1->connect();
		$sqlnoticias1 = "Select * from galeria where categoria = '".$tipo."'";
		$resnoticias1 = $consnoticias1->query($sqlnoticias1);
		while($itemnoticias1 = $consnoticias1->fetch_row($resnoticias1))	{
			array_push($galeriatipo,$itemnoticias1);
		}
		$consnoticias1->close();
		return $galeriatipo;
	}
	//Galeria de imagenes tipo
	
	//Galeria de imagenes tipo
	function galertipo($tipo)
	{
		$galeriatipo = array();
		$consnoticias1 = new base_datos;
		$consnoticias1->connect();
		$sqlnoticias1 = "Select distinct(categoria) from galeria";
		$resnoticias1 = $consnoticias1->query($sqlnoticias1);
		while($itemnoticias1 = $consnoticias1->fetch_row($resnoticias1))	{
			array_push($galeriatipo,$itemnoticias1);
		}
		$consnoticias1->close();
		return $galeriatipo;
	}
	//Galeria de imagenes tipo
	
	//Galeria de videos
	function videos()
	{
		$videos = array();
		$consdow = new base_datos;
		$consdow->connect();
		$sql = "Select distinct(categoria) from videos order by categoria";
		$res = $consdow->query($sql);
		while($itemG = $consdow->fetch_row($res))	{
			array_push($videos,$itemG);
		}
		$consdow->close();
		return $videos;
	}
	//Galeria de videos
	
	
	//Galeria de imagenes tipo
	function vidtipo($tipo)
	{
		$galeriatipo = array();
		$consnoticias1 = new base_datos;
		$consnoticias1->connect();
		$sqlnoticias1 = "Select distinct(categoria) from videos";
		$resnoticias1 = $consnoticias1->query($sqlnoticias1);
		while($itemnoticias1 = $consnoticias1->fetch_row($resnoticias1))	{
			array_push($galeriatipo,$itemnoticias1);
		}
		$consnoticias1->close();
		return $galeriatipo;
	}
	//Galeria de imagenes tipo
	
	//preguntas frecuentes
	function preguntastipo($tipo)
	{
		$preguntas = array();
		$consnoticias = new base_datos;
		$consnoticias->connect();
		$sqlnoticias = "Select * from tipos where categoria = 'preguntas' and tipo='$tipo'";
		$resnoticias = $consnoticias->query($sqlnoticias);
		while($itemnoticias = $consnoticias->fetch_row($resnoticias))	{
			array_push($preguntas,$itemnoticias);
		}	
		$consnoticias->close();
		return $preguntas;
	}
	//preguntas frecuentes
	
	//preguntas frecuentes tipo

	function preguntasfrecuentes($categoria1)	
	{
		$preguntastipo = array();
		$consnoticias1 = new base_datos;
		$consnoticias1->connect();
		$sqlnoticias1 = "Select * from circulares where categoria = 'preguntas' and categoria1 = '$categoria1'";
		$resnoticias1 = $consnoticias1->query($sqlnoticias1);
		while($itemnoticias1 = $consnoticias1->fetch_row($resnoticias1))	{
			array_push($preguntastipo,$itemnoticias1);
		}
		$consnoticias1->close();
		return $preguntastipo;	
	}
	//preguntas frecuentes tipo
	
	//convenios 
	function convenios($tipo)
	{
		$convenios = array();
		$consnoticias1 = new base_datos;
		$consnoticias1->connect();
		$sqlnoticias1 = "Select * from convenios where tipo = '$tipo'";
		$resnoticias1 = $consnoticias1->query($sqlnoticias1);
		while($itemnoticias1 = $consnoticias1->fetch_row($resnoticias1))	{
			array_push($convenios,$itemnoticias1);
		}
		$consnoticias1->close();
		return $convenios;
	}
	//convenios 



	
	//convenios
	function conveniostodos($tipo)
	{
		$convenios = array();
		$consnoticias1 = new base_datos;
		$consnoticias1->connect();
		$sqlnoticias1 = "Select * from circulares where categoria = 'Convenios' and categoria1='$tipo'";
		$resnoticias1 = $consnoticias1->query($sqlnoticias1);
		while($itemnoticias1 = $consnoticias1->fetch_row($resnoticias1))	{
			array_push($convenios,$itemnoticias1);
		}
		$consnoticias1->close();
		return $convenios;
	}
	//convenios
	
	
	
	//Otros documentos
	function opciones()
	{
		$opciones = array();  
		$consop = new base_datos;
		$consop->connect();
		$sqlop = "Select * from opciones where ver = 'S' and estadof = 'S'";
		$resop = $consop->query($sqlop);
		while($datoop = $consop->fetch_row($resop))	{
			array_push($opciones,$datoop);
		}
		$consop->close();
		return $opciones;
	}
	//Otros documentos
	
	// Con Vmind
	//Datos del Usuario
	function usuario($cedula)
	{
		$usuario = array();
		$cons = new base_datos;
		$cons->connect();
		$sql = "Select * from tabla1 where cedula like '".$cedula."'";
		$res = $cons->query($sql);
		while($dato = $cons->fetch_row($res))	{
			array_push($usuario,$dato);
		}
		$cons->close();
		return $usuario;
	}
	//Datos del Usuario 
	//Datos del Usuario
	function Estado_Cuenta($cedula)
	{
		$Estado_Cuenta = array();
		$cons2 = new base_datos;
		$cons2->connect();
		$sql2 = "Select * from tabla1 where cedula like '".$cedula."' and estado <> 'T' order by tra_codigo";
		$res2 = $cons2->query($sql2);
		while($dato2 = $cons2->fetch_row($res2))	{
			array_push($Estado_Cuenta,$dato2);
		}
		$cons2->close();
		return $Estado_Cuenta;
	}
	//Datos del Usuario 
	
	//Con Vmind
	
	//estados financieros
	function estados()
	{
		$estados = array();
		$consnoticias1 = new base_datos;
		$consnoticias1->connect();
		$sqlnoticias1 = "Select * from circulares where categoria = 'estados' ";
		$resnoticias1 = $consnoticias1->query($sqlnoticias1);
		while($itemnoticias1 = $consnoticias1->fetch_row($resnoticias1))	{
			array_push($forestadosmatos,$itemnoticias1);
		}	
		$consnoticias1->close();
		return $estados;
	}
	//estados finacieros
	
	//comunicados
	function comunicados()
	{
		$comunicados = array();
		$consnoticias1 = new base_datos;
		$consnoticias1->connect();
		$sqlnoticias1 = "Select * from circulares where categoria = 'comunicados' ";
		$resnoticias1 = $consnoticias1->query($sqlnoticias1);
		while($itemnoticias1 = $consnoticias1->fetch_row($resnoticias1))	{
			array_push($comunicados,$itemnoticias1);
		}	
		$consnoticias1->close();
		return $comunicados;
	}
	//comunicados

	//lineas
	function lineas($categoria1)
	{
		$lineas = array();
		$consnoticias1 = new base_datos;
		$consnoticias1->connect();
		$sqlnoticias1 = "Select * from circulares where categoria = 'lineas' and categoria1 = '$categoria1' ";
		$resnoticias1 = $consnoticias1->query($sqlnoticias1);
		while($itemnoticias1 = $consnoticias1->fetch_row($resnoticias1))	{
			array_push($lineas,$itemnoticias1);
		}	
		$consnoticias1->close();
		return $lineas;
	}
	//lineas

	//quien
	function quien($tipo)
	{
		$lineas = array();
		$consnoticias1 = new base_datos;
		$consnoticias1->connect();
		$sqlnoticias1 = "Select * from circulares where categoria = 'quienes' and categoria1 = '$tipo' ";
		$resnoticias1 = $consnoticias1->query($sqlnoticias1);
		while($itemnoticias1 = $consnoticias1->fetch_row($resnoticias1))	{
			array_push($lineas,$itemnoticias1);
		}	
		$consnoticias1->close();
		return $lineas;
	}
	//quien

	//actualidad

	function act()
	{
		$lineas = array();
		$consnoticias1 = new base_datos;
		$consnoticias1->connect();
		$sqlnoticias1 = "Select * from circulares where categoria = 'Actualidad'";
		$resnoticias1 = $consnoticias1->query($sqlnoticias1);
		while($itemnoticias1 = $consnoticias1->fetch_row($resnoticias1))	{
			array_push($lineas,$itemnoticias1);
		}	
		$consnoticias1->close();
		return $lineas;
	}
	//actualidad
	//lineas
	function lineas1($tipo)
	{
		$lineas = array();
		$consnoticias1 = new base_datos;
		$consnoticias1->connect();
		echo $sqlnoticias1 = "Select * from circulares where categoria = 'quienes' and categoria1 = '$tipo' ";
		$resnoticias1 = $consnoticias1->query($sqlnoticias1);
		while($itemnoticias1 = $consnoticias1->fetch_row($resnoticias1))	{
			array_push($lineas,$itemnoticias1);
		}	
		$consnoticias1->close();
		return $lineas;
	}
	//lineas

	//1N
	function noticiasdestacadas()
	{
		$lineas = array();
		$consnoticias1 = new base_datos;
		$consnoticias1->connect();
		$sqlnoticias1 = "Select * from circulares where categoria = 'Destacadas'";
		$resnoticias1 = $consnoticias1->query($sqlnoticias1);
		while($itemnoticias1 = $consnoticias1->fetch_row($resnoticias1))	{
			array_push($lineas,$itemnoticias1);
		}	
		$consnoticias1->close();
		return $lineas;
	}
	//1N

	//1N
	function noticiasA()
	{
		$lineas = array();
		$consnoticias1 = new base_datos;
		$consnoticias1->connect();
		$sqlnoticias1 = "Select * from circulares where categoria = 'noticias' order by Id Desc";
		$resnoticias1 = $consnoticias1->query($sqlnoticias1);
		while($itemnoticias1 = $consnoticias1->fetch_row($resnoticias1))	{
			array_push($lineas,$itemnoticias1);
		}	
		$consnoticias1->close();
		return $lineas;
	}
	//1N

		//1N
	function promociones()
	{
		$lineas = array();
		$consnoticias1 = new base_datos;
		$consnoticias1->connect();
		$sqlnoticias1 = "Select * from circulares where categoria = 'NoticiasA' order by Id Desc";
		$resnoticias1 = $consnoticias1->query($sqlnoticias1);
		while($itemnoticias1 = $consnoticias1->fetch_row($resnoticias1))	{
			array_push($lineas,$itemnoticias1);
		}	
		$consnoticias1->close();
		return $lineas;
	}
	//1N




	//lineas
	function titulo($categoria1)
	{
		$lineas = array();
		$consnoticias1 = new base_datos;
		$consnoticias1->connect();
		$sqlnoticias1 = "Select * from circulares where circular = '$categoria1'";
		$resnoticias1 = $consnoticias1->query($sqlnoticias1);
		while($itemnoticias1 = $consnoticias1->fetch_row($resnoticias1))	{
			array_push($lineas,$itemnoticias1);
		}	
		$consnoticias1->close();
		return $lineas;
	}
	//lineas
	

	
	//tipos
	function tipos_tit($categoria)
	{
		$comunicados = array();
		$consnoticias1 = new base_datos;
		$consnoticias1->connect();
		$sqlnoticias1 = "Select * from tipos where id = '$categoria'";
		$resnoticias1 = $consnoticias1->query($sqlnoticias1);
		while($itemnoticias1 = $consnoticias1->fetch_row($resnoticias1))	{
			array_push($comunicados,$itemnoticias1);
		}	
		$consnoticias1->close();
		return $comunicados;	
	}
	//tipos

	//títulos galerías de videos
	function tipos_titg($categoria)
	{
		$comunicados = array();
		$consnoticias1 = new base_datos;
		$consnoticias1->connect();
		$sqlnoticias1 = "Select * from videos where categoria = '$categoria'";
		$resnoticias1 = $consnoticias1->query($sqlnoticias1);
		while($itemnoticias1 = $consnoticias1->fetch_row($resnoticias1))	{
			array_push($comunicados,$itemnoticias1);
		}	
		$consnoticias1->close();
		return $comunicados;	
	}
	//títulos galerías de videos

	//títulos galerías de imagenes
	function tipos_titg2($categoria)
	{
		$comunicados = array();
		$consnoticias1 = new base_datos;
		$consnoticias1->connect();
		$sqlnoticias1 = "Select * from galeria where categoria = '$categoria'";
		$resnoticias1 = $consnoticias1->query($sqlnoticias1);
		while($itemnoticias1 = $consnoticias1->fetch_row($resnoticias1))	{
			array_push($comunicados,$itemnoticias1);
		}	
		$consnoticias1->close();
		return $comunicados;	
	}
	//títulos galerías de imagenes



	//tipos
	function tipos($categoria)
	{
		$comunicados = array();
		$consnoticias1 = new base_datos;
		$consnoticias1->connect();
		$sqlnoticias1 = "Select * from tipos where categoria = '$categoria'";
		$resnoticias1 = $consnoticias1->query($sqlnoticias1);
		while($itemnoticias1 = $consnoticias1->fetch_row($resnoticias1))	{
			array_push($comunicados,$itemnoticias1);
		}	
		$consnoticias1->close();
		return $comunicados;	
	}
	//tipos


	//normatividad//
	function normatividad()
	{
		$normatividad = array();
		$consnoticias1 = new base_datos;
		$consnoticias1->connect();
		$sqlnoticias1 = "Select * from circulares where categoria = 'normatividad' order by Id Desc";
		$resnoticias1 = $consnoticias1->query($sqlnoticias1);
		while($itemnoticias1 = $consnoticias1->fetch_row($resnoticias1))	{
			array_push($normatividad,$itemnoticias1);
		}	
		$consnoticias1->close();
		return $normatividad;
	} 
	//normatividad
	
	

	//tipos1
	function tipos1($categoria)
	{
		$comunicados = array();
		$consnoticias1 = new base_datos;
		$consnoticias1->connect();
		echo $sqlnoticias1 = "Select * from circulares where categoria = '$categoria' order by id asc";
		$resnoticias1 = $consnoticias1->query($sqlnoticias1);
		while($itemnoticias1 = $consnoticias1->fetch_row($resnoticias1))	{
			array_push($comunicados,$itemnoticias1);
		}	
		$consnoticias1->close();
		return $comunicados;	
	}
	//tipos1

	
	//categorias contactenos//
	function catcontacto()
	{
		$catcontacto = array();
		$consdowcatcontacto = new base_datos;
		$consdowcatcontacto->connect();
		$sqlcatcontacto = "Select * from categorias order by cat_nombre desc";
		$rescatcontacto = $consdowcatcontacto->query($sqlcatcontacto);
		while($itemGcatcontacto = $consdowcatcontacto->fetch_row($rescatcontacto))	{
			array_push($catcontacto,$itemGcatcontacto);
		}
		$consdowcatcontacto->close();
		return $catcontacto;
	}
	//categorias contactenos//
	
	//destino contactenos//
	function contactenos()
	{
		$descontacto = array();
		$consdowdescontacto = new base_datos;
		$consdowdescontacto->connect();
		$sqldescontacto = "Select * from contactenos where activo = 'S' order by posicion";
		$resdescontacto = $consdowdescontacto->query($sqldescontacto);
		while($itemGdescontacto = $consdowdescontacto->fetch_row($resdescontacto))	{
			array_push($descontacto,$itemGdescontacto);
		}
		$consdowdescontacto->close();
		return $descontacto;
	}
	//destino contactenos//
	

	
	//referencias contactenos//
	function referencias()
	{
		$referencias = array();
		$consdowreferencias = new base_datos;
		$consdowreferencias->connect();
		$sqlreferencias = "Select * from referencias_contactenos where activo = 'S' order by posicion Asc";
		$resreferencias = $consdowreferencias->query($sqlreferencias);
		while($itemGreferencias = $consdowreferencias->fetch_row($resreferencias))	{
			array_push($referencias,$itemGreferencias);
		}
		$consdowreferencias->close();
		return $referencias;
	}
	//referencias contactenos//
	
	
	//SIMULADOR
	function simulador()
	{	
		$lineas = array();
		$cons = new base_datos;
		$cons->connect();
		$sql = "Select codigo,nombre,tasa,cuomi,cuoma from tabla3 where lcre_web = 'S'";
		$res = $cons->query($sql);
		while($items = $cons->fetch_row($res))	{
			array_push($lineas, $items);
		}
		$cons->close();
		return $lineas;
	}
	//SIMULADOR
	
	
	function contador ($pagina,$seccion,$complemento,$subcomplemento)

                {

                               $mesc = date("m");

                                $annoc = date("Y");

                               $contador = array();

                               $consdowC = new base_datos;

                               $consdowC->connect();

                               $sqlC = "Select sum(cantidad) as suma from contador where pagina = '$pagina' and seccion = '$seccion' and mes = '$mesc' and anno = '$annoc'";

                               $resC = $consdowC->query($sqlC);

                               while($itemC = $consdowC->fetch_row($resC))             {

                                               array_push($contador,$itemC);

                               }

                               if ($contador[0][0] == NULL){

                                               $vecest = 1;

                                               $consdowins = new base_datos;

                                               $consdowins->connect();

                                               $sqlins = "insert into contador (id,pagina,seccion,detalle,cantidad,complemento,subcomplemento,mes,anno) values('','$pagina','$seccion','','$vecest','$complemento','$subcomplemento','$mesc','$annoc')";

                                               $resins = $consdowins->query($sqlins);

                               }

                               else {

                                               $contador1 = array();

                                               $consdowC1 = new base_datos;

                                               $consdowC1->connect();

                                               $sqlC1 = "Select * from contador where pagina = '$pagina' and seccion = '$seccion' and mes = '$mesc' and anno = '$annoc'";

                                               $resC1 = $consdowC1->query($sqlC1);

                                               while($itemC1 = $consdowC1->fetch_row($resC1))      {

                                                               array_push($contador1,$itemC1);

                                               }

                                               $vecesnuevas = ($contador1[0]['cantidad'] + 1);

                                               $vecest = $contador[0][0] + 1;

                                               $consdowCu = new base_datos;

                                               $consdowCu->connect();

                                               $sqlCu = "update contador set cantidad = '$vecesnuevas' where pagina = '$pagina' and seccion = '$seccion' and complemento = '$complemento' and subcomplemento = '$subcomplemento' and mes = '$mesc' and anno = '$annoc'";

                                               $resCu = $consdowCu->query($sqlCu);

                               }

                               return $vecest;

                }

                

                function contadormensual($pagina,$seccionI,$complemento,$subcomplemento)

                {

                               $mescm = date("m");

                                $annocm = date("Y");

                               $contador = array();

                               $consdowC = new base_datos;

                               $consdowC->connect();

                               $sqlC = "Select sum(cantidad) as suma from contador where pagina = '$pagina' and mes = '$mescm'";

                               $resC = $consdowC->query($sqlC);

                               while($itemC = $consdowC->fetch_row($resC))             {

                                               array_push($contador,$itemC);

                               }

                               if ($contador[0][0] == NULL){

                                               $veces = 1;

                                               $consdowins = new base_datos;

                                               $consdowins->connect();

                                               $sqlins = "insert into contador (id,pagina,seccion,detalle,cantidad,complemento,subcomplemento,mes,anno) values('','$pagina','$seccion','','$veces','$complemento','$subcomplemento','$mescm','$annocm')";

                                               $resins = $consdowins->query($sqlins);

                               }

                               else {

                                               $veces = $contador[0][0] + 1;

                                               $consdowCu = new base_datos;

                                               $consdowCu->connect();

                                               $sqlCu = "update contador set cantidad = '$veces' where pagina = '$pagina' and seccion = '$seccion' and complemento = '$complemento' and subcomplemento = '$subcomplemento' and mes = '$mescm' and anno = '$annocm'";

                                               $resCu = $consdowCu->query($sqlCu);

                               }

                               return $veces;

                }

                function saludohora()

                {

                               $hora = date("H");

                               if ($hora < 12) {

                                               $LOC = "Buenos d&iacute;as";

                               }

                               if ($hora >= 12 && $hora < 18 ) {

                                               $LOC = "Buenas tardes";

                               }

                               if ($hora >= 18) {

                                               $LOC = "Buenas noches";

                               }

                               return $LOC;

                }

                function saludofecha()

                {

                               $diaf = date("d");

                               $mesf = date("m");

                               $anof = date("Y");

                               switch ($mesf) {

                                               case "1":

                                                               $mes1 = "ene";

                                                               break;

                                               case "2":

                                                               $mes1 = "feb";

                                                               break;

                                               case "3":

                                                               $mes1 = "mar";

                                                               break;

                                               case "4":

                                                               $mes1 = "abr";

                                                                              break;

                                               case "5":

                                                               $mes1 = "may";

                                                               break;

                                               case "6":

                                                               $mes1 = "jun";

                                                               break;

                                               case "7":

                                                               $mes1 = "jul";

                                                               break;

                                               case "8":

                                                               $mes1 = "ago";

                                                               break;

                                               case "9":

                                                               $mes1 = "sep";

                                                               break;

                                               case "10":

                                                               $mes1 = "oct";

                                                               break;

                                               case "11":

                                                               $mes1 = "nov";

                                                               break;

                                               case "12":

                                                               $mes1 = "dic";

                                                               break;

                               }

                               $mensajesaludo = 'hoy es '.$diaf.' de '.$mes1.' de '.$anof;

                               return ($mensajesaludo);

                }


}
?>