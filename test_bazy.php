<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Test bazy danych</title>
        <link rel="stylesheet" href="css/bootstrap.css">
        <link rel="author" href="humans.txt">
    </head>
    <body>
        <?php 
            require 'config.php';
            $polaczenie = new Connection();
            $connection=mysqli_connect($polaczenie->getHost(),$polaczenie->getUser(),$polaczenie->getPassword(),$polaczenie->getDbName());
            
        ?>
        
        <script src="js/main.js"></script>
    </body>
</html>