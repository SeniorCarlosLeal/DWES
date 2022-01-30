<html>

    <head>
        <title>LOGIN</title>
    </head>

    <body>
        <form action="pe_login.php" method="POST">

            <h1>Login</h1>

            <label>USUARIO: </label>
            <input type="text" name="usuario" required/><br/>

            <label>CONTRASEÑA: </label>
            <input type="text" name="password" required/><br/>

            <input type="submit" value="LOGIN"/>

        </form>
        <?php
            if($_POST){
                session_start();
                include('./Funciones/funciones.php');
                $conexion = conexion();
                $usuario=$_POST['usuario'];
                $password=$_POST['password'];
                $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $query=$conexion->prepare("SELECT * FROM customers WHERE customerNumber= :usuario AND contactLastName = :password");
                $query->bindParam(":usuario", $usuario);
                $query->bindParam(":password", $password);
                $query->execute();
                $usuarioLogin=$query->fetch(PDO::FETCH_ASSOC);

                if ($usuarioLogin){
                    $_SESSION['customerNumber'] = $usuarioLogin["customerNumber"];
                    header("location: ./pe_inicio.html");
                }else{
                    echo "Usuario o password incorrecto";
                }

            }
        ?>
    </body>
</html>
