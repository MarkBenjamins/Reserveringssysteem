<?php
$stylesheet = "res-home";
include('include/header.php');
?>


<!--Start Kamer Keuze Menu-->
  <center><h1>Reservering</h1></center>
  <div>
    <div id="res-home"><center>
		<form class="dd-mm-jjjj">
			<div>
				Aankomst: 
			</div>
			<div class="margin">
				<input type="date" name="Aankomst"class="btn btn-outline-danger">
			</div>
			<div>
				Vertrek: 
			</div>
			<div class="margin">
				<input type="date" name="Aankomst"class="btn btn-outline-danger">
			</div>
			<div class="kamer">
				<div>
					Kamerkeuze: 
				</div>			
				<select name="kamerkeuze" class="btn btn-outline-danger">
					<option value="Eenpersoonskamer">Eenpersoonskamer</option>
					<option value="Tweepersoonskamer">Tweepersoonskamer</option>
					<option value="Vierpersoonskamer">Vierpersoonskamer</option>
				</select>
			</div>
				<div>
				<button type="button" class="btn btn-outline-danger">Zoek</button>
				</div>
		</form>
	</div></center>
<!--End Kamer Keuze Menu-->



<?php
include('include/footer.php');
?>