<?php
$stylesheet = "inlog";
include('include/header.php');
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-12 formbox">
            <div class="row form">
                <div class="col-2">
                </div>
                <div class="col-8">
                    <?php
                    if(ISSET($_SESSION["gebruiker"])) {
                        echo "U BENT AL INGELOGD JOH!";
                    }
                    ?>
                    <p class="title">Voer hier uw inloggegevens in</p>
                    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                        <p>Gebruikersnaam:</p>
                        <input class="form" type="text" name="uname" placeholder="Gebruikersnaam"><br><br>
                        <p>Wachtwoord:</p>
                        <input class="form" type="password" name="pword" placeholder="Wachtwoord"><br><br>
                        <input type="submit" name="submit" value="Log in">
                    </form>
                </div>
                <div class="col-2">
                </div>
            </div>
        </div>
    </div>
</div>
<?php
include('include/footer.php');

if(ISSET($_POST["submit"])) {
    if(!empty($_POST["pword"]) || !empty($_POST["uname"])) {

        
        $uname = $_POST["uname"];
        $pword = $_POST["pword"];
        $conn = mysqli_connect("localhost","root","","sollestijn");


        $sql = "SELECT * FROM gebruikers WHERE `gebruikersnaam` = ?";

        if($stmt = mysqli_prepare($conn, $sql)) {

            /* bind parameters for markers */
            mysqli_stmt_bind_param($stmt, "s", $uname);

            /* execute query */
            mysqli_stmt_execute($stmt);

            /* bind result variables */
            mysqli_stmt_bind_result($stmt, $id, $gebruikersnaam, $wachtwoord, $rechten);

            /* fetch value */
            $fetch = mysqli_stmt_fetch($stmt);

            /* close statement */
            mysqli_stmt_close($stmt);

            if($wachtwoord == $pword) {
                
                $_SESSION["gebruiker"]["id"] = $id;
                $_SESSION["gebruiker"]["rechten"] = $rechten;
                $_SESSION["gebruiker"]["gebruikersnaam"] = $gebruikersnaam;
                header("Location: index.php");
            }
        } else {
            die("could not prepare");
        }
    } else {
        $_SESSION["messages"] = "Vul gelieve beide velden in !";
        echo "empty fields";
    }
}
?>

