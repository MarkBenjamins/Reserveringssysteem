<?php
$stylesheet = "style";
include 'include/header.php';
?>
<div class="container-fluid">
    <div class="row">
        <?php
        if (!empty($_SESSION['fname']) || !empty($_SESSION['lname']) || !empty($_SESSION['email']) || !empty($_SESSION['postc']) || !empty($_SESSION['gdate']) || !empty($_SESSION['ltijd1'])){
            echo $_SESSION['fname'] . "<br>";
            echo $_SESSION['lname'] . "<br>";
            echo $_SESSION['email'] . "<br>";
            echo $_SESSION['postc'] . "<br>";
            echo $_SESSION['gdate'] . "<br>";
            echo $_SESSION['ltijd1'] . "<br>";
            if (!empty($_SESSION['ltijd2'])){
                echo $_SESSION['ltijd2'] . "<br>";
            }
            if (!empty($_SESSION['ltijd3'])){
                echo $_SESSION['ltijd3'] . "<br>";
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