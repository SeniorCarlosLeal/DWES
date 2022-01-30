<?php
    session_start();
    if(isset($_SESSION["customerNumber"])){
?>

<html>
<?php echo "Has iniciado sesion: ". $_SESSION['customerNumber'];?>    
    <p>PROBANDO</p>
    <a href="pe_login2.php"><p>CERRAR SESION</p></a>
</html>

<?php
    }else{
        header("location:pe_login.php");
    }
?>