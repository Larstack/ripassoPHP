<?php
	class Catalogo{
		protected $db;
		public function __construct(){
			$this->db = Db::getInstance("mercado");
		}
		public function query($sql){
			try{
				$this->db->beginTransaction();
				$st = $this->db->prepare($sql);
				$st->execute();
				$this->db->commit();
			}
			catch(PDOException $e){
				$this->db->rollback();
				echo "Query error is occurred. ".$e->getMessage();
			}
			$ret = $st->fetchAll();
			return $ret;

		}
		public function getCategorias(){
			$sql = "SELECT * FROM categorias";
			return $this->query($sql);
		}
		public function getProductos(){
			if(func_num_args()>0){
				$sql = "SELECT prd_nombre, prd_descripcion, prd_precio FROM productos
					WHERE cat_id=".func_get_arg(0);	
			}
			else{
				$sql = "SELECT prd_nombre, prd_descripcion, prd_precio FROM productos";
			}			
			return $this->query($sql);
		}
	}