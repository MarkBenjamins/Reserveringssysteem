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
                    <h2>voer hier uw inloggegevens in</h2>
                    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                        <p>username:</p>
                        <input class="form" type="text" name="uname"><br>
                        <p>password:</p>
                        <input class="form" type="password" name="pword"><br><br>
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