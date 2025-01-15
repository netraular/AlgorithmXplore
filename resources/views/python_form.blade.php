<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Números</title>

</head>
<body>
    <h1>Introduce números separados por coma</h1>
    <form action="{{ route('execute.python') }}" method="POST">
        @csrf
        <label for="numbers">Números:</label>
        <input type="text" id="numbers" name="numbers" placeholder="Ej: 1,2,5,4" required>
        <button type="submit">Ordenar</button>
        <button type="button" onclick="fillExample()">Ejemplo</button>
    </form>

    <script>
        // Función para rellenar el campo con un ejemplo
        function fillExample() {
            document.getElementById('numbers').value = '1,3,5,7,2,4,6,8';
        }
    </script>
</body>
</html>