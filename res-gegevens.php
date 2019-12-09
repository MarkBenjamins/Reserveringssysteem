<?php
$stylesheet = "inlog";
include('include/header.php');
?>
<div class="container-fluid">
    <div class="row login">
        <div class="col-12 formbox">
            <div class="row title">
            </div>
            <div class="row form">
                <div class="col-2">
                </div>
                <div class="col-8">
                    <h2>Persoonsgegevens</h2>
                    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                        <p>Voornaam</p>
                        <input class="form" type="text" name="fname"><br>
                        <p>Achternaam</p>
                        <input class="form" type="text" name="lname"><br>
                        <p>E-mailadres</p>
                        <input class="form" type="email" name="email"><br>
                        <p>Telefoonnummer</p>
                        <input class="form" type="number" name="telnmr"><br>
                        <p>Geboortedatum</p>
                        <input class="form" type="date" name="gdate"><br><br>
                        <input type="submit" name="submit">
                    </form>
                    <?php
                    ?>
                </div>
                <div class="col-2">
                </div>
            </div>
        </div>
    </div>
</div>
<?php
include('include/footer.php');
?>