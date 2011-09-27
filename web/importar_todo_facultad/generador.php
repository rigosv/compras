<?php
/*
 * Created on 19/12/2007
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
require_once($_SERVER['DOCUMENT_ROOT'] . "/configuraciones/inicio.php");

if ($_POST['pagina']!='generar'){?>
<HTML>
<HEAD>
<script type="text/javascript" src="/librerias/prototype/prototype.js"></script>
<SCRIPT TYPE='text/JavaScript'>
var salida='clase';
function mandar(){
	var myAjax = new Ajax.Updater(
		'codigo', 
		'generador.php', 
		{
			method: 'post', 
			parameters: 'tabla='+$F('tabla')+
						'&salida='+salida+
						'&pagina=generar'
		}
	);
}
</SCRIPT>
</HEAD>
<BODY>
<?php
}
function parametros(){
	$generador= new generador();
	?>
	<FORM method="POST" action="generador.php" ONSUBMIT='mandar(); return false;'>
		TABLA: <SELECT NAME='tabla' ID='tabla' /><?php 
		foreach($generador->listado_tablas()->fetchAll() as $tabla){
			echo '<OPTION VALUE="'.$tabla['nombre'].'" >'.$tabla['nombre'].'</OPTION>';
		}

		?></SELECT><BR><BR>
		CLASE <INPUT TYPE='radio' name='salida'  value='clase' onclick="salida='clase'" checked ><br>
		PLANTILLA <INPUT TYPE='radio' name='salida' value='plantilla' onclick="salida='plantilla'" ><br>
		VALIDACIONES <INPUT TYPE='radio' name='salida' value='validaciones' onclick="salida='validaciones'" ><br>
		CONTROLADOR <INPUT TYPE='radio' name='salida' value='controlador' onclick="salida='controlador'"  ><br>				
		
		<br>
		<INPUT TYPE='hidden' VALUE='generar' name='pagina' />
		<INPUT TYPE='SUBMIT' VALUE='GENERAR CODIGO' />
		<INPUT TYPE='button' VALUE='SELECCIONAR CODIGO' ONCLICK="$('codigo').select()"/>
	</FORM>
	<BR><BR>
	
  <textarea id="codigo" rows="20" cols="80" wrap="off"></textarea>
  </BODY>
</HTML>
<?php
}

function generar(){
	
	$generador= new generador($_POST['tabla']);

	$generador->generar_todos();

	switch($_POST['salida']){
		case 'controlador':
			$generador->mostrar_controlador();
			break;
		case 'clase':
			$generador->mostrar_clase();
			break;
		case 'plantilla':
			$generador->mostrar_plantilla();
			break;
		case 'validaciones':
			$generador->mostrar_validaciones();
			break;
	}
}
switch($_POST['pagina']){
	case 'generar':
		generar();
		break;
	default:
		parametros();
		break;
}
?>