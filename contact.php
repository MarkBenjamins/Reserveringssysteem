<?php
$stylesheet = "res-home";
include('include/header.php');
?>
<!--Door Mark Benjamins-->
<!--Start Contact pagina-->
<center>
    <h1>Contact</h1>
    <?php
    //Als je verzend knop drukt echo verzonden
    if (isset($_POST['Verzend'])) {
        echo "<h2>Het bericht is verzonden</h2>";
    } else {
        //echo "<p>Het bericht is niet verzonden</p>";
    }
    ?>
    <form id="contact" action="#" method="POST">
        <label for="naam">*Naam:</label>
        <div>
            <!--Gebruiker-->
            <input class="formulier" required type="text" name="naam" Placeholder=" Naam">
        </div>
        <label for="email">*E-mail:</label>
        <div>
            <!--Email-->
            <input class="formulier" required type="email" name="email" Placeholder=" E-mail">
        </div>
        <label for="telefoonNummer">Telefoonnummer:</label>
        <div>
            <!--Tel-->
            <input class="formulier" type="number" name="telefoonnummer" Placeholder=" Telefoonnummer">
        </div>
        <label for="bericht">*Bericht:</label>
        <div>
            <!--Bericht-->
            <textarea class="formulier" required name="textarea" placeholder=" Type hier een bericht."></textarea>
        </div>
        <div>
            <!--Verzend-->
            <a href="#"><input required type="submit" class="btn mark-btn" name="Verzend" value="Verzend"></a>
        </div>
    </form>
</center>
<!--End Contact pagina-->
<?php
include('include/footer.php');
?>