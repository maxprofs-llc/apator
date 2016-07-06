<?php 
	require 'config.php';
	$polaczenie = new Connection();
	$connection=mysqli_connect($polaczenie->getHost(),$polaczenie->getUser(),$polaczenie->getPassword(),$polaczenie->getDbName());

        //TUTAJ PODAJ DANE DOSTEPOWE
	$email = 'adres@email.pl';
	$password = 'haslo';

	// Wyższy koszt hasła zwiększa użycie CPU ale daje większe bezpieczeństwo
	$cost = 10;

	// Create a random salt
	$salt = strtr(base64_encode(mcrypt_create_iv(16, MCRYPT_DEV_URANDOM)), '+', '.');

	// Informacja o prefixie hashu tak by php wiedzial czego potem uzyc
	// "$2a$" oznacza użycie algorytmu blowfish. kolejne cyfry to wielkość kosztu algorytmu
	$salt = sprintf("$2a$%02d$", $cost) . $salt;

	// Value:
	// $2a$10$eImiTXuWVxfM37uY4JANjQ==

	// Hashowanie hasla przy pomocy soli "salt"
	$hash = crypt($password, $salt);

	echo $hash;
        
        
$czyIstniejeUzytkownik = mysqli_query($connection, "SELECT email FROM users WHERE email = '$email' LIMIT 1");
if(mysqli_num_rows($czyIstniejeUzytkownik)==1) {
    $wgraj_dane = mysqli_query($connection,"UPDATE users SET password = '$hash' WHERE email = '$email'");}
else {
    $wgraj_dane = mysqli_query($connection,"INSERT INTO users (email, password) VALUES ('$email', '$hash');");
}
$user = mysqli_query($connection,"SELECT password FROM users WHERE email = '$email' LIMIT 1");
$haslo=mysqli_fetch_object($user);

//$user = $sth->fetch(PDO::FETCH_OBJ);

// Hashing the password with its hash as the salt returns the same hash
if ( hash_equals($haslo->password, crypt($password, $haslo->password)) ) {
 echo "hasla sie zgadzaja"; // Ok!
}
 ?>