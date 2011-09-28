<?php
/*
 * Created on 19/12/2007
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
//$raiz=$_SERVER['DOCUMENT_ROOT'];

//Incluir la clase base
//require_once('base_class.php');

class generador  {
	private $generar_para;
	
	private $cns_llave_primaria;
	
	private $cns_relaciones;
	
	private $cns_campos;
	
	private $conexion;
	
	
	public function setConexion($con){
		$this->conexion = $con;	
	}
	// ************************ METODOS DE LA CLASE ***********************	
	/* DESCRIPCION: Constructor de la clase, llama al constructor de la clase padreç
	 * establece los valores propios para la tabla que representa la clase
	 * PARAMETRO: no tiene
	 * RETORNO: no tiene
	 */
	public function __construct($tabla='DEFINALATABLA'){			
		//parent::__construct();
		$this->generar_para=$tabla;
	}
	
	public function getTablas(){
		$this->sql = "select relname AS nombre, B.description as comentario
			FROM pg_stat_user_tables A
				LEFT JOIN pg_description B ON (A.relid = B.objoid AND objsubid = 0)
			WHERE schemaname='public' 				
			ORDER BY relname";
		//return $this->ejecutarSQL();
		
		$tablas = pg_query($this->conexion, $this->sql);
		if (pg_num_rows($tablas) > 0)
			return pg_fetch_all($tablas);
		else
			return array();
	}
	
	// ***********************************************************************
	public function generar_todos(){
		$this->generar_llave_primaria();
		$this->generar_relaciones();
		$this->generar_campos();
	}
	

	// ***********************************************************************
	public function getLlavePrimaria($tabla = null){
		if (isset($tabla))
			$this->generar_para = $tabla;
		$this->sql="SELECT 
							array
							(
								SELECT a.attname 
								FROM pg_catalog.pg_class c, pg_catalog.pg_attribute a, pg_catalog.pg_constraint cc 
								WHERE c.relname = '$this->generar_para' 
									AND c.oid = a.attrelid 
									AND a.attnum > 0 
									and cc.conrelid=c.oid 
									and a.attnum = ANY (cc.conkey) 
									AND cc.contype='p'
							) as pkey;";
		//$this->ejecutarSQL();
		$cons = pg_query($this->conexion, $this->sql);
		if (pg_num_rows($cons) > 0)
			$llave = pg_fetch_array($cons,0);
			$this->cns_llave_primaria = ereg_replace('[{}]','',$llave['pkey']) ;
		return $this->cns_llave_primaria;
	}
	
	
	
	// ***********************************************************************
	public function generar_relaciones(){
		$this->sql=" SELECT c.relname as nombre_tabla_origen, 
							c.oid as oid_origen,  
							array (
									SELECT attname 
									FROM pg_catalog.pg_attribute 
									WHERE attrelid=conrelid 
										AND attnum= ANY (conkey) 
							) as campos_origen, 
							(select relname from pg_catalog.pg_class where oid=confrelid) as tabla_destino, 
							confrelid as oid_destino, 
							array 
							(
								SELECT attname 
								FROM pg_catalog.pg_attribute 
								WHERE attrelid=confrelid 
									AND attnum= ANY (confkey) 
							) as campos_destino 
						FROM pg_catalog.pg_class c, pg_catalog.pg_constraint cc 
						WHERE c.relname = '$this->generar_para' 
							and cc.conrelid=c.oid and cc.contype='f';";
		
		$cons = pg_query($this->conexion, $this->sql);
		
		if (pg_num_rows($cons)>0)
			$this->cns_relaciones=pg_fetch_all($cons);
	}

	
	//***********************************************************************
	public function getCampos($tabla = null){
		if (isset($tabla))
			$this->generar_para = $tabla;
		$this->sql="SELECT 
								a.attname AS campo, 
								t.typname AS tipo, 
								(a.atttypmod-4) as longitud, 
								CASE WHEN attnotnull=false 
									THEN 'Null' 
									ELSE 'Not null' 
								END AS nulo, 
								cm.description as comentario,
								array 
								(
									select cc.consrc 
									FROM pg_catalog.pg_constraint cc 
									WHERE cc.conrelid = c.oid 
										AND cc.conkey[1] = a.attnum and cc.contype='c' 
								) AS condiciones 								 
							FROM pg_catalog.pg_class c
								INNER JOIN pg_catalog.pg_attribute a ON (c.oid = a.attrelid)
								INNER JOIN pg_catalog.pg_type t ON (a.atttypid = t.oid )
								LEFT JOIN pg_description cm ON (a.attrelid = cm.objoid 
									AND a.attnum = cm.objsubid) 
							WHERE c.relname = '$this->generar_para' 								 
								AND a.attnum > 0 
							ORDER BY a.attname; ";
		
		$cons = pg_query($this->conexion, $this->sql);
		
		if (pg_num_rows($cons)>0){
			$this->cns_relaciones=pg_fetch_all($cons);
			return $this->cns_relaciones;
		}
	}	
	
}

	
?>