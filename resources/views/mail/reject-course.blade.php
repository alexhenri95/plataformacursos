<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Correo de rechazo</title>
</head>
<body>
	<h1>Curso RECHAZADO!!</h1>
	<p>El curso <strong>{{$course->title}}</strong> ha sido rechazado</p>

	<div>
		<strong>Motivo del rechazo:</strong>
		<hr>
		{!! $course->observation->body !!}
	</div>
</body>
</html>