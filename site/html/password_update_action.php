<?php

include_once("utility.php");

// check if POST is set correctly
if (!isset($_SESSION["logged_in"]) || $_SESSION["logged_in"] != true || !isset($_POST["passwordChange"])) {
    $_SESSION['message'] = "accès non conforme";
    header("location: error.php");
    exit;
}

$id = $_SESSION["id"];
$newpass = $_POST["passwordChange"];

try {
    $singleton->updatePasswordById($id,$newpass);
} catch (PDOException $e) {
    $_SESSION["message"] = $e->getMessage();
    header("location: error.php");
    exit;
}

echo "<p>Le mot de passe a ete modifie</p>";
echo "<a href='dashboard.php' > retour au tableau de bord</a>";


