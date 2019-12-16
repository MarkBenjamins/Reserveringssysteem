<?php 
$stylesheet = "betalen";
include "include/header.php"; 
?>

<div class="container-fluid">
    <div class="row">
        <div class="col-3">
        </div>
        <div class="col-6">
            <?php
                if (isset($_POST["methode"])){
                    if ($_POST["btn btn-outline-danger"] = "paypal"){
                        echo "Bedankt voor het betalen met PayPal.";
                    }
                    elseif ($_POST["btn btn-outline-danger"] = "iDeal"){
                        echo "Bedankt voor het betalen met iDeal.";
                    }
                    elseif ($_POST["btn btn-outline-danger"] = "creditcard"){
                        echo "Bedankt voor het betalen met creditcard.";
                    }
                }
                else {
                    header("Location: res-betaling.php");
                }
            ?>
        </div>
        <div class="col-3">
        </div>
    </div>
</div>

<?php include "include/footer.php"; ?></div>