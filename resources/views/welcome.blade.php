<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenido</title>
</head>
<body>
    <h1>Bienvenido a la Aplicación</h1>
    <p>Haz clic en el botón para ir al formulario de ejecución de Python.</p>
    <a href="{{ route('python.form') }}">
        <button>Ir al Formulario</button>
    </a>
</body>
</html>