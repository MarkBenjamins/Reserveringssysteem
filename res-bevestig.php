<?php
$stylesheet = "betalen";
include "include/header.php";
include "include/functions.php";
//gemaakt door iedereen

//Uitgecomment ivm tijdgebrek, krijg het niet meer af.
/*
echo '<pre>';
var_dump($_SESSION['gegevens']);
var_dump($_SESSION['res-home']);
echo '</pre>';


$conn = mysqli_connect("localhost", "root", "", "sollestijn");

if(mysqli_connect_error($conn)) {
    die(mysqli_connect_errno($conn));
}

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


$kamerId = $_SESSION['res-home']['kamerid'];
$klantId = mysqli_insert_id($conn);
$kortingscode = $_SESSION['gegevens']['korting'];
$ontbijt = $_SESSION['gegevens']['ontbijt'];
$lunch = $_SESSION['gegevens']['lunch'];
$diner = $_SESSION['gegevens']['diner'];
$epaal = $_SESSION['gegevens']['epaal'];
$efiets = $_SESSION['gegevens']['efiets'];
$opmerking = $_SESSION['gegevens']['opmerk'];
$aankomst = $_SESSION['res-home']['aankomst'];
$vertrek = $_SESSION['res-home']['vertrek'];
$extra = '';
//Aantal personen calculeren
//start bij 1, voeg toe als er meer zijn
$aantalpersonen = 1;
if(isset($_SESSION["ltijd1"])) {
    $aantalpersonen ++;
}

if(isset($_SESSION["ltijd2"])) {
    $aantalpersonen ++;
}

if(isset($_SESSION["ltijd3"])) {
    $aantalpersonen ++;
}

//End aantal personen calc
$totaalprijs = $aantalpersonen * 25;
//Prijs berekenen moet nog.

$sql2 = "INSERT INTO `reservering` (`klant_id`, `kamer_id`, `kortingscode_id`, `ontbijt`, `aantalpersonen`, `begindatum`, `einddatum`, `extra`, `totaalprijs`) VALUES (?,?,?,?,?,?,?,?,?);";
if($stmt = mysqli_prepare($conn, $sql2)) {
    mysqli_stmt_bind_param($stmt, "sssssssss", $klantId, $kamerId, $kortingscode, $ontbijt, $aantalpersonen, $aantalpersonen, $vertrek, $extra, $totaalprijs);
    
    if(mysqli_stmt_execute($stmt)) {
        
    } else {
        die("Could not execute #2");
    }

  
} else {
    die("Could not prepare #2");
}
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