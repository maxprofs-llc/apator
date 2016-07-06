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
    //require_once 'include/settings.php';
    $NAZWA_STRONY="Cennik katalogowy";
    $LOKALIZACJA="w cenniku";
    $STRONA="cennik";
    $euro=4.3;
    //require_once 'szablony/witryna.php';
?>
    <script>
        function showGroup(str) {
    if (str == "") {
        document.getElementById("txtHint").innerHTML = "";
        return;
    } else {
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("txtHint").innerHTML = xmlhttp.responseText;
            }
        };
        xmlhttp.open("GET","skrypty/cennik_tresc.php?q="+str,true);
        xmlhttp.send();
    }
}
</script><div class="row">
    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
        <form><h3>Wyświetl cennik</h3>
            <select name="users" onchange="showGroup(this.value)">

              <option value="">Wybierz grupę:</option>
              <?php 
                require_once 'skrypty/getGroupHeaders.php';
                getGroupsHeaders();
              ?>
              </select>
        </form>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
        <script>
            $(document).ready(function() {
            $("#wyslij").click(function() {
            var group = $("#inputGroup1").val();
            var name = $("#inputName1").val();
            var price = $("#inputPrice1").val();
            var currency = $("#inputCurrency1").val();
            if (group == '' || name == '' || price == '' || price == '' || currency == '') {
            alert("Niektóre pola są puste!");
            } else {
            // prawidłowe wykonanie zapytania
            $.post("cennik_dodaj.php", {
            group: group,
            name: name,
            price: price,
            currency: currency,
            }, function(data) {
            alert(data);
            $('#addProduct')[0].reset(); // resetowanie formularza
            });
            }
            });
            });
        </script>
        <form id="addProduct">
            <h3>Dodaj produkt</h3>
            <input id="inputGroup1" name="grupa" type="text" class="form-control" placeholder="Podaj grupę produktu"></input>
            <input id="inputName1" name="nazwa" type="text" class="form-control" placeholder="Podaj nazwę produktu"></input>
            <input id="inputPrice1" name="cena" type="text" class="form-control" placeholder="Podaj cenę produktu"></input>
            <select class="form-control" name="waluta" id="inputCurrency1">
                <option value="">Wybierz walutę:</option>
                <option value="EUR">EUR</option>
                <option value="PLN">PLN</option>
            </select>
            <input id="wyslij" type="button" value="Dodaj produkt">
        </form>
    </div>
    <div id="txtHint" class="col-lg-10 col-lg-offset-2">
        <b>
<!--        tutaj wyświetlane są dane z zapytań AJAX-->
        </b>
    </div>
</div>

    <script>
        $(document).ready(function(){
                $("#LOKALIZACJA").replaceWith("<span id=\"LOKALIZACJA\">w cenniku.</span>");
            });
    </script>