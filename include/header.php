<?php
session_start();
if(isset($_SESSION["gebruiker"])) {

	echo "<p style='margin: 0 auto; background-color: white; color: black; text-align: center;'>
	U BENT INGELOGD ALS : ".$_SESSION['gebruiker']['gebruikersnaam']."</p>";
}
?>
<!DOCTYPE html>
<html lang="nl">

<head>
	<title>Landgoed Sollestijn</title>
	<link href="stylesheets/bootstrap.css" type="text/css" rel="stylesheet">
	<link href="stylesheets/style.css" type="text/css" rel="stylesheet">
	<link rel="icon" type="image/x-icon" href="img/SollestijnLogo.ico"/> <!-- Voor het plaatsen van de logo in het tablad-->
	<?php
	echo "<link href='stylesheets/" . $stylesheet . ".css' type='text/css' rel='stylesheet'>";
	?>
	<meta name="description" content="Landgoed Sollestijn">
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="author" content="Twan Bosma, Mark Benjamins">
</head>

<body>
	<div class="container-fluid">
		<div class="row">
			<div id="main" class="col-lg-8 col-12">
				<div id="header" class="row">
					<div id="logo" class="col-3">
						<a href="index.php"><img src="img/logo.png" alt="logo"></a>
					</div>
					<div id="span" class="col-9">
						<div class="row">
							<div id="geel" class="h1">
								Landgoed
							</div>
							<div class="h1">
								&nbspSollestijn    <!--&nbsp is een spatie-->
							</div>	
							<div id="nav" class="col-12">
								<nav class="navbar-expand-lg">
									<ul class="nav nav-pills nav-justified">
										<li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
										<li class="nav-item"><a class="nav-link" href="res-home.php">Reserveren</a></li>
										<li class="nav-item"><a class="nav-link" href="gallery.php">Gallerij</a></li>
										<li class="nav-item"><a class="nav-link" href="contact.php">Contact</a></li>
									</ul>
								</nav>
							</div>
						</div>
					</div>
				</div>
				<div id="content">
					<!-- Dit is onze MAIN CONTENT !! -->