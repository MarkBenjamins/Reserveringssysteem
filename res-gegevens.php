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
                        <form action="<?php echo $_SERVER['res-factuur.php']; ?>" method="POST">
                            <label for="fname">*Voornaam:</label> <!-- add by Mark-->				
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
                                <input required class="formulier" type="tel" placeholder=" Uw telefoonnummer" name="telnmr">
                            </div>
                            <label for="adres">*Adres:</label>
                            <div> <!---->
                                <input required class="formulier" type="text" placeholder=" Uw woonplaats" name="adres">
                            </div>
                            <div>
                                <input required class="formulier" type="text" placeholder=" Uw straatnaam" name="adres">
                                <input required class="formulier" type="number" placeholder=" Uw huisnummer" name="adres">
                            </div>
                            <div>
                                <input required class="formulier" type="text" placeholder=" Uw postcode" name="adres">
                            </div>
                            <label for="gdate">*Geboortedatum:</label>				
                            <div> <!--geboortedatum / php maakt het onmogelijk om in de toekomst geboren te zijn.-->	
                                <input required class="formulier" max="<?php echo date("Y-m-d"); ?>" type="date" name="gdate"><br><br>
                            </div>
                            <label for="leeftijd">Leeftijd van uw medereizigers:</label>
                            <div>
                                <input class="formulier" type="number" placeholder=" Medereiziger 1" name="leeftijd">
                            </div>
                            <div>
                                <input class="formulier" type="number" placeholder=" Medereiziger 2" name="leeftijd">
                            </div>
                            <div>
                                <input class="formulier" type="number" placeholder=" Medereiziger 3" name="leeftijd">
                            </div>
                            <label for="extra">Extra opties:</label>
                            <div>
                                <input class="formulier" type="checkbox" name="Ontbijt" checked="checked">Ontbijt
                            </div>
                            <div>
                                <input class="formulier" type="checkbox" name="Lunch">Lunch
                            </div>
                            <div>
                                <input class="formulier" type="checkbox" name="Diner">Diner
                            </div>
                            <div>
                                <input class="formulier" type="checkbox" name="E-fiets">Elektrische fiets
                            </div>
                            <div>
                                <input class="formulier" type="checkbox" name="E-paal">Elektrische laadpaal
                            </div>
                            <label for="korting">Kortingscode:</label>
                            <div>
                                <input class="formulier" type="text" placeholder=" bijv. A12345" name="korting">
                            </div>
                            <label for="opmerking">Opmerkingen:</label>
                            <div>
                                <textarea class="formulier" rows="5" cols="20" placeholder="Opmerkingen"></textarea>
                            </div>
                            <div> <!--Verzend-->	
                                <input required class="btn mark-btn" type="submit" name="submit" value="Verzend">
                            </div>
                            <label for="sterretje">* is verplicht in the vullen</label>
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