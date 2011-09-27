<?php
//require('../../configuraciones/conx_facultades.php');

require('generador_class.php');
require('configuracion.php');

$generador= new generador();
$tablas = array();


	$conexion_servidor=pg_connect("host=192.168.101.206 dbname=comun user=admin password=ues");
        echo $conexion_servidor;
        echo '---';
	if ($conexion_servidor){
		$generador->setConexion($conexion_servidor);
		 
		$tablas_aux1 = $generador->getTablas();
                
		print_r($tablas_aux1);
                echo 'jjjj';
		foreach ($tablas_aux1 as $tabla){
			$tablas_aux = $generador->getCampos($tabla['nombre']);
			$llave = $generador->getLlavePrimaria($tabla['nombre']);
			$llave = trim(str_replace(",", ', ', $llave));
			$llave = preg_replace('/,$/', '', $llave);
			$tablas['medicina_central'][$tabla['nombre']]['comentario'] = $tabla['comentario'];
			$tablas['medicina_central'][$tabla['nombre']]['campos'] = $tablas_aux;
			$tablas['medicina_central'][$tabla['nombre']]['llave'] = $llave ;
			$tablas_buenas[] = $tabla['nombre'];
			//exit;
		}
 	}

 	//$tablas_buenas_central = $tablas_aux1;
 	?>

<?php foreach ($tablas_buenas as $tabla): ?>
	<table>
		<tr>
			<TD><B>Tabla:</B> <?php echo $tabla?></TD>
		</TR>
		<tr>
			<TD><B>Descripci&oacute;n:</B> <?php echo $tablas['medicina_central'][$tabla]['comentario']?></TD>
		</TR>
		<tr>
			<TD><B>Llave primaria:</B> <?php echo $tablas['medicina_central'][$tabla]['llave']?></TD>
		</TR>
	</table>
	<table border=1 style='border-collapse:collapse'>
		<TR bgcolor='gray'>
			<Th>Columna</Th>
			<Th>Tipo de dato</Th>
			<Th>Aceptaci�n de nulidad</Th>
			<Th>Descripci&oacute;n</Th>
			<Th>Valores v&aacute;lidos</Th>
		</TR>
		<?php foreach ($tablas['medicina_central'][$tabla]['campos'] as $campo):?>				
			<tr>
				<td><?php echo  $campo['campo']?></td>
				<td><?php 
					if ($campo['tipo'] == 'int4')
						echo 'Integer';
					elseif ($campo['tipo'] == 'int2')
						echo 'Smallint';
					else echo  $campo['tipo'] ;
					if ($campo['tipo'] == 'varchar')
						echo '('.$campo['longitud'].')';					
				?></td>
				<td><?php echo  $campo['nulo']?></td>								
				<td><?php echo  $campo['comentario']?></td>
				<td><?php
					$condiciones = array();
					$condicion = '';
					if  ($campo['condiciones']!='{}'){
						(preg_match_all("/'[\w]+'/",$campo['condiciones'], $condiciones));
						foreach ($condiciones[0] as $f)
							$condicion .= $f.', ';
						$condicion = trim(str_replace("'", '', $condicion));
						$condicion = preg_replace('/,$/', '', $condicion);
						echo $condicion;
					}
					?>
				</td>
			</tr>						
		<?php endforeach;?>
	</table>
	<BR><BR><BR>
<?php endforeach;?>