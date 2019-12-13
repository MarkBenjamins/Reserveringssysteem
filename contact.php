<?php
$stylesheet = "res-home";
include('include/header.php');
?>
	<!--Door Mark Benjamins-->
<!--Start Contact pagina-->
	<center><h1>Contact</h1></center>
		<form id="res-home" action="#" method="POST"><center>
				*Naam:	<!--Gebruiker-->
			<div class="formulier"> 
				<input type="text" name="naam" Placeholder="Naam"> 
			</div>
				*E-mail:	<!--Email-->
			<div class="formulier"> 
				<input type="text" name="email" Placeholder="E-mail" >
			</div>
				Mobiel number:	<!--Tel-->
			<div class="formulier"> 
				<input type="text" name="mobielnummer" Placeholder="Mobiel number">
			</div>
				*Bericht:	<!--Bericht-->
			<div class="formulier">		
				<textarea name="textarea" placeholder="Type hier een bericht."></textarea>
			</div>
			<div> <!--Verzend-->
				<a href="#"><input type="submit" name="Verzend"	value="Verzend"></a>
			</div>
		</form></center>
<!--End Contact pagina-->
<?php
include('include/footer.php');
?>