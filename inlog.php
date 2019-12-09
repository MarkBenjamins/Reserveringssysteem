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
                    <p class="title">voer hier uw inloggegevens in</p>
                    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                        <p>username:</p>
                        <input class="form" type="text" name="uname"><br>
                        <p>password:</p>
                        <input class="form" type="password" name="pword"><br><br>
                        <input type="submit" name="submit">
                    </form>
                    <?php
                    if (empty($_POST["uname"])) {
                        echo "enter a username first";
                    } elseif (empty($_POST["pword"])) {
                        echo "enter a password first";
                    } else {
                        $uname = $_POST["uname"];
                        $pword = $_POST["pword"];
                        if ($pword === "qwerty" && $uname === "qwerty") {
                            function Redirect($url, $permanent = false)
                            {
                                if (headers_sent() === false) {
                                    header('Location: ' . $url, true, ($permanent === true) ? 301 : 302);
                                }

                                exit();
                            }
                            Redirect('http://www.google.com/', false);
                        }
                        else{
                            echo "incorrect username or password";
                        }
                    }
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