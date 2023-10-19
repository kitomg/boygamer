<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Página de Inicio de Sesión</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #007BFF;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .login-box {
            background-color: #fff;
            border: 1px solid #ddd;
            padding: 85px;
            width: 300px;
            text-align: center;
        }

        h1 {
            color: #007BFF;
        }

        p {
            color: #555;
        }

        label {
            display: block;
            margin-bottom: 10px;
            color: #444;
        }

        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }

        input[type="submit"] {
            background-color: #007BFF;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 3px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>

    </div>
    <div class="login-box">
        <h1>Bienvenido</h1>
        <p>Por favor, inicia sesión.</p>
        <?php
        if (isset($_GET['mensaje'])) {
            echo '<div id="mensaje" class="alert alert-primary text-center">
                    <p>' . $_GET['mensaje'] . '</p></div>';
                    
        }
        ?>
        <form action="procesar_login.php" method="POST">

            <label for="usuario">Usuario:</label>
            <input type="text" id="usuario" name="usuario" required><br><br>
            
            <label for="contrasena">Contraseña:</label>
            <input type="password" id="contrasena" name="contrasena" required><br><br>
            
            <input type="submit" value="Iniciar Sesión">
        </form>
<form action="crearusuario.html" method="post"><br><br>
<input type="submit" value="Crear Usuario">

</form>

    </div>
</body>
</html>