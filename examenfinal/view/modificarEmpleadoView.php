<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<title>Modificar empleados</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	<div class="container">
		<center><h2>Modificar el empleado: <?=$empleados->nombres; ?></h2></center>
			<!--<div class="container text-center">-->
				<form action="index.php?controller=empleados&action=modificar" method="POST">
					<div class="form-row" style="padding-top: 1rem">
						<div class="form-group col-md-6">
							<label for="nombre">Nombre: </label>
							<input type="text" class="form-control" name="nombres" id="nombres" value="<?=$empleados->nombres; ?>" required autofocus>
						</div>
						<div class="form-group col-md-6">
							<label for="marca">Apellidos: </label>
							<input type="text" class="form-control" name="apellidos" id="apellidos" value="<?=$empleados->apellidos; ?>" required>
						</div>
						<div class="form-group col-md-6">
							<label for="marca">Pago por Hora: </label>
							<input type="numeric" class="form-control" name="pago_hora" id="pago_hora" value="<?=$empleados->pago_hora; ?>" required>
						</div>
						<div class="form-group col-md-6">
							<label for="marca">Horas Trabajadas: </label>
							<input type="numeric" class="form-control" name="horas" id="horas" value="<?=$empleados->horas; ?>" required>
							<input type="hidden" id="id" name="id" value="<?=$empleados->id; ?>">
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
					<input type="submit" name="agregar" class="btn btn-secondary" value="Modificar"> <a href="index.php?controller=empleadosView&action=index" class="btn btn-info">Volver</a>
		</div>
	</form>				
</body>
</html>