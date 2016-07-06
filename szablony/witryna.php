<?php require_once 'skrypty/funkcje_tresc.php';?>
<!doctype html>
<html>
<head>
    <title id="NAZWA_STRONY"></title>
<meta http-equiv="Content-type" content="text/html; charset=utf-8">
<link rel="Stylesheet" type="text/css" href="css/bootstrap.css" />	
<link rel="Stylesheet" type="text/css" href="css/apator.css" />	
<!--<script src="js/jquery-1.12.2.js"></script>-->
<!--<script src="http://code.jquery.com/jquery-1.7.2.min.js"></script>-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
</head>
<body>
    <div class="row">
        <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12" id="NAGLOWEK">
            <?php require_once 'szablony/naglowek.php';?>
        </div>
        <div class="col-lg-7 col-md-7 col-sm-12 col-xs-12" id="MENU">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <?php require_once 'szablony/menu.php';?>
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" id="TRESC">
<!--                    TRESC DO PODMIANY-->
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" id="STOPKA"><?php require_once 'szablony/stopka.php';?></div>
    </div>
</body>
</html>
