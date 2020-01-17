<?php
//gemaakt door Wesley

function sendMessage($message, $location) {//stuur een bericht
    $_SESSION["message"] = $message;
    header("Location: ".$location);
}

function viewMessage() {//laat een error message met stijl zien
    if (isset($_SESSION["message"]) && $_SESSION["message"] != NULL) {
        echo "<div class='alert alert-danger'><p>".$_SESSION["message"]."</p></div>";
        $_SESSION["message"] = NULL;
    }
}
?>