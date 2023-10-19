<?php

require_once 'Usuario.php';
require_once 'Videojuegos.php';
require_once 'RepositorioVideojuego.php';
session_start();
$usuario = unserialize($_SESSION['usuario'])?? null;

// ESTO LO PUSE PARA VER SI SE SOLUCIONA
if (!isset($usuario)) {
  // Usuario no identificado
  header('Location: login.php');
}


if (isset($_POST['NOMBRE']) ) {
    // $cs = new ControladorSesion();
    $repovideo = new RepositorioVideojuego();
    $videojuego = new Videojuegos($_POST['CODIGO'], $_POST['NOMBRE'], $_POST['FECHA_LANZAMIENTO'], $_POST['COMPANIA'], $_POST['PLATAFORMA'],  $_POST['GENERO'],  $_POST['LINK']);

    $result = $repovideo->save($videojuego);

    if ($result != false) {
        $redirigir = 'Principal.php';
        $id_sesion = session_id();
        header('Location: ' . $redirigir . '?id_sesion=' . $id_sesion);
    } else {
        $redirigir = 'crearvideojuegos.php';
    }
    header('Location: ' . $redirigir);
}

$repovideo = new RepositorioVideojuego();
$plataformas = $repovideo->get_all_plataformas();
$compania = $repovideo->get_all_compania();
$genero = $repovideo->get_all_genero();
?>
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
    .volver-arriba {
            position: fixed;
            top: 20px;
            right: 20px;
            font-size: 18px;
            color: #ffffff;
            background-color: #00008B;
        }
  </style>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <title>Cargar videojuegos</title>
   
</head>

<body class="container">
    <div class="jumbotron text-center">
        <h1>Cargar nuevos videojuegos </h1>
    </div>
    <div class="text-center">
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
        <?php
        if (isset($_GET['mensaje'])) {
            echo '<div id="mensaje" class="alert alert-primary text-center">
                    <p>' . $_GET['mensaje'] . '</p></div>';
        }
        ?>

        <form action="crearvideojuegos.php" method="post">
            
        <input type="text" name="NOMBRE" class="form-control form-control-lg"  placeholder="Nombre">
        <input type="date" name="FECHA_LANZAMIENTO" class="form-control form-control-lg" placeholder="Fecha de lanzamiento">
        <select name="COMPANIA">
        <?php
        foreach ($compania as $unaCompania) {
          echo '<option value="' . $unaCompania['id']. '">'. $unaCompania['nombre'] .'</option>';  
        }
        ?>
  
        </select>
        
        <select name="PLATAFORMA">
        <?php
        foreach ($plataformas as $unaPlataforma) {
          echo '<option value="' . $unaPlataforma['id']. '">'. $unaPlataforma['nombre'] .'</option>';  
        }
           ?>
  
           </select>
        
             <select name="GENERO">
              <?php
                 foreach ($genero as $unGenero) {
                  echo '<option value="' . $unGenero['id']. '">'. $unGenero['nombre'] .'</option>';  
        }
                ?>
           </select>
           <input type="text" name="LINK" class="form-control form-control-lg" placeholder="LINK">
       
            <input type="submit" value="Cargar videojuego" class="btn btn-primary">
        </form>
    </div>
</body>

</html>

