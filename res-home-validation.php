	
<?php

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
            echo "Je moet een datum gelijk aan of later dan vandaag invullen";
        } else {
            if ($vertrek < $vandaag) {
                echo "Je kunt niet gisteren vertrekken";
            } else {
                if ($vertrek < $aankomst) {
                    echo "Je kunt niet vertrekken voordat je aangekomen bent!";
                } else {
                    if ($vertrek === $aankomst) {
                        echo "Je kunt niet vertrekken op de tijd van aankomst";
                    } else {
                        if($kamerkeuze == "1" || $kamerkeuze == "2"|| $kamerkeuze == "3") {
                            //Eind vd validation, vanaf hier kunnen we andere dingen doen.
                            //Hoeveel dagen er zijn geselecteerd
                            //Welke kamer
                            
                            $datediff = strtotime($vertrek) - strtotime($aankomst);
                            //Hoeveel dagen de klant gereserveerd wilt hebben

                            $dagen = round($datediff / (60 * 60 * 24));
                            
                            echo $dagen;
                            echo "<br/>";
                            echo $kamerkeuze;
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
                            echo "Kamer keuze is niet valid";
                        }
                    }
                }
            }
        }

        //Jaar is gevalideert, nu kunnen we de datums apart gebruiken.
    } else {
        //Invalide datum
        echo "Datum is invalid.. stuur gebruiker een melding";
        die();
    }
}
