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
                        <?php
                        //Door Mark Benjamins
                        if (isset($_POST['submit'])) { //alle inpute naar var
                            $fname = $_POST['fname'];
                            $lname = $_POST["lname"];
                            $email = $_POST["email"];
                            $tel = $_POST["tel"];
//                            $post = $_POST["post"];
//                            $hnummer = $_POST["hnummer"];
//                            $gdate = $_POST["gdate"];
//                            $ltijd = $_POST["ltijd"];
//                            $ontbijt = $_POST["ontbijt"];
//                            $lunch = $_POST["lunch"];
//                            $diner = $_POST["diner"];
//                            $efiets = $_POST["efiets"];
//                            $epaal = $_POST["epaal"];
//                            $korting = $_POST["korting"];
//                            $opmerk = $_POST["opmerk"];
            
                            if (empty($fname or $lname or $email or $tel or $post or $hnummer or $gdate)) {
                                echo "Niet alle verplichte velden zijn ingevuld";
                                // Iets niet ingevuld error
                            }
                            if (!preg_match('/[-_ a-zA-Z0-9]/i', $fname or $lname or $tel or $post)) {
                                // E-mail staat er niet bij, die bevat namelijk speciale karakters
                                // preg_match geeft een true or false waarde
                                // Karakters anders dan a-z, A-Z, 0-9, spartie, _ en - zijn niet toegestaan 
                                echo "Het formulier bevat een karakter dat niet is toegestaan.<br>";
                                echo "Alleen Alfabetiese karakters, getallen, spaties, _ en - zijn toegestaan.<br><br>";
                            }
                            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                                echo $email . " is geen valide email adres";
                                // Als mailadres niet goed is echo foutmelding
                            } else {
                                echo "Alles werkt";
                            }
							// mederijziges = nummeric bespreek met docent of dit misschien niet hoeft?
							// tel = if aantal caracter
							// tel = geen letters
                        }
                        ?>
                        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
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
                                <input required class="formulier" type="tel" placeholder=" Uw telefoonnummer" name="tel">
                            </div>

                            <label for="adres">*Postcode:</label>
                            <div> <!--Postcode-->
                                <input required class="formulier" type="text" placeholder=" Uw postcode" name="post">
                            </div>

                            <label for="adres">*Huisnummer:</label>
                            <div> <!--Huisnummer-->
                                <input required class="formulier" type="text" placeholder=" Uw huisnummer" name="hnummer">
                            </div>
                            <label for="gdate">*Geboortedatum:</label>				
                            <div> <!--Geboortedatum-->	
                                <input required class="formulier" max="<?php echo date("Y-m-d"); //Onmogelijk om in de toekomst geboren te zijn.  ?>" type="date" name="gdate"><br><br>
                            </div>
                            <label for="leeftijd">Leeftijd van uw medereizigers:</label>
                            <div>
                                <input class="formulier" type="number" placeholder=" Medereiziger 1" name="ltijd">
                            </div>
                            <div>
                                <input class="formulier" type="number" placeholder=" Medereiziger 2" name="ltijd">
                            </div>
                            <div>
                                <input class="formulier" type="number" placeholder=" Medereiziger 3" name="ltijd">
                            </div>
                            <label for="extra">Extra opties:</label>
                            <div>
                                <input class="formulier" type="checkbox" name="ontbijt" checked="checked"><label> Ontbijt</label>
                            </div>
                            <div>
                                <input class="formulier" type="checkbox" name="lunch"><label>Lunch</label>
                            </div>
                            <div>
                                <input class="formulier" type="checkbox" name="diner"><label>Diner</label>
								<br><br>
                            </div>
							<label for="e-res">Extra reserverings opties:</label>
                            <div>
                                <input class="formulier" type="checkbox" name="efiets"><label>Elektrische fiets</label>
                            </div>
                            <div>
                                <input class="formulier" type="checkbox" name="epaal"><label>Elektrische laadpaal</label>
								<br><br>
                            </div>
                            <label for="korting">Kortingscode:</label>
                            <div>
                                <input class="formulier" type="text" placeholder=" Bijv. A12345" name="korting">
                            </div>
                            <label for="opmerking">Opmerkingen:</label>
                            <div>
                                <textarea class="formulier" rows="5" cols="20" placeholder="Opmerkingen" name="opmerk" ></textarea>
                            </div>
                            <div> <!--Verzend-->	
                                <input required class="btn mark-btn" type="submit" name="submit" value="Submit">
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









