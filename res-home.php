<?php
$stylesheet = "res-home";
include('include/header.php');
?>
	<!--Door Mark Benjamins-->
<!--Start Kamer Keuze Menu-->
  <center><h1>Reservering</h1></center>
		<form id="res-home" action="inlog.php" method="POST"><center>
				Aankomst: 
			<div>	<!-- Datum keuze menu -->
				<input type="date" name="Aankomst" class="btn btn-outline-danger">
			</div>
				Vertrek: 
			<div>	<!-- Datum keuze menu -->
				<input type="date" name="Aankomst" class="btn btn-outline-danger">
			</div>
				Kamerkeuze: 
			<div>	<!-- Kamer keuze menu -->			
				<select name="kamerkeuze" class="btn btn-outline-danger">
					<option value="Eenpersoonskamer">Eenpersoonskamer</option>
					<option value="Tweepersoonskamer">Tweepersoonskamer</option>
					<option value="Vierpersoonskamer">Vierpersoonskamer</option>
				</select> 
			</div>
			<div>	<!-- Zoek knop -->
				<input type="submit" class="btn btn-outline-danger" value="Zoek">
			</div>
		</form></center>
<!--End Kamer Keuze Menu-->
<?php
include('include/footer.php');
?>