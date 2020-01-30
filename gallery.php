<?php
$stylesheet = "gallery";
include('include/header.php');
?>
<div id="gallerybox">
    <!-- gemaakt door Yurrien en Storm-->
    <div id="galleryheader">
        <center>
            <h1>Gallerij</h1>
        </center>
    </div>
    <div class="row">
        <div id="carouselExampleIndicators" class="carousel slide col-12" data-ride="carousel">
            <div class="carousel-inner">
                <?php
                $dir = "gallery/*.jpg";
                $img = glob($dir);

                $dirJPG = "gallery/*.JPG";
                $imgJPG = glob($dirJPG);

                $dirPNG = "gallery/*.png";
                $imgPNG = glob($dirPNG);
                
                //Accepteert JPG, jpg, en png
                foreach($imgJPG as $JPG) {
                    array_push($img, $JPG);
                }

                foreach($imgPNG as $PNG) {
                    array_push($img, $PNG);
                }
                
                $x = 1;
                
                foreach ($img as $image) {//echo alle images apart
                    
                    if ($x == 1) {
                        echo '<div class="carousel-item active">
                        <img src="' . $image . '" alt="foto kamer">
                        </div>';
                    } else {
                        echo '<div class="carousel-item">
                        <img src="' . $image . '" alt="volgende">
                        </div>';
                    }
                    $x++;
                }
                ?>
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
    </div>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</div>
<?php
if (isset($_SESSION["gebruiker"])) {
    //var_dump($_SESSION["gebruiker"]);

    echo '<form method="post" enctype="multipart/form-data">
        File name:<input type="file" name="image">
        <input type="submit" name="submit" value="upload">
        </form>';
    if (isset($_POST['submit'])) {
        if (isset($_POST['image'])) {
            sendMessage("selecteer eerst een bestand.", $_SERVER["PHP_SELF"]);
        } else {
            $allow = array("jpg");
            $todir = "gallery/";

            if (!!$_FILES['image']['tmp_name']) {
                $info = explode('.', strtolower($_FILES['image']['name']));
                if (in_array(end($info), $allow)) {
                    if (move_uploaded_file($_FILES['image']['tmp_name'], $todir . basename($_FILES['image']['name']))) {
                    }
                }
            }
            $location = basename($_FILES['image']['name']);
        }
    }
}
include('include/footer.php');
?>