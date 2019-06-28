<?php

use Slim\App;
use Slim\Http\Uri;
use Slim\Http\Request;
use Slim\Http\Response;
use Slim\Views\Twig;
use Slim\Http\Environment;
use Slim\Views\TwigExtension;
use Medoo\Medoo;

return function (App $app) {

	
	$app->get('/', function ($request, $response) {
		return $this->view->render($response, 'index.phtml');
	});

	$app->get('/usuarios', function ($request, $response) {
		$db = new \Modelo\usuario($this);
		$dbc = new \Modelo\alumno($this);
		return $this->view->render($response, 'usuarios.html', 
			['usuario'=>$db->Datos(),
			 'alumno'=>$dbc->Datos()
			]);
	});

	$app->get('/alumno', function ($request, $response) {
		$db = new \Modelo\usuario($this);
		$dbc = new \Modelo\alumno($this);
		return $this->view->render($response, 'alumno.html', 
			['usuario'=>$db->Datos(),
			 'alumno'=>$dbc->Datos()
			]);
	});


	$app->post('/acAlumno', function ($request, $response) {
		$op=$_POST["op1"];
		$db = new \Modelo\alumno($this);
		$dbc = new \Modelo\usuario($this);
		
		if ($op=="grabar1") {
		
			$db->AgregarA($_POST["rut"],$_POST["carrera"],$_POST["nombre"],$_POST["apellido"],$_POST["usuario"],$_POST["pass"]);
		}
		if ($op=="modificar1") {
			$db->ModificarA($_POST["rut"],$_POST["carrera"],$_POST["nombre"],$_POST["apellido"],$_POST["usuario"],$_POST["pass"]);
		}
		if ($op=="eliminar1") {
			$db->EliminarA($_POST["rut"]);
		}
		return $this->view->render($response, 'alumno_detalle.html',['alumnos'=>$db->Datos()]);
	});
};
