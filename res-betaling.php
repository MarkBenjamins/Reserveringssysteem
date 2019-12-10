<?php 
$stylesheet = "betalen";
include "include/header.php"; 
?>

<div class="container-fluid">
    <div class="row">
        <div class="col-3">
        </div>
        <div class="col-6">
            <form method="POST" action="res-bevestig.php">
                <h1>Betaling</h1>
                <p>selecteer uw bank</p>
                    <select name="bank" class="btn btn-outline-danger">
                        <option value="ING">ING</option>
                        <option value="Rabobank">Rabobank</option>
                        <option value="ABNamro">abn amro</option>
                    </select>
                <input type="submit" name="bank" value="betaal">
            </form>
        </div>
        <div class="col-3">
        </div>
    </div>
</div>

<?php include "include/footer.php"; ?></div>