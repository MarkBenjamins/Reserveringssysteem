<?php
$stylesheet = "betalen";
include "include/header.php";
//gemaakt door Ramon en Mark

var_dump($_SESSION["gegevens"]);
?>



<div class="container-fluid">
    <div class="row">
        <div class="col-3">
        </div>
        <div class="col-6">
            <center>
                <form method="POST" action="res-bevestig.php">
                    <h1>Betaling</h1>
                    <p class="tekstkleur">Selecteer uw betaalmethode</p>
                    <p class="tekstkleur">IDeal <input type='radio' value='iDeal' name='methode' checked="checked"></p>
                    <p class="tekstkleur">PayPal <input type='radio' value='paypal' name='methode'></p>
                    <p class="tekstkleur">Credit Card <input type='radio' value='creditcard' name='methode'></p>
                    <input type="submit" class="btn btn-outline-danger" value="Betaal" name="methodesubmit">
                </form>
            </center>
        </div>
        <div class="col-3">
        </div>
    </div>
</div>

<?php include "include/footer.php";
?>