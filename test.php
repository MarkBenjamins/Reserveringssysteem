<?php
$stylesheet = "mycustomsheet.css";
include('include/header.php');
?>

<?php

$connection = mysqli_connect("localhost", "root","", "sollestijn");

if(mysqli_connect_errno()) {
    die("Could not connect to the database.."); //echo mysqli_connect_errno();
} else {

    $sql = mysqli_query($connection,"SELECT * FROM administrator");
    if($sql) {
        
    } else {
        echo "no";
    }
}

?>



<div class="container-fluid">
    <div class="row">
        <div class="col-6">
            Voorbeeld van hoe rows werken
        </div>
        <div class="col-6">
            Voorbeeld van hoe rows werken
        </div>
    </div>
</div>



<?php
include('include/footer.php');
?>