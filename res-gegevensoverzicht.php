<?php
$stylesheet = "style";
include 'include/header.php';
?>
<div class="container-fluid">
    <div class="row">
        <?php
        if (!empty($_SESSION['fname']) || !empty($_SESSION['lname']) || !empty($_SESSION['email']) || !empty($_SESSION['postc']) || !empty($_SESSION['gdate']) || !empty($_SESSION['ltijd1'])){
            echo "Dit zijn uw gegevens:<br>";
            echo "Naam: " . $_SESSION['fname'] . " " . $_SESSION['lname'] . "<br>";
            echo "Email: " . $_SESSION['email'] . "<br>";
            echo "Postcode: " . $_SESSION['postc'] . "<br>";
            echo "Geboortedatum: " . $_SESSION['gdate'] . "<br>";
            echo "Leeftijd: " . $_SESSION['ltijd1'] . "<br>";
            if (!empty($_SESSION['ltijd2'])){
                echo "Leeftijd Gast 2 :" . $_SESSION['ltijd2'] . "<br>";
            }
            if (!empty($_SESSION['ltijd3'])){
                echo "Leeftijd Gast 3: " . $_SESSION['ltijd3'] . "<br>";
            }
        }
        else {
            echo "Vul eerst alle gegevens in";
        }
        ?>
    </div>
</div>
<?php
include 'include/footer.php';