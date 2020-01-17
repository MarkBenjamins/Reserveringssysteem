<?php
$stylesheet = "kamers";
include 'include/header.php';


var_dump($_SESSION["res-home"]);
?>
<!DOCTYPE HTML>
<html>

<head>
    <title></title>
</head>

<body>
    <div id="container">
        <?php
        if (isset($_POST["kamersubmit"])) {
            $id = $_POST["id"];
            var_dump($id);
        } else {
            echo "no";
        }
        ?>

        <h2 style="text-align:center;">Kamer, 2-persoonskamer</h2>
        <img src="img/1perskamer.jpg" class="Image1pers">
        <p class="1persP" style="margin:0 auto;width: 75%;color:white;">Deze 2 persoonskamer bestaat uit een slaapkamer en een badkamer. De slaapkamer is voorzien van een 1 persoons bed, een nachtkastje met accessoires, en een televisie.
            De badkamer is voorzien van een douche en een bad<br><br>
            <form method='POST' action='res-gegevens.php'>
                <input type='hidden' value='<?php echo $id; ?>'>
                <input type='submit' value='Reserveer deze kamer'>
            </form>

            <a href='res-kameroverzicht.php' style='border:1px solid white;'>Kies een andere kamer</a>
        </p><br>
    </div>
</body>

</html>

<?php
include 'include/footer.php';
?>