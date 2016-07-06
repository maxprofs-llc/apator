<?php 
class PasswordChecked {
	

	//$user = $sth->fetch(PDO::FETCH_OBJ);

	// Hashing the password with its hash as the salt returns the same hash
	function test(){
		//require 'config.php';

	$password = $_POST['haslo'];
	$email = $_POST['email'];
	$polaczenie = new Connection();
	$connection=mysqli_connect($polaczenie->getHost(),$polaczenie->getUser(),$polaczenie->getPassword(),$polaczenie->getDbName());
	$user = mysqli_query($connection,"SELECT password FROM users WHERE email = '$email' LIMIT 1");
	$haslo=mysqli_fetch_object($user);
	if (hash_equals($haslo->password, crypt($password, $haslo->password))) {
	 return $haslo->password;
	}}
}

//$sprawdzenie = new PasswordChecked();
//echo $sprawdzenie->test();
 ?>