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
$group=$_POST['group'];
$name=$_POST['name'];
$price=$_POST['price'];
$currency=$_POST['currency'];
require_once 'skrypty/setNewProduct.php';
//echo $group;
//echo $name;
//echo $price;
//echo $currency;
setNewProduct($group, $name, $price, $currency);
?>