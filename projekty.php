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
    //require_once 'include/settings.php';
    $NAZWA_STRONY="Projekty";
    $LOKALIZACJA="w projektach";
    $STRONA="projekty";
    ?>
    <script>
        $(document).ready(function(){
                $("#LOKALIZACJA").replaceWith("<span id=\"LOKALIZACJA\">w projektach.</span>");
            });
    </script>