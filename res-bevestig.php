<?php 
$stylesheet = "betalen";
include "include/header.php"; 
?>

<div class="container-fluid">
    <div class="row">
        <div class="col-4">
        </div>
        <div class="col-4">
			<center><h1>Betaald</h1>	<!--eddit by Mark Benjamins-->
            <?php //Controle en melding van de betaalmethode
                if (isset($_POST["methodesubmit"])){
                    if ($_POST["methode"] == "paypal"){
                        echo "<p class='tekstkleur'>Bedankt voor het betalen met PayPal.</p>";
                    }
                    elseif ($_POST["methode"] == "iDeal"){
                        echo "<p class='tekstkleur'>Bedankt voor het betalen met IDeal.</p>";
                    }
                    elseif ($_POST["methode"] == "creditcard"){
                        echo "<p class='tekstkleur'>Bedankt voor het betalen met creditcard.</p>";
                    }
                    else {
                        echo "Error onbekende betaalmethode.";
                    }
                }
                else {
                    header("Location: res-betaling.php");
                }
            ?>
			<form method="POST" action="index.php">
                <input type="submit" class="btn btn-outline-danger" value="print bevestiging" name="methodesubmit">
            </form></center>		
        </div>
        <div class="col-4">
        </div>
    </div>
</div>

<?php include "include/footer.php"; ?></div>