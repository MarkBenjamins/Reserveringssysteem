





<?php
$stylesheet = "res-home";
include('include/header.php');
?>


<!--Start Kamer Keuze Menu-->
    <div>
	<img src="../img/Voorbeeldkeuzemenu.png" alt="voorbeeldmenu">   
        <form action="/action_page.php">
            Aankomst: <input type="date" name="Aankomst"class="btn btn-outline-danger">
            Vertrek: <input type="date" name="Vertrek"class="btn btn-outline-danger">
            <select name="kamerkeuze" class="btn btn-outline-danger">
                <option value="Eenpersoonskamer">Eenpersoonskamer</option>
                <option value="Tweepersoonskamer">Tweepersoonskamer</option>
                <option value="Vierpersoonskamer">Vierpersoonskamer</option>
            </select>
            <button type="button" class="btn btn-outline-danger">Zoek</button>
        </form>
    </div>
<!--End Kamer Keuze Menu-->



<?php
include('include/footer.php');
?>