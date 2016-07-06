<?php
    function setNewProduct($group,$name,$price,$currency){
        require_once 'config.php';
        $polaczenie = new Connection();
	$connection=mysqli_connect($polaczenie->getHost(),$polaczenie->getUser(),$polaczenie->getPassword(),$polaczenie->getDbName());
        if($currency='EUR'){
            $query=mysqli_query($connection,"INSERT into cennik (Grupa, Nazwa, Cena, Waluta, pln) values ('$group','$name','$price','$currency','$price'*4.3)");
        }
        elseif($currency='PLN'){
            $query=mysqli_query($connection,"INSERT into cennik (Grupa, Nazwa, Cena, Waluta, pln) values ('$group','$name','$price','$currency','$price')");
        }
        if($query){
        echo "Dane przesłane prawidłowo.";
        }
        mysqli_close($connection); // Zamknięcie połączenia
    }
?>