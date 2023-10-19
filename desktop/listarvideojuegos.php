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

form {
  margin: 0 auto;
  background-color: #00008B;
}

form .titulo {
  margin-bottom: 10px;
  text-align: center;
}

form .select {
  width: 100%;
  margin-bottom: 10px;
}

form .texto {
  width: 100%;
  margin-bottom: 10px;
}

form .boton {
  margin-top: 10px;
  margin-bottom: 10px;
}

form .filtro {
  position: relative;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  width: 100px;
  height: 100px;
  background-color: #00008B;
  color: #ffffff;
  text-align: center;
  font-size: 16px;
}

form .select {
  position: relative;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  width: 100px;
  height: 30px;
  background-color: ##00008B;
  font-size: 14px;
  line-height: 20px;
  text-align: center;
}

form .texto {
  position: relative;
  top: 75%;
  left: 50%;
  transform: translate(-50%, -50%);
  width: 100px;
  height: 30px;
  background-color: #00008B;
  font-size: 14px;
  line-height: 12px;
  text-align: center;
}

a {
  background-color: #00008B;
  color: #ffffff;
  border: 1px solid #ccc;
  padding: 2px;
  cursor: pointer;
}


button {
  background-color: #00BFFF;
  color: #ffffff;
  border: 1px solid #ccc;
  padding: 2.5px;
  cursor: pointer;
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
            </tr>
        </thead>
        <tbody>
            <?php
            require_once 'almacenjuegos.php'; // Asegurate de incluir el archivo correcto
            require_once 'Videojuegos.php';
            require_once 'env.php';

            // Crear una instancia de RepositorioVideojuego
            $almacenjuego = new almacenjuego();

            // Obtener la lista de videojuegos cargados
            $videojuegos = $almacenjuego->getAll(); // Debes tener un método "getAll" en tu repositorio

            $filtro = '';

// Si el filtro no es vacío, filtrar los juegos
if (isset($_POST['filtro'])) {
    $filtro = $_POST['filtro'];

    // Verifica que el usuario ingresó un valor válido en el campo de texto
    if (!is_string($filtro)) {
        echo 'El valor del filtro debe ser una cadena de texto';
        exit;
    }

    // Verifica que el usuario ingresó un valor válido en el campo de texto
    if (!in_array($filtro, ['empresa', 'genero', 'plataforma'])) {
        echo 'El valor del filtro debe ser "empresa", "genero" o "plataforma"';
        exit;
    }

    $videojuegosFiltrados = array();

    // Iterar sobre los videojuegos
    foreach ($videojuegos as $videojuego) {
        // Agregar el videojuego a la lista filtrada si cumple el criterio
        if ($filtro == 'empresa' && $videojuego->getCompania() == $_POST['nombre_filtro']) {
            $videojuegosFiltrados[] = $videojuego;
        } else if ($filtro == 'genero' && $videojuego->getGenero() == $_POST['nombre_filtro']) {
            $videojuegosFiltrados[] = $videojuego;
        } else if ($filtro == 'plataforma' && $videojuego->getPlataforma() == $_POST['nombre_filtro']) {
            $videojuegosFiltrados[] = $videojuego;
        }
    }

    // Reemplazar la lista de videojuegos con la lista filtrada
    $videojuegos = $videojuegosFiltrados;
}

            // Iterar sobre la lista de videojuegos
            foreach ($videojuegos as $videojuego) {
                // Agregar una fila a la tabla
                echo '<tr>';
                echo '<td>' . $videojuego->getCodigo() . '</td>';
                echo '<td>' . $videojuego->getNombre() . '</td>';
                echo '<td>' . $videojuego->getFecha_Lanzamiento() . '</td>';
                echo '<td>' . $videojuego->getCompania() . '</td>';
                echo '<td>' . $videojuego->getPlataforma() . '</td>';
                echo '<td>' . $videojuego->getGenero() . '</td>';
                echo '</tr>';
            }

            


            ?>
        </tbody>
    </table>
    <form action="" method="post">
  <div class="filtro">
    Filtrar videojuegos
  </div>
        <div class="botones">
  <select name="filtro" class="select">
    <option value="">Seleccionar filtro</option>
    <option value="empresa">Empresa</option>
    <option value="genero">Género</option>
    <option value="plataforma">Plataforma</option>
  </select>
        </div>
        <div class= "texto">
  <input type="text" name="nombre_filtro" class="texto" placeholder="Nombre del filtro">
        </div>
  <div class="botones">
    <button type="submit" name="filtrar" value="filtrar" class="boton">Filtrar</button>
    
  </div>
</form>
</body>

</html>