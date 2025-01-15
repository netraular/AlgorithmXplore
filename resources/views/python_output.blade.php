<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultado</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        .chart-container {
            width: 80%;
            margin: 20px auto;
        }
        .navigation-buttons {
            text-align: center;
            margin-top: 20px;
        }
        .navigation-buttons button {
            padding: 10px 20px;
            margin: 0 10px;
            font-size: 16px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <h1>Resultado del Script Python</h1>
    <p>Se utilizó el algoritmo <strong>Bubble Sort</strong> para ordenar los números.</p>
    <pre>{{ $output }}</pre>

    <div class="chart-container">
        <canvas id="bubbleSortChart"></canvas>
    </div>

    <div class="navigation-buttons">
        <button id="prevStep" disabled>Anterior</button>
        <button id="nextStep">Siguiente</button>
    </div>

    <a href="{{ route('python.form') }}">Volver al formulario</a>

    <script>
    // Datos de los pasos del Bubble Sort
    const steps = @json($steps); // Convertir los pasos de PHP a JavaScript
    let currentStep = 0;

    // Configuración del gráfico
    const ctx = document.getElementById('bubbleSortChart').getContext('2d');
    const bubbleSortChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: steps[0].map((_, index) => `Valor ${index + 1}`),
            datasets: [{
                label: 'Valores',
                data: steps[0],
                backgroundColor: steps[0].map(() => 'rgba(75, 192, 192, 0.2)'), // Color inicial
                borderColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 1,
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });

    // Función para comparar dos arrays y encontrar las posiciones con valores distintos
    function findChangedIndices(prevStep, currentStep) {
        const changedIndices = [];
        for (let i = 0; i < prevStep.length; i++) {
            if (prevStep[i] !== currentStep[i]) {
                changedIndices.push(i);
            }
        }
        return changedIndices;
    }

    // Actualizar el gráfico con el paso actual
    function updateChart() {
        const currentData = steps[currentStep];
        const prevData = currentStep > 0 ? steps[currentStep - 1] : null;

        // Colores de las barras
        const backgroundColors = currentData.map(() => 'rgba(75, 192, 192, 0.2)'); // Color por defecto

        // Resaltar las barras que han cambiado
        if (prevData) {
            const changedIndices = findChangedIndices(prevData, currentData);
            changedIndices.forEach(index => {
                backgroundColors[index] = 'rgba(255, 99, 132, 0.6)'; // Color rojo para cambios
            });
        }

        // Actualizar el gráfico
        bubbleSortChart.data.datasets[0].data = currentData;
        bubbleSortChart.data.datasets[0].backgroundColor = backgroundColors;
        bubbleSortChart.update();

        // Habilitar o deshabilitar botones de navegación
        document.getElementById('prevStep').disabled = currentStep === 0;
        document.getElementById('nextStep').disabled = currentStep === steps.length - 1;
    }

    // Botón "Anterior"
    document.getElementById('prevStep').addEventListener('click', () => {
        if (currentStep > 0) {
            currentStep--;
            updateChart();
        }
    });

    // Botón "Siguiente"
    document.getElementById('nextStep').addEventListener('click', () => {
        if (currentStep < steps.length - 1) {
            currentStep++;
            updateChart();
        }
    });

    // Inicializar el gráfico con el primer paso
    updateChart();
</script>
</body>
</html>