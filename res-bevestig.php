<?php
$stylesheet = "betalen";
include "include/header.php";
include "include/functions.php"
//gemaakt door iedereen
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-4">
        </div>
        <div class="col-4">
            <center>
                <h1>Betaald</h1>
            </center>
            <?php //Controle en melding van de betaalmethode
            viewMessage();
            if (isset($_POST["methodesubmit"])) {
                if ($_POST["methode"] == "paypal") {
                    echo "<p class='tekstkleur'>Bedankt voor het betalen met PayPal.</p>";
                } elseif ($_POST["methode"] == "iDeal") {
                    echo "<p class='tekstkleur'>Bedankt voor het betalen met IDeal.</p>";
                } elseif ($_POST["methode"] == "creditcard") {
                    echo "<p class='tekstkleur'>Bedankt voor het betalen met creditcard.</p>";
                } else {
                    sendMessage("onbekende betaalmethode.", $_SERVER["PHP_SELF"]);
                }
            } else {
                header("Location: res-betaling.php");
            }
            ?>
            <center>
                <form method="POST" action="res-gegevensoverzicht.php">
                    <input type="submit" class="btn btn-outline-danger" value="Print bevestiging" name="methodesubmit">
                </form>
            </center>
        </div>
        <div class="col-4">
        </div>
    </div>
</div>

<?php include "include/footer.php"; ?></div>