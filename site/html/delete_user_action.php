<?php
include_once("utility.php");

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
    $singleton->deleteUserById($_GET["id"]);
} catch (PDOException $e) {
    $_SESSION['message'] = $e->getMessage();
    header("location: error.php");
    exit;

}
header("location: ./administration.php");
?>


