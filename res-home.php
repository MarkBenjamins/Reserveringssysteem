<?php
$stylesheet = "res-home";
include('include/header.php');
?>
<!--Door Mark Benjamins-->
<!--Start Kamer Keuze Menu-->
<center>
    <h1>Reservering</h1>
    <form id="res-home" action="res-home-validation.php" method="POST">

        <label for="Aankomst">Aankomst:</label>
        <div>	<!-- Datum keuze menu -->
            <input required type="date" min="<?php echo date("Y-m-d"); ?>" name="aankomst" class="btn mark-btn">
        </div>

        <label for="Vertrek">Vertrek:</label>
        <div>	<!-- Datum keuze menu -->
            <input required type="date" min="<?php echo date("Y-m-d"); ?>" name="vertrek" class="btn mark-btn">
        </div>

        <label for="Kamerkeuze">Kamerkeuze:</label>
        <div>	<!-- Kamer keuze menu -->			
            <select required name="kamerkeuze" class="btn mark-btn">
                <option value="1">Eenpersoonskamer</option>
                <option value="2">Tweepersoonskamer</option>
                <option value="3">Vierpersoonskamer</option>
            </select> 
        </div>

        <div>	<!-- Zoek knop -->
            <input required type="submit" class="btn mark-btn" name="submit" value="Zoek">
        </div>
    </form>
</center>
<!--End Kamer Keuze Menu-->
<?php
include('include/footer.php');
?>
