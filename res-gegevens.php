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
                <div class="col-12" id='melding'>
                    <h1>Persoonsgegevens</h1>
                    <center>
                        <?php
                        //Door Mark Benjamins
                        if (isset($_POST['submit'])) {
							if (empty($fname) or (empty($gdate) or ( empty($lname) or ( empty($email) or ( empty($tel) or ( empty($post) or ( empty($hnummer)) { 
                                echo "<p>Niet alle verplichte velden zijn ingevuld.<br></p>";
                                // Iets niet ingevuld error	
							}
							elseif{
							//alle inpute naar var
                            $fname = $_POST['fname'];
                            $lname = $_POST["lname"];
                            $email = $_POST["email"];
                            $tel = $_POST["tel"];
                            $post = $_POST["post"];
                            $hnummer = $_POST["hnummer"];
                            $gdate = $_POST["gdate"];
//                           $ltijd = $_POST["ltijd"];
							//$lunch = $_POST["lunch"];

//                            $efiets = $_POST["efiets"];
//                            $epaal = $_POST["epaal"];
//                            $korting = $_POST["korting"];
//                            $opmerk = $_POST["opmerk"];

                            //Html tags filter
							$fname = filter_var($fname, FILTER_SANITIZE_STRING);
                            $lname = filter_var($lname, FILTER_SANITIZE_STRING);
                            $email = filter_var($email, FILTER_SANITIZE_STRING);
                            $tel = filter_var($tel, FILTER_SANITIZE_STRING);
                            $post = filter_var($post, FILTER_SANITIZE_STRING);
                            $hnummer = filter_var($hnummer, FILTER_SANITIZE_STRING);
                            $gdate = filter_var($gdate, FILTER_SANITIZE_STRING);
                            $ltijd=filter_var($ltijd, FILTER_SANITIZE_STRING);
                            $eten=filter_var($_POST['eten'], FILTER_SANITIZE_STRING);
                            //$efiets =filter_var($efiets, FILTER_SANITIZE_STRING);
                            //$epaal =filter_var($epaal, FILTER_SANITIZE_STRING);
                            //$korting =filter_var($korting, FILTER_SANITIZE_STRING);
                            //$opmerk =filter_var($opmerk, FILTER_SANITIZE_STRING);
							
							// postcode en huisnummer omzetten naar een bruikbare waarde (spaties weg)
							$post = str_replace(' ', '', $post);
                            $hnummer = str_replace(' ', '', $hnummer);
                            $post = strtoupper($post);
						
							} else if (!preg_match('/^[a-z]*$/i', $fname)) { 
									/*(!preg_match('/^[a-z]*$/i = filter af het een letter is (i)= cas-insensitive
									* ^ = begin van de string
									* [a-z] = een letter
									* * = dat het er minstens 0 of meer x in voorkomt
									* $ = eide van de sting
									*/ 
									echo "<p>Je voornaam is niet ingevuld of bestaan niet compleet uit letters.<br></p>";
									// Voornaam mag alleen letters en hoofdletter bevatten
									// Mag niet bestaan uit getallen en speciale tekens
									
							} else if (!preg_match('/^[a-z]*$/i', $lname)) {
									/*(!preg_match('/^[a-z]*$/i = filter af het een letter is 
									* ^ = begin van de string
									* [a-z] = een letter
									* * = dat het er minstens 0 of meer x in voorkomt
									* $ = eide van de sting
									* i = case-insensitive
									*/ 
									echo "<p>Je achternaam is niet ingevuld of bestaan niet compleet uit letters.<br></p>";
									// Achternaam mag alleen letters en hoofdletter bevatten
									// Mag niet bestaan uit getallen en speciale tekens						
								
                            } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                                // filter of het een e-mail is
                                echo "<p>Het opgegeven mailadres is niet ingevuld of niet toegestaan.<br></p>";
                                // Als mailadres niet goed is echo foutmelding 
								
							} else if (!preg_match('/^[0-9]{3}+ -/' , $tel)){
								// filter of het een nummer tussen 0 en 9 is
								// {3} = minstens 3 x in voorkomen // een tel heeft minstens 3 nummers
								echo "<p>Het opgegeven telefoonnummer is niet toegestaan.<br></p>";
							
                            } else if (!preg_match("/^[1-9]{1}[0-9]{3}[A-Z]{2}$/i", $post)) {
								// filter of het een postcode is
									/*(!preg_match('/^[1-9]{1}[0-9]{3}[A-Z]{2}$/"
									* ^ = begin van de string
									* [1-9]{1} = eerst letter is hoger dan 0 
									* [0-9]{3} = de 3 er achter zijn tussen 0 en 9
									* [A-Z]{2} = 2 letters er achter
									* $ = eide van de sting
									* i = case-insensitive
									*/ 
							}else if ($gdate >= date("Y-m-d")) {
								// filter of de gekozen geboortedatum niet in de toekomst is
								echo "<p> De gekozen geboortedatum is niet mogelijk.<br></p>";
							}
		//werkt niet					//else if (!preg_match("/^[0-9]*$/", $ltijd)){
								//echo "<p> Een leeftijd mag alleen betaan uit getallen<br></p>"; 
							//}
							
							}
							
						else {
                                echo "Alles werkt"; //test
                                //go to db 
                                //header("location: res-betaling.php"); // naar volgende pagina
                            }
							
							
							//var_dump ($eten);
							//foreach ($eten as $food){
							//		echo $food;							
                            //}
							// mederijziges = nummeric bespreek met docent of dit misschien niet hoeft?
                            // tel = if aantal caracter
                            // tel = geen letters
                        
                        ?>

                        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                            <label for="fname">*Voornaam:</label> <!-- add by Mark-->				
                            <div> <!--Voornaam-->
                                <input  class="formulier" type="text" placeholder=" Uw voornaam" name="fname">
                            </div>

                            <label for="lname">*Achternaam:</label>					
                            <div> <!--Achternaam-->
                                <input  class="formulier" type="text" placeholder=" Uw achternaam" name="lname">
                            </div>

                            <label for="email">*E-mailadres:</label>					
                            <div> <!--Email-->
                                <input  class="formulier" type="email" placeholder=" Uw e-mailadres" name="email">
                            </div>

                            <label for="telnmr">*Telefoonnummer:</label>	
                            <div> <!--Tel-->
                                <input  class="formulier" type="tel" placeholder=" Uw telefoonnummer" name="tel">
                            </div>

                            <label for="adres">*Postcode:</label>
                            <div> <!--Postcode-->
                                <input  class="formulier" type="text" placeholder=" Uw postcode" name="post">
                            </div>

                            <label for="adres">*Huisnummer:</label>
                            <div> <!--Huisnummer-->
                                <input  class="formulier" type="text" placeholder=" Uw huisnummer" name="hnummer">
                            </div>
                            <label for="gdate">*Geboortedatum:</label>				
                            <div> <!--Geboortedatum-->	
                                <input  class="formulier" max="<?php echo date("Y-m-d"); //Onmogelijk om in de toekomst geboren te zijn.   ?>" type="date" name="gdate"><br><br>
                            </div>
                            <label for="leeftijd">Optioneel: leeftijd van uw medereizigers:</label>
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
                                <input class="formulier" type="checkbox" name="eten[]" value="ontbijt">
								<label>Ontbijt</label>
                            </div>
                            <div>
                                <input class="formulier" type="checkbox" name="eten[]" value="lunch">
								<label>Lunch</label>
                            </div>
                            <div>
                                <input class="formulier" type="checkbox" name="eten[]" value="diner">
								<label>Diner</label>
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
                            <!--<a href="res-gegevens.php" id="reset-padding" class="btn mark-btn">Reset</a>--> <!--Toevoeging knop voor reset (gebruisvriendelijkheid)-->
                        </form>
                    </center>
                </div>

            </div>
        </div>
    </div>
</div>

<?php
include('include/footer.php');
?>









