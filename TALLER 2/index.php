<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabla</title>
    <link rel="stylesheet" type="text/css" href="assets/style.css">
</head>

<body>
    <div class="parent-container">
        <div class="container">
            <?php
            $cabecera = array("NOMBRE", "DIRECCION", "TELEFONO", "CUMPLEAÑOS", "COLOR FAVORITO", "SIGNIFICADO");
            $Luis = array("Luis Garcia", "calle 1", "123456", "25/25/25", "Azul", "Cielo");
            $Ronaldo = array("Ronaldo Rosero", "Calle 5 sur #3c-40", "3154875304", "23/07/2004", "Verde", "Esperanza");
            $Maria = array("María López", "Calle 2", "987654321", "12/12/12", "Amarillo", "Sol");
            $Juan = array("Juan Pérez", "Calle 3", "456789123", "08/08/08", "Rojo", "Pasión");
            $datos = array($Luis, $Ronaldo, $Maria, $Juan);
            ?>
            <h2>Personas</h2>
            <table class="style-table">
                <thead>
                    <tr>
                        <?php
                        foreach ($cabecera as $valor) {
                            echo '<td>' . $valor . '</td>';
                        }
                        ?>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($datos as $persona) {
                        echo '<tr>';
                        foreach ($persona as $dato) {
                            echo '<td>' . $dato . '</td>';
                        }
                        echo '</tr>';
                    }
                    ?>
                </tbody>
            </table>
            <form method="GET" action="index.php">
                <label for="color">Color favorito:</label>
                <select name="color" id="color">
                    <option class="options" value="">Todos los colores</option>
                    <option class="options" value="Azul">Azul</option>
                    <option class="options" value="Verde">Verde</option>
                    <option class="options" value="Amarillo">Amarillo</option>
                    <option class="options" value="Rojo">Rojo</option>
                </select>
                <input type="submit" value="Buscar">
            </form>
            <?php
            $colorfavorito = isset($_GET['color']) ? $_GET['color'] : '';
            if ($colorfavorito != '') {
                echo '<h2>Personas con color favorito ' . $colorfavorito . ':</h2>';
                echo '<table class="style-table">';
                echo '<thead>';
                echo '<tr>';
                foreach ($cabecera as $valor) {
                    echo '<th>' . $valor . '</th>';
                }
                echo '</tr>';
                echo '</thead>';

                echo '<tbody>';
                foreach ($datos as $persona) {
                    if ($persona[4] == $colorfavorito) {
                        echo '<tr>';
                        foreach ($persona as $dato) {
                            echo '<td>' . $dato . '</td>';
                        }
                        echo '</tr>';
                    }
                }
                echo '</tbody>';
                echo '</table>';
            }
            ?>
        </div>
    </div>
</body>

</html>