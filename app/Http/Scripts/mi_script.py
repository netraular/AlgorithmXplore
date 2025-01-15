# app/Http/Scripts/mi_script.py
import sys

def bubble_sort(arr):
    """
    Implementación del algoritmo Bubble Sort.
    Devuelve la lista ordenada y los pasos de cada iteración.
    """
    n = len(arr)
    steps = []  # Almacenará los pasos de cada iteración

    # Guardar la posición inicial como Iteración 0
    steps.append(f"Iteración 0: {arr.copy()}")

    for i in range(n):
        for j in range(0, n - i - 1):
            if arr[j] > arr[j + 1]:
                # Intercambiar elementos si están en el orden incorrecto
                arr[j], arr[j + 1] = arr[j + 1], arr[j]
                # Guardar el estado actual de la lista después del intercambio
                steps.append(f"Iteración {i + 1}, Paso {j + 1}: {arr.copy()}")
    return arr, steps

def main():
    # Obtener los números del argumento
    if len(sys.argv) < 2:
        print("Error: No se proporcionaron números.")
        sys.exit(1)

    # Convertir la cadena de números en una lista de enteros
    try:
        numbers = list(map(int, sys.argv[1].split(',')))
    except ValueError:
        print("Error: Los datos deben ser números separados por comas.")
        sys.exit(1)

    # Ordenar los números usando Bubble Sort y obtener los pasos
    sorted_numbers, steps = bubble_sort(numbers)

    # Mostrar el resultado y los pasos
    print("Números ordenados con Bubble Sort:", sorted_numbers)
    print("\nPasos del Bubble Sort:")
    for step in steps:
        print(step)

if __name__ == "__main__":
    main()