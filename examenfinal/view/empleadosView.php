<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<title>Examen Final</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

	<div class="container">
	<hr size="12px">
	<center><h1>Ingreso de Empleados</h1></center>
	<hr size="12px">
	<!--<div class="container text-center">-->
		<form action="index.php?controller=empleados&action=agregar" method="POST">
			<div class="form-row" style="padding-top: 1rem">
				<div class="form-group col-md-6">
					<label for="nombre">Nombres: </label>
					<input type="text" class="form-control" name="nombres" id="nombres" required autofocus>
				</div>
				<div class="form-group col-md-6">
					<label for="marca">Apellidos: </label>
					<input type="text" class="form-control" name="apellidos" id="apellidos" required>
				</div>
				<div class="form-group col-md-6">
					<label for="marca">Pago por Hora: </label>
					<input type="numeric" class="form-control" name="pago_hora" id="pago_hora" required>
				</div>			
				<div class="form-group col-md-6">
					<label for="marca">Horas Trabajadas: </label>
					<input type="numeric" class="form-control" name="horas" id="horas" required>
				</div>
				<div class="form-group col-md-6">
					<label for="marca">Departamento: </label>
					<select class="form-control" class="form-control" name="departamento" id="departamentos">
		                <?php foreach($departamentos as $departamento){ ?>
		                <option value="<?=$departamento->id; ?>"><?=$departamento->nombre; ?></option>
		                <!--<option value="2">Servicio al Cliente</option>
		                <option value="3">IT</option>
		                <option value="4">Recursos Humanos</option>
		                <option value="5">Contaduría</option>-->
		            <?php } ?>
		            </select>
		        </div>
			</div>
			<input type="submit" class="btn btn-info" name="agregar" value="Agregar">
		</form><br>
		<hr size="12px">
		<center><h1>Listado de Empleados</h1></center>
		<hr size="12px"><br>
			<table class="table table-hover text-center" border="1px">
				<thead class="thead-dark">
					<tr>
						<th scope="col">Nombres</th>
						<th scope="col">Apellidos</th>
						<th scope="col">Departamento</th>
						<th scope="col">Salario</th>
						<th scope="col">Salario Neto</th>
						<th scope="col">Acciones</th>
					</tr>
				</thead>
				<tbody>			
					<?php 
					$salarioNeto = 0.0;
					$salario = 0.0;
					$planilla = 0.0;
					foreach($empleados as $empleado) { 
						$salario = ($empleado->pago_hora)*($empleado->horas);
						?>

					<tr>
						<td><?=$empleado->nombres; ?></td>
						<td><?=$empleado->apellidos; ?></td>
						<td><?=$empleado->nombre; ?></td>
						<td>$<?=$salario; ?></td>
						<td>$<?=$salarioNeto= $salario-($salario*0.18); ?></td>
						<td>
							<button onclick="window.location.href='index.php?controller=empleados&action=modificar&id=<?=$empleado->id; ?>'" name="modificar" class="btn btn-info btn-sm">Modificar</button>
							<button onclick="window.location.href='index.php?controller=empleados&action=eliminar&id=<?=$empleado->id; ?>'" name="eliminar" class="btn btn-danger btn-sm">Eliminar</button>
						</td>
					</tr>
					<?php
					$planilla += $salario; 
					} ?>
				</tbody>
			</table><br>	
		<center><h2>Total de Planilla: $<?=$planilla; ?></h2><br><br></center>
	</div>
</body>
</html>