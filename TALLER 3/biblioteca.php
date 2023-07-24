<?php

// Creamos una función para realizar operaciones (suma, resta, multiplicación y división)
function operaciones($num1, $num2, $operacion = 'S')
{
    $operacion = strtoupper($operacion);

    // Realizamos las operación basada en el tercer parámetro
    switch ($operacion) {
        case 'S':
            $resultado = $num1 + $num2;
            break;
        case 'R':
            $resultado = $num1 - $num2;
            break;
        case 'M':
            $resultado = $num1 * $num2;
            break;
        case 'D':
            // Validamos que no se pueda dividir entre cero
            if ($num2 != 0) {
                $resultado = $num1 / $num2;
            } else {
                $resultado = "Error: Division entre 0 no permitida";
            }
            break;
        default:
            $resultado = "Operacion no valida";
            break;
    }
    return $resultado;
}