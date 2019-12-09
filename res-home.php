<?php
$stylesheet = "res-home";
include('include/header.php');
?>
	<!--Door Mark Benjamins-->
<!--Start Kamer Keuze Menu-->
  <center><h1>Reservering</h1></center>
		<form id="res-home"><center>
			<div>
				Aankomst: 
			</div>
			<div>	<!-- Datum keuze menu -->
				<input type="date" name="Aankomst"class="btn btn-outline-danger">
			</div>
			<div>
				Vertrek: 
			</div>
			<div>	<!-- Datum keuze menu -->
				<input type="date" name="Aankomst"class="btn btn-outline-danger">
			</div>
			<div>
				Kamerkeuze: 
			</div>	
			<div>	<!-- Kamer keuze menu -->			
				<select name="kamerkeuze" class="btn btn-outline-danger">
					<option value="Eenpersoonskamer">Eenpersoonskamer</option>
					<option value="Tweepersoonskamer">Tweepersoonskamer</option>
					<option value="Vierpersoonskamer">Vierpersoonskamer</option>
				</select> 
			</div>
			<div>	<!-- Zoek knop -->
				<button type="button" class="btn btn-outline-danger">Zoek</button>
			</div>
		</form></center>
<!--End Kamer Keuze Menu-->
<?php
include('include/footer.php');
?>