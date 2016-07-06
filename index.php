<?php
if(session_status()==PHP_SESSION_NONE){session_start();}
if(session_status()==PHP_SESSION_ACTIVE){
    //echo "SESJA DZIAŁA";
}
else {
    echo "SESJA NIE DZIAŁA";
}
//if (session_status() == PHP_SESSION_NONE) {session_start();}
//include('login.php'); // Includes Login Script

if(isset($_SESSION['login_user'])){
    //echo "cos dalej jest nie tak";
    echo "<script>location.replace('logout.php');</script>";
//header("location: zalogowano2.php");
//exit();
//echo "<script> location.replace('zalogowano2.php'); </script>";
}
?>
<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="description" content="Apator Control Konfigurator">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Konfigurator wersja 0.0.1</title>
        <link rel="stylesheet" href="css/bootstrap.css">
        <link rel="stylesheet" href="css/apator.css">
        <link rel="author" href="humans.txt">
    </head>
    <body>
    	
    	<div class="row">
    		<div class="col-sm-offset-5 col-sm-2">
    			<span class="label label-danger"><?php 
    				if(isset($_SESSION['blad'])){
					echo $_SESSION['blad'];}
    	 			?></span>
    	 	</div>
    	</div>
        <div class="row">
            <div class="col-xs-12">
    	<form class="form-horizontal" method="post" action="login.php">
		  <div class="form-group">
		    <label for="inputEmail3" class="col-sm-offset-2 col-sm-2 control-label">Email</label>
		    <div class="col-sm-4">
		      <input type="email" class="form-control" id="inputEmail3" placeholder="Email" name="email">
		    </div>
		  </div>
		  <div class="form-group">
		    <label for="inputPassword3" class="col-sm-offset-2 col-sm-2 control-label">Hasło</label>
		    <div class="col-sm-4">
		      <input type="password" class="form-control" id="inputPassword3" placeholder="Hasło" name="haslo">
		    </div>
		  </div>
		  <div class="form-group">
		    <div class="col-sm-offset-4 col-sm-4">
		      <div class="checkbox">
		        <label>
		          <input type="checkbox"> Zapamiętaj mnie
		        </label>
		      </div>
		    </div>
		  </div>
		  <div class="form-group">
		    <div class="col-sm-offset-4 col-sm-4">
                        <?php
                        ob_start();
                        ?>
		      <button type="submit" name="submit" class="btn btn-default">Zaloguj</button>
		    </div>
		  </div>
		</form>
            </div>
        </div>
        <script src="js/main.js"></script>
    </body>
</html>