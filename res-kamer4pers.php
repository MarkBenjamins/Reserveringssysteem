<?php
$stylesheet = "kamers";
include 'include/header.php';
?>

<!DOCTYPE HTML>
<html>
<body>
    <div id="container">
        <?php
        if (isset($_POST["kamersubmit"])) {
            $id = $_POST["id"];
        //     var_dump($id);
        // } else {
        //     echo "no";
        }
        ?>
        <h2 style="text-align:center;">Kamer, 4-persoonskamer</h2>
        <img src="img/1perskamer.jpg" class="Image1pers">
        <p class="1persP" style="margin:0 auto;width: 75%;color:white;">Deze 4 persoonskamer bestaat uit een slaapkamer en een badkamer. De slaapkamer is voorzien van twee maal een 2 persoons bed, een nachtkastje met accessoires, en een televisie.
            De badkamer is voorzien van een douche en een bad<br><br>
            <form method='POST' action='res-gegevens.php'>
                <input type='hidden' name='id' value='<?php echo $id; ?>'>
                <input type='submit' class='btn mark-btn' value='Reserveer deze kamer'>
            </form>

            <a href='res-kameroverzicht.php' class='btn mark-btn' >Terug</a>
        </p><br>
    </div>
</body>
</html>

<?php
include 'include\footer.php';
?>