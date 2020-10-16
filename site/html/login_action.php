<?php
include_once("utility.php");

// check if POST is set correctly
if (!isset($_POST["inputUsername"]) || !isset($_POST["inputPassword"])) {
    $_SESSION['message'] = "l'utilisateur n'existe pas";
    header("location: error.php");
    exit;
}

try {
    $user = $singleton->getUserByUsername($_POST["inputUsername"]);
} catch (PDOException $e) {
    $_SESSION["message"] = $e->getMessage();
    header("location: error.php");
    exit;
}

if ($user) {
    if ($user->Username == $_POST["inputUsername"] && $user->Password == $_POST["inputPassword"]) {
        if ($user->Validity == 0) {
            $_SESSION['message'] = "Validité dépassé";
            header("location: error.php");
            exit;
        }
        // user is correct
        $_SESSION["id"] = $user->id;
        $_SESSION["logged_in"] = true;
        header("location: ./dashboard.php");
    } else {
        $_SESSION['message'] = "informations incorrect";
        header("location: error.php");
        exit;
    }
} else {
    $_SESSION['message'] = "nobody";
    header("location: error.php");
    exit;
}
