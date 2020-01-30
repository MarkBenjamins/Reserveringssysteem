<?php
$stylesheet = "inlog";
include('include/header.php');
include('include/functions.php');
//gemaakt door Wesley en Storm
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-3">
        </div>
        <div class="col-6 hoog">
            <p class="title">Voer hier uw inloggegevens in</p>
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                <!--de form-->
                <label>Gebruikersnaam:</label>
                <input class="form storm-btn" type="text" name="uname" placeholder="Gebruikersnaam"><br>
                <label>Wachtwoord:</label>
                <input class="form storm-btn" type="password" name="pword" placeholder="Wachtwoord"><br>
                <input class="btn mark-btn submit" type="submit" name="submit" value="Log in"><br><br>
            </form><br>
        </div>
        <div class="col-3">
        </div>
    </div>
</div>
<?php
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
            sendMessage("Er is iets verkeerd gegaan. #Login2", $_SERVER["PHP_SELF"]);
        }
    } else {
        sendMessage("Er is iets verkeerd gegaan. #Login3", $_SERVER["PHP_SELF"]);
    }
}
include('include/footer.php');
?>