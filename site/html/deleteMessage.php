<?php

include_once("utility.php");

// check if POST is set correctly
if (!isset($_POST["idMessage"])){
    $_SESSION['message'] = "erreur accès non autorisé";
    header("location: error.php");
    exit;
}

$idMessage = $_POST["idMessage"];

if (!$singleton->getMessageById($idMessage)){
    $_SESSION['message'] = "erreur le message n'existe pas";
    header("location: error.php");
    exit;
}
try {
    $singleton->deleteMessageById($idMessage);
}   catch(PDOException $e) {
    $_SESSION["message"] = $e->getMessage();
    header("location: error.php");
    exit;
}

header("location: dashboard.php");
