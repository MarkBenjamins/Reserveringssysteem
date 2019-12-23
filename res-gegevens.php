<?php
$stylesheet = "res-home";
include('include/header.php');
?>
<div class="container-fluid">
    <div class="row login">
        <div class="col-12 formbox">
            <div class="row title">
            </div>
            <div class="row form">
                <div class="col-2">
                </div>
                <div class="col-8">
                    <h1>Persoonsgegevens</h1>
                    <center>
                        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                            <label for="fname">*Voornaam:</label>	 <!-- add by Mark-->				
                            <div> <!--Voornaam-->
                                <input required class="formulier" type="text" placeholder=" Uw voornaam" name="fname">
                            </div>

                            <label for="lname">*Achternaam:</label>					
                            <div> <!--Achternaam-->
                                <input required class="formulier" type="text" placeholder=" Uw achternaam" name="lname">
                            </div>

                            <label for="email">*E-mailadres:</label>					
                            <div> <!--Email-->
                                <input required class="formulier" type="email" placeholder=" Uw e-mailadres" name="email">
                            </div>

                            <label for="telnmr">*Telefoonnummer:</label>	
                            <div> <!--Tel-->
                                <input required class="formulier" type="number" placeholder=" Uw telefoonnummer" name="telnmr">
                            </div>
                            <label for="gdate">*Geboortedatum:</label>				
                            <div> <!--geboortedatum / php maakt het onmogelijk om in de toekomst geboren te zijn.-->	
                                <input required class="formulier" max="<?php echo date("Y-m-d"); ?>" type="date" name="gdate"><br><br>
                            </div>
                            <div> <!--Verzend-->	
                                <input required class="btn mark-btn" type="submit" name="submit" value="Verzend">
                            </div>
                        </form>
                    </center>
                </div>
                <div class="col-2">
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include('include/footer.php');
?>