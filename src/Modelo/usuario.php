<?php
namespace Modelo;

	/**
	 * 
	 */
	class Usuario 
	{
		protected $database ;
	
		public function __construct($container)
		{	
			$this->database = $container->database;
		}	

		public function Datos(){
			$arr = $this->database->select('usuario', ['id', 'nombre', 'apellido','username','pass']);
			return $arr;
		}

		public function AgregarU($nom,$ape,$user,$pas){
			$this ->$database -> insert("usuario",[
				'nombre' => "nom",
				'apellido' => "ape",
				'Usuario' => "user", 
				'pass' => "pas"
			]);
		
		}
		

		public function ModificarU($id,$nom,$ape,$user,$pas){
			$arr = $this->$database-> update("usuario", ['nombre' => "nom",'apellido' => "ape",'Usuario' => "user", 'pass' => "pas"],["id" => $id]);
			return $arr;
		}

		public function EliminarU($id){
			$this ->$database->delete("usuario", [
				"AND" => [
			    "id" => $id] 
		    ]);
			
		}
	}