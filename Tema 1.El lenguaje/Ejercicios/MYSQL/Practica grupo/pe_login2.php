<?php
    session_start();
    session_destroy();
    header("location:pe_login.php");
?>