<?php 
$stylesheet = "betalen";
include "include/header.php"; 
//hier wordt de header code ingevoegd op de pagina
?>

<div class="container-fluid">
    <div class="row">
        <div class="col-3">
        </div>
        <div class="col-6">
            <center>
                <form method="POST" action="res-bevestig.php">
                    <h1>Betaling</h1>
                    <p>selecteer uw betaalmethode</p>
                   <input type='radio' value='paypal' name='methode' checked>PayPal<br>
                    <input type='radio' value='iDeal' name='methode'>iDeal<br>
                    <input type='radio' value='creditcard' name='methode'>creditcard<br>
                    <input type="submit" name="methodesubmit" value="betaal">
                </form>
            </center>
        </div>
        <div class="col-3">
        </div>
    </div>
</div>

<?php include "include/footer.php"; 
//hier wordt de footer code ingevoegd op de pagina
?>