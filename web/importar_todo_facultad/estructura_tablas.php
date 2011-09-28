<?php
require('../../configuraciones/conx_facultades.php');

require('generador_class.php');
require('configuracion.php');

$generador= new generador();


$con = array ();
foreach($con as $nombre_servidor => $servidor){
	
	$conexion_servidor=pg_connect($servidor);
	if ($conexion_servidor){
		$generador->setConexion($conexion_servidor);
		 
		foreach ($tablas_buenas as $tabla){
			//$tablas_aux['nombre'] = ;
			$tablas_aux = $generador->getCampos($tabla);
			$tablas[$nombre_servidor][$tabla] = $tablas_aux;
			//print_r($tablas_aux['campos']);
			//exit;
		}

		echo "$nombre_servidor -- entr&oacute; <BR>";

 	}
 	else {
 		echo "$nombre_servidor -- NO ENTRO <BR>
			";
 	}
}
?>
<A href = 'listados_tablas.php' >LISTADO DE TABLAS</A>&nbsp &nbsp &nbsp &nbsp
<A href = 'estructura_tablas.php' >LISTADO DE CAMPOS POR TABLAS</A>
<table border=1>
<TR>
	<th>Tabla</th>
	<?php foreach ($con as $server => $cad): ?>
	<th><?php echo $server?></th>
	<?php endforeach;?>
</TR>
<?php foreach ($tablas_buenas as $tabla): ?>
	<tr>
		<TD><?php echo $tabla?></TD>		
		<?php foreach ($con as $server => $cad): ?>
		<TD>
			<table>				
			<?php foreach ($tablas[$server][$tabla] as $campo):?>				
				<tr>
					<td><?php echo  $campo['campo']?></td>
					<td><?php echo  $campo['tipo']?></td>
					<td><?php echo  $campo['longitud']?></td>
					<td><?php echo  $campo['nulo']?></td>
					<?php $tablas_campos[$tabla][$campo['campo']] = array('campo' => $campo['campo'],
											'tipo' => $campo['tipo'],
											'longitud' => $campo['longitud'],
											'nulo' => $campo['nulo']);
					?>
				</tr>						
			<?php endforeach;?>
			</table>
		</TD>
		<?php endforeach;?>		
	</tr>
<?php endforeach;?>
</table>

<?php print_r($tablas_campos) ?>