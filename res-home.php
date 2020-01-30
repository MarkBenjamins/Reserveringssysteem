<!--Door Mark Benjamins-->
<?php
$stylesheet = "res-home";
include('include/header.php');
include('include/functions.php'); // error melding functie

if (isset($_SESSION["gegevens"])) {
    unset($_SESSION["gegevens"]);
}
?>
<!--Start Kamer Keuze Menu -->
<center>
    <h1>Reservering</h1>
    <form id="res-home" action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="POST">

        <?php
        // php door Wesley, Mark en Storm

        viewMessage();

        if (isset($_POST["submit"])) {

            if (empty($_POST["aankomst"]) || empty($_POST["vertrek"]) || empty($_POST["kamerkeuze"])) {
                sendMessage("Voer a.u.b. alle velden in.", $_SERVER["PHP_SELF"]);
            } else {
                $aankomst = $_POST["aankomst"];
                $vertrek = $_POST["vertrek"];
                $kamerkeuze = $_POST["kamerkeuze"];

                //Check if aankomst en vertrek is een valide datum.
                if (strtotime($aankomst) != false && strtotime($vertrek) != false) {
                    //Valide datums
                    $vandaag = date("Y-m-d"); // huidige datum

                    $splitAankomst = explode("-", $aankomst);
                    $splitVertrek = explode("-", $vertrek);

                    $aankomstJaar = $splitAankomst[0];
                    $aankomstMaand = $splitAankomst[1];
                    $aankomstDag = $splitAankomst[2];

                    $vertrekJaar = $splitVertrek[0];
                    $vertrekMaand = $splitVertrek[1];
                    $vertrekDag = $splitVertrek[2];
                } // vaideert of aankomst datum later is dan vandaag
                if ($aankomst < $vandaag) {
                    sendMessage("Je mag alleen vandaag of later aankomen.", $_SERVER["PHP_SELF"]);
                    //}// valideert of de invoer is zoals het zou moeten.
                    //if (!preg_match("/^([0-9] -)*$/", $aankomst) && (!preg_match("/^([0-9] -)*$/", $vertrek))){
                    //echo "error23";
                }
                if (!preg_match('/^[2]{1}[0-9]{3}/', $aankomstJaar) or (!preg_match('/^[2]{1}[0-9]{3}/', $vertrekJaar))) {
                    sendMessage("De aankoms of vertrekdatum is niet toegestaan.", $_SERVER["PHP_SELF"]);
                }
                // valideert of geen schrikkeldatum is en of het dan wel een valide datum is

                if (($aankomstDag || $vertrekDag == 29) && ($aankomstMaand == 02 || $vertrekMaand == 02) && ($aankomstMaand == 2 || $vertrekMaand == 2) && ($aankomstJaar || $vertrekJaar % 4 == 0)) { // als extra had ook if jaar deelbaar door 400 && deelbaar door 100 error // i.v.m. het jaar 2100 
                    if ($aankomstJaar % 100 == 0 || $vertrekJaar % 100 == 0) {
                        if ($aankomstJaar % 400 == 0 || $vertrekJaar % 400 == 0) {
                            //een schrikkeljaar
                        } else {
                            sendMessage("Heey Hackerman dat mag niet, het is geen schrikkeljaar.", $_SERVER["PHP_SELF"]);
                            die();
                        }
                    } else {
                        //een schrikkeljaar
                    }
                }
                // valideer of je niet vertrekt in het verleden
                if ($vertrek < $vandaag) {
                    sendMessage("Je kunt niet in het verleden vertrekken.", $_SERVER["PHP_SELF"]);
                } else { // valideert of je niet vertrekt voordat je aankomt
                    if ($vertrek < $aankomst) {
                        sendMessage("Je kunt niet vertrekken voordat je aangekomen bent!", $_SERVER["PHP_SELF"]);
                    } else { // valideert of je niet vertrekt en aankomt op dezelfde dag
                        if ($vertrek === $aankomst) {
                            sendMessage("Je kunt niet aankomen en vertrekken op dezelfde dag.", $_SERVER["PHP_SELF"]);
                        } else { //valideer kamerkeuze
                            if ($kamerkeuze == "Eenpersoonskamer" || $kamerkeuze == "Tweepersoonskamer" || $kamerkeuze == "Vierpersoonskamer") {
                                // als bovenstaande validatie is gelukt gaat de code verder, zo niet (else)foutmelding
                                //test//sendMessage("Kamer keuze niet herkent, probeer het nog is.", $_SERVER["PHP_SELF"]); 

                                //Hoeveel dagen de klant gereserveerd heeft
                                $datediff = strtotime($vertrek) - strtotime($aankomst);
                                //dag calculator
                                $dagen = round($datediff / (60 * 60 * 24));

                                /*
                                 * Als de gebruiker een twee persoons kamer wil, ook de 4 persoons kamer laten zien
                                 * Als de gebruiker een eenpersoons kamer wil, alle kamers laten zien
                                 * Als de gebruiker een 4 persoons kamer wil, alleen 4 persoons laten zien.
                                 * 
                                 * Vanaf hier word een nummer opgestuurd bijvoorbeeld $_SESSION["kamerkeuze"]
                                 * Dit kun je opvangen doormiddel van de session te gebruiken in de pagina
                                 * Vanaf hier haal je de mysql data op
                            */

                                $_SESSION["res-home"]["kamerkeuze"] = $kamerkeuze;
                                $_SESSION["res-home"]["aankomst"] = $aankomst;
                                $_SESSION["res-home"]["vertrek"] = $vertrek;
                                //Doorsturen naar de kamersoverzicht d.m.v. kamerkeuze
                                header("Location: res-kameroverzicht.php");
                            } else { // Als je een ander input hebt dan een geldige kamer, deze error
                                sendMessage("Kamer keuze is niet valid, probeer het nog is.", $_SERVER["PHP_SELF"]);
                            }
                        }
                    }
                }
            }
        } // deze melding mag NIET te zien zijn voor een gebruiker
        //Invalide datum
        //echo "<p>Datum is invalid, probeer het nog een keer of kies een geldige datum.<br></p>
        ?>
        <label for="Aankomst">Aankomst:</label>
        <div>
            <!-- Aankomst datum keuze menu -->
            <input type="date" min="<?php echo date("Y-m-d"); //huidige datum //nu kun je niet aankomen in het verleden 
                                    ?>" name="aankomst" id='paddingmb'  class="btn mark-btn" placeholder="<?php echo date("d-m-Y"); ?>">
        </div>
        <label for="Vertrek">Vertrek:</label>
        <div>
            <!-- Vertrek datum keuze menu -->
            <input type="date" min="<?php echo date("Y-m-d"); //huidige datum //nu kun je niet vertrekken in het verleden 
                                    ?>" name="vertrek" id='paddingmb'  class="btn mark-btn">
        </div>
        <label for="Kamerkeuze">Kamerkeuze:</label>
        <div>
            <!-- Kamer keuze menu -->
            <select name="kamerkeuze" id='paddingmb' class="btn mark-btn">
                <option value="Eenpersoonskamer">Eenpersoonskamer</option>
                <option value="Tweepersoonskamer">Tweepersoonskamer</option>
                <option value="Vierpersoonskamer">Vierpersoonskamer</option>
            </select>
        </div>
        <div>
            <!-- Zoek knop -->
            <input type="submit" class="btn mark-btn" name="submit" value="Zoek">
        </div>
    </form>
</center>
<!--End Kamer Keuze Menu-->

<?php
include('include/footer.php');
?>