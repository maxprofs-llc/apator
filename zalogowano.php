<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Konfigurator wersja 0.0.1</title>
        <link rel="stylesheet" href="css/bootstrap.css">
        <link rel="author" href="humans.txt">
    </head>
    <body>
        <?php
            require 'php\login.php';
            // include 'php\login.php';

         ?>
         Welcome <?php echo $_POST["email"]; ?><br>
Your password is: <?php echo $_POST["haslo"]; ?>

        <?php 
        $conn=mysqli_connect("localhost","mietech_apa","6MrkviARD4","mietech_apator");
            // Check connection
            if (mysqli_connect_errno())
              {
              echo "Failed to connect to MySQL: " . mysqli_connect_error();
              }
              else{
                echo "zalogowano123";
              }
            $sql = "SELECT szafa_id, nazwa, szer FROM szafy";

            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                // output data of each row
                while($row = $result->fetch_assoc()) {
                    echo "id: " . $row["szafa_id"]. " - Name: " . $row["nazwa"]. " " . $row["szer"]. "<br>";
                }
            } else {
                echo "0 results";
            }
            mysqli_close($conn);
         ?>
        <div class="row">
        	<div class="col-sm-offset-4 col-sm-4">
        		<h1><span class="label label-success">Zalogowano!</span></h1>
        	</div>
        </div>
        <script src="js/main.js"></script>
    </body>
</html>