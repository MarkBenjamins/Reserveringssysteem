<?php   

        
$stylesheet = "kamers";
include('include/header.php');

if(!isset($_SESSION["res-home"])) {
    //wegsturen    
    die("session not set");
}

$kamerKeuze = $_SESSION["res-home"]["kamerkeuze"];
$aankomst = $_SESSION["res-home"]["aankomst"];
$vertrek = $_SESSION["res-home"]["vertrek"];
//var_dump($_SESSION["res-home"]);


    $conn = mysqli_connect("127.0.0.1","root","");

        if ($conn == FALSE){ // verbinden met de server
            echo "Kan niet verbinden met de server";
        }

        if (!$conn->select_db("sollestijn")){ // database selecteren
            echo "Kan de database niet selecteren";
        }
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
        
            //$arrayAlleDagen = createDateRange($aankomst, $vertrek);
        
            if ($stmt = $conn->prepare("SELECT * FROM kamer")){ // Haalt alle reserveringen uit de db
                if ($stmt->execute()){
                    if ($stmt->bind_result($id,$type, $omschrijving, $beschikbaar))
                    {
                        echo "<h2>Deze kamers zijn vrij</h2>";
                        while ($row = $stmt->fetch()) { // Fetched alle data
                            
                            if($kamerKeuze == "Eenpersoonskamer") {
                                //show all
                                showKamer($id, $type, $omschrijving, $beschikbaar);
                            } else if($kamerKeuze == "Tweepersoonskamer") {
                                //Show 2, 3
                                if($type == 2 || $type == 3) {
                                    showKamer($id, $type, $omschrijving, $beschikbaar);
                                }
                            } else if($kamerKeuze == "Vierpersoonskamer") {
                                //Show 3
                                if($type == 3) {
                                    showKamer($id, $type, $omschrijving, $beschikbaar);
                                }
                            }
                        }
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


function showKamer($id, $type, $omschrijving, $beschikbaar) {
        
        if($type == 1) {
            $kamer = "Eenpersoons kamer";
            $url = "res-kamer1pers.php";
        } else if($type == 2) {
            $kamer = "Tweepersoons kamer";
            $url = "res-kamer2pers.php";
        } else {
            $kamer = "Vierpersoons kamer";
            $url = "res-kamer4pers.php";
        }
        echo "<div class='kamer'>";
        echo "<p>".$kamer."</p>";
        echo "<p>".$omschrijving."</p>";
        echo "
        <form method='POST' action='".$url."'>
            <input type='hidden' name='id' value='".$id."'>
            <input type='submit' name='kamersubmit' value='Ga naar kamer'>
        </form>
       ";
       echo "</div>";
}
?>
