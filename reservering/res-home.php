



<img src="../img/Voorbeeldkeuzemenu.png" alt="voorbeeldmenu">   

</html>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>reservering</title>
  </head>
  <body>

<!--Start Kamer Keuze Menu
<div>
    <h1><div class="btn-group btn-group-toggle" data-toggle="buttons">
  <label class="btn btn-secondary active">
    <input type="radio" name="options" id="option1" checked> Eenpersoonskamer
  </label>
  <label class="btn btn-secondary">
    <input type="radio" name="options" id="option2"> Tweepersoonskamer
  </label>
  <label class="btn btn-secondary">
    <input type="radio" name="options" id="option3"> Vierpersoonskamer
  </label>
  <div>
        <button type="button" class="btn btn-outline-danger">Zoek</button>
  </div>
</div></h1>
 End Kamer Keuze Menu-->
<div>
    <form action="/action_page.php">
        Aankomst: <input type="date" name="Aankomst"class="btn btn-secondary dropdown-toggle" id="dropdownMenuOffset">
        Vertrek: <input type="date" name="Vertrek"class="btn btn-secondary dropdown-toggle" id="dropdownMenuOffset">
    
    <select name="kamerkeuze" class="btn btn-secondary dropdown-toggle" id="dropdownMenuOffset">
        <option value="Eenpersoonskamer">Eenpersoonskamer</option>
        <option value="Tweepersoonskamer">Tweepersoonskamer</option>
        <option value="Vierpersoonskamer">Vierpersoonskamer</option>
    </select>
    <button type="button" class="btn btn-outline-danger">Zoek</button>
    </form>
</div>


</div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>