<?php
$stylesheet = "betalen";
include "include/header.php";
include "include/functions.php";
//gemaakt door iedereen
echo '<pre>';
var_dump($_SESSION['gegevens']);
var_dump($_SESSION['res-home']);
echo '</pre>';


$conn = mysqli_connect("localhost", "root", "", "sollestijn");

if(mysqli_connect_error($conn)) {
    die(mysqli_connect_errno($conn));
}
/*

$sql = "INSERT INTO `klant` (`voornaam`,`achternaam`,`email`,`telefoonnummer`,`geboortedatum`) VALUES (?,?,?,?,?)";

if($stmt = mysqli_prepare($conn,$sql)) {
    $fname = $_SESSION['gegevens']['fname'];
    $lname = $_SESSION['gegevens']['lname'];
    $email = $_SESSION['gegevens']['email'];
    $gdate = $_SESSION['gegevens']['gdate'];
    $tel = $_SESSION['gegevens']['tel'];

    
    mysqli_stmt_bind_param($stmt, "sssss", $fname, $lname, $email, $tel, $gdate);
    
    if(mysqli_stmt_execute($stmt)) {
        
    } else {
        echo mysqli_connect_errno();
        die("Could not execute #1");
    }

} else {
    echo mysqli_connect_errno();
    die("Could not prepare #1");
}

$KlantId = mysqli_insert_id($conn);


$sql2 = "INSERT INTO `reservering` (`klant_id`, `kamer_id`, `kortingscode_id`, `ontbijt`, `aantalpersonen`, `begindatum`, `einddatum`, `extra`, `totaalprijs`) VALUES ($KlantId,?,?,?,?,?,?,?,?,?);";
*/


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
                    <input type="submit" class="btn btn-outline-danger" value="Bekijk bevestiging" name="methodesubmit">
                </form>
            </center>
        </div>
        <div class="col-4">
        </div>
    </div>
</div>

<?php include "include/footer.php"; ?></div>