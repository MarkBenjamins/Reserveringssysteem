<?php    
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

            $interval = new DateInterval('P1D'); // 1 Day
            $dateRange = new DatePeriod($begin, $interval, $end);

            $range = [];
            foreach ($dateRange as $date) {
                $range[] = $date->format($format);
        }
        array_push($range, $endDate);
        return $range;
        }
        
            $aankomst = "2019-12-18"; // Dit wordt de session, temporary waarde
            $vertrek = "2019-12-21";
            $arrayAlleDagen = createDateRange($aankomst, $vertrek);
        
            if ($stmt = $conn->prepare("SELECT kamernummer, begindatum, einddatum FROM reservering")){ // Haalt alle reserveringen uit de db
                if ($stmt->execute()){
                    if ($stmt->bind_result($kamerid,$begindatum, $einddatum)){
                        
                        $ArrayGereserveerd = array(); // Alle kamers in een array
                        for ($y = 1;$y <= 35;$y++){ //  35 kamers
                            array_push($ArrayGereserveerd,$y); // Zet alle kamers in een array
                        }
                        
                        echo "Deze kamers zijn vrij<br>";
                        while ($row = $stmt->fetch()) { // Fetched alle data
                            $arraykamer = (createDateRange($begindatum,$einddatum));
                            
                            $looptimes = 0;
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
                                echo "<div id='DivForeachKamers'>";
                                echo "Kamer " . $value . "<br>";
                                echo "</div>";
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
