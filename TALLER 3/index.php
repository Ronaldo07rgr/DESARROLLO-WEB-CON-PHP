<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Operaciones Aritméticas</title>
    <link rel="stylesheet" href="assets/style.css">
</head>

<body>
    <h1>Resultados de Operaciones Aritméticas</h1>

    <?php
    // Deberemos incluir el archivo "biblioteca.php" para acceder a la función "operaciones()"
    require_once 'biblioteca.php';

    // Ejecutamos la función "operaciones()" con diferentes valores y operaciones y mostrar los resultados
    $num1 = 1;
    $num2 = 5;
    ?>

    <div class="result">
        <p><span>Suma:</span>
            <?php echo operaciones($num1, $num2); ?>
        </p>
    </div>

    <div class="result">
        <p><span>Resta:</span>
            <?php echo operaciones($num1, $num2, 'R'); ?>
        </p>
    </div>

    <div class="result">
        <p><span>Multiplicación:</span>
            <?php echo operaciones($num1, $num2, 'M'); ?>
        </p>
    </div>

    <div class="result">
        <p><span>División:</span>
            <?php echo operaciones($num1, $num2, 'D'); ?>
        </p>
    </div>

    <div class="result error">
        <p><span>División entre cero:</span>
            <?php echo operaciones($num1, 0, 'D'); ?>
        </p>
    </div>

    <div class="result error">
        <p><span>Operación no válida:</span>
            <?php echo operaciones($num1, $num2, 'X'); ?>
        </p>
    </div>
</body>

</html>