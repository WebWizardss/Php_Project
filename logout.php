<?php 

    session_start();//permission pour acceder contenu $_SESSION
    session_destroy();//delete session current
    unset($_SESSION['id']);
    header("location:./login/index.php");

?>