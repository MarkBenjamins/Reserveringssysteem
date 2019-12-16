<?php 
$stylesheet = "betalen";
include "include/header.php"; 
?>

<div class="container-fluid">
    <div class="row">
        <div class="col-3">
        </div>
        <div class="col-6">
            <center>
                <form method="POST" action="res-bevestig.php">
                    <h1>Betaling</h1>
                    <p>selecteer uw bank</p>
                    <select name="methode" class="btn btn-outline-danger">
                        <option value="paypal">PayPal</option>
                        <option value="iDeal">iDeal</option>
                        <option value="creditcard">Creditcard</option>
                    </select>
                    <input type="submit" name="methode" value="betaal">
                </form>
            </center>
        </div>
        <div class="col-3">
        </div>
    </div>
</div>

<?php include "include/footer.php"; ?>