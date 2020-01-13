<?php


function sendMessage($message, $location) {
    $_SESSION["message"] = $message;
    header("Location: ".$location);
}

function viewMessage() {
    if (isset($_SESSION["message"]) && $_SESSION["message"] != NULL) {
        echo "<div class='alert alert-danger'><p>".$_SESSION["message"]."</p></div>";
        $_SESSION["message"] = NULL;
    }
}

?>