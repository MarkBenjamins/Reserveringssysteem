
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
        
        
                if ($stmt->execute()){
                        while ($row = $stmt->fetch()) { // Fetched alle data
                            
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
?>
