<?php
require('../../configuraciones/conx_facultades.php');

require('generador_class.php');
require('configuracion.php');

$generador= new generador();
$tablas_aux = array();
$cant_tablas = array();
$tablas = array();

echo '<h1>'.count($tablas_buenas).'</H1>';
foreach($con as $nombre_servidor => $servidor){
	$conexion_servidor=pg_connect($servidor);
	if ($conexion_servidor){
 		$generador->setConexion($conexion_servidor);
 		$tablas_aux[$nombre_servidor] = $generador->getTablas();
 		
 		$cant_tablas[$nombre_servidor] = count($tablas_aux[$nombre_servidor]);
		echo "$nombre_servidor -- entr&oacute; <BR>";

 	}
 	else {
 		echo "$nombre_servidor -- NO ENTRO <BR>
			";
 	}
}	

asort($cant_tablas);
$cant_tablas = array_reverse($cant_tablas);

$j = 0;
foreach ($cant_tablas as $server => $cant){
	$i = 0;
	$tablas[$i][$j]= $server;
	$arreglo_tablas = $tablas_aux[$server];	
	foreach ($arreglo_tablas as $tabla){
		$tablas[++$i][$j] = $tabla['nombre'];
		//$tablas[++$i][$j]['campos'] = $generador->getTablas($tabla['nombre']);
	}
	//if ($j==2)
		//break;
	$j++;
}
$i=1;
?>

<A href = 'listados_tablas.php' >LISTADO DE TABLAS</A>
<A href = 'estructura_tablas.php' >LISTADO DE CAMPOS POR TABLAS</A>

<table border=1>
<?php foreach($tablas as $fila): ?>
	<tr><TD><?php echo $i++ ?></TD>
		<?php foreach ($fila as $col): ?>
			<?php $style = ''?>
			<?php if (in_array($col, $tablas_buenas)):?>
				<?php $style = 'bgcolor = green'?>
			<?php endif;?>
			<TD <?php echo $style?> ><?php echo $col?></TD>
		<?php endforeach;?>    	
  	</tr>	
<?php endforeach; ?>
</table>