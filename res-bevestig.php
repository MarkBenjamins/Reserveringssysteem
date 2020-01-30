<?php
$stylesheet = "betalen";
include "include/header.php";
include "include/functions.php";
//gemaakt door iedereen



$conn = mysqli_connect("localhost", "root", "", "sollestijn");

if(mysqli_connect_error($conn)) {
    die(mysqli_connect_errno($conn));
}

$sql = "INSERT INTO `klant` (`voornaam`,`achternaam`,`email`,`telefoonnummer`,`geboortedatum`) VALUES (``,``,``,``,``)";

if($stmt = mysqli_prepare($conn,$sql)) {

    mysqli_stmt_bind_param($stmt, "sssss", $_SESSION['gegevens']['fname'], $_SESSION['gegevens']['lname'], $_SESSION['gegevens']['email'], $_SESSION['gegevens']['tel'], $_SESSION['gdate']);

    if(mysqli_stmt_execute($stmt)) {
        
    } else {
        die("Could not execute #1");
    }

} else {
    die("Could not prepare #1");
}

echo '<pre>';
var_dump($_SESSION['gegevens']);
var_dump($_SESSION['res-home']);
echo '</pre>';
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
                    <input type="submit" class="btn btn-outline-danger" value="bekijk bevestiging" name="methodesubmit">
                </form>
            </center>
        </div>
        <div class="col-4">
        </div>
    </div>
</div>

<?php include "include/footer.php"; ?></div>