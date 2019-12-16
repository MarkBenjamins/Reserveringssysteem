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
                    <p class="title">Voer hier uw inloggegevens in</p>
                        <p>Gebruikersnaam:</p>
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
