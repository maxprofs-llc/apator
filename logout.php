<?php
if(session_status()==PHP_SESSION_NONE){
    //reset sesji
    session_start();
    //stworzenie nowego id sesji, usuniecie starych danych
    $delete_old_session=true;
    session_regenerate_id($delete_old_session);
    session_destroy();
    unset($_SESSION);
                echo "<script>location.replace('index.php');</script>";
                
}
//echo session_status();
if(session_status()==PHP_SESSION_ACTIVE){
		//echo "sesja dalej zyje";
                //sleep(30);
                //stworzenie nowego id sesji, usuniecie starych danych
                $delete_old_session=true;
                session_regenerate_id($delete_old_session);
                session_destroy();
                unset($_SESSION);
                echo "<script>location.replace('index.php');</script>";
                //session_regenerate_id(true);
	//echo "no no...";
	//$_SESSION = array();
	//if (ini_get("session.use_cookies")) {
	//    $params = session_get_cookie_params();
	//    setcookie(session_name(), '', time() - 42000,
	//        $params["path"], $params["domain"],
	//        $params["secure"], $params["httponly"]
	//    );
	//}
	}
	else {
		echo "juz po sesji";
                //session_destroy();
                //echo "<script>location.replace('index.php');</script>";
	}
		//header("location: index.php"); // Redirecting To Other Page
                //exit();
                
?>