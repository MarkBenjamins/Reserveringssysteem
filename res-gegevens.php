<?php
$stylesheet = "res-home";
include('include/header.php');
include('include/functions.php'); // error melding functie
var_dump($_SESSION['res-home']);

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
                        viewMessage();//error melding basis 

                        //Zelf paginas
                        if (isset($_POST['submit'])) {
                            if (empty($_POST['fname']) || empty($_POST['lname']) || empty($_POST['gdate']) || empty($_POST['email']) || empty($_POST['tel']) || empty($_POST['postc']) || empty($_POST['hnummer'])) {
                                sendMessage("Niet alle verplichte velden zijn ingevuld.", $_SERVER["PHP_SELF"]);
                                // Iets niet ingevuld error
                            } else {
                                //alle inpute naar var en filter speciale karakters
                                $fname = htmlspecialchars($_POST['fname']);
                                $lname = htmlspecialchars($_POST["lname"]);
                                $email = htmlspecialchars($_POST["email"]);
                                $tel = htmlspecialchars($_POST["tel"]);
                                $postc = htmlspecialchars($_POST["postc"]);
                                $hnummer = htmlspecialchars($_POST["hnummer"]);
                                $gdate = htmlspecialchars($_POST["gdate"]);

                                if (isset($_POST["ltijd1"])) {
                                    $ltijd1 = $_POST['ltijd1'];
                                } else {
                                    $ltijd1 = "Niet aangegeven";
                                }

                                if (isset($_POST["ltijd2"])) {
                                    $ltijd2 = $_POST['ltijd2'];
                                } else {
                                    $ltijd2 = "Niet aangegeven";
                                }

                                if (isset($_POST["ltijd3"])) {
                                    $ltijd3 = $_POST['ltijd3'];
                                } else {
                                    $ltijd3 = "Niet aangegeven";
                                }

                                if (isset($_POST["ontbijt"])) {
                                    $ontbijt= "Ja";
                                } else {
                                    $ontbijt = "Nee";
                                }

                                if (isset($_POST["lunch"])) {
                                    $lunch= "Ja";
                                } else {
                                    $lunch = "Nee";
                                }

                                if (isset($_POST["diner"])) {
                                    $diner= "Ja";
                                } else {
                                    $diner = "Nee";
                                }

                                if (isset($_POST["efiets"])) {
                                    $efiets = "Ja";
                                } else {
                                    $efiets = "Nee";
                                }

                                if (isset($_POST["epaal"])) {
                                    $epaal = "Ja";
                                } else {
                                    $epaal = "Nee";
                                }

                                $korting = htmlspecialchars($_POST["korting"]);
                                $opmerk = htmlspecialchars($_POST["opmerk"]);

                                // postcode en huisnummer omzetten naar een bruikbare waarde (spaties weg)
                                $postc = str_replace(' ', '', $postc);
                                $hnummer = str_replace(' ', '', $hnummer);
                                $postc = strtoupper($postc);

                                //filter tel
                                $tel = str_replace('-', '', $tel);
                                $tel = str_replace('+', '', $tel);
                                $tel = str_replace(' ', '', $tel);

                                if (!preg_match('/^[a-z]*$/i', $fname)) {
                                    /* (!preg_match('/^[a-z]*$/i = filter af het een letter is (i)= cas-insensitive
                                    * ^ = begin van de string
                                    * [a-z] = een letter
                                    * * = dat het er minstens 0 of meer x in voorkomt
                                    * $ = eide van de sting
                                    */
                                    sendMessage("Je voornaam is niet ingevuld of bestaan niet compleet uit letters.", $_SERVER["PHP_SELF"]);
                                    // Voornaam mag alleen letters en hoofdletter bevatten
                                    // Mag niet bestaan uit getallen en speciale tekens
                                } else if (!preg_match('/^[a-z]*$/i', $lname)) {
                                    /* (!preg_match('/^[a-z]*$/i = filter af het een letter is
                                    * ^ = begin van de string
                                    * [a-z] = een letter
                                    * * = dat het er minstens 0 of meer x in voorkomt
                                    * $ = eide van de sting
                                    * i = case-insensitive
                                    */
                                    sendMessage("Je achternaam is niet ingevuld of bestaan niet compleet uit letters.", $_SERVER["PHP_SELF"]);
                                    // Achternaam mag alleen letters en hoofdletter bevatten
                                    // Mag niet bestaan uit getallen en speciale tekens

                                } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                                    // filter of het een e-mail is
                                    sendMessage('Het opgegeven mailadres is niet ingevuld of niet toegestaan.', $_SERVER["PHP_SELF"]);
                                    // Als mailadres niet goed is echo foutmelding

                                } else if (!preg_match('/^[0-9]{3}/', $tel)) {
                                    // filter of het een nummer tussen 0 en 9 is
                                    // {3} = minstens 3 x in voorkomen // een tel heeft minstens 3 nummers
                                    sendMessage('Het opgegeven telefoonnummer is niet toegestaan.', $_SERVER["PHP_SELF"]);
                                } else if (!preg_match("/^[1-9]{1}[0-9]{3}[A-Z]{2}$/i", $postc)) {
                                    // filter of het een postcode is
                                    /* (!preg_match('/^[1-9]{1}[0-9]{3}[A-Z]{2}$/"
                                 * ^ = begin van de string
                                 * [1-9]{1} = eerst letter is hoger dan 0
                                 * [0-9]{3} = de 3 er achter zijn tussen 0 en 9
                                 * [A-Z]{2} = 2 letters er achter
                                 * $ = eide van de sting
                                 * i = case-insensitive
                                 */
                                } else if ($gdate >= date("Y-m-d") && (!preg_match("/^([0-9])*$/", $gdate))) {
                                    // filter of de gekozen geboortedatum niet in de toekomst is
                                    sendMessage("De gekozen geboortedatum is niet mogelijk.", $_SERVER["PHP_SELF"]);
                                    // filter of het een getal is en kleiner dan 125
                                } else if (isset($_POST['ltijd1']) && (!preg_match("/^([0-9])*$/", $_POST['ltijd1']) && ($_POST['ltijd1'] > 125))) {
                                    sendMessage("Een leeftijd mag alleen betaan uit getallen en mag je mag niet ouder zijn dan 125.", $_SERVER["PHP_SELF"]);
                                } else if (isset($_POST['ltijd2']) && (!preg_match("/^[0-9]*$/", $_POST['ltijd2']) && ($_POST['ltijd2'] > 125))) {
                                    sendMessage("Een leeftijd mag alleen betaan uit getallen en mag je mag niet ouder zijn dan 125.", $_SERVER["PHP_SELF"]);
                                } else if (isset($_POST['ltijd3']) && (!preg_match("/^[0-9]*$/", $_POST['ltijd3']) && ($_POST['ltijd3'] > 125))) {
                                    sendMessage("Een leeftijd mag alleen betaan uit getallen en mag je mag niet ouder zijn dan 125.", $_SERVER["PHP_SELF"]);
                                } else {
                                    /* Wesley */
                                    //var_dump($_SESSION["res-home"]);

                                    $_SESSION["gegevens"]["fname"] = $fname;
                                    $_SESSION["gegevens"]["lname"] = $lname;
                                    $_SESSION["gegevens"]["email"] = $email;
                                    $_SESSION["gegevens"]["tel"] = $tel;
                                    $_SESSION["gegevens"]["postc"] = $postc;
                                    $_SESSION["gegevens"]["hnummer"] = $hnummer;
                                    $_SESSION["gegevens"]["gdate"] = $gdate;
                                    $_SESSION["gegevens"]["ltijd1"] = $ltijd1;
                                    $_SESSION["gegevens"]["ltijd2"] = $ltijd2;
                                    $_SESSION["gegevens"]["ltijd3"] = $ltijd3;
                                    $_SESSION["gegevens"]["ontbijt"] = $ontbijt;
                                    $_SESSION["gegevens"]["lunch"] = $lunch;
                                    $_SESSION["gegevens"]["diner"] = $diner;
                                    $_SESSION["gegevens"]["efiets"] = $efiets;
                                    $_SESSION["gegevens"]["epaal"] = $epaal;
                                    $_SESSION["gegevens"]["korting"] = $korting;
                                    $_SESSION["gegevens"]["opmerk"] = $opmerk;

                                    header("Location: res-betaling.php");
                                    /* End wesley */
                                }
                            }
                        }
                        ?>
                        <!-- add by Mark-->
                        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                            <label for="fname">*Voornaam:</label>
                            <div>
                                <!--Voornaam-->
                                <input class="formulier" type="text" placeholder=" Uw voornaam" name="fname">
                            </div>
                            <label for="lname">*Achternaam:</label>
                            <div>
                                <!--Achternaam-->
                                <input class="formulier" type="text" placeholder=" Uw achternaam" name="lname">
                            </div>
                            <label for="email">*E-mailadres:</label>
                            <div>
                                <!--Email-->
                                <input class="formulier" type="email" placeholder=" Uw e-mailadres" name="email">
                            </div>
                            <label for="telnmr">*Telefoonnummer:</label>
                            <div>
                                <!--Tel-->
                                <input class="formulier" type="tel" placeholder=" Uw telefoonnummer" name="tel">
                            </div>
                            <label for="adres">*Postcode:</label>
                            <div>
                                <!--Postcode-->
                                <input class="formulier" type="text" placeholder=" Uw postcode" name="postc">
                            </div>
                            <label for="adres">*Huisnummer:</label>
                            <div>
                                <!--Huisnummer-->
                                <input class="formulier" type="text" placeholder=" Uw huisnummer" name="hnummer">
                            </div>
                            <label for="gdate">*Geboortedatum:</label>
                            <div>
                                <!--Geboortedatum-->
                                <input class="formulier" max="<?php echo date("Y-m-d"); //Onmogelijk om in de toekomst geboren te zijn.
                                                                ?>" type="date" name="gdate"><br><br>
                            </div>
                            <?php //if kamer is groter dan 1 dan komt er een extra leetijd veld bij

                            
                            if ($_SESSION['res-home']['kamerkeuze'] == "Eenpersoonskamer") {
                                //niks
                            } elseif ($_SESSION['res-home']['kamerkeuze'] == "Tweepersoonskamer") {
                                echo '<label for="leeftijd">Optioneel: leeftijd van uw medereizigers:</label>
                                    <div>
                                        <input class="formulier" type="number" placeholder=" Medereiziger 1" name="ltijd1">
                                    </div>';
                            } elseif ($_SESSION['res-home']['kamerkeuze'] == "Vierpersoonskamer") {
                                
                                echo '<label for="leeftijd">Optioneel: leeftijd van uw medereizigers:</label>
                                    <div>
                                        <input class="formulier" type="number" placeholder=" Medereiziger 1" name="ltijd1">
                                    </div>
                                    <div>
                                        <input class="formulier" type="number" placeholder=" Medereiziger 2" name="ltijd2">
                                    </div>
                                    <div>
                                        <input class="formulier" type="number" placeholder=" Medereiziger 3" name="ltijd3">
                                    </div>';
                            } else {
                                sendMessage("fout met de kamerkeuze.", $_SERVER["PHP_SELF"]);
                            }
                            ?>
                            <label for="extra">Extra opties:</label>
                            <div>
                                <!--Ontbijt-->
                                <input class="formulier" type="checkbox" name="ontbijt" checked>
                                <label>Ontbijt</label>
                            </div>
                            <div>
                                <!--Lunch-->
                                <input class="formulier" type="checkbox" name="lunch">
                                <label>Lunch</label>
                            </div>
                            <div>
                                <!--Diner-->
                                <input class="formulier" type="checkbox" name="diner">
                                <label>Diner</label>
                                <br><br>
                            </div>
                            <label>Extra reserverings opties:</label>
                            <div>
                                <!--Elektrische fiets-->
                                <input class="formulier" type="checkbox" name="efiets">
                                <label>Elektrische fiets</label>
                            </div>
                            <div>
                                <!--Elektrische laadpaal-->
                                <input class="formulier" type="checkbox" name="epaal">
                                <label>Elektrische laadpaal</label>
                                <br><br>
                            </div>
                            <label for="korting">Kortingscode:</label>
                            <div>
                                <!--Kortingscode-->
                                <input class="formulier" type="text" placeholder=" Bijv. A12345" name="korting">
                            </div>
                            <label for="opmerking">Opmerkingen:</label>
                            <div>
                                <!--Opmerkingen-->
                                <textarea class="formulier" rows="5" cols="20" placeholder="Opmerkingen" name="opmerk"></textarea>
                            </div>
                            <div>
                                <!--Verzend-->
                                <input required class="btn mark-btn" type="submit" name="submit" value="Submit">
                            </div>
                            <!--<a href="res-gegevens.php" id="reset-padding" class="btn mark-btn">Reset</a>-->
                            <!--Toevoeging knop voor reset (gebruisvriendelijkheid)-->
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