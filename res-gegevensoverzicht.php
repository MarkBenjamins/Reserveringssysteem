<?php
$stylesheet = "style";
include 'include/header.php';
include 'include/functions.php';
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <?php
            viewMessage();
            if (!empty($_SESSION['gegevens']['fname']) || !empty($_SESSION['gegevens']['lname']) || !empty($_SESSION['gegevens']['email']) || !empty($_SESSION['gegevens']['postc']) || !empty($_SESSION['gegevens']['gdate']) || !empty($_SESSION['gegevens']['ltijd1'])) {
                echo '<label>';
                echo "<h2>Dit zijn uw gegevens:</h2>";
                echo "<p>Naam: " . $_SESSION['gegevens']['fname'] . " " . $_SESSION['gegevens']['lname'] . "</p>";
                echo "<p>Email: " . $_SESSION['gegevens']['email'] . "</p>";
                echo "<p>Postcode: " . $_SESSION['gegevens']['postc'] . "</p>";
                echo "<p>Geboortedatum: " . $_SESSION['gegevens']['gdate'] . "</p>";
                echo "<p>Kamerkeuze: " . $_SESSION['res-home']['kamerkeuze'] . "</p>";
                echo "<p>Aankomst: " . $_SESSION['res-home']['aankomst'] . "</p>";
                echo "<p>Vertrek: " . $_SESSION['res-home']['vertrek'] . "</p>";
                echo "<p>Lunch: " . $_SESSION['gegevens']['lunch'] . "</p>";
                echo "<p>Electrische fiets: " . $_SESSION['gegevens']['efiets'] . "</p>";
                echo "<p>Oplaadpaal: " . $_SESSION['gegevens']['epaal'] . "</p>";
                echo "<p>Opmerkingen: " . $_SESSION['gegevens']['opmerk'] . "</p>";
                if (!empty($_SESSION['gegevens']['ltijd1'])) {
                    echo "<p>Leeftijd Gast 1: " . $_SESSION['gegevens']['ltijd1'] . "</p>";
                }
                if (!empty($_SESSION['gegevens']['ltijd2'])) {
                    echo "<p>Leeftijd Gast 2 :" . $_SESSION['gegevens']['ltijd2'] . "</p>";
                }
                if (!empty($_SESSION['gegevens']['ltijd3'])) {
                    echo "<p>Leeftijd Gast 3: " . $_SESSION['gegevens']['ltijd3'] . "</p>";
                }
                echo '</label>';
            } else {
                //sendMessage('vul alle gegevens in.', $_SERVER["PHP_SELF"]);
            }
            ?>
        </div>
    </div>
</div>
<?php
include 'include/footer.php';
?>