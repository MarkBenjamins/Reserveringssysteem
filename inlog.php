<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>inlog pagina</title>
        <link href="stylesheets/inlog.css" rel="stylesheet">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" crossorigin="anonymous">
    </head>
    <body>
        <div class="container-fluid">
            <div class="row login">		
               <div class="col-12 formbox">
                    <div class="row title">
                    </div>
                    <div class="row form">
                        <div class="col-2">
                        </div>    
                        <div class="col-8">
                            <h1>voer hier uw inloggegevens in</h1>
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
    </body>
</html>