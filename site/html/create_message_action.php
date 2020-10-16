<?php

include_once("utility.php");

// check if POST is set correctly
if (!isset($_POST["SelectReceiver"]) || !isset($_POST["Subject"]) || !isset($_POST["Content"])) {
    $_SESSION['message'] = "erreur accès non autorisé";
    header("location: error.php");
    exit;
}

// Creation du message

$idSender = $_SESSION["id"];
$idReceiver = $_POST["SelectReceiver"];
$subject = $_POST["Subject"];
$content = $_POST["Content"];

try {
    $singleton->createMessage($idSender,$idReceiver,$content,$subject);
}   catch(PDOException $e) {
    $_SESSION["message"] = $e->getMessage();
    header("location: error.php");
    exit;
}

echo "<p>Le message a ete envoyer</p>";
echo "<a href='dashboard.php' > retour au tableau de bord</a>";
