<?php 
    require_once 'login.php';
    echo "</br>";
    echo "zalogowano jako: <br/>";
    if (isset($_SESSION['login_user']))
        {
            echo $_SESSION['login_user'];
        }
    echo "</br>";
    echo '<h1><a href="logout.php">Wyloguj</a></h1>';
?>