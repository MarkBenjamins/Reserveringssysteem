<?php
$stylesheet = "kamers";
include 'include/header.php';
?>
<div id="container">
    <?php
    if (isset($_POST["kamersubmit"])) {
        $id = $_POST["id"];
    }
    ?>
    <h2 style="text-align:center;">Kamer, 2-persoonskamer</h2>
    <img src="img/kamer3.jpg" class="Image1pers" alt="test">
    <p class="1persP" style="margin:0 auto;width: 75%;color:white;">Deze 2 persoonskamer bestaat uit een slaapkamer en een badkamer. De slaapkamer is voorzien van een 2 persoons bed, een nachtkastje met accessoires, en een televisie.
        De badkamer is voorzien van een douche en een bad<br><br>
        <form method='POST' action='res-gegevens.php'>
            <input type='hidden' name='id' value='<?php echo $id; ?>'>
            <input type='submit' class='btn mark-btn' value='Reserveer deze kamer'>
        </form>
        <a href='res-kameroverzicht.php' class='btn mark-btn' id='mrg5' >Terug</a>
    </p>
    <br>
</div>
<?php
include 'include/footer.php';
?>