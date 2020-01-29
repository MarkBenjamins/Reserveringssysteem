<?php
// gemaakt door Mark, Wesley en Storm
if (isset($_POST["submit"])) {
    $aankomst = $_POST["aankomst"];
    $vertrek = $_POST["vertrek"];
    $kamerkeuze = $_POST["kamerkeuze"];

    //Check if aankomst en vertrek is een valide datum.

    if (strtotime($aankomst) != false && strtotime($vertrek) != false) {
        //Valide datums
        $vandaag = date("Y-m-d");
        /*
        echo $vandaag;
        echo "<hr/>";
        echo $aankomst;
        echo "<hr/>";
        echo $vertrek;
        */
        $splitAankomst = explode("-", $aankomst);
        $splitVertrek = explode("-", $vertrek);

        $aankomstJaar = $splitAankomst[0];
        $aankomstMaand = $splitAankomst[1];
        $aankomstDag = $splitAankomst[2];

        $vertrekJaar = $splitVertrek[0];
        $vertrekMaand = $splitVertrek[1];
        $vertrekDag = $splitVertrek[2];

        if ($aankomst < $vandaag) {
            sendMessage('Je moet een datum gelijk aan of later dan vandaag invullen', $_SERVER["PHP_SELF"]);
        } elseif ($vertrek < $vandaag) {
            sendMessage('je kunt niet in het verleden vertrekken', $_SERVER["PHP_SELF"]);
        } elseif ($vertrek < $aankomst) {
            sendMessage('Je kunt niet vertrekken voordat je bent aangekomen', $_SERVER["PHP_SELF"]);
        } elseif ($vertrek === $aankomst) {
            sendMessage('je kunt niet vertrekken op de dag van aankomst', $_SERVER["PHP_SELF"]);
        } elseif ($kamerkeuze == "1" || $kamerkeuze == "2" || $kamerkeuze == "3") {
            //Eind vd validation, vanaf hier kunnen we andere dingen doen.
            //Hoeveel dagen er zijn geselecteerd
            //Welke kamer

            $datediff = strtotime($vertrek) - strtotime($aankomst);
            //Hoeveel dagen de klant gereserveerd wilt hebben

            $dagen = round($datediff / (60 * 60 * 24));

            //echo $dagen;
            //echo "<br/>";
            //echo $kamerkeuze;
            //Kamer keuze en datums kloppen vanaf hier.
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
            sendMessage('fout met de kamerkeuze', $_SERVER["PHP_SELF"]);
        }

        //Jaar is gevalideert, nu kunnen we de datums apart gebruiken.
    } else {
        //Invalide datum
        sendMessage('Je moet een datum gelijk aan of later dan vandaag invullen', $_SERVER["PHP_SELF"]);
        die();
    }
}
?>

<!-- add by mark / om de gegevens in te zien -->
<a href="res-kameroverzicht.php">Naar kameroverzicht</a>
<p>Aankomst: <?php echo $aankomst; ?> </p>
<p>Vertrek: <?php echo $vertrek; ?> </p>
<p>KamerKeuze: <?php echo $kamerkeuze; ?> </p>
<p>Aantal dagen: <?php echo $dagen; ?> </p>
<hr>
<br>