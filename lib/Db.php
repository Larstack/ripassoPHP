<?php
	class Db{
		protected static $instance;
		protected static $database;
		private function __construct(){
			echo "Si può istanziare un solo oggetto di tipo Db";
		}
		public static function getInstance($db){
			if(!isset(static::$instance)||static::$database!=$db){
				static::$database = $db;
				$dsn = "mysql:dbname=".static::$database.";host=127.0.0.1";
				try{
					static::$instance = new PDO($dsn,"root","mr9till5");
				}
				catch(PDOException $e){
					echo "Connection failed: ".$e->getMessage();
				}
			}
			return static::$instance;
		}
	}