<?php
/**
 * Przykładowa funkcja generująca pozycje menu
 * @param menu array <p>
 * Tablica zawierająca nazwę strony jako klucz oraz wyświetlany tekst jako wartość;
 * </p>
 */
function menu($menu)
{
    echo '<script src="js/jquery-1.12.2.js"></script>';
	if (!is_array($menu)) return FALSE;
	$tresc="";
        
	$tresc.="<dl>".PHP_EOL;
        echo "</br>";
	$tresc.="<dt>Menu</dt>".PHP_EOL;
	foreach ($menu as $adres => $napis)
	{
            if (is_file($adres)){
                $tresc.= '<script type="text/javascript">'.PHP_EOL;
                $tresc.= '$(document).ready(function(){'.PHP_EOL;
                $ajdi=substr($adres,0,-4);
                $tresc.= "$(\"#$ajdi\").click(function(){".PHP_EOL;
                $tresc.= "$(\"#TRESC\").load(\"$adres\");".PHP_EOL;
                $tresc.= '});'.PHP_EOL;
                $tresc.= '});'.PHP_EOL;
                $tresc.= '</script>'.PHP_EOL;
		//$tresc.="<dd><p id=\"$adres\"><a href=\"$adres\">$napis</a></p></dd>".PHP_EOL;
                $tresc.="<dd><p id=\"$ajdi\"><a>$napis</a></p></dd>".PHP_EOL;
            }
	}
	$tresc.="</dl>".PHP_EOL;
	return $tresc;
}
?>