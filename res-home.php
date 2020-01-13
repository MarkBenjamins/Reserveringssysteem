<!--Door Mark Benjamins-->
<?php
$stylesheet = "res-home";
include('include/header.php');
?>
<!--Start Kamer Keuze Menu -->
<center>
    <h1>Reservering</h1>
    <form id="res-home" action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="POST">
	
	<?php // php door Wesley & Mark
if (isset($_POST["submit"])) {
    $aankomst = $_POST["aankomst"];
    $vertrek = $_POST["vertrek"];
    $kamerkeuze = $_POST["kamerkeuze"];

//Check if aankomst en vertrek is een valide datum.
    if (strtotime($aankomst) != false && strtotime($vertrek) != false) {
        //Valide datums
        $vandaag = date("Y-m-d");
		
        $splitAankomst = explode("-", $aankomst);
        $splitVertrek = explode("-", $vertrek);

        $aankomstJaar = $splitAankomst[0];
        $aankomstMaand = $splitAankomst[1];
        $aankomstDag = $splitAankomst[2];

        $vertrekJaar = $splitVertrek[0];
        $vertrekMaand = $splitVertrek[1];
        $vertrekDag = $splitVertrek[2];
	}
        if ($aankomst < $vandaag) { 
            echo "<p>Je mag alleen vandaag of later aankomen.<br></p>";
		}
		if (!preg_match('/^[2]{1}[0-9]{3}/' , $aankomstJaar) or (!preg_match('/^[2]{1}[0-9]{3}/' , $vertrekJaar) or (strlen ($aankomstJaar )> 4) or (strlen ($vertrekJaar )> 4))){
            echo "<p>De aankoms of vertrekdatum is niet toegestaan.<br></p>";
		} else {
            if ($vertrek < $vandaag) {
                echo "<p>Je kunt niet in het verleden vertrekken.<br></p>";
            } else {
                if ($vertrek < $aankomst) {
                    echo "<p>Je kunt niet vertrekken voordat je aangekomen bent!<br></p>";
                } else {
                    if ($vertrek === $aankomst) {
                        echo "<p>Je kunt niet aankomen en vertrekken op dezelfde dag.<br><p>";
                    } else {
                        if($kamerkeuze == "1" || $kamerkeuze == "2"|| $kamerkeuze == "3") { //validatie of kamerkeuze een keuze is
                            //Eind vd validation, vanaf hier kunnen we andere dingen doen.
                           echo "<p>Kamer keuze niet herkent, probeer het nog is.<br></p>"; 
                            $datediff = strtotime($vertrek) - strtotime($aankomst);
                            //Hoeveel dagen de klant gereserveerd heeft

                            $dagen = round($datediff / (60 * 60 * 24));
                            //Kamer keuze en datums kloppen vanaf hier.
							header("location: res-kameroverzicht.php");
                            //Doorsturen naar de kamers dmv kamerkeuze
                            
                            /* 
                            * Wat te doen voor kamer pagina ? 
                            * Aan de hand van een nummer ( 1,2 of 3) kamers ophalen
                            * Als de gebruiker een twee persoons kamer wil, ook de 4 persoons kamer laten zien
                            * Als de gebruiker een eenpersoons kamer wil, alle kamers laten zien
                            * Als de gebruiker een 4 persoons kamer wil, alleen 4 persoons laten zien.
                            * 
                            * Vanaf hier word een nummer opgestuurd bijvoorbeeld $_SESSION["kamerkeuze"]
                            * Dit kun je opvangen doormiddel van de session te gebruiken in de pagina
                            * Vanaf hier haal je de mysql data op
                            */ 

                        } else {
                            echo "<p>Kamer keuze is niet valid<br></p>";
                        }
                    }
                }
            }
        }
        //Jaar is gevalideert, nu kunnen we de datums apart gebruiken.
    } else {
        //Invalide datum
        echo "<p>Datum is invalid, probeer het nog een keer of kies een geldige datum.<br></p>";
    }
}
?>
        <label for="Aankomst">Aankomst:</label>
        <div> <!-- Aankomst datum keuze menu -->
            <input required type="date" min="<?php echo date("Y-m-d");//huidige datum //nu kun je niet aankomen in het verleden ?>" name="aankomst" class="btn mark-btn">
        </div>

        <label for="Vertrek">Vertrek:</label>
        <div> <!-- Vertrek datum keuze menu -->
            <input required type="date" min="<?php echo date("Y-m-d");//huidige datum //nu kun je niet vertrekken in het verleden ?>" name="vertrek" class="btn mark-btn">
        </div>

        <label for="Kamerkeuze">Kamerkeuze:</label>
        <div> <!-- Kamer keuze menu -->			
            <select required name="kamerkeuze" class="btn mark-btn">
                <option value="1">Eenpersoonskamer</option>
                <option value="2">Tweepersoonskamer</option>
                <option value="3">Vierpersoonskamer</option>
            </select> 
        </div>

        <div> <!-- Zoek knop -->
            <input required type="submit" class="btn mark-btn" name="submit" value="Zoek">
        </div>
    </form>
</center>
<!--End Kamer Keuze Menu-->

<?php
include('include/footer.php');
?>
