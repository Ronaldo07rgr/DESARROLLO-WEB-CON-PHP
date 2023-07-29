<?php
session_start();
include 'teatro_functions.php';
$theater = getTheaterData();

// Procesar acción si se envió el formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $row = $_POST['row'] ?? null;
    $seat = $_POST['seat'] ?? null;
    $action = $_POST['action'] ?? null;

    if ($row !== null && $seat !== null && $action !== null && isValidSeat($row, $seat)) {
        $message = processAction($theater, $row, $seat, $action);
        $_SESSION['message'] = $message;
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Teatro</title>
    <link rel="stylesheet" href="assets/styles.css">
</head>

<body>
    <h1>Teatro</h1>

    <?php if (isset($_SESSION['message'])): ?>
        <p style="color: red;">
            <?php echo $_SESSION['message']; ?>
        </p>
        <?php unset($_SESSION['message']); ?>
    <?php endif; ?>

    <form method="post" action="index.php" onsubmit="return validateAction();">
        <?php drawTheater($theater); ?>
        <label for="row">Fila:</label>
        <input type="text" name="row" id="row" required>
        <label for="seat">Silla:</label>
        <input type="text" name="seat" id="seat" required>
        <label>Acción:</label>
        <div>
            <input type="radio" name="action" value="reserve" required>Reservar
        </div>
        <div>
            <input type="radio" name="action" value="buy" required>Comprar
        </div>
        <div>
            <input type="radio" name="action" value="release" required>Liberar
        </div>
        <textarea name="theater_data" style="display: none;">
        <?php echo serialize($theater); ?></textarea>
        <div class="button-submit">
            <button type="submit">Enviar</button>
        </div>
    </form>

    <script>
        function validateAction() {
            const action = document.querySelector('input[name="action"]:checked').value;
            const seat = document.getElementById('seat').value;
            const seatState = "<?php echo getSeatState($theater, $row, $seat); ?>";

            // Valida la acción según el estado del asiento
            if ((action === 'release' && seatState === 'V') || (action === 'buy' && seatState === 'L')) {
                alert("La operación no puede realizarse. Estado inválido del asiento.");
                return false; // Impide el envío del formulario
            }

            return true; // Permitir el envío del formulario
        }
    </script>
</body>

</html>