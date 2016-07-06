<?php
    $grupa = ($_GET['q']);
    function cennik_tresc($grupa){
        require_once '../config.php';
        $polaczenie = new Connection();
	$connection=mysqli_connect($polaczenie->getHost(),$polaczenie->getUser(),$polaczenie->getPassword(),$polaczenie->getDbName());
        if($grupa!=''){
            $query=mysqli_query($connection,"SELECT * from cennik where Grupa='$grupa'");
        }
        else {
            $query=mysqli_query($connection,"SELECT id_cennik, Grupa, Nazwa, Cena, Waluta, pln from cennik"); 
        }
        $results = array();
        while($line = mysqli_fetch_array($query, MYSQLI_ASSOC)){
            $results[] = $line;
        }
        echo "<table>";
        echo "<tr>";
//        for ($i=0; $i<= mysqli_num_fields($query)-1; $i++){
//        $keys = array_keys($results[$i]);
//        echo "<td>";
//        echo $keys[$i];
        ?>
        <td>id_cennik</td>
        <td>Grupa</td>
        <td>Nazwa</td>
        <td>Cena</td>
        <td>Waluta</td>
        <td>PLN</td>
        <?php
        echo "</tr>";
        //echo $i;
        echo "</br>";
        foreach ($results as $i => $values) {
            echo "<tr>";
        foreach ($values as $key => $value) {
            echo "<td>";
            echo $value;
            echo "</td>";
        }
            echo "</tr>";
        }
        echo "</table>";
    }
    //echo getGroupsHeaders(3);
    cennik_tresc($grupa);
?>