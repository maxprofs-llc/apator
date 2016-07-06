<?php if(session_status()==PHP_SESSION_NONE){session_start();}
//echo session_status();

if(session_status()==PHP_SESSION_ACTIVE){
    //echo "SESJA DZIAŁA";
    require_once 'config.php';
require 'errors.php';
require 'pass_checker.php';
}
else {
    echo "SESJA NIE DZIAŁA, SPRAWDŹ USTAWIENIA";
    echo "<script>location.replace('index.php');</script>";
}

$error; // przygotowanie zmiennej do przechowywania informacji o aktualnym bledzie
if (isset($_POST['submit'])) {
		
	if (empty($_POST['email'])) {
		 
		$_SESSION['blad']="Brak adresu email";
		echo $_SESSION['blad'];
		//header("location: index.php"); // Redirecting To Other Page
                //exit();// przekierowanie na inna strone
                //w zaleznoscie od php.ini serwer moze zwracac tutaj blad nadpisywania naglowkow
                // "headers already sent"
                echo "<script>location.replace('index.php');</script>";
	}
	else
	{
		// Zdefiniowanie $email oraz $password
		$email=$_POST['email'];
		$password=$_POST['haslo'];
		// ustanowienie polaczenia z baza danych
		$polaczenie = new Connection();

		$connection=mysqli_connect($polaczenie->getHost(),$polaczenie->getUser(),$polaczenie->getPassword(),$polaczenie->getDbName());
		// $connection = mysql_connect("localhost", "root", "");

		// Zabezpieczenie przed sql injection
		$email = stripslashes($email);
		$password = stripslashes($password);
		$email = mysqli_real_escape_string($connection,$email);
		$password = mysqli_real_escape_string($connection,$password);
		$sprawdzenie = new PasswordChecked();
                
                //sprawdzenie hasla
		$haselko=$sprawdzenie->test();
		//echo $haselko;
		$query = mysqli_query($connection, "select * from users where email='$email' and password ='$haselko'");
		$rows = mysqli_num_rows($query);
		if ($rows == 1) {
		$_SESSION['login_user']=$email; // odczytanie ciasteczka sesji
                
                //przeslanie do bazy danych id obecnej sesji, jako ostatniej uzytej sesji przez uzytkownika
                $id_sesji=  session_id();
                $query = mysqli_query($connection, "UPDATE users SET id_ostatniej_sesji = '$id_sesji' WHERE email = '$email'");
                //$polaczenie->rozlacz();
		// echo $rows;
		// echo $email;
		// echo $haselko;
		echo "<script> location.replace('zalogowano2.php'); </script>";
		//header("location: zalogowano2.php"); // przekierowanie na inna strone
                //exit();
                //w zaleznoscie od php.ini serwer moze zwracac tutaj blad nadpisywania naglowkow
                // "headers already sent"
                
                exit();

	} 
	else {
		$_SESSION['blad'] = "Podany zły adres email lub hasło";
		//echo $rows;
		//echo $email;
		//echo $haselko;
		//header("location: index.php"); // przekierowanie na inna strone
                //w zaleznoscie od php.ini serwer moze zwracac tutaj blad nadpisywania naglowkow
                // "headers already sent"
                //exit();
                echo "<script>location.replace('index.php');</script>";
	}
	//$polaczenie->rozlacz(); // Zamkniecie polaczenia z baza mysql
	}
}
?>