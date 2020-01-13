<?php    
$kamerkeuze = "Vierpersoonskamer"; // Dit wordt de keuze welke in voorgaande pagina is aangegeven
$aankomst = "2019-12-18"; // Deze 3 waarden zijn sessions
$vertrek = "2019-12-21"; // 

    $conn = mysqli_connect("127.0.0.1","root","");

        if ($conn == FALSE){ // verbinden met de server
            echo "Kan niet verbinden met de server";
        }

        if (!$conn->select_db("sollestijn")){ // database selecteren
            echo "Kan de database niet selecteren";
        }
        
$stylesheet = "kamers";
include('include/header.php');
?>
    <div class="container">
        <?php  
        
        function createDateRange($startDate, $endDate, $format = "Y-m-d") { // Functie die alle dagen binnen een periode weergeeft
            $begin = new DateTime($startDate);
            $end = new DateTime($endDate);

            $interval = new DateInterval('P1D'); // 1 dag is de interval
            $dateRange = new DatePeriod($begin, $interval, $end);

            $range = [];
            foreach ($dateRange as $date) {
                $range[] = $date->format($format);
        }
        array_push($range, $endDate);
        return $range;
        }
        
            $arrayAlleDagen = createDateRange($aankomst, $vertrek); // Weergeeft alledagen waarin de klant wil blijven
        
            if ($stmt = $conn->prepare("SELECT kamernummer, begindatum, einddatum FROM reservering")){ // Haalt alle reserveringen uit de db
                if ($stmt->execute()){
                    if ($stmt->bind_result($kamerid,$begindatum, $einddatum)){
                        
                        $ArrayGereserveerd = array(); // Alle kamers in een array
                        for ($y = 1;$y <= 41;$y++){ //  35 kamers
                            array_push($ArrayGereserveerd,$y); // Zet alle kamers in een array
                        }
                        
                        echo "Deze kamers zijn vrij<br>";
                        while ($row = $stmt->fetch()) { // Fetched alle data
                            $arraykamer = (createDateRange($begindatum,$einddatum)); // Creëert alle datums waarin een kamer gereserveerd is.
                            
                            $looptimes = 0; // Bekijkt hoe vaak de foreach al geloopt is.
                            foreach ($arraykamer as $var){
                                if ($var === $arrayAlleDagen[$looptimes]){
                                    $locationkamer = array_search($kamerid,$ArrayGereserveerd);
                                    unset($ArrayGereserveerd[$locationkamer]);
                                    $arr = array_values($ArrayGereserveerd);
                                    }
                                    $looptimes + 1;
                            }
                        }
                        echo "<div id='DivKamers'>";
                            foreach ($arr as $value){
                                if($kamerkeuze == "Eenpersoonskamer"){ // Voert uit als eenpersoonskamer aangevinkt is
                                    if ($value <= 5){
                                     echo "<div id='DivForeachKamers'>";
                                     echo "<a href='res-kamer1pers.php?action= $value'>Kamer " . $value . "</a><br>";
                                     echo "</div>";
                                    }
                                }
                                if ($kamerkeuze == "Tweepersoonskamer"){ // Voert uit als tweepersoonskamer aangevinkt is
                                    if ($value > 5 && $value <= 35) {
                                     echo "<div id='DivForeachKamers'>";
                                     echo "<a href='res-kamer2pers.php?action= $value'>Kamer " . $value . "</a><br>";
                                     echo "</div>";                                   
                                    }
                                }
                                if ($kamerkeuze == "Vierpersoonskamer"){ // Voert uit als vierpersoonskamer aangevinkt is
                                    if($value > 35 && $value <= 41) { 
                                     echo "<div id='DivForeachKamers'>";
                                     echo "<a href='res-kamer4pers.php?action= $value'>Kamer " . $value . "</a><br>";
                                     echo "</div>";                                   
                                    }
                                }
                               }
                        echo "</div";
                        
                    } else {
                        echo "Bind failed";
                    }
                } else {
                    echo "Execute failed";
                }
            } else {
                echo "Prepare failed";
            }
            


        ?>
    </div>
<?php
include('include/footer.php');
?>
