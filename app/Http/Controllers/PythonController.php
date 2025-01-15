<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PythonController extends Controller
{
    public function showForm()
    {
        // Mostrar el formulario
        return view('python_form');
    }

    public function executePythonScript(Request $request)
{
    // Validar la entrada del formulario
    $request->validate([
        'numbers' => 'required|string|regex:/^\d+(,\d+)*$/',
    ]);

    // Obtener los números del formulario
    $numbers = $request->input('numbers');

    // Ruta al script de Python
    $scriptPath = base_path('app/Http/Scripts/mi_script.py');

    // Ejecutar el script de Python con los números como argumento
    $output = [];
    $returnVar = 0;
    exec("python3 $scriptPath \"$numbers\" 2>&1", $output, $returnVar);

    // Convertir la salida en una cadena
    $outputString = implode("\n", $output);

    // Extraer los pasos del Bubble Sort
    $steps = [];
    foreach ($output as $line) {
        if (strpos($line, 'Iteración') !== false) {
            // Extraer la lista de números del paso
            preg_match('/\[(.*?)\]/', $line, $matches);
            if (isset($matches[1])) {
                $steps[] = array_map('intval', explode(', ', $matches[1]));
            }
        }
    }

    // Pasar la salida y los pasos a la vista
    return view('python_output', [
        'output' => $outputString,
        'steps' => $steps,
    ]);
}
}