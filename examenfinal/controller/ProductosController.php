<?php 
	require_once "core/DataSource.php";
	require_once "model/EmpleadosModel.php";
	require_once "model/Empleado.php";
	require_once "model/DepartamentoModel.php";

	if(isset($_GET["action"]))
	{
		if($_GET["action"]=="index")
		{
			//Dirigir al index
			index();
		}else if($_GET["action"]=="agregar")
		{
			agregar();
		}else if($_GET["action"]=="modificar")
		{
			modificar();
		}else if($_GET["action"]=="eliminar")
		{
			eliminar();
		}else
		{
			//Enviar al index
			index();
		}
	}else
	{
		index();
	}

	function index()
	{
		$datasource = new DataSource();
		$empleado = new EmpleadosModel($datasource->conectar());
		$departamento =  new DepartamentoModel($datasource->conectar());
		$departamentos = $departamento->all();
		$empleados = $empleado->all();
		require_once "view/empleadosView.php";
	}

	function agregar()
	{
		if(isset($_POST["nombres"]))
		{
			$datasource = new DataSource();
			$empleado = new EmpleadosModel($datasource->conectar());
			$empleado->id_departamento = $_POST["departamento"];
			$empleado->nombres = $_POST["nombres"];
			$empleado->apellidos = $_POST["apellidos"];
			$empleado->pago_hora = $_POST["pago_hora"];
			$empleado->horas = $_POST["horas"];
			$empleado->save();
		}
		//var_dump($empleado);
		header("Location: index.php?controller=".CONTROLADOR_DEFECTO."&action=".ACCION_DEFECTO);
		//header("Location: index.php?controller=productos&action=index");
	}

	function modificar()
	{
		if(isset($_POST["nombres"]))
		{
			$datasource = new DataSource();
			$empleado = new EmpleadosModel($datasource->conectar());
			$empleado->id = $_POST["id"];
			$empleado->id_departamento = $_POST["departamento"];
			$empleado->nombres = $_POST["nombres"];
			$empleado->apellidos = $_POST["apellidos"];
			$empleado->pago_hora = $_POST["pago_hora"];
			$empleado->horas = $_POST["horas"];
			$empleado->update();
		header("Location: index.php?controller=".CONTROLADOR_DEFECTO."&action=".ACCION_DEFECTO);
		//var_dump($empleado);
		}else if(isset($_GET["id"]) && $_GET["id"] != null)
		{
			$datasource = new DataSource();
			$empleado = new EmpleadosModel($datasource->conectar());
			$departamento = new DepartamentoModel($datasource->conectar());
			$departamentos = $departamento->all();
			$empleados = $empleado->find($_GET["id"]);
			require_once "view/modificarEmpleadoView.php";
		}else
		{
			header("Location: index.php?controller=".CONTROLADOR_DEFECTO."&action=".ACCION_DEFECTO);
		}
	}
	
	function eliminar()
	{
		if(isset($_GET["id"]) && $_GET["id"] != null)
		{
			$datasource = new DataSource();
			$empleado = new EmpleadosModel($datasource->conectar());
			$empleado->delete($_GET["id"]);
		}
		header("Location: index.php?controller=".CONTROLADOR_DEFECTO."&action=".ACCION_DEFECTO);
	}
	
?>