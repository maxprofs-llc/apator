<?php
    function getGroupsHeaders(){
        require_once 'config.php';
        $polaczenie = new Connection();
	$connection=mysqli_connect($polaczenie->getHost(),$polaczenie->getUser(),$polaczenie->getPassword(),$polaczenie->getDbName());
            $query=mysqli_query($connection,"SELECT distinct Grupa from cennik order by Grupa");
        $results = array();
        $i=0;
        while($row = $query->fetch_array())
        {
            $rows[$i] = $row;
            $i++;
        }
        $j=count($rows);
        //echo $j;
        foreach($rows as $row)
        {
            $tabela[]=$row[0];
        }
        for ($k=0; $k<$j; $k++){
            echo '<option value="'.$tabela[$k].'">'.$tabela[$k].'</option>';
            //return '<option value="'.$row[0].'">'.$row[0].'</option>';
        }
    }
//    echo "<form>";
//    echo "<select>";
//    getGroupsHeaders();
//    echo "</select>";
//    echo "</form>";
?>