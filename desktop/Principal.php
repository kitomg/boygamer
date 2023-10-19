<!DOCTYPE html>
<html>

<head>
<style>
    /* Estilo para el fondo del body */
    body {
      background-color: #000080; /* Azul oscuro */
      color: #FFFFFF; /* Blanco */
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
    }

    /* Estilo para el jumbotron */
    .jumbotron {
      background-color: #1E90FF; /* Azul brillante */
      color: #FFFFFF; /* Blanco */
      text-align: center;
      padding: 20px;
    }

    /* Estilo para el título "Bienvenido" */
    .jumbotron h1 {
      font-size: 36px;
    }

    /* Estilo para los enlaces */
    a {
      text-decoration: none;
      color: #1E90FF; /* Azul brillante */
    }

    a:hover {
      color: #000080; /* Azul oscuro */
    }

    /* Estilo para los párrafos "Cargar videojuegos" y "Cerrar sesión" */
    .text-center {
      text-align: center;
    }

    p.cargar-juegos, p.ver-videojuegos, p.cerrar-sesion {
      margin: 10px 0;
    }

    /* Estilo para los enlaces dentro de los párrafos */
    p a {
      color: #1E90FF; /* Azul brillante */
    }

    p a:hover {
      color: #000080; /* Azul oscuro */
    }

    /* Estilo para el enlace "Cargar videojuegos" */
    .cargar-juegos a {
      background-color: #1E90FF; /* Azul brillante */
      color: #FFFFFF; /* Blanco */
      padding: 10px 20px;
      border-radius: 5px;
      text-transform: uppercase;
      text-decoration: none;
    }

    .cargar-juegos a:hover {
      background-color: #000080; /* Azul oscuro */
    }

    /* Estilo para el enlace "Ver Videojuegos Cargados" */
    .ver-videojuegos a {
      background-color: #1E90FF; /* Azul brillante */
      color: #FFFFFF; /* Blanco */
      padding: 10px 20px;
      border-radius: 5px;
      text-transform: uppercase;
      text-decoration: none;
    }

    .ver-videojuegos a:hover {
      background-color: #000080; /* Azul oscuro */
    }

    /* Estilo para el enlace "Cerrar sesión" */
    .cerrar-sesion a {
      font-size: 14px;
    }
  </style>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width">
  <title>Video Juegos</title>
  <link rel="stylesheet" href="styles.css">
</head>

<body class="container">
  <div class="jumbotron text-center">
 <?php
 session_start(); // Inicia la sesión
 require_once 'env.php';
 require_once 'Usuario.php';

$usuario = isset($_SESSION['usuario']) ? $_SESSION['usuario'] : null;



if (isset($_SESSION['nombre'])) {
  $nombre_usuario = $_SESSION['nombre'];
  echo "<h1>Bienvenido, $nombre_usuario</h1>";
} else {
  echo "<h1>Usuario no identificado</h1>";
}

$es_admin = $_SESSION['es_admin'];
if (isset($_SESSION['nombre']) && isset($_SESSION['es_admin'])) {
    $nombre_usuario = $_SESSION['nombre'];
    $es_admin = $_SESSION['es_admin'];
    
} else {
    
    echo "Usuario no identificado.";
}

if ($es_admin == 1) {
    echo '<p class="cargar-juegos"><a href="crearvideojuegos.php">Cargar videojuegos</a></p>';
    echo '<p class="cargar-juegos"><a href="editarvideojuegos.php">Editar videojuegos</a></p>';
} else {
    echo '<p class="ver-videojuegos"><a href="listarvideojuegos.php">Ver Videojuegos Cargados</a></p>';
}
  ?>
  </div>
  <div class="text-center">
    <p class="cerrar-sesion"><a href="logout.php">Cerrar sesión</a></p>
    <p class="eliminar usuario"><a href="eliminarusuario.html">eliminar</a></p>
  </div>
</body>

</html>