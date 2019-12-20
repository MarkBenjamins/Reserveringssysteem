<?php
$stylesheet = "res-home";
include('include/header.php');
?>
	<!--Door Mark Benjamins-->
<!--Start Kamer Keuze Menu-->
    <center><h1>Reservering</h1></center>
		<form id="res-home" action="res-home-validation.php" method="POST"><center>
				Aankomst: 
			<div>	<!-- Datum keuze menu -->
				<input required type="date" min="<?php echo date("Y-m-d"); ?>" name="aankomst" class="btn mark-btn">
			</div>
				Vertrek: 
			<div>	<!-- Datum keuze menu -->
				<input required type="date" name="vertrek" class="btn mark-btn">
			</div>
				Kamerkeuze: 
			<div>	<!-- Kamer keuze menu -->			
				<select name="kamerkeuze" class="btn mark-btn">
					<option value="1">Eenpersoonskamer</option>
					<option value="2">Tweepersoonskamer</option>
					<option value="3">Vierpersoonskamer</option>
				</select> 
			</div>
			<div>	<!-- Zoek knop -->
				<input required type="submit" class="btn btn-outline-danger" name="submit" value="Zoek">
			</div>
		</form></center>
<!--End Kamer Keuze Menu-->


<?php

include('include/footer.php');
?>