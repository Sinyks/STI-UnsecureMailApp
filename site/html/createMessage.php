<?php

include_once("utility.php");

// check if POST is set correctly
if (!isset($_POST["idSender"]) || !isset($_POST["idReceiver"]) || !isset($_POST["Subject"]) || !isset($_POST["content"])) {
    $_SESSION['message'] = "erreur accès non autorisé";
    header("location: error.php");
    exit;
}

header("location: dashboard.php");
