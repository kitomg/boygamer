<!DOCTYPE html>
<html lang="es">
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            border-spacing: 0;
            margin-top: 20px;
            background-color: #00008B;
        }

        body {
            background-color: #00008B;
        }

        .titulo {
            color: #ffffff;
            font-weight: bold;
            text-align: center;
        }

        h1 {
            color: #ffffff;
            font-weight: bold;
            text-align: center;
        }

        table th,
        table td {
            border: 1px solid #ccc;
            padding: 10px;
            color: #ffffff;
        }

        table th {
            background-color: #00BFFF;
            font-weight: bold;
        }

        table td img {
            width: 100px;
        }

        table td:nth-child(1) {
            width: 50px;
        }

        table td:nth-child(2) {
            width: 200px;
        }

        table td:nth-child(3) {
            width: 150px;
        }

        table td:nth-child(4) {
            width: 150px;
        }

        table td:nth-child(5) {
            width: 150px;
        }

        table td:nth-child(6) {
            width: 150px;
        }
        .volver-arriba {
            position: fixed;
            top: 20px;
            right: 20px;
            font-size: 18px;
            color: #ffffff;
            background-color: #00008B;
        }
    </style>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width">
    <title>Lista de videojuegos</title>
</head>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width">
    <title>Lista de videojuegos</title>
</head>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width">
    <title>Lista de videojuegos</title>
</head>
<body>
    <?php
    echo '<script>';
    echo 'const backButton = document.createElement(\'button\');';
    echo 'backButton.innerHTML = \'Volver a la página anterior\';';
    echo 'backButton.className = \'volver-arriba\';';
    echo 'backButton.onclick = () => {';
    echo 'history.back();';
    echo '};';

    echo 'document.querySelector(\'body\').appendChild(backButton);';
    echo '</script>';
    ?>

    <h1>Lista de videojuegos</h1>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Código</th>
                <th>Nombre</th>
                <th>Fecha de lanzamiento</th>
                <th>Compañía</th>
                <th>Plataforma</th>
                <th>Género</th>
                <th>Link</th>
            </tr>
        </thead>
        <tbody>
            <?php
            require_once 'almacenjuegos.php';
            require_once 'Videojuegos.php';
            require_once 'env.php';

            $almacenjuego = new almacenjuego();

            $videojuegos = $almacenjuego->getAll();

            // Filtra los videojuegos por género
            if (isset($_GET['genero'])) {
                $genero = $_GET['genero'];
                $videojuegos = $almacenjuego->getAllByGenero($genero);
            } else {
                $videojuegos = $almacenjuego->getAll();
            }

            foreach ($videojuegos as $videojuego) {
                echo '<tr>';
                echo '<td class="codigo">' . $videojuego->getCodigo() . '</td>';
                echo '<td>' . $videojuego->getNombre() . '</td>';
                echo '<td>' . $videojuego->getFecha_Lanzamiento() . '</td>';
                echo '<td>' . $videojuego->getCompania() . '</td>';
                echo '<td>' . $videojuego->getPlataforma() . '</td>';
                echo '<td>' . $videojuego->getGenero() . '</td>';
                echo '<td>' . $videojuego->getLINK() . '</td>';
                echo "<td><a href='eliminarvideo.php?codigo=" . $videojuego->getCodigo() . "'>Eliminar</a></td>";
                echo '</tr>';
            }
            ?>
        </tbody>
    </table>

   
    </form>
</body>
</html>


