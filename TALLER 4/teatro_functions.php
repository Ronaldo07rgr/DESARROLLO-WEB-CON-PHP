<?php
// Funciones para procesar el teatro y mostrarlo en el navegador

// Función para dibujar el teatro en el navegador
function drawTheater($theater) {
    echo '<table class="theater">'; // Añade la clase "theater" para aplicar estilos a la tabla
    // Cabecera con los números de sillas
    echo '<tr><th></th>';
    for ($i = 1; $i <= 5; $i++) {
        echo '<th>' . $i . '</th>';
    }
    echo '</tr>';

    // Contenido del teatro
    for ($i = 0; $i < 5; $i++) {
        echo '<tr>';
        // Número de fila
        echo '<td>' . ($i + 1) . '</td>';
        foreach ($theater[$i] as $seat) {
            echo '<td>' . $seat . '</td>';
        }
        echo '</tr>';
    }
    echo '</table>';
}

// Función para procesar las acciones del usuario
function processAction(&$theater, $row, $seat, $action) {
    $row--; 

    if ($action === 'reserve') {
        if ($theater[$row][$seat - 1] === 'L') {
            $theater[$row][$seat - 1] = 'R';
            return 'Reservación exitosa.';
        } else {
            return 'La silla no está libre para reservar.';
        }
    } elseif ($action === 'buy') {
        if ($theater[$row][$seat - 1] === 'L' || $theater[$row][$seat - 1] === 'R') {
            $theater[$row][$seat - 1] = 'V';
            return 'Compra exitosa.';
        } else {
            return 'La silla no está disponible para comprar.';
        }
    } elseif ($action === 'release') {
        if ($theater[$row][$seat - 1] === 'R') {
            $theater[$row][$seat - 1] = 'L';
            return 'Liberación exitosa.';
        } else {
            return 'La silla no está reservada para liberar.';
        }
    }
}

// Recuperar el arreglo del teatro de la cadena de caracteres serializada
function getTheaterData() {
    if (isset($_POST['theater_data'])) {
        return unserialize($_POST['theater_data']);
    } else {
        // Inicializar el teatro con todos los asientos libres
        return initializeTheater();
    }
}

// Función para inicializar el teatro con todos los asientos libres
function initializeTheater() {
    // Crea una matriz con todas las sillas libres
    $theater = array();
    for ($i = 0; $i < 5; $i++) {
        $row = array_fill(0, 5, 'L');
        $theater[] = $row;
    }
    return $theater;
}

// Validar si la fila y la silla son válidas
function isValidSeat($row, $seat) {
    return ($row >= 1 && $row <= 5) && ($seat >= 1 && $seat <= 5);
}

// Función para obtener el estado de un asiento específico en el teatro
function getSeatState($theater, $row, $seat) {
    // Asegurarse de que la fila y el asiento sean válidos
    if (!isValidSeat($row, $seat)) {
        return 'Invalid';
    }

    $row--; // El índice de la fila en el arreglo comienza desde 0
    $seat--; // El índice del asiento en el arreglo comienza desde 0

    return $theater[$row][$seat];
}
?>
