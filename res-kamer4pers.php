<?php
$stylesheet = "kamers";
?>
<!DOCTYPE HTML>
<html>
    <head>
        <title></title>
    </head>
    <body>
        <div id="container">
            <?php
                $_SESSION['kamernummer'] = $_GET['action'];
            ?>           
            <h2  style="text-align:center;">Kamer <?php echo $_GET['action']?>, 4-persoonskamer</h2>
            <img src="img/4perskamer.jpg" class="Image1pers">
            <p class="1persP" style="margin:0 auto;width: 75%;color:white;">De 4 persoonskamer bestaat uit een slaapkamer en een badkamer. De slaapkamer is voorzien van één 2 persoonsbed, en twee 1 persoonsbedden. Deze kunnen samengevoegd worden. 
                                                                            verder heeft de slaapkamer een nachtkastje met accessoires, en een televisie. De badkamer heeft een douche en een bad.
                <a href='res-gegevens.php' style='border:1px solid white;'>Reserveer deze kamer</a>
        </div>
    </body>
</html>

<?php
include 'include\footer.php';
?>