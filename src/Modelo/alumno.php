<?php
namespace Modelo;

/**
 * 
 */
/**
 * 
 */
class alumno extends usuario
{
	protected $database;
	
	public function __construct($container)
	{
		$this->database = $container->database;
	}

	public function Datos(){
		$arr = $this->database->select('usuario', ['id', 'rut', 'carrera']);
		return $arr;
	}

	public function AgregarA($nom,$ape,$user,$pass,$rut,$carr){
		parent::AgregarU($nom,$ape,$user,$pass);
		$id = $this->database->max('usuario','id');
		$this->$database->insert("alumno",['id' => $id,'rut' => "rut",'carrera' => "carr"
		]);
	}

	public function EliminarA($id){
		$ide= $this->database->select("alumno",[
			"id_usuario"],
			["rut"=>$rut
		]);
		$this->database->delete("alumno", 
			[ "AND" => 
			[ "rut" => "$rut" 
		]]);
		parent::eliminar($ide[0]);
	}

	public function ModificarA($id,$nom,$ape,$user,$pass,$rut,$carr){
		$ide = $this->database->select("alumno",["id_usuario"],["rut"=>$rut]);
		$data = $this->database->update("alumno",["carrera" => "$carrera"],["rut"=>$rut]);
		return parent::modificar($ide[0],$nombre,$usuario, $pass);
		return $data;
	}

}