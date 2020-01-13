<?php
$stylesheet = "inlog";
include('include/header.php');
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-3">
        </div>
        <div class="col-6 hoog">
            <?php //check of ingelogd
            if (isset($_SESSION["gebruiker"])) {
                echo "u bent al ingelogd!";
            }
            ?>
            <p class="title">Voer hier uw inloggegevens in</p>
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                <!--de form-->
                <p>Gebruikersnaam:</p>
                <input class="form storm-btn" type="text" name="uname" placeholder="Gebruikersnaam"><br><br>
                <p>Wachtwoord:</p>
                <input class="form storm-btn" type="password" name="pword" placeholder="Wachtwoord"><br><br>
                <input class="btn mark-btn submit" type="submit" name="submit" value="Log in"><br><br>
                <a class="btn mark-btn submit" href="logout.php">Log uit</a>
            </form><br>
            
        </div>
        <div class="col-3">
        </div>
    </div>
</div>
<?php
include('include/footer.php');

if (isset($_POST["submit"])) {
    if (!empty($_POST["pword"]) || !empty($_POST["uname"])) {


        $uname = $_POST["uname"];
        $pword = $_POST["pword"];
        $conn = mysqli_connect("localhost", "root", "", "sollestijn");

        $sql = "SELECT * FROM gebruikers WHERE `gebruikersnaam` = ?";

        if ($stmt = mysqli_prepare($conn, $sql)) {

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

            if ($wachtwoord == $pword) {
                //check of het klopt
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