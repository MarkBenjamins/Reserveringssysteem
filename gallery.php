<?php
$stylesheet = "gallery";
include('include/header.php');
?>
<div id="gallerybox"> <!-- start gallerybox !-->
  <div id="galleryheader"><center><h1>Gallerij</h1></center>
  </div>
<?php
if(isset($_REQUEST['submit']))
{
  $filename=  $_FILES["imgfile"]["name"];
  if ((($_FILES["imgfile"]["type"] == "image/gif")|| ($_FILES["imgfile"]["type"] == "image/jpeg") || ($_FILES["imgfile"]["type"] == "image/png")  || ($_FILES["imgfile"]["type"] == "image/pjpeg")) && ($_FILES["imgfile"]["size"] < 200000))
  {
    if(file_exists($_FILES["imgfile"]["name"]))
    {
      echo "File name exists.";
    }
    else
    {
      move_uploaded_file($_FILES["imgfile"]["tmp_name"],"img/$filename");
      echo "Upload Successful . <a href='img/$filename'>Click here</a> to view the uploaded image";
    }
  }
  else
  {
    echo "invalid file.";
  }
}

if(isset($_SESSION["gebruiker"])) {
  //var_dump($_SESSION["gebruiker"]);
  ?>

<form method="post" enctype="multipart/form-data">
  File name:<input type="file" name="imgfile">
  <input type="submit" name="submit" value="upload">
</form>

<?php
}
?>
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="1" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100" src="img/kamer1.jpg" alt="first">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="img/kamer2.jpg" alt="second">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="img/kamer3.jpg" alt="third">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
  </div> <!-- eind gallerybox !-->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</div>
<?php
include('include/footer.php');
?>
