<?php
include_once("utility.php");
?>

<?php
if (empty($_SESSION) || !isset($_SESSION['logged_in']) || $_SESSION['logged_in'] == false) {

    header("location: ./index.php");
    exit;
} else {
    if (!$singleton->isAdmin($_SESSION["id"])) {
        header("location: ./dashboard.php");
        exit;
    }
}
?>

<?php
try {
    $singleton->createUser($_POST["username"],$_POST["passwordUnhashed"],$_POST["validityRadios"],$_POST["adminRadios"]);
} catch (PDOException $e) {
    $_SESSION['message'] = $e->getMessage();
    header("location: error.php");
    exit;
}
 header("location: ./administration.php");
?>


