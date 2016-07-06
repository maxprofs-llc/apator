<?php
if(session_status()==PHP_SESSION_NONE){
    // resume sesji
    session_start();
}
    if(session_status()==PHP_SESSION_ACTIVE){
        //jezeli została użyta próba "cofnięcia się" do zalogowanej
        if (isset($_SESSION['login_user'])){  
        }
        else {
            echo "<script>location.replace('index.php');</script>";
        }
    }
    else {
        echo "<script>location.replace('index.php');</script>";
    }
    require_once 'include/settings.php';
    $NAZWA_STRONY="Strona główna";
    $LOKALIZACJA="na stronie głównej";
    $STRONA="glowna";
    $TRESC="";
    require_once 'szablony/witryna.php';
?>