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
            <h2  style="text-align:center;">Kamer <?php echo $_GET['action']?>, 1-persoonskamer</h2>
            <img src="img/1perskamer.jpg" class="Image1pers">
            <p class="1persP" style="margin:0 auto;width: 75%;color:white;">Deze 1 persoonskamer bestaat uit een slaapkamer en een badkamer. De slaapkamer is voorzien van een 1 persoons bed, een nachtkastje met accessoires, en een televisie.
                De badkamer is voorzien van een douche en een bad<br><br>
                <a href='res-gegevens.php' style='border:1px solid white;'>Reserveer deze kamer</a>
        </div>
    </body>
</html>

<?php
include 'include\footer.php';
?>