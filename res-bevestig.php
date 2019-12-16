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
                if (isset($_POST["bank"])){
                    echo " yes" ;
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