<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PythonController extends Controller
{
    public function executePythonScript()
    {
        // Ruta al script de Python
        $scriptPath = base_path('app/Http/Scripts/mi_script.py');
        // Ejecutar el script y capturar la salida
        $output = [];
        $returnVar = 0;
        exec("python3 $scriptPath 2>&1", $output, $returnVar);

        // Convertir la salida en una cadena
        $outputString = implode("\n", $output);

        // Pasar la salida a la vista
        return view('python_output', ['output' => $outputString]);
    }
}